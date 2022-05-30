<x-trangchu title="Đổi mật khẩu">
    <div class="col-md-6 m-auto">
        @if (Session::has('error'))
            <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
        @endif
        <h4 class="text-center">Đổi mật khẩu</h4>
        <form action="{{ route('khachhang.post_doimatkhau') }}" method="post">
            @csrf
            <x-input placeholder="**********" name="old_password" type="password" label="Mật khẩu cũ" />
            <x-input placeholder="**********" name="password" type="password" label="Mật khẩu mới" />
            <x-input placeholder="**********" name="confirm_password" type="password" label="Nhập lại mật khẩu mới" />
            <button class="btn btn-dark mt-3">Cập nhật mật khẩu</button>
        </form>
    </div>
</x-trangchu>
