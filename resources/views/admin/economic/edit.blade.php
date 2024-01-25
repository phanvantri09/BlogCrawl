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
                    <form action="{{ route('economic.editEconomic', ['id' => $economic->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="is_event">Is Event:</label>
                                    <select class="form-control" id="is_event" name="is_event">
                                        <option value="0" {{ old('is_event', $economic->is_event) == 0 ? 'selected' : '' }}>Là event</option>
                                        <option value="1" {{ old('is_event', $economic->is_event) == 1 ? 'selected' : '' }}>Là content</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Country translate</label>
                                    <input class="form-control" name="country_translate" rows="3"
                                        value="{{ empty(old('country_translate', $economic->country_translate)) ? '' : old('country_translate', $economic->country_translate) }}"
                                        placeholder="Enter ...">
                                    @error('country_translate')
                                        <div class="alert alert-danger">{{ $errors->first('country_translate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Region translate</label>
                                    <input class="form-control" name="region_translate" rows="3"
                                        value="{{ empty(old('region_translate',$economic->region_translate)) ? '' : old('region_translate', $economic->region_translate) }}"
                                        placeholder="Enter ...">
                                    @error('region_translate')
                                        <div class="alert alert-danger">{{ $errors->first('region_translate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Event translate</label>
                                    <input class="form-control" name="events_translate" rows="3"
                                        value="{{ empty(old('events_translate',$economic->events_translate)) ? '' : old('events_translate',$economic->events_translate) }}"
                                        placeholder="Enter ...">
                                    @error('events_translate')
                                        <div class="alert alert-danger">{{ $errors->first('events_translate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Event</label>
                                    <input class="form-control" name="events" rows="3"
                                        value="{{ empty(old('events',$economic->events)) ? '' : old('events',$economic->events) }}" placeholder="Enter ...">
                                    @error('events')
                                        <div class="alert alert-danger">{{ $errors->first('events') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>pub_time_tz_ori</label>
                                    <input class="form-control" name="pub_time_tz_ori" rows="3"
                                        value="{{ empty(old('pub_time_tz_ori', $economic->pub_time_tz_ori)) ? '' : old('pub_time_tz_ori',$economic->pub_time_tz_ori) }}"
                                        placeholder="Enter ...">
                                    @error('pub_time_tz_ori')
                                        <div class="alert alert-danger">{{ $errors->first('pub_time_tz_ori') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>tz</label>
                                    <input class="form-control" name="tz" rows="3"
                                        value="{{ empty(old('tz',$economic->tz)) ? '' : old('tz',$economic->tz) }}" placeholder="Enter ...">
                                    @error('tz')
                                        <div class="alert alert-danger">{{ $errors->first('tz') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>previous</label>
                                    <input class="form-control" name="previous" rows="3"
                                        value="{{ empty(old('previous',$economic->previous)) ? '' : old('previous',$economic->previous) }}"
                                        placeholder="Enter ...">
                                    @error('previous')
                                        <div class="alert alert-danger">{{ $errors->first('previous') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>consensus</label>
                                    <input class="form-control" name="consensus" rows="3"
                                        value="{{ empty(old('consensus',$economic->consensus)) ? '' : old('consensus',$economic->consensus) }}"
                                        placeholder="Enter ...">
                                    @error('consensus')
                                        <div class="alert alert-danger">{{ $errors->first('consensus') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>actual</label>
                                    <input class="form-control" name="actual" rows="3"
                                        value="{{ empty(old('actual',$economic->actual)) ? '' : old('actual',$economic->actual) }}" placeholder="Enter ...">
                                    @error('actual')
                                        <div class="alert alert-danger">{{ $errors->first('actual') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>translate</label>
                                    <textarea class="form-control" name="translate" rows="3" placeholder="Enter ...">{{ empty(old('translate',$economic->translate)) ? '' : old('translate',$economic->translate) }}</textarea>
                                    @error('translate')
                                        <div class="alert alert-danger">{{ $errors->first('translate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>country_flag</label>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Tải ảnh<input name="country_flag" type="file" accept=".jpg, .png"
                                            onchange="previewImage('country_flag')">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img id="country_flag_preview"src="{{ App\Helpers\ConstCommon::getLinkIMG($economic->country_flag) }}" style="max-width: 100%; max-height: 200px;">
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
