<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.table.table');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'guest_number' =>'required'| 'numeric',

        ],[
            'name.required' => 'İsim alanı gereklidir',
            'guest_number.required' => 'Misafir sayısı alanı gereklidir',
            'guest_number.numeric' => 'Misafir sayısı alanı sayı olmalıdır',
        ]);
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status'=>'available',
            'location' => $request->location,
        ]);
        $notification = array(
           'message' => 'Masa Eklendi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.table.index')->with($notification);
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
        $table = Table::find($id);
        return view('admin.table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $table = Table::find($id);
       $request->validate([
            'name' =>'required',
            'guest_number' =>'required'| 'numeric',]);
        $table::update([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'location' => $request->location,
            'status' => $request->status,
        ]);
        $notification = array(
           'message' => 'Masa Güncellendi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.table.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();
        $notification = array(
           'message' => 'Masa Silindi',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.table.index')->with($notification);
    }
}
