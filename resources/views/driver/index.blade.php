@extends('layouts.sidebar')

@section('content')

<span class="text">Driver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Driver List</h4>
                    <div class="float-right">
                        <a href="{{route('driver.create')}}" class="btn btn-primary">Add Driver</a>
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
                                    <th>Name</th>
                                    <th>Mobile</th>
                                     <th>Address</th>
                                     <th>CNIC No</th>
                                    <th>Company</th>
                                    <th>Picture</th>
                                    <th>CNIC Front Pic</th>
                                    <th>CNIC Back Pic</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $driver)
                                <tr>
                                    <td>{{$driver->id}}</td>
                                    <td>{{$driver->name}}</td>
                                    <td>{{$driver->mobile}}</td>
                                    <td>{{$driver->address}}</td>
                                    <td>{{$driver->cnic_no}}</td>
                                    <td>{{$driver->company->name}}</td>
                                     <td><img src="{{$driver->picture}}"  width="75" height="75" /></td>
                                    <td><img src="{{$driver->cnic_front_pic}}" width="75" height="75"/></td>
                                    <td><img src="{{$driver->cnic_back_pic}}" width="75" height="75"/></td>

                                    <td class="d-flex">
                                        <a href="{{route('driver.edit',$driver->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('driver.destroy',$driver->id)}}">
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