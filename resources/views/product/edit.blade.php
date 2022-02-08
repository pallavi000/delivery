@extends('layouts.sidebar')

@section('content')

<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Edit Product</h4>
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


                    <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Company</label>
                                    <select class="form-control select-search" name="company_id" required>
                                        <option value="">Please Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}" @if($product->company_id==$company->id) selected @endif>{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Item Type</label>
                                    <input type="text"
                                        class="form-control" name="item_type" value="{{$product->item_type}}" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Brand</label>
                                    <input type="text"
                                        class="form-control" name="brand" value="{{$product->brand}}" required />
                                </div>
                            </div>
                        </div>
                        @php
                        $unit_type = json_decode($product->unit_type);
                        $units = json_decode($product->units);
                        $quantity = json_decode($product->quantity);
                        $package_type = json_decode($product->package_type);
                        $units_options = ['mg','g','kg','lb.','tons','mm','cm','inch','feet','meter','yard','mm3','cm3','m3','ft3'];
                        @endphp
                        @for($i=0;$i<sizeof($unit_type);$i++)
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Unit Type <i class="fa fa-toggle-on toggle-unit-type" style="cursor: pointer;display:none" title="Change to Select"></i></label>
                                    <div class="unit-type-div">
                                    <select class="form-control unit_type select-search" name="unit_type[]" required>
                                        <option value="">Select Unit Type</option>
                                        <option value="weight" @if($unit_type[$i]=="weight") selected @endif>Weight</option>
                                        <option value="length" @if($unit_type[$i]=="length") selected @endif>Length</option>
                                        <option value="area" @if($unit_type[$i]=="area") selected @endif>Area</option>
                                        <option value="volume" @if($unit_type[$i]=="volume") selected @endif>Volume</option>
                                         @if($unit_type[$i]=="weight" || $unit_type[$i]=="length" || $unit_type[$i]=="area" || $unit_type[$i]=="volume")
                                         @else
                                         <option value="{{$unit_type[$i]}}" selected>{{$unit_type[$i]}}</option>
                                         @endif
                                    </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Units  <i class="fa fa-toggle-on toggle-units" style="cursor: pointer;display:none" title="Change to Select"></i></label>
                                    <div class="units-div">
                                    <select class="form-control text-capitalize select-search units" name="units[]" required>
                                        <option value="">Select Units</option>
                                        @foreach($units_options as $opt)
                                        <option value="{{$opt}}" @if($units[$i]==$opt) selected @endif>{{$opt}}</option>
                                        @endforeach
                                        @if(!in_array($units[$i], $units_options))
                                        <option value="{{$units[$i]}}" selected>{{$units[$i]}}</option>
                                        @endif
                                    </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number"
                                        class="form-control" value="{{$quantity[$i]}}" name="quantity[]" required />
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Packing Type</label>
                                    <input type="text" 
                                        class="form-control" value="{{$package_type[$i]}}" name="package_type[]" required />
                                </div>
                                @if($i==0)
                                <div class="col">
                                    <label class="col-form-label">&nbsp;</label>
                                    <div class="btn btn-success addUTUQ d-flex align-items-center" style="width: fit-content"><i
                                        class='bx bx-plus-medical'></i></div>
                                </div>
                                @else
                                <div class="col"></div>
                                @endif
                            </div>
                        </div>
                        @endfor
                        <div class="form-group newUTUQ"></div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label class="col-form-label">Product Image</label>
                                    <input type="file" 
                                        class="form-control" name="image" />
                                </div>
                                <div class="col-md-4">
                                    @if($product->image)
                                    <img src="{{$product->image}}"  class="img-fluid w-50"/>
                                    @endif
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

</script>
@endsection