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
            <div class="card-header">Liệt kê blogs game</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{route('blog.create')}}" class="btn btn-success">Thêm blog game</a>
                {{-- <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Slug danh mục</th>
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Hình ảnh</th>
                        <th>Quản lí</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $cate)

                      <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $cate->title }}</td>
                        <td>{{ $cate->slug }}</td>
                        <td>{{ $cate->description }}</td>
                        <td>
                            @if($cate->status==0)
                            Không hiển thị
                            @else
                            Hiển thị
                            @endif
                        </td>
                        <td><img src="{{ asset('uploads/category/'.$cate->image) }}" height="150px" weight="150px"></td>

                        <td>
                        <form action="{{ route('category.destroy',[$cate->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn muốn xóa danh mục game này không?');" class="btn btn-danger">Delete</button>
                        </form>

                            <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {{ $category->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
