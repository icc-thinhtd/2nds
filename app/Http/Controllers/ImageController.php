<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    function uploads(Request $rq) {
        $rules = [ 'image' => 'image|max:1024' ];
        $posts = [ 'image' => $rq->file('image') ];

        // Validator để kiểm tra
        $valid = Validator::make($posts, $rules);

        // Kiểm tra nếu có lỗi
        if ($valid->fails()) {
            // Có lỗi, redirect trở lại
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            // Ko có lỗi, kiểm tra nếu file đã dc upload
            if ($rq->file('image')->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                $fileExtension = $rq->file('image')->getClientOriginalExtension(); // Lấy . của file

                // Filename cực shock để khỏi bị trùng
                $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

                // Thư mục upload
                $uploadPath = public_path('/upload'); // Thư mục upload

                // Bắt đầu chuyển file vào thư mục
                $rq->file('image')->move($uploadPath, $fileName);

                // Thành công, show thành công
                return redirect()->back()->with('success', 'Upload files thành công!');
            }
            else {
                // Lỗi file
                return redirect()->back()->with('error', 'Upload files thất bại!');
            }
        }
    }
}
