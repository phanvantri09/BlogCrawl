@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>&nbsp;
            <span>Back</span>
        </a>
    </div>
    <div class="main-content-container px-3 py-2">
        <h4 class="text-center">Cập nhật thông tin cá nhân</h4>
        <form action="">
            <div class="form-img">
                <img src="" id="img-avt" alt="">
                <br><label for="img" class="pt-2">Chọn ảnh</label>
                <input style="display: none" type="file" class="form-control form-img-input" id="img" name="img"
                    accept="image/*">
                    
            </div>



            <div class="form-group">
                <label for="formGroupExampleInput">Họ tên</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nhập đầy đủ họ tên">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Số điện thoại</label>
                <input type="tel" class="form-control" id="formGroupExampleInput2"
                    placeholder="Vui lòng nhập số điện thoại">
            </div>

            <button class="btn btn-success ">Lưu thông tin</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Initialize and configure your Slick Slider -->
    <script>
        $(".form-img-input").change(function(e) {
            var file = e.originalEvent.srcElement.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#img-avt').attr('src',reader.result);
            }
            reader.readAsDataURL(file);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.slider-box').slick({
                infinite: true,
                slidesToShow: 3,
                centerMode: true,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            centerMode: false,
                        }
                    },
                    {
                        breakpoint: 567,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false
                        }
                    }
                ]
            });
            $('.slider-short-video-card').slick({
                slidesToShow: 3,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2

                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 567,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });
        });
    </script>
@endsection
