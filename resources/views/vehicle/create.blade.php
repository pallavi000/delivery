@extends('layouts.sidebar')

@section('content')

<span class="text">Vehicle</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Vehicle</h4>
                    <div class="float-right">
                        <a href="{{route('vehicle.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('vehicle.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Vehicle No</label>
                            <input type="text" class="form-control" name="vehicle_no" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Registration City</label>
                            <input type="text" class="form-control" name="registration_city" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Type</label>
                            <select class="form-control" name="type" required>
                                <option value="">Please Select Type </option>
                                <option value="6-wheeler">6 Wheeler</option>
                                <option value="8-wheeler">8 Wheeler</option>
                                <option value="10-wheeler">10 Wheeler</option>
                                <option value="12-wheeler">12 Wheeler</option>
                                <option value="18-wheeler">18 Wheeler</option>
                                <option value="20-wheeler">20 Wheeler</option>
                                <option value="22-wheeler">22 Wheeler</option>
                                <option value="24-wheeler">24 Wheeler</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Body Type</label>
                            <select class="form-control" name="body_type" required>
                                <option value="">Please Select Type </option>
                                <option value="floor">Floor</option>
                                <option value="box">Box</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Company</label>
                            <select class="form-control" name="company_id" required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
