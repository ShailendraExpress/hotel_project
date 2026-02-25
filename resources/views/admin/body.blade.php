<div class="page-content">

  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Hotel Management Dashboard</h2>
    </div>
  </div>


  <!-- MAIN STATS -->
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">




        <!-- Total Rooms -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">🛏️</div>
                <strong>Total Rooms</strong>
              </div>
              <div class="number dashtext-1">
                {{ $totalRooms ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-1"
                role="progressbar"
                style="width: 100%">
              </div>
            </div>
          </div>
        </div>

        <!-- Total Bookings -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">📅</div>
                <strong>Total Bookings</strong>
              </div>
              <div class="number dashtext-2">
                {{ $totalBookings ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-2"
                role="progressbar"
                style="width: 75%">
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Bookings -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">⏳</div>
                <strong>Pending Bookings</strong>
              </div>
              <div class="number dashtext-3">
                {{ $pendingBookings ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-3"
                role="progressbar"
                style="width: 55%">
              </div>
            </div>
          </div>
        </div>

        <!-- Approved Bookings -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">✅</div>
                <strong>Approved Bookings</strong>
              </div>
              <div class="number dashtext-4">
                {{ $approvedBookings ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-4"
                role="progressbar"
                style="width: 80%">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- SECOND ROW STATS -->
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">

        <!-- Total Messages -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">📩</div>
                <strong>Total Messages</strong>
              </div>
              <div class="number dashtext-1">
                {{ $totalMessages ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-1"
                role="progressbar"
                style="width: 60%">
              </div>
            </div>
          </div>
        </div>

        <!-- Today Check-ins -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">🟢</div>
                <strong>Today Check-ins</strong>
              </div>
              <div class="number dashtext-2">
                {{ $todayCheckins ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-2"
                role="progressbar"
                style="width: 65%">
              </div>
            </div>
          </div>
        </div>

        <!-- Today Check-outs -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">🔵</div>
                <strong>Today Check-outs</strong>
              </div>
              <div class="number dashtext-3">
                {{ $todayCheckouts ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-3"
                role="progressbar"
                style="width: 50%">
              </div>
            </div>
          </div>
        </div>

        <!-- Total Revenue -->
        <div class="col-md-3 col-sm-6">
              <a href="#" style="text-decoration:none; display:block;">

          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon">💰</div>
                <strong>Total Revenue</strong>
              </div>
              <div class="number dashtext-4">
                ₹{{ $totalRevenue ?? 0 }}
              </div>
            </div>
            <div class="progress progress-template">
              <div class="progress-bar dashbg-4"
                role="progressbar"
                style="width: 85%">
              </div>
            </div>
          </div>
              </a>
        </div>


        <!-- Total Users -->
       <div class="col-md-3 col-sm-6">
    <a href="{{ route('allusers') }}" style="text-decoration:none; display:block;">
        <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                    <div class="icon">👥</div>
                    <strong>Total Users</strong>
                </div>
                <div class="number dashtext-5">
                    {{ $totalUsers ?? 0 }}
                </div>
            </div>
            <div class="progress progress-template">
                <div class="progress-bar dashbg-4"
                     role="progressbar"
                     style="width: 85%">
                </div>
            </div>
        </div>
    </a>
</div>
      </div>
    </div>
  </section>

</div>