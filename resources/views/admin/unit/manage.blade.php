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
                                <span aria-hidden="true">$times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>                            
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->description}}</td>                                
                                <td>{{$unit->status == 1 ? 'published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('unit.edit', ['id' =>$unit->id])}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('unit.delete', ['id' =>$unit->id])}}" class="btn btn-danger btn-xs"
                                       onclick="event.preventDefault(); document.getElementById('unitDeleteForm{{$unit->id}}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('unit.delete', ['id' =>$unit->id])}}" method="POST" id="unitDeleteForm{{$unit->id}}">
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