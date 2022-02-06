@extends('layouts.sidebar')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .star {
        color: #F62;
    }
</style>

<span class="text">Receiver</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Receiver List</h4>
                    <div class="float-right">
                        <a href="{{route('receiver.create')}}" class="btn btn-primary">Add Receiver</a>
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
                                    <th>Dealer</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Zone</th>
                                    <th>Area</th>
                                    <th>Address</th>
                                    <th>Ranking</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($receivers as $receiver)
                                <tr>
                                    <td>{{$receiver->id}}</td>
                                    <td>{{$receiver->dealer->name}}</td>
                                    <td>{{$receiver->name}}</td>
                                    <td>{{$receiver->number}}</td>
                                    <td>{{$receiver->zone}}</td>
                                    <td>{{$receiver->area}}</td>
                                    <td>{{$receiver->address}}</td>
                                    <td>
                                        @php
                                        for($i=0;$i<$receiver->ranking;$i++) {
                                            echo "<i class='fa fa-star mr-1 star'></i>";
                                            }
                                            @endphp
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('receiver.edit',$receiver->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('receiver.destroy',$receiver->id)}}">
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