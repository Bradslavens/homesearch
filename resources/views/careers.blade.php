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
    
    
    <div id="container">
        <header>
            <h1>Current Career Opportunities:</h1>
        </header>

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

            <a href="{{route('apply.create')}}">Apply Now</a>

        </section>
        <section>

            <h2>Licensed Real Estate Agent - Part Time or Full Time</h2>
            <h3>Duties include:</h3>
            <ul>
                <li>Prospecting for new clients to bring into the firm</li>
                <li>Converting prospects into leads and sales</li>
                <li>Converting company leads into sales</li>
                <li>Showing property to clients</li>
                <li>Writing Purchase and Listing Agreements</li>
                <li>Meeting inspectors</li>
                <li>Communicating with other agents, company staff and 3rd parties</li>
                <li>Overseeing the closing of transactions</li>
            </ul>
            <h3>Requirements</h3>
            <ul>
                <li>CA BRE Real Estate License in good standing</li>
                <li>Reliable car and insurance</li>
                <li>Realtor<span class="trademark">&reg;</span></li>
                <li>Peristant, Enthusiastic, Determined</li>
                <li>High Ethical Standards</li>
            </ul>

            <a href="{{route('apply.create')}}">Apply Now</a>
            
        </section>
    </div>
    {{-- container --}}

@endsection
    

@section('footer')
    @include('partials.footer2')
@endsection