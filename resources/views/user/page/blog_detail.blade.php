@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <a href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>&nbsp;
            <span>Back</span>
        </a>
    </div>
    <div class="main-content-container pt-2">
            <div data-v-1d38c9e0="" class="d-flex justify-content-center">
                <img style="width: 96%; height: auto; border-radius: 20px" src="{{ \App\Helpers\ConstCommon::getLinkIMG($data->img) }}" class="el-image__inner"
                    style="object-fit: fill;">
            </div>
        <div class="article-detail-container p-3">
            <h5 class="py-2 font-weight-bold">{{ \App\Helpers\ConstCommon::formatTimeCmt($data->created_at) }}</h5>
            <h4 style="color: #9fafff; border-bottom: 1px solid #9fafff" class="py-2 font-weight-bold">{{ $data->title }}</h4>
            <div class="article-detail-container-content pb-3">
                {!! $data->content !!}
            </div>
        </div>
        <div>
            <div>
                <img src="" alt="">
            </div>
            <img src="" alt="">
            <span></span>
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
                        <input name="id_blog" type="hidden" value="{{ $data->id }}">
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
                                        <input name="id_blog" type="hidden" value="{{ $data->id }}">
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
