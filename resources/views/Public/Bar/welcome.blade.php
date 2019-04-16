@include('Public.Bar.layouts.app')

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<!-- Header -->
<header id="fullwidth" class="homepage">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Heading Title Area -->
                <div class="header-text white text-center text-uppercase">

                    <div class="row">
                        <img src="assets/media/logo/club-charleys-logo.jpg" alt="Club Charley's Logo" class="img-responsive" style="display:inline-block;">
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                            <h1 class="titlebg pddn-20-top pddn-20-btm"> Southeast Idaho's ONLY gay bar, where Respect is the # 1 rule and everyone is welcome.</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2 class="white"> </h2>
                            <h3 class="mrgn-50-top white sm-title"><span class="date">331 E Center St </span></h3>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- /.Heading Title Area -->



            </div>
        </div>
    </div>
    <!-- /.container -->
</header>
<!-- /.Header -->

<!-- Event Features -->
{{--<section id="event-features">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<!-- Feature 01 -->--}}
            {{--<div class="col-md-3 col-sm-6  col-xs-6"> <img src="assets/media/icons/svgs/ideas.svg" width="49" height="80" class="img-responsive" alt="Ideas" />--}}
                {{--<h2 class="accent">Events</h2>--}}
                {{--<p> Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>--}}
            {{--</div>--}}
            {{--<!-- /.Feature 01 -->--}}
            {{--<!-- Feature 02 -->--}}
            {{--<div class="col-md-3 col-sm-6  col-xs-6"> <img src="assets/media/icons/svgs/discussions.svg" width="76" height="80" class="img-responsive" alt="Discussions" />--}}
                {{--<h2 class="accent">Angels</h2>--}}
                {{--<p> Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>--}}
            {{--</div>--}}
            {{--<!-- /.Feature 02 -->--}}
            {{--<!-- Feature 03 -->--}}
            {{--<div class="col-md-3 col-sm-6  col-xs-6"> <img src="assets/media/icons/svgs/exhibitions.svg" width="76" height="80" class="img-responsive" alt="Exhibitions" />--}}
                {{--<h2 class="accent">Specials</h2>--}}
                {{--<p> Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>--}}
            {{--</div>--}}
            {{--<!-- /.Feature 03 -->--}}
            {{--<!-- Feature 04 -->--}}
            {{--<div class="col-md-3 col-sm-6  col-xs-6"> <img src="assets/media/icons/svgs/workshops.svg" width="70" height="70" class="img-responsive" alt="Workshops" />--}}
                {{--<h2 class="accent">Location</h2>--}}
                {{--<p> Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>--}}
            {{--</div>--}}
            {{--<!-- /.Feature 04 -->--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</section>--}}
<!-- /.Event Features -->
<span id="events"></span>
<!-- Events -->
<section id="highlight">
    <div class="container">
        <!-- Title & Subtitle -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-white">
                    <h2 class="text-center"><span>Events</span></h2>
                    <p class="subtitle white text-center">Upcoming Events</p>
                    <p class="subtitle text-center"><i class="fa fa-angle-down fa-lg white"></i></p>
                </div>
            </div>
        </div>
        <!-- /.Title & Subtitle -->

        <!-- CTA Boxes -->
        <div class="row">
            @foreach($events as $event)
                <div class="col-sm-4">
                    <!-- News Item 01 -->
                    <div class="news-item">
                        <div class="image">
                            <div class="date"><span class="day">{{  $event->start_date->format('j')}} </span><span class="month">{{  $event->start_date->format('M')}}</span></div>
                            <img src="{{  $event->images->first()['image_path'] }}" class="img-responsive center-block" alt="Get Your Tickets"></div>
                        <div class="details">
                            <h3>{{  $event->title }}</h3>
                            <h4>{{ $event->start_date->format('l -  F jS') }} </h4>
                            <span property="startDate" content="{{ $event->start_date->toIso8601String() }}">
                                {{ $event->start_date->format('g:i A') }}
                            </span>
                                -
                            <span property="endDate" content="{{ $event->end_date->toIso8601String() }}">
                                 @if($event->start_date->diffInHours($event->end_date) <= 12)
                                    {{ $event->end_date->format('g:i A') }}
                                @else
                                    {{ $event->end_date->format('g:i A') }}
                                @endif
                            </span>
                            <p> {{ $event->description }}</p>
                            @if($event->happening_now)
                                This event is happening Now
                            @else
                                <span id="countdown"></span>
                            @endif
                            @if($event->start_date->isPast())
                                <div class="alert alert-boring">
                                    This event has {{($event->end_date->isFuture() ? 'already started' : 'ended')}}.
                                </div>
                            @else
                                <p><a href="{{ $event->event_url }}" class="btn btn-main-ghost btn-block">Tickets</a></p>
                            @endif
                        </div>
                        <footer>

                        </footer>
                    </div>
                    <!-- /.News Item 01 -->
                </div>




            @endforeach
        </div>
        <!-- /.CTA Boxes -->
    </div>
    <!-- /.container -->
    <!-- Speaker CTA Button -->
    <div class="row">
        <div class="col-md-12">
            <p class="mrgn-50-top text-center"><a href="/o/1" class="btn btn-main-ghost">View All Upcoming Events</a></p>
        </div>
    </div>
    <!-- /.Speaker CTA Button -->
