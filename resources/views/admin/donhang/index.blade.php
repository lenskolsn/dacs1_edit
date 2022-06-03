<x-admin title="Danh sách đơn hàng">
    <div class="row">
        @if (Session::has('message'))
            <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
        @endif
        <div class="col-md">
            <table class="table shadow-sm">
                <thead class="text-light text-center" style="background: #66a182;">
                    <tr>
                        <th>#</th>
                        <th>Thông tin</th>
                        <th>Ghi chú</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhang as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>
                                <p><span class="text-primary fw-bold">{{ $item->tenkhachhang }}</span> -
                                    {{ $item->diachi }}</p>
                                <p>SĐT: {{ $item->khach_hangs->phone }}</p>
                            </td>
                            <td class="text-center">{{ $item->ghichu }}</td>
                            <td class="fw-bold text-danger text-center">{{ number_format($item->tongtien) }} VNĐ</td>
                            <td class="text-center">{{ $item->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                {{-- <select name="trangthai" id=""> --}}
                                @if ($item->trangthai == 0)
                                    <span class="badge bg-info">Đơn hàng mới</span>
                                @elseif($item->trangthai == 1)
                                    <span class="badge bg-primary">Đang xử lý</span>
                                @elseif($item->trangthai == 2)
                                    <span class="badge bg-primary">Đang giao hàng</span>
                                @elseif($item->trangthai == 3)
                                    <span class="badge bg-success">Hoàn thành</span>
                                @elseif($item->trangthai == 4)
                                    <span class="badge bg-danger">Đã hủy</span>
                                @endif
                                {{-- </select> --}}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('donhang.chitiet', $item->id) }}" class="btn btn-info text-light"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('donhang.sua', $item->id) }}" class="btn btn-warning text-light"><i
                                        class="fas fa-pen"></i></a>
                                <a href="{{ route('donhang.xoa', $item->id) }}" class="btn btn-danger text-light"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
