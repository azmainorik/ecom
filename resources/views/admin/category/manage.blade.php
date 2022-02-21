@extends('admin.master')

@section('title')
    Add New Category
@endsection

@section('body')
 <div class="row">
     <div class="col-md-12">
         <div class="ibox">
             <div class="ibox-head">
                 <div class="ibox-title">Data Table</div>
             </div>
             <div class="ibox-body">
                 @if($message = Session::get('$message'))
                     <div class="alert alert-warning alert-dismissible fade show " role="alert">
                         <strong>{{$message}}!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 @endif
                 <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                     <thead>
                     <tr>
                         <th>Name</th>
                         <th>Description</th>
                         <th>Image</th>
                         <th>Status</th>
                         <th>Action </th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($categories as $category)
                     <tr>
                         <td>{{$category->name}}</td>
                         <td>{{$category->description}}</td>
                         <td><img src="{{asset($category->image)}}" alt="" height="70" width="50" ></td>
                         <td>{{$category->status == 1 ? 'published' : 'Unpublished'}}</td>
                         <td>
                             <a href="{{route('category.edit', ['id' =>$category->id])}}" class="btn btn-success btn-xs">
                                 <i class="fa fa-edit"></i>
                             </a>
                             <a href="{{route('category.delete', ['id' =>$category->id])}}" class="btn btn-danger btn-xs"
                                 onclick="event.preventDefault(); document.getElementById('categoryDeleteForm{{$category->id}}').submit();">
                                 <i class="fa fa-trash"></i>
                             </a>
                             <form action="{{route('category.delete', ['id' =>$category->id])}}" method="POST" id="categoryDeleteForm{{$category->id}}">
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