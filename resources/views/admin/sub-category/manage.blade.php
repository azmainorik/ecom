@extends('admin.master')

@section('title')
    Manage Sub Category
@endsection

@section('body')
 <div class="row">
     <div class="col-md-12">
         <div class="ibox">
             <div class="ibox-head">
                 <div class="ibox-title">All sub-category</div>
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
                 <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                     <thead>
                     <tr>
                         <th>SL no</th>
                         <th>Sub-cat Name</th>
                         <th>Category Name</th>
                         <th>Description</th>
                         <th>Image</th>
                         <th>Status</th>
                         <th>Action </th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($subCategories as $subCategory)
                     <tr>
                         <td>{{$subCategory->id}}</td>
                         <td>{{$subCategory->name}}</td>
                         <td>{{$subCategory->category->name}}</td>
                         <td>{{$subCategory->description}}</td>
                         <td><img src="{{asset($subCategory->image)}}" alt="" height="70" width="50" ></td>
                         <td>{{$subCategory->status == 1 ? 'published' : 'Unpublished'}}</td>
                         <td>
                             <a href="{{route('subcategory.edit', ['id' =>$subCategory->id])}}" class="btn btn-success btn-xs">
                                 <i class="fa fa-edit"></i>
                             </a>
                             <a href="{{route('subcategory.delete', ['id' =>$subCategory->id])}}" class="btn btn-danger btn-xs"
                                 onclick="event.preventDefault(); document.getElementById('categoryDeleteForm{{$subCategory->id}}').submit()">
                                 <i class="fa fa-trash"></i>
                             </a>
                             <form action="{{route('subcategory.delete', ['id' =>$subCategory->id])}}" method="POST" id="categoryDeleteForm{{$subCategory->id}}">
                                 @csrf
                             </form>                             
                         </td>
                     </tr>
                     @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

@endsection