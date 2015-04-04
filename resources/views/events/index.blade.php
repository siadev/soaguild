@extends('master')

@section('breadcrumbs', Breadcrumbs::render('events'))

@section('styles')
    
@endsection

@section('scripts')
    
@endsection


@section('content')
    <article>
        <h1>Guild Events</h1>
        <p>Please look at your calendar daily for upcoming guild events.</p>
        <p>If you have a UI preventing the view of your calendar,
           (which by the way is on the top right of your mini map by default)
        </p>
            <article class="centered">
                <p><b>then type:</b></p>
                <img src="/images/calendar.jpg" alt="How to load Calendar Events in-game" title="How to load Calendar Events in-game"/>
            </article>

    </article>
    <article class="centered vspacer-30" >
        <p><img src="/images/monk.gif"/></p>
    </article>

@endsection
