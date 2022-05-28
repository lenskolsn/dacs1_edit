<x-admin title="Danh sách bài viết">
    @if (Session::get('message'))
        <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
    @endif
    <table class="table table-bordered">
        <thead class="text-light" style="background: #66a182;">
            <tr>
                <th>#</th>
                <th style="width: 500px;">Bài viết</th>
                <th>Lượt xem</th>
                <th>Danh mục</th>
                <th>Tác giả</th>
                <th>Tạo lúc</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="d-flex">
                        <img src="/storage/post/{{ $item->hinhanh }}" width="150" class="img-thumbnail" alt="">
                        <div class="ms-3">
                            <h6 style="font-size: 15px;">{{ $item->tieude }}</h6>
                            <p style="font-size: 13px;">{{ $item->mota }}</p>
                        </div>
                    </td>
                    <td class="text-secondary"><i class="fas fa-eye"></i> {{ $item->tongluotxem }}</td>
                    <td>{{ $item->danhmucbaiviet->tendanhmuc }}</td>
                    <td>{{ $item->tacgia->name }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('post.chitiet', $item->id) }}" class="btn btn-info text-light"><i
                                class="fas fa-eye"></i></a>
                        <a href="{{ route('post.sua', $item->id) }}" class="btn btn-warning text-light"><i
                                class="fas fa-pen"></i></a>
                        <a onclick="{return confirm('Bạn có muốn xóa không?')}"
                            href="{{ route('post.xoa', $item->id) }}" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin>
