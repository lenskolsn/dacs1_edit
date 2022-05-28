<x-admin title="Chi tiết khách hàng">
    <div class="row">
        <div class="col-md-6 py-3 m-auto">
            {{-- Avatar --}}
            <div class="card text-dark bg-light">
                <div class="card-header">Profile</div>
                <div class="image mt-3 text-center">
                    <img src="/storage/avatars/{{ $khachhang->avatar }}" class="rounded-circle rounded shadow"
                    width="150" height="150" alt="">
                </div>
                <div class="card-body m-auto">
                        <h5>THÔNG TIN TÀI KHOẢN</h5>
                        <p>
                            <span><b><i class="fas fa-user"></i> </b>
                            </span><span>{{ $khachhang->name }}</span>
                        </p>
                        <p>
                            <span><b><i class="fas fa-envelope"></i> </b>
                            </span><span>{{ $khachhang->email }}</span>
                        </p>
                        <p>
                            <span><b><i class="fas fa-phone"></i> </b>
                            </span><span>{{ $khachhang->phone }}</span>
                        </p>
                        <p>
                            <span><b><i class="fas fa-clock"></i> </b>
                            </span><span>{{ $khachhang->created_at->format('d/m/Y H:i:s') }}</span>
                        </p>
                </div>

            </div>
        </div>
    </div>
</x-admin>
