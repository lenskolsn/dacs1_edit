<x-trangchu title="Trang tìm kiếm">
    <div class="row">
        {{-- include Danh mục --}}
        <div class="col-md-3">
            <div class="category">
                <ul style="list-style: none;" class="p-0">
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
        <div class="col-md-9">
            <h5 class="text-center badge w-100" style="background: #66a182;">Tìm thấy {{ $soluong }} sản phẩm</h5>
            <div class="row">
                @if ($soluong > 0)
                    @foreach ($sanpham as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="card text-center bg-light m-auto">
                                @if ($item->trangthai == 0 || $item->soluong == 0)
                                    <h5 class="trangthai">Hết hàng</h5>
                                @endif
                                <img src="/storage/{{ $item->hinhanh }}" class="img-thumbnail"
                                    alt="{{ $item->tensanpham }}">
                                <p class="text-decoration-none text-dark mt-3" href="">{{ $item->tensanpham }}</p>
                                <p style="color: #66a182;" class="fw-bold">{{ number_format($item->gia) }}
                                    <sup>đ</sup>
                                </p>
                                <p>
                                    @if ($item->trangthai == 1)
                                        <a href="{{ route('cart.them', $item->id) }}"
                                            class="text-decoration-none btn btn-sm btn-outline-dark">Thêm vào giỏ</a>
                                    @endif
                                </p>
                                <a href="{{ route('xemchitiet', ['id' => $item->id]) }}"
                                    class="text-decoration-none badge text-light"
                                    style="font-size: 13px; background: #66a182;">Xem
                                    chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-danger text-center h5">Không tìm thấy sản phẩm</p>
                @endif
            </div>
        </div>
    </div>
</x-trangchu>
