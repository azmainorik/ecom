<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    private $products;
    private $product;
    private $categories;
    private $subcategories;
    private $brands;
    private $units;



    public function index()
    {

        $this->categories = Category::all();
        $this->subcategories = subCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();   

        return view('admin.product.add',   [
            
            'categories' => $this->categories,
            'subcategories' => $this->subcategories,
            'brands' => $this->brands,
            'units' => $this->units,
        
            ]);
    }




    public function create(Request $request)
    {

        $this->product=Product::newProduct($request);
        SubImage::newSubImage($this->product,$request);
        
        $this->categories = Category::all();
        $this->subcategories = subCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();           

        
        return view('admin.product.add', [
            
        'categories' => $this->categories,
        'subcategories' => $this->subcategories,
        'brands' => $this->brands,
        'units' => $this->units,
    
        ]);
    }



    public function manage()
    {
        $this->products =Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage',['categories' => $this->categories]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit', ['categories' => $this->category]);
    }


    public function update(Request $request, $id)
    {
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','category');
    }



    public function delete(Request $request, $id)
    {
        Category::deleteCategory($id);
        return ridirect('/manage-category')->with('message','Delete Success');
    }

}
