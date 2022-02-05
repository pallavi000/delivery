@extends('layouts.sidebar')

@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<span class="text">Driver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Driver</h4>
                    <div class="float-right">
                        <a href="{{route('driver.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('driver.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control text-capitalize" name="name" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Mobile</label>
                            <input type="text" class="form-control mobile" data-role="tagsinput" name="mobile" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Address</label>
                             <input type="text" class="form-control" name="address" required/>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> CNIC No</label>
                           <input type="text" class="form-control" name="cnic_no" required/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="picture" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">CNIC Front Pic</label>
                                <div class="custom-file">
                                    <input type="file" name="cnic_front_pic" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="cnic_front_pic">Choose file</label>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">CNIC Back Pic</label>
                                <div class="custom-file">
                                    <input type="file" name="cnic_back_pic" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="cnic_back_pic">Choose file</label>
                                </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.mobile').tagsinput({
  confirmKeys: [13, 44],
  trimValue: true

});
</script>
@endsection
