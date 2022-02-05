@extends('layouts.sidebar')

@section('content')

<span class="text">Company</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit Company</h4>
                    <div class="float-right">
                        <a href="{{route('company.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('company.update',$company->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Company Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$company->name}}"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$company->email}}"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">FAX</label>
                                    <input type="text" class="form-control" name="fax" value="{{$company->fax}}"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Phone NO.</label>
                                    <input type="text" class="form-control" name="phone" value="{{$company->phone}}"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Office Address</label>
                                    <input type="text" class="form-control" value="{{$company->office_address}}"
                                        name="office_address" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Office Location</label>
                                    <input type="text" class="form-control" name="office_location"
                                        value="{{$company->office_location}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Factory Address</label>
                                    <input type="text" class="form-control" name="factory_address"
                                        value="{{$company->factory_address}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Factory Location</label>
                                    <input type="text" class="form-control" name="factory_location"
                                        value="{{$company->factory_location}}" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">NTN</label>
                                    <input type="text" class="form-control" name="ntn" value="{{$company->ntn}}"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">STRN</label>
                                    <input type="text" class="form-control" name="strn" value="{{$company->strn}}"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <label>Bank Details</label>
                            <div class="float-right">
                                <div class="btn btn-success addBank d-flex align-items-center"><i
                                        class='bx bx-plus-medical'></i></div>
                            </div>
                            @foreach($company->bank as $key=>$bank)
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" value="{{$bank->title}}" name="title[]"
                                        required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Account NO/IBAN</label>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

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





</script>
@endsection