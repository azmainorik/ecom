@extends('admin.master')

@section('title')
    Edit  Sub Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Sub Category </div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    @if($message = Session::get('$message'))
                        <div class="alert alert-warning alert-dismissible fade show " role="alert">
                            <strong>{{$message}}!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">$times;</span>
                            </button>
                        </div>
                    @endif


                    <form class="form-horizontal" action="{{route('subcategory.update' , ['id' => $subCategories->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group-row">
                           <select class="form-control" name="category_id">
                                <option value="">---Select Category Name--- </option>
                                @foreach($Categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subCategories->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-row"> 
                            <div class="col-sm-2 col-form-label">
                                <label>Sub Category Name</label>
                                <input class="form-control" name="name" value="{{$subCategories->name}}"type="text" placeholder="Sub Category Name">
                            </div>

                            <div class="col-sm-2 col-form-label">
                                <label>Sub Category description</label>                                
                                <textarea name="description" class="form-control" name="description" type="text" placeholder="Category Description" id="" cols="60" rows="10">{{$subCategories->description}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-9 col-form-label">
                            <label>Sub Category Image</label>
                            <input class="form-control" name="image" type="file" accept="image/*" />
                            <img src="{{asset($subCategories->image)}}" alt="" height="50" width="80"/>
                        </div>
                        <div class="col-sm-9 col-form-label">
                            <label>Publication Status</label>
                            <div class="col-sm-9 col-form-label">
                            <label for="" class=""><input type="radio" {{$subCategories->status == 1 ? 'checked' : ''}} value="1" name="status">published</label>
                            <label for="" class=""><input type="radio" {{$subCategories->status == 0 ? 'checked' : ''}} value="0" name="status">unpublished</label>
                            </div>
                        </div>

                        <div class="col-sm-9 col-form-label">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection