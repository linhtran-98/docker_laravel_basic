@extends('main')
@section('content')
@include('alert')
<div class="card-header">
    <a href="{{ route('customer.create') }}" class="btn text-light" style="background-image: linear-gradient(to right, black, rgb(93, 64, 220));">Thêm mới khách hàng</a>
</div>
<div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            {{-- <th style="width: 10px">#</th> --}}
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày sinh</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th colspan="2">Thao tác</th>
            {{-- <th style="width: 40px">Label</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $key => $value)
            <tr class="text-center">
              {{-- <td>{{ $key+1 }}</td> --}}
              <td class="font-weight-bold" style="color:rgb(93, 64, 220);">{{ $value->name }}</td>
              <td>{{ $value->address }}</td>
              <td class="font-weight-bold" style="color:rgb(93, 64, 220);">{{ $value->phone }}</td>
              <td>{{ $value->birthday }}</td>
              <td>{{ $value->created_at }}</td>
              <td>{{ $value->updated_at }}</td>
              <td class="text-center"><a class="btn text-light" style="background-image: linear-gradient(to right, black, rgb(93, 64, 220));" href="{{ route('customer.edit', $value->id) }}">Sửa</a></td>
              <td class="text-center">
                <form id="deleteForm" action="{{ route('customer.destroy', $value->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn text-light" style="background-image: linear-gradient(to right, black, rgb(188, 36, 79));" value="Xóa">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <div class="pagination pagination-sm m-0">
        {{ $customers->appends($_GET)->links() }}
      </div>
    </div>
  </div>
@endsection