@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer Management</h1>
@stop

@section('content')



<div class="col-md-12">
            <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">All Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover" id="customer">
                <thead>
                   <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Referal Code</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                  @foreach(@$customer as $row)
                <tr>
                <td>{{$row->first_name}}</td>
                <td>{{$row->last_name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->mobile_number}}</td>
                <td>{{$row->referal_id}}</td>
                <!-- <td><a href="{{route('edit_cate',$row->id)}}"><span class="label label-primary">Edit</span></a> -->
               <td><a href="{{route('del.cust',$row->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger">Delete</span></a></td> 
                </tr>
                @endforeach
               </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>









@stop

@section('js')
    <script type="text/javascript">
      $(function () {
         $('.select2').select2();
    $('#category').DataTable();
   

  });
    </script>
@stop