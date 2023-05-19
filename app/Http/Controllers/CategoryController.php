<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create() {
        $parentCategories = Category::whereNull("parent_id")->get();

        // dd($parentCategories);
        return view("admin.category.create", compact('parentCategories'));
    }

    public function store(CategoryCreateRequest $request) {
        // $request->validate([
        //     "name" => ["required", "min:2"]
        //     "slug" => ["required", "min:2", "unique:categories"]
        //     "order" => ["required", "integer"]
        // ]);
        // $data = $request->only();    // => $data accept only what parameter we want from request  
        $data = $request->except('_token');     // => $data accepts all except this parameter from request
        // $data['slug'] = Str::slug($request->slug != null ? $request->slug : $request->name); //Method 1
        $data['slug'] = Str::slug( !is_null($request->slug) ? $request->slug : $request->name); //Method 2
        $data['status'] = isset($request->status) ? 1 : 0 ;
        $data['feature_status'] = isset($request->feature_status) ? 1 : 0 ;
        // $data = [
        //     "name" => $request->name,
        //     .....
        // ];     // => $data accepts from request other method 
        // dd($request); 

        Category::create($data);
        return redirect()->route('admin.category.list');   
    }


    public function list() {
        $list = Category::with(['parentCategory'])->orderBy('order', 'DESC')->get();
        
        return view("admin.category.list", compact('list'));
    }
}
