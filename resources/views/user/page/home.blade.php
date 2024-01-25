@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door"
            viewBox="0 0 16 16">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
        </svg>&nbsp;<span>Trang chủ</span>
    </div>
    <div class="main-content-container px-3 py-2">
       {{-- Hiển thị 10 bài post --}}
@php
$postCount = 0;
@endphp

@foreach ($posts as $post)
@if ($postCount < 10 && $post->content)
    <div class="article-container-box">
        <a href="">
            <div class="article-container-box-time">{{ $post->created_at->format('H:i:s') }}</div>
            <div class="article-container-box-title">
                {!! $post->content ?? ' ' !!}
            </div>
        </a>
    </div>
    @php
        $postCount++;
    @endphp
@endif
@endforeach

{{-- Hiển thị bài viết lịch kinh tế --}}
@foreach ($economics as $economic)
<div class="carlender-box-item mt-3">
    <div class="d-flex">
        <div class="carlendar-box-item-time">{{ $economic->created_at->format('H:i:s') }}</div>
        <div class="star-rating pl-3">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </div>
    <div class="d-flex align-items-center pt-2">
        <img src="{{ $economic->country_flag }}" alt="">
        <div class="calendar-box-item-title pl-2">
            {{ $economic->events_translate }}
        </div>
    </div>
    <div class="calendar-container-card d-flex justify-content-between">
        <div>
            Trước đó:
            <span class="font-weight-bold">{{ $economic->previous ?? ' ' }}%</span>
        </div>
        <div>
            Kỳ vọng:
            <span class="font-weight-bold">{{ $economic->consensus ?? ' ' }}%</span>
        </div>
        <div>
            Thực tế:
            <span class="font-weight-bold text-red">{{ $economic->actual ?? ' ' }}%</span>
        </div>
    </div>
</div>
@endforeach

{{-- Tiếp tục hiển thị các bài post còn lại --}}
@foreach ($posts as $post)
@if ($postCount >= 10 && $post->content)
    <div class="article-container-box">
        <a href="">
            <div class="article-container-box-time">{{ $post->created_at->format('H:i:s') }}</div>
            <div class="article-container-box-title">
                {!! $post->content ?? ' ' !!}
            </div>
        </a>
    </div>
@endif
@endforeach
        {{-- hiển thị broker --}}
        <div class="brokers-container-top p-3">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div></div>
                    <div>Hero Brokers</div>
                </div>
                <div class="d-flex align-items-center question">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                    </svg> &nbsp;
                    <span>What's hero broker?</span>
                </div>
            </div>
            <div class="slider-box pt-2">
                @foreach ($brokers as $broker)
                    <div class="slider-box-item mx-1">
                        <div class="image">
                            <a href="{{ $broker->facebookLink ?? ' ' }}">
                                @if ($broker->img)
                                    <img src="{{ App\Helpers\ConstCommon::getLinkIMG($broker->img) }}" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="slider-box-item-content px-2 py-3">
                            <div class="title">
                                <span>{{ $broker->nickname ?? ' ' }}</span> &nbsp;
                                @if ($broker->firstCountryLogo)
                                    <img src="{{ $broker->firstCountryLogo }}" alt="">
                                @endif &nbsp;
                                <span class="text-truncate">{{ $broker->licenseName ?? ' ' }}</span>
                            </div>
                            <div class="box">
                                <span class="box-text">Tỉ lệ giải quyết</span>
                                <span class="text-red font-weight-bold">{{ $broker->resolutionRate ?? ' ' }}</span>
                            </div>
                            <div class="broker-link">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                        <path
                                            d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                        <path
                                            d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                                    </svg>
                                    <span class="overflow-hidden">{{ $broker->website ?? ' ' }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="futures-box p-3">
            <div class="futures-box-top d-flex align-items-center">
                <div class="futures-box-top-label">US</div> &nbsp;
                <div class="futures-box-top-content font-weight-bold">Hợp đồng tương lai chứng khoán Mỹ
                </div>
            </div>
            <div class="futures-box-content d-flex pt-3">
                <div class="col-md-4 text-center item font-weight-bold p-0">
                    <div class="item-label">DOW FUT</div>
                    <div class="item-value text-red">
                        <span>126</span> &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </div>
                    <div class="bahnschrift">
                        <span class="">37553</span>
                        <span class="text-red">-0.34%</span>
                    </div>
                </div>
                <div class="col-md-4 text-center item font-weight-bold p-0">
                    <div class="item-label">DOW FUT</div>
                    <div class="item-value text-red">
                        <span>126</span> &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </div>
                    <div class="bahnschrift">
                        <span class="">37553</span>
                        <span class="text-red">-0.34%</span>
                    </div>
                </div>
                <div class="col-md-4 text-center item font-weight-bold p-0">
                    <div class="item-label">DOW FUT</div>
                    <div class="item-value text-red">
                        <span>126</span> &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </div>
                    <div class="bahnschrift">
                        <span class="">37553</span>
                        <span class="text-red">-0.34%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-short-video-card py-3">
            <div class="slider-short-video-card-item">
                <div class="image-box">
                    <img src="https://img.wsbird.com/upload/2023/02/17/184243793.jpg" alt="">
                    <div class="icon-play">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <div class="p-sm-2 p-1 btn-fb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>&nbsp;
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="p-sm-2 p-1 btn-ytb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>&nbsp;
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-short-video-card-item">
                <div class="image-box">
                    <img src="https://img.wsbird.com/upload/2023/02/17/184243793.jpg" alt="">
                    <div class="icon-play">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <div class="p-sm-2 p-1 btn-fb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>&nbsp;
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="p-sm-2 p-1 btn-ytb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>&nbsp;
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-short-video-card-item">
                <div class="image-box">
                    <img src="https://img.wsbird.com/upload/2023/02/17/184243793.jpg" alt="">
                    <div class="icon-play">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <div class="p-sm-2 p-1 btn-fb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>&nbsp;
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="p-sm-2 p-1 btn-ytb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>&nbsp;
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-short-video-card-item">
                <div class="image-box">
                    <img src="https://img.wsbird.com/upload/2023/02/17/184243793.jpg" alt="">
                    <div class="icon-play">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <div class="p-sm-2 p-1 btn-fb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>&nbsp;
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="p-sm-2 p-1 btn-ytb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>&nbsp;
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-short-video-card-item">
                <div class="image-box">
                    <img src="https://img.wsbird.com/upload/2023/02/17/184243793.jpg" alt="">
                    <div class="icon-play">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3">
                    <div class="p-sm-2 p-1 btn-fb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>&nbsp;
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="p-sm-2 p-1 btn-ytb">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>&nbsp;
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                slidesToShow: 3,
                centerMode: true,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
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
            $('.slider-short-video-card').slick({
                slidesToShow: 3,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
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
                        }
                    },
                    {
                        breakpoint: 567,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });
        });
    </script>
@endsection
