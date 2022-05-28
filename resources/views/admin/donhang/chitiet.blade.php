<x-admin title="Chi tiết đơn hàng">
    <table class="table table-bordered">
        <thead class="text-light" style="background: #66a182;">
            <tr>
                <th>ID Đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ngày đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang as $item)
                <tr>
                    <td>{{ $item->id_donhang }}</td>
                    <td class="d-flex">

                        {{-- {{dd($item->sanpham)}} --}}

                        <img class="img-thumbnail" src="/storage/{{ $item->sanpham[0]['hinhanh'] }}" width="70"
                            height="70" alt="">
                        <div class="ms-3">
                            <span>{{ $item->sanpham[0]['tensanpham'] }}</span> <br>
                            <span class="badge text-dark p-0">Mô tả: {{ $item->sanpham[0]['mota'] }}</span>
                        </div>
                    </td>
                    <td class="text-danger fw-bold">{{ number_format($item->gia) }} VNĐ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-dark mt-3" href="{{ route('donhang.danhsach') }}">
        <i class="fas fa-arrow-left"></i>
    </a>
</x-admin>
