@extends('layouts.sidebar')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<span class="text">Dealer</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit Dealer</h4>
                    <div class="float-right">
                        <a href="{{route('dealer.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('dealer.update',$dealer->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" value="{{$dealer->name}}" name="name"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" value="{{$dealer->email}}" name="email"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Fax</label>
                                    <input type="text" value="{{$dealer->fax}}" class="form-control" name="fax"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Phone No</label>
                                    <input type="text" value="{{$dealer->contact}}" class="form-control" name="phone"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Office Address</label>
                                    <input type="text" value="{{$dealer->address}}" class="form-control" name="address"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Contact Person</label>
                                    <input type="text" value="{{$dealer->contact_person}}" class="form-control"
                                        name="contact_person" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Zone</label>
                                    <select class="form-control zone" name="zone" required>
                                        <option value="">Please Select Zone</option>
                                    @foreach($destinations as $destination)
                                    <option value="{{$destination->zone}}" @if($destination->zone==$dealer->zone) selected @endif>{{$destination->zone}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Area</label>
                                    <select class="form-control area" name="area" required>
                                        <option value="">Please Select Area</option>
                                    @foreach($destinations as $destination)
                                    <option value="{{$destination->area}}" @if($destination->area==$dealer->area) selected @endif>{{$destination->area}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="col-form-label">Company</label>
                                        <select id="combo" class="form-control company_name" name="company_id" required>
                                            <option value="">Please Select Type </option>
                                            @foreach($companies as $company)
                                            <option comp="{{$company->name}}" value="{{$company->id}}" @if($dealer->
                                                company_id==$company->id) selected @endif >{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">NTN</label>
                                    <input type="text" value="{{$dealer->ntn}}" class="form-control" name="ntn"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">STRN</label>
                                    <input type="text" value="{{$dealer->strn}}" class="form-control" name="strn"
                                        required />
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>


                        <div class="power">
                            @if(strtolower($dealer->company->name)=="lucky")
                            <div class="form-group">
                                <label class="col-form-label">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name"
                                    value="{{$dealer->customer_name}}" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Customer Number</label>
                                <input type="text" class="form-control" name="customer_number"
                                    value="{{$dealer->customer_number}}" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sales Group</label>
                                <input type="text" class="form-control" name="sales_group"
                                    value="{{$dealer->sales_group}}" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sales District</label>
                                <input type="text" class="form-control" name="sales_district"
                                    value="{{$dealer->sales_district}}" required />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Customer Address</label>
                                <input type="text" class="form-control" name="customer_address"
                                    value="{{$dealer->customer_address}}" required />
                            </div>
                            @else

                            <div class="form-group">
                                <label class="col-form-label">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name"
                                    value="{{$dealer->customer_name}}" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Customer Number</label>
                                <input type="text" class="form-control" name="customer_number"
                                    value="{{$dealer->customer_number}}" required />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Customer Territory</label>
                                <input type="text" class="form-control" name="customer_territory"
                                    value="{{$dealer->customer_territory}}" required />
                            </div>
                            @endif
                        </div>

                        <div class="form-group mt-5">
                            <label>Bank Details</label>
                            <div class="float-right">
                                <div class="btn btn-success addBank d-flex align-items-center"><i
                                        class='bx bx-plus-medical'></i></div>
                            </div>


                            @foreach($dealer->bank as $key=>$bank)
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" value="{{$bank->title}}" name="title[]"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Account No/IBAN</label>
                                    <input type="text" class="form-control" name="account_no[]"
                                        value="{{$bank->account_no}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Bank</label>
                                    <input type="text" class="form-control" name="bank[]" value="{{$bank->bank}}"
                                        required />
                                </div>
                                <div class="col"></div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group newbank"></div>




                        <button class="btn btn-primary">Submit</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>

    $('.company_name').on('change', function (e) {
        var name = $('.company_name option:selected').attr('comp')
        name = name.toLowerCase();
        if (name == 'lucky') {
            var div = ` <div class="form-group">
                        <label class="col-form-label">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" required/>
                        </div>
                         <div class="form-group">
                        <label class="col-form-label">Customer Number</label>
                            <input type="text" class="form-control" name="customer_number" required/>
                        </div>
                         <div class="form-group">
                        <label class="col-form-label">Sales Group</label>
                            <input type="text" class="form-control" name="sales_group" required/>
                        </div>
                         <div class="form-group">
                        <label class="col-form-label">Sales District</label>
                            <input type="text" class="form-control" name="sales_district" required/>
                        </div>

                         <div class="form-group">
                        <label class="col-form-label">Customer Address</label>
                            <input type="text" class="form-control" name="customer_address" required/>
                        </div>
                        
                        `
            $('.power').html(div)
        } else {
            var div = ` <div class="form-group">
                        <label class="col-form-label">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" required/>
                        </div>
                         <div class="form-group">
                        <label class="col-form-label">Customer Number</label>
                            <input type="text" class="form-control" name="customer_number" required/>
                        </div>
                    
                         <div class="form-group">
                        <label class="col-form-label">Customer Territory</label>
                            <input type="text" class="form-control" name="customer_territory" required/>
                        </div>
                        
                        `
            $('.power').html(div)


        }
    })

    $('.addBank').on('click', function () {
        var column = `
                              
                        <div class="row align-items-center ">
                                 <div class="col">
                            <label class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title[]"  required/>
                                 </div>
                                  <div class="col">
                            <label class="col-form-label">Account NO/IBAN</label>
                            <input type="text" class="form-control" name="account_no[]" required/>
                                 </div>
                                 <div class="col">
                            <label class="col-form-label" >Bank</label>
                            <input type="text" class="form-control" name="bank[]" required/>
                                 </div>
                             <div class="col removeBank">
                                <label class="col-form-label"></label>
                                <div class=" btn btn-danger d-block" style="width:fit-content">
                                    <i class='bx bx-x'></i>
                                </div>
                            </div>

                            </div>
                                 </div>
                        </div>
                            `
        document.querySelector('.newbank').innerHTML += column

        $('.removeBank').on('click', function (e) {
            $(e.currentTarget).parent().remove()
        })

    })

      $(document).ready(function() {
        $('.zone').select2();
    });
    $(document).ready(function() {
        $('.area').select2();
    });



</script>


@endsection