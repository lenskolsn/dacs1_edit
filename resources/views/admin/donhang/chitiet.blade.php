<x-admin title="Chi tiết đơn hàng">
    <table class="table table-bordered">
        <thead class="text-light" style="background: #66a182;">
            <tr class="text-center">
                <th>ID Đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ngày đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang as $item)
                <tr>
                    <td class="text-center">{{ $item->id_donhang }}</td>
                    <td class="d-flex">
                        <img class="img-thumbnail" src="/storage/{{ $item->sanpham[0]['hinhanh'] }}" width="70"
                            height="70" alt="">
                        <div class="ms-3">
                            <span>{{ $item->sanpham[0]['tensanpham'] }}</span> <br>
                            <span class="badge text-dark p-0">Mô tả: {{ $item->sanpham[0]['mota'] }}</span>
                        </div>
                    </td>
                    <td class="text-center">{{ $item->mau }}</td>
                    <td class="text-center">{{ $item->size }}</td>
                    <td class="text-danger fw-bold text-center">{{ number_format($item->gia) }} VNĐ</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-center">{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-dark mt-3" href="{{ route('donhang.danhsach') }}">
        <i class="fas fa-arrow-left"></i>
    </a>
</x-admin>
