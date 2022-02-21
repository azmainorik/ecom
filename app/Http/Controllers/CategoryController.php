<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    private $categories;
    private $category;

    public function index()
    {
        return view('admin.category.add');
    }


    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect()->back()->with('message', 'Category success');
    }


    public function manage()
    {
        $this->categories =Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage',['categories' => $this->categories]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit', ['category' => $this->category]);
    }


    public function update(Request $request, $id)
    {
        // return 'test';
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','category updated');
    }


    public function delete(Request $request, $id)
    {
        Category::deleteCategory($request,$id);
        return redirect('/manage-category')->with('message','Delete Success');
    }

}
