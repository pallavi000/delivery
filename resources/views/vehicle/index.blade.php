@extends('layouts.sidebar')

@section('content')

<span class="text">Vehicle</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Vehicle List</h4>
                    <div class="float-right">
                        <a href="{{route('vehicle.create')}}" class="btn btn-primary">Add Vehicle</a>
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
                                    <th>Vehicle No</th>
                                    <th>Registration City</th>
                                     <th>Type</th>
                                    <th>Body Type</th>
                                    <th>Company</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{$vehicle->id}}</td>
                                    <td>{{$vehicle->vehicle_no}}</td>
                                    <td>{{$vehicle->registration_city}}</td>
                                    <td>{{$vehicle->type}}</td>
                                    <td>{{$vehicle->body_type}}</td>
                                    <td>{{$vehicle->company->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('vehicle.edit',$vehicle->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('vehicle.destroy',$vehicle->id)}}">
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