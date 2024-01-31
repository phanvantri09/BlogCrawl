@extends('user.layout.index')
@section('css')
    <style>
        .date-box-active {
            &.slick-slide {
                background-color: #6955dc;
            }

            .date-of-week,
            .date {
                color: white !important;
            }
        }

        .date-box-content {
            padding: 2px;
        }

        .slick-list {
            margin: 0 50px;
        }

        .slick-slide {
            background: #d9d9d9;
            border-radius: 10px;
            margin: 5px;
        }

        .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            background: none;
            overflow: hidden;
        }

        .slick-arrow i {
            font-size: 50px;
            color: #d9d9d9;
        }

        .slick-arrow.slick-prev {
            left: 0;
        }

        .slick-arrow.slick-next {
            right: 0;
        }
    </style>
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
        <h4 class="w-100">{{ Carbon::parse(reset($date))->format('d/m/Y') }} ->
            {{ Carbon::parse(end($date))->format('d/m/Y') }}</h4>
        <div class="slider-box py-3 w-100">
            @foreach ($date as $da)
                <a href="{{ route('economic', ['date' => $da, 'chuthich' => 1]) }}" style="height: 48px; width: 69px;"
                    class="date-box {{ $da == $dateSelect ? 'date-box-active' : '' }}">
                    <div class="d-flex flex-column align-items-center justify-content-center date-box-content">
                        <span class="date-of-week">
                            @if (Carbon::parse($da)->dayOfWeek == 0)
                                T7
                            @elseif (Carbon::parse($da)->dayOfWeek == 1)
                                CN
                            @else
                                T{{ Carbon::parse($da)->dayOfWeek }}
                            @endif
                        </span>
                        <span class="date">{{ Carbon::parse($da)->format('d/m') }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <form class="form-group d-flex ml-4 mr-4" id="my-form" action="{{ route('economic', ['date' => $dateSelect]) }}"
        method="get">
        @csrf
        <div>
            <input type="checkbox" name="chuthich" id="chuthich" value="1" {{ $chuthich == 1 ? 'checked' : '' }}>
            <label for="chuthich">Chú Thích</label>
        </div>
        <div class="ml-5">
            <input type="checkbox" name="star" id="star" value="1" {{ $star == 1 ? 'checked' : '' }}>
            <label for="star">Quan trọng</label>
        </div>
    </form>

    <div class="main-content-container px-3 py-2">
        @foreach ($data as $item)
            <div class="calendar-container-box mt-2">
                <div class="d-flex">
                    <div class="calendar-container-box-time">
                        {{ $item->pub_time_tz ? Carbon::parse($item->pub_time_tz)->format('H:i:s') : '' }}</div>
                    <div class="star-rating pl-3">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($item->star > $i)
                                <span class="fa fa-star {{ $item->star >= 3 ? 'checked-red' : 'checked-yelow' }}"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="d-flex align-items-center pt-2">
                    <img src="{{ \App\Helpers\ConstCommon::getLinkIMG($item->country_flag) }}" alt="">
                    <div class="calendar-container-box-title pl-2 {{ $item->star >= 3 ? 'text-color-red' : '' }}">
                        {{ $item->events_translate ?? ($item->translate ?? '') }}
                    </div>
                </div>
                @if ($item->is_event == 0)
                    <div class="calendar-container-card d-flex justify-content-between">
                        <div>
                            Trước đó:
                            <span class="font-weight-bold">{{ $item->previous }}</span>
                        </div>
                        <div>
                            Kỳ vọng:
                            <span class="font-weight-bold">{{ $item->consensus }}</span>
                        </div>
                        <div>
                            Thực tế:
                            <span class="font-weight-bold text-red">{{ $item->actual }}</span>
                        </div>
                    </div>
                @endif

            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Initialize and configure your Slick Slider -->
    <script>
        $(document).ready(function() {

            $('.slider-box').slick({
                infinite: true,
                slidesToShow: 7,
                slidesToScroll: 7,
                initialSlide: 49,
                prevArrow: "<button type='button' class='slick-prev '><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next '><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
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
        });
        $('#chuthich').change(function() {
            // Gửi biểu mẫu
            $('#my-form').submit();
        });
        $('#star').change(function() {
            // Gửi biểu mẫu
            $('#my-form').submit();
        });
    </script>
@endsection
