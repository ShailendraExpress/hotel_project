<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .image-wrapper {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .gallery-img {
            height: 150px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }

        .delete-icon {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.6);
            color: #ff4d4d;
            font-size: 18px;
            padding: 6px 8px;
            border-radius: 50%;
            text-decoration: none;
            transition: 0.3s;
        }

        .delete-icon:hover {
            background: red;
            color: #fff;
            transform: scale(1.1);
        }

        .upload-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 25px;
            border-radius: 12px;
        }

        #preview {
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
            margin-top: 10px;
            display: none;
        }

        .modal-body img {
            animation: zoomIn 0.3s ease-in-out;
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>

<body>

@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
<div class="page-header">
<div class="container-fluid">

<div class="row">
<div class="col-12">

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-danger text-white">
        <h4 class="mb-0">Gallery</h4>
    </div>

    <div class="card-body">

        <h5 class="section-title text-light">Room Gallery</h5>

        <div class="row g-4 mb-5">
            @foreach($gallary as $item)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-4">

                <div class="image-wrapper">

                    <img src="{{ asset('gallary/'.$item->image) }}"
                         class="gallery-img shadow-sm"
                         onclick="openModal('{{ asset('gallary/'.$item->image) }}')">

                    <a href="{{ url('delete_gallary/'.$item->id) }}"
                       class="delete-icon"
                       onclick="return confirm('Are you sure to delete this image?')">
                       🗑️
                    </a>

                </div>

            </div>
            @endforeach
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>
        </div>
        @endif

        {{-- Validation Error --}}
        @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('image') }}
        </div>
        @endif

        <h5 class="section-title text-light mt-4">Upload New Image</h5>

        <div class="upload-box">

            <form action="{{ url('upload_gallary') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label text-light">Select Image</label>
                    <input type="file"
                           name="image"
                           class="form-control form-control-lg"
                           accept="image/*"
                           onchange="previewImage(event)"
                           required>
                </div>

                <div class="text-center">
                    <img id="preview">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-5">
                        Upload Image
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

</div>
</div>

</div>
</div>
</div>

<!-- ZOOM MODAL -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0">
            <div class="modal-body text-center">
                <img id="modalImage" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

<!-- Bootstrap JS (IMPORTANT) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function() {
        let output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

function openModal(src) {
    document.getElementById('modalImage').src = src;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
}
</script>

</body>
</html>