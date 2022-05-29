<x-admin title="Danh mục">
{{-- Thông báo --}}
    @if (Session::has('success'))
        <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
    @elseif(Session::has('message'))
        <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
        <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
    @endif

    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <form action="{{ route('danhmuc.luu') }}" method="post">
                @csrf
                <x-input name='tendanhmuc' label='Tên danh mục' />
                <div class="mt-3">
                    <input checked='check' type='radio' name='trangthai' value='1' />Hiển thị
                    <input type='radio' name='trangthai' value='0' />Ẩn
                </div>
                <button class="btn text-light mt-3" style="background: #66a182;">Thêm dữ liệu</button>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div>{{$danhmuc->links()}}</div>
        </div>
    </div>
    <div class="col-md-12 mt-3 p-0">
        <table class="table">
            <thead class="text-light" style="background: #66a182;">
                <th>#</th>
                <th>Tên danh mục</th>
                <th class="text-center">Tổng sản phẩm</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($danhmuc as $dm)
                    <tr>
                        <td>{{ $dm->id }}</td>
                        <td>{{ $dm->tendanhmuc }}</td>
                        <td class="text-center">{{ $dm->san_phams->count() }}</td>
                        <td class="text-center">
                            @if ($dm->trangthai == 0)
                                <span class="badge bg-danger">Ẩn</span>
                            @else
                                <span class="badge bg-success">Hiển thị </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('danhmuc.sua', $dm->id) }}" class="btn btn-warning text-light"><i
                                    class="fas fa-pen"></i></a>
                            <a onclick="{return confirm('bạn có muốn xóa không?')}"
                                href="{{ route('danhmuc.xoa', $dm->id) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin>
