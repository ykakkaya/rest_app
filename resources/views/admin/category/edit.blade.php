@extends('admin.layouts.admin_master')
@section('content')
    <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kategori Adı</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="file" class="form-label">Kategori Resmi</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <div class="mb-3 col-md-6">
                <img src="{{ Storage::url($category->image) }}" id="showImage" style="width: 30%">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Kategori Düzenle</button>
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
