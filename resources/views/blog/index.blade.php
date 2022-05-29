<x-trangchu title="Blog">
    <div class="row d-flex justify-content-between">
        <div class="col-lg-8 col-md-12 border border-1 py-2 bg-light">
            <hr>
            <ul class="d-flex p-0" style="list-style: none;">
                {{-- <li class="me-3"><a href="#" class="text-decoration-none text-dark fw-bold">DANH MỤC</a></li> --}}
                @foreach ($danhmucbaiviet as $item)
                    <li class="me-3"><a href="{{ route('blog.danhmucblog', $item->id) }}"
                            class="text-decoration-none text-dark fw-bold"
                            style="text-transform: uppercase;">{{ $item->tendanhmuc }}</a></li>
                @endforeach
            </ul>
            <hr>
            @if ($blog->count() != null)
                @foreach ($blog as $item)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-lg-4 col-md-3">
                                <a href="{{ route('blog.chitiet', $item->id) }}"><img
                                        src="/storage/post/{{ $item->hinhanh }}" alt="{{ $item->tieude }}"
                                        class="w-100 img-thumbnail"></a>
                            </div>
                            <div class="col-lg-8 col-md-9">
                                <div class="card-body">
                                    <a href="{{ route('blog.chitiet', $item->id) }}"
                                        class="text-decoration-none text-dark">
                                        <h5 class="card-title">{{ $item->tieude }}</h5>
                                    </a>
                                    <p class="card-text">{{ $item->mota }}</p>
                                    <p class="card-text"><small
                                            class="text-muted">{{ $item->created_at->format('d/m/Y H:i:s') }} by
                                            {{ $item->tacgia->name }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                    <p class="text-danger text-center fw-bold">Chưa có bài viết</p>
            @endif
        </div>
        <div class="col-lg-3 col-md-12 border border-1 py-2 bg-light">
            <span class="badge bg-dark">Bài viết phổ biến</span>
            <div class="row px-2">
                @foreach ($blog_new as $item)
                    <div class="card mt-3 col-lg-12 col-sm-6">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="{{ route('blog.chitiet', $item->id) }}"><img
                                        src="/storage/post/{{ $item->hinhanh }}" alt="{{ $item->tieude }}"
                                        class="img-thumbnail"></a>
                            </div>
                            <div class="col-md-8 p-0 m-0">
                                <div class="card-body p-2">
                                    <a href="{{ route('blog.chitiet', $item->id) }}"
                                        class="text-decoration-none text-dark">
                                        <h5 style="font-size: 15px;" class="card-title">{{ $item->tieude }}</h5>
                                    </a>
                                    {{-- <p style="font-size: 13px;" class="card-text">{{ $item->mota }}</p> --}}
                                    <p style="font-size: 13px;" class="card-text"><small
                                            class="text-muted">{{ $item->created_at->format('d/m/Y H:i:s') }} by
                                            {{ $item->tacgia->name }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-trangchu>
