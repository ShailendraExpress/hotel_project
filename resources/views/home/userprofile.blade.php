<style>
/* Typography */
.profile-text {
    font-size: 18px;   /* Same as navbar */
}

.profile-label {
    font-weight: 500;
    color: #6c757d;
}

.profile-value {
    font-weight: 500;
}

/* Buttons */
.profile-btn {
    border-radius: 30px;
    transition: all 0.3s ease;
    font-size: 16px;
}

.profile-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(220,53,69,0.25);
}
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-3">

                <!-- Header -->
                <div class="text-center p-4 border-bottom">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=ffffff&color=dc3545&size=110"
                         class="rounded-circle shadow-sm mb-3"
                         width="110" height="110">

                    <h4 class="fw-bold mb-1 profile-text">
                        {{ $user->name }}
                        <span class="badge bg-danger ms-2">Active</span>
                    </h4>

                    <p class="text-muted mb-1 profile-text">
                        {{ $user->email }}
                    </p>

                    <small class="text-muted profile-text">
                        Member since {{ $user->created_at->format('F Y') }}
                    </small>

                </div>

                <!-- Stats Section -->
                <div class="d-flex justify-content-around text-center py-3 border-bottom bg-light profile-text">
                    <div>
                        <h5 class="fw-bold mb-0 text-danger">
                            0
                        </h5>
                        <small class="text-muted">Total Bookings</small>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-0 text-danger">
                            {{ $user->created_at->diffForHumans() }}
                        </h5>
                        <small class="text-muted">Joined</small>
                    </div>
                </div>

                <!-- Details -->
                <div class="card-body px-4 py-4">

                    <div class="d-flex justify-content-between py-3 border-bottom profile-text">
                        <span class="profile-label">Mobile</span>
                        <span class="profile-value">
                            {{ $user->phone ?? 'Not Provided' }}
                        </span>
                    </div>

                    <div class="d-flex justify-content-between py-3 border-bottom profile-text">
                        <span class="profile-label">Account Created</span>
                        <span class="profile-value">
                            {{ $user->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <!-- Buttons Back -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-outline-danger px-4 me-2 profile-btn">
                            Edit Profile
                        </a>

                        <a href="#" class="btn btn-danger px-4 profile-btn">
                            Change Password
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>