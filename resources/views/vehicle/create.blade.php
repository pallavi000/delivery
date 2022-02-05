@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 0px 5px;
        font-size: 18px;
        color: #444;
        transition: all .2s;
        margin: 0;
        cursor: pointer;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>


<span class="text">Vehicle</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add Vehicle</h4>
                    <div class="float-right">
                        <a href="{{route('vehicle.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('vehicle.store')}}">
                        @csrf
                        <div class="form-group">
                            <h4 class="text-secondary font-weight-bold mx-0">Vehicle Details</h4>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Vehicle No</label>
                                        <input type="text" class="form-control" name="vehicle_no" required />
                                    </div>

                                    <div class="col">
                                        <label class="col-form-label">Registration City</label>
                                        <input type="text" class="form-control" name="registration_city" required />
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label">Type</label>
                                        <select class="form-control" name="type" required>
                                            <option value="">Please Select Type </option>
                                            <option value="6-wheeler">6 Wheeler</option>
                                            <option value="8-wheeler">8 Wheeler</option>
                                            <option value="10-wheeler">10 Wheeler</option>
                                            <option value="12-wheeler">12 Wheeler</option>
                                            <option value="18-wheeler">18 Wheeler</option>
                                            <option value="20-wheeler">20 Wheeler</option>
                                            <option value="22-wheeler">22 Wheeler</option>
                                            <option value="24-wheeler">24 Wheeler</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label"> Body Type</label>
                                        <select class="form-control" name="body_type" required>
                                            <option value="">Please Select Type </option>
                                            <option value="floor">Floor</option>
                                            <option value="box">Box</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Loading Capacity</label>
                                        <input type="text" class="form-control" name="capacity" required />
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label d-flex align-items-center">
                                            Intentions
                                            <div class="col addIntentions">
                                                <label class="col-form-label"></label>
                                                <i class='btn btn-success btn-sm bx bx-plus-medical'></i>
                                            </div>
                                        </label>

                                        <input type=" text" class="form-control" name="intentions[]" required />
                                    </div>
                                </div>
                                <div class="row extra-intentions">

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <h4 class="text-secondary font-weight-bold mx-0">Owner Details</h4>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Owner Name</label>
                                        <input type=" text" class="form-control" name="owner_name" required />
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label">Owner Number</label>
                                        <input type=" text" class="form-control" name="owner_number" required />
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex align-items-center">
                                    <div class="col-form-label">Reliable</div>
                                    <div class="ml-5">
                                        <input class="star star-5" value="5" id="reliable-5" type="radio"
                                            name="reliable" />
                                        <label class="star star-5" for="reliable-5"></label>
                                        <input class="star star-4" value="4" id="reliable-4" type="radio"
                                            name="reliable" />
                                        <label class="star star-4" for="reliable-4"></label>
                                        <input class="star star-3" value="3" id="reliable-3" type="radio"
                                            name="reliable" />
                                        <label class="star star-3" for="reliable-3"></label>
                                        <input class="star star-2" value="2" id="reliable-2" type="radio"
                                            name="reliable" />
                                        <label class="star star-2" for="reliable-2"></label>
                                        <input class="star star-1" value="1" id="reliable-1" type="radio"
                                            name="reliable" />
                                        <label class="star star-1" for="reliable-1"></label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col-form-label">Punctuality</div>
                                    <div class="ml-4">
                                        <input class="star star-5" value="5" id="punctuality-5" type="radio"
                                            name="punctuality" />
                                        <label class="star star-5" for="punctuality-5"></label>
                                        <input class="star star-4" value="4" id="punctuality-4" type="radio"
                                            name="punctuality" />
                                        <label class="star star-4" for="punctuality-4"></label>
                                        <input class="star star-3" value="3" id="punctuality-3" type="radio"
                                            name="punctuality" />
                                        <label class="star star-3" for="punctuality-3"></label>
                                        <input class="star star-2" value="2" id="punctuality-2" type="radio"
                                            name="punctuality" />
                                        <label class="star star-2" for="punctuality-2"></label>
                                        <input class="star star-1" value="1" id="punctuality-1" type="radio"
                                            name="punctuality" />
                                        <label class="star star-1" for="punctuality-1"></label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <button class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.addIntentions').on('click', () => {
        var ele = `<div class="col">
                        <label class="col-form-label d-flex align-items-center">
                            Intentions
                            <div class="col removeIntentions">
                                <label class="col-form-label"></label>
                                <i class='btn btn-danger btn-sm bx bx-x'></i>
                            </div>
                        </label>

                        <input type=" text" class="form-control" name="intentions[]" required />
                    </div>`
        document.querySelector('.extra-intentions').innerHTML += ele
        $('.removeIntentions').on('click', function (e) {
            $(e.currentTarget).parent().parent().remove()
        })
    })
</script>
@endsection