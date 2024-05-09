@extends('admin.layouts.admin_master')
@section('content')
<form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label @error('name') is-invalid @enderror">Kategori Adı</label>
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
            <label for="file" class="form-label">Kategori Resmi</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">
            @error('file')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <img src="" id="showImage" style="width: 30%">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Kategori Ekle</button>
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
