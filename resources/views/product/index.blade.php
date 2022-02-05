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
                                    <th>Quantity</th>
                                    <th>Package Type</th>
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
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->package_type}}</td>
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