</section>
<!-- /.Events -->
<span id="angels"></span>
<!-- Angels -->
<section id="speakers">

    <div class="container">
        <!-- Title & Subtitle -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="text-center"><span>Charley's Angels</span></h2>
                    <p class="subtitle text-center">Performing the first weekend of every month</p>
                    <p class="subtitle text-center"><i class="fa fa-angle-down fa-lg"></i></p>
                </div>
            </div>
        </div>
        <!-- /.Title & Subtitle -->

        <!-- Speakers List -->
        <div class="row">
            <div class="col-md-3 col-sm-6 text-center">
                <!-- Speaker 01 -->
                <div class="speaker-item">
                    {{--<a href="/angels#spyke">--}}
                        <figure class="speaker accent-bg"> <img src="assets/media/angels/spyke-naugahyde.jpg" width="300" height="300" alt="Spyke Naugahyde" class="img-responsive center-block" />
                            <figcaption>
                                <p class="text-uppercase accent">Spyke</p>
                                <p>Naugahyde</p>
                            </figcaption>
                        </figure>
                    </a>
                    <p><span class="speaker-accent">Spyke Naugahyde</span><br/>
                        Pocatello, ID</p>
                </div>
                <!-- /.Speaker 01 -->
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <!-- Speaker 03 -->
                <div class="speaker-item">
                    {{--<a href="/angels#annie">--}}
                        <figure class="speaker accent-bg"> <img src="assets/media/angels/annie-rexia.jpg" width="300" height="300" alt="Annie Rexia" class="img-responsive center-block" />
                            <figcaption>
                                <p class="text-uppercase accent">Annie</p>
                                <p>Rexia</p>
                            </figcaption>
                        </figure>
                    </a>
                    <p><span class="speaker-accent">Annie Rexia</span><br/>
                        Pocatello, ID</p>
                </div>
                <!-- /.Speaker 03 -->
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <!-- Speaker 02 -->
                <div class="speaker-item">
                    {{--<a href="/angels#miss-jay">--}}
                        <figure class="speaker accent-bg"> <img src="assets/media/angels/miss-jay.jpg" width="300" height="300" alt="Miss Jay" class="img-responsive center-block" />
                            <figcaption>
                                <p class="text-uppercase accent">Miss Jay</p>
                                <p>St John</p>
                            </figcaption>
                        </figure>
                    </a>
                    <p><span class="speaker-accent">Miss Jay St John</span><br/>
                        Rexburg, ID</p>
                </div>
                <!-- /.Speaker 02 -->
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <!-- Speaker 04 -->
                <div class="speaker-item">
                    {{--<a href="/angels#ashley">--}}
                        <figure class="speaker accent-bg"> <img src="assets/media/angels/ashley-liquor.jpg" width="300" height="300" alt="Ashley" class="img-responsive center-block" />
                            <figcaption>
                                <p class="text-uppercase accent">Ashley</p>
                                <p>Liquor</p>
                            </figcaption>
                        </figure>
                    </a>
                    <p><span class="speaker-accent">Ashley Liquor</span><br/>
                        Pocatello, ID</p>
                </div>
                <!-- /.Speaker 04 -->
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <!-- Speaker 04 -->
                <div class="speaker-item">
                    {{--<a href="/angels#nikki">--}}
                        <figure class="speaker accent-bg"> <img src="assets/media/angels/nikki.jpg" width="300" height="300" alt="Nikki" class="img-responsive center-block" />
                            <figcaption>
                                <p class="text-uppercase accent">Nikki</p>
                                <p>Naugahyde</p>
                            </figcaption>
                        </figure>
                    </a>
                    <p><span class="speaker-accent">Nikki Naugahyde</span><br/>
                        Pocatello, ID</p>
                </div>
                <!-- /.Speaker 04 -->
            </div>


        </div>
        <!-- /.Speakers List -->


    </div>
    <!-- /.container -->
