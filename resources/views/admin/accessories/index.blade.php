@extends('layouts.app')
@section('navbar')
    <div class="container">
    @include('admin.include.navbar')
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Liệt kê phụ kiện game</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{route('accessories.create')}}" class="btn btn-success">Thêm phụ kiện game</a>
                <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tiêu đề phụ kiện</th>
                        <th>Hiển thị</th>
                        <th>Thuộc danh mục</th>
                        <th>Quản lí</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($accessories as $key => $access)

                      <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $access->title }}</td>

                        <td>
                            @if($access->status==0)
                            Không hiển thị
                            @else
                            Hiển thị
                            @endif
                        </td>
                        <td>{{ $access->category->title }}</td>

                        <td>
                        <form action="{{ route('accessories.destroy',[$access->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn muốn xóa phụ kiện game này không?');" class="btn btn-danger">Delete</button>
                        </form>

                            <a href="{{ route('accessories.edit', $access->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {{ $accessories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
