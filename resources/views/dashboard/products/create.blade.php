@extends('dashboard.layout.app',['title' => 'Create New Product'])

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">products</li>
@endsection



@section('content')

@if ($errors->any())
<div class="row justify-content-end mb-4 ">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div></div>
@endif
<div class="row justify-content-center ">


    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Products</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('dashboard.products.store')}} " method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Title *</label>
              <input type="text" name='title' class="form-control" value="{{old('title')}}" id="title" placeholder="Enter title" required>
            </div>


            <div class="form-group">
<label for='description'>Description *</label>
<textarea name="description" class="form-control" id="description" required>{{old('description')}}</textarea>
            </div>
<hr>
            <div class="form-group">
                <label for="exampleInputEmail1">price *</label>
                <input type="number" name='price' required class="form-control" value="{{old('price')}}" id="price" placeholder="Enter price" step="0.01">
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">discount_price</label>
                <input type="number" name='discount_price' class="form-control" value="{{old('discount_price')}}" id="discount_price" placeholder="Enter discount_price" step="0.01">
              </div>
<hr>
            <div class="form-group">
                <label for="status">Status *</label>
                <select required class="custom-select " name="status" id="status">
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                </select>
              </div>


<div>
    <label for="image">Image *</label>
    <input required type="file" name="image" class="form-control-file" id='image' accept="image/*">
</div>

<div class="form-group pt-3">
    <label for="category_id">Category *</label>
    <select required class="custom-select " name="category_id" id="category_id">
     @foreach ($categories as  $category)
<option value="{{$category->id}}">{{$category->name}}</option>
     @endforeach

    </select>
  </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->



    </div>
</div>


@endsection


