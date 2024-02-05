@extends('user.layout.index')
@section('css')
@endsection
@section('content')
    <div class="head-nav-box px-3">
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                <path
                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                <path
                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
            </svg>&nbsp;
            <span>Bài viết</span>
        </a>
    </div>
    <div class="main-content-container pt-2 p-3">
          @foreach ($data as $item)
               <a href="{{ route('blogs_detail', ['id'=> $item->id]) }}" class="article-view-container p-2 my-2">
                    <div class="author-container-box">
                    <div class="author-container-box-time">{{ \App\Helpers\ConstCommon::formatTimeblogSeconMinusHour($item->created_at) }}</div>
                    <div class="author-container-box-title">{{$item->title ?? ''}}</div>
                    <div class="author-container-box-label">
                         <div class="text-grey">
                              <span>admin</span>&emsp;
                              <span>{{ \App\Helpers\ConstCommon::formatTimeblogDateMonth($item->created_at) }}</span>
                         </div>
                         <div class="author-container-box-ad">AD</div>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                         <div class="author-container-box-content">{!! \App\Helpers\ConstCommon::limitString($item->content, 320) !!}</div>
                         <div class="author-container-box-img">
                              <img src="{{ \App\Helpers\ConstCommon::getLinkIMG($item->img) }}" alt="">
                         </div>
                    </div>
                    </div>
               </a>
          @endforeach
       
    </div>
@endsection
@section('scripts')
@endsection
