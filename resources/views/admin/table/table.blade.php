@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Masa Listesi</h3>
          <a href="{{route('admin.table.create')}}" class="float-right btn btn-primary" type="button"  href="{{route('admin.category.create')}}">Masa Ekle</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th></th>
              <th>Masa Adı</th>
              <th>Masa Kapasitesi</th>
              <th>Durumu</th>
              <th>Konumu</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tables as $key=> $item )
<tr>
            <td>{{{$key+1}}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->guest_number}}</td>

              <td>
                @if ($item->status=='available')
                Boş
                @elseif($item->status=='reserved')
                Rezerve
                @endif
              </td>
              <td>
                @if ($item->location=='indoor')
                İçeri
                @elseif ($item->location=='outdoor')
                Dışarı
                @else
                Pencere Kenarı
                @endif
            </td>
              <td><a href="{{route('admin.table.edit',$item->id)}}" class="btn btn-warning">Düzenle</a> &nbsp;
                <a href="{{route('admin.table.destroy',$item->id)}}" id="delete" class="btn btn-danger">Sil</a></td>

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
