@extends('layouts.sidebar')

@section('content')

<span class="text">Delivery Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Delivery Order List</h4>
                    <div class="float-right">
                        <a href="{{route('delivery-order.create')}}" class="btn btn-primary">Add Delivery Order</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible "><b>Error </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible"><b>Success </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>DO Number</th>
                                    <th>Dealer</th>
                                     <th>Brand</th>
                                     <th>Quantity</th>
                                    <th>Packing Type</th>
                                    <th>Number of Bags</th>
                                   <th>Zone</th>
                                   <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deliveryOrders as $deliveryOrder)
                                <tr>
                                    <td>{{$deliveryOrder->id}}</td>
                                    <td>{{$deliveryOrder->company->name}}</td>
                                    <td>{{$deliveryOrder->do_number}}</td>
                                    <td>{{$deliveryOrder->dealer->name}}</td>
                                    <td>{{$deliveryOrder->brand}}</td>
                                    <td>{{$deliveryOrder->quantity}}</td>
                                    <td>{{$deliveryOrder->packing_type}}</td>
                                    <td>{{$deliveryOrder->noofbags}}</td>
                                    <td>{{$deliveryOrder->zone}}</td>
                                   <td>{{$deliveryOrder->expire_date}}</td>
                                   
                                    <td class="d-flex">
                                        <a href="{{route('delivery-order.edit',$deliveryOrder->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('delivery-order.destroy',$deliveryOrder->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection