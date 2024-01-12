@extends('admin.index')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        {{-- @isset($title)
                            {{ $title }}
                        @else
                            Chưa có tiêu đề cho trang này
                        @endisset --}}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('license.editLicense',['id' => $license->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="name" name="name" class="form-control" placeholder="Enter ..."
                                        value="{{ old('name', $license->name )}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="summernote">{!! $license->description !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Image</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="image" type="file" accept=".jpg, .png"
                                            onchange="previewImage('image')">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img id="image_preview" style="max-width: 100%; max-height: 200px;" src="{{ asset('storage/images/' . $license->image) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        function previewImage(typeImage) {
            var fileImage = document.querySelector('input[name=' + typeImage + ']').files[0];
            if (fileImage) {
                var mediabase64data;
                getBase64(fileImage).then(
                    mediabase64data => $('#' + typeImage + '_preview').attr('src', mediabase64data)
                );
            }
        }
        function getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            });
        }
    </script>
@endsection
@section('scripts')
@endsection
