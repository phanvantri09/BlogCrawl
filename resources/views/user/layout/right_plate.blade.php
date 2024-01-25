<div>
    <div id="slider1" class="carousel slide py-2" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#slider1" data-slide-to="0" class="active"></li>
            <li data-target="#slider1" data-slide-to="1"></li>
            <li data-target="#slider1" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item carousel-item1 active">
                <img
                    src="https://www.cleanipedia.com/images/5iwkm8ckyw6v/5ZtLUJ1JtUez36Jz2Lqlor/a2a6557801b8bae97f8c36ccec86b418/Y2FjaC10cm9uZy1jYXktaG9hLW5oYWkuanBn/1200w/c%C3%A1ch-tr%E1%BB%93ng-c%C3%A2y-hoa-nh%C3%A0i.jpg">
            </div>
            <div class="carousel-item carousel-item1">
                <img
                    src="https://static.spacet.vn/image-resized/1024x10240_max/img/blog/2023-08-21/hoa-tulip-y-nghia-gia-thanh-va-cach-bo-tri-cho-noi-ngoai-that-64e2d8d17d477746faa14f0d.webp">
            </div>
            <div class="carousel-item carousel-item1">
                <img
                    src="https://bizweb.dktcdn.net/100/438/408/files/cac-loai-hoa-dep-yody-vn2.jpg?v=1696306682921">
            </div>
        </div>

    </div>

    <div id="slider2" class="carousel slide py-2 mb-2" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#slider2" data-slide-to="0" class="active"></li>
            <li data-target="#slider2" data-slide-to="1"></li>
            <li data-target="#slider2" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item carousel-item2 active">
                <img
                    src="https://www.cleanipedia.com/images/5iwkm8ckyw6v/5ZtLUJ1JtUez36Jz2Lqlor/a2a6557801b8bae97f8c36ccec86b418/Y2FjaC10cm9uZy1jYXktaG9hLW5oYWkuanBn/1200w/c%C3%A1ch-tr%E1%BB%93ng-c%C3%A2y-hoa-nh%C3%A0i.jpg">
            </div>
            <div class="carousel-item carousel-item2">
                <img
                    src="https://static.spacet.vn/image-resized/1024x10240_max/img/blog/2023-08-21/hoa-tulip-y-nghia-gia-thanh-va-cach-bo-tri-cho-noi-ngoai-that-64e2d8d17d477746faa14f0d.webp">
            </div>
            <div class="carousel-item carousel-item2">
                <img
                    src="https://bizweb.dktcdn.net/100/438/408/files/cac-loai-hoa-dep-yody-vn2.jpg?v=1696306682921">
            </div>
        </div>

    </div>

    <div class="carlender-box px-2 py-4">
        <div class="d-flex justify-content-between mb-3 font-weight-bold">
            <div>Lịch</div>
            <div class="carlender-text d-flex align-items-center text-grey">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path
                        d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                    <path
                        d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                </svg> &nbsp;
                <span>Tiếp theo</span>&nbsp;
                <span class="text-danger">07:33:12</span>
            </div>
        </div>
        @php
            use Illuminate\Support\Facades\DB;
            use App\Models\EconomicCalendar;
            $economicsShowRight = EconomicCalendar::orderBy('created_at')->limit(5)->get();
        @endphp
        @if (count($economicsShowRight) > 0)
            @foreach ($economicsShowRight as $economic )
                <div class="carlender-box-item">
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
                        <img src="{{ $economic->country_flag}}"
                            alt="">
                        <div class="calendar-box-item-title pl-2">
                            {{ $economic->translate ?? " " }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="complaint-box mt-3 px-3 py-4">
        <div class="d-flex justify-content-between">
            <div>Khiếu nại mới</div>
            <a href="">
                <div class="complaint-box-title-all">
                    <span>ALL</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>
            </a>
        </div>
        <div class="pointer py-3">
            <a href="">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-box">
                        <img src="{{ $firstComplaint->headImg }}"
                            alt="">
                    </div>
                    <div class="pl-2">
                        <div class="font-weight-bold">{{ $firstComplaint->realname ?? "Ẩn danh" }}</div>
                        <div class="font-weight-bold">{{ $firstComplaint->nickname ?? " " }}</div>
                        <div class="complaint-box-info-container-time">
                            <span>{{ $firstComplaint->created_at->format('H:i:s') }}</span>&nbsp;
                            <span>{{ $firstComplaint->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="complaint-box-pointer-content">
                    <div>#{{ $firstComplaint->complaintName ?? " " }}</div>
                    <div class="mb-2">
                        <span class="text-grey">Số tiền liên quan</span>
                        <span>{{ $firstComplaint->money ?? " " }}</span>
                    </div>
                    <div class="text-grey">
                        {!! $firstComplaint->content ?? " " !!}
                    </div>
                </div>
            </a>
        </div>
        <div class="complaint-box-container">
            <a href="">
                <div class="row">
                    <div class="col-md-4 complaint-box-container-image">
                        <img src="{{ $firstComplaint->img }}"
                            alt="">
                    </div>
                    <div class="col-md-8 px-1">
                        <div>{{ $firstComplaint->nickname ?? " " }}</div>
                        <div class="d-flex align-items-center">
                            <div class="images-box">
                                <img src=""
                                    alt="">
                            </div>
                            &nbsp;
                            <span class="complaint-box-container-text">STP FCA</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rank-bar my-1">
                                <div class="rank-progress" style="width:0%;"></div>
                            </div>
                            <span class="text-danger">0%</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="ytb-container mt-3 p-3">
        <iframe width="100%" height="160px"
        src="{{ str_replace('watch', 'embed',$firstVideo->videoFileName)}}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>

    <div class="party-container mt-3 py-3">
        <div class="d-flex pb-2">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>&ensp;
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path
                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                </svg>
            </a>&ensp;
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-caret-right-square-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z" />
                </svg>
            </a>&ensp;
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                    <path
                        d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                </svg>
            </a>&ensp;
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                </svg>
            </a>
        </div>
        <div class="party-container-content">
            <span>Nhắc nhở</span><br>
            <span class="text-grey py-1">Nếu bạn đổi điện thoại di động, vui lòng đăng xuất khỏi
                tài
                khoản VNWS APP của điện thoại di động cũ. Nếu không bạn sẽ không thể nhận "Thông
                báo" trên điện thoại di động mới. Hoặc vui lòng đăng ký lại tài khoản
                mới.
            </span><br>
            <span>Trang web thông báo</span><br>
            <span class="text-grey pt-1">1. vnwallstreet được tự động hoá bằng máy tính và sử dụng
                bản dịch tự động, nên
                nếu bạn cho rằng nội dung không chính xác, vui lòng không sử dụng trang web và APP
                của chúng tôi. Bởi vì đứng trước một thị trường luôn biến động từng phút,</span>
            <span class="text-grey" id="dots">...</span><span class="text-grey"
                id="more">chúng tôi phải ưu tiên “tốc độ”.<br>
                2. Chúng tôi sẽ cố gắng hết sức để đảm bảo tốc độ và độ chính xác của dữ liệu và
                thông tin được phát hành. Xin hiểu rằng dữ liệu có thể không được phát hành kịp thời
                do các yếu tố vượt ngoài tầm kiểm soát của chúng tôi.
                3. Chúng tôi sẽ chọn lọc những bài viết và video chất lượng cao để người dùng đọc và
                tham khảo, nếu một số bài viết vi phạm quyền lợi của bạn, xin hãy liên hệ với chúng
                tôi để chúng tôi xóa chúng.
                VNwallstreet</span>
        </div>
        <button class="btn-more" onclick="myFunction()" id="myBtn">Xem thêm</button>
    </div>

    <div class="contact-container mt-3 px-3 py-4">
        <div>Liên hệ</div>
        <div class="d-flex align-items-center py-3">
            <div class="icon-mes">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                    <path
                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    <path
                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
                </svg>
            </div>
            <div class="contact-container-content pl-3">
                <div>Tư vấn khiếu nại</div>
                <div class="text-grey">
                    <span>Zalo</span> &emsp;
                    <span>0987652367</span>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center py-3">
            <div class="icon-ad">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    fill="currentColor" class="bi bi-badge-ad" viewBox="0 0 16 16">
                    <path
                        d="m3.7 11 .47-1.542h2.004L6.644 11h1.261L5.901 5.001H4.513L2.5 11zm1.503-4.852.734 2.426H4.416l.734-2.426zm4.759.128c-1.059 0-1.753.765-1.753 2.043v.695c0 1.279.685 2.043 1.74 2.043.677 0 1.222-.33 1.367-.804h.057V11h1.138V4.685h-1.16v2.36h-.053c-.18-.475-.68-.77-1.336-.77zm.387.923c.58 0 1.002.44 1.002 1.138v.602c0 .76-.396 1.2-.984 1.2-.598 0-.972-.449-.972-1.248v-.453c0-.795.37-1.24.954-1.24z" />
                    <path
                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                </svg>
            </div>
            <div class="contact-container-content pl-3">
                <div>Quảng cáo</div>
                <div class="text-grey">
                    <span>Zalo</span> &emsp;
                    <span>0987652367</span>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center py-3">
            <div class="icon-service">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                    <path
                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z" />
                </svg>
            </div>
            <div class="contact-container-content pl-3">
                <div>Tư vấn dịch vụ</div>
                <div class="text-grey">
                    <span>Zalo</span> &emsp;
                    <span>0987652367</span>
                </div>
            </div>
        </div>

    </div>

    <div class="recruitment-container mt-3 px-3 py-4">
        <ul>
            <li><a href="">Tuyển dụng nhân tài</a></li>
            <li><a href="">Nội dung hợp tác</a></li>
            <li><a href="">Thông báo bản quyền</a></li>
            <li><a href="">Thỏa thuận người dùng</a></li>
            <li><a href="">Chính sách bảo mật</a></li>
            <li><a href="">Disclaimer</a></li>
            <li><a href="">Về chúng tôi</a></li>
        </ul>
    </div>
</div>
