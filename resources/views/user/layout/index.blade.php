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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>

</head>

<body>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="sidebar w-md-20 px-3">
                    @include('user.layout.sidebar')
                </div>
                <div class="main-content w-md-55">
                    @yield('content')
                </div>
                <div class="right-plate w-md-25 pl-3 pt-2 d-lg-block d-none">
                    @include('user.layout.right_plate')
                </div>
            </div>
        </div>
    </div>


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

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Xem thêm";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Thu gọn";
                moreText.style.display = "inline";
            }
        }
    </script>
    @yield('scripts')
</body>

</html>
