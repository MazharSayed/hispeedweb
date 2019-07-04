
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
   	<div class="col-md-8">
            <div class="box box-info">
      
            <div class="box-header with-border">

              <h3 class="box-title">Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <form class="form-horizontal" action="{{ route('edit_product',$user->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
           
             
                <div class="box-body">
                <div class="col-md-10">
                  <label for="name" class=" control-label">Product Name</label>
                  <div class="">
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                  </div>
                </div>
                <div class="col-md-10">
                  <label for="prop_name" class=" control-label">Category</label>
                <select class="form-control select2"  name="category_id" data-placeholder="Select Category" required>
                  @foreach(@App\Category::all() as $row)
                  <option value="{{$row->id}}" @if($user->category_id==$row->id) selected @endif>{{$row->name}}</option>
                  @endforeach
                </select>
                </div>  
                <div class="col-md-10">
                  <label for="prop_name" class=" control-label">Brand</label>
                <select class="form-control select2"  name="brand_id" data-placeholder="Select Brand" required>
                  @foreach(@App\Brand::all() as $row)
                  <option value="{{$row->id}}" @if($user->brand_id==$row->id) selected @endif>{{$row->name}}</option>
                  @endforeach
                </select>
                </div>
                <div class="col-md-10 "> 
                  <label for="image" class=" control-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                
                <div class="col-md-10">
                  <label for="images" class=" control-label">Multiple Image</label>
                   <input type="file" name="images[]" class="form-control" id="images"  multiple>
                  </div>
                <!--  <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10 mt-3">
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                </div>
                <div class="form-group">
                  <label for="images" class="col-sm-2 control-label">Multiple Image</label>

                  <div class="col-sm-10">
                   <input type="file" name="images[]" class="form-control" id="images"  multiple>
                  </div>
                </div> -->
                 <div class="col-md-10">
                  <label for="interest" class=" control-label">Interest</label>
                  <div class="">
                    <input type="number" name="interest" class="form-control" id="interest" value="{{$user->interest}}">
                  </div>
                </div>
                <div class="col-md-10">
                  <label for="price" class=" control-label">Price</label>
                  <div class="">
                    <input type="number" name="price" class="form-control" id="price" value="{{$user->price}}">
                  </div>
                </div>   
                <div class=" col-md-10">
                  <label for="description" class=" control-label">Description</label>
                     <textarea class="textarea" placeholder="Type Here"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"
                           id="description">{{$user->description}}</textarea>
                </div>    
              </div>
              
             <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Edit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>


 @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script type="text/javascript">
      $(function () {
         $('.select2').select2();
    $('#product').DataTable();
   
//Timepicker
   
  });
    </script>
@stop
