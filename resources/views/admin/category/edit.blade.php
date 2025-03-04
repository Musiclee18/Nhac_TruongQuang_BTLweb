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
            <div class="card-header">Cập nhập danh mục game</div>
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
                <a href="{{route('category.index')}}" class="btn btn-success">Liệt kê danh mục game</a>
                <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục game</a>
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" required id="slug" onkeyup="ChangeToSlug();" value="{{ $category->title }}" name="title" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" class="form-control" required value="{{ $category->slug }}" id="convert_slug" name="slug" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control-file" name="image">
                        <img src="{{ asset('uploads/category/'.$category->image) }}" height="150px" weight="150px">

                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea class="form-control" name="description" required placeholder="...">{{ $category->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" required name="status">
                            @if($category->status == 1)
                          <option value="1" selected>Hiển thị</option>
                          <option value="0">Không hiển thị</option>
                            @else
                            <option value="1">Hiển thị</option>
                          <option value="0" selected>Không hiển thị</option>
                          @endif
                        </select>

                      </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
