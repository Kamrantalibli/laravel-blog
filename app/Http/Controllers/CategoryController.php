<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
        return view("admin.category.create");
    }


    public function list() {
        $list = Category::all();
        // dd($list);
        return view("admin.category.list", compact('list'));
    }
}