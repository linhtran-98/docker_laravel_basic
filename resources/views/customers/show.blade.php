@extends('main')
@section('content')
    @include('alert')
    <form action="{{ route('customer.update', $customer->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $customer->name }}" placeholder="Enter name...">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ $customer->address }}" placeholder="Enter address...">
            </div>
            
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" id="phone">
            </div>

            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" name="birthday" value="{{ $customer->birthday }}" class="form-control" id="birthday">
            </div>
            
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn text-light" style="background-image: linear-gradient(to right, black, rgb(93, 64, 220));">Sửa thông tin khách hàng</button>
        </div>
    </form>
@endsection