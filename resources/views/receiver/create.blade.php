@extends('layouts.sidebar')

@section('content')

<span class="text">Receiver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add New Receiver</h4>
                    <div class="float-right">
                        <a href="{{route('receiver.index')}}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger"><b>Error </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success"><b>Success </b>
                        <?php echo $message; ?>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif


                    <form method="POST" action="{{route('receiver.store')}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Dealer</label>
                                    <select class="form-control" name="dealer_id" required>
                                        <option value="">Please Select Dealer</option>
                                        @foreach($dealers as $dealer)
                                        <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Name</label>
                                    <input type="text"
                                        class="form-control" name="name" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Number</label>
                                    <input type="number" 
                                        class="form-control" name="number" required />
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Zone</label>
                                    <select class="form-control" name="zone" required>
                                        <option value="">Please Select Zone</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->zone}}">{{$destination->zone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Area</label>
                                    <select class="form-control" name="area" required>
                                        <option value="">Please Select Area</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->area}}">{{$destination->area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Address</label>
                                    <select class="form-control" name="address" required>
                                        <option value="">Please Select Address</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->address}}">{{$destination->address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                            </div>
                        </div>
                        <button class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection