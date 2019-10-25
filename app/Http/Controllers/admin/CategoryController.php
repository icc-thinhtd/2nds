<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->simplePaginate(10);
        return view('backend.pages.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $name = $request->get('name');
        $parent_id = $request->get('parent_id');
        $depth = $request->get('parent_id');
        $status = $request->get('status');

        $category = new Category();
        $category->name = $name;
        $category->slug = \Illuminate\Support\Str::slug($name);
        $category->parent_id = $parent_id;
        $category->depth = $depth;
        $category->status = $status;
        $category->save();
//        dd($category);

        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.pages.categories.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::find($id);
//        dd($item);
        return view('backend.pages.categories.edit')->with('item',$item);
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
        $parent_id = $request->get('parent_id');
        $depth = $request->get('parent_id');
        $status = $request->get('status');

        $category = Category::find($id);

        $category->name = $name;
        $category->slug = \Illuminate\Support\Str::slug($name);
        $category->parent_id = $parent_id;
        $category->depth = $depth;
        $category->status = $status;
        $category->save();
//        dd($category);

        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xoá với id tương ứng
        Category::destroy($id);
        // Chuyển hướng về trang danh sách
        return redirect()->route('backend.category.index');
    }
}
