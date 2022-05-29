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
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhang as $item)
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tenkhachhang }}</td>
                            <td>{{ $item->diachi }}</td>
                            <td>{{ $item->khach_hangs->phone }}</td>
                            <td>{{ $item->ghichu }}</td>
                            <td class="fw-bold text-danger">{{ number_format($item->tongtien) }} VNĐ</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('donhang.chitiet', $item->id) }}" class="btn btn-info text-light"><i
                                        class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-warning text-light"><i class="fas fa-pen"></i></a>
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
