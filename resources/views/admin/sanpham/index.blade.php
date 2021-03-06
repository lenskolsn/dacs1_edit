<x-admin title="Danh sách sản phẩm">
    {{-- Thông báo --}}
    @if (Session::has('success'))
        <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
    @elseif(Session::has('message'))
        <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
        <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form class="d-flex" method="get">
                <input placeholder="Tìm kiếm" type="text" name="key" class="form-control">
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div>{{ $sanpham->links() }}</div>
        </div>
    </div>
    <div class="col-md-12 p-0 mt-3">
        <table class="table shadow-sm">
            <thead class="text-light text-center" style="background: #66a182;">
                <th>#</th>
                <th>Thông tin sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                {{-- <th>Mô tả</th> --}}
                <th>Trạng thái</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($sanpham as $sp)
                    <tr>
                        <td>{{ $sp->id }}</td>
                        <td class="d-flex">
                            <img class="img-thumbnail" src="/storage/{{ $sp->hinhanh }}" width="100" alt="">
                            <div class="ms-3">
                                <ul>
                                    <li>
                                        {{ $sp->tensanpham }}
                                    </li>
                                    <li>Số lượng:
                                        {{ $sp->soluong }}
                                    </li>
                                    <li>Màu:
                                        {{ $sp->mau }}
                                    </li>
                                    <li>Size:
                                        {{ $sp->size }}
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-center">{{ $sp->danh_mucs->tendanhmuc ?? '' }}</td>
                        <td class="text-center">{{ number_format($sp->gia) }}</td>
                        {{-- <td>{{ $sp->mota }}</td> --}}
                        <th class="text-center">
                            @if ($sp->soluong >= 1)
                                <span class="badge bg-success">Còn hàng</span>
                            @else
                                <span class="badge bg-danger">Hết hàng</span>
                            @endif
                        </th>
                        <td class="text-center">
                            <a href="{{ route('sanpham.chitiet', $sp->id) }}" class="btn btn-info text-light"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('sanpham.sua', $sp->id) }}" class="btn btn-warning text-light"><i
                                    class="fas fa-pen"></i></a>
                            <a onclick="{return confirm('Bạn có muốn xóa không?')}"
                                href="{{ route('sanpham.xoa', $sp->id) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="card-footer">
            
        </div> --}}
    </div>
</x-admin>
