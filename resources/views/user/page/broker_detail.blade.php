@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>&nbsp;
            <span>Back</span>
        </a>
    </div>
    <div class="main-content-container p-3">
        <div class="brokers-detail-container-banner">
            <img src="{{ \App\Helpers\ConstCommon::getLinkIMG($data->img) }}" alt="">
        </div>
        <div class="brokers-detail-container-social pt-3 pb-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                    class="bi bi-youtube" viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                </svg>&emsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                    class="bi bi-twitter" viewBox="0 0 16 16">
                    <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                </svg>&emsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>&emsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                    class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path
                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                </svg>&emsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                    class="bi bi-skype" viewBox="0 0 16 16">
                    <path
                        d="M4.671 0c.88 0 1.733.247 2.468.702a7.42 7.42 0 0 1 6.02 2.118 7.37 7.37 0 0 1 2.167 5.215q0 .517-.072 1.026a4.66 4.66 0 0 1 .6 2.281 4.64 4.64 0 0 1-1.37 3.294A4.67 4.67 0 0 1 11.18 16c-.84 0-1.658-.226-2.37-.644a7.42 7.42 0 0 1-6.114-2.107A7.37 7.37 0 0 1 .529 8.035q0-.545.08-1.081a4.644 4.644 0 0 1 .76-5.59A4.68 4.68 0 0 1 4.67 0zm.447 7.01c.18.309.43.572.729.769a7 7 0 0 0 1.257.653q.737.308 1.145.523c.229.112.437.264.615.448.135.142.21.331.21.528a.87.87 0 0 1-.335.723c-.291.196-.64.289-.99.264a2.6 2.6 0 0 1-1.048-.206 11 11 0 0 1-.532-.253 1.3 1.3 0 0 0-.587-.15.72.72 0 0 0-.501.176.63.63 0 0 0-.195.491.8.8 0 0 0 .148.482 1.2 1.2 0 0 0 .456.354 5.1 5.1 0 0 0 2.212.419 4.6 4.6 0 0 0 1.624-.265 2.3 2.3 0 0 0 1.08-.801c.267-.39.402-.855.386-1.327a2.1 2.1 0 0 0-.279-1.101 2.5 2.5 0 0 0-.772-.792A7 7 0 0 0 8.486 7.3a1 1 0 0 0-.145-.058 18 18 0 0 1-1.013-.447 1.8 1.8 0 0 1-.54-.387.73.73 0 0 1-.2-.508.8.8 0 0 1 .385-.723 1.76 1.76 0 0 1 .968-.247c.26-.003.52.03.772.096q.412.119.802.293c.105.049.22.075.336.076a.6.6 0 0 0 .453-.19.7.7 0 0 0 .18-.496.72.72 0 0 0-.17-.476 1.4 1.4 0 0 0-.556-.354 3.7 3.7 0 0 0-.708-.183 6 6 0 0 0-1.022-.078 4.5 4.5 0 0 0-1.536.258 2.7 2.7 0 0 0-1.174.784 1.9 1.9 0 0 0-.45 1.287c-.01.37.076.736.25 1.063" />
                </svg>&emsp;
            </div>
            <div class="brokers-detail-container-social-logo">
                <img src="{{ \App\Helpers\ConstCommon::getLinkIMG($data->logo) }}" alt="">
            </div>
        </div>
        <div><b>Website: <a href="" class="text-info">{{ $data->website ?? '' }}</a></b></div>
        <div class="brokers-detail-container-content">
            <div class="content-info">
                <div><b>Giới thiệu công ty</b></div>
                <div class="px-2 py-3 mt-1 content-main">
                    <b>{!! $data->content !!}</b>
                </div>
                <div class="row py-2">
                    <div class="col-6 py-2">
                        <span class="text-grey">Thời gian phân giải trung bình </span>
                        {{-- <span>0</span> --}}
                    </div>
                    <div class="col-6 py-2">
                        <span class="text-grey">Đã được giải quyết </span>
                        <span>0</span>
                    </div>
                    <div class="col-6 py-2">
                        <span class="text-grey">Tổng số đơn khiếu nại </span>
                        <span>0</span>
                    </div>
                    <div class="col-6 py-2">
                        <span class="text-grey">Giám sát</span>
                        <span>{{ $data->licenseName ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="brokers-detail-container-license">
            <div><b>Giấy phép</b></div>
            @foreach ($license as $item)
                <div class="license-items d-flex justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div style="background-color: {{ strpos($item->licenseLevel, 'A') !== false ? '#2b9a8b' : (strpos($item->licenseLevel, 'B') !== false ? '#e6af46' : (strpos($item->licenseLevel, 'C') !== false ? '#e64e46' : 'gray')) }}"
                            class="license-items-brokers-normal px-1">{{ $item->licenseLevel ?? '' }}
                        </div>
                        <div class="license-items-brokers-img px-1 pl-2">
                            <img src="{{ \App\Helpers\ConstCommon::getLinkIMG($item->licenseLogo) }}" alt="">
                        </div>
                        <span class="font-weight-bold px-1 pl-2">{{ $item->regulatoryLicense ?? '' }}</span>
                        <span class="font-weight-bold px-1 pl-2">{{ $item->licenseName }}</span>
                    </div>
                    <span class="px-1 text-primary">Đang giám sát</span>
                </div>
            @endforeach


            {{-- <div class="license-items d-flex justify-content-between">
                <div class="license-items-brokers-normal bg-warning px-1">B</div>
                <div class="license-items-brokers-img px-1">
                    <img src="https://img.wsbird.com/upload/2023/08/31/223152991.png" alt="">
                </div>
                <span class="font-weight-bold px-1">FSC</span>
                <span class="font-weight-bold px-1">Giấy phép Forex bán lẻ</span>
                <span class="px-1 text-primary">Đang giám sát</span>
            </div> --}}
        </div>

        <div class="comment-view">
            <div class="comment-replay-view">
                <div class="comment-replay-view-first">
                    <div class="comment-replay-avatar-box">
                        <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                            alt="">
                    </div>
                    <form class="replay-box" action="{{ route('commentPost') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input name="id_broker" type="hidden" value="{{ $data->id }}">
                        <textarea name="content" placeholder="Suy nghĩ của bạn....?" class="el-textarea__inner"></textarea>
                        <button type="submit" value="Submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.021 11.9 3.453 8.62a.72.72 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                <path
                                    d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945l-.042.028a.147.147 0 0 0 0 .252l.042.028 4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="comment-container px-3">
                <div class="commont-container-title">
                    <span>Tất cả bình luận</span>
                    <span>({{ count($comment) }})</span>
                </div>
                @foreach ($comment as $cmtFather)
                    @if (empty($cmtFather->id_coment))
                        <div class="comment-item pt-3">
                            <div class="d-flex">
                                <div class="comment-replay-avatar-box">
                                    <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                                        alt="">
                                </div>
                                <div class="comment-item-content pl-2">
                                    <div class="font-weight-bold">{{ $cmtFather->user->name ?? 'Ẩn Danh' }}</div>
                                    <div class="text-grey">
                                        {{ \App\Helpers\ConstCommon::formatTimeCmt($cmtFather->created_at) }}
                                    </div>
                                    <p>
                                        {{ $cmtFather->content }}
                                    </p>
                                    @if ($cmtFather->replies->count() > 0)
                                        <div class="col">
                                            @foreach ($cmtFather->replies as $reply)
                                                <div class="comment-item pt-3">
                                                    <div class="d-flex">
                                                        <div class="comment-replay-avatar-box">
                                                            <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="comment-item-content pl-2">
                                                            <div class="font-weight-bold">
                                                                {{ $reply->user->name ?? 'Ẩn Danh' }}
                                                            </div>
                                                            <div class="text-grey">
                                                                {{ \App\Helpers\ConstCommon::formatTimeCmt($cmtFather->created_at) }}
                                                            </div>
                                                            <p>{{ $reply->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="comment-replay-view">
                                <div class="comment-replay-view-first">
                                    <div class="comment-replay-avatar-box">
                                        <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                                            alt="">
                                    </div>
                                    <form class="replay-box" action="{{ route('commentPost') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="id_broker" type="hidden" value="{{ $data->id }}">
                                        <input name="id_coment" type="hidden" value="{{ $cmtFather->id }}">
                                        <textarea name="content" placeholder="Trả lời bình luận này" class="el-textarea__inner"></textarea>
                                        <button type="submit" value="Submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.021 11.9 3.453 8.62a.72.72 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                                <path
                                                    d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945l-.042.028a.147.147 0 0 0 0 .252l.042.028 4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div><b>Tất cả khiếu nại</b></div>
        <div class="article-view-container py-2 my-2 text-center">
            <span>Bài viết</span>
        </div>
        <div><b>Bài viết</b></div>
        <div class="article-view-container py-2 my-2 text-center">
            <span>Chưa có bài viết</span>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.el-textarea__inner').each(function() {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
@endsection