</section>
<!-- /.Angels -->

<span id="specials"></span>
<!-- Schedule Timeline -->
<section id="schedule">
    <div class="container">
        <!-- Title & Subtitle -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="text-center"><span>Weekly Schedule</span></h2>
                    <p class="subtitle text-center">There is always something going on at Club Charley's!<br>Come down and relax with friends and a cocktail.</p>
                    <p class="subtitle text-center"><i class="fa fa-angle-down fa-lg"></i></p>
                </div>
            </div>
        </div>
        <!-- /.Title & Subtitle -->
        <!-- Timeline -->
        <div id="timeline">
            <!-- Timeline Item 01 -->
            <div class="timeline-item">
                <div class="timeline-icon"> <i class="fa fa-beer fa-lg"></i> </div>
                <div class="timeline-content">
                    <h2>Monday</h2>
                    <p>Start the week off with Karaoke with Spyke! <br>$1.75 domestic drafts <br> Fill your Charley's mug with wells for $4.50 all night long</p>
                    <span class="label label-main">Quarter Beers from 9-11 / Mug Wells $4.50</span> </div>
            </div>
            <!-- /.Timeline Item 01 -->

            <!-- Timeline Item 02 -->
            <div class="timeline-item">
                <div class="timeline-icon"> <i class="fa fa-glass fa-lg"></i></div>
                <div class="timeline-content right">
                    <h2>Tuesday</h2>
                    <p>After you finish your tacos, head down to Charley's for Trivia/Game Night stating at 9. <br>
                       Enjoy $1.75 domestic drafts all night long and after trivia, stick around for Karaoke with Spyke.</p>
                    <span class="label label-main">$2.25 Wells from 10-12  / $1.75 drafts</span> </div>
            </div>
            <!-- /.Timeline Item 02 -->

            <!-- Timeline Item 03 -->
            <div class="timeline-item">
                <div class="timeline-icon"> <i class="fa fa-star fa-lg"></i> </div>
                <div class="timeline-content">
                    <h2>Wednesday</h2>
                    <p>End your hump day with Drag Bingo hosted by Spyke. Enjoy the game, laughs and $1.75 domestic drafts $1.75 and $2.25 wells all night long!    </p>
                    <span class="label label-main">$2.25 Wells / $1.75 Drafts</span> </div>
            </div>
            <!-- /.Timeline Item 03 -->

            <!-- Timeline Item 04 -->
            <div class="timeline-item">
                <div class="timeline-icon"> <i class="fa fa-glass fa-lg"></i></div>
                <div class="timeline-content right">
                    <h2>Thursday</h2>
                    <p>It's time to laugh!  Coors Light / Miller Comedy Night starts at 9!</p>
                    <span class="label label-main">Random Specials! Ask a Bartender</span> </div>
            </div>
            <!-- /.Timeline Item 04 -->
            <!-- Timeline Full Schedule Link -->
            <div class="timeline-item">
                <div class="timeline-icon"> <a href="schedule.html"><i class="fa fa-angle-double-down fa-2x"></i></a> </div>
            </div>
            <!-- /.Timeline Full Schedule Link -->
        </div>
        <!-- /.Timeline -->
    </div>
    <!-- /.container -->
