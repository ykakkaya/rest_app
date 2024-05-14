<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.reservation', compact('reservations'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status','available')->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'res_date' =>'required|after_or_equal:today',
            'table_id' =>'required',
            'guest_number' =>'required',
        ],[
            'first_name.required' => 'İsim Alanı Zorunludur',
            'email.required' => 'Email Alanı Zorunludur',
            'last_name.required' => 'Soyisim Alanı Zorunludur',
            'phone.required' => 'Telefon Numarası Zorunludur',
           'rest_date.required' => 'Reservasyon Tarihi Zorunludur',
           'res_date.after_or_equal' => 'Eski tarihli giriş yapılamaz',
            'guest_number.required' => 'Misafir Sayısı Zorunludur',
        ]);
        $table=Table::where('id',$request->table_id)->first();
        if ($request->guest_number <= $table->guest_number) {

            Reservation::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
            'res_date' => $request->res_date,
                'table_id' => $request->table_id,
                'guest_number' => $request->guest_number,
            ]);

            $table->status='reserved';
            $table->save();
            $notification = array(
            'message' => 'Rezervasyon Eklendi',
                'alert-type' =>'success'
            );


        }else{
            $notification = array(
            'message' => 'Masa Kapasitesi Yeterli Değil',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('admin.reservation')->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::find($id);
        $tables = Table::where('status','available')->get();
        return view('admin.reservation.edit', compact(['reservation','tables']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Reservation::find($id);
        $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'res_date' =>'required|after_or_equal:today',
            'table_id' =>'required',
            'guest_number' =>'required',
        ],[
            'first_name.required' => 'İsim Alanı Zorunludur',
            'email.required' => 'Email Alanı Zorunludur',
            'last_name.required' => 'Soyisim Alanı Zorunludur',
            'phone.required' => 'Telefon Numarası Zorunludur',
           'rest_date.required' => 'Reservasyon Tarihi Zorunludur',
           'res_date.after_or_equal' => 'Eski tarihli giriş yapılamaz',
            'guest_number.required' => 'Misafir Sayısı Zorunludur',
        ]);
        $table=Table::where('id',$request->table_id)->first();
        if ($request->guest_number <= $table->guest_number) {
            $reservation->update([
                'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                   'res_date' => $request->res_date,
                    'table_id' => $request->table_id,
                    'guest_number' => $request->guest_number,
               ]);
               $notification = array(
                   'message' => 'Rezervasyon Güncellendi',
                    'alert-type' =>'success'
                );
        }else{
            $notification = array(
               'message' => 'Masa Kapasitesi Yeterli Değil',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('admin.reservation')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);
        $table=Table::where('id',$reservation->table_id)->first();
        $table->status='available';
        $table->save();
        $reservation->delete();
        $notification = array(
           'message' => 'Rezervasyon Silindi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.reservation')->with($notification);
    }
}
