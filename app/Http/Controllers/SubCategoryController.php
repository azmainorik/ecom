<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{


    private $subCategory;
    private $subCategories;
    private $categories;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.add', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'Sub Category success');
    }

    public function manage()
    {
        $this->subCategories =SubCategory::orderBy('id', 'desc')->get();
        return view('admin.sub-category.manage',['subCategories' => $this->subCategories,]);
    }

    public function edit($id)
    {
        $this->subCategory = SubCategory::find($id);

        $this->categories = Category::all();

        return view('admin.sub-category.edit', [
            'subCategories' => $this->subCategory,
            'Categories'=>$this->categories,
        ]);
    }


    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/manage-sub-category')->with('message',' upadate Sub category success');

    }

    public function delete(Request $request, $id)
    {
        SubCategory::deleteSubCategory($request,$id);
        return redirect('/manage-sub-category')->with('message','Delete Success');
    }



    //
}
