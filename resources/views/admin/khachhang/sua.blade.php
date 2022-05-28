<x-admin title="Cập nhật khách hàng">
    <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
        @endif
        <div class="col-md-3 text-center">
            <div class="card text-dark bg-light mb-3 m-auto " style="max-width: 18rem;">
                <div class="card-header">Avatar</div>
                <div class="card-body text-center">
                    <img id="preview_image" src="/storage/avatars/{{ $khachhang->avatar }}"
                        class="rounded-circle rounded shadow" width="150" height="150" alt="">
                    <form action="{{ route('khachhang.capnhat_avatar', $khachhang->id) }}" class="mt-3"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="file_image" class="badge bg-dark fs-5" style="cursor: pointer;"><i
                                class="fas fa-camera"></i></label>
                        <div class="input-group input-group-sm mt-3">
                            <input id="file_image" type="file" class="form-control d-none" name="avatar">
                        </div>
                        <button class="btn-sm btn-dark">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ route('khachhang.post_sua', $khachhang->id) }}" method="post">
                @csrf
                <x-input value='{{ $khachhang->name }}' name='name' label='Họ tên' />
                <x-input value='{{ $khachhang->email }}' name='email' label='Email' />
                <x-input value='{{ $khachhang->phone }}' name='phone' label='Số điện thoại' />
                <button class="btn btn-success mt-3 text-light">Cập nhật tài khoản</button>
            </form>
        </div>
    </div>
</x-admin>
