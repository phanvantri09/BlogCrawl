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
                    <form action="{{ route('broker.addBroker') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>resolutionRate</label>
                                    <input class="form-control" name="resolutionRate" rows="3"
                                        value="{{ empty(old('resolutionRate')) ? '' : old('resolutionRate') }}"
                                        placeholder="Enter ...">
                                    @error('resolutionRate')
                                        <div class="alert alert-danger">{{ $errors->first('resolutionRate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>leverMax</label>
                                    <input class="form-control" name="leverMax" rows="3"
                                        value="{{ empty(old('leverMax')) ? '' : old('leverMax') }}"
                                        placeholder="Enter ...">
                                    @error('leverMax')
                                        <div class="alert alert-danger">{{ $errors->first('leverMax') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>facebookLink</label>
                                    <input type="text" name="facebookLink" class="form-control" placeholder="Enter ..."
                                        value="{{ old('facebookLink') }}">
                                    @error('facebookLink')
                                        <div class="alert alert-danger">{{ $errors->first('facebookLink') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>firstCountryLogo</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this)" multiple="" name="firstCountryLogo[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('firstCountryLogo')
                                    <div class="alert alert-danger">{{ $errors->first('firstCountryLogo') }}</div>
                                    @enderror
                                    <div id="image-preview-container" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this)" multiple="" name="img[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('img')
                                    <div class="alert alert-danger">{{ $errors->first('img') }}</div>
                                    @enderror
                                    <div id="image-preview-container" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>licenseName</label>
                                    <input class="form-control" name="licenseName" rows="3"
                                        value="{{ empty(old('licenseName')) ? '' : old('licenseName') }}" placeholder="Enter ...">
                                    @error('licenseName')
                                        <div class="alert alert-danger">{{ $errors->first('licenseName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>logo</label>
                                    <div class="custom-file">
                                        <input onchange="readURL3(this)" multiple="" name="logo[]" type="file" class="custom-file-input" id="inputFileImageItem" accept="image/*">
                                        <label class="custom-file-label" for="inputFileImageItem">Chọn ảnh</label>
                                    </div>
                                    @error('logo')
                                    <div class="alert alert-danger">{{ $errors->first('logo') }}</div>
                                    @enderror
                                    <div id="image-preview-container" class="d-flex flex-row mb-3 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>nickname</label>
                                    <input class="form-control" name="nickname" rows="3"
                                        value="{{ empty(old('nickname')) ? '' : old('nickname') }}" placeholder="Enter ...">
                                    @error('money')
                                        <div class="alert alert-danger">{{ $errors->first('nickname') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>peoples</label>
                                    <input class="form-control" name="peoples" rows="3"
                                        value="{{ empty(old('peoples')) ? '' : old('peoples') }}" placeholder="Enter ...">
                                    @error('peoples')
                                        <div class="alert alert-danger">{{ $errors->first('peoples') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>skypeLink</label>
                                    <input class="form-control" name="skypeLink" rows="3"
                                        value="{{ empty(old('skypeLink')) ? '' : old('skypeLink') }}" placeholder="Enter ...">
                                    @error('skypeLink')
                                        <div class="alert alert-danger">{{ $errors->first('skypeLink') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>telegramLink</label>
                                    <input class="form-control" name="telegramLink" rows="3"
                                        value="{{ empty(old('telegramLink')) ? '' : old('telegramLink') }}" placeholder="Enter ...">
                                    @error('telegramLink')
                                        <div class="alert alert-danger">{{ $errors->first('telegramLink') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>twitterLink</label>
                                    <input class="form-control" name="twitterLink" rows="3"
                                        value="{{ empty(old('twitterLink')) ? '' : old('twitterLink') }}" placeholder="Enter ...">
                                    @error('twitterLink')
                                        <div class="alert alert-danger">{{ $errors->first('twitterLink') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>website</label>
                                    <input class="form-control" name="website" rows="3"
                                        value="{{ empty(old('website')) ? '' : old('website') }}" placeholder="Enter ...">
                                    @error('website')
                                        <div class="alert alert-danger">{{ $errors->first('website') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>youtubeLink</label>
                                    <input class="form-control" name="youtubeLink" rows="3"
                                        value="{{ empty(old('youtubeLink')) ? '' : old('youtubeLink') }}" placeholder="Enter ...">
                                    @error('youtubeLink')
                                        <div class="alert alert-danger">{{ $errors->first('youtubeLink') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>zaloLink</label>
                                    <input class="form-control" name="zaloLink" rows="3"
                                        value="{{ empty(old('zaloLink')) ? '' : old('zaloLink') }}" placeholder="Enter ...">
                                    @error('zaloLink')
                                        <div class="alert alert-danger">{{ $errors->first('zaloLink') }}</div>
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
                                <div class="form-group">
                                    <label>platformLicenseList</label>
                                    <textarea class="form-control" name="platformLicenseList" rows="3" placeholder="Enter ...">{{ empty(old('platformLicenseList')) ? '' : old('platformLicenseList') }}</textarea>
                                    @error('platformLicenseList')
                                        <div class="alert alert-danger">{{ $errors->first('platformLicenseList') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>lookImgList</label>
                                    <textarea class="form-control" name="lookImgList" rows="3" placeholder="Enter ...">{{ empty(old('lookImgList')) ? '' : old('lookImgList') }}</textarea>
                                    @error('lookImgList')
                                        <div class="alert alert-danger">{{ $errors->first('lookImgList') }}</div>
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
                    '<input type="file" name="firstCountryLogo' + index + '" class="firstCountryLogo' + index +
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
                    var file = $(this).parents().find(".firstCountryLogo" + index);
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

        function readURL(input) {
            console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img-preview").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#img-preview").attr("src", noimage);
            }
        }

        function readURL2(input) {
            console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img-preview2").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#img-preview2").attr("src", noimage);
            }
        }

        function readURL3(input) {
            $("#image-preview-container").empty();

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let imgPreview = $('<img style="width: 200px;height: 200px; object-fit: cover;" class="rounded mr-3"  />');
                        imgPreview.attr("src", e.target.result);
                        $("#image-preview-container").append(imgPreview);
                    };

                    reader.readAsDataURL(input.files[i]);
                }
            } else {
                let imgPreview = $('<img style="width: 200px;height: 200px; object-fit: cover;" class="rounded mr-3"  />');
                imgPreview.attr("src", noimage);
                $("#image-preview-container").append(imgPreview);
            }
        }
    </script>
@endsection

