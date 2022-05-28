<x-admin title="Chi tiết nhân viên">
    <div class="row">
        <div class="col-md-6 py-3 m-auto">
            {{-- Avatar --}}
            <div class="card text-dark bg-light">
                <div class="card-header">Profile</div>
                <div class="image mt-3 text-center">
                    <img src="/storage/avatars/{{ $nhanvien->avatar }}" class="rounded-circle rounded shadow"
                    width="150" height="150" alt="">
                </div>
                <div class="card-body m-auto">
                        <h5>THÔNG TIN TÀI KHOẢN</h5>
                        <p>
                            <span><b><i class="fas fa-user"></i> </b>
                            </span><span>{{ $nhanvien->name }}</span>
                        </p>
                        <p>
                            <span><b><i class="fas fa-envelope"></i> </b>
                            </span><span>{{ $nhanvien->email }}</span>
                        </p>
                        <p>
                            <span><b><i class="fas fa-user-shield"></i></i> </b>
                            </span><span>
                                @if ($nhanvien->is_admin == 1)
                                    <span class="badge bg-primary">Quản trị viên</span>
                                @else
                                    <span class="badge bg-warning">Nhân viên</span>
                                @endif
                            </span>
                        </p>
                </div>

            </div>
        </div>
    </div>
</x-admin>
