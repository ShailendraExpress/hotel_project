<footer class="footer">
    <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
            <p class="no-margin-bottom">
                2018 &copy; Your company. Download From 
                <a target="_blank" href="https://templateshub.net">
                    Templates Hub
                </a>.
            </p>
        </div>
    </div>
</footer>
</div>
</div>

<!-- JavaScript files-->

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>

<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>

<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>

<script src="{{ asset('admin/js/charts-home.js') }}"></script>

<script src="{{ asset('admin/js/front.js') }}"></script>

<script>
    setTimeout(function() {
        let message = document.getElementById('success-message');
        if(message){
            message.style.transition = "opacity 0.5s ease";
            message.style.opacity = "0";
            setTimeout(() => message.remove(), 500);
        }
    }, 3000); // 3 seconds
</script>
<script>
    setTimeout(function(){
        let alert = document.querySelector('.alert');
        if(alert){
            alert.style.display = 'none';
        }
    }, 3000);
</script>