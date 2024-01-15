<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .test {
            font-family: monospace;
            font-size: 1.25rem;
        }

        body {
            padding: 0;
            margin: 0;
            font-family: 'Montserrat';
        }

        .main-container {
            background-color: #15202b;
            color: #fff;
        }

        @media (min-width: 1200px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl {
                max-width: 1200px;
            }
        }

        /* need a solution for the next 2 properties */
        li {
            list-style: none;
        }

        a {
            color: #fff;
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
            color: #fff;
        }

        .w-md-20 {
            width: 100%;
        }

        .w-md-55 {
            width: 100%;
        }

        .w-md-25 {
            width: 100%;
        }

        .nav-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
        }

        .nav-branding {
            font-size: 1.5rem;
            font-weight: 600;
            transition: color 500ms ease;
        }

        .nav-branding:hover,
        .nav-branding:focus {
            color: dodgerblue;
        }

        .nav-menu {
            padding-left: 1rem;
            position: fixed;
            z-index: 1;
            left: -100%;
            top: 2.375em;
            flex-direction: column;
            background-color: #15202b;
            width: 65%;
            height: 100%;
            /* text-align: center; */
            transition: 750ms;
        }

        .nav-menu.active {
            left: 0;
        }

        .nav-item {
            margin: 1em 0;
        }

        .nav-link {
            transition: 400ms ease;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: dodgerblue;

        }

        .hamburger {
            cursor: pointer;
        }

        .bar {
            display: block;
            background-color: #fff;
            width: 24px;
            /* The following 2 properties are essential in creating the "X" when the hamburger is clicked. If you change just 1 of the 2, then you need to find the proper combination for the other one */
            height: 2px;
            margin: 6px auto;

            /*    -webkit-transition: all 300ms ease;  */
            transition: all 300ms ease-in-out;
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0
        }

        .hamburger.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .sidebar {
            background: #6955dc;
        }

        @media (min-width: 768px) {

            .w-md-20 {
                width: 20%;
            }

            .w-md-55 {
                width: 55%;
            }

            .w-md-25 {
                width: 25%;
            }

            .nav-bar {
                display: block;
            }

            .nav-menu {
                padding: 0;
                position: static;
                /* display: flex; */
                flex-direction: row;
                justify-content: space-between;
                /* align-items: center; */
                gap: 1em;
                width: auto;
            }

            .hamburger {
                display: none;
            }

            .sidebar {
                background: #15202b;
            }
        }
            .main-content {
                border-left: 1px solid #38444d;
                border-right: 1px solid #38444d;
                color: #dfdfdf;
            }

            .head-nav-box {
                display: flex;
                align-items: center;
                height: 60px;
                border-bottom: 1px solid #38444d;
                font-size: 20px;
                font-weight: bold;
            }

            .article-container-box {
                padding: 0.75rem 0.75rem 1rem 0.75rem;
                border-bottom: 1px solid #38444d;
            }

            .article-container-box:hover {
                background: #253e55;
            }

            .article-container-box-time, .calendar-container-box-time {
                background: #284464;
                width: 60px;
                height: 20px;
                border-radius: 5px;
                font-size: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .article-container-box-title {
                margin-top: 10px;
                color: #dfdfdf;
                font-size: 14px;
                line-height: 20px;
            }
            .calendar-container-box{
                padding: 1rem;
                background-color: #192734;
            }
            .calendar-container-box img{
                width: 30px;
    height: 20px;
}

            .star-rating{
                font-size: 12px;
            }
            .checked {
  color: orange;
}

        .calendar-container-box-title{
                color: #dfdfdf;
                font-size: 14px;
                line-height: 20px;
                font-weight: bold;
        }
        .calendar-container-card{
            margin-top: 10px;
            padding-top: 10px;
            margin-left: 2rem;
            border-top: 1px solid #38444d;

        }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="sidebar w-md-20 px-3">
                    <nav class="nav-bar">
                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                        <a href="#" class="nav-branding">J.K.</a>


                        <ul class="nav-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>


                    </nav>
                </div>
                <div class="main-content w-md-55">
                    <div class="head-nav-box px-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                            </svg>&nbsp;<span>Trang chủ</span>
                        </div>
                    </div>
                    <div class="px-3 py-2">
                        <div class="article-container-box">
                            <a href="">
                                <div class="article-container-box-time">21:05:57</div>
                            <div class="article-container-box-title">
                                Tập đoàn thương mại Hoa Kỳ: Hoa Kỳ cho rằng eo biển Bab el-Mandeb vẫn còn quá rủi ro đối
                                với tàu thuyền.
                            </div>
                            </a>
                        </div>
                        <div class="article-container-box">
                            <a href="">
                                <div class="article-container-box-time">21:05:57</div>
                            <div class="article-container-box-title">
                                Tập đoàn thương mại Hoa Kỳ: Hoa Kỳ cho rằng eo biển Bab el-Mandeb vẫn còn quá rủi ro đối
                                với tàu thuyền.
                            </div>
                            </a>
                        </div>
                        <div class="article-container-box">
                            <a href="">
                                <div class="article-container-box-time">21:05:57</div>
                            <div class="article-container-box-title">
                                Tập đoàn thương mại Hoa Kỳ: Hoa Kỳ cho rằng eo biển Bab el-Mandeb vẫn còn quá rủi ro đối
                                với tàu thuyền.
                            </div>
                            </a>
                        </div>
                        <div class="article-container-box">
                            <a href="">
                                <div class="article-container-box-time">21:05:57</div>
                            <div class="article-container-box-title">
                                Tập đoàn thương mại Hoa Kỳ: Hoa Kỳ cho rằng eo biển Bab el-Mandeb vẫn còn quá rủi ro đối
                                với tàu thuyền.
                            </div>
                            </a>
                        </div>
                        <div class="calendar-container-box">
                            <div class="d-flex">
                                <div class="calendar-container-box-time">21:05:57</div>
                                <div class="star-rating pl-3">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/225px-Flag_of_Vietnam.svg.png" alt="">
                                <div class="calendar-container-box-title pl-2">
                                    Tập đoàn thương mại Hoa Kỳ: Hoa Kỳ cho rằng eo biển Bab el-Mandeb vẫn còn quá rủi ro đối
                                    với tàu thuyền.
                                </div>
                            </div>
                            <div class="calendar-container-card d-flex justify-content-between">
                                <div>
                                    Trước đó:
                                    <span class="font-weight-bold">0.90%</span>
                                </div>
                                <div>
                                    Kỳ vọng:
                                    <span class="font-weight-bold">-0%</span>
                                </div>
                                <div>
                                    Thực tế:
                                    <span class="font-weight-bold text-danger">-0.90%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-plate w-md-25 pl-3 d-md-block d-none">asdas</div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Testing rgba transparency of menu</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur laboriosam adipisci doloribus dolorem
            earum? Quisquam hic ullam facere adipisci similique doloribus quia nulla nisi ipsum culpa, asperiores,
            excepturi cum repellat recusandae reiciendis. Qui autem voluptatibus eaque quisquam distinctio error impedit
            voluptates sit placeat, consectetur porro a, odit delectus, aliquid dolor!</p>
        <p class="test">{...KWD} {...kwd}</p>
        <p><code>{Kernix Web Design}</code></p>
    </div>
</body>
<script>
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", () => {

        /* Toggle active class */
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");

        /* Toggle aria-expanded value */
        let menuOpen = navMenu.classList.contains("active");
        console.log(menuOpen)
        let newMenuOpenStatus = menuOpen;
        hamburger.setAttribute("aria-expanded", newMenuOpenStatus);
    })

    // close mobile menu
    document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        //   Need to add Toggle aria-expanded value here as well because it stays as true when you click a menu item
    }))
</script>

</html>
