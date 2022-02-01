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
                        <a href="{{route('invoice.create')}}" class="btn btn-primary">Add Invoice</a>
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
                                    <th>Delivery Order Weight</th>
                                    <th> Daily Order Weight</th>
                                     <th> Total Weight</th>
                                      <th> Commission</th>
                                      <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->created_at}}</td>
                                    <td>{{$invoice->delivery_order_weight}}</td>
                                    <td>{{$invoice->daily_order_weight}}</td>
                                    <td>{{$invoice->total_weight}}</td>
                                    <td>{{$invoice->commission }}</td>
                                    <td class="d-flex">
                                        <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-warning mr-2">Show</a>
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