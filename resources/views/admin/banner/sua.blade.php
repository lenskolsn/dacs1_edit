<x-admin title="Sửa banner">
    <form action="{{ route('banner.luu', $banner->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input value='{{ $banner->ten }}' name='ten' label='Tên banner' />
                {{-- <x-input name='mota' label='Mô tả'/> --}}
                <x-textarea value="{{ $banner->mota }}" name="mota" label="Mô tả" />
                <button class="btn btn-success text-light mt-3">Cập nhật dữ liệu</button>
            </div>
            <div class="col-md-6">
                {{-- <x-input name="hinhanh" label="Hình ảnh" type="file" /> --}}
                <div class="mt-3">
                    <label for="" class="form-label">Hình ảnh</label>
                    <input type="file" id="file_image" name="hinhanh" class="form-control">
                    <img id="preview_image" class="rounded-1 shadow mt-3" src="/storage/{{ $banner->hinhanh }}"
                        width="100%" height="250" alt="">
                </div>
            </div>
        </div>
    </form>
</x-admin>
