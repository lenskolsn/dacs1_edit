<x-admin title="Thêm khách hàng">
    <div class="row">
        @if (Session::has('message'))
            <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
        @endif
        <div class="col-md-6">
            <form action="{{ route('khachhang.post_dangky') }}" method="post">
                @csrf
                <x-input name='name' label='Họ tên' />
                <x-input name='email' label='Email' />
                <x-input name='phone' label='Số điện thoại' />
                <x-input type='password' name='password' label='Mật khẩu' />
                <x-input type='password' name='confirm_password' label='Nhập lại mật khẩu' />
                <button class="btn mt-3 text-light" style="background: #66a182;">Thêm tài khoản</button>
            </form>
        </div>
    </div>
</x-admin>
