<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // $request->validate([
        //     'name' =>'required',
        //     'description' =>'required|mimes:png,jpg,jpeg,webp',
        //     'image' =>'required',
        // ]);
        $image='';
        if($request->hasFile('file')){
            $image=$request->file('file')->store('public/images');
        };
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);
        $notification = array(
           'message' => 'Kategori Başarıyla Eklendi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.category')->with($notification);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
