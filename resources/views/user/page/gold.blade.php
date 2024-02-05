@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <a href="{{ route('home') }}" class="head-nav-box px-3">
        <svg xmlns="http://www.w3.org/2/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door"
            viewBox="0 0 16 16">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
        </svg>&nbsp;<span>Trang chủ</span>
    </a>
    <div class="d-flex flex-column align-items-center w-100 p-2">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="d-flex flex-column align-items-center w-100 p-2">
        <canvas id="myChart"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Initialize and configure your Slick Slider -->
    <script>
        console.log('{!! json_encode($inc_or_dec) !!}');
        console.log(JSON.parse('{!! $date !!}'));
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                $('#my-form').submit();
            });
        });

        $(document).ready(function() {
            // Lấy dữ liệu từ backend của bạn và lưu trong biến data
            var data = {
                labels: JSON.parse('{!! $date !!}'),
                datasets: [{
                    label: 'inc_or_dec',
                    data: JSON.parse('{!! $inc_or_dec !!}'),
                    backgroundColor: function(context) {
                        var value = context.dataset.data[context.dataIndex];
                        return value < 0 ? 'rgba(255, 0, 0, 0.2)' : 'rgba(75, 192, 192, 0.2)';
                    },
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Tạo biểu đồ với các tùy chọn
            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Tạo biểu đồ sử dụng Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        });


        $(document).ready(function() {
            // Lấy dữ liệu từ backend của bạn và lưu trong biến data
            var data2 = {
                labels: JSON.parse('{!! $date !!}'),
                datasets: [{
                    label: 'total_stock',
                    data: JSON.parse('{!! $total_stock !!}'),
                    backgroundColor: function(context) {
                        var value = context.dataset.data[context.dataIndex];
                        return value < 0 ? 'rgba(255, 0, 0, 0.2)' : 'rgba(75, 192, 192, 0.2)';
                    },
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Tạo biểu đồ với các tùy chọn
            var options2 = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Tạo biểu đồ sử dụng Chart.js
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: data2,
                options: options2
            });
        });
    </script>
@endsection
