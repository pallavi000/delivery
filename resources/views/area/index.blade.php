@extends('layouts.sidebar')

@section('content')

<span class="text">Area</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Area List</h4>
                    <div class="float-right">
                        <a href="{{route('area.create')}}" class="btn btn-primary">Add Area</a>
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
                    <div class="table-resopnsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($areas as $area)
                                <tr>
                                    <td>{{$area->id}}</td>
                                    <td>{{$area->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('area.edit',$area->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('area.destroy',$area->id)}}">
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