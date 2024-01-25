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
                    <form action="{{ route('post.editPost', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote">{{ empty(old('content' , $post->content)) ? '' : old('content', $post->content) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Facebook Url</label>
                                    <textarea class="form-control" name="facebookUrl" rows="3" placeholder="Enter ...">{{ empty(old('facebookUrl', $post->facebookUrl)) ? '' : old('facebookUrl',  $post->facebookUrl) }}</textarea>
                                    @error('facebookUrl')
                                        <div class="alert alert-danger">{{ $errors->first('facebookUrl') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link Url</label>
                                    <textarea class="form-control" name="linkUrl" rows="3" placeholder="Enter ...">{{ empty(old('linkUrl',  $post->linkUrl)) ? '' : old('linkUrl',  $post->linkUrl) }}</textarea>
                                    @error('linkUrl')
                                        <div class="alert alert-danger">{{ $errors->first('linkUrl') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Image</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="headImg" type="file" accept=".jpg, .png"
                                            onchange="previewImage('headImg')">
                                    </label>
                                </div>
                            </div>
                            @if ($post->headImg)
                            <div class="col-sm-6">
                                <img id="headImg_preview" style="max-width: 100%; max-height: 200px;"
                                src="{{ App\Helpers\ConstCommon::getLinkIMG($post->headImg) }}">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" rows="3" value="{{ empty(old('title', $post->title)) ? '' : old('title', $post->title) }}" placeholder="Enter ...">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Loại</label>
                                    <select name="id_category" class="form-control">
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}" @if ($categories->id === $post->id_category) selected @endif>{{ $categories->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video">Youtube Url</label>
                                    <textarea name="youtubeUrl" class="form-control">{{ empty(old('youtubeUrl',$post->youtubeUrl)) ? '' : old('youtubeUrl',$post->youtubeUrl) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
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
