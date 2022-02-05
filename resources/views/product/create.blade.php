@extends('layouts.sidebar')

@section('content')

<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add New Product</h4>
                    <div class="float-right">
                        <a href="{{route('product.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('product.store')}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Company</label>
                                    <select class="form-control" name="company_id" required>
                                        <option value="">Please Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Item Type</label>
                                    <input type="text"
                                        class="form-control" name="item_type" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Brand</label>
                                    <input type="text"
                                        class="form-control" name="brand" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number"
                                        class="form-control" name="quantity" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Package Type</label>
                                    <input type="text" 
                                        class="form-control" name="package_type" required />
                                </div>
                                <div class="col"></div>
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