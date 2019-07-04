
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Brand Management</h1>
@stop

@section('content')

    <div class="row">
      <div class="col-md-8">
            <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">All Brands</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover" id="newbrand">
                <thead>
                   <tr>
                  <th>Brand Name</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                  @foreach(@$brand as $row)
                <tr>
                <td>{{$row->name}}</td>
                <td><a href="{{route('edit_brand',$row->id)}}"><span class="label label-primary">Edit</span></a>
                <a href="{{route('del.brand',$row->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger">Delete</span></a></td>
                </tr>
                @endforeach
               </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <div class="col-md-4">
        <div class="box box-info">
      
            <div class="box-header with-border">

              <h3 class="box-title">Brand</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('brand')}}" method="POST">
              @csrf
              
           
              <div class="box-body">
                <div class="col-md-12">
                  <label for="name" class=" control-label">Brand Name</label>

                  <div class="">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Brand Name">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
    
      </div>
     
@stop

@section('js')
    <script type="text/javascript">
      $(function () {
         $('.select2').select2();
    $('#newbrand').DataTable();
   

  });
    </script>
@stop
