@extends('layouts.main')


@section('title')
    <title>Slavens Realty Careers</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('nav')
    @include('partials.nav-inverse')
@endsection

@section('section')
    
    <header>
        <h1>Current Career Opportunities:</h1>
    </header>
    
    <div id="container">
        <section>
            <h2>Licensed Realtor - Part Time</h2>
            <p>
                Come join our team of dedicated agents, where we seek the best deals in Buying, Selling and Leasing Residential Homes for
                our treasured clients in San Diego!
            </p>
            <p>
                Who said Real estate has to be boring? Don’t waste your time and energy at a
                place that doesn’t deserve you! Work with us to nurture your talent to the fullest.
            </p>
            <h3>What we offer:</h3>
            <ul>
                <li>Flexibility to work from home</li>
                <li>Experienced and cooperative broker to work with</li>
                <li>Broker support to guide you and assist you</li>
                <li>Competitive commission</li>
            </ul><br>
            <h3>All we want from you is:</h3>
            <ul>
                <li>A CA BRE Real Estate License in good standing</li>
                <li>Realtor® Association Member (or willing to become one)</li>
                <li>A reliable as well as insured car to guarantee maximum safety</li>
                <li>An amalgamation of persistence, unfettered determination, enthusiasm
                and a never-say- die attitude</li>
                <li>A high moral conduct and uncompromising ethical standards</li>
            </ul>
            <br>
            <p>
                Are you willing to undertake the task at
                hand?
            </p>

            <h3>All you need to do is:</h3>
            <ul>
                <li>Target new clients to bring into Slavens Realty for an unparalleled real
                estate experience</li>
                <li>Work with the goal to convert prospective leads into sales</li>
                <li>Show property to clients with patience, relevant knowledge and
                commitment</li>
                <li>Efficiently and cordially communicate with other agents, company staff and
                third parties</li>
                <li>Supervise the closing of transactions, offering assistance till the very end</li>
            </ul>

            <p>If you think you qualify - Click <a href="/careers/apply/for/Agent">Apply Now</a></p>

        </section>
        <section>

            <h2>Transaction Coordinator - Part Time</h2>
            <h3>Duties include:</h3>
            <ul>
                <li>Checking documents for accuracy and signatures</li>
                <li>Communicating well with agents and clients</li>
                <li>Maintaining confidentiality with clients</li>
                <li>Data Entry</li>
                <li>Using proprietary and 3rd party software systems to complete tasks</li>
            </ul>
            <h3>Requirements</h3>
            <ul>
                <li>Excellent typing and data entry skills</li>
                <li>Excellent communiction skills</li>
                <li>Windows and Internet Skills</li>
                <li>Attention to detail</li>
                <li>Moderate Temperment</li>
                <li>Able to handle stress and not take things personally</li>
                <li>Pass a criminal background check (no criminal record)</li>
            </ul>

            <a href="/careers/apply/for/Transaction-Coordinator">Apply Now</a>

        </section>
        
    </div>
    {{-- container --}}

@endsection
    

@section('footer')
    @include('partials.footer2')
@endsection