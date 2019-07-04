@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Product Management</h1>
@stop

@section('content')

    <div class="row">
      <div class="col-md-8">
            <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">All Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover" id="product">
                <thead>
                   <tr>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                   <th>Image</th>
                   <th>Price</th>
                  <th>Interest</th>
                  <th>Description</th>
                  <th>Action</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
               <tbody>
                  @foreach(@$pro as $row)
                <tr>
                <td>{{$row->name}}</td>
                <td>{{@App\Category::where('id',$row->category_id)->value('name')}}</td>
                <td>{{@App\Brand::where('id',$row->brand_id)->value('name')}}</td>
                <td><a href="{{ asset('../storage/app/product/'.$row->image)}}" width="80"><img src="{{ asset('../storage/app/product/'.$row->image)}}" width="80"></a></td>
                <td>{{$row->price}}</td>
                <td>{{$row->interest}}</td>
                <td>{{$row->description}}</td>
                <td><a href="{{route('edit_product',$row->id)}}"><span class="label label-primary">Edit</span></a></td>
                <td><a href="{{route('del.product',$row->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger">Delete</span></a></td>
                   <td><button type="button" class="btn btn-sm btn-info col-8" data-toggle="modal" data-target="#{{$row->id}}">See Gallery</button>
                    <div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                   <div class="modal-header m-auto">
                    @foreach(@App\ProductImage::where('product_id',$row->product_id)->get() as $row)
                    <a href="{{asset('../storage/app/image/'.$row->images)}}"><img src="{{asset('../storage/app/image/'.$row->images)}}" class=" img img-fluid " width="100" height="100"></a>
                    @endforeach
             </div>
            <div class="modal-body">
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </td>
                
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

              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('product')}}" method="POST" enctype="multipart/form-data">
              @csrf
           
              <div class="box-body">
                <div class="col-md-12">
                  <label for="name" class=" control-label">Product Name</label>

                  <div class="">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                  </div>
                </div>
                <div class=" col-md-6">
                  <label for="prop_name" class=" control-label">Category</label>
                <select class="form-control select2"  name="category_id" data-placeholder="Select Category" required>
                  @foreach(@App\Category::all() as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class=" col-md-6">
                  <label for="prop_name" class=" control-label">Brand</label>
                <select class="form-control select2"  name="brand_id" data-placeholder="Select Brand" required>
                  @foreach(@App\Brand::all() as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
                 <div class="col-md-12">
                  <label for="image" class=" control-label">Image</label>

                  <div class="">
                    <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="images" class=" control-label">Multipal Images</label>

                  <div class="">
                    <input type="file" name="images[]" class="form-control" id="images" placeholder="Images" multiple>
                  </div>
                </div>
                 <div class="col-md-12">
                  <label for="interest" class=" control-label">Interest</label>

                  <div class="">
                    <input type="number" name="interest" class="form-control" id="interest" placeholder="Interest">
                  </div>
                </div>
                 <div class="col-md-12">
                  <label for="price" class=" control-label">Price</label>

                  <div class="">
                    <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                  </div>
                </div>
                <div class=" col-md-12">
                  <label for="dealing_in" class=" control-label">Description</label>
                     <textarea class="textarea" placeholder="Type Here"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"></textarea>
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
    $('#product').DataTable();
  });
    </script>
@stop
