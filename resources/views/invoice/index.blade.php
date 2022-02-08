@extends('layouts.sidebar')

@section('content')

<span class="text">Invoice</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Invoice List</h4>
                    <div class="float-right">
                        <a href="{{route('daily-order.index')}}" class="btn btn-primary">Add Invoice</a>
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
                                    <th>Date</th>
                                    
                                    <th> Daily Order No</th>
                                    <th>D.O Nos</th>
                                     <th>Vehicle</th>
                                      <th>Driver</th>
                                      <th>Destination</th>
                                      <th>A.F</th>
                                      <th>B.F</th>
                                      <th>Total Freight</th>
                                      <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->created_at}}</td>
                                   
                                    <td> <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($invoice->daily_order_id ) as $id)
                                            <li> {{$id}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td> <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($invoice->delivery_order_id ) as $id)
                                            <li> {{$id}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td> <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($invoice->vehicle_id ) as $id)
                                            <li> {{$id}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td> <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($invoice->driver_id ) as $id)
                                            <li> {{$id}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td> <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($invoice->destination) as $id)
                                            <li> {{$id}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td>{{$invoice->advance_freight}}</td>
                                    <td>{{$invoice->balance_freight}}</td>
                                    <td>{{$invoice->total_freight}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-success mr-2">View</a>
                                        <form method="POST" action="{{route('invoice.destroy',$invoice->id)}}">
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