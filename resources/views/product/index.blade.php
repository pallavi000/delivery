@extends('layouts.sidebar')

@section('content')

<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Product List</h4>
                    <div class="float-right">
                        <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>Item Type</th>
                                    <th>Brand</th>
                                    <th>Units</th>
                                    <th>Unit Type</th>
                                    <th>Quantity</th>
                                    <th>Packing Type</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->company->name}}</td>
                                    <td>{{$product->item_type}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>
                                        <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($product->units ) as $key => $unit)
                                            <li> {{$unit}}</li>
                                        @endforeach
                                    </ul>
                                    </td>
                                    <td>
                                        <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($product->unit_type ) as $key => $unit_type)
                                            <li> {{$unit_type}}</li>
                                        @endforeach
                                    </ul>
                                    </td>
                                    <td>
                                        <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($product->quantity ) as $key => $quantity)
                                            <li> {{$quantity}}</li>
                                        @endforeach
                                    </ul>
                                    </td>
                                    <td>
                                        <ul  class="ml-3 text-nowrap">
                                        @foreach(json_decode($product->package_type ) as $key => $package_type)
                                            <li> {{$package_type}}</li>
                                        @endforeach
                                    </ul>
                                    </td>
                                    <td>
                                        @if($product->image)
                                        <img src="{{$product->image}}"  width="75" height="75"/>
                                        @else
                                        NONE
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('product.destroy',$product->id)}}">
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


@endsection