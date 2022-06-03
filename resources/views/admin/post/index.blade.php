<x-admin title="Danh sách bài viết">
    @if (Session::get('message'))
        <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
    @endif
    <table class="table">
        <thead class="text-light" style="background: #66a182;">
            <tr>
                <th>#</th>
                <th style="width: 600px;" class="text-center">Bài viết</th>
                <th class="text-center">Lượt xem</th>
                <th class="text-center">Danh mục</th>
                <th class="text-center">Tác giả</th>
                <th class="text-center">Tải lên</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="d-flex">
                        <img src="/storage/post/{{ $item->hinhanh }}" width="150" height="150" class="img-thumbnail"
                            alt="">
                        <div class="ms-3">
                            <h6 style="font-size: 15px;">{{ $item->tieude }}</h6>
                            <p style="font-size: 13px;">{{ $item->mota }}</p>
                        </div>
                    </td>
                    <td class="text-secondary text-center"><i class="fas fa-eye"></i> {{ $item->tongluotxem }}
                    </td>
                    <td class="text-center">{{ $item->danhmucbaiviet->tendanhmuc }}</td>
                    <td class="text-center">{{ $item->tacgia->name }}</td>
                    <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>
                    <td class="text-center">
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
