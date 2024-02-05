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
    <link rel="stylesheet" href="./css/account.css">
    <title>TinFXGold</title>

</head>

<body>
    <div class="bg-account d-md-flex d-block">
        <div class="container d-flex flex-column">
            <h1 class="text-md-left text-center py-2">TinFXGold</h1>
            <div class="row flex-md-row flex-column-reverse align-items-center form-login">
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="bg-white border rounded p-md-5 p-3 text-center">
                        <h4>Xác thực tài khoản</h4>
                        <form action="{{ route('vertify') }}" method="post">
                            @csrf
                            <div class="input-group my-3">
                                <input type="text" placeholder="Email or number phone" class="form-control"
                                name="email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                                <div class="input-group-append"></div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill px-4"><b>Xác thực</b></button>
                        </form>
                        <div class="col-sm-12 pt-4"><b class="text-danger">Lưu ý:</b> <br>
                            1. nhập email bạn sẽ nhận được liên kết đổi mật khẩu gửi về mail đã đăng ký. <br>
                            2. Nhập số điện thoại bạn sẽ nhận dc OTP về Số điện thoại đã đăng ký.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
