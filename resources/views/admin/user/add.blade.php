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
                    <form action="{{ route('user.addPost') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter ...">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter ...">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="number_phone" name="number_phone" value="{{old('number_phone')}}" class="form-control" placeholder="Enter ...">
                                    @error('number_phone')
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter ...">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Loại người dùng</label>
                                    <select name="type" class="form-control">
                                        @foreach (\App\Helpers\ConstCommon::ListTypeUser as $key => $item)
                                            <option value="{{ $item }}"> {{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Image</label>
                                <label class="btn btn-primary btn-md btn-file">
                                  Tải ảnh<input name="image" type="file" accept=".jpg, .png" onchange="previewImage('image')">
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <img id="image_preview" style="max-width: 100%; max-height: 200px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter ...">
                                @error('address')
                                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Birthday</label>
                                  <input type="date" name="birthday" value="{{old('birthday')}}" class="form-control" placeholder="Enter ...">
                                  @error('birthday')
                                      <div class="alert alert-danger">{{ $errors->first('birthday') }}</div>
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
