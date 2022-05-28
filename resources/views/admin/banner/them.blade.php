<x-admin title="Thêm banner">
    <form action="{{ route('banner.luu') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name='ten' label='Tên banner' />
                {{-- <x-input name='mota' label='Mô tả'/> --}}
                <x-textarea name="mota" label="Mô tả" />
                <button class="btn btn-success text-light mt-3">Thêm dữ liệu</button>
            </div>
            <div class="col-md-6">
                {{-- <x-input name="hinhanh" label="Hình ảnh" type="file" /> --}}
                <div class="mt-3">
                    <label for="" class="form-label">Hình ảnh</label>
                    <input name="hinhanh" type="file" id="file_image" class="form-control">
                    <img id="preview_image" class="mt-3"
                        src="https://asycuda.world/wp-content/uploads/2012/01/600x200.png" width="100%" height="250"
                        alt="">
                </div>
            </div>
        </div>
    </form>
</x-admin>
