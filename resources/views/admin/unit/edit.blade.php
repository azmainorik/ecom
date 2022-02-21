@extends('admin.master')

@section('title')
    Add New Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Basic form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{route('unit.update', ['id' => $unit->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf   
                    <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Category Name</label>
                                <input class="form-control" value="{{$unit->name}}" name="name" type="text" placeholder="unit Name">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Category description</label>
                                <textarea name="description" class="form-control" name="description" type="text" placeholder="Category Description" id="" cols="60" rows="10">{{$unit->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Category Image</label>
                            <div class="col-sm-9">
                            <input class="form-control-file" type="file" name="image" type="file" accept="image/*" />
                             <img src="{{asset($unit->image)}}" alt="" height="50" width="80"/>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label>Publication Status</label>
                            <div class="col-sm-9 col-form-label">
                                <label for="" class=""><input type="radio" {{$unit->status == 1 ? 'checked' : ''}} value="1" name="status">published</label>
                                <label for="" class=""><input type="radio" {{$unit->status == 0 ? 'checked' : ''}} value="0" name="status">unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <button class="btn btn-default" type="submit">Update category info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection