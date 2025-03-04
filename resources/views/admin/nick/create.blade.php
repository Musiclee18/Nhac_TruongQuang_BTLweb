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
            <div class="card-header">Thêm nick game</div>
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
                <a href="{{route('nick.index')}}" class="btn btn-success">Liệt kê nick game</a>
                <form action="{{route('nick.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" required name="title" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" required name="price" placeholder="...">
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
                        <select  required class="form-control" name="status">
                          <option value="1">Hiển thị</option>
                          <option value="0">Không hiển thị</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Thuộc game</label>
                        <select required class="form-control choose_category" name="category_id">
                            <option value="0">--Chọn game cần thêm</option>
                            @foreach ($category as $key => $cate )
                                <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                            @endforeach



                        </select>
                      </div>
                      <span id="show_attribute"></span>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
