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
                    <form action="{{ route('complaint.addComplaint') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Complaint Name</label>
                                    <input class="form-control" name="complaintName" rows="3"
                                        value="{{ empty(old('complaintName')) ? '' : old('complaintName') }}"
                                        placeholder="Enter ...">
                                    @error('complaintName')
                                        <div class="alert alert-danger">{{ $errors->first('complaintName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Head image</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="headImg[]" type="file" accept=".jpg, .png"
                                            onchange="previewImage('headImg')">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="headImg_preview"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Number phone</label>
                                    <input class="form-control" type="number" name="mobile" rows="3"
                                        value="{{ empty(old('mobile')) ? '' : old('mobile') }}" placeholder="Enter ...">
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $errors->first('mobile') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Money</label>
                                    <input class="form-control" name="money" rows="3"
                                        value="{{ empty(old('money')) ? '' : old('money') }}" placeholder="Enter ...">
                                    @error('money')
                                        <div class="alert alert-danger">{{ $errors->first('money') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ten san khieu nai</label>
                                    <input class="form-control" name="nickname" rows="3"
                                        value="{{ empty(old('nickname')) ? '' : old('nickname') }}" placeholder="Enter ...">
                                    @error('nickname')
                                        <div class="alert alert-danger">{{ $errors->first('nickname') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ten that san khieu nai</label>
                                    <input class="form-control" name="realname" rows="3"
                                        value="{{ empty(old('realname')) ? '' : old('realname') }}" placeholder="Enter ...">
                                    @error('realname')
                                        <div class="alert alert-danger">{{ $errors->first('realname') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Zalo</label>
                                    <input class="form-control" type="number" name="zalo" rows="3"
                                        value="{{ empty(old('zalo')) ? '' : old('zalo') }}" placeholder="Enter ...">
                                    @error('zalo')
                                        <div class="alert alert-danger">{{ $errors->first('zalo') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote">{{ empty(old('content')) ? '' : old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>image</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="img[]" type="file" accept=".jpg, .png" multiple
                                            onchange="previewImage('img', 'img_preview')">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="img_preview"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>replenishImg</label>
                                    <textarea class="form-control" name="replenishImg" rows="3" placeholder="Enter ...">{{ empty(old('replenishImg')) ? '' : old('replenishImg') }}</textarea>
                                    @error('replenishImg')
                                        <div class="alert alert-danger">{{ $errors->first('replenishImg') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>replenishContent</label>
                                    <textarea class="form-control" name="replenishContent" rows="3" placeholder="Enter ...">{{ empty(old('replenishContent')) ? '' : old('replenishContent') }}</textarea>
                                    @error('replenishContent')
                                        <div class="alert alert-danger">{{ $errors->first('replenishContent') }}</div>
                                    @enderror
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

        function previewImage(typeImage, previewId) {
            var fileInput = document.querySelector('input[name="' + typeImage + '[]"]');
            var fileImages = fileInput.files;
            var imagePreview = $('#' + previewId);
            var imageNames = [];
            var promises = [];

            for (var i = 0; i < fileImages.length; i++) {
                var fileImage = fileImages[i];

                if (fileImage) {
                    promises.push(
                        getBase64(fileImage).then(function(mediabase64data) {
                            var image = document.createElement('img');
                            image.src = mediabase64data;
                            image.style.maxWidth = '100%';
                            image.style.maxHeight = '200px';
                            imagePreview.append(image);
                        })
                    );

                    imageNames.push(fileImage.name);
                }
            }

            Promise.all(promises).then(function() {
                var imageNamesInput = document.querySelector('input[name="' + typeImage + '_names"]');
                imageNamesInput.value = imageNames.join(',');
            });
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
