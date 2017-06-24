@extends('layouts.main')


@section('title')
    <title>Slavens Realty - About Us Page</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/about.css">
@endsection

@section('section')
    
    <header>
        <div class="name-address">
            
            <div class="name-title">
                <h1>Slavens Realty</h1>
                <h2>About Us</h2>
            </div>

            <h3 class="address">
                Address: 3399 Ruffin Rd. #M2, San Diego, CA 92123
            </h3>
            <h3 class="phone">
                Phone: 619-253-0529
            </h3>
    
        </div>

    </header>
    
    <div class="about-container">
        <section class="about">
            <div class="realtor">
                <h4>We are Realtors&reg;</h4>
                <p>We belong to the SDAR, CAR, NAR Realtor&reg; Associations</p>
                <p>
                    <blockquote cite="http://www.investopedia.com/terms/r/realtor.asp">Realtors&reg; are expected to be experts in their field and must follow the NAR's code of ethics, which requires agents to uphold specific duties to clients and customers, to the public and to other realtors. Among its many requirements, the code of ethics says that realtors "shall avoid exaggeration, misrepresentation, or concealment of pertinent facts relating to the property or the transaction;" "shall be honest and truthful in their real estate communications and shall present a true picture in their advertising, marketing and other representations;" and shall "pledge themselves to protect and promote the interests of their client" while treating all parties to the transaction honestly.
                </blockquote>
                </p>
            </div>
            <div class="years">
                <h4>14 Years!</h4>
                <p>We've been helping Buyer's and Seller's for over 14 Years! And we've seen and done almoste everything in Real Estate. So no matter what happens in your transaction, we've likely seen it before and probably more than once. We are ready to take on any challeng and lead you on a smooth path to your goal of buying or selling a home!</p>
            </div>
            <div class="local">
                <h4>Broker is a San Diego Native</h4>
                <p>
                <img src="/images/bradphoto.jpg">I grew up in San Diego! And I lived all over the county. Lakeside, El Cajon, Oceanside, Chula Vista, San Marcos, Del Mar, and San Diego City... So I know the ins and outs pretty well and can help my agents guide you through any transaction.</p>
            </div>
        </section>
    </div>
    
@endsection


@section('footer')
    @include('partials.footer2')
@endsection