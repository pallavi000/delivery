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

<span class="text">Receiver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit Receiver</h4>
                    <div class="float-right">
                        <a href="{{route('receiver.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('receiver.update', $receiver->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Dealer</label>
                                    <select class="form-control select-search" name="dealer_id" required>
                                        <option value="">Please Select Dealer</option>
                                        @foreach($dealers as $dealer)
                                        <option value="{{$dealer->id}}" @if($receiver->dealer_id==$dealer->id) selected @endif>{{$dealer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Name</label>
                                    <input type="text"
                                        class="form-control" name="name" value="{{$receiver->name}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Number</label>
                                    <input type="number" 
                                        class="form-control" name="number" value="{{$receiver->number}}" required />
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Zone</label>
                                    <select class="form-control select-search" name="zone" required>
                                        <option value="">Please Select Zone</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->zone}}" @if($destination->zone==$receiver->zone) selected @endif>{{$destination->zone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Area</label>
                                    <select class="form-control select-search" name="area" required>
                                        <option value="">Please Select Area</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->area}}" @if($destination->area==$receiver->area) selected @endif>{{$destination->area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Address</label>
                                    <select class="form-control select-search" name="address" required>
                                        <option value="">Please Select Address</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->address}}" @if($destination->address==$receiver->address) selected @endif>{{$destination->address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                            </div>
                            
                        </div>

                        <div class="form-group mt-3">
                            <div class="d-flex align-items-center">
                                    <div class="col-form-label">Ranking</div>
                                    <div class="ml-4">
                                        <input class="star star-5" value="5" id="ranking-5" type="radio"
                                            name="ranking" @if($receiver->ranking=="5") checked @endif/>
                                        <label class="star star-5" for="ranking-5"></label>
                                        <input class="star star-4" value="4" id="ranking-4" type="radio"
                                            name="ranking" @if($receiver->ranking=="4") checked @endif/>
                                        <label class="star star-4" for="ranking-4"></label>
                                        <input class="star star-3" value="3" id="ranking-3" type="radio"
                                            name="ranking" @if($receiver->ranking=="3") checked @endif/>
                                        <label class="star star-3" for="ranking-3"></label>
                                        <input class="star star-2" value="2" id="ranking-2" type="radio"
                                            name="ranking" @if($receiver->ranking=="2") checked @endif/>
                                        <label class="star star-2" for="ranking-2"></label>
                                        <input class="star star-1" value="1" id="ranking-1" type="radio"
                                            name="ranking" @if($receiver->ranking=="1") checked @endif/>
                                        <label class="star star-1" for="ranking-1"></label>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group mt-5">
                                <label>Bank Details</label>
                                <div class="float-right">
                                    <div class="btn btn-success addBank d-flex align-items-center"><i
                                            class='bx bx-plus-medical'></i></div>
                                </div>


                                @foreach($receiver->bank as $key=>$bank)
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

                        <button class="btn btn-primary mt-3">Submit</button>
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