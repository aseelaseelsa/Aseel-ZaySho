@extends('dashboard.layout.app',['title' => $status.' Orders'])



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
              <h3 class="card-title">{{$status}} Orders Table</h3>












            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th>Delievery Status</th>
                    <th>Payment Method</th>
                    <th>Number of Product</th>
                    <th>Total</th>
                    <th>Ordered At </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

@forelse ($orders as $order)
 <tr class="bg-secondary">
    <td>{{$order->id}}</td>
    <td>
@if ($order->status=='pending')

<span class="badge badge-warning">Pending</span>

@elseif($order->status=='accepted')
<span class="badge badge-info">Accepted</span>

@elseif($order->status=='rejected')
<span class="badge badge-danger">Rejected</span>

@endif


    </td>
    <td>
@if ($order->payment_status=='paid')
<span class="badge badge-success">Paid</span>

@else
<span class="badge badge-danger">Unpaid</span>


@endif



    </td>
    <td>
        @if ($order->delivery_status=='delivered')
        <span class="badge badge-success">Delivered</span>
        @else
        <span class="badge badge-danger">Undelivered</span>

        @endif
    </td>

<td>
{{$order->payment_method}}
</td>

<td>{{$order->products_count}}</td>
<td>{{$order->total}}</td>
 <td>
        {{$order->created_at}}
    </td>



    <td class="d-flex gap-4 ">
        <a href="{{route('dashboard.orders.show',$order->id)}}" class="btn btn-sm btn-primary ">show</a>




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
