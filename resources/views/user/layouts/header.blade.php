 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a href="index.html" class="logo"><img src="{{ asset('template-user/images/logo.png') }}"></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a class="nav-link" href="index.html">Home</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="cycle.html">Our Cycle</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="shop.html">Shop</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="news.html">News</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="contact.html">Contact Us</a>
             </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
             <div class="login_menu">
                 <ul>
                     <li><a href="#">Login</a></li>
                     <li><a href="#"><img src="{{ asset('template-user/images/trolly-icon.png') }}"></a>
                     </li>
                     <li><a href="#"><img src="{{ asset('template-user/images/search-icon.png') }}"></a>
                     </li>
                 </ul>
             </div>
             <div></div>
         </form>
     </div>
     <div id="main">
         <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img
                 src="{{ asset('template-user/images/toggle-icon.png') }}" style="height: 30px;"></span>
     </div>
 </nav>
 <!-- banner section start -->
 <div class="banner_section layout_padding">
     <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-7">
                             <div class="best_text">Best</div>
                             <div class="image_1"><img src="{{ asset('template-user/images/img-1.png') }}">
                             </div>
                         </div>
                         <div class="col-md-5">
                             <h1 class="banner_taital">New Model Cycle</h1>
                             <p class="banner_text">It is a long established fact that a reader will be
                                 distracted by the readable content </p>
                             <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="carousel-item">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-7">
                             <div class="best_text">Best</div>
                             <div class="image_1"><img src="{{ asset('template-user/images/img-1.png') }}">
                             </div>
                         </div>
                         <div class="col-md-5">
                             <h1 class="banner_taital">New Model Cycle</h1>
                             <p class="banner_text">It is a long established fact that a reader will be
                                 distracted by the readable content </p>
                             <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="carousel-item">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-7">
                             <div class="best_text">Best</div>
                             <div class="image_1"><img src="{{ asset('template-user/images/img-1.png') }}">
                             </div>
                         </div>
                         <div class="col-md-5">
                             <h1 class="banner_taital">New Model Cycle</h1>
                             <p class="banner_text">It is a long established fact that a reader will be
                                 distracted by the readable content </p>
                             <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
             <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
             <i class="fa fa-angle-right"></i>
         </a>
     </div>
 </div>
 <!-- banner section end -->
