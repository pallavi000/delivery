@extends('layouts.sidebar')

@section('content')

<span class="text">Dealer</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Dealer List</h4>
                    <div class="float-right">
                        <a href="{{route('dealer.create')}}" class="btn btn-primary">Add Dealer</a>
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
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                     <th>Address</th>
                                     <th>NTN</th>
                                    <th>STRN</th>
                                    <th>Company</th>
                                   <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dealers as $dealer)
                                <tr>
                                    <td>{{$dealer->id}}</td>
                                    <td>{{$dealer->name}}</td>
                                    <td>{{$dealer->contact}}</td>
                                    <td>{{$dealer->email}}</td>
                                    <td>{{$dealer->address}}</td>
                                    <td>{{$dealer->ntn}}</td>
                                    <td>{{$dealer->strn}}</td>
                                    <td>{{$dealer->company->name}}</td>
                                     <td><img src="{{$dealer->picture}}"  width="75" height="75" /></td>
                                   

                                    <td class="d-flex">
                                        <a href="{{route('dealer.edit',$dealer->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('dealer.destroy',$dealer->id)}}">
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