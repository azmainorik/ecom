<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $category;
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
         self::$directory ='category-images/';
         self::$image->move(self::$directory,self::$imageName);
         return self::$directory.self::$imageName;

       }
       else
       {
           return '';
       }


    }


    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->status = $request->status;
        self::$category->save() ;

    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        self::$image = $request->file('image');

        if(self::$image)
        {
          if(file_exists(self::$category->image))
          {
             unlink(self::$category->image);
          }

          self::$imageUrl=self::getImageUrl($request);

        }
        else
        {
            self::$imageUrl= self::$category->image;
        }

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();
    }


    public static function deleteCategory($request, $id)
    {

        self::$category = Category::find($id);
        if(file_exists(self::$category->image))
        {
           unlink(self::$category->image);
        }

        self::$category->delete();

    }


    public function subCategory()
    {
       return $this->hasMany('App\Models\SubCategory');


    }




}

