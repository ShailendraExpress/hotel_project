<div class="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Contact Us</h2>
            </div>
         </div>
      </div>
      <div class="row">

         @if(session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif

         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <div class="col-md-6">
            <div id="responseMessage"></div>
       <form id="contactForm" class="main_form" action="{{ route('contact.submit') }}" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-12 ">
                     <input class="contactus" placeholder="Name" type="text" name="name">
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Email" type="email" name="email">
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Phone Number" type="number" name="phone">
                  </div>
                  <div class="col-md-12">
                     <textarea class="textarea" placeholder="Message" name="message"></textarea>
                  </div>
                  <div class="col-md-12">
                     <button class="send_btn">Send</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-6">
            <div class="map_main">
               <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $('#contactForm').submit(function(e) {
        e.preventDefault(); // Page reload rokta hai

        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('contact.submit') }}",
            type: "POST",
            data: formData,
            success: function(response) {

                if(response.status === true) {
                    $('#responseMessage').html(
                        '<div class="alert alert-success">'+response.message+'</div>'
                    );
                    $('#contactForm')[0].reset();
                }
                else {
                    let errors = '';
                    $.each(response.errors, function(key, value){
                        errors += '<li>'+value[0]+'</li>';
                    });

                    $('#responseMessage').html(
                        '<div class="alert alert-danger"><ul>'+errors+'</ul></div>'
                    );
                }

            }
        });

    });

});
</script>