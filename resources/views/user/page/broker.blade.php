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
            <span>Brokers</span>
        </a>
    </div>
    <div class="main-content-container pt-2 p-3">
        <div class="brokers-view-container p-2 my-2">
            <div class="brokers-item-container">
                <div class="brokers-item-container-top pb-3">
                    <div class="brokers-item-container-top-image">
                        <img src="https://img.wsbird.com/upload/2023/08/31/225134171.jpg" alt="">
                    </div>
                    <div class="brokers-item-container-top-content pl-3">
                        <h5 class="font-weight-bold">RoboForex</h5>
                        <div class="d-flex">
                            <div class="brokers-item-container-top-content-img">
                                <img src="https://img.wsbird.com/upload/2023/08/31/223152991.png" alt="">
                            </div> &nbsp;
                            <span>Giấy phép Forex bán lẻ FSC</span>
                        </div>
                        <div class="schedule-view pt-2">
                            <span>Tỷ lệ giải quyết khiếu nại</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rank-bar my-1">
                                    <div class="rank-progress" style="width:0%;"></div>
                                </div>
                                <span class="text-danger">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brokers-item-container-data d-flex justify-content-between py-2">
                    <div class="px-2">
                        <span class="text-grey">Tổng số đơn khiếu nại</span>
                        <span class="font-weight-bold">0</span>
                    </div> &nbsp;
                    <div class="px-2">
                        <span class="text-grey">Đã được giải quyết</span>
                        <span class="font-weight-bold">0</span>
                    </div>
                    <div class="px-2">
                        <span class="text-grey">Thời gian phân giải trung bình</span>
                        <span class="font-weight-bold">0</span>
                        <span class="text-grey">Hr</span>
                    </div>
                </div>
            </div>
            <div class="brokers-item-container-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                    class="bi bi-bookmark-star" viewBox="0 0 16 16">
                    <path
                        d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.18.18 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.18.18 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.18.18 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.18.18 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.18.18 0 0 0 .134-.098z" />
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
            </div>
        </div>
        <div class="brokers-view-container p-2 my-2">
            <div class="brokers-item-container">
                <div class="brokers-item-container-top pb-3">
                    <div class="brokers-item-container-top-image">
                        <img src="https://img.wsbird.com/upload/2023/08/31/225134171.jpg" alt="">
                    </div>
                    <div class="brokers-item-container-top-content pl-3">
                        <h5 class="font-weight-bold">RoboForex</h5>
                        <div class="d-flex">
                            <div class="brokers-item-container-top-content-img">
                                <img src="https://img.wsbird.com/upload/2023/08/31/223152991.png" alt="">
                            </div> &nbsp;
                            <span>Giấy phép Forex bán lẻ FSC</span>
                        </div>
                        <div class="schedule-view pt-2">
                            <span>Tỷ lệ giải quyết khiếu nại</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rank-bar my-1">
                                    <div class="rank-progress" style="width:0%;"></div>
                                </div>
                                <span class="text-danger">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brokers-item-container-data d-flex justify-content-between py-2">
                    <div class="px-2">
                        <span class="text-grey">Tổng số đơn khiếu nại</span>
                        <span class="font-weight-bold">0</span>
                    </div> &nbsp;
                    <div class="px-2">
                        <span class="text-grey">Đã được giải quyết</span>
                        <span class="font-weight-bold">0</span>
                    </div>
                    <div class="px-2">
                        <span class="text-grey">Thời gian phân giải trung bình</span>
                        <span class="font-weight-bold">0</span>
                        <span class="text-grey">Hr</span>
                    </div>
                </div>
            </div>
            <div class="brokers-item-container-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                    class="bi bi-bookmark-star" viewBox="0 0 16 16">
                    <path
                        d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.18.18 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.18.18 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.18.18 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.18.18 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.18.18 0 0 0 .134-.098z" />
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
@endsection
