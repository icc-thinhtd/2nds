@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sửa người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
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
                        <h3 class="card-title">Sửa thông tin người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.user.update',$user->id) }}" method="post"  role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên người dùng</label>
                                <input name="name" type="text" class="form-control" value="{{$user->name}}" id="" placeholder="Tên người dùng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" value="{{$user->email}}" class="form-control" id="" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input name="password" type="password" value="{{$user->password}}" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label>Chờ duyệt</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($user->status == 0) selected @endif>Waiting</option>
                                    <option value="1" @if($user->status == 1) selected @endif>Approved</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($user->role == 0) selected @endif>Admin</option>
                                    <option value="1" @if($user->role == 1) selected @endif>User</option>
                                </select>
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
@endsection
