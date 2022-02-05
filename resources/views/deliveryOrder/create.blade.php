@extends('layouts.sidebar')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
<span class="text">Delivery Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add DeliveryOrder</h4>
                    <div class="float-right">
                        <a href="{{route('delivery-order.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('delivery-order.store')}}" enctype="multipart/form-data">
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
                            <div class="do-number">
                            </div>
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
                            <label class="col-form-label"> Item Type</label>
                            <select class="form-control" name="item_type" required>
                                <option value="">Please Select Type </option>
                                <option value="opc">OPC</option>
                                <option value="src">SRC</option>
                                 <option value="composite">Composite</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Brand</label>
                            <select class="form-control" name="brand" required>
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
                            <label class="col-form-label">Packing Type</label>
                            <select class="form-control" name="packing_type" required>
                                <option value="">Please Select Packing Type </option>
                                <option value="paper_bags">Paper Bags</option>
                                <option value="pp">PP</option>
                                
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No Of Bags</label>
                           <input type="text"  class="form-control noofbags" name="noofbags" required readonly/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Zone</label>
                           <input type="text" class="form-control" name="zone" required/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Expire Date</label>
                           <input type="text" id="datepicker" class="form-control" name="expire_date" required/>
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

        if(name=="power"){
                var div=` 
                         <label class="col-form-label">DO Number</label>
                         <div class="row pl-3">
                            <div class="col px-0">
                            <input type="text" name="do_number[]" class="form-control" value="SOrd - " readonly required >
                            </div>
                            <div class="col px-0">
                            <input type="text" class="form-control"  name="do_number[]" required >
                            </div>
                            <div class="col px-0">
                            <input type="text" class="form-control" name="do_number[]" required value="/" readonly >
                            </div>
                            <div class="col px-0">
                            <input type="text" class="form-control" name="do_number[]"  required>
                            </div>
                        </div>`

                        $('.do-number').html(div)
        }else{
            var div = `<label class="col-form-label">DO Number</label>
             <input type="number" class="form-control" name="do_number" required/>`

             $('.do-number').html(div)
            
        }



})


$('.quantity-select').on('change',function(){
    var quantity = $(this).val()
    var bags = quantity*20
    $('.noofbags').val(bags)
})

 $( function() {
    $( "#datepicker" ).datetimepicker();
  } );


</script>
@endsection
