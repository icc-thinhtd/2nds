@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh mục: {{$category->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Thông tin danh mục</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin danh mục</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Thời gian</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <span class="tag tag-success text-info">@if($category->status==0) Đang nhập @endif</span>
                                        <span class="tag tag-success text-success"> @if($category->status==1) Mở bán @endif</span>
                                        <span class="tag tag-success text-danger">@if($category->status==2) Hết hàng @endif</span>
                                    </td>
                                    <td>
                                        <a style="display: inline-block; " href="{{route('backend.category.show',$category->id)}}" class="btn btn-info">Add Child</a>
                                        <a style="display: inline-block; " href="{{route('backend.category.edit',$category->id)}}" class="btn btn-warning">Edit</a>
                                        <form style="display: inline-block;" action="{{ route('backend.category.destroy', $category->id) }}" method="post" accept-charset="utf-8">
                                            @csrf
                                            {{--                                            {{method_field('delete')}}--}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
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

