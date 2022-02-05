@extends('layouts.sidebar')

@section('content') 



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
                    <h4 class="card-title float-left">Edit Daily Order</h4>
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


                    <form method="POST" action="{{route('daily-order.update',$dailyOrder->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label"> Company</label>
                            <select class="form-control company-select"  name="company_id"  required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option comp="{{$company->name}}" value="{{$company->id}}" @if($dailyOrder->company_id==$company->id)selected @endif>{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                            <label class="col-form-label">Dealer</label>
                            <select class="form-control dealer-select" name="dealer_id" required>
                                <option value="">Please Select Dealer</option>
                                @foreach($dealers as $dealer)
                               
                                  <option class="{{strtolower($dealer->company->name)}}-option" @if($dailyOrder->dealer_id==$dealer->id)selected @endif value="{{$dealer->id}}">{{$dealer->name}}</option>
                              
                                @endforeach
                            </select>
                                </div>
                                 <div class="col">
                                     <label class="col-form-label">Receiver</label>
                                     <input type="text"  class="form-control"  value="{{$dailyOrder->receiver}}" name="receiver" required />
                       
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-form-label">Destination</label>
                           <input type="text" value="{{implode(',', json_decode($dailyOrder->destination))}}"  class="form-control destination "   data-role="tagsinput" name="destination" required />
                        </div>

                     

                        <div class="form-group">

                            <label class="col-form-label"> Item Type</label>
                            <select class=" select-multiple  form-control"  data-role="select-dropdown"  name="item_type[]" required multiple>
                                <option value="">Please Select Type </option>
                                <option value="opc" @if(in_array('opc',json_decode($dailyOrder->item_type)))selected @endif>OPC</option>
                                <option value="src" @if(in_array('src',json_decode($dailyOrder->item_type)))selected @endif >SRC</option>
                                 <option value="composite" @if(in_array('composite',json_decode($dailyOrder->item_type)))selected @endif >Composite</option>
                            
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-form-label"> Brand</label>
                            <select class="select-multiple brand-select form-control" name="brand[]" required multiple>
                                <option value="">Please Select Brand </option>
                                <option class="power-brand" value="Power Cement" @if(in_array('Power Cement',json_decode($dailyOrder->brand))) selected @endif>Power Cement</option>
                                <option class="power-brand" value="Black Bull" @if(in_array('Black Bull',json_decode($dailyOrder->brand))) selected @endif>Black Bull</option>
                                 <option class="power-brand" value="Qila" @if(in_array('Qila',json_decode($dailyOrder->brand))) selected @endif>Qila</option>

                                  <option class="lucky-brand" value="Lucky OPC" @if(in_array('Lucky OPC',json_decode($dailyOrder->brand))) selected @endif>Lucky OPC</option>
                                   <option class="lucky-brand" value="Lucky SRC" @if(in_array('Lucky SRC',json_decode($dailyOrder->brand))) selected @endif>Lucky SRC</option>
                                    <option class="lucky-brand" value="Lucky Raj" @if(in_array('Lucky Raj',json_decode($dailyOrder->brand))) selected @endif>Lucky Raj</option>
                            
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="brand-quantity">
                                <label class="col-form-label">Quantity</label>
                                @foreach(json_decode($dailyOrder->quantity) as $quantity)
                                <input type="text" class="form-control mb-3" name="quantity[]" value="{{$quantity}}"/>
                                @endforeach
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-form-label">Rate Per Ton</label>
                           <input type="text"  class="form-control noofbags" value="{{$dailyOrder->rate_per_ton}}" name="rate_per_ton" required />
                        </div>
                          <div class="form-group">
                            <label class="col-form-label">Additional Charges</label>
                           <input type="text"  class="form-control noofbags" value="{{$dailyOrder->additional_charges}}" name="additional_charges" required />
                        </div>

                        <div class="form-group">
                            <label class="col-form-label"> Status</label>
                            <select class="form-control" name="status" required>
                                <option value="">Please Select Status </option>
                                <option value="pending" @if($dailyOrder->status =="pending")selected @endif>Pending</option>
                                <option value="delivered"@if($dailyOrder->status =="delivered")selected @endif >Delivered</option>
                                 <option value="cancelled" @if($dailyOrder->status =="cancelled")selected @endif>Cancelled</option>
                            
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

$(document).ready(function(){
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
})

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

        
$(function () {
    $('.select-multiple').selectpicker();
    
});

})

$('.destination').tagsinput({
  confirmKeys: [13, 44],
  trimValue: true

});

$(function () {
    $('.select-multiple').selectpicker();
    
});

$('.brand-select').on('change',function(){
   var name = $(this).val()
   var div ='<label class="col-form-label">Quantity</label>'
    name.forEach(brand => {
        div +=  `<input type="text"  class="form-control mb-3" name="quantity[]"  value='${brand} - ' required />`
    });
    $('.brand-quantity').html(div)
})







</script>
@endsection
