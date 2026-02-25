<section class="banner_main position-relative">

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/banner1.jpg') }}"
             class="d-block w-100"
             style="max-height:600px; object-fit:cover;"
             alt="First slide">
      </div>

      <div class="carousel-item">
        <img src="{{ asset('images/banner2.jpg') }}"
             class="d-block w-100"
             style="max-height:600px; object-fit:cover;"
             alt="Second slide">
      </div>

      <div class="carousel-item">
        <img src="{{ asset('images/banner3.jpg') }}"
             class="d-block w-100"
             style="max-height:600px; object-fit:cover;"
             alt="Third slide">
      </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>

  <!-- Booking form overlay (UNCHANGED LOOK) -->
  <div class="booking_online position-absolute"
       style="top:20%; left:5%; max-width:400px;
              background:rgba(255,255,255,0.85);
              padding:25px; border-radius:10px;
              box-shadow:0 0 15px rgba(0,0,0,0.3);">

    <h2 class="mb-4 fw-bold">Book a Room Online</h2>

    <form class="book_now">
      <div class="mb-3">
        <label class="form-label">Arrival</label>
        <input type="date" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Departure</label>
        <input type="date" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-success w-100 mt-2">
        Book Now
      </button>
    </form>

  </div>
</section>
