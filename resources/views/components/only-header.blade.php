<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $attributes['title'] }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Logo -->
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MD Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    {{-- Css --}}
    <link rel="stylesheet" href="/home/assets/style.css" />
    <link rel="stylesheet" href="/home/assets/responsive.css" />
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <link rel="icon"
        href="https://9xgarden.com/wp-content/uploads/2020/09/danh-muc-tieu-canh-de-ban-terrarium-9xgarden.jpg">
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
                padding: 0 15px;
            }
        }
    </style>
    @yield('style')
</head>

<body class="bg-light">
    <div id="fb-root"></div>

    <span class="back_to_top"><i class="fas fa-chevron-circle-up"></i></span>
    <div class="top">
        <div class="container">
            <div class="row py-1 text-light">
                <div class="col-lg-6">
                    <ul class="m-0 p-0 d-flex" style="list-style: none">
                        <li class="me-2">
                            <i class="fas fa-phone"></i> 0123.456.789 (Hà Nội)
                        </li>
                        <li><i class="fas fa-phone"></i> 0123.456.789 (Sài Gòn)</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="m-0 p-0 d-flex justify-content-end" style="list-style: none">
                        <li class="me-2">Thanh toán</li>
                        <li>Địa chỉ</li>
                        <li class="mx-2"><i class="fab fa-facebook"></i></li>
                        <li class="mx-2"><i class="far fa-envelope"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row py-2 d-flex align-items-center">
                <div class="col-lg-3 col-4">
                    <div class="logo">
                        <h3 class="m-0" style="color: var(--header_color)">
                            Greenlife <i class="fab fa-pagelines"></i>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <form action="{{ route('home.search') }}" method="get" class="search_form">
                        <div class="search_box">
                            <input type="text" name="key" class="search_input"
                                placeholder="Tìm kiếm sản phẩm..." />
                            <button class="search_btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-8">
                    <div class="login">
                        <ul class="m-0 p-0 d-flex align-items-center justify-content-end" style="list-style: none">
                            <li class="me-2">
                                @if (Auth::user())
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-dark d-flex align-items-center" type="button"
                                            id="dropdownMenu2" data-mdb-toggle="dropdown" aria-expanded="false">
                                            <div style="display: inline-block; width: 30px; height: 30px; overflow: hidden;"
                                                class="border rounded-circle">
                                                <img src="/storage/avatars/{{ Auth::user()->avatar }}" class="w-100"
                                                    alt="{{ Auth::user()->name }}">
                                            </div>
                                            <span class="ms-2">{{ Auth::user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            @if (Auth::user()->is_customer == 1)
                                                <li><a href="{{ route('admin.dashboard') }}" class="dropdown-item"
                                                        type="button">Trang
                                                        quản trị</a></li>
                                            @endif
                                            <li><a href="{{ route('home.info') }}" class="dropdown-item"
                                                    type="button">Tài khoản</a></li>
                                            <li><a href="{{ route('home.logout') }}" class="dropdown-item"
                                                    type="button">Đăng
                                                    xuất</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a class="text-dark" href="{{ route('home.login') }}">Đăng nhập</a>
                                @endif
                            </li>
                            <li class="me-2">
                                <a style="color: var(--header_color)" href="{{ route('home.cart') }}">Giỏ hàng <i
                                        class="fas fa-shopping-bag"></i>
                                    <sup style="font-size: 13px;"
                                        id="cart_number">[{{ $cart->total_quantity }}]</sup></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="navigation">
        <div class="container">
            <div class="row pb-2 border-bottom">
                <div class="col-lg-10 col-md-8">
                    @php
                        $navbars = [
                            [
                                'name' => 'Trang chủ',
                                'route' => 'home',
                            ],
                            [
                                'name' => 'Giới thiệu',
                                'route' => 'about',
                            ],
                            [
                                'name' => 'Tin tức',
                                'route' => 'new',
                            ],
                            [
                                'name' => 'Liên hệ',
                                'route' => 'contact',
                            ],
                        ];
                        $route_curr = Route::currentRouteName();
                    @endphp
                    <nav class="nav_bar">
                        <ul class="nav_bar_list d-flex m-0 p-0" style="list-style: none">
                            @foreach ($navbars as $item)
                                <li class="nav_bar_item me-1 py-1 pe-2">
                                    <a class="{{ $item['route'] == $route_curr ? 'text-success' : 'text-dark' }}"
                                        href="{{ $item['route'] ? route($item['route']) : '' }}">{{ $item['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-4 d-none d-md-block text-end">
                    <span class="px-3 btn rounded-pill text-light"
                        style="background-color: var(--header_color)">0123.456.789</span>
                </div>
            </div>
        </div>
    </section>
    <section class="content my-2">
        <div class="container">
            @include('sweetalert::alert')
            {{ $slot }}
        </div>
    </section>
    <footer style="background: #F1F6F9;">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <h5 class="fw-bold badge bg-success">Về chúng tôi</h5>
                    <div class="logo my-3">
                        <h3 class="m-0" style="color: var(--header_color)">
                            Greenlife <i class="fab fa-pagelines"></i>
                        </h3>
                    </div>
                    <p style="text-align: justify">
                        Cây Xinh là thương hiệu dẫn đầu trong lĩnh vực sản xuất & cung cấp
                        các loại Cây phong thủy, cây văn phòng, sen đá, xương rồng & tiểu
                        cảnh Terrarium cao cấp trang trí nội thất. Cây Xinh luôn cố gắng
                        tạo ra những sản phẩm đẹp, độc đáo và khác biệt hoàn toàn so với
                        thị trường. Chúng tôi biến sản phẩm thành những tác phẩm nghệ
                        thuật với tất cả niềm đam mê và tâm huyết của mình... để đáp ứng
                        mọi nhu cầu của khách hàng.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h5 class="fw-bold badge bg-success">Hỗ trợ khách hàng</h5>
                    <ul>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Hướng dẫn đặt hàng & thanh toán</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách giao hàng & đổi trả</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Thỏa thuận người dùng</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách bảo mật</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách đại lý</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Hệ thống cửa hàng Cây Xinh</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h5 class="fw-bold badge bg-success">Fanpage</h5> <br>
                    <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100091749211692"
                        data-width="380" data-hide-cover="false" data-show-facepile="false"></div>
                </div>
            </div>
            <div class="row">
                <p class="text-center p-1 m-0">
                    Copyright 2023 © Greenlife | Mọi hình ảnh trên trang web được sưu tầm
                </p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/home/assets/main.js"></script>
    <script src="/home/assets/index.js"></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=238683943543481&autoLogAppEvents=1"
        nonce="tdycEoV4"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/65a0f05d0ff6374032bf34d7/1hjualrmj';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
    <!--End of Tawk.to Script-->
</body>

</html>
