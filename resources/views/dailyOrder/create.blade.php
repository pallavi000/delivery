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
                            <select class="form-control company-select select-search"  name="company_id" required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option comp="{{$company->name}}" value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    
                            <label class="col-form-label">Dealer</label>
                            <select class="form-control dealer-select select-search" name="dealer_id" required>
                                <option value="">Please Select Dealer</option>
                                @foreach($dealers as $dealer)
                               
                                  <option class="{{strtolower($dealer->company->name)}}-option" value="{{$dealer->id}}">{{$dealer->name}}</option>
                              
                                @endforeach
                            </select>
                                </div>
                                <div class="col">
                                     <label class="col-form-label">Receiver</label>
                                     <select class="form-control select-search" name="receiver" required>
                                    <option value="">Please Select Receiver</option>
                                     @foreach($receivers as $receiver)
                                     <option value="{{$receiver->id}}">{{$receiver->name}}</option>
                                     @endforeach
                                     </select>
                       
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-form-label">Destination (Add Multiple | separeted by coma(,) i.e. (abc, xyz) or Hit Enter)</label>
                           <input type="text"   class="form-control destination "  data-role="tagsinput" name="destination" required />
                        </div>



                        <div class="form-group">
                            <label class="col-form-label"> Item Type</label>
                            <select class=" select-multiple  form-control"  data-role="select-dropdown"  name="item_type[]" required multiple>
                                <option value="opc">OPC</option>
                                <option value="src">SRC</option>
                                 <option value="composite">Composite</option>
                            
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-form-label"> Brand</label>
                            <select class="select-multiple form-control brand-select" name="brand[]" required multiple>
                                <option class="power-brand" value="Power Cement">Power Cement</option>
                                <option class="power-brand" value="Black Bull">Black Bull</option>
                                 <option class="power-brand" value="Qila">Qila</option>

                                  <option class="lucky-brand" value="Lucky OPC">Lucky OPC</option>
                                   <option class="lucky-brand" value="Lucky SRC">Lucky SRC</option>
                                    <option class="lucky-brand" value="Lucky Raj">Lucky Raj</option>
                            
                            </select>
                        </div>

                        <div class="form-group">
                                <div class="brand-quantity">
                                </div>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Rate Per Ton</label>
                           <input type="text"  class="form-control noofbags" name="rate_per_ton" required />
                        </div>
                          <div class="form-group">
                            <label class="col-form-label">Additional Charges</label>
                           <input type="text"  class="form-control noofbags" name="additional_charges" required />
                        </div>

                        <div class="form-group row">
                            <div class="col">
                            <label class="col-form-label"> Status</label>
                            <select class="form-control" name="status" required>
                                <option value="">Please Select Status </option>
                                <option value="pending" selected>Pending</option>
                                <option value="delivered">Delivered</option>
                                 <option value="cancelled">Cancelled</option>
                            
                            </select>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Permission</label>
                                <select class="form-control select-multiple" multiple name="permission[]" required>
                                    <option value="0">Everyone</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
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
$('.company-select').on('change',function(){
    


    var name = $('.company-select  option:selected').attr('comp').toLowerCase()
    $('.dealer-select option').hide()
    $('.'+name+'-option').show();

    if(name=="lucky"){
        $('.lucky-brand').show()
        $('.power-brand').hide()
        
    }else{
    $('.power-brand').show()
        $('.lucky-brand').hide()
    }

    $(function () {
        $('.select-multiple').selectpicker({
            liveSearch: true,
        }); 
    });

})

$('.destination').tagsinput({
  confirmKeys: [13, 44],
  trimValue: true
});

$(function () {
    $('.select-multiple').selectpicker({
        liveSearch: true,
    });
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
