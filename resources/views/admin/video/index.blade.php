@extends('layouts.app')
@section('navbar')
    <div class="container">
    @include('admin.include.navbar')
    </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Liệt kê Videos</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $errors)
                            <li>{{ $errors}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{route('video.create')}}" class="btn btn-success">Thêm Video</a>
                <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên video</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Hình ảnh</th>
                        <th>Link</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($videos as $key => $video)

                      <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->slug }}</td>
                        <td>{{ $video->description }}</td>
                        <td>
                            @if($video->status==0)
                            Không hiển thị
                            @else
                            Hiển thị
                            @endif
                        </td>
                        <td><img src="{{ asset('uploads/video/'.$video->image) }}" height="150px" weight="150px"></td>

                        <td><span height = "100" width = "150">{!! $video->link !!}</span></td>
                        <td>
                        <form action="{{ route('video.destroy',[$video->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn muốn xóa video game này không?');" class="btn btn-danger">Delete</button>
                        </form>

                            <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                  {{ $videos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
