<x-admin title="Thêm sản phẩm">
    <form action="{{ route('sanpham.luu') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            @if (Session::has('message'))
                <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
            @endif
            <div class="col-md-6">
                @csrf
                <x-input name='tensanpham' label='Tên sản phẩm' />
                <x-select-danh-muc name='id_danhmuc' label='Danh mục' />
                <x-input name='gia' label='Giá' />
                {{-- <x-input name='mota' label='Mô tả' /> --}}
                <x-textarea name="mota" label="Mô tả" />
                <div class="form-group mt-3">
                    <label class="form-label">Trạng thái</label> <br>
                    <input checked type="radio" name="trangthai" value="1"> Còn hàng
                    <input type="radio" name="trangthai" value="0"> Hết hàng
                </div>
                <button class="btn text-light" style="background: #66a182;">Thêm dữ liệu</button>
            </div>
            <div class="col-md-6">
                <x-input name="soluong" label="Số lượng" type="number"/>
                <x-input name="mau" label="Màu" type="text" />
                <x-input name="size" label="Size" type="text" />
                <div class="mt-3">
                    <label class="form-label">Hình ảnh</label>
                    <input name="hinhanh" type="file" id="file_image" class="form-control">
                    <img id="preview_image" class="mt-3"
                        src="https://routine.vn/media/catalog/product/c/h/cheo_16_5.png" width="250" alt="">
                </div>

                {{-- <div class="mt-3">
                    <label class="form-label">Ảnh mô tả</label>
                    <input name="anhmota[]" type="file" multiple class="file_anhmota form-control">
                    <div class="div_anhmota">
                        <img src="https://wallpaperaccess.com/full/4990821.png" class="anhmota rounded shadow-sm border border-1 mt-3 me-3" width="80" height="80"
                            alt="">
                        <img src="https://wallpaperaccess.com/full/4990821.png" class="anhmota rounded shadow-sm border border-1 mt-3 me-3" width="80" height="80"
                            alt="">
                        <img src="https://wallpaperaccess.com/full/4990821.png" class="anhmota rounded shadow-sm border border-1 mt-3 me-3" width="80" height="80"
                            alt="">
                        <img src="https://wallpaperaccess.com/full/4990821.png" class="anhmota rounded shadow-sm border border-1 mt-3 me-3" width="80" height="80"
                            alt="">
                    </div>
                </div> --}}
            </div>
        </div>
        <a class="btn btn-dark mt-3" href="{{ route('sanpham.danhsach') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    </form>
</x-admin>
