@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategori Listesi</h3>
          <a href="{{route('admin.category.create')}}" class="float-right btn btn-primary" type="button"  href="{{route('admin.category.create')}}">Yeni Kategori Ekle</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th></th>
              <th>Kategori Adı</th>
              <th>Kategori Açıklama</th>
              <th>Kategori Resmi</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key=> $item )


            <tr>
              <td>{{{$key+1}}}</td>
              <td>{{$item->name}}</td>

              <td>{{$item->description}}</td>
              <td> <img src="{{Storage::url($item->image)}}" style="width: 80px"></td>
              <td><a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-warning">Düzenle</a> &nbsp;
                <a href="{{route('admin.category.destroy',$item->id)}}" class="btn btn-danger">Sil</a></td>
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
