@extends('admin.master')

@section('title')
    Brand manage
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
                    <form class="form-horizontal" action="{{route('brand.update', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf   
                    <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Brand Name</label>
                                <input class="form-control" value="{{$brand->name}}" name="name" type="text" placeholder="brand Name">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Brand description</label>
                                <textarea name="description" class="form-control" name="description" type="text" placeholder="Brand Description" id="" cols="60" rows="10">{{$brand->description}}</textarea>
                            </div>
                     </div>
                     <div class="form-group row">
                            <label>Brand Image</label>
                            <div class="col-sm-9">
                            <input class="form-control-file" type="file" name="image" type="file" accept="image/*" />
                             <img src="{{asset($brand->image)}}" alt="" height="50" width="80"/>
                            </div>
                     </div>
                        <div class="form-group row">
                            <label>Publication Status</label>
                            <div class="col-sm-9 col-form-label">
                                <label for="" class=""><input type="radio" {{$brand->status == 1 ? 'checked' : ''}} value="1" name="status">published</label>
                                <label for="" class=""><input type="radio" {{$brand->status == 0 ? 'checked' : ''}} value="0" name="status">unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <button class="btn btn-default" type="submit">Update brand info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection