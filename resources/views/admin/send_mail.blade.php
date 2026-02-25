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

               
                 <div class="card-header bg-primary text-white mb-2">
                    <h2>Mail Send To {{ $data->name }}</h2>
                </div>

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card p-4">

                    <form action="{{ url('mail', $data->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Greeting</label>
                            <input type="text" name="greeting" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mail Body</label>
                            <textarea name="body" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Action Text</label>
                            <input type="text" name="action_text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Action URL</label>
                            <input type="url" name="action_url" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">End Line</label>
                            <input type="text" name="end_line" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Send Mail
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>