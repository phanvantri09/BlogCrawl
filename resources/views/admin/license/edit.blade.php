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
                    <form action="{{ route('license.editLicense', ['id' => $license->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter ..."
                                        value="{{ old('address', $license->address) }}">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Country logo</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="countryLogo" type="file" accept=".jpg, .png"
                                            onchange="previewImage('countryLogo')">
                                    </label>
                                </div>
                            </div>
                            @if ($license->countryLogo)
                            <div class="col-sm-6">
                                <img id="countryLogo_preview" alt="" src="{{ App\Helpers\ConstCommon::getLinkIMG($license->countryLogo) }}" style="max-width: 100%; max-height: 200px;">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter ..."
                                        value="{{ old('email', $license->email)}}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" name="fax" class="form-control" placeholder="Enter ..."
                                        value="{{ old('fax', $license->fax)}}">
                                    @error('fax')
                                        <div class="alert alert-danger">{{ $errors->first('fax') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>License logo</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="licenseLogo" type="file" accept=".jpg, .png"
                                            onchange="previewImage('licenseLogo')">
                                    </label>
                                </div>
                            </div>
                            @if ($license->licenseLogo)
                            <div class="col-sm-6">
                                <img id="licenseLogo_preview" alt="" src="{{ App\Helpers\ConstCommon::getLinkIMG($license->licenseLogo) }}" style="max-width: 100%; max-height: 200px;">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>License name</label>
                                    <input type="text" name="licenseName" class="form-control" placeholder="Enter ..."
                                        value="{{ old('licenseName', $license->licenseName)}}">
                                    @error('licenseName')
                                        <div class="alert alert-danger">{{ $errors->first('licenseName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>organizationName</label>
                                    <input type="text" name="organizationName" class="form-control" placeholder="Enter ..."
                                        value="{{ old('organizationName',$license->organizationName) }}">
                                    @error('organizationName')
                                        <div class="alert alert-danger">{{ $errors->first('organizationName') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>registrationCode</label>
                                    <input type="text" name="registrationCode" class="form-control" placeholder="Enter ..."
                                        value="{{ old('registrationCode', $license->registrationCode) }}">
                                    @error('registrationCode')
                                        <div class="alert alert-danger">{{ $errors->first('registrationCode') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>regulatoryEffectiveTime</label>
                                    <input type="text" name="regulatoryEffectiveTime" class="form-control" placeholder="Enter ..."
                                        value="{{ old('regulatoryEffectiveTime',$license->regulatoryEffectiveTime) }}">
                                    @error('regulatoryEffectiveTime')
                                        <div class="alert alert-danger">{{ $errors->first('regulatoryEffectiveTime') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>regulatoryLicense</label>
                                    <input type="text" name="regulatoryLicense" class="form-control" placeholder="Enter ..."
                                        value="{{ old('regulatoryLicense',$license->regulatoryLicense) }}">
                                    @error('regulatoryLicense')
                                        <div class="alert alert-danger">{{ $errors->first('regulatoryLicense') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>tel</label>
                                    <input type="text" name="tel" class="form-control" placeholder="Enter ..."
                                        value="{{ old('tel',$license->tel) }}">
                                    @error('tel')
                                        <div class="alert alert-danger">{{ $errors->first('tel') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>website</label>
                                    <input type="text" name="website" class="form-control" placeholder="Enter ..."
                                        value="{{ old('website', $license->website) }}">
                                    @error('website')
                                        <div class="alert alert-danger">{{ $errors->first('website') }}</div>
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
