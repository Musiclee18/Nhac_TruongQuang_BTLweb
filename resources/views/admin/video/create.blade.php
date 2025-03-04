@extends('layouts.app')
@section('navbar')
    <div class="container">
    @include('admin.include.navbar')
    </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt kê videos game</div>
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
                <a href="{{route('video.index')}}" class="btn btn-success">Liệt kê videos game</a>
                <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control"  required id="slug" onkeyup="ChangeToSlug();" name="title" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" class="form-control" required  name="link" placeholder="Link youtube...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" class="form-control" required name="slug" id="convert_slug" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control-file" required name="image">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea class="form-control" name="description" required placeholder="..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select required class="form-control" name="status">
                          <option value="1">Hiển thị</option>
                          <option value="0">Không hiển thị</option>

                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Add video</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
