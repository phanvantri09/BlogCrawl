@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <a href="{{ route('home') }}" class="head-nav-box px-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door"
            viewBox="0 0 16 16">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
        </svg>&nbsp;<span>Trang chủ</span>
    </a>
    <div class="d-flex flex-column align-items-center w-100 p-2">

    </div>
    <form class="form-group d-flex ml-4 mr-4" id="my-form" action="{{ route('gold') }}" method="get">
        @csrf
        <div>
            <input type="radio" name="case" id="chuthich" value="10" {{ $case == 10 ? 'checked' : '' }}>
            <label for="chuthich">Trong vòng 10 ngày</label>
        </div>
        <div>
            <input type="radio" name="case" id="chuthich" value="30" {{ $case == 30 ? 'checked' : '' }}>
            <label for="chuthich">Trong vòng 30 ngày</label>
        </div>
        <div>
            <input type="radio" name="case" id="chuthich" value="60" {{ $case == 60 ? 'checked' : '' }}>
            <label for="chuthich">Trong vòng 60 ngày</label>
        </div>
        <div>
            <input type="radio" name="case" id="chuthich" value="180" {{ $case == 180 ? 'checked' : '' }}>
            <label for="chuthich">Trong vòng 180 ngày</label>
        </div>
    </form>

    <table class="table table-striped table-dark">
        <h5>Kỷ lục lịch sử</h5>
        <thead>
            <tr>
                <th>Ngày-Tháng</th>
                <th>Tổng tồn kho</th>
                <th>Ch%(Tấn)</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{ $item->date }}</th>
                    <td>{{ $item->total_stock }}</td>
                    <td>{{ $item->inc_or_dec }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Initialize and configure your Slick Slider -->
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                $('#my-form').submit();
            });
        });
    </script>
@endsection
