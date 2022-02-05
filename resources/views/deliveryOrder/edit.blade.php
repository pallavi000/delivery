@extends('layouts.sidebar')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.css">
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
<span class="text">Delivery Order</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit DeliveryOrder</h4>
                    <div class="float-right">
                        <a href="{{route('delivery-order.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('delivery-order.update',$deliveryOrder->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label"> Company</label>
                                    <select class="form-control company-select" name="company_id" required>
                                        <option value="">Please Select Type </option>
                                        @foreach($companies as $company)
                                        <option comp="{{$company->name}}" value="{{$company->id}}" @if($deliveryOrder->
                                            company->id== $company->id) selected @endif>{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Date</label>
                                    <input type="text" class="form-control" value="{{$deliveryOrder->created_at}}"
                                        readonly />
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">DO Number</label>
                            <input type="number" class="form-control" name="do_number"
                                value="{{$deliveryOrder->do_number}}" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Dealer</label>
                            <select class="form-control dealer-select" name="dealer_id" required>
                                <option value="">Please Select Dealer</option>
                                @foreach($dealers as $dealer)

                                <option class="{{strtolower($dealer->company->name)}}-option" value="{{$dealer->id}}"
                                    @if($deliveryOrder->dealer->id== $dealer->id) selected @endif>{{$dealer->name}}
                                </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Item Type</label>
                            <select class="form-control" name="item_type" required>
                                <option value="">Please Select Type </option>
                                <option value="opc" @if($deliveryOrder->item_type=="opc") selected @endif>OPC</option>
                                <option value="src" @if($deliveryOrder->item_type=="src") selected @endif>SRC</option>
                                <option value="composite" @if($deliveryOrder->item_type=="composite") selected
                                    @endif>Composite</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label"> Brand</label>
                                    <select class="form-control" name="brand" required>
                                        <option value="">Please Select Brand </option>
                                        <option class="power-brand" value="Power Cement" @if($deliveryOrder->
                                            brand=="Power
                                            Cement") selected @endif>Power Cement</option>
                                        <option class="power-brand" value="Black Bull" @if($deliveryOrder->brand=="Black
                                            Bull")
                                            selected @endif>Black Bull</option>
                                        <option class="power-brand" value="Qila" @if($deliveryOrder->brand=="Qila")
                                            selected
                                            @endif>Qila</option>

                                        <option class="lucky-brand" value="Lucky OPC" @if($deliveryOrder->brand=="Lucky
                                            OPC")
                                            selected @endif>Lucky OPC</option>
                                        <option class="lucky-brand" value="Lucky SRC" @if($deliveryOrder->brand=="Lucky
                                            SRC")
                                            selected @endif>Lucky SRC</option>
                                        <option class="lucky-brand" value="Lucky Raj" @if($deliveryOrder->brand=="Lucky
                                            Raj")
                                            selected @endif>Lucky Raj</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Quantity</label>
                                    <select class="form-control quantity-select" name="quantity" required>
                                        <option value="">Please Select Quantity </option>
                                        <option value="1" @if($deliveryOrder->quantity=="1") selected @endif>1</option>
                                        <option value="2" @if($deliveryOrder->quantity=="2") selected @endif>2</option>
                                        <option value="3" @if($deliveryOrder->quantity=="3") selected @endif>3</option>
                                        <option value="5" @if($deliveryOrder->quantity=="5") selected @endif>5</option>
                                        <option value="5.5" @if($deliveryOrder->quantity=="5.5") selected @endif>5.5
                                        </option>
                                        <option value="10" @if($deliveryOrder->quantity=="10") selected @endif>10
                                        </option>
                                        <option value="11" @if($deliveryOrder->quantity=="11") selected @endif>11
                                        </option>
                                        <option value="15" @if($deliveryOrder->quantity=="15") selected @endif>15
                                        </option>
                                        <option value="20" @if($deliveryOrder->quantity=="20") selected @endif >20
                                        </option>
                                        <option value="30" @if($deliveryOrder->quantity=="30") selected @endif>30
                                        </option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Zone</label>
                                    <input type="text" class="form-control" name="zone" value="{{$deliveryOrder->zone}}"
                                        required />
                                </div>

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">No Of Bags</label>
                                    <input type="text" class="form-control noofbags"
                                        value="{{$deliveryOrder->noofbags}}" name="noofbags" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Packing Type</label>
                                    <select class="form-control" name="packing_type" required>
                                        <option value="">Please Select Packing Type </option>
                                        <option value="paper_bags" @if($deliveryOrder->packing_type=="paper_bags")
                                            selected
                                            @endif>Paper Bags</option>
                                        <option value="pp" @if($deliveryOrder->packing_type=="pp") selected @endif>PP
                                        </option>


                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Expire Date</label>
                                    <input type="text" id="datepicker" value="{{$deliveryOrder->expire_date}}"
                                        class="form-control" name="expire_date" required />
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


<script>

    $(document).ready(function () {
        var name = $('.company-select  option:selected').attr('comp').toLowerCase()
        $('.dealer-select option').hide()
        $('.' + name + '-option').show();

        if (name == "lucky") {
            $('.power-brand').hide()
            $('.lucky-brand').show()
        } else {
            $('.power-brand').show()
            $('.lucky-brand').hide()
        }

    })


    $('.company-select').on('change', function () {
        var name = $('.company-select  option:selected').attr('comp').toLowerCase()
        $('.dealer-select option').hide()
        $('.' + name + '-option').show();

        if (name == "lucky") {
            $('.power-brand').hide()
            $('.lucky-brand').show()
        } else {
            $('.power-brand').show()
            $('.lucky-brand').hide()
        }



    })


    $('.quantity-select').on('change', function () {
        var quantity = $(this).val()
        var bags = quantity * 20
        $('.noofbags').val(bags)
    })

    $(function () {
        $("#datepicker").datetimepicker();
    });


</script>
@endsection