<x-trangchu title="Đăng nhập">
    @if (Session::has('message'))
        <p class="alert bg-success text-light">{{Session::get('message')}}</p>
    @endif
    <h5 class="fw-bold">THÔNG TIN ĐĂNG NHẬP</h5>
    <form action="{{ route('khachhang.post_dangnhap') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name='email' label='Email' />
                <x-input name='password' type='password' label='Mật khẩu' />
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold">BẠN CHƯA CÓ TÀI KHOẢN ?</h5>
                <p>Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn ! Ngoài ra còn có rất nhiều
                    chính sách và ưu đãi cho các thành viên</p>
                <a href="{{ route('khachhang.dangky') }}" class="btn btn-success">Đăng ký</a>
            </div>
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-secondary mt-3">Đăng nhập</button>
        </div>
    </form>
</x-trangchu>
