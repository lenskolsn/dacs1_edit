<x-admin title="Danh sách nhân viên">
    <div class="col-md-8 m-auto">
        @if (Session::has('success'))
        <p class="alert bg-success">{{Session::get('success')}}</p>   
        @endif
        @if(Session::has('error'))
        <p class="alert bg-danger">{{Session::get('error')}}</p>   
        @endif
        <table class="table shadow-sm">
            <thead class="text-light" style="background: #66a182;">
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Tên nhân viên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="/storage/avatars/{{ $item->avatar }}" class="rounded-circle rounded shadow"
                                width="50" height="50" alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->is_admin == 1)
                                <span class="badge bg-success">Quản trị viên</span>
                            @else
                                <span class="badge bg-danger">Nhân viên</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->is_admin != 1)
                                {{-- Nếu không phải admin thì có thể xóa --}}
                                <a href="{{ route('nhanvien.chitiet', $item->id) }}" class="btn btn-info"><i
                                        class="fas fa-eye text-light"></i></a>
                                <a href="{{ route('nhanvien.sua', $item->id) }}" class="btn btn-warning"><i
                                        class="fas fa-edit text-light"></i></a>
                                <a onclick="{return confirm('Bạn có muốn xóa không?')}"
                                    href="{{ route('nhanvien.xoa', ['id' => $item->id]) }}" class="btn btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            @else
                                {{-- Admin không được xóa --}}
                                <a href="{{ route('nhanvien.chitiet', $item->id) }}" class="btn btn-info"><i
                                        class="fas fa-eye text-light"></i></a>
                                <a href="{{ route('nhanvien.sua', $item->id) }}" class="btn btn-warning"><i
                                        class="fas fa-edit text-light"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin>
