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
                    <h4>Add New Room</h4>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{url('add_room')}}"  method="POST"    enctype="multipart/form-data">

                        @csrf
                        {{-- Room Title --}}
                        <div class="form-group">
                            <label>Room Title</label>
                            <input type="text" 
                                   name="title" 
                                   class="form-control" 
                                   placeholder="Enter Room Title"
                                   required>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" 
                                      class="form-control" 
                                      rows="4"
                                      placeholder="Enter Room Description"
                                      required></textarea>
                        </div>

                        {{-- Price --}}
                        <div class="form-group">
                            <label>Price (₹)</label>
                            <input type="number" 
                                   name="price" 
                                   class="form-control" 
                                   placeholder="Enter Price"
                                   required>
                        </div>

                        {{-- Room Type --}}
                        <div class="form-group">
                            <label>Room Type</label>
                            <select name="room_type" class="form-control" required>
                                <option value="">-- Select Room Type --</option>
                                <option value="Regular">Regular</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>

                        {{-- Free Wifi --}}
                        <div class="form-group">
                            <label>Free Wifi</label>
                            <select name="wifi" class="form-control" required>
                                <option value="">-- Select Option --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        {{-- Upload Image --}}
                        <div class="form-group">
                            <label>Upload Room Image</label>
                            <input type="file" 
                                   name="image" 
                                   class="form-control-file"
                                   >
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success px-5">
                                Add Room
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
