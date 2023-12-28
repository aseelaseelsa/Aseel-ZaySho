@extends('dashboard.layout.app',['title' => 'Categories'])

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
          <h3 class="card-title">Categories Table</h3>

          <div class="card-tools">
            <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary btn-sm" >
                <i class=" fas fa-plus "></i>

                   Add new Categories

            </a>
          </div>




        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Products Count</th>
                <th>Created_At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($mainCategories as $category)
              <tr class="bg-secondary">
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>
                    @if ($category->status==1)
                    <span class="badge badge-success">Active</span>

                    @else
                    <span class="badge badge-danger">InActive</span>

                    @endif
                </td>
                <td>-</td>
                <td>
                    {{$category->created_at->diffForHumans()}}
                </td>
                <td class="d-flex gap-4 ">
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-sm btn-warning ">Update</a>



                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="POST">
                      @csrf
                      @method('DELETE')

                       <button class="btn btn-sm btn-danger delete-btn mx-2">Delete</button>
                    </form>
                </td>
              </tr>
              @php
                  $mainNum=$loop->iteration
              @endphp
{{-- childreen --}}
@if ($category->childrens->count()>0)
@foreach ($category->childrens as $child )
<tr>
    <td>{{ $mainNum .'-'. $loop->iteration}}</td>
    <td>{{$child->name}}</td>
    <td>
        @if ($child->status==1)
        <span class="badge badge-success">Active</span>

        @else
        <span class="badge badge-danger">InActive</span>

        @endif
    </td>
    <td>{{$child->products_count}}</td>
    <td>
        {{$child->created_at->diffForHumans()}}
    </td>
    <td class="gap-2 d-flex">
        <a href="{{route('dashboard.categories.edit',$child->id)}}" class="btn btn-sm btn-warning  ">Update</a>



        <form action="{{route('dashboard.categories.destroy',$child->id)}}" method="POST">
            @csrf
            @method('DELETE')

             <button class="btn btn-sm btn-danger delete-btn mx-2">Delete</button>
          </form>
    </td>
</tr>
@endforeach

@endif



                @empty
<tr >
    <td colspan="5" class="text-center">No Categories Found</td>
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