</section>
<!-- /.Schedule Timeline -->

{{--<!-- Section Pricing -->--}}
{{--<section id="pricing">--}}
    {{--<div class="container">--}}
        {{--<!-- Title & Subtitle -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="section-title-white">--}}
                    {{--<h2 class="text-center"><span>Registration</span></h2>--}}
                    {{--<p class="subtitle white text-center">Satisne ergo pudori consulat, si quis sine teste libidini pareat</p>--}}
                    {{--<p class="subtitle text-center"><i class="fa fa-angle-down fa-lg white"></i></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Title & Subtitle -->--}}

        {{--<!-- Pricing Passes -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- Pricing Pass 01 -->--}}
                {{--<div class="white-bg">--}}
                    {{--<div class="ribbon-wrapper-dark">--}}
                        {{--<div class="ribbon-dark">Early Bird</div>--}}
                    {{--</div>--}}
                    {{--<h3 class="text-uppercase text-center pddn-20-top pddn-10-btm">Design Pass</h3>--}}
                    {{--<div class="accent-bg pddn-20-top-btm text-center">--}}
                        {{--<p class="price">$<span class="text-bigger">358</span></p>--}}
                    {{--</div>--}}
                    {{--<ul class="list-pricing">--}}
                        {{--<li>Attend the design show </li>--}}
                        {{--<li>Access to all lectures </li>--}}
                        {{--<li>A choice of 1 workshop</li>--}}
                    {{--</ul>--}}
                    {{--<p class=" pddn-20-btm text-center"><a href="#" class="btn btn-main-ghost">Book a Ticket</a></p>--}}
                {{--</div>--}}
                {{--<!-- /.Pricing Pass 01 -->--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- Pricing Pass 02 -->--}}
                {{--<div class="white-bg">--}}
                    {{--<div class="ribbon-wrapper-dark">--}}
                        {{--<div class="ribbon-dark">Early Bird</div>--}}
                    {{--</div>--}}
                    {{--<h3 class="text-uppercase text-center pddn-20-top pddn-10-btm">Tech Pass</h3>--}}
                    {{--<div class="accent-bg pddn-20-top-btm text-center">--}}
                        {{--<p class="price">$<span class="text-bigger">545</span></p>--}}
                    {{--</div>--}}
                    {{--<ul class="list-pricing">--}}
                        {{--<li>Attend the tech show </li>--}}
                        {{--<li>Access to all lectures </li>--}}
                        {{--<li>A choice of 3 workshop</li>--}}
                    {{--</ul>--}}
                    {{--<p class=" pddn-20-btm text-center"><a href="#" class="btn btn-main-ghost">Book a Ticket</a></p>--}}
                {{--</div>--}}
                {{--<!-- /.Pricing Pass 02 -->--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- Pricing Pass 03 -->--}}
                {{--<div class="white-bg">--}}
                    {{--<div class="ribbon-wrapper-dark">--}}
                        {{--<div class="ribbon-dark">Early Bird</div>--}}
                    {{--</div>--}}
                    {{--<h3 class="text-uppercase text-center pddn-20-top pddn-10-btm">Ultimate Pass</h3>--}}
                    {{--<div class="accent-bg pddn-20-top-btm text-center">--}}
                        {{--<p class="price">$<span class="text-bigger">850</span></p>--}}
                    {{--</div>--}}
                    {{--<ul class="list-pricing">--}}
                        {{--<li>Attend both shows </li>--}}
                        {{--<li>Access to all lectures </li>--}}
                        {{--<li>Access to all workshops</li>--}}
                    {{--</ul>--}}
                    {{--<p class=" pddn-20-btm text-center"><a href="#" class="btn btn-main-ghost">Book a Ticket</a></p>--}}
                {{--</div>--}}
                {{--<!-- /.Pricing Pass 03 -->--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Pricing Passes -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</section>--}}
{{--<!-- /.Section Pricing -->--}}




