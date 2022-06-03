<x-admin title="Sửa đơn hàng">
    <div class="col-md-6">
        <form action="{{ route('donhang.luu', $donhang->id) }}" method="post">
            @csrf
            <x-input name="tenkhachhang" label="Tên khách hàng" value="{{ $donhang->tenkhachhang }}" />
            <x-input name="ghichu" label="Ghi chú" value="{{ $donhang->ghichu }}" />
            <x-input name="diachi" label="Địa chỉ" value="{{ $donhang->diachi }}" />
            <button class="btn btn-success text-light mt-3">Cập nhật dữ liệu</button>
        </form>
    </div>
</x-admin>
