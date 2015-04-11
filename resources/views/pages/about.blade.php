@extends('master')

@section('breadcrumbs', Breadcrumbs::render('about'))

@section('styles')
    
@endsection

@section('scripts')
    
@endsection

@section('content')
    <SECTION id="about">
        <ARTICLE>
            <h1>Who we are . . .</h1>
            <p>The Journey with dungeon and dragons began with Buldur's gate where my main charracter's name was Borca.</p>
            <p>
                I was introduced to World of Warcraft in 2006 joining a guild called The Posse. After completing many dungeons and raids
                The Posse disbanded and moved server because the GM lived in the US and his night shift job rotated.
                It was then around 2007, I started a guild called Supreme Assassins. The same guild has changed name to Sons of Anarchy in 2012.
            </p>
            <p>
                Sons of Anarchy (Supreme Assassins) has had a long journey through the realm of Dreadmaul.
                We have made many allies and conquered great foes.
                It is now here in the latest WoW expansion, Warlords of Draenor that we expand our journey.
                We look for new friends and allies.
            </p>
            <p>
                I stopped playing WoW in 2012, returning to WoD Late December 2014. Now that I have explored this new land,
                I wish to continue the experience with friends and family re-building a social guild. . .
            </p>
        </ARTICLE>
    </SECTION>
    <section class="centered">
        <article>
            <img src="/images/animation/dog.gif" alt=""/>
            <img src="/images/spacer-15.png" style="width: 20px"/>
            <img src="/images/animation/firedup.gif" alt=""/>
            <img src="/images/spacer-15.png" style="width: 20px"/>
            <img src="/images/animation/flying.gif" alt=""/>
            <img src="/images/spacer-15.png" style="width: 20px"/>
            <img src="/images/animation/skull.gif" alt=""/>
        </article>
        <article>
            <img src="/images/animation/southpark.gif" alt=""/>
        </article>
    </section>

@endsection
