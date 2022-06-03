<x-trangchu title="Trang chủ">
    {{-- Danh mục và slides --}}
    @if (Session::has('success'))
        <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
    @endif
    <div class="row">
        {{-- Danh mục sản phẩm --}}
        <div class="col-lg-3 col-md-12">
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
        {{-- Slides --}}
        <div class="col-lg-9 col-md-12">
            <x-slides />
        </div>
    </div>

    {{-- Sản phẩm bán chạy và Sản phẩm --}}

    <div class="row mt-2">
        <div class="col-lg-3">
            <div class="row">
                <div class="col-md-12">
                    {{-- Tiêu đề sản phẩm bán chạy --}}
                    <p class="fw-bold p-2 text-danger">SẢN PHẨM BÁN CHẠY</p>
                    <hr>
                    @foreach ($spbanchay as $item)
                        <a class="text-decoration-none text-dark"
                            href="{{ route('xemchitiet', ['id' => $item->id]) }}">
                            <div class="col-md d-flex my-3 bg-light p-1 border-1 shadow-sm">
                                <img src="/storage/{{ $item->hinhanh }}" class="img-thumbnail"
                                    alt="{{ $item->tensanpham }}" width="80">
                                <div class="mx-3">
                                    <p>{{ $item->tensanpham }}</p>
                                    <p class="fw-bold" style="color: #66a182;">{{ number_format($item->gia) }}
                                        <sup>đ</sup>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-12">
                    {{-- Hỗ trợ trực tuyến --}}
                    <ul class="m-0 p-0" style="list-style: none;">
                        <li class="d-flex align-items-center px-4 py-2"
                            style="background: #66a182; border-bottom: 1px solid white;">
                            <p>
                                <i class="fas fa-phone text-light fs-5"></i>
                            </p>
                            <div class="mx-3">
                                <p style="color: #fcfcfc;">Hỗ trợ trực tuyến 24/7</p>
                                <span class="h5 text-light">19006750</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center px-4 py-2"
                            style="background: #66a182; border-bottom: 1px solid white;">
                            <p>
                                <i class="fas fa-undo text-light fs-5"></i>
                            </p>
                            <div class="mx-3">
                                <p style="color: #fcfcfc;">Đổi trả hàng trong ngày</p>
                                <span class="h5 text-light">19006750</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center px-4 py-2"
                            style="background: #66a182; border-bottom: 1px solid white;">
                            <p>
                                <i class="fas fa-truck text-light fs-5"></i>
                            </p>
                            <div class="mx-3">
                                <p style="color: #fcfcfc;">Miễn phí vận chuyển</p>
                                <span class="h5 text-light">19006750</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Sản phẩm --}}
        <div class="col-lg-9">
            <!-- Tiêu đề sản phẩm mới -->
            <div class="title">
                <p class="fw-bold p-2 text-danger">SẢN PHẨM MỚI</p>
                <hr>
            </div>
            <!-- Card -->
            <div class="row">
                @foreach ($sanpham as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card text-center bg-light m-auto">
                            <div>
                                <a href="{{ route('xemchitiet', $item->id) }}">
                                    <img src="/storage/{{ $item->hinhanh }}" alt="{{ $item->tensanpham }}"
                                        class="img-thumbnail">
                                </a>
                                @if ($item->trangthai == 0 || $item->soluong == 0)
                                    <h5 class="trangthai">Hết hàng</h5>
                                @endif
                            </div>
                            <p class="text-decoration-none text-dark mt-3" href="">{{ $item->tensanpham }}</p>
                            <p style="color: #66a182;" class="fw-bold">{{ number_format($item->gia) }}
                                <sup>đ</sup>
                            </p>
                            <p>
                                @if ($item->trangthai == 1)
                                @endif
                            </p>
                            <a href="{{ route('xemchitiet', ['id' => $item->id]) }}"
                                class="text-decoration-none badge text-light py-1"
                                style="font-size: 14px; background: #66a182;">Xem
                                chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-trangchu>
