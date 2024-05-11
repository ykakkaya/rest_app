@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Menu Listesi</h3>
          <a href="{{route('admin.menu.create')}}" class="float-right btn btn-primary" type="button"  href="{{route('admin.category.create')}}">Menu Ekle</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th></th>
              <th>Menu Adı</th>
              <th>Menu Açıklama</th>
              <th>Menu Resmi</th>
              <th>Menu Fiyatı</th>
              <th>Kategori</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($menus as $key=> $item )
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->description}}</td>
              <td> <img src="{{Storage::url($item->image)}}" width="80"></td>
              <td>{{$item->price}} tl</td>
              <td>{{$item->category->name}}</td>
              <td><a href="{{route('admin.menu.edit',$item->id)}}" class="btn btn-warning">Düzenle</a> &nbsp;
                <a href="{{route('admin.menu.destroy',$item->id)}}" id="delete" class="btn btn-danger">Sil</a>
            </td>
            </tr>
            @endforeach
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
@endsection
