<nav class="nav-bar">
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <a href="{{ route('home')}}" class="nav-branding">J.K.</a>


    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Lịch kinh tế</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('complain') }}" class="nav-link">Khiếu nại</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('brokers') }}" class="nav-link">Brokers</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('brokers', ['hero' => "hero"]) }}" class="nav-link">Hero Brokers</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('article') }}" class="nav-link">Bài viết</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Hoạt động</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('video') }}" class="nav-link">Video</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Gold ETF</a>
        </li>
    </ul>


</nav>
