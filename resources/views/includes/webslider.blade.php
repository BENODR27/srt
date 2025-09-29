<!-- Bootstrap CSS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<header class="hero-text">
	<div class="hero" data-arrows="true" data-autoplay="true">
	  <!--.hero-slide-->
	
	@if($slides!=null)
      @foreach ($slides as $slide)
      <section class="ur-cta-section position-relative z-1 ptb-120 overflow-hidden bg-white">
        <span class="bg-shape position-absolute z--1 light-bg"></span>
        <div class="container">
            <div class="row justify-content-center align-items-center g-5">
               
             
                <div class="col-xl-5 col-lg-5">
                    <div class="feature-image-wrapper">
                        <div class="cta-image position-relative">
                            <img src="{{ Storage::disk('s3')->url('slide/images/' . $slide->imageName) }}" alt="rings"
                                class="img-fluid feature-image wow fadeInUp" data-wow-duration="0.5s">
                            {{-- <img src="assets/images/shapes/shape-1.jpg" alt="shape"
                                class="position-absolute shape-image d-none d-xl-block wow fadeInUp"
                                data-wow-delay="0.3s"> --}}
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-7 ps-xl-5">
                    <div class="ps-2 ur-cta-content">
                        <h2 class=" mb-28 fw-dark text-color wow fadeInUp" data-wow-duration="0.5s">SR TEMPLE JEWELLERY</h2>
                        <h6 class="mb-50 fw-light text-color wow fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="0.5s">Made in 95% Silver & 24k Gold with real Kemp stones, “Temple Jewellery” made in Silver & covered with Gold leaf (24 k) &
                            dipped in gold, Generally follows the age - old method. The old process of making
                            the frames (now in silver), twisting the silver wire into designs, fixing the wax,
                            embedding the stones in it and covering the silver with repeated layers of gold leaf,
                            is still followed by the artisans.</h6>
                        <a href="{{route('products')}}" class="template-btn primary-btn wow fadeInUp" data-wow-delay="0.5s"
                            data-wow-duration="0.5s"><span>SHOP NOW</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
      @endforeach
      @endif
	</div><!--.hero-->
  </header>
  <script>
    jQuery(document).ready(function ($) {
	  $('.hero').slick({
		dots: true,
        infinite: true,
        speed: 1000,
        fade: !0,
        cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: 1,
        autoplay: true,
		autoplaySpeed: 3000,
        draggable: false,
		arrows: false,
		responsive: [
	    {
		breakpoint: 1024,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
        infinite: true
		          }
        },
        {
		breakpoint: 768,
		settings: {
        draggable: true,
		          }
		},
		{
		breakpoint: 600,
		settings: {
        slidesToShow: 1,
        draggable: true,
		slidesToScroll: 1
			      }
		},
		{
		breakpoint: 480,
		settings: {
        slidesToShow: 1,
        draggable: true,
		slidesToScroll: 1
		          }
		}
	
			      ]
                  });
        });
  </script>
  <style>
    /* Center the header text on all devices */
.slide-content {
  padding: 10px 20px;
  text-align: center; /* Center text horizontally */
  left: 0; /* Remove left offset for centering */
  transform: none; /* Remove horizontal centering transform */
}

    /* header {
  overflow: hidden;
} */

.hero-text h2 {
  margin-bottom: 50px;
}

/* .hero-text .hero {
  position: relative;
} */

.hero-text .hero .hero-slide a:hover span {
  color: #033a71;
}

.hero .hero-slide img {
  width: 100%;
  height: 864px;
  object-fit: cover;
  object-position: top center;
}

.hero .hero-slide .header-content {
  top: 20%;
  margin-left: 8rem;
  max-width: 550px;
  width: 100%;
  padding: 2rem;
}

.slide-content {
  padding: 10px 20px 10px 0;
}

.slide-content .h1 {
  font-size: 62px;
}

.btn-primary {
  background-color: #5302FE;
  border-radius: 0;
}

.slick-dots {
  position: absolute;
  bottom: 10px;
  display: block;
  width: 100%;
  padding: 0;
  list-style: none;
  text-align: center;
}

.slick-dots li {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 20px;
  margin: 0 5px;
  padding: 0;
  cursor: pointer;
}

.slick-dots li button {
  font-size: 0;
  line-height: 0;
  display: block;
  width: 20px;
  height: 20px;
  padding: 5px;
  cursor: pointer;
  border-radius: 50%;
  border: 0;
  outline: none;
}

.slick-dots li button::before {
  font-size: 18px;
  color: #fff;
  opacity: 1;
}

.slick-active button {
  background: #ffffff;
}

/** Text Animation **/

@-webkit-keyframes fadeInUpSD {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100px);
    transform: translateY(100px);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInUpSD {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100px);
    transform: translateY(100px);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInUpSD {
  -webkit-animation-name: fadeInUpSD;
  animation-name: fadeInUpSD;
}

.slick-active .slide-content {
  animation-name: fadeInUpSD;
  animation-duration: 1s;
  opacity: 1;
  width: 100%;
  padding: 10px 20px 30px 0;
}

/* Media Queries */

@media (max-width: 768px) {
  .hero-text .hero .hero-slide a {
    padding-top: 0.8rem;
  }

  .hero-text .hero .hero-slide a span {
    font-size: 20px;
    margin-top: 0.5rem;
  }

  .hero .hero-slide .header-content {
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    margin: 0 auto;
  }
}

@-webkit-keyframes fadeInUpSD {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100px);
    transform: translateY(100px);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInUpSD {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100px);
    transform: translateY(100px);
  }

  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInUpSD {
  -webkit-animation-name: fadeInUpSD;
  animation-name: fadeInUpSD;
}

.slick-active .slide-content {
  animation-name: fadeInUpSD;
  animation-duration: 1s;
  opacity: 1;
  width: 100%;
  padding: 10px 20px 30px 0;
}
  </style>