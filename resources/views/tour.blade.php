<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Safari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #payment-form {
            display: none;
        }

        #left-tour {
    display: flex;
    flex-direction: column;
    border-radius: 35px !important;
}


#buy-button {
    border-radius: 40px;
    margin: 0px 25%;
}


    </style>
</head>
<body>

<section class="text-uppercase" style="background-color:#f8f9fa;">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/img/logo.png" alt="" style="height: 60px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Buy</a>
            </li>
      
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>
    </div>
</section>


<div class="container-fluid bg-light py-5 " style="background-image: url(/img/HeroImage.jpg);
    background-position: bottom;
    background-size: cover;
    z-index: 10;
    height: 80vh;
    display: flex;
    align-items: flex-end;
    background-blend-mode: overlay;
    background-color: #000000a1 !important;
    z-index: 10;">


    <div class="container py-5">
        <h1 class="display-5 fw-bold col-8 text-white">Experience the magic of Kenya with Pride Inn Kenya and Swahili Village Media USA</h1>
        <br/><br/>
        <a class="btn btn-warning btn-md text-white" href="#" role="button">EXPLORE PACKAGE</a>
    </div>
</div>

<div class="col-12" >
        <img src="/img/circle1-1 1.png" alt="" style="float: right; position: relative; top:-150px; width:15%; z-index: -5;  " >
    </div>

<section class="pb-40" style="background-image:url(/img/tour-bg.png) !important; background-position: bottom;
    background-size: cover;">
    <div class="container m-10" style="padding: 60px 0px !important">
    <div class="row align-items-center">
        <div id="left-tour" class="col-lg-6 col-md-12 p-4 col-sm-12 bg-warning rounded">
            <img src="/img/tour-image.png" alt="" class="mb-4 rounded img-fluid">
            <div>
                <h2 class="h5 fw-bold mb-4 text-dark">A 5-Night Luxury Safari Wellness Experience for the North American Diaspora</h2>
                <div id="details-section" class="mb-4 w-100 d-flex flex-wrap">
                    <div id="left-details-section" class="mb-4 px-3 w-50">
                        <ul class="list-unstyled text-white small" style=" 
    list-style: disc !important;
   ">
                            <li>Roundtrip transportation from your Nairobi area home</li>    
                            <li>2 Nights at a Maasai Mara lodge</li>
                            <li>3 nights at the luxurious paradise Beach Resort</li>
                            <li>Special dinner on the 3rd night at a cave Restaurant.</li>
                        </ul>
                    </div>
                    <div id="right-details-section" class="mb-4 w-50 bg-warning rounded p-4 text-center col-sm-12 col-lg-6 col-md-12" style="background-color:#ffd380 !important;">
                        <h1 class="h5 fw-bold text-dark display-5">$1998.00</h1>
                        <p class="text-dark fw-bold">for 2 adults and 2 children (5-day package)</p>
                    </div>
                    <button class="btn text-dark w-100 btn-light" id="buy-button">BUY NOW</button>
                </div>
                <div id="payment-form">
                    <form action="{{ route('payment.submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-dark">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <input type="hidden" name="price_id" value="price_1PVL5SDJMaw1PsX7yWqvGuas">
                        <button type="submit" class="btn text-dark w-100 btn-light" id="pay-now" >PAY NOW</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="right-tour" class="col-12 col-md-6 p-4 text-center">
            <h4 class="text-warning fw-bold">Awesome tours</h4>
            <h2 class="fw-bold">Best Holidays Package</h2>
            <p>Embark on an unforgettable journey through the heart of Kenya with our exclusive 5-night adventure package, specially designed for North American travelers.</p>
            <ul class="list-unstyled small text-warning text-start px-4" style="    display: flex !important;
    flex-direction: column !important;
    list-style: disc !important;
    align-items: stretch !important;
    padding-left: 25% !important;">
                <li>5-star beach front resort</li>
                <li>Full board meals (Breakfast, lunch, and dinner)</li>
                <li> 2 hours sessions of massage per adult this can be divided into different massages or 2 one hour sessions</li>
                <li>Kids’ corner with Swimming pool and water park access</li>
                <li>Ice cream party on the beach.</li>
                <li>Kone Kone Art Highlife music (until 2 pm)</li>
                <li>Hair Salon, 2 pedicures, and 2 manicures</li>
            </ul>
        </div>
    </div>
</div>
</section>

<section class="bg-light py-5" style="background-image: url(/img/Footer.png); background-size: contain;">
    <div class="container text-white">
        <div class="row text-start">
            <div class="col-lg-3">
                <img src="/img/Buy Safari Logo.png" alt="">
                <br/><br/>
                <h4>BUY SAFARI US</h4>
                <p>+254795654102 | +25495655232 | +254795655707</p>
                <p>Toll Free Number: 1833VisitKenya</p>
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3">
                <h4>Useful Links</h4>
                <img src="/img/links.png" alt="">
                <br/><br/>
                <ul class="list-unstyled" style="">
                    <li><a href="/" class="text-white text-decoration-none "> Home</a></li>
                    <li><a href="/about" class="text-white text-decoration-none  "> About Us </a></li>
                    <li>Contact Us</li>
                    <li>Log in</li>
                </ul>
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3">
                <h4>Our Social Media Handles</h4>
                <img src="/img/socials.png" alt="">
                <br/><br/>
                <img src="/img/fb_icon 1.png" alt="">
                <img src="/img/twitter_icon 1.png" alt="">
                <img src="/img/instagram_icon 1.png" alt="">
                <img src="/img/pinterest_icon 1.png" alt="">
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3">
                <h4>Log in</h4>
                <img src="/img/login.png" alt="">
                <br/><br/>
                <p>Log in</p>
            </div><!-- /.col-lg-3 -->
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col-lg-6">
                <p>Copyright @ 2024 <span style="color:#FFA800;">Buy Us Safari</span> All Rights Reserved By <span style="color:#FFA800;">Swahili Village Media</span></p>
            </div>
            <div class="col-lg-6 text-end">
                <p>Privacy | Terms & Conditions</p>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $("#buy-button").click(function(){
            $("#payment-form").show();
            $("#details-section").hide();
            $("#buy-button").hide();
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>