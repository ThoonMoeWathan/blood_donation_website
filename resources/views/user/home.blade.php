@extends('user.layouts.master')
@section('title', 'Home Page')
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
                        <img class="d-block w-100" src="{{ asset('user/images/slider/slide-02.jpg') }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white bounceInDown">Donate Blood & Save a Life</h5>
                            <p class=" bounceInLeft">Every drop counts. Donating blood is one of the simplest yet most
                                powerful acts you can do to help others. Each donation can save up to three lives,
                                supporting patients undergoing surgeries, cancer treatment, trauma care, and chronic
                                illnesses.</p>

                            <div class=" vbh">

                                <div class="btn btn-danger bounceInUp" data-toggle="modal" data-target="#loginFirstModal">
                                    <a class="text-white" href="{{route('donor#createPage')}}">Become a volunteer</a> </div>

                                <div class="btn btn-danger  bounceInUp">
                                    <a class="text-white" href="#contact">Contact US</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('user/images/slider/slide-03.jpg') }}" alt="Third slide">
                        <div class="carousel-caption vdg-cur d-none d-md-block">
                            <h5 class="text-white bounceInDown">Donate Blood & Save a Life</h5>
                            <p class=" bounceInLeft">Blood shortages are a constant challenge for hospitals and clinics, and
                                your
                                contribution can make a life-saving difference. Join our mission to build a healthier
                                community—become a donor today and inspire hope where it's needed most.</p>

                            <div class=" vbh">

                                <div class="btn btn-danger  bounceInUp" data-toggle="modal" data-target="#loginFirstModal">
                                    <a class="text-white" href="{{route('appointment#createPage')}}">Book Appointment</a>
                                    </div>
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
                    <h2 class="mb-3">About Us</h2>
                    <p>Life Elixir is a dedicated blood donation organization committed to saving lives through innovative,
                        accessible, and reliable blood donation services.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 text">
                        <h2 class="mb-3">About Blood Donors</h2>
                        <p>Blood donors are everyday heroes who make a life-saving difference in the lives of others.
                            Donating blood is a simple, safe, and generous act that helps patients suffering from trauma,
                            undergoing surgeries, or battling serious illnesses like cancer.</p>
                        <p>Each blood donation has the power to save up to three lives. Donors come from all walks of life,
                            united by the common goal of giving others a second chance at life. At Life Elixir, we ensure
                            that every donation is handled with the highest standards of medical safety, transparency, and
                            care.</p>
                        <p>Our system keeps donors informed, engaged, and appreciated through personalized health updates,
                            reminders, and recognition for their contributions. By encouraging regular donations and raising
                            awareness, we aim to create a self-sustaining network of compassionate donors ready to respond
                            whenever there's a need.</p>
                        <p> Our mission is to bridge the gap between donors
                            and those in urgent need by leveraging technology to streamline the donation process and improve
                            response times during emergencies. Since our founding, we’ve built strong partnerships with
                            leading
                            organizations and communities to ensure safe, ethical, and effective blood collection and
                            distribution.</p>
                    </div>
                    <div class="col-md-6 image">
                        <img src="{{ asset('user/images/about.jpg') }}" alt="">
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
                            <img src="{{ asset('user/images/gallery/g1.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g2.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g3.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g4.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g5.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g6.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g7.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g8.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g9.jpg') }}">
                        </div>
                        <div class="gg-element">
                            <img src="{{ asset('user/images/gallery/g10.jpg') }}">
                        </div>


                    </div>
                </div>
            </div>
        </div>



        <!-- ################# Donation Process Start Here #######################--->

        <section id="process" class="donation-care">
            <div class="container">
                <div class="row session-title text-center">
                    <h2>Event Blog</h2>
                </div>
                <div class="row d-flex align-items-center">
                    @if($events->isEmpty())
                    <div class="col-md-12">
                        <p class="text-center text-muted">There is no upcoming event yet. Stay Tuned!</p>
                    </div>
                    @else
                    @foreach ($events as $event)
                        <div class="col-md-3 col-sm-6 vd">
                            <div class="bkjiu">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="">
                                <h4><b>{{ $event->event_name }}</b></h4>
                                <p>{{ Str::limit($event->description, 110, '...') }}</p>
                                <a href="{{ route('user#eventPage', ['id' => $event->id]) }}"
                                    class="btn btn-sm btn-danger">
                                    Readmore <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @endif


                </div>


            </div>
        </section>




        <div id="blog" class="blog-container contaienr-fluid">
            <div class="container">
                <div class="session-title row">
                    <h2 class="mb-3">Donation Process</h2>
                    <p class="text-center">The donation process from the time you arrive center until the time you leave
                    </p>

                    <p>The donation process is designed to be quick, safe, and comfortable for all donors. When you arrive
                        at the donation center, you will be welcomed by our staff and guided through a short registration
                        process. A medical professional will then conduct a quick health screening to check your blood
                        pressure, hemoglobin levels, and overall eligibility.</p>
                </div>
                <div class="row news-row">
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="/user/images/blog/blog_01.jpg" alt="">
                            </div>
                            <div class="detail mt-2">
                                <h3 class="mb-3">Life Elixir Achieves Record-Breaking Blood Collection Drive</h3>
                                <p>Thanks to the support of over 2,000 volunteers, Life Elixir successfully organized one of
                                    the largest blood drives in the region.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="/user/images/blog/blog_02.jpg" alt="">
                            </div>
                            <div class="detail mt-2">
                                <h3 class="mb-3">Community Collaboration Brings Mobile Donation Vans to Rural Areas</h3>
                                <p>In partnership with local clinics, Life Elixir has launched mobile donation vans to reach
                                    under-served communities. </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="/user/images/blog/blog_03.jpg" alt="">
                            </div>
                            <div class="detail mt-2">
                                <h3 class="mb-3">Youth Donor Week Empowers First-Time Donors</h3>
                                <p>Our Youth Donor Week campaign engaged students from 20 universities, encouraging young
                                    adults to become lifelong blood donors. </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card">
                            <div class="image">
                                <img src="/user/images/blog/blog_04.jpg" alt="">
                            </div>
                            <div class="detail mt-2">
                                <h3 class="mb-3">Emergency Drive Saves Lives After Flood Disaster</h3>
                                <p>Life Elixir launched an emergency blood drive that delivered over 500 urgently needed
                                    blood units to local hospitals within 48 hours.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

@endsection
