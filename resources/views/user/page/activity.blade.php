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
        <div class="activity-detail-container p-3">
            <div class="activity-detail-container-banner bg-white">
                <div class="activity-detail-container-img">
                    <img src="https://img.wsbird.com/upload/2022/02/13/134855844.jpg" alt="">
                </div>
                <div class="p-3">
                    <div class="d-flex text-body py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-file-medical" viewBox="0 0 16 16">
                            <path
                                d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
                        </svg>
                        <span class="pl-2"><b>TinFXGold</b></span>
                    </div>
                    <button class="btn btn-danger px-5 ml-4">free</button>
                    <div class="d-flex text-dark py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <span class="pl-2">Abc</span>
                    </div>
                    <div class="d-flex text-dark py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-calendar-minus" viewBox="0 0 16 16">
                            <path d="M5.5 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                        <span class="pl-2">21/2/2023</span>
                    </div>
                    <div class="d-flex text-dark py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <span class="pl-2">Đà Nẵng</span>
                    </div>

                </div>
            </div>
            <div class="activity-detail-container-social text-body py-4">
                <div class="d-flex py-2 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                    <span class="text-white pl-2">facebook.com</span>
                </div>
                <div class="d-flex py-2 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-telegram" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                    </svg>
                    <span class="text-white pl-2">0935657677</span>
                </div>
                <div class="d-flex py-2 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-phone-vibrate" viewBox="0 0 16 16">
                        <path
                            d="M10 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM6 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                        <path
                            d="M8 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2M1.599 4.058a.5.5 0 0 1 .208.676A7 7 0 0 0 1 8c0 1.18.292 2.292.807 3.266a.5.5 0 0 1-.884.468A8 8 0 0 1 0 8c0-1.347.334-2.619.923-3.734a.5.5 0 0 1 .676-.208m12.802 0a.5.5 0 0 1 .676.208A8 8 0 0 1 16 8a8 8 0 0 1-.923 3.734.5.5 0 0 1-.884-.468A7 7 0 0 0 15 8c0-1.18-.292-2.292-.807-3.266a.5.5 0 0 1 .208-.676M3.057 5.534a.5.5 0 0 1 .284.648A5 5 0 0 0 3 8c0 .642.12 1.255.34 1.818a.5.5 0 1 1-.93.364A6 6 0 0 1 2 8c0-.769.145-1.505.41-2.182a.5.5 0 0 1 .647-.284m9.886 0a.5.5 0 0 1 .648.284C13.855 6.495 14 7.231 14 8s-.145 1.505-.41 2.182a.5.5 0 0 1-.93-.364C12.88 9.255 13 8.642 13 8s-.12-1.255-.34-1.818a.5.5 0 0 1 .283-.648" />
                    </svg>
                    <span class="text-white pl-2">0935657677</span>
                </div>
            </div>
            <div class="activity-detail-container-content py-2">
                <div class="pb-2"><b>Chi tiết hoạt động</b></div>
                <div class="pb-2"><b>Về Salon</b></div>
                <p>Công nghệ NFT đã phát triển rất nhanh trong lĩnh vực bảo vệ bản quyền kỹ thuật số. Những ưu điểm của công
                    nghệ blockchain, chẳng hạn như chống giả mạo, không thể thay đổi, công khai và minh bạch, khiến nó có
                    một số lượng lớn người dùng trong việc bảo vệ bằng sáng chế và NFT cũng dựa trên công nghệ blockchain,
                    tất cả đều Cho mọi người thấy tiềm năng của công nghệ blockchain trong nhiều ngành công nghiệp hơn.

                    <br>Do đó, chúng tôi tận dụng cơ hội này để cống hiến hết mình để bắt đầu từ việc ứng dụng blockchain
                    trong
                    NFT và phân tích trường hợp của NFT, đồng thời tạo ra những triển vọng xa hơn cho tương lai của công
                    nghệ blockchain.
                </p>
                <div class="pb-2">
                    <b>Chi tiết cuộc họp</b>
                </div>

                <p>
                    Chủ đề hội nghị: Nền kinh tế kỹ thuật số và hội thảo NFT

                    <br>Thời gian họp: 22/02/22 13: 00--16: 00

                    <br>Địa điểm: TP HCM

                    <br>Đơn vị tổ chức: Qingke Chain Valley, vnwallstreet, nhóm TT

                    <br>Hình thức hội nghị: Hội thảo học thuật

                    <br>Quy mô hội nghị: 30-50 người (người đứng đầu các công ty công nghệ blockchain, các công ty thượng
                    nguồn và
                    hạ nguồn blockchain, các công ty nghệ thuật và những người đam mê khác quan tâm đến blockchain)
                </p>
            </div>
        </div>
        {{-- <div class="comment-view">
            <div class="comment-replay-view" >
                <div class="comment-replay-view-first">
                    <div class="comment-replay-avatar-box">
                        <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                            alt="">
                    </div>
                    <form class="replay-box" action="{{ route('commentPost') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input name="id_post" type="hidden" value="{{$data->id}}">
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
                            <div class="comment-replay-view" >
                                <div class="comment-replay-view-first">
                                    <div class="comment-replay-avatar-box">
                                        <img src="https://static.vecteezy.com/system/resources/previews/026/966/960/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                                            alt="">
                                    </div>
                                    <form class="replay-box" action="{{ route('commentPost') }}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <input name="id_post" type="hidden" value="{{$data->id}}">
                                        <input name="id_coment" type="hidden" value="{{$cmtFather->id}}">
                                        <textarea name="content" placeholder="Trả lời bình luận này" class="el-textarea__inner"></textarea>
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
                        </div>
                    @endif
                @endforeach
            </div>
        </div> --}}
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
