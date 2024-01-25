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
                    <form action="{{ route('blog.editBlog', ['id' => $blog->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="is_event">Is Event:</label>
                                    <select class="form-control" id="is_event" name="is_event">
                                        <option value="0">Là event</option>
                                        <option value="1">Là content</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>firstIncrease</label>
                                    <input class="form-control" name="firstIncrease" rows="3"
                                        value="{{ empty(old('firstIncrease', $blog->firstIncrease)) ? '' : old('firstIncrease', $blog->firstIncrease) }}"
                                        placeholder="Enter ...">
                                    @error('firstIncrease')
                                        <div class="alert alert-danger">{{ $errors->first('firstIncrease') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>secondIncrease</label>
                                    <input class="form-control" name="secondIncrease" rows="3"
                                        value="{{ empty(old('secondIncrease', $blog->secondIncrease)) ? '' : old('secondIncrease', $blog->secondIncrease) }}"
                                        placeholder="Enter ...">
                                    @error('secondIncrease')
                                        <div class="alert alert-danger">{{ $errors->first('secondIncrease') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>firstName</label>
                                    <input class="form-control" name="firstName" rows="3"
                                        value="{{ empty(old('firstName', $blog->firstName)) ? '' : old('firstName', $blog->firstName) }}"
                                        placeholder="Enter ...">
                                    @error('firstName')
                                        <div class="alert alert-danger">{{ $errors->first('firstName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>secondName</label>
                                    <input class="form-control" name="secondName" rows="3"
                                        value="{{ empty(old('secondName', $blog->secondName)) ? '' : old('secondName', $blog->secondName) }}"
                                        placeholder="Enter ...">
                                    @error('secondName')
                                        <div class="alert alert-danger">{{ $errors->first('secondName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>nickname</label>
                                    <input class="form-control" name="nickname" rows="3"
                                        value="{{ empty(old('nickname', $blog->nickName)) ? '' : old('nickname', $blog->nickName) }}"
                                        placeholder="Enter ...">
                                    @error('nickname')
                                        <div class="alert alert-danger">{{ $errors->first('nickname') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>title</label>
                                    <input class="form-control" name="title" rows="3"
                                        value="{{ empty(old('title', $blog->title)) ? '' : old('title', $blog->title) }}"
                                        placeholder="Enter ...">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>firstPrice</label>
                                    <input class="form-control" name="firstPrice" rows="3"
                                        value="{{ empty(old('firstPrice', $blog->firstPrice)) ? '' : old('firstPrice', $blog->firstPrice) }}"
                                        placeholder="Enter ...">
                                    @error('firstPrice')
                                        <div class="alert alert-danger">{{ $errors->first('firstPrice') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>secondPrice</label>
                                    <input class="form-control" name="secondPrice" rows="3"
                                        value="{{ empty(old('secondPrice', $blog->secondPrice)) ? '' : old('secondPrice', $blog->secondPrice) }}"
                                        placeholder="Enter ...">
                                    @error('secondPrice')
                                        <div class="alert alert-danger">{{ $errors->first('secondPrice') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>content</label>
                                    <input class="form-control" name="content" rows="3"
                                        value="{{ empty(old('content', $blog->content)) ? '' : old('content', $blog->content) }}"
                                        placeholder="Enter ...">
                                    @error('content')
                                        <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>details</label>
                                    <input class="form-control" name="details" rows="3"
                                        value="{{ empty(old('details', $blog->details)) ? '' : old('details', $blog->details) }}"
                                        placeholder="Enter ...">
                                    @error('details')
                                        <div class="alert alert-danger">{{ $errors->first('details') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Head Img</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="headImg" type="file" accept=".jpg, .png"
                                            onchange="previewImage('headImg')">
                                    </label>
                                </div>
                            </div>
                            @if ($blog->headImg)
                                <div class="col-sm-6">
                                    <img id="headImg_preview" src="{{ App\Helpers\ConstCommon::getLinkIMG($blog->headImg) }}"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Img</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="img" type="file" accept=".jpg, .png"
                                            onchange="previewImage('img')">
                                    </label>
                                </div>
                            </div>
                            @if ($blog->img)
                                <div class="col-sm-6">
                                    <img id="img_preview" src="{{ App\Helpers\ConstCommon::getLinkIMG($blog->img) }}"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>likeImgList</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="likeImgList" type="file" accept=".jpg, .png"
                                            onchange="previewImage('likeImgList')">
                                    </label>
                                </div>
                            </div>
                            @if ($blog->likeImgList)
                                <div class="col-sm-6">
                                    <img id="likeImgList_preview"
                                    src="{{ App\Helpers\ConstCommon::getLinkIMG($blog->likeImgList) }}"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>lookImgList</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="lookImgList" type="file" accept=".jpg, .png"
                                            onchange="previewImage('lookImgList')">
                                    </label>
                                </div>
                            </div>
                            @if ($blog->lookImgList)
                                <div class="col-sm-6">
                                    <img id="lookImgList_preview"
                                    src="{{ App\Helpers\ConstCommon::getLinkIMG($blog->lookImgList) }}"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                            @endif
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
