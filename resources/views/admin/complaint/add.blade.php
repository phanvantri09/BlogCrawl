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
                            <div class="col-sm-12">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Head image</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this,1)" multiple="" name="headImg[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('headImg')
                                    <div class="alert alert-danger">{{ $errors->first('headImg') }}</div>
                                    @enderror
                                    <div id="image-preview-container1" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                    <div class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Number phone</label>
                                    <input class="form-control" name="mobile" rows="3"
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
                                    <input class="form-control" name="zalo" rows="3"
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
                            <div class="col-sm-12">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this,2)" multiple="" name="img[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('img')
                                    <div class="alert alert-danger">{{ $errors->first('img') }}</div>
                                    @enderror
                                    <div id="image-preview-container2" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                    <div class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- select -->
                                <div class="form-group">
                                    <label>replenishImg</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this,3)" multiple="" name="replenishImg[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('img')
                                    <div class="alert alert-danger">{{ $errors->first('replenishImg') }}</div>
                                    @enderror
                                    <div id="image-preview-container3" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                    <div class="d-flex flex-row mb-3 mt-3">
                                    </div>
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

        function getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            });
        }
    </script>

    <script>
        $(".browseImageMain").on("click", function() {
            var file = $(this).parents().find(".imageMain");
            file.trigger("click");
            console.log(123);
        });
        $('input[name="imageMain"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#fileImageMain").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewImageMain").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        $(document).on("click", ".browseImageSlide", function() {
            var file = $(this).parents().find(".imageSlide");
            file.trigger("click");
        });
        $('input[name="imageSlide"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#fileImageSlide").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewImageSlide").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        $(document).on("click", ".browseImageItem0", function() {
            var file = $(this).parents().find(".imageItem0");
            file.trigger("click");
        });
        $('input[name="imageItem0"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#fileImageItem0").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewImageItem0").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        $(document).ready(function() {
            var max_fields_limit = 100; 
            
            var html = '';
            $('.add_more_button').click(function(e) {
                var index = $('.imageItemcount').length + 1; //initialize counter for text box
                var indexX = index + 1;
                e.preventDefault();
                html =
                    '<div class="row imageItemcount">' +
                    '<div class="col-sm-3">' +
                    '<div class="form-group">' +
                    '<label>Ảnh Thành Phần ' + indexX + '</label>' +
                    '<div id="image-form">' +
                    '<input type="file" name="headImg' + index + '" class="headImg' + index +
                    '" accept="image/*">' +
                    '<div class="input-group my-3">' +
                    '<input type="text" class="form-control" disabled placeholder="Upload File" id="fileImageItem' +
                    index + '">' +
                    '<div class="input-group-append">' +
                    '<button type="button" class="browseImageItem' + index +
                    ' btn btn-primary">Tải lên</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-9">' +
                    '<img src="https://placehold.it/80x80" id="previewImageItem' + index +
                    '" class="img-thumbnail">' +
                    '</div>' +
                    '</div>';

                $('.imageAllItem').append(html);

                $(document).on("click", ".browseImageItem" + index, function() {
                    var file = $(this).parents().find(".headImg" + index);
                    file.trigger("click");
                });
                $('input[name="img' + index + '"]').change(function(e) {
                    var fileName = e.target.files[0].name;
                    $("#fileImageItem" + index).val(fileName);

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // get loaded data and render thumbnail.
                        document.getElementById("previewImageItem" + index).src = e.target
                            .result;
                    };
                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                });
            });//set limit for maximum input fields

            $('.add_more_button').click(function(e) {
                var index = $('.imageItemcount').length + 1; //initialize counter for text box
                var indexX = index + 1;
                e.preventDefault();
                html =
                    '<div class="row imageItemcount">' +
                    '<div class="col-sm-3">' +
                    '<div class="form-group">' +
                    '<label>Ảnh Thành Phần ' + indexX + '</label>' +
                    '<div id="image-form">' +
                    '<input type="file" name="img' + index + '" class="img' + index +
                    '" accept="image/*">' +
                    '<div class="input-group my-3">' +
                    '<input type="text" class="form-control" disabled placeholder="Upload File" id="fileImageItem' +
                    index + '">' +
                    '<div class="input-group-append">' +
                    '<button type="button" class="browseImageItem' + index +
                    ' btn btn-primary">Tải lên</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-9">' +
                    '<img src="https://placehold.it/80x80" id="previewImageItem' + index +
                    '" class="img-thumbnail">' +
                    '</div>' +
                    '</div>';

                $('.imageAllItem').append(html);

                $(document).on("click", ".browseImageItem" + index, function() {
                    var file = $(this).parents().find(".img" + index);
                    file.trigger("click");
                });
                $('input[name="img' + index + '"]').change(function(e) {
                    var fileName = e.target.files[0].name;
                    $("#fileImageItem" + index).val(fileName);

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // get loaded data and render thumbnail.
                        document.getElementById("previewImageItem" + index).src = e.target
                            .result;
                    };
                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                });
            });

        });
    </script>
@endsection
@section('scripts')
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
        $(function () {
            // Summernote
            $('#summernoteDescription').summernote()
        })

        let noimage =
            "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

        function readURL3(input, index) {
            $("#image-preview-container"+index).empty();

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let imgPreview = $('<img style="width: 200px;height: 200px; object-fit: cover;" class="rounded mr-3"  />');
                        imgPreview.attr("src", e.target.result);
                        $("#image-preview-container"+index).append(imgPreview);
                    };

                    reader.readAsDataURL(input.files[i]);
                }
            } else {
                let imgPreview = $('<img style="width: 200px;height: 200px; object-fit: cover;" class="rounded mr-3"  />');
                imgPreview.attr("src", noimage);
                $("#image-preview-container"+index).append(imgPreview);
            }
        }
    </script>
@endsection

