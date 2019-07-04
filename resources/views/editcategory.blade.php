
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
   	<div class="col-md-4">
            <div class="box box-info">
      
            <div class="box-header with-border">

              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('edit_cate',$user->id)}}" method="POST">
              @csrf
              
             
                <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                  </div>
                </div>
              </div>
              
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>


 @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
