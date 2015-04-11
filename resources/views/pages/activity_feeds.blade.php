@extends('master')

@section('styles')
    
@endsection

@section('scripts')
    <script type="text/javascript" id="myjsonp"></script>

    <!-- Wowhead Tooltip Scripts -->
    <script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
    <script>
        var wowhead_tooltips = {
            "colorlinks": true,
            "iconizelinks": true,
            "renamelinks": true
        }
    </script>
@endsection


@section('content')
    <section>
        <article id="feeds">
            <h1>Activity Feed</h1>
            @if (count($json->news) < 1)
                <div class="alert alert-danger" role="alert">
                    <h1>Battlenet or World of Warcraft is Down</h1>
                    <b>try again later . . .</b>
                </div>
            @else
                <ul class="list-group">

                <?php
                foreach ($json->news as $toon) {

                    $epoch = (int) substr($toon->timestamp,0,10);
                    $dt = new DateTime("@$epoch"); // convert UNIX timestamp to PHP DateTime
                    $stampDate = $dt->format('d-m-Y'); // output = 2012-08-15 00:00:00
                    $stampTime = $dt->format('H:i A');
                    $timestamp = $stampDate . "  Time: " . $stampTime;

                    echo '<li class="list-group-item">'
                            . '<b>Player:       ' . $toon->character . '</b><br>'
                            . 'When: ' . $timestamp . '<br>';


                    if ( $toon->type == 'playerAchievement' )
                    {
                        echo 'Achievement: ' . $toon->achievement->title . '<br>';
                        echo 'Description: ' . $toon->achievement->description . '<br>';
                        echo 'Points: ' . $toon->achievement->points . '<br>';

                    } else {
                        try {
                            echo '<a href="http://www.wowhead.com/item=' . $toon->itemId . '"></a>';
                        } catch (Exception $e) {
                            echo '';
                        }
                    }


                    echo  '</li>' ;

                }
            ?>
            </ul>
        @endif

        </article>
    </section>
@endsection
