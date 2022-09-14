
<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Blood Banks</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach( $blood as $blood_banks)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img src="BankImage/{{$blood_banks->image}}" alt="">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{$blood_banks->name}}</p>
                            <span class="text-sm text-grey">{{$blood_banks->address}}</span>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</div>
