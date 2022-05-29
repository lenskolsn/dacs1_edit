<x-admin title="Sửa comment">
    <div class="col-md-8">
        <form action="{{ route('comment.luu', $comment->id) }}" method="post">
            @csrf
            <x-textarea name='noidung' label='Nội dung' value='{{ $comment->noidung }}' />
            <button class="btn text-light mt-3" style="background: #66a182;">Cập nhật dữ liệu</button>
        </form>
    </div>
</x-admin>