{{--<span id="bartenders"></span>--}}
{{--<!-- Section Sponsors -->--}}
{{--<section id="sponsors">--}}
    {{--<div class="container">--}}
        {{--<!-- Title & Subtitle -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="section-title">--}}
                    {{--<h2 class="text-center"><span>Your Bartenders</span></h2>--}}
                    {{--<p class="subtitle text-center"></p>--}}
                    {{--<p class="subtitle text-center"><i class="fa fa-angle-down fa-lg"></i></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Title & Subtitle -->--}}

        {{--<!-- Sponsors List -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/joey.jpg" width="230" height="150" alt="" />Joey</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/red.jpg" width="230" height="150" alt="" />Red</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/joey.jpg" width="230" height="150" alt="" />Joey</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/red.jpg" width="230" height="150" alt="" />Red</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/joey.jpg" width="230" height="150" alt="" />Joey</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 mrgn-20-top-btm"><img class="img-responsive center-block" src="assets/images/bartenders/red.jpg" width="230" height="150" alt="" />Red</div>--}}
        {{--</div>--}}
        {{--<!-- /.Sponsors List -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</section>--}}
<!-- /.Section Sponsors -->

{{--<!-- Section Latest News -->--}}
{{--<section id="latest-news">--}}
    {{--<div class="container">--}}
        {{--<!-- Title & Subtitle -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="section-title">--}}
                    {{--<h2 class="text-center"><span>Latest News</span></h2>--}}
                    {{--<p class="subtitle text-center">Satisne ergo pudori consulat, si quis sine teste libidini pareat</p>--}}
                    {{--<p class="subtitle text-center"><i class="fa fa-angle-down fa-lg"></i></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Title & Subtitle -->--}}

        {{--<!-- Latest News List -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- News Item 01 -->--}}
                {{--<div class="news-item">--}}
                    {{--<div class="image">--}}
                        {{--<div class="date"><span class="day">19</span><span class="month">SEP</span></div>--}}
                        {{--<img src="assets/media/news/latest-news-03.jpg" class="img-responsive center-block" alt="Get Early-bird Tickets"></div>--}}
                    {{--<div class="details">--}}
                        {{--<h3>Get Early-bird Tickets</h3>--}}
                        {{--<p> Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. </p>--}}
                        {{--<p><a href="latest-news.html#news-item1" class="btn btn-main-ghost btn-block">Read More</a></p>--}}
                    {{--</div>--}}
                    {{--<footer>--}}
                        {{--<div class="views"><i class="fa fa-eye"></i> 150</div>--}}
                        {{--<div class="love"><i class="fa fa-heart"></i> 33</div>--}}
                        {{--<div class="comments"><i class="fa fa-comments"></i> 23</div>--}}
                    {{--</footer>--}}
                {{--</div>--}}
                {{--<!-- /.News Item 01 -->--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- News Item 02 -->--}}
                {{--<div class="news-item">--}}
                    {{--<div class="image">--}}
                        {{--<div class="date"><span class="day">12</span><span class="month">SEP</span></div>--}}
                        {{--<img src="assets/media/news/latest-news-02.jpg" class="img-responsive center-block" alt="Speakers Announced"></div>--}}
                    {{--<div class="details">--}}
                        {{--<h3>Speakers Announced</h3>--}}
                        {{--<p> Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. </p>--}}
                        {{--<p><a href="latest-news.html#news-item2" class="btn btn-main-ghost btn-block">Read More</a></p>--}}
                    {{--</div>--}}
                    {{--<footer>--}}
                        {{--<div class="views"><i class="fa fa-eye"></i> 150</div>--}}
                        {{--<div class="love"><i class="fa fa-heart"></i> 33</div>--}}
                        {{--<div class="comments"><i class="fa fa-comments"></i> 23</div>--}}
                    {{--</footer>--}}
                {{--</div>--}}
                {{--<!-- /.News Item 02 -->--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<!-- News Item 03 -->--}}
                {{--<div class="news-item">--}}
                    {{--<div class="image">--}}
                        {{--<div class="date"><span class="day">05</span><span class="month">SEP</span></div>--}}
                        {{--<img src="assets/media/news/latest-news-01.jpg" class="img-responsive center-block" alt="New York Web Buzz 2016"></div>--}}
                    {{--<div class="details">--}}
                        {{--<h3>New York Web Buzz 2016</h3>--}}
                        {{--<p> Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. </p>--}}
                        {{--<p><a href="latest-news.html#news-item3" class="btn btn-main-ghost btn-block">Read More</a></p>--}}
                    {{--</div>--}}
                    {{--<footer>--}}
                        {{--<div class="views"><i class="fa fa-eye"></i> 150</div>--}}
                        {{--<div class="love"><i class="fa fa-heart"></i> 33</div>--}}
                        {{--<div class="comments"><i class="fa fa-comments"></i> 23</div>--}}
                    {{--</footer>--}}
                {{--</div>--}}
                {{--<!-- /.News Item 03 -->--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Latest News List -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</section>--}}
{{--<!-- /.Section Latest News -->--}}

