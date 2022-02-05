@extends('layouts.sidebar')

@section('content')

<span class="text">Destination</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit Destination</h4>
                    <div class="float-right">
                        <a href="{{route('destination.index')}}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger"><b>Error </b> <?php echo $message; ?></div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success"><b>Success </b> <?php echo $message; ?></div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{route('destination.update',$destination->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Zone</label>
                                    <input type="text" class="form-control" name="zone" value="{{$destination->zone}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Area</label>
                                    <input type="text" class="form-control" name="area" value="{{$destination->area}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$destination->address}}" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Destination Type</label>
                                    <select class="form-control" name="destination_type" required>
                                        <option value="">Please Select Destination Type</option>
                                        <option value="shop" @if($destination->destination_type=="shop") selected @endif>Shop</option>
                                        <option value="warehouse" @if($destination->destination_type=="warehouse") selected @endif>Warehouse</option>
                                        <option value="project" @if($destination->destination_type=="project") selected @endif>Project</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Location</label>
                                    <input type="text" placeholder="https://goo.gl/maps/B566T7n5SHujqNhJ6"
                                        class="form-control" value="{{$destination->location}}" name="location" required />
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