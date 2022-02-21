<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public static $brand;
    public static $unit;
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
            self::$directory ='unit-images/';
            self::$image->move(self::$directory,self::$imageName);
            return self::$directory.self::$imageName;

        }
        else
        {
            return '';
        }

    }


    public static function newUnit($request)
    {
        self::$unit = new Unit();
        self::$unit->name = $request->name;
        self::$unit->description = $request->description;        
        self::$unit->status = $request->status;
        self::$unit->save() ;

    }



    public static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);        
        self::$unit->name = $request->name;
        self::$unit->description = $request->description;        
        self::$unit->status = $request->status();
        self::$unit->save() ;
    }


    public static function deleteUnit($request, $id)
    {

        self::$unit = Category::find($id);
        if(file_exists(self::$unit->image))
        {
            unlink(self::$unit->image);
        }

        self::$unit->delete();

    }

}
