@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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
                        <h3 class="card-title">Sản phẩm mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a style="display: inline-block; " href="{{route('backend.product.create')}}" class="btn btn-success">Add Product</a>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>User</th>
                                <th>Cập nhật</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->user->name}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <span class="tag tag-success text-info">@if($product->status==1) Đang nhập @endif</span>
                                        <span class="tag tag-success text-success">@if($product->status==2) Mở bán @endif</span>
                                        <span class="tag tag-success text-danger"> @if($product->status==3) Hết hàng @endif</span>
                                    </td>
                                    <td>
                                        <a style="display: inline-block; " href="{{route('backend.product.show',$product->id)}}" class="btn btn-info">Show</a>
                                        <a style="display: inline-block; " href="{{route('backend.product.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                                        <form style="display: inline-block;" action="{{ route('backend.product.destroy', $product->id) }}" method="post" accept-charset="utf-8">
                                            @csrf
                                            {{--{{method_field('delete')}}--}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
{{--                        {!! $products->links() !!}--}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
