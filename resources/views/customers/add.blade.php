@extends('main')
@section('content')
    @include('alert')
    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên khách hàng</label>
                <input type="text" required name="name" class="form-control" id="name" placeholder="Enter name...">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" required name="address" class="form-control" id="address" placeholder="Enter address...">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" required name="phone" class="form-control" id="phone" placeholder="Enter phone...">
            </div>

            <div class="form-group">
                <label for="address">Ngày sinh</label>
                <input type="date" min="1900-01-01" max="2077-01-01" required name="birthday" class="form-control" id="birthday" placeholder="Enter birthday...">
            </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn text-light" style="background-image: linear-gradient(to right, black, rgb(93, 64, 220));">Thêm khách hàng</button>
        </div>
    </form>
@endsection