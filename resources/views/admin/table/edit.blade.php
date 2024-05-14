@extends('admin.layouts.admin_master')
@section('content')
    <form method="POST" action="{{ route('admin.table.update', $table->id) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label ">Masa Adı-Numarası</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $table->name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Misafir Sayısı</label>
            <select class="form-control @error('guest_number') is-invalid @enderror" aria-label="Default select example"
                name="guest_number">

                @for ($i = 1; $i <= 30; $i++)
                <option value="{{ $i }}" {{ $i == $table->guest_number ? 'selected' : '' }}>{{ $i }}</option>
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
                    <option value="indoor" {{ $table->location == 'indoor' ?'selected' : '' }}>İçeri</option>
                    <option value="outdoor" {{ $table->location == 'outdoor' ?'selected' : '' }}>Dışarı</option>
                    <option value="window" {{ $table->location == 'window' ?'selected' : '' }}>Pencere Kenarı</option>
                    @error('location')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>

        </div>
        <div class="mb-3 col-md-12">
            <label for="status" class="form-label">Rezerve Durumu</label>
            <select class="form-control @error('status') is-invalid @enderror" aria-label="Default select example"
                name="status">

                <option value="available" {{ $table->status == 'available' ?'selected' : '' }}>Boş</option>
                <option value="pending" {{ $table->status == 'reserved' ?'selected' : '' }}>Rezerve</option>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Masa Düzenle</button>
    </form>
@endsection
