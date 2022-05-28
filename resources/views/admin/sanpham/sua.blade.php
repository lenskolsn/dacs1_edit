<x-admin title="Sửa sản phẩm">
    <form action="{{ route('sanpham.luu', $sanpham->id) }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                @csrf
                <x-input value='{{ $sanpham->tensanpham }}' name='tensanpham' label='Tên sản phẩm' />
                {{-- <x-input type='file' name='hinhanh' label='Hình ảnh' /> --}}

                <div class="mt-3">
                    <label class='form-label'>Danh mục</label>
                    <select class="form-select" name="id_danhmuc">
                        <option value="">
                            <--Chọn 1 giá trị-->
                        </option>
                        @foreach ($danhmuc as $dm)
                            <option value="{{ $dm->id }}"
                                {{ $sanpham->id_danhmuc == $dm->id ? 'selected' : '' }}>{{ $dm->tendanhmuc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <x-input value='{{ $sanpham->gia }}' name='gia' label='Giá' />

                <x-textarea value='{{ $sanpham->mota }}' name="mota" label="Mô tả" />

                <div class="form-group mt-3">
                    <label class="form-label">Trạng thái</label> <br>
                    <input checked type="radio" name="trangthai" value="1"> Còn hàng
                    <input type="radio" name="trangthai" value="0"> Hết hàng
                </div>

                <button class="btn btn-success text-light mt-3">Cập nhật dữ liệu</button>

            </div>
            <div class="col-md-6">
                <div class="mt-3">
                    <label for="" class="form-label">Hình ảnh</label>
                    <input name="hinhanh" type="file" id="file_image" class="form-control">
                    <img id="preview_image" class="mt-3" src="/storage/{{ $sanpham->hinhanh }}" width="250" alt="">
                </div>
                {{-- <div class="mt-3">
                    <label class="form-label">Ảnh mô tả</label>
                    <input name="anhmota[]" type="file" multiple class="file_anhmota form-control">
                    <div class="div_anhmota">
                        @foreach ($sanpham->anhmota as $item)
                            <img src="/storage/anhmota/{{ $item->anhmota }}"
                                class="anhmota rounded shadow-sm border border-1 mt-3 me-3" width="80" height="80"
                                alt="">
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </form>
    <a class="btn btn-dark mt-3" href="{{ route('sanpham.danhsach') }}">
        <i class="fas fa-arrow-left"></i>
    </a>
</x-admin>
