@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle"
            viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445" />
        </svg>&nbsp;
        <span>Video</span>
    </div>
    <div class="main-content-container px-3 pt-2">
        @foreach ($videos as $video)
            <div class="video-item">
                <div class="video-view-container">
                    <a href="">
                        <div class="video-box">
                            <iframe src="{{ str_replace('watch', 'embed',$video->videoFileName)}}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="video-info p-3">
                            <div class="d-flex align-items-center py-2">
                                <div class="video-info-avatar-box">
                                    <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                                        alt="">
                                </div>
                                <div class="pl-1">
                                    <div class="font-weight-bold">{{ $video->user->name ?? 'Ẩn danh' }}</div>
                                    <div class="video-info-time text-grey">
                                        <span>{{ $video->created_at->format('H:i:s') }}</span>&nbsp;
                                        <span>{{ $video->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="video-info-title">{{ $video->videoName ?? " " }}</div>
                        </div>
                    </a>
                </div>
                <button class="btn-video-item">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-play-btn-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2m6.79-6.907A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z" />
                        </svg>&nbsp;
                        <span>Vào kênh Tinfxgold để xem thêm nhiều video</span>
                    </a>
                </button>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
@endsection
