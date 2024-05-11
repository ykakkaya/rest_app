<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.menu',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.menu.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'file' =>'mimes:png,jpg,jpeg,webp',
        ],[
            'name.required' => 'Kategori İsmi Giriniz',
            'description.required' => 'Kategori Açıklaması Giriniz',
            'file.mimes' => 'Sadece png,jpg,jpeg,webp uzantılı resimler yükleyebilirsiniz',
            'price.required' => 'Fiyat Giriniz',
        ]);
            $image='';
        if($request->hasFile('file')){
                $img = $request->file('file');
                $image=$img->store('public/images');
            };
            Menu::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);
            $notification = array(
               'message' => 'Menü Başarıyla Eklendi',
                'alert-type' =>'success'
            );
            return redirect()->route('admin.menu')->with($notification);
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
        $menu=Menu::where('id',$id)->first();
        $categories=Category::all();
        return view('admin.menu.edit',compact(['menu','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'file' =>'mimes:png,jpg,jpeg,webp',
        ],[
            'name.required' => 'Kategori İsmi Giriniz',
            'description.required' => 'Kategori Açıklaması Giriniz',
            'file.mimes' => 'Sadece png,jpg,jpeg,webp',
            'price.required' => 'Fiyat Giriniz',
        ]);
        $menu=Menu::where('id',$id)->first();
        $image=$menu->image;
        if($request->hasFile('file')){
            $img = $request->file('file');
            $image=$img->store('public/images');
        };
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        $notification = array(
           'message' => 'Menü Başarıyla Güncellendi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.menu')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::where('id',$id)->first();
       Storage::delete($menu->image);
       $menu->delete();
       $notification = array(
           'message' => 'Menü Başarıyla Silindi',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.menu')->with($notification);
    }
}
