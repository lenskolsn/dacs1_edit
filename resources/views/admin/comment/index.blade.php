<x-admin title="Danh sách comment">
    <table class="table shadow-sm">
        <thead class="text-light" style="background: #66a182;">
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comment as $cm)
                <tr>
                    <td>{{ $cm->id }}</td>
                    <td class="d-flex">
                        <img src="/storage/avatars/{{ $cm->khachhang->avatar }}" width="50" height="50" alt="">
                        <div class="ms-3">
                            <h6>{{ $cm->khachhang->name }}</h6>
                            <p>{{ $cm->noidung }}</p>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('sanpham.chitiet', $cm->sanpham->id) }}"
                            class="text-decoration-none text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Click để xem sản phẩm">{{ $cm->sanpham->tensanpham }}</a>
                    </td>
                    <td>
                        <a href="{{ route('comment.xoa', $cm->id) }}" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin>
