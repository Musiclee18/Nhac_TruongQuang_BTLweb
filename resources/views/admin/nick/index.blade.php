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
            <div class="card-header">Liệt kê nick game</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{route('nick.create')}}" class="btn btn-success">Thêm nick game</a>
                <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên nick</th>
                        <th>Mã số</th>
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Hình ảnh</th>
                        <th>Thuộc nick</th>
                        <th>Thuộc tính</th>
                        <th>Quản lí</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($nicks as $key => $nick)

                      <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $nick->title }}</td>
                        <td>#{{ $nick->ms }}</td>
                        <td>{{ $nick->description }}</td>
                        <td>
                            @if($nick->status==0)
                            Không hiển thị
                            @else
                            Hiển thị
                            @endif
                        </td>
                        <td><img src="{{ asset('uploads/nick/'.$nick->image) }}" height="150px" weight="150px"></td>
                        <td>{{ $nick->category->title }}</td>
                        <td>
                            @php
                                $attribute = json_decode($nick->attribute, true);
                            @endphp
                            @foreach ($attribute as $attr)
                                <span class="badge badge-dark">{{ $attr }}</span>
                            @endforeach
                        </td>
                        <td>

                        <form action="{{ route('nick.destroy',[$nick->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn muốn xóa nick game này không?');" class="btn btn-danger">Delete</button>
                        </form>

                            <a href="{{ route('nick.edit', $nick->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {{ $nicks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
