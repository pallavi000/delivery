@extends('layouts.sidebar')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add New Product</h4>
                    <div class="float-right">
                        <a href="{{route('product.index')}}" class="btn btn-primary">Go Back</a>
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


                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Company</label>
                                    <select class="form-control select-search" name="company_id" required>
                                        <option value="">Please Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Item Type</label>
                                    <input type="text"
                                        class="form-control" name="item_type" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Brand</label>
                                    <input type="text"
                                        class="form-control" name="brand" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Unit Type <i class="fa fa-toggle-on toggle-unit-type" style="cursor: pointer;display:none" title="Change to Select"></i></label>
                                    <div class="unit-type-div">
                                    <select class="form-control unit_type select-search" name="unit_type[]" required>
                                        <option value="">Select Unit Type</option>
                                        <option value="weight">Weight</option>
                                        <option value="length">Length</option>
                                        <option value="area">Area</option>
                                        <option value="volume">Volume</option>
                                        <option value="add-new">Add New</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Units  <i class="fa fa-toggle-on toggle-units" style="cursor: pointer;display:none" title="Change to Select"></i></label>
                                    <div class="units-div">
                                    <select class="form-control text-capitalize units select-search" name="units[]" required>
                                        <option value="">Select Units</option>
                                        <option value="mg">mg</option>
                                        <option value="g">g</option>
                                        <option value="lb.">lb.</option>
                                        <option value="tons">tons</option>
                                        <option value="mm">mm</option>
                                        <option value="cm">cm</option>
                                        <option value="inch">inch</option>
                                        <option value="feet">feet</option>
                                        <option value="meter">meter</option>
                                        <option value="yard">yard</option>
                                        <option value="mm3">mm3</option>
                                        <option value="cm3">cm3</option>
                                        <option value="m3">m3</option>
                                        <option value="ft3">ft3</option>
                                        <option value="add-new">Add New</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number"
                                        class="form-control" name="quantity[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Packing Type</label>
                                    <input type="text" 
                                        class="form-control" name="package_type[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">&nbsp;</label>
                                    <div class="btn btn-success addUTUQ d-flex align-items-center" style="width: fit-content"><i
                                        class='bx bx-plus-medical'></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group newUTUQ"></div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Product Image</label>
                                    <input type="file" 
                                        class="form-control" name="image" />
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
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
    $('.addUTUQ').on('click', function () {
        var column = `
                        <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Unit Type</label>
                                    <select class="form-control select-search" name="unit_type[]" required>
                                        <option value="">Select Unit Type</option>
                                        <option value="weight">Weight</option>
                                        <option value="length">Length</option>
                                        <option value="area">Area</option>
                                        <option value="volume">Volume</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Units</label>
                                    <select class="form-control select-search text-capitalize" name="units[]" required>
                                        <option value="">Select Units</option>
                                        <option value="mg">mg</option>
                                        <option value="g">g</option>
                                        <option value="lb.">lb.</option>
                                        <option value="tons">tons</option>
                                        <option value="mm">mm</option>
                                        <option value="cm">cm</option>
                                        <option value="inch">inch</option>
                                        <option value="feet">feet</option>
                                        <option value="meter">meter</option>
                                        <option value="yard">yard</option>
                                        <option value="mm3">mm3</option>
                                        <option value="cm3">cm3</option>
                                        <option value="m3">m3</option>
                                        <option value="ft3">ft3</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number"
                                        class="form-control" name="quantity[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Packing Type</label>
                                    <input type="text" 
                                        class="form-control" name="package_type[]" required />
                                </div>
                                <div class="col removeUTUQ">
                                    <label class="col-form-label">&nbsp;</label>
                                    <div class=" btn btn-danger d-block d-flex align-items-center" style="width:fit-content">
                                        <i class='bx bx-x'></i>
                                    </div>
                                </div>
                            </div>      
                        
                            `
        document.querySelector('.newUTUQ').innerHTML += column

        $('.removeUTUQ').on('click', function (e) {
            $(e.currentTarget).parent().remove()
        })

    })

    function changeUnitType(e) {
        var ele = ''
        if(e.target.value=="add-new") {
            ele += `<input type="text" name="unit_type[]" placeholder="Enter Unit Type" class="form-control" required/>`
            $('.toggle-unit-type').show()
            $('.unit-type-div').html(ele)
        } else {
            $('.toggle-unit-type').hide()
        }
    }

    function changeUnits(e) {
        var ele = ''
        if(e.target.value=="add-new") {
            ele += `<input type="text" name="units[]" placeholder="Enter Unit" class="form-control" required/>`
            $('.toggle-units').show()
            $('.units-div').html(ele)
        } else {
            $('.toggle-units').hide()
        }
    }

    $(document).on('change','.unit_type', (e)=>{
        changeUnitType(e)
    });
    $(document).on('change','.units', (e)=>{
        changeUnits(e)
    });

    $('.toggle-unit-type').on('click', ()=>{
        var ele = `<select class="form-control unit_type select-search" name="unit_type[]" required>
                                        <option value="">Select Unit Type</option>
                                        <option value="weight">Weight</option>
                                        <option value="length">Length</option>
                                        <option value="area">Area</option>
                                        <option value="volume">Volume</option>
                                        <option value="add-new">Add New</option>
                                    </select>`
        $('.toggle-unit-type').hide()
        $('.unit-type-div').html(ele)
    })
    $('.toggle-units').on('click', ()=>{
        var ele = `
                    <select class="form-control select-search text-capitalize units" name="units[]" required>
                        <option value="">Select Units</option>
                        <option value="mg">mg</option>
                        <option value="g">g</option>
                        <option value="lb.">lb.</option>
                        <option value="tons">tons</option>
                        <option value="mm">mm</option>
                        <option value="cm">cm</option>
                        <option value="inch">inch</option>
                        <option value="feet">feet</option>
                        <option value="meter">meter</option>
                        <option value="yard">yard</option>
                        <option value="mm3">mm3</option>
                        <option value="cm3">cm3</option>
                        <option value="m3">m3</option>
                        <option value="ft3">ft3</option>
                        <option value="add-new">Add New</option>
                    </select>
        `
        $('.toggle-units').hide()
        $('.units-div').html(ele)
    })

</script>
@endsection