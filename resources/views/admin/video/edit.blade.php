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
                    <form action="{{ route('video.editVideo',['id' => $video->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter ..."
                                        value="{{ old('title', $video->title)}}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Nội Dung </label>
                                    <textarea name="content" id="summernote">{!! $video->content !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Head image</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="headImg" type="file" accept=".jpg, .png"
                                            onchange="previewImage('headImg')">
                                    </label>
                                </div>
                            </div>
                            @if ($video->headImg)
                            <div class="col-sm-6">
                                <img id="headImg_preview" style="max-width: 100%; max-height: 200px;"
                                    src="{{ asset('storage/images/' . $video->headImg) }}">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="linkUrl" class="form-control"  value="{{ $video->linkUrl }} placeholder="Enter ..."
                                        value="{{ old('linkUrl, $video->title') }}">
                                    @error('linkUrl')
                                        <div class="alert alert-danger">{{ $errors->first('linkUrl') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Video name</label>
                                    <input type="text" name="videoName" class="form-control"  value="{{ $video->videoName }} placeholder="Enter ..."
                                        value="{{ old('videoName, $video->videoName') }}">
                                    @error('videoName')
                                        <div class="alert alert-danger">{{ $errors->first('videoName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Video file name</label>
                                    <textarea class="form-control" name="videoFileName" rows="3" placeholder="Enter ...">{!! $video->videoFileName !!}</textarea>
                                    @error('videoFileName')
                                        <div class="alert alert-danger">{{ $errors->first('videoFileName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" name="url" class="form-control"  value="{{ $video->url }} placeholder="Enter ..."
                                        value="{{ old('url') }}">
                                    @error('url')
                                        <div class="alert alert-danger">{{ $errors->first('url') }}</div>
                                    @enderror
                                </div>
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
