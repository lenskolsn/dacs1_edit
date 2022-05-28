<x-admin title="Sửa nhân viên">
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light mb-3 m-auto " style="max-width: 18rem;">
                <div class="card-header">Avatar</div>
                <div class="card-body text-center">
                    <img id="avatar_user" src="/storage/avatars/{{$nhanvien->avatar}}" class="rounded-circle rounded shadow"
                        width="150" height="150" alt="">
                    <form action="{{ route('nhanvien.capnhat_avatar_nhanvien', $nhanvien->id) }}"
                        class="mt-3" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="upload_avatar" class="badge bg-dark fs-5" style="cursor: pointer;"><i
                            class="fas fa-camera"></i></label>
                        <div class="input-group input-group-sm mt-3">
                            <input id="upload_avatar" type="file" class="form-control d-none" name="avatar">
                        </div>
                        <button class="btn-sm btn-dark">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <form action="{{ route('nhanvien.post_sua', $nhanvien->id) }}" method="post">
                @csrf
                <x-input value='{{ $nhanvien->name }}' name='name' label='Tên nhân viên' />
                <x-input value='{{ $nhanvien->email }}' name='email' label='Email' />
                {{-- <x-input type='password' name='password' label='Mật khẩu' /> --}}
                <div class="mt-3">
                    <label for="" class="form-label">Là Admin</label> <br>
                    <input checked type="radio" value="1" name="is_admin">Yes
                    <input type="radio" value="0" name="is_admin">No <br>
                </div>
                <button class="btn btn-primary text-light mt-3">Cập nhật dữ liệu</button>
            </form>
            <a class="btn btn-outline-primary mt-3" href="{{ route('nhanvien.danhsach') }}">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

    </div>
</x-admin>
