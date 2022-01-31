@extends('layouts.sidebar')

@section('content') 


    <meta name="robots" content="index, follow">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



<span class="text">Daily Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Daily Order</h4>
                    <div class="float-right">
                        <a href="{{route('daily-order.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('daily-order.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label"> Company</label>
                            <select class="form-control company-select"  name="company_id" required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option comp="{{$company->name}}" value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        
<div class="form-group">
  <label for="demo_overview">Select one or more countries</label>
    <select name="input[]" class="form-control" required multiple>
      <option value="m">Mustard</option>
    <option value="k">Ketchup</option>
    <option value="r">Relish</option>
  </select>
</div>


                        <div class="form-group">
                            <label class="col-form-label">Dealer</label>
                            <select class="form-control dealer-select" name="dealer_id" required>
                                <option value="">Please Select Dealer</option>
                                @foreach($dealers as $dealer)
                               
                                  <option class="{{strtolower($dealer->company->name)}}-option" value="{{$dealer->id}}">{{$dealer->name}}</option>
                              
                                @endforeach
                            </select>
                        </div>

                         <div class="form-group">
                            <label class="col-form-label">Destination</label>
                           <input type="text"   class="form-control destination "  data-role="tagsinput" name="destination" required />
                        </div>



                        <div class="form-group">
                            <label class="col-form-label"> Item Type</label>
                            <select class=" select-multiple  form-control"  data-role="select-dropdown"  name="item_type[]" required multiple>
                                <option value="">Please Select Type </option>
                                <option value="opc">OPC</option>
                                <option value="src">SRC</option>
                                 <option value="composite">Composite</option>
                            
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-form-label"> Brand</label>
                            <select class="select-multiple" class="form-control" name="brand[]" required multiple>
                                <option value="">Please Select Brand </option>
                                <option class="power-brand" value="Power Cement">Power Cement</option>
                                <option class="power-brand" value="Black Bull">Black Bull</option>
                                 <option class="power-brand" value="Qila">Qila</option>

                                  <option class="lucky-brand" value="Lucky OPC">Lucky OPC</option>
                                   <option class="lucky-brand" value="Lucky SRC">Lucky SRC</option>
                                    <option class="lucky-brand" value="Lucky Raj">Lucky Raj</option>
                            
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Quantity</label>
                            <select class="form-control quantity-select"  name="quantity" required>
                                <option value="">Please Select Quantity </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="5">5</option>
                                 <option value="5.5">5.5</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="15">15</option>
                                 <option value="20">20</option>
                                 <option value="30">30</option>
                            
                            </select>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Rate Per Ton</label>
                           <input type="text"  class="form-control noofbags" name="rate_per_ton" required />
                        </div>
                          <div class="form-group">
                            <label class="col-form-label">Additional Charges</label>
                           <input type="text"  class="form-control noofbags" name="additional_charges" required />
                        </div>

                        <div class="form-group">
                            <label class="col-form-label"> Status</label>
                            <select class="form-control" name="item_type" required>
                                <option value="">Please Select Status </option>
                                <option value="pending" selected>Pending</option>
                                <option value="delivered">Delivered</option>
                                 <option value="cancelled">Cancelled</option>
                            
                            </select>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$('.company-select').on('change',function(){
    var name = $('.company-select  option:selected').attr('comp').toLowerCase()
        $('.dealer-select option').hide()
        $('.'+name+'-option').show();

        if(name=="lucky"){
           $('.power-brand').hide()
           $('.lucky-brand').show()
        }else{
        $('.power-brand').show()
           $('.lucky-brand').hide()
        }


$('.destination').tagsinput({
  confirmKeys: [13, 44],
  trimValue: true

});

$(function () {
    $('.select-multiple').selectpicker();
    
});




})



</script>
@endsection
