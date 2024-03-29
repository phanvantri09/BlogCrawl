<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/account.css') }}">
    <title>TinFXGold</title>

</head>

<body>
    <div class="bg-account d-md-flex d-block">
        <div class="container d-flex flex-column">
            <a href="{{ route('home') }}">
                <h1 class="text-md-left text-center py-2">TinFXGold</h1>
            </a>
            <div class="row flex-md-row flex-column-reverse align-items-center form-login">
                <div class="col-md-6 col-sm-12 col-12 text-register text-md-left text-center">
                    <div>Bạn chưa đăng ký?</div>
                    <button class="btn btn-secondary py-3 px-4 my-2 rounded-pill">
                        <a href="{{ route('register') }}" class="text-white text-decoration-none">Đăng Ký Ngay</a>
                    </button>
                </div>
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="bg-white border rounded p-md-5 p-3 text-center">
                        <h4>Đăng nhập</h4>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <input type="email" id="" placeholder="Email" class="form-control" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
                            @enderror
                            <div class="input-group my-3">
                                <input id="password" type="password" placeholder="Nhập mật khẩu" class="form-control"
                                    id="password" name="password" required="true" aria-label="password"
                                    aria-describedby="basic-addon1" />
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="show_eye" width="16"
                                            height="16" fill="currentColor" class="bi bi-eye-fill"
                                            viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="hide_eye" width="16"
                                            height="16" fill="currentColor" class="bi bi-eye-slash-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                            <path
                                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                                        </svg>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</div>
                                @enderror
                            </div>
                            <div class="form-group row my-3">
                                <div class="col-sm-6 text-left">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Nhớ mật khẩu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right"><a class="text-primary" href="{{ route('register') }}">Đăng ký</a>
                                    <br><a class="text-danger" href="{{ route('password.request') }}">Quên mật khẩu!</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill px-4"><b>Đăng nhập</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
</body>

</html>
