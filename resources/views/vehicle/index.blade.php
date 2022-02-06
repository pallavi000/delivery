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

<span class="text">Vehicle</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Vehicle List</h4>
                    <div class="float-right">
                        <form class="multi-dlv-form" method="POST" action="{{route('dlv.multi.add')}}">
                            @csrf
                            <input type="text" class="d-none multi-dlv-ids" name="vehicles" required />
                        </form>
                        <form class="multi-dlv-remove-form" method="POST" action="{{route('dlv.multi.remove')}}">
                            @csrf
                            <input type="text" class="d-none multi-dlv-remove-ids" name="vehicles" required />
                        </form>
                        <a href="{{route('daily-order.index')}}" class="btn btn-primary mr-2">Daily Orders</a>
                        <button type="button" class="btn btn-danger multi-dlv-remove-btn">Remove DLV</button>
                        <button type="button" class="btn btn-primary multi-dlv-btn mr-2">Add DLV</button>
                        <a href="{{route('dlv.show')}}" class="btn btn-primary mr-2">Show DLV</a>
                        <a href="{{route('vehicle.create')}}" class="btn btn-primary">Add Vehicle</a>
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
                                    <th></th>
                                    <th>ID</th>
                                    <th>Vehicle No</th>
                                    <th>Registration City</th>
                                    <th>Type</th>
                                    <th>Body Type</th>
                                    <th>Owner Name</th>
                                    <th>Owner Number</th>
                                    <th>Reliable</th>
                                    <th>Punctuality</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-control multi-dlv"
                                            vehicle_id="{{$vehicle->id}}" />
                                    </td>
                                    <td>{{$vehicle->id}}</td>
                                    <td>{{$vehicle->vehicle_no}}</td>
                                    <td>{{$vehicle->registration_city}}</td>
                                    <td>{{$vehicle->type}}</td>
                                    <td>{{$vehicle->body_type}}</td>
                                    <td>{{$vehicle->owner_name}}</td>
                                    <td>{{$vehicle->owner_number}}</td>
                                    <td>
                                        @php
                                        for($i=0;$i<$vehicle->reliable;$i++) {
                                            echo "<i class='fa fa-star mr-1 star'></i>";
                                            }
                                            @endphp
                                    </td>
                                    <td>
                                        @php
                                        for($i=0;$i<$vehicle->punctuality;$i++) {
                                            echo "<i class='fa fa-star mr-1 star'></i>";
                                            }
                                            @endphp
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('vehicle.edit',$vehicle->id)}}"
                                            class="btn btn-warning mr-2">Edit</a>
                                        @if($vehicle->dlv == 0)
                                        <form method="POST" action="{{route('dlv.add',$vehicle->id)}}">
                                            @csrf
                                            <button class="btn btn-primary mr-2">Add to DLV</button>

                                        </form>
                                        @endif
                                        <form method="POST" action="{{route('vehicle.destroy',$vehicle->id)}}">
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

<script>
    $('.multi-dlv-btn').on('click', () => {
        var checks = $('.multi-dlv:checkbox:checked')
        if (checks.length > 0) {
            var vehicle_ids = []
            $('.multi-dlv:checkbox:checked').each(function () {
                var vehicle_id = $(this).attr('vehicle_id')
                vehicle_ids.push(vehicle_id)
            });
            $('.multi-dlv-ids').val(vehicle_ids)
            $('.multi-dlv-form').submit()
        }
    })
    $('.multi-dlv-remove-btn').on('click', () => {
        var checks = $('.multi-dlv:checkbox:checked')
        if (checks.length > 0) {
            var vehicle_ids = []
            $('.multi-dlv:checkbox:checked').each(function () {
                var vehicle_id = $(this).attr('vehicle_id')
                vehicle_ids.push(vehicle_id)
            });
            $('.multi-dlv-remove-ids').val(vehicle_ids)
            $('.multi-dlv-remove-form').submit()
        }
    })
</script>
@endsection