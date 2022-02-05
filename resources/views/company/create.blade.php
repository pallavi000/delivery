@extends('layouts.sidebar')

@section('content')

<span class="text">Company</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Company</h4>
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


                    <form method="POST" action="{{route('company.store')}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Company Name</label>
                                    <input type="text" class="form-control" name="name" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">FAX</label>
                                    <input type="text" class="form-control" name="fax" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Phone NO.</label>
                                    <input type="text" class="form-control" name="phone" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Office Address</label>
                                    <input type="text" class="form-control" name="office_address" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Office Location</label>
                                    <input type="text" class="form-control" name="office_location" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Factory Address</label>
                                    <input type="text" class="form-control" name="factory_address" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Factory Location</label>
                                    <input type="text" class="form-control" name="factory_location" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">NTN</label>
                                    <input type="text" class="form-control" name="ntn" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">STRN</label>
                                    <input type="text" class="form-control" name="strn" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label>Bank Details</label>
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" name="title[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Account NO/IBAN</label>
                                    <input type="text" class="form-control" name="account_no[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Bank</label>
                                    <input type="text" class="form-control" name="bank[]" required />
                                </div>
                                <div class="col addBank"><i class="bx bx-plus-medical"></i></div>
                            </div>
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
                             <div class="col removeBank"><i class="bx bxs-minus-circle"></i></div>

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