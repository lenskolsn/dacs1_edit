<x-admin title="Dashboard">
    <p class=" display-5 text-center">Welcome! {{ Auth::user()->name}}</p>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h5>Tổng sản phẩm</h5>
                    <p class="fs-5 fw-bold">{{ $sp }}</p>
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
                    <h5>Danh mục</h5>
                    <p class="fs-5 fw-bold">{{ $dm }}</p>
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
                    <h5>Nhân viên</h5>
                    <p class="fs-5 fw-bold">{{ $nv }}</p>
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
                    <h5>Khách hàng</h5>
                    <p class="fs-5 fw-bold">{{ $kh }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-astronaut"></i>
                </div>
                <a href="{{ route('khachhang.danhsach') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-2">
            <div class="small-box bg-danger text-light">
                <div class="inner">
                    <h5>Đơn Hàng</h5>
                    <p class="fs-5 fw-bold">{{ $dh }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('donhang.danhsach') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-2">
            <div class="small-box text-light" style="background: rgb(255, 0, 115);">
                <div class="inner">
                    <h5>Bài viết</h5>
                    <p class="fs-5 fw-bold">{{ $bv }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-feather-alt"></i>
                </div>
                <a href="{{ route('post.danhsach') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-2">
            <div class="small-box bg-secondary text-light">
                <div class="inner">
                    <h5>Banner</h5>
                    <p class="fs-5 fw-bold">{{ $bn }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('banner.danhsach') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</x-admin>
