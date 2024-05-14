@extends('admin.layouts.admin_master')
@section('content')
    <form method="POST" action="{{ route('admin.table.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label ">Masa Adı-Numarası</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Misafir Sayısı</label>
            <select class="form-control @error('guest_number') is-invalid @enderror" aria-label="Default select example"
                name="guest_number">
                <option selected>Masa Kapasitesi</option>
                @for ($i = 1; $i <= 30; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                @error('guest_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="location" class="form-label">Masa Konumu</label>
                <select class="form-control @error('location') is-invalid @enderror" aria-label="Default select example"
                    name="location">
                    <option selected>Masa Konumu</option>
                    <option value="indoor">İçeri</option>
                    <option value="outdoor">Dışarı</option>
                    <option value="window">Pencere Kenarı</option>


                    @error('location')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Masa Ekle</button>
    </form>
@endsection
