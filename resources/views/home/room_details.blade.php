<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
</head>

<body class="main-layout">

    <!-- loader -->
    <div class="loader_bg">
        <div class="loader">
            <img src="{{ asset('images/loading.gif') }}" alt="#">
        </div>
    </div>

    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <div class="our_room">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>{{ $rooms->room_title }}</h2>
                        <p>{{ $rooms->description }}</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8">
                    <div id="serv_hover" class="room">

                        <div style="padding:20px" class="room_img">
                            <figure>
                                <img style="height:350px;width:800px; object-fit:cover;"
                                    src="{{ asset('room/'.$rooms->image) }}"
                                    alt="room image">
                            </figure>
                        </div>

                        <div class="bed_room">

                            <h3>{{ $rooms->room_title }}</h3>

                            <p style="padding:12px">{{ $rooms->description }}</p>

                            <h4 style="padding:12px">Free Wifi : {{ $rooms->wifi }}</h4>

                            <h4 style="padding:12px">Room Type : {{ $rooms->room_type }}</h4>

                            <h2 style="padding:12px"> Price : ₹ {{ $rooms->price }}</h2>

                        </div>

                    </div>
                </div>


                <div class="col-md-4">

                    <form action="{{ url('add_booking', $rooms->id) }}" method="POST" class="p-4 shadow rounded bg-light">
                        @csrf

                        <h1 class="mb-4 text-center">Book This Room</h1>

                        {{-- Success Message --}}
                        @if(session('success'))
                        <div class="container mt-3">
                            <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif

                        {{-- Error Message --}}
                        @if(session('error'))
                        <div class="container mt-2">
                            <div class="alert alert-danger alert-dismissible fade show text-center shadow" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                        <div class="container mt-3">
                            <div class="alert alert-warning alert-dismissible fade show shadow" role="alert">
                                <strong>Validation Errors:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                @if(Auth::id())
                                value="{{Auth::user()->name}}"
                                @endif
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email"
                                @if(Auth::id())
                                value="{{Auth::user()->email}}"
                                @endif
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                @if(Auth::id())
                                value="{{Auth::user()->phone}}"
                                @endif
                                placeholder="Enter your phone number" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Submit Booking
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    @include('home.footer')

    <script>
        $(function() {

            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#start_date').attr('min', maxDate);
            $('#end_date').attr('min', maxDate);

        });
    </script>
    <script>
        setTimeout(function() {
            let msg = document.getElementById('success-message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 3000);
    </script>
</body>

</html>