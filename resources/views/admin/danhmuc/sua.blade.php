<x-admin title="Sửa danh mục">
    <div class="col-md-6">
        <form action="{{ route('danhmuc.luu', $danhmuc->id) }}" method="post">
            @csrf
            <x-input value='{{ $danhmuc->tendanhmuc }}' name='tendanhmuc' label='Tên danh mục' />
            <div class="mt-3">
                <input checked='check' type='radio' name='trangthai' value='1' />Hiển thị
                <input  type='radio' name='trangthai' value='0' />Ẩn
            </div>
            <button class="btn text-light mt-3" style="background: #66a182;">Cập nhật dữ liệu</button>
        </form>
        <a class="btn btn-dark mt-3" href="{{ route('danhmuc.danhsach') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</x-admin>
