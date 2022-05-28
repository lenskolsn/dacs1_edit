<x-trangchu title="{{ $dm->tendanhmuc }}">
    <div class="row">
        {{-- Include danh mục --}}
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

        <div class="col-lg-9 col-md-7">
            {{-- Hiển thị tên danh mục --}}
            <h5 class="text-center badge w-100" style="background: #66a182;">Danh mục: {{ $dm->tendanhmuc }}</h5>
            {{-- Hiển thị sản phẩm theo danh mục --}}
            <div class="row">
                @if ($dm->san_phams->count() > 0)
                    @foreach ($sanpham as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card text-center mt-3 bg-light">
                                @if ($item->trangthai == 0)
                                    <h5 class="trangthai">Hết hàng</h5>
                                @endif
                                <a href="{{ route('xemchitiet', $item->id) }}">
                                    <img src="/storage/{{ $item->hinhanh }}" class="img-thumbnail"
                                        alt="{{ $item->tensanpham }}">
                                </a>
                                <p class="text-decoration-none text-dark mt-3" href="">{{ $item->tensanpham }}</p>
                                <p style="color: #66a182;" class="fw-bold">{{ number_format($item->gia) }}
                                    <sup>đ</sup>
                                </p>
                                <p>
                                    <a href="{{ route('cart.them', $item->id) }}"
                                        class="text-decoration-none btn btn-sm btn-outline-dark">Thêm vào giỏ</a>
                                </p>
                                <a href="{{ route('xemchitiet', ['id' => $item->id]) }}"
                                    class="text-decoration-none badge text-light"
                                    style="font-size: 14px; background: #66a182;">Xem chi
                                    tiết</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-danger text-center fs-5">Chưa có sản phẩm!!!</p>
                @endif
            </div>
        </div>
    </div>
</x-trangchu>
