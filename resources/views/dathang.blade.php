<x-trangchu title="Đặt hàng">
    {{-- <div class="row"> --}}
        <div class="row">
            @if (Session::has('success'))
            <p class="alert bg-success text-light">{{ Session::get('success') }}</p>
            @elseif(Session::has('error'))
            <p class="alert bg-danger text-light">{{ Session::get('error') }}</p>
            @endif
        </div>
        <form action="{{ route('dathang') }}" method="post">
            @csrf
            <div class="row fw-bold">
                <div class="col-md-6">
                    <h5 class="">ĐẶT HÀNG</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="">THÔNG TIN SẢN PHẨM</h5>
                </div>
            </div>
            <div class="row">
                {{-- Nếu có sản phẩm thì có form đặt hàng --}}
                @if ($cart->total_quantity != 0)
                <div class="col-md-5">
                    <x-input name="name" label="Họ tên" value="{{ Auth::guard('khach_hangs')->user()->name }}" />
                        <x-input name="email" label="Email" value="{{ Auth::guard('khach_hangs')->user()->email }}" />
                            <x-input name="diachi" label="Địa chỉ" />
                            <x-input name="phone" label="Điện thoại"
                            value="{{ Auth::guard('khach_hangs')->user()->phone }}" />
                            {{-- <input type="hidden" name="tongtien" value="{{ $cart->total_price }}"> --}}
                            <div class="form-group mt-3">
                                <label for="ghichu" class='mb-2'>Ghi chú:</label>
                                <textarea name="ghichu" id="ghichu" style="width: 100%;" rows="5"></textarea>
                            </div>
                            <div class="mt-3 text-end">
                                <p>
                                    Tổng tiền:
                                    <b class="text-danger"> {{ number_format($cart->total_price) }} VNĐ</b>
                                </p>
                                <button class="btn btn-success text-light">Đặt hàng</button>
                            </div>
                        </div>
                        @else
                        <div class="col-md-5">
                            <p class="badge bg-secondary">Chưa có sản phẩm nào! Hãy tiếp tục mua sắm</p>
                        </div>
                        @endif
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 py-5">
                                    <table class="table table-bordered">
                                        <thead class="text-light" style="background: #66a182;">
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td>Hình ảnh</td>
                                                <td>Giá</td>
                                                <td>Số lượng</td>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-light">
                                            @foreach ($cart->items as $item)
                                            <tr>
                                                <td>{{ $item['tensanpham'] }}</td>
                                                <td>
                                                    <img src="/storage/{{ $item['hinhanh'] }}" width="100"
                                                    alt="">
                                                </td>
                                                <td>{{ $item['gia'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            {{-- </div> --}}
        </x-trangchu>
