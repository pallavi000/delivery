@extends('layouts.sidebar')

@section('content')

<span class="text">Dealer</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Dealer</h4>
                    <div class="float-right">
                        <a href="{{route('dealer.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('dealer.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Contact</label>
                            <input type="text" class="form-control" name="contact" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Email</label>
                             <input type="email" class="form-control" name="email" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">Address</label>
                             <input type="text" class="form-control" name="address" required/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NTN</label>
                           <input type="text" class="form-control" name="ntn" required/>
                        </div>
                         <div class="form-group">
                            <label class="col-form-label">STRN</label>
                             <input type="text" class="form-control" name="strn" required/>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Company</label>
                            <select id="combo" class="form-control company_name"  name="company_id" required>
                                <option value="">Please Select Type </option>
                                @foreach($companies as $company)
                                <option comp="{{$company->name}}" value="{{$company->id}}" >{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="picture" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                </div>
                        </div>

                        <div class="power">
                           
                        </div>


                        

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('.company_name').on('change',function(e){
    var name = $('.company_name option:selected').attr('comp')
    name = name.toLowerCase();
    if(name=='lucky'){
       var div =  ` <div class="form-group">
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
    }else{
         var div =  ` <div class="form-group">
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


    
    </script>


@endsection


