@extends('layouts.sidebar')

@section('content')

<span class="text">Driver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edd Driver</h4>
                    <div class="float-right">
                        <a href="{{route('driver.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('driver.update',$driver->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$driver->name}}" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{$driver->mobile}}"
                                required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{$driver->address}}"
                                required />

                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> CNIC No</label>
                            <input type="text" class="form-control" name="cnic_no" value="{{$driver->cnic_no}}"
                                required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Company</label>
                            <select class="form-control" name="company_id" required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}" @if($driver->company->id==$company->id) selected
                                    @endif>{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Picture</label>
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="custom-file">

                                        <input type="file" name="picture" value="{{$driver->picture}}"
                                            class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{$driver->picture}}" class="img-fluid w-50" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">CNIC Front Pic</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="custom-file">

                                        <input type="file" name="cnic_front_pic" value="{{$driver->cnic_front_pic}}"
                                            class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="cnic_front_pic">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{$driver->cnic_front_pic}}" class="img-fluid w-50" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">CNIC Back Pic</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" value="{{$driver->cnic_back_pic}}" name="cnic_back_pic"
                                            class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="cnic_back_pic">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{$driver->cnic_back_pic}}" class="img-fluid w-50" />
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection