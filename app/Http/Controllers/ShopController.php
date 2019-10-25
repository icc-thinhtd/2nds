<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShopController extends Controller
{

    public function __construct(){

        $listCat = Category::get();

        $user = User::find(1);$user->userInfo;

        $contact_info = ['email'=>$user->email,'full_name'=>$user->userInfo->full_name,'phone'=>$user->userInfo->phone,'address'=>$user->userInfo->address];

//        dd($contact_info);

        View::share('listCat',$listCat);
        View::share('user',$contact_info);

    }

    public function index()
    {
        return view('frontend.login_index');
    }

}
