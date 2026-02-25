<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>

@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>All Rooms</h4>
                </div>

                <div class="card-body">

                   @if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                    <table class="table table-bordered table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Wifi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if($room->image)
                                        <img src="{{ asset('room/'.$room->image) }}" 
                                             width="80">
                                    @endif
                                </td>

                                <td>{{ $room->room_title }}</td>
                                <td>{{ Str::limit($room->description, 50) }}</td>
                                <td>₹ {{ $room->price }}</td>
                                <td>{{ $room->room_type }}</td>
                                <td>{{ $room->wifi }}</td>

                                <td>
                                    <a href="{{ url('/edit_room',$room->id) }}" 
                                       class="btn btn-warning btn-sm">Edit</a>

                                    <a href="{{ url('delete_room',$room->id) }}" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure?')">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    No Rooms Found
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $rooms->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
