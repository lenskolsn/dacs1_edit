<x-trangchu title="Chi tiết sản phẩm">
    <div class="row">
        {{-- include Danh mục --}}
        <div class="col-lg-3 col-md-5">
            <div class="category">
                <ul style="list-style: none;" class="p-0 border border-1 shadow">
                    <li style="background: #66a182;" class="text-light py-3 px-4"><i style="margin-right: 10px;"
                            class="fas fa-bars"></i>
                        DANH MỤC SẢN
                        PHẨM</li>
                    @foreach ($danhmuc as $item)
                        @if ($item->trangthai == 1)
                            <li class="py-2 px-4"
                                style="border-bottom: 1px solid gray; background: rgba(37, 37, 37, 0.9);"><a
                                    class="text-decoration-none text-light"
                                    href="{{ route('sp_theo_dm', ['id' => $item->id]) }}">{{ $item->tendanhmuc }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- Chi tiết sản phẩm --}}
        <div class="col-lg-9 col-md-7">
            @if (Session::has('message'))
                <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
            @endif
            <h5 class="text-center badge w-100" style="background: #66a182;">Chi tiết sản phẩm</h5>
            <div class="row py-2 d-flex justify-content-between">
                <div class="col-md-5">
                    {{-- Ảnh chính --}}
                    <div class="image" onmousemove="myFunction(event)">
                        <img class="img-thumbnail" id="anhsanpham" src="/storage/{{ $sanpham->hinhanh }}"
                            width="100%" height="400" alt="">
                    </div>
                    {{-- Ảnh mô tả --}}
                    {{-- <div class="mt-3">
                        <img style="cursor: pointer;" class="anhmota rounded shadow-sm border border-1"
                            src="/storage/{{ $sanpham->hinhanh }}" width="80" height="80" alt="">
                        @foreach ($sanpham->anhmota as $item)
                            <img style="cursor: pointer;" class="anhmota rounded shadow-sm border border-1"
                                src="/storage/anhmota/{{ $item->anhmota }}" width="80" height="80" alt="">
                        @endforeach
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <h3 name='tensanpham' class="tensanpham">{{ $sanpham->tensanpham }}</h3>
                    <p class="gia h4 text-danger">{{ number_format($sanpham->gia) }} <sup>đ</sup></p>
                    <p><span class="fw-bold">Mô tả:</span>
                        @if ($sanpham->mota != '')
                            {{ $sanpham->mota }}
                        @else
                            Đang cập nhật
                        @endif
                    </p>
                    <hr>
                    <form method="post" action="{{ route('cart.them', ['id' => $sanpham->id]) }}">
                        @csrf
                        <div class="form-group">
                            <p class="fw-bold">Màu:</p>
                            @if ($sanpham->mau != '')
                                <select class="form-select" name="mau">
                                    @foreach ($mau_sanpham as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('mau')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            @else
                                <p class="text-secondary">Đang cập nhật...</p>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <p class="fw-bold">Size:</p>
                            @if ($sanpham->size != '')
                                <select class="form-select" name="size" id="">
                                    @foreach ($size_sanpham as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            @else
                                <p class="text-secondary">Đang cập nhật...</p>
                            @endif
                        </div>
                        @if ($sanpham->soluong > 0 || $sanpham->trangthai == 0)
                            <button class="btn text-light mt-3 w-100" style="background: #66a182;">Thêm
                                vào
                                giỏ</button>
                        @else
                            <p class="text-light text-center bg-danger p-1 rounded-1 fs-5 mt-3">Sản phẩm đã hết hàng!
                            </p>
                        @endif
                    </form>
                    <p class="mt-3"><span class="fw-bold">Danh mục:
                        </span><span>{{ $sanpham->danh_mucs->tendanhmuc }}</span></p>
                    <p><span class="fw-bold">Số lượng trong kho:</span> {{ $sanpham->soluong }}</p>
                </div>
            </div>
            {{-- Comment --}}
            <div class="row m-0 border border-1 bg-light">
                @if (Session::has('error'))
                    <p class="alert bg-warning"><a href="{{ route('khachhang.dangnhap') }}"
                            class="text-dark">Đăng
                            nhập</a> {{ Session::get('error') }}</p>
                @endif
                <div class="col-md-12 p-2">
                    <form action="{{ route('binhluan', $sanpham->id) }}" method="post">
                        @csrf
                        <x-textarea name="noidung" placeholder='Những điều bạn thích về sản phẩm này...'
                            label="Đánh giá sản phẩm ({{ $comment->count() }})" />
                        <button class="btn btn-sm btn-primary mt-3">Gửi</button>
                    </form>
                </div>
                <div class="col-md-12 p-2">
                    @foreach ($comment as $cm)
                        @foreach ($khachhang as $kh)
                            @if ($cm->khachhang_id == $kh->id)
                                <div class="comment d-flex justify-content-between align-items-center py-1 rounded-1">
                                    <div class="d-flex">
                                        <img src="/storage/avatars/{{ $kh->avatar }}"
                                            class="rounded shadow-sm border-1" width="70" height="70" alt="">
                                        <div class="ms-3">
                                            <h6 class="text-primary fw-bold m-0">{{ $kh->name }}</h6>
                                            <span class="text-secondary"
                                                style="font-size: 15px;">{{ $cm->created_at->diffForHumans() }}</span>
                                            <p>{{ $cm->noidung }}</p>
                                        </div>
                                    </div>

                                    @if (Auth::guard('khach_hangs')->check() && Auth::guard('khach_hangs')->user()->id == $cm->khachhang_id)
                                        <a href="{{ route('xoabinhluan', $cm->id) }}"
                                            class="text-decoration-none mx-3 btn btn-danger text-light btn-sm">Xóa</a>
                                    @endif

                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-trangchu>
