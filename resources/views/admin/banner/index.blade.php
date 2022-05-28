<x-admin title="Danh sách banner">
    @if (Session::has('success'))
        <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
    @elseif(Session::has('message'))
        <p class="alert bg-success text-light">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
        <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
    @endif
    <div class="col-md-12 mt-3 p-0">
        {{-- Thêm banner --}}
        <a href="{{ route('banner.them') }}" class="btn text-light" style="background: #66a182;"><i
                class="fas fa-plus"></i></a>
        <table class="table mt-3 shadow-sm">
            <thead class="text-light" style="background: #66a182;">
                <th>#</th>
                <th>Tên banner</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($banner as $bn)
                    <tr>
                        <td>{{ $bn->id }}</td>
                        <td>{{ $bn->ten }}</td>
                        <td>
                            <img class="rounded-1 shadow" src="/storage/{{ $bn->hinhanh }}" width="200" height="100" alt="">
                        </td>
                        <td>{{ $bn->mota }}</td>
                        <td>
                            <a href="{{ route('banner.sua', $bn->id) }}" class="btn btn-warning text-light"><i
                                    class="fas fa-pen"></i></a>
                            <a onclick="{return confirm('Bạn có muốn xóa không?')}"
                                href="{{ route('banner.xoa', $bn->id) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $banner->links() }}
    </div>
</x-admin>
