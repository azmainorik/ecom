@extends('admin.master')

@section('title')
    Add New Product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-10">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Product </div>
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


                    <form class="form-horizontal" action="{{route('product.new')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group-row">
                            <div class="col-sm-9 col-form-label">
                                <label>Category Name</label>
                            </div>
                            <select class="form-control select2_demo_1" id=""  name="category_id">
                                <option>---Select category Name--</option>
                                @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-row">
                            <div class="col-sm-9 col-form-label">
                                <label>SubCategory Name</label>
                            </div>
                            <select class="form-control select2_demo_1" id=""  name="subcategory_id">
                                <option>---Select subcategory Name---</option>
                                @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-row">
                            <div class="col-sm-9 col-form-label">
                                <label>Brand Name</label>
                            </div>
                            <select class="form-control" required id="category"  name="brand_id">
                                <option>---Select brand Name---</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-row">
                            <div class="col-sm-9 col-form-label">
                                <label>Unit Name</label>
                            </div>
                            <select class="form-control" required id="category"  name="unit_id">
                                <option>---Select unit Name---</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="name" type="text" placeholder="Product Name">
                            </div>
                        </div>   
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="code" type="text" placeholder="Product code">
                            </div>   
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Regular Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="regular_price" type="number" placeholder="regular_price">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Selling Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="selling_price" type="number" placeholder="selling_price">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Short description</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="short_description" type="text" placeholder="short description">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Long description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="long_description" id="summernote" type="text" placeholder="long description"></textarea>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input name="image" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label class="col-sm-3 col-form-label">Sub_Image</label> 
                            <div class="col-sm-9">
                                <input type="file" name="sub_image" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-9 col-form-label">
                            <label>Publication Status</label>
                            <div class="col-sm-9 col-form-label">
                                <label for="" class=""><input type="radio" value="1" name="status">published</label>
                                <label for="" class=""><input type="radio" value="0" name="status">unpublished</label>
                            </div>
                        </div>
                        <div>
                          <div class="col-sm-9 ml-sm-auto">
                             <button class="btn btn-default" type="submit">Submit</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection