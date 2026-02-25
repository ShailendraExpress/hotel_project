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
                    <div class="card-header bg-warning text-dark">
                        <h4>Edit Room</h4>
                    </div>

                    <div class="card-body">

                        {{-- Success Message --}}
                                         @if(session('success'))
                                <div id="success-message" class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                        <form action="{{ url('update_room', $room->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- Room Title --}}
                            <div class="form-group">
                                <label>Room Title</label>
                                <input type="text"
                                    name="title"
                                    value="{{ $room->room_title }}"
                                    class="form-control"
                                    required>
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control"
                                    rows="4"
                                    required>{{ $room->description }}</textarea>
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label>Price (₹)</label>
                                <input type="number"
                                    name="price"
                                    value="{{ $room->price }}"
                                    class="form-control"
                                    required>
                            </div>

                            {{-- Room Type --}}
                            <div class="form-group">
                                <label>Room Type</label>
                                <select name="room_type" class="form-control" required>
                                    <option value="Regular" {{ $room->room_type == 'Regular' ? 'selected' : '' }}>Regular</option>
                                    <option value="Deluxe" {{ $room->room_type == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                    <option value="Suite" {{ $room->room_type == 'Suite' ? 'selected' : '' }}>Suite</option>
                                </select>
                            </div>

                            {{-- Free Wifi --}}
                            <div class="form-group">
                                <label>Free Wifi</label>
                                <select name="wifi" class="form-control" required>
                                    <option value="Yes" {{ $room->wifi == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $room->wifi == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            {{-- Current Image --}}
                            <div class="form-group">
                                <label>Current Image</label><br>
                                @if($room->image)
                                <img src="{{ asset('room/'.$room->image) }}"
                                    width="120"
                                    class="img-thumbnail">
                                @endif
                            </div>

                            {{-- Change Image --}}
                            <div class="form-group">
                                <label>Change Image</label>
                                <input type="file"
                                    name="image"
                                    class="form-control-file">
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success px-5">
                                    Update Room
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>