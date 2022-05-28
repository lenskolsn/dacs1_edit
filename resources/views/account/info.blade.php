<x-trangchu title="Thông tin tài khoản">
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                @if (Session::has('success'))
                    <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
                @endif
                <div class="col-md-12 text-center">
                    <h5>TRANG TÀI KHOẢN</h5>
                    <b>Xin chào, </b><span class="fw-bold"
                        style="color: #66a182;">{{ Auth::guard('khach_hangs')->user()->name ?? '' }} !</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            {{-- Avatar --}}
            <div class="card text-dark mt-3 col-md-12 mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 mb-3 text-center">
                            {{-- Avatar --}}
                            <img id="avatar_khachhang"
                                src="/storage/avatars/{{ Auth::guard('khach_hangs')->user()->avatar }}"
                                class="rounded-circle img-thumbnail shadow" width="150" height="150" alt="">
                            {{-- Fo1m Lưu avatar --}}
                            <form
                                action="{{ route('khachhang.capnhat_avatar', Auth::guard('khach_hangs')->user()->id) }}"
                                class="mt-3" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="upload_avatar" class="badge bg-dark fs-5" style="cursor: pointer;"><i
                                        class="fas fa-camera"></i></label>
                                <p class="text-danger">
                                    @error('avatar')
                                        Vui lòng chọn avatar...
                                    @enderror
                                </p>
                                <div class="input-group input-group-sm mt-3">
                                    <input id="upload_avatar" type="file" title="Chọn avatar"
                                        class="form-control d-none" name="avatar">
                                </div>
                                <button class="btn-sm btn-dark text-light mt-1">Cập nhật</button>
                            </form>
                        </div>
                        {{-- Thông tin tài khoản --}}
                        <div class="col-md-7">
                            <div class="card-header">THÔNG TIN TÀI KHOẢN</div>
                            <div class="card-body">
                                {{-- Tên --}}
                                <p>
                                    <span><b><i class="fas fa-user"></i></span> </b>
                                    <span>{{ Auth::guard('khach_hangs')->user()->name }}</span>
                                </p>
                                {{-- Email --}}
                                <p>
                                    <span><b><i class="fas fa-envelope"></i> </b>
                                    </span><span>{{ Auth::guard('khach_hangs')->user()->email }}</span>
                                </p>
                                {{-- Điện thoại --}}
                                <p>
                                    <span><b><i class="fas fa-phone"></i> </b>
                                    </span><span>{{ Auth::guard('khach_hangs')->user()->phone }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <div class="col-lg-8 col-sm-12">
            <span class="badge bg-dark mt-3">Đơn hàng đã đặt</span>
            <table class="table table-bordered mt-3">
                <thead class="text-light" style="background: #66a182;">
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Hình ảnh</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach ($donhang as $dh)
                        @foreach ($chitietdonhang as $ct)
                            @if ($ct->id_donhang == $dh->id)
                                @foreach ($sanpham as $sp)
                                    @if ($sp->id == $ct->id_sanpham)
                                        <tr>
                                            <td>{{ $sp->tensanpham }}</td>
                                            <td>
                                                <img src="/storage/{{ $sp->hinhanh }}" width="100" alt="">
                                            </td>
                                            <td class="text-danger fw-bold">{{ number_format($sp->gia) }} VNĐ</td>
                                            <td>{{ $ct->quantity }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-trangchu>
