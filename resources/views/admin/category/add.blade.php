@extends('admin.master')

@section('title')
    Add New Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-10">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Category</div>
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


                    <form class="form-horizontal" action="{{route('category.new')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group-row">
                            <div class="col-sm-9 col-form-label">
                                <label>Category Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Category Name">
                            </div>
                            <div class="col-sm-9 col-form-label">
                                <label>category description</label>
                               <div class="col-sm-9">
                                   <textarea class="form-control" name="description" type="text" placeholder="Category Description"></textarea>
                               </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-form-label">
                            <label>Category Image</label>
                            <input class="form-control" name="image" type="file" accept="image/*" />
                        </div>
                        <div class="col-sm-9 col-form-label">
                            <label>Publication Status</label>
                            <div class="col-sm-9 col-form-label">
                                <label for="" class=""><input type="radio" value="1" name="status">published</label>
                                <label for="" class=""><input type="radio" value="0" name="status">unpublished</label>
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