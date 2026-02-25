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
                
                <!-- SAME HEADER STYLE -->
                <div class="card-header bg-primary text-white">
                    <h4>All Users</h4>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>

                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="#" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure?')">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Users Found
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>