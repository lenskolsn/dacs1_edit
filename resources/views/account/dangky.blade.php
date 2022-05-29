<x-trangchu title="Đăng ký tài khoản">
    <p class="text-center fs-3">Đăng ký</p>
    <form action="{{route('khachhang.post_dangky')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
                {{-- Thông báo nếu tạo tài khoản thành công --}}
                @if (Session::has('message'))
                    <p class="alert bg-success text-light">{{Session::get('message')}} <a class="text-decoration-none text-info" href="{{route('khachhang.dangnhap')}}">Đăng nhập</a></p> 
                @endif

                <h5>THÔNG TIN CÁ NHÂN</h5>
                <div class="form-group col-md-6">
                    <x-input name='name' label='Họ tên' />
                </div>
                <div class="form-group col-md-6">
                    <x-input name='avatar' type='file' label='Avatar'/>
                </div>
                <div class="form-group col-md-6">
                    <x-input name='email' label='Email' />
                </div>
                <div class="form-group col-md-6">
                    <x-input name='phone' label='Số điện thoại' />
                </div>
                <div class="form-group col-md-6">
                    <x-input name='password' type='password' label='Mật khẩu' />
                </div>
                <div class="form-group col-md-6">
                    <x-input name='confirm_password' type='password' label='Nhập lại mật khẩu' />
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-secondary">Đăng ký</button>
                    
                    <a href="{{route('khachhang.dangnhap')}}" class="btn btn-success mx-3">Đăng nhập</a>
                </div>

        </div>
    </form>
</x-trangchu>
