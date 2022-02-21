<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory;
    public static $image;
    public static $imageUrl;
    public static $imageName;
    public static $directory;
    public static $extension;


     

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {

            self::$extension = self::$image->getClientOriginalExtension();
            self::$imageName =time().'.'.self::$extension;
            self::$directory ='subcategory-images/';
            self::$image->move(self::$directory,self::$imageName);
            return self::$directory.self::$imageName;

        }
        else
        {
            return '';
        }

    }


    public static function newSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->status = $request->status;
        self::$subCategory->save() ;

    }

    

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);

        self::$image = $request->file('image');

        if(self::$image)
        {
            if(file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }

            //self::$imageUrl=self::getImageUrl($request);

        }
        else
        {
            self::$imageUrl= self::$subCategory->image;
        }

        // self::$subCategory = new SubCategory();
        // self::$subCategory->category_id = $request->category_id;
        // self::$subCategory->name = $request->name;
        // self::$subCategory->description = $request->description;
        // self::$subCategory->image = self::getImageUrl($request);
        // self::$subCategory->status = $request->status;
        // self::$subCategory->save() ;


        self::$subCategory->category_id= $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);;
        self::$subCategory->status = $request->status;
        self::$subCategory->save() ;
    }




    public static function deleteSubCategory($request, $id)
    {

        self::$subCategory = SubCategory::find($id);
        if(file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }

        self::$subCategory->delete();

    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');

    }



}
