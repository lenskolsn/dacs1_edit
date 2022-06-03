<x-trangchu title="Giỏ hàng">
    <div class="row">
        @if (Session::has('error'))
            <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
        @endif
        @error('quantity')
            <p class="alert bg-danger text-light"></p>
        @enderror
        <h5 class="">GIỎ HÀNG</h5>
        <div class="col-md rounded shadow-sm bg-light p-2">
            @if ($cart->total_quantity == 0)
                <P>Không có sản phẩm nào. Quay lại <a href="{{ route('trangchu') }}" class="text-decoration-none"
                        style="color: #66a182;">cửa hàng</a> để tiếp tục mua sắm.</P>
            @else
                <table class="table table-bordered mt-3">
                    <thead class="text-light" style="background: #66a182;">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th style="width: 250px;">Số lượng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->items as $item)
                            <tr class="text-center">
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['tensanpham'] }}</td>
                                <td>
                                    <img src="/storage/{{ $item['hinhanh'] }}" width="100" alt="">
                                </td>
                                <td>{{ $item['mau'] }}</td>
                                <td>{{ $item['size'] }}</td>
                                <td class="text-danger"><b>{{ number_format($item['gia']) }}</b></td>
                                <form action="{{ route('cart.capnhat', $item['id']) }}" method="get">
                                    <td class="d-flex justify-content-center" style="width: 250px;">
                                        <input type="number" value="{{ $item['quantity'] }}" min="1"
                                            max="{{ $item['soluong'] }}" name="quantity" class="form-control"
                                            style="width: 100px;">
                                        <button class="mx-1 btn btn-sm text-light" style="background: #66a182;">Cập
                                            nhật</button>
                                    </td>
                                </form>
                                <td>
                                    <a href="{{ route('cart.xoa', $item['id']) }}" class="btn btn-danger"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="d-flex justify-content-between align-items-center">
                <a class="btn mt-3 text-light" style="background: #66a182;" href="{{ route('trangchu') }}">
                    Tiếp tục mua sắm </a>
                <div>
                    @if ($cart->total_quantity > 0)
                        <p>
                            Tổng tiền: <b class="text-danger">{{ number_format($cart->total_price) }} VNĐ</b>
                        </p>
                        <p>
                            <a href="{{ route('cart.clear') }}" class="text-decoration-none btn btn btn-danger">Xóa
                                tất
                                cả <i class="fas fa-trash-alt"></i></a>
                            <a href="{{ route('dathang') }}" class="btn text-light" style="background: #66a182;">Đặt
                                hàng</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-trangchu>
