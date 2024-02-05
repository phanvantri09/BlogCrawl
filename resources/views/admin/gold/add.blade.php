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
                    <form action="{{ route('gold.addGold') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Goods translate</label>
                                    <input class="form-control" name="goods_translate" rows="3"
                                        value="{{ empty(old('goods_translate')) ? '' : old('goods_translate') }}"
                                        placeholder="Enter ...">
                                    @error('goods_translate')
                                        <div class="alert alert-danger">{{ $errors->first('goods_translate') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" type="date" name="date" rows="3"
                                        value="{{ empty(old('date')) ? '' : old('date') }}"
                                        placeholder="Enter ...">
                                    @error('date')
                                        <div class="alert alert-danger">{{ $errors->first('date') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Total stock</label>
                                    <input class="form-control" name="total_stock" rows="3"
                                        value="{{ empty(old('total_stock')) ? '' : old('total_stock') }}"
                                        placeholder="Enter ...">
                                    @error('total_stock')
                                        <div class="alert alert-danger">{{ $errors->first('total_stock') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>inc_or_dec</label>
                                    <input class="form-control" name="inc_or_dec" rows="3"
                                        value="{{ empty(old('inc_or_dec')) ? '' : old('inc_or_dec') }}"
                                        placeholder="Enter ...">
                                    @error('inc_or_dec')
                                        <div class="alert alert-danger">{{ $errors->first('inc_or_dec') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Total value</label>
                                    <input class="form-control" name="total_value" rows="3"
                                        value="{{ empty(old('total_value')) ? '' : old('total_value') }}"
                                        placeholder="Enter ...">
                                    @error('total_value')
                                        <div class="alert alert-danger">{{ $errors->first('total_value') }}</div>
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
@endsection
