@extends('dashboard.layout.app',['title' => 'Products'])
@section('content')
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success ">
            <h5><i class="icon fas fa-check"></i>Success</h5>
            {{session()->get('success')}}
            </div>
                 @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Products Table</h3>

              <div class="card-tools">
               <a href="{{route('dashboard.products.create')}}" class="btn btn-primary btn-sm" >
                <i class=" fas fa-plus "></i>

                   Add new Products

            </a>
              </div>











            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>discount_price</th>
                    <th>category</th>
                    <th>Created_At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

@forelse ($products as $product)
<tr class="bg-secondary">
    <td>{{$loop->iteration}}</td>
    <td>{{$product->title}}</td>
    <td>{{$product->description}}</td>
    <td>
        @if ($product->status==1)
        <span class="badge badge-success">Active</span>

        @else
        <span class="badge badge-danger">InActive</span>

        @endif
    </td>

<td>
    <img src="{{asset('storage/'.$product->image)}}" width="70" alt='product'>
</td>

<td>{{$product->price}}</td>
<td>{{$product->discount_price?? '-----'}}</td>
<td>{{$product->category->name }}</td>
 <td>
        {{$product->created_at->diffForHumans()}}
    </td>



    <td class="d-flex gap-4 ">
        <a href="{{route('dashboard.products.edit',  $product->id)}}" class="btn btn-sm btn-warning ">Update</a>



        <form action="{{route('dashboard.products.destroy',  $product->id)}}" method="POST">
          @csrf
          @method('DELETE')

           <button class="btn btn-sm btn-danger delete-btn mx-2">Delete</button>
        </form>
    </td>
  </tr>
@empty
<tr >
    <td class="text-center" colspan="9">No Products Found</td>
</tr>
@endforelse


                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Products</li>
@endsection
