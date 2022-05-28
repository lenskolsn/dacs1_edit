<x-admin title="Chi tiết nhân viên">
    <div class="row">
        @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
        @endif
        <div class="col-md-8 py-3 d-flex m-auto">
            {{-- Avatar --}}
            <div class="card  w-50 text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Avatar</div>
                <div class="card-body text-center">
                    <img id="preview_image" src="/storage/avatars/{{ Auth::user()->avatar }}"
                        class="rounded-circle rounded shadow" width="150" height="150" alt="">
                    <form action="{{ route('nhanvien.capnhat_avatar_nhanvien', Auth::user()->id) }}"
                        class="mt-3" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="file_image" class="badge bg-dark fs-5" style="cursor: pointer;"><i
                                class="fas fa-camera"></i></label>
                        <div class="input-group input-group-sm mt-3">
                            <input id="file_image" type="file" class="form-control d-none" name="avatar">
                        </div>
                        <button class="btn-sm btn-dark">Cập nhật</button>
                    </form>
                </div>
            </div>
            {{-- Thông tin tài khoản --}}
            <div class="mx-3">
                <h5>THÔNG TIN TÀI KHOẢN</h5>
                <p>
                    <span><b><i class="fas fa-user"></i> </b>
                    </span><span>Tên: {{ Auth::user()->name }}</span>
                </p>
                <p>
                    <span><b><i class="fas fa-envelope"></i> </b>
                    </span><span>Email: {{ Auth::user()->email }}</span>
                </p>
                <p>
                    <span><b><i class="fas fa-user-shield"></i></i> </b>
                    </span><span>Chức vụ:
                        @if (Auth::user()->is_admin == 1)
                            <span class="badge bg-primary">Quản trị viên</span>
                        @else
                            <span class="badge bg-warning">Nhân viên</span>
                        @endif
                    </span>
                </p>
            </div>
        </div>
    </div>
</x-admin>
