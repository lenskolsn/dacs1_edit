<x-admin title="Sửa bài viết">
    <div class="row">
        <form action="{{ route('post.luu', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
                <label class="form-label">Danh mục bài viết</label>
                <select name="id_danhmuc" class="form-select">
                    <option value="">
                        <--Chọn danh mục bài viết-->
                    </option>
                    @foreach ($danhmucbaiviet as $item)
                        <option value="{{ $item->id }}" @if ($item->id === $post->id_danhmuc) selected @endif>
                            {{ $item->tendanhmuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <x-input name="hinhanh" type="file" label="Hình ảnh" />
            </div>
            <div class="col-md-8">
                <x-input name="tieude" value="{{$post->tieude}}" label="Tiêu đề" />
            </div>
            <div class="col-md-8">
                <x-input name="mota" value="{{$post->mota}}" label="Mô tả" />
            </div>
            <div class="col-md-8 mt-3">
                <label class="form-label">Nội dung</label>
                <textarea name="noidung" id="editor1">{{$post->noidung}}</textarea>
                @error('noidung')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-8 mt-3">
                <button class="btn text-light mt-3" style="background: #66a182;">Cập nhật dữ liệu</button>
            </div>
        </form>
    </div>
</x-admin>
