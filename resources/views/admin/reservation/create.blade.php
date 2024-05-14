@extends('admin.layouts.admin_master')
@section('content')
    <form method="POST" action="{{ route('admin.reservation.store') }}">
        @csrf
        <div class="row">
        <div class="mb-3 col-md-6">
            <label for="first_name" class="form-label ">Adı</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3 col-md-6">
            <label for="last_name" class="form-label ">Soyadı</label></label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
            @error('last_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="email" class="form-label ">E-mail</label></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3 col-md-6">
            <label for="phone" class="form-label ">Telefon</label></label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-6" >
            <label for="table_id" class="form-label">Rezervasyon Yapılacak Masa</label>
            <select name="table_id" class="form-control @error('table_id') is-invalid @enderror">
                <option value="">Masa Seçiniz</option>
                @foreach ($tables as $table)
                <option value="{{ $table->id }}">{{ $table->name }} ({{$table->guest_number}} Kişilik)</option>
                @endforeach
                @error('table_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>
        <div class="mb-3 col-md-6" >
            <label for="res_date" class="form-label">Reservasyon Saati</label>
            <input type="datetime-local" class="form-control @error('res_date') is-invalid @enderror" name="res_date">
        </div>
    </div>
    <div class="mb-3 col-md-6" >
            <label for="guest_number" class="form-label">Rezervasyon Yapılacak Kişi</label>
            <select name="guest_number" class="form-control @error('guest_number') is-invalid @enderror">
                <option value="">Kişi Sayısı</option>
                @for ($i = 1; $i <= 50; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('guest_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Rezervasyon Ekle</button>
    </form>
@endsection
