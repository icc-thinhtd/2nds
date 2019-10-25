@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
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
                        <h3 class="card-title">Sửa thông tin sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.product.update',$product->id) }}" method="post"  role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input name="name" value="{{$product->name}}" type="text" class="form-control" id="" placeholder="Điền tên sản phẩm ">
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="1" @if($product->category_id == 1) selected @endif>Điện thoại</option>
                                    <option value="2" @if($product->category_id == 2) selected @endif>Máy tính</option>
                                    <option value="3" @if($product->category_id == 3) selected @endif>Máy ảnh</option>
                                    <option value="4" @if($product->category_id == 4) selected @endif>Phụ kiện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu sản phẩm</label>
                                <select name="brand" class="form-control select2" style="width: 100%;">
                                    <option value="1" @if($product->brand == 1) selected @endif>Apple</option>
                                    <option value="2" @if($product->brand == 2) selected @endif>Samsung</option>
                                    <option value="3" @if($product->brand == 3) selected @endif>Nokia</option>
                                    <option value="4" @if($product->brand == 4) selected @endif>Oppo</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá khuyến mại</label>
                                        <input name="sale_price" value="{{$product->sale_price}}" type="text" class="form-control" placeholder="Điền giá khuyến mại">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input name="origin_price" value="{{$product->origin_price}}" type="text" class="form-control" placeholder="Điền giá gốc">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea name="content" class="textarea" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($product->status == 0) selected @endif>Đang nhập</option>
                                    <option value="1" @if($product->status == 1) selected @endif>Mở bán</option>
                                    <option value="2" @if($product->status == 2) selected @endif>Hết hàng</option>
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
    </div>
@endsection
