@extends('layouts.sidebar')

@section('content')

<span class="text">Company</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Company</h4>
                    <div class="float-right">
                        <a href="{{route('company.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('company.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Company Name</label>
                            <input type="text" class="form-control" name="name" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Company Address</label>
                            <input type="text" class="form-control" name="address" required/>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
