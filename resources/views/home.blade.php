@extends('layouts.master')
@section('title','Home Page')
@section('content')
<body>
    <!-- ################# Slider Starts Here#######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('user/images/slider/slide-02.jpg')}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class=" vbh">

                            <div class="btn btn-danger  bounceInUp" data-toggle="modal" data-target="#loginFirstModal"> Become a volunteer </div>

                            <div class="btn btn-danger  bounceInUp">
                                <a class="text-white" href="#contact">Contact US</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('user/images/slider/slide-03.jpg')}}" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="text-white bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class=" vbh">

                            <div class="btn btn-danger  bounceInUp" data-toggle="modal" data-target="#loginFirstModal"> Book Appointment </div>
                            <div class="btn btn-danger  bounceInUp">
                                 <a class="text-white" href="#contact">Contact US</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

    <!--*************** About Us Starts Here ***************-->
   <section id="about" class="contianer-fluid about-us">
       <div class="container">
           <div class="row session-title">
               <h2>About Us</h2>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
           </div>
            <div class="row">
                <div class="col-md-6 text">
                    <h2>About Blood Doners</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some formhumour, or randomised words which don't look even slightly believable. If you are going to use a passage. industry's standard dummy has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                <div class="col-md-6 image">
                    <img src="{{asset('user/images/about.jpg')}}" alt="">
                </div>
            </div>
       </div>
   </section>



      <!-- ################# Gallery Start Here #######################--->

    <div id="gallery" class="gallery container-fluid">
        <div class="container">
            <div class="row session-title">
                <h2>Checkout Our Gallery</h2>
            </div>
            <div class="gallery-row row">
                    <div id="gg-screen"></div>
                    <div class="gg-box w-100">
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g1.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g2.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g3.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g4.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g5.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g6.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g7.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g8.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g9.jpg')}}">
                            </div>
                            <div class="gg-element">
                                <img src="{{asset('user/images/gallery/g10.jpg')}}">
                            </div>


                          </div>
            </div>
        </div>
    </div>



     <!-- ################# Donation Process Start Here #######################--->

     <section id="process" class="donation-care">
         <div class="container">
           <div class="row session-title text-center">
            <h2>Latest Blog</h2>
           </div>
            <div class="row d-flex align-items-center">
                @foreach ($events as $event)
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                     <img src="{{asset('storage/'.$event->image)}}" alt="">
                     <h4><b>{{$event->event_name}}</b></h4>
                     <p>{{Str::limit($event->description, 110, '...')}}</p>
                     <a href="{{route('auth#eventPage', ['id' => $event->id])}}" class="btn btn-sm btn-danger">
                        Readmore <i class="fas fa-arrow-right"></i>
                     </a>
                     </div>
                 </div>
                @endforeach


            </div>


         </div>
     </section>




         <!--################### Our Blog Starts Here #######################--->
        <div id="blog" class="blog-container contaienr-fluid">
            <div class="container">
                <div class="session-title row">
                    <h2>Donation Process</h2>
               <p class="text-center">The donation process from the time you arrive center until the time you leave</p>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit velit consectetur adipiscing elit.</p>
                </div>
                <div class="row news-row">
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="user/images/blog/blog_01.jpg" alt="">
                            </div>
                            <div class="detail">
                                <h3>Latest News about Smarteye</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                                <p class="footp">
                                    27 Comments <span>/</span>
                                    Blog Design <span>/</span>
                                    Read More
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="user/images/blog/blog_02.jpg" alt="">
                            </div>
                            <div class="detail">
                                <h3>Apple Launch its New Phone</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                                <p class="footp">
                                    27 Comments <span>/</span>
                                    Blog Design <span>/</span>
                                    Read More
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="user/images/blog/blog_03.jpg" alt="">
                            </div>
                            <div class="detail">
                                <h3>About Windows 10 Update</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                                <p class="footp">
                                    27 Comments <span>/</span>
                                    Blog Design <span>/</span>
                                    Read More
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="user/images/blog/blog_04.jpg" alt="">
                            </div>
                            <div class="detail">
                                <h3>Latest News about Smarteye</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                                <p class="footp">
                                    27 Comments <span>/</span>
                                    Blog Design <span>/</span>
                                    Read More
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

@endsection
