@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục mới nhập</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a style="display: inline-block; " href="{{route('backend.category.create')}}" class="btn btn-success">Add Category</a>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Thời gian</th>
                                <th>Show</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <span class="tag tag-success text-info">@if($category->status==0) Admin @endif</span>
                                        <span class="tag tag-success text-success"> @if($category->status==1) User @endif</span>
                                        <span class="tag tag-success text-danger">@if($category->status==2) All @endif</span>
                                    </td>
                                    <td>
                                        <a style="display: inline-block; " href="{{route('backend.category.show',$category->id)}}" class="btn btn-info">Show</a>
                                        <a style="display: inline-block; " href="{{route('backend.category.edit',$category->id)}}" class="btn btn-warning">Edit</a>
                                        <form style="display: inline-block;" action="{{ route('backend.category.destroy', $category->id) }}" method="post" accept-charset="utf-8">
                                            @csrf
{{--                                            {{method_field('delete')}}--}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        {!! $categories->links() !!}--}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
