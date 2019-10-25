@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sửa danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Sửa danh mục</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sửa danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.category.update',$item->id) }}" method="POST" role="form">
                        @csrf
{{--                        <input name="_method" type="hidden" value="PUT">--}}
                        {{--{{ method_field('PUT') }}--}}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input name="name" type="text" class="form-control" value="{{$item->name}}" placeholder="Điền tên danh mục ">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($item->parent_id == 0) selected @endif>--Chọn danh mục---</option>
                                    <option value="1" @if($item->parent_id == 1) selected @endif>Điện thoại</option>
                                    <option value="2" @if($item->parent_id == 2) selected @endif>Máy tính</option>
                                    <option value="3" @if($item->parent_id == 3) selected @endif>Máy ảnh</option>
                                    <option value="4" @if($item->parent_id == 4) selected @endif>Phụ kiện</option>
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputFile">Hình ảnh danh mục</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <span class="input-group-text" id="">Upload</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>Trạng thái danh mục</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn trạng thái---</option>
                                    <option value="0" @if($item->status == 0) selected @endif>Admin</option>
                                    <option value="1" @if($item->status == 1) selected @endif>User</option>
                                    <option value="2" @if($item->status == 2) selected @endif>All</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ 'Chưa chọn trạng thái !' }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
