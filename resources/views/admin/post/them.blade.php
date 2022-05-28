<x-admin title="Thêm bài viết">
    <div class="row">
        <form action="{{route('post.luu')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
                <label class="form-label">Danh mục bài viết</label>
                <select name="id_danhmuc" class="form-select">
                    <option value="">
                        <--Chọn danh mục bài viết-->
                    </option>
                    @foreach ($danhmucbaiviet as $item)
                        <option value="{{ $item->id }}">{{ $item->tendanhmuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <x-input name="hinhanh" type="file" label="Hình ảnh" />
            </div>
            <div class="col-md-8">
                <x-input name="tieude" label="Tiêu đề" />
            </div>
            <div class="col-md-8">
                <x-input name="mota" label="Mô tả" />
            </div>
            <div class="col-md-8 mt-3">
                <label class="form-label">Nội dung</label>
                <textarea name="noidung" id="editor1"></textarea>
                @error('noidung')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-8 mt-3">
                <button class="btn text-light" style="background: #66a182;">Thêm dữ liệu</button>
            </div>
        </form>
    </div>
</x-admin>
