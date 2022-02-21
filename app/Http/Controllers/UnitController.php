<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //

    public $units;

    public function index()
    {
        return view('admin.unit.add');
    }


    public function create(Request $request)
    {
        Unit::newUnit($request);
        return redirect()->back()->with('message', 'Category success');
    }

    public function manage()
    {
        $this->units =Unit::orderBy('id', 'desc')->get();
        return view('admin.unit.manage',['units' => $this->units]);
    }

    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit', ['units' => $this->unit]);
    }

    public function update(Request $request, $id)
    {
        
        Unit::updateUnit($request,$id);
        return redirect('/manage-unit')->with('message','unit');

    }

    public function delete(Request $request, $id)
    {
        Unit::deleteUnit($id);
        return redirect('/manage-unit')->with('message','Delete Success');
    }



}