{{--<!-- Section Newsletter -->--}}
{{--<section id="newsletter">--}}
    {{--<div class="container">--}}
        {{--<!-- Title & Subtitle -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="section-title">--}}
                    {{--<h2 class="white text-center">Newsletter</h2>--}}
                    {{--<p class="subtitle white text-center">Sign up and stay in the loop</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Title & Subtitle -->--}}

        {{--<!-- Newsletter Form -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1 text-center">--}}
                {{--<form class="form-inline" id="newsletterForm" novalidate style="visibility: visible; animation-name: zoomIn;">--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="sr-only" for="Email"></label>--}}
                        {{--<input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." aria-invalid="false">--}}
                        {{--<p class="help-block text-danger"></p>--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-main-color">Subscribe</button>--}}
                    {{--<div id="success"></div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.Newsletter Form -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</section>--}}
{{--<!-- /.Section Newsletter -->--}}

<!-- Section Location -->
<section id="location">
    <div id="google-container"></div>
    <div id="cd-zoom-in"></div>
    <div id="cd-zoom-out"></div>
    <address>
        331 E Center St, Pocatello, ID 83204, USA
    </address>
</section>
<!-- /.Section Location -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 col-lg-9">
                <!-- Footer Menu List -->
                <ul class="list-inline">
                    <li><a href="#speakers">Speakers</a></li>
<li><a href="#highlight">Highlights</a></li>
<li><a href="#schedule">Schedule</a></li>
<li><a href="#sponsors">Sponsors</a></li>
<li><a href="#pricing">Tickets</a></li>
<li><a href="#location">Location</a></li>
</ul>
<!-- /.Footer Menu List -->
<p class="copyright white ">Copyright <i class="fa fa-copyright"></i> Club Charley's</p>
</div>
<div class="col-sm-4 col-md-3 col-lg-3">
    <!-- Footer Social Profiles List -->
    <ul class="list-inline social-buttons">
        <li> <a class="fa fa-twitter fa-lg" href="https://www.facebook.com/clubcharleys"></a> </li>
        <li> <a class="fa fa-facebook fa-lg" href="https://www.facebook.com/clubcharleys"></a> </li>
        <li> <a class="fa fa-linkedin fa-lg" href="https://www.facebook.com/clubcharleys"></a> </li>
        <li> <a class="fa fa-google-plus fa-lg" href="https://www.facebook.com/clubcharleys"></a> </li>
        <li> <a class="fa fa-pinterest-p fa-lg" href="https://www.facebook.com/clubcharleys"></a> </li>
    </ul>
    <!-- /.Footer Social Profiles List -->
</div>
</div>
</div>
</footer>

<!-- /.Footer -->

<!-- Bootstrap core JavaScript
*********************** -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/event-main.js"></script>

<!-- Plugins
*********************** -->
<!-- Custom styles for Google Map -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR-6voFdUopNQVVjhyA1C35OCNINLG3Go" type="text/javascript"></script>
<script src="assets/plugins/custom-google-map/ggl-map.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/js/owl.carousel.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<!-- Isotope JS -->
<script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/js/owl.carousel.js"></script>
<!-- Background Video -->
<script src="assets/plugins/bgvideo/backgroundVideo.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bgvideo').backgroundVideo({
            pauseVideoOnViewLoss: false
        });
    });
</script>
</body>
</html>