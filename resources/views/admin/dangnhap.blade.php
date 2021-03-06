<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <link  rel="icon" href="https://cdn-icons-png.flaticon.com/512/272/272354.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: url('https://w.wallha.com/ws/12/jEWLtOb7.png');
            background-size: cover;
        }

        #login_form {   
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5%;
        }

        .input {
            border: none;
            border-bottom: 2px solid white;
            display: block;
            width: 100%;
            outline: none;
            color: white;
            background: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="login_form" class="col-md-4 text-light py-5">
                <form action="{{ route('nhanvien.post_dangnhap') }}" method="post" class="py-5">
                    @csrf
                    <h3 class="text-center">
                        
                        Admin Login
                    </h3>
                    <x-input name='email' label='Email' />
                    <x-input type='password' name='password' label='Mật khẩu' />

                    <div class="mt-4 text-center">
                        <button class="btn btn-outline-light w-100">Đăng Nhập</button>
                    </div>
                    {{-- <div class="mt-4">
                        Bạn chưa có tài khoản? <a href="{{ route('dangky') }}"
                            class="text-decoration-none text-info">Đăng ký</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
