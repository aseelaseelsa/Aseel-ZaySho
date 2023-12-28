@extends('dashboard.layout.app',['title' => 'Create New Category'])

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">products</li>
@endsection



@section('content')

@if ($errors->any())
<div class="row justify-content-end ">
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
          <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('dashboard.categories.store')}} " method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name='name' class="form-control" id="name placeholder="Enter name">
            </div>


            <div class="form-group">
                <label for="status">Status</label>
                <select class="custom-select " name="status" id="status">
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                </select>
              </div>



            <div class="form-group">
                <label for="parent_id">Parent Or Main Category</label>
                <select class="custom-select " name="parent_id" id="parent_id">
                    <option value="" selected>select main category</option>
                   @foreach ($mainCategories as $category )
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


