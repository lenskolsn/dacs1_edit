<x-admin title="Dashboard">
    <p class=" display-5 text-center">Welcome! {{ Auth::user()->name }}</p>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $sp }}</h3>
                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <a href="{{ route('sanpham.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $dm }}</h3>
                    <p>Danh mục</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="{{ route('danhmuc.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark text-light">
                <div class="inner">
                    <h3>{{ $nv }}</h3>
                    <p>Nhân viên</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-shield text-secondary"></i>
                </div>
                <a href="{{ route('nhanvien.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning text-light">
                <div class="inner">
                    <h3>{{ $kh }}</h3>
                    <p>Khách hàng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-astronaut"></i>
                </div>
                <a href="{{ route('khachhang.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger text-light">
                <div class="inner">
                    <h3>{{ $dh }}</h3>
                    <p>Đơn Hàng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('donhang.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-light" style="background: #6f42c1">
                <div class="inner">
                    <h3>{{ $cm }}</h3>
                    <p>Comment</p>
                </div>
                <div class="icon">
                    <i class="fas fa-message"></i>
                </div>
                <a href="{{ route('comment.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-light" style="background: rgb(255, 0, 115);">
                <div class="inner">
                    <h3>{{ $bv }}</h3>
                    <p>Bài viết</p>
                </div>
                <div class="icon">
                    <i class="fas fa-feather-alt"></i>
                </div>
                <a href="{{ route('post.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-light bg-secondary">
                <div class="inner">
                    <h3>{{ $bn }}</h3>
                    <p>Banner</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('banner.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</x-admin>
