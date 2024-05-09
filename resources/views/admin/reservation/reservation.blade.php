@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Reservasyon Listesi</h3>
          <a href="{{route('admin.category.create')}}" class="float-right btn btn-primary" type="button"  href="{{route('admin.category.create')}}">Reservasyon Ekle</a>
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
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 4.0
              </td>
              <td>Win 95+</td>
              <td> 4</td>
              <td>X</td>
            </tr>
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 5.0
              </td>
              <td>Win 95+</td>
              <td>5</td>
              <td>C</td>
            </tr>

            <tr>
              <td>Other browsers</td>
              <td>All others</td>
              <td>-</td>
              <td>-</td>
              <td>U</td>
            </tr>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
@endsection
