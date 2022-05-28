<x-trangchu title="{{ $blog->tieude }}">
    {{-- <div class="col-md-12 m-auto "> --}}

    <div class="row border border-1 shadow-sm py-3">
        <div class="col-md" style="border-right: 1px solid #cecece;">
            <h4 class="fw-bold">{{ $blog->tieude }}</h4>
            <hr>
            <span class="text-secondary" style="font-size: 13px;">{{ $blog->tacgia->name }} /
                {{ $blog->created_at->format('d/m/Y H:i:s') }} / <i class="fas fa-eye" style="font-size: 13px;"> {{$blog->tongluotxem}}</i></span>
            <hr>
            {!! $blog->noidung !!}
        </div>
        <div class="col-md-4">
            <span class="badge bg-dark w-100 mb-3" style="font-size: 15px;">Bài viết mới</span>
            @foreach ($blog_new as $item)
                <u>
                    <p style="font-size: 15px;"><i class="fas fa-arrow-right text-secondary me-3"></i><a
                            href="{{ route('blog.chitiet', $item->id) }}"
                            class="text-decoration-none text-secondary">{{ $item->tieude }}</a></p>
                </u>
            @endforeach
        </div>
    </div>
    {{-- </div> --}}
</x-trangchu>
