<x-admin title="Sửa đơn hàng">
    <div class="col-md-6">
        <form action="{{ route('donhang.luu', $donhang->id) }}" method="post">
            @csrf
            <x-input name="tenkhachhang" label="Tên khách hàng" value="{{ $donhang->tenkhachhang }}" />
            <x-input name="ghichu" label="Ghi chú" value="{{ $donhang->ghichu }}" />
            <x-input name="diachi" label="Địa chỉ" value="{{ $donhang->diachi }}" />
            <div class="form-group mt-3">
                <label for="" class="form-label">Trạng thái</label>
                <select name="trangthai" class="form-select">
                    <option value="0">Đơn hàng mới</option>
                    <option value="1">Đang xử lý</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Hoàn thành</option>
                    <option value="4">Đã hủy</option>
                </select>
            </div>
            <button class="btn btn-success text-light mt-3">Cập nhật dữ liệu</button>
        </form>
    </div>
</x-admin>
