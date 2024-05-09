@extends('admin.layouts.admin_master')
@section('content')
<form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Kategori Adı</label>
      <input type="text" class="form-control" name="name">

    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Açıklama</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Kategori Resmi</label>
        <input type="file" class="form-control" name="file">
      </div>

    <button type="submit" class="btn btn-primary">Kategori Ekle</button>
  </form>
@endsection
