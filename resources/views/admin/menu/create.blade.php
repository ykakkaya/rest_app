@extends('admin.layouts.admin_master')
@section('content')
<form method="POST" action="{{route('admin.menu.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label @error('name') is-invalid @enderror">Menu Adı</label>
      <input type="text" class="form-control" name="name">
      @error('name')
      <span class="alert alert-danger">{{ $message }}</span>
      @enderror

    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Açıklama</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
     @error('description')
     <span class="alert alert-danger">{{ $message }}</span>
     @enderror
    </div>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="file" class="form-label">Menu Resmi</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">
            @error('file')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <img src="" id="showImage" style="width: 30%">
        </div>
    </div>
<div class="row">
        <div class="mb-3 col-md-6">
            <label for="file" class="form-label">Menu Kategori</label>

            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Kategori Seçiniz</option>
            @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            </select>
            @error('category_id')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="file" class="form-label">Menu Fiyat</label>
            <input type="text" class="form-control" name="price" placeholder="Fiyat">
         </div>
        </div>

    <button type="submit" class="btn btn-primary">Menu Ekle</button>
  </form>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#file').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
