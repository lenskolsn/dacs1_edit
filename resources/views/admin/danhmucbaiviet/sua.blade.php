<x-admin title="Sửa danh mục bài viết">
    <form action="{{ route('danhmucbaiviet.luu', $danhmucbaiviet->id) }}" method="post">
        @csrf
        <x-input name="tendanhmuc" value="{{ $danhmucbaiviet->tendanhmuc }}" label="Tên danh mục" />
        <button class="btn text-light mt-3" style="background: #66a182;">Cập nhật dữ liệu</button>
    </form>
</x-admin>
