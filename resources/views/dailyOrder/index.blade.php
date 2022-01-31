@extends('layouts.sidebar')

@section('content')

<span class="text">Daily Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Daily Order List</h4>
                    <div class="float-right">
                        <a href="{{route('daily-order.create')}}" class="btn btn-primary">Add Daily Order</a>
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
                    <div class="table-resopnsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Company</th>
                                    <th>Dealer</th>
                                     <th>Destination</th>
                                     <th>Item Type</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                   <th>Rate Per Ton</th>
                                   <th>Additional Charges</th>
                                   <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyOrders as $dailyOrder)
                                <tr>
                                    <td>{{$dailyOrder->id}}</td>
                                     <td>{{$dailyOrder->date}}</td>
                                      <td>{{$dailyOrder->order_number}}</td>
                                    <td>{{$dailyOrder->company->name}}</td>
                                    <td>{{$dailyOrder->destination}}</td>
                                    <td>{{$dailyOrder->item_type}}</td>
                                    <td>{{$dailyOrder->brand}}</td>
                                    <td>{{$dailyOrder->quantity}}</td>
                                    <td>{{$dailyOrder->rate_per_ton}}</td>
                                    <td>{{$dailyOrder->additional_charges}}</td>
                                    <td>{{$dailyOrder->status}}</td>
                                 
                                   
                                    <td class="d-flex">
                                        <a href="{{route('daily-order.edit',$dailyOrder->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('daily-order.destroy',$dailyOrder->id)}}">
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