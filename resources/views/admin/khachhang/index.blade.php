<x-admin title="Danh sách khách hàng">

    <div class="col-md">

        @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
        @endif

        <table class="table shadow-sm">
            <thead class="text-light" style="background: #66a182;">
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Đăng ký lúc</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img class="image rounded-circle" src="/storage/avatars/{{ $item->avatar }}" alt=""
                                style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                        </td>
                        <td>{{ $item->name }} {{ $item->ten }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('khachhang.chitiet', $item->id) }}" class="btn btn-info text-light"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('khachhang.sua', $item->id) }}" class="btn btn-warning text-light"><i
                                    class="fas fa-edit"></i></a>
                            <a onclick="{return confirm('Bạn có muốn xóa không?')}" href="{{route('khachhang.xoa',$item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin>
