@extends('layouts.sidebar')

@section('content')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



<div class="modal fade invoice" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal"  aria-label="Close" data-original-title=""
                        title=""><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex">

                            <div class="card card-table flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Create Invoice</h4>
                                </div>
                                <div class="card-body" style="margin:15px;">
                                <form method="POST" action="{{route('invoice.store')}}">
                                    @csrf
                                    @method('POST')
                                    <div class="invoice-first-page">
                                    <div class="form-group">
                                        <label class="col-form-label">Select Delivery Order</label>
                                        <select class="form-control select-multiple select-multiple-delivery"  multiple>
                                            @foreach($deliveryOrders as $order)
                                            <option multiorder="{{$order->do_number}}" value="{{$order}}">{{$order->do_number}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Select Vehicle</label>
                                        <select class="form-control select-multiple" name="vehicle_id[]"  multiple>
                                            @foreach($vehicles as $vehicle)
                                            <option  value="{{$vehicle->id}}">{{$vehicle->vehicle_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Select Driver</label>
                                        <select class="form-control select-multiple" name="driver_id[]"  multiple>
                                            @foreach($drivers as $driver)
                                            <option  value="{{$driver->id}}">{{$driver->mobile}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary next-invoice-btn" type="button">Next</button>
                                    </div>

                                    <div class="invoice-second-page " style="display: none">
                                        <div class="form-group row">
                                            <div class="col">
                                            <label class="col-form-label">E.R.P.T</label>
                                            <input class="form-control calculate" type="number" name="erpt"/>
                                            </div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col">
                                            <label class="col-form-label">A.R.P.T</label>
                                            <input class="form-control calculate" type="number" name="arpt"/>
                                            </div>
                                            <div class="col">
                                            <label class="col-form-label">C.P.T</label>
                                            <input class="form-control calculate" type="number" name="cpt"/>
                                            </div>
                                            <div class="col">
                                            <label class="col-form-label">O.P.T</label>
                                            <input class="form-control calculate" type="number"name="opt"/>
                                            </div>
                                            <div class="col">
                                            <label class="col-form-label">Total quantity</label>
                                            <input class="form-control total_quantity calculate" type="number" name="total_quantity"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                             <div class="col">
                                            <label class="col-form-label">Fixed Commission</label>
                                            <input class="form-control" name="fixed_commission"/>
                                            </div>
                                            <div class="col">
                                            <label class="col-form-label">O.F.C </label>
                                            <input class="form-control calculate" type="number" name="ofc"/>
                                            </div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                        </div>
                                  
                                        <div class="form-group row">
                                            <div class="col">
                                            <label class="col-form-label">Advance Freight</label>
                                            <input class="form-control calculate" type="number" name="advance_freight"/>
                                            </div>
                                            <div class="col">
                                            <label class="col-form-label">Balance Freight</label>
                                            <input class="form-control balance_freight" name="balance_freight"/>
                                            </div>
                                            <div class="col">

                                            <label class="col-form-label">Total Freight</label>
                                            <input class="form-control total_freight" name="total_freight"/>
                                            </div>
                                            <div class="col"></div>
                                        </div>


                                        <input type="hidden" class="deliveryOrder_ids" name="deliveryOrder_ids" />
                                        <input type="hidden" class="dailyOrder_ids" name="dailyOrder_ids" />
                                        <input type="hidden" class="dailyOrder_weight" name="dailyOrder_weight" />
                                        <input type="hidden" class="deliveryOrder_weight" name="deliveryOrder_weight" />
                                        <input type="hidden" class="total_weight" name="total_weight" />
                                        <input type="hidden" class="destination" name="destination" />

                                        <button class="btn btn-primary" type="submit">Submit</button>
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



<span class="text">Daily Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Daily Order List</h4>
                    <div class="float-right">
                        <a href="{{route('vehicle.index')}}" class="btn btn-primary mr-2">Add DLV</a>
                        <a href="{{route('dlv.show')}}" class="btn btn-primary mr-2">Show DLV</a>
                        <a href="{{route('daily-order.create')}}" class="btn btn-primary">Add Daily Order</a>
                        <button class="btn btn-primary create-invoice" data-toggle="modal" data-target=".invoice" >Create Invoice</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible "><b>Error </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible"><b>Success </b>
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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Company</th>
                                    <th>Dealer</th>
                                     <th>Destination</th>
                                     <th>Item Type</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                   <th>Rate Per Ton</th>
                                   <th>Additional Charges</th>
                                   <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyOrders as $dailyOrder)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-control multi-order" order="{{$dailyOrder}}">
                                    </td>
                                    <td>{{$dailyOrder->order_number}}</td>
                                     <td>{{$dailyOrder->date}}</td>
                                    <td>{{$dailyOrder->company->name}}</td>
                                    <td class="text-nowrap">{{$dailyOrder->dealer->name}}</td>
                                    <td><ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($dailyOrder->destination ) as $key => $destination)
                                            <li> {{$destination}}</li>
                                        @endforeach
                                    </ul> 
                                    </td>
                                    <td><ul  class="ml-3 text-nowrap ">
                                        @foreach(json_decode($dailyOrder->item_type ) as $key => $item_type)
                                            <li> {{$item_type}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td><ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($dailyOrder->brand ) as $key => $brand)
                                            <li> {{$brand}}</li>
                                        @endforeach
                                    </ul> </td>
                                    <td><ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($dailyOrder->quantity ) as $key => $quantity)
                                            <li> {{$quantity}}</li>
                                        @endforeach
                                    </ul></td>
                                    <td>{{$dailyOrder->rate_per_ton}}</td>
                                    <td>{{$dailyOrder->additional_charges}}</td>
                                    <td>{{$dailyOrder->status}}</td>
                                 
                                   
                                    <td class="d-flex">
                                        <a href="{{route('daily-order.edit',$dailyOrder->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('daily-order.destroy',$dailyOrder->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dailyOrder_ids = [ ];
    var deliveryOrder_ids = [];
    var dailyOrderQuantity = 0;
    var deliveryOrderQuantity = 0;

    var daily_order_weight = 0;
    var delivery_order_weight= 0;
    var total_weight = 0;



        $(function () {
        $('.select-multiple').selectpicker(); 
    });

    $('.next-invoice-btn').on('click',function(){
        if(dailyOrderQuantity<deliveryOrderQuantity){
            alert(`Delivery order quantity (${deliveryOrderQuantity}) must be less than daily order quanity (${dailyOrderQuantity})`)
            return false

        }
        var select = $('.select-multiple option:selected').attr('value')
       console.log(select)
        $('.invoice-first-page').hide();
        $('.invoice-second-page').show();
    })


    $('.select-multiple-delivery').on('change', function(){
       
        var orders = $(this).val()
        deliveryOrderQuantity= 0
        delivery_order_weight = 0
        deliveryOrder_ids=[]
        orders.map(order=>{
            var order= JSON.parse(order)
            deliveryOrderQuantity += order.quantity
            deliveryOrder_ids.push(order.id)
            delivery_order_weight+= order.quantity
        })
        

        total_weight = daily_order_weight+delivery_order_weight
        $('.deliveryOrder_weight').val(delivery_order_weight)
        $('.dailyOrder_weight').val(daily_order_weight)
        $('.total_weight').val(total_weight)

        $('.total_quantity').val(deliveryOrderQuantity)
        $('.deliveryOrder_ids').val(deliveryOrder_ids)
         
        console.log(deliveryOrderQuantity)
        console.log(deliveryOrder_ids)
    })

    $('.create-invoice').on('click',function(){
        var checks = $('.multi-order:checkbox:checked')
        if (checks.length > 0) {
           dailyOrderQuantity = 0
           dailyOrder_ids=[]
           daily_order_weight=0
           var destination_all = []
            $('.multi-order:checkbox:checked').each(function () {
                var order= JSON.parse($(this).attr('order'))
                dailyOrder_ids.push(order.id)
                
                console.log(order)
                var quantity = JSON.parse(order.quantity)
                var destinations = JSON.parse(order.destination)
                    destination_all = [...destination_all,...destinations]


                quantity.map(weight=>{
                    var arr= weight.split('-')
                    var qty = Number(arr[1].trim())
                    daily_order_weight += qty
                    dailyOrderQuantity += qty
                })
            });
            total_weight = daily_order_weight+delivery_order_weight
            $('.deliveryOrder_weight').val(delivery_order_weight)
            $('.dailyOrder_weight').val(daily_order_weight)
            $('.total_weight').val(total_weight)

            $('.dailyOrder_ids').val(dailyOrder_ids)
            $('.destination').val(destination_all)
            // $('.multi-dlv-ids').val(vehicle_ids)
        } else {
            alert("Please Select Daily Order")
            return false
        }
    })

    $('.calculate').on('change',function(){
        var arpt = Number($('input[name="arpt"]').val())
        var cpt =  Number($('input[name="cpt"]').val())
        var opt =  Number($('input[name="opt"]').val())
        var total_quantity =  Number($('input[name="total_quantity"]').val())
        var ofc =  Number($('input[name="ofc"]').val())
        var advance_freight =  Number($('input[name="advance_freight"]').val())
       
       var total = (arpt*total_quantity)+(cpt*total_quantity)+(opt*total_quantity)+ofc
       $('.total_freight').val(total)
        $('.balance_freight').val(total-advance_freight)

    })
    

    </script>


@endsection