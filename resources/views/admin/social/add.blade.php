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
                    <form action="{{ route('social.addSocial') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Facebook</label>
                                <textarea class="form-control" name="facebook" rows="3" placeholder="Enter ...">{{ empty(old('facebook')) ? '' : old('facebook') }}</textarea>
                                @error('facebook')
                                    <div class="alert alert-danger">{{ $errors->first('facebook') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Twitter</label>
                                <textarea class="form-control" name="twitter" rows="3" placeholder="Enter ...">{{ empty(old('twitter')) ? '' : old('twitter') }}</textarea>
                                @error('twitter')
                                    <div class="alert alert-danger">{{ $errors->first('twitter') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Telegram</label>
                                <textarea class="form-control" name="telegram" rows="3" placeholder="Enter ...">{{ empty(old('telegram')) ? '' : old('telegram') }}</textarea>
                                @error('telegram')
                                    <div class="alert alert-danger">{{ $errors->first('telegram') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Youtube</label>
                                <textarea class="form-control" name="youtube" rows="3" placeholder="Enter ...">{{ empty(old('youtube')) ? '' : old('youtube') }}</textarea>
                                @error('youtube')
                                    <div class="alert alert-danger">{{ $errors->first('youtube') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Web</label>
                                <textarea class="form-control" name="web" rows="3" placeholder="Enter ...">{{ empty(old('web')) ? '' : old('web') }}</textarea>
                                @error('web')
                                    <div class="alert alert-danger">{{ $errors->first('web') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Skype</label>
                                <textarea class="form-control" name="skype" rows="3" placeholder="Enter ...">{{ empty(old('skype')) ? '' : old('skype') }}</textarea>
                                @error('skype')
                                    <div class="alert alert-danger">{{ $errors->first('skype') }}</div>
                                @enderror
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
@endsection
@section('scripts')
@endsection
