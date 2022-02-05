@extends('layouts.sidebar')

@section('content')




  

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



<span class="text">Invoice</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Invoice</h4>
                    <div class="float-right">
                        <a href="{{route('invoice.index')}}" class="btn btn-primary">Go Back</a>
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

                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Sign Up Your User Account</strong></h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="{{route('invoice.store')}}" method="POST">
                                    @csrf
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>Account</strong></li>
                                        <li id="personal"><strong>Personal</strong></li>
                                    </ul>

                                    <div class="card">
                                        <div class="card-body">

                                            <fieldset>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Daily Order</label>
                                                    <select class="form-control select-multiple dailyorder" data-role="select-dropdown" name="daily_order_id[]"  multiple required>
                                                        @foreach($dailyOrders as $daily)
                                                        <option weight="{{$daily->quantity}}" company_id="{{$daily->company->id}}" company_name="{{$daily->company->name}}" destination="{{$daily->destination}}" value="{{$daily->id}}">{{$daily->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Delivery Order</label>
                                                    <select class="form-control select-multiple deliveryorder" data-role="select-dropdown" name="delivery_order_id[]" multiple required>
                                                        @foreach($deliveryOrders as $delivery)
                                                        <option weight="{{$delivery->quantity}}" company_id="{{$delivery->company->id}}"
                                                            company_name="{{$delivery->company->name}}"  value="{{$delivery->id}}">{{$delivery->do_number}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Delivery Order Weight</label>
                                                    <input type="text" name="delivery_order_weight" value="" required readonly class="form-control"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Daily Order Weight</label>
                                                    <input type="text" name="daily_order_weight" value="" required readonly class="form-control"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Total  Weight</label>
                                                    <input type="text" name="total_weight" value="" required readonly class="form-control"/>
                                                </div>


                                                <input type="button" name="next"
                                                    class="next action-button btn btn-primary" value="Next Step" />
                                            </fieldset>




                                            <fieldset>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Company</label>
                                                    <div class="company-select-div"></div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Destination</label>
                                                    <div class="destination-select-div"></div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Vehicle</label>
                                                    <select class="form-control vehicle-select" name="vehicle_id">
                                                        <option value="">Select A Vehicle</option>
                                                        @foreach($vehicles  as $vehicle)
                                                        <option value="{{$vehicle->id}}">{{$vehicle->vehicle_no}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Driver</label>
                                                    <select class="form-control driver-select" name="driver_id">
                                                        <option value="">Select A Driver</option>
                                                        @foreach($drivers  as $driver)
                                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Receiver </label>
                                                    <input type="text" class="form-control" name="receiver"/>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Commission</label>
                                                    <input type="text" class="form-control" name="commission"/>
                                                </div>


                                                
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous btn btn-secondary"
                                                    value="Previous" />
                                                <button class="btn btn-primary">Submit</button>
                                            </fieldset>


                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var daily_order_weight = 0;
    var delivery_order_weight= 0;
    var total_weight = 0;
    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 600
            });
        });

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({ 'opacity': opacity });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function () {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function () {
            return false;
        })

        $(function () {
            $('.select-multiple').selectpicker();
        });
       
        $('.vehicle-select').select2({
            width: '100%',
            placeholder: "Select A Vehicle"
        });
        $('.driver-select').select2({
             width: '100%',
             placeholder: "Select A Driver"
        });

    });

 

    $('.dailyorder').on('change',function(){
        var ids = $(this).val()
        daily_order_weight = 0
        
        var company_div ='<select class="form-control select-multiple" name="company_id[]" multiple required>'
        var destination_div = `<select class="form-control select-multiple" name="destination[]" multiple required>`
        ids.map(id=>{
            var option = $(`.dailyorder option[value=${id}]`)
            var attr = $(option).attr('weight')
            var company_name=$(option).attr('company_name')
            var company_id=$(option).attr('company_id')
            company_div += `<option value=${company_id} selected>${company_name}</option>`
            var destinations = $(option).attr('destination')
            destinations = JSON.parse(destinations)
            destinations.map(destination=>{
                destination_div += `<option value=${destination} selected>${destination}</option>`
            })
            attr = JSON.parse(attr)
            attr.map(weight=>{
                var arr= weight.split('-')
                var qty = Number(arr[1].trim())
                daily_order_weight += qty
            })
            
        })
        company_div += '</select>'
        destination_div += '</select>'

        $('.company-select-div').html(company_div)
        $('.destination-select-div').html(destination_div)
        

        $('input[name="daily_order_weight"]').val(daily_order_weight)
        total_weight = daily_order_weight+delivery_order_weight
        $('input[name="total_weight"]').val(total_weight)
        $('.select-multiple').selectpicker()
    })

    $('.deliveryorder').on('change',function(){
        var ids = $(this).val()
        delivery_order_weight=0
        ids.map(id=>{
            var option = $(`.deliveryorder option[value= ${id}]`)
            var qty = Number($(option).attr('weight'))
            delivery_order_weight+= qty

        })

        $('input[name="delivery_order_weight"]').val(delivery_order_weight)
        total_weight = delivery_order_weight+daily_order_weight
         $('input[name="total_weight"]').val(total_weight)

       
    })




</script>
@endsection