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
                        <h4>All Bookings</h4>
                    </div>

                    {{-- Flash Message --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>
                    </div>
                    @endif

                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Room ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Arrival Date</th>
                                    <th>Leaving Date</th>
                                    <th>Status</th>
                                    <th>Room Title</th>
                                    <th>Price</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                    <th>Status Update</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($bookings as $key => $booking)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $booking->room_id }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->end_date }}</td>

                                    <td>
                                        @if($booking->status == 'waiting')
                                        <span class="text-warning fw-semibold"> Waiting</span>

                                        @elseif($booking->status == 'approved')
                                        <span class="text-info fw-semibold"> Approved</span>

                                        @else
                                        <span class="text-danger fw-semibold">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ optional($booking->room)->room_title ?? 'N/A' }}
                                    </td>

                                    <td>
                                        ₹ {{ optional($booking->room)->price ?? 'N/A' }}
                                    </td>

                                    <td>
                                        @if($booking->room && $booking->room->image)
                                        <img style="height:80px;width:80px;object-fit:cover;border-radius:8px;"
                                            src="/room/{{ $booking->room->image }}"
                                            alt="Room Image">
                                        @else
                                        N/A
                                        @endif
                                    </td>

                                    <td>
                                        {{-- YOUR ORIGINAL DELETE LINK --}}
                                        <a href="{{ url('delete_booking', $booking->id) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this booking?')">
                                            Delete
                                        </a>
                                    </td>
                                    <td>

                                        @if($booking->status == 'waiting')

                                        {{-- Approve Button --}}
                                        <a href="{{ url('approve_booking', $booking->id) }}"
                                            class="btn btn-success btn-sm me-1"
                                            onclick="return confirm('Approve this booking?')">
                                            Approve
                                        </a>

                                        {{-- Reject Button --}}
                                        <a href="{{ url('reject_booking', $booking->id) }}"
                                            class="btn btn-primary btn-sm"
                                            onclick="return confirm('Reject this booking?')">
                                            Reject
                                        </a>

                                        @elseif($booking->status == 'approved')

                                        <span class="badge bg-success text-dark">Approved</span>

                                        @elseif($booking->status == 'rejected')

                                        <span class="badge bg-primary text-dark ">Rejected</span>

                                        @endif

                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="12" class="text-danger">
                                        No Bookings Found
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

    {{-- Auto Hide Flash After 3 Seconds --}}
    <script>
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>

</body>

</html>