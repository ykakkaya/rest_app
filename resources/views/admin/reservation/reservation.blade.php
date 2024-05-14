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

                            @foreach ($reservations as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->res_date)->format('d.m.Y H:i') }}</td>

                                    <td>{{ $item->table->name }}</td>

                                    <td>
                                        <a href="{{route('admin.reservation.edit',$item->id)}}" class="btn btn-warning">Düzenle</a> &nbsp;
                                        <a href="{{route('admin.reservation.destroy',$item->id)}}" id="delete" class="btn btn-danger">Sil</a>
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
