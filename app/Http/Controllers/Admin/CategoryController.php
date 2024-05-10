<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
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


        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'file' =>'mimes:png,jpg,jpeg,webp',
        ],[
            'name.required' => 'Kategori İsmi Giriniz',
            'description.required' => 'Kategori Açıklaması Giriniz',
            'file.mimes' => 'Sadece png,jpg,jpeg,webp uzantılı resimler yükleyebilirsiniz',
        ]);
        $image='';
        if($request->hasFile('file')){
            $img = $request->file('file');
            $image=$img->store('public/images');
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

        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::find($id);
        $image=$category->image;
        if($request->hasFile('file')){
            $img = $request->file('file');
            Storage::delete($image);
            $image=$img->store('public/images');
        };
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$image,
        ],[
            'name.required' => 'Kategori İsmi Giriniz',
            'description.required' => 'Kategori Açıklaması Giriniz',
            'file.mimes' => 'Sadece png,jpg,jpeg,webp uzantılı resimler yükleyebilirsiniz',
        ]);
        $notification = array(
           'message' => 'Kategori Başarıyla Güncellendi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        Storage::delete($category->image);
        $category->delete();

        return redirect()->route('admin.category');
    }
}
