<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $attributes['title'] }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="https://mcl-aftermarket.com/images/shop.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ultra&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
        }

        header #nav_bar ul li:hover {
            background: #66a182;
            transition: .5s;
        }

        .card {
            position: relative;
            transition: 0.3s;
        }

        .trangthai {
            padding: 5px 0px;
            width: 100%;
            color: white;
            background: rgba(255, 0, 0, 0.774);
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        .card:hover {
            transform: scale(1.02)
        }

        .logo {
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .btn-top {
            position: fixed;
            bottom: 12px;
            right: 12px;
            cursor: pointer;
            display: none;
            transition: 0.4s;
            z-index: 1;
        }

    </style>
</head>

<body>
    {{-- Nút back to top --}}
    <img class="btn-top" src="https://ps.w.org/back-to-the-top-button/assets/icon-256x256.png?rev=2283756"
        width="60" height="60" alt="">
    {{-- Top --}}
    <div class="top">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-6">
                    <h5 class="mt-2" style="font-family: 'Ultra', serif;"><i>Le Nam - Chi Hao</i></h5>
                </div>
                <div class="col-6">
                    <ul style="list-style: none;" class="d-flex align-items-center justify-content-end m-0 py-1">
                        {{-- Đăng ký --}}
                        @if (Auth::guard('khach_hangs')->user())
                            {{-- Avatar --}}
                            <li>
                                <img src="/storage/avatars/{{ Auth::guard('khach_hangs')->user()->avatar }}"
                                    class="rounded-circle img-thumbnail" width="40" height="40" alt="">
                            </li>
                            {{-- Dropdown Info và Đăng xuất --}}
                            <div class="btn-group">
                                <button style="background: none; outline: none; border:none;" type="button"
                                    class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::guard('khach_hangs')->user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('khachhang.info') }}"><i
                                                class="fas fa-user-circle"></i> Thông tin </a></li>
                                    <li><a class="dropdown-item" href="{{ route('khachhang.dangxuat') }}"><i
                                                class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        @else
                            <li class="mx-2"><a class="text-decoration-none text-dark"
                                    href="{{ route('khachhang.dangky') }}">ĐĂNG KÝ</a></li>
                            <li>/</li>
                            <li class="mx-2"><a class="text-decoration-none text-dark"
                                    href="{{ route('khachhang.dangnhap') }}">ĐĂNG NHẬP</a></li>
                        @endif
                        {{-- Giỏ hàng --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header class="bg-dark">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    {{-- <a class="navbar-brand" href="{{ route('trangchu') }}">Trang chủ</a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('trangchu') }}">
                                    Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('gioithieu') }}">Giới
                                    thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('sanpham') }}">Sản
                                    phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('blog') }}">Blog</a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('trangchu') }}" class="d-flex align-items-center ">
                        <input name="key" type="search" class="form-control rounded" placeholder="Nhập tên sản phẩm..."
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn text-light" style="background: #66a182;"><i
                                class="fas fa-search"></i></button>

                        @if (Auth::guard('khach_hangs')->user())
                            <div class="d-flex align-items-center">
                                <a href="{{ route('cart.xem') }}" class="text-decoration-none text-light ms-3">
                                    <span class="position-relative">
                                        <i class="fas fs-4 fa-shopping-bag text-light"></i>
                                        <span
                                            class="position-absolute top-1 start-105 translate-middle badge rounded-pill bg-danger">
                                            {{ $cart->total_quantity }}
                                        </span>
                                    </span>
                                </a>
                                <span class="ms-3 badge bg-light text-dark">
                                    {{ number_format($cart->total_price) }} VNĐ
                                </span>
                            @else
                                <a href="{{ route('cart.xem') }}" class="text-decoration-none text-light mx-3">
                                    <span class="position-relative">
                                        <i class="fas fs-4 fa-shopping-bag text-light"></i>
                                        <span
                                            class="position-absolute top-1 start-105 translate-middle badge rounded-pill bg-danger">
                                            0
                                        </span>
                                    </span>
                                </a>
                                <span class="badge bg-light text-dark">
                                    0 VNĐ
                                </span>
                            </div>
                        @endif

                    </form>
                </div>
            </nav>
        </div>
    </header>
    <!-- Danh mục sản phẩm -->
    <section class="my-3">
        <div class="container">
            {{ $slot }}
        </div>
    </section>

    <footer class="text-white rounded shadow" style="margin-top: 30px; background: #252525; max-width: 100vw;">
        <div class="container pt-4">
            <div class="row d-flex justify-content-center align-items-center py-5">
                <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                    <div>
                        <div class="text-center">
                            <img class="logo rounded-circle mb-3"
                                src="https://i1.sndcdn.com/artworks-000092107228-vfimi5-t500x500.jpg" width="100"
                                height="100" alt="">
                        </div>
                        <div class="map">
                            <p><i class="fas fa-map-marker-alt me-3"></i>Hồng Ngự - Đồng Tháp</p>
                        </div>
                        <div class="phone">
                            <p><i class="fas fa-phone me-3"></i>0354632349</p>
                        </div>
                        <div class="email">
                            <p><i class="fas fa-envelope me-3"></i>lnam6507@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 d-sm-block col-sm-6 d-none py-2 border-light">
                    <h6 class="mb-2">TÀI KHOẢN</h6>
                    <p><a href="{{ route('trangchu') }}" class="text-decoration-none text-light">Trang chủ</a></p>
                    <p><a href="{{ route('gioithieu') }}" class="text-decoration-none text-light">Giới thiệu</a></p>
                    <p><a href="" class="text-decoration-none text-light">Sản phẩm</a></p>
                    <p><a href="" class="text-decoration-none text-light">Tin tức</a></p>
                    <p><a href="" class="text-decoration-none text-light">Liên hệ</a></p>
                </div>
                <div class="col-lg-2 col-md-3 d-sm-block col-sm-6 d-none py-2 border-light">
                    <h6 class="mb-2">CHÍNH SÁCH</h6>
                    <p><a href="{{ route('trangchu') }}" class="text-decoration-none text-light">Trang chủ</a></p>
                    <p><a href="{{ route('gioithieu') }}" class="text-decoration-none text-light">Giới thiệu</a></p>
                    <p><a href="" class="text-decoration-none text-light">Sản phẩm</a></p>
                    <p><a href="" class="text-decoration-none text-light">Tin tức</a></p>
                    <p><a href="" class="text-decoration-none text-light">Liên hệ</a></p>
                </div>
                <div class="col-lg-2 col-md-3 d-sm-block col-sm-6 d-none py-2 border-light">
                    <h6 class="mb-2">ĐIỀU KHOẢN</h6>
                    <p><a href="{{ route('trangchu') }}" class="text-decoration-none text-light">Trang chủ</a></p>
                    <p><a href="{{ route('gioithieu') }}" class="text-decoration-none text-light">Giới thiệu</a></p>
                    <p><a href="" class="text-decoration-none text-light">Sản phẩm</a></p>
                    <p><a href="" class="text-decoration-none text-light">Tin tức</a></p>
                    <p><a href="" class="text-decoration-none text-light">Liên hệ</a></p>
                </div>
                <div class="col-lg-2 col-md-3 d-sm-block col-sm-6 d-none py-2 border-light">
                    <h6 class="mb-2">HƯỚNG DẪN</h6>
                    <p><a href="{{ route('trangchu') }}" class="text-decoration-none text-light">Trang chủ</a></p>
                    <p><a href="{{ route('gioithieu') }}" class="text-decoration-none text-light">Giới thiệu</a></p>
                    <p><a href="" class="text-decoration-none text-light">Sản phẩm</a></p>
                    <p><a href="" class="text-decoration-none text-light">Tin tức</a></p>
                    <p><a href="" class="text-decoration-none text-light">Liên hệ</a></p>
                </div>
            </div>
        </div>
        <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; 2022 All right reserved
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
