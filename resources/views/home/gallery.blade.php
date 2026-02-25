<style>
   .gallery_img {
      width: 100%;
      height: 220px;
      /* Fix height */
      overflow: hidden;
      border-radius: 10px;
   }

   .gallery_img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
      transition: 0.3s;
   }

   .gallery_img img:hover {
      transform: scale(1.05);
   }

   .gallery_img {
      aspect-ratio: 1/1;
   }
</style>

<div class="gallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>gallery</h2>
            </div>
         </div>
      </div>

      <div class="row gx-4 gy-2">
         @foreach($gallary as $item)
         <div class="col-md-4 col-sm-6">
            <div class="gallery_img">
               <img src="{{ asset('gallary/'.$item->image) }}" alt="Gallery">
            </div>
         </div>
         @endforeach
      </div>

   </div>
</div>
</div>
</div>