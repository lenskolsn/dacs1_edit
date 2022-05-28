<x-admin title="Chi tiết sản phẩm">
    <div class="row">
        <div class="col-md-9 d-flex justify-content-around m-auto">
            <div class="left">
                <img class="img-thumbnail" src="/storage/{{ $sanpham->hinhanh }}" width="350" height="350" alt="">
            </div>
            <div class="right mx-5">
                <table class="table table-sriped table-bordered">
                    <tbody class="rounded shadow-sm">
                        <tr>
                            <th>Tên sản phẩm:</th>
                            <td>{{ $sanpham->tensanpham }}</td>
                        </tr>
                        <tr>
                            <th>Giá:</th>
                            <td>{{ number_format($sanpham->gia) }} <sup>đ</sup></td>
                        </tr>
                        <tr>
                            <th>Mô tả:</th>
                            <td>{{ $sanpham->mota }}</td>
                        </tr>
                        <tr>
                            <th>Danh mục:</th>
                            <td>{{ $sanpham->danh_mucs->tendanhmuc }}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
                            <td>
                                @if ($sanpham->trangthai == 1)
                                    <span class="badge bg-success">Còn hàng</span>
                                @else
                                    <span class="badge bg-danger">Hết hàng</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Được thêm vào lúc:</th>
                            <td>{{ $sanpham->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a class="btn btn-dark mt-3" href="{{ route('sanpham.danhsach') }}">
        <i class="fas fa-arrow-left"></i>
    </a>
</x-admin>
