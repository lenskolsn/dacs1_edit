<x-admin title="Danh mục bài viết">
    <div class="row">
        @if (Session::get('message'))
            <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
        @endif
        <div class="col-md-4">
            <form action="{{ route('danhmucbaiviet.luu') }}" method="post">
                @csrf
                <x-input name="tendanhmuc" label="Tên danh mục" />
                <button class="btn text-light mt-3" style="background: #66a182;">Thêm dữ liệu</button>
            </form>
        </div>
        <div class="col-md-12 mt-3">
            <table class="table">
                <thead class="text-light" style="background: #66a182;">
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th class="text-center">Tổng bài viết</th>
                        <th>Tạo lúc</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhmucbaiviet as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tendanhmuc }}</td>
                            <td class="text-center">{{ $item->posts->count() }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('danhmucbaiviet.sua', $item->id) }}"
                                    class="btn btn-warning text-light"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('danhmucbaiviet.xoa', $item->id) }}"
                                    class="btn btn-danger text-light"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
