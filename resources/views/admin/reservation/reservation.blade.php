@extends('admin.layouts.admin_master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reservasyon Listesi</h3>
                    <a href="{{ route('admin.reservation.create') }}" class="float-right btn btn-primary"
                        type="button">Reservasyon Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Reservasyon Yapan</th>
                                <th>E-mail</th>
                                <th>Telefon</th>
                                <th>Reservasyon Saati</th>
                                <th>Masa No</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                                <td>C</td>
                                <td>
                                    <a href="" class="btn btn-warning">Düzenle</a> &nbsp;
                                    <a href="" id="delete" class="btn btn-danger">Sil</a>
                                </td>


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
