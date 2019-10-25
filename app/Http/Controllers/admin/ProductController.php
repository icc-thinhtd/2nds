<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->simplePaginate(15);


        return view('backend.pages.products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        Storage::disk('local')->put('file.txt', 'Contents');
//        Storage::disk('public')->put('file1.txt', 'Contents public');

//        $content = Storage::get('file.txt');
//        $exists = Storage::disk('local')->exists('file.txt');
//        if ($exists){
//            $url = Storage::disk('public')->url('file.txt');
////            Storage::copy('file.txt','copy/file_copy.txt');
////            Storage::move('copy/file_copy.txt','move/file_move.txt');
//            dd($url);
////            return Storage::download('file.txt','save.txt');
//        }
//        dd($exists);
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //StoreProductRequest - ???
    public function store(StoreProductRequest $request)
    {
        $info_images = [];
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $key => $image){
                $id = $key;
                $username = $key;
                $nameFile = 'sp'.$id.'-'.$image->getClientOriginalName();
//                $nameFile = $image->getClientOriginalName();//name default

                $url = '/storage/products/'.$nameFile;

                Storage::disk('public')->putFileAs('products',$image,$nameFile);
                $info_images[] = [
                    'url' => $url,
                    'name' => $nameFile
                ];
            }
        }else{
            dd('File null');
        }

        $name = $request->get('name');

        $product = new Product();
        $product->name = $name;
        $product->slug = \Illuminate\Support\Str::slug($name);
        $product->content = $request->get('content');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;;
        $product->category_id = $request->get('parent_id');
        $product->save();
//        dd($product);

        foreach ($info_images as $image){
            $img = new Image();
            $img->name = $image['name'];
            $img->path = $image['url'];
            $img->product_id = $product->id;
            $img->save();
        }
        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->product_images;
//        dd($images);
        return view('backend.pages.products.show')->with(['product'=>$product,'images'=>$images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::find($id);
//        dd($item);
        return view('backend.pages.products.edit')->with('product',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $slug = \Illuminate\Support\Str::slug($name);
        $content = $request->get('content');
        $origin_price = $request->get('origin_price');
        $sale_price = $request->get('sale_price');
        $status = $request->get('status');
        $category_id = $request->get('parent_id');

        $product = Product::find($id);
        $product->name = $name;
        $product->slug = $slug;
        $product->content = $content;
        $product->origin_price = $origin_price;
        $product->sale_price = $sale_price;
        $product->status = $status;
        $product->user_id = Auth::user()->id;//$user_id;
        $product->category_id = $category_id;
//        dd($product);

        $product->save();
//        dd($product);

        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        // Chuyển hướng về trang danh sách
        return redirect()->route('backend.product.index');
    }
}
