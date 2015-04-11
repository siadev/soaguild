@extends('master')

@section('breadcrumbs', Breadcrumbs::render('feeds'))

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
    <h1>Activity Feeds</h1>

    <SECTION id="feeds"  ng-app>
        <!-- Test outside loop Works Fine  -->
        <a href="http://www.wowhead.com/item=109174"></a>

        <div ng-controller="FeedsController">

            <p>Guild Achievements: <b>@{{ guild_feed.achievementPoints }}</b></p>

            <div ng-repeat="topic in news">
                <div ng-switch="topic.type">
                    <div ng-switch-when="itemCraft">
                        @{{topic.character}} Created:
                        <a href="http://www.wowhead.com/item=@{{topic.itemId}}">@{{topic.itemId}}</a>
                        {{--<p><a href="http://www.wowhead.com/item=@{{topic.itemId}}"></a></p>--}}
                        <hr/>
                    </div>
                    <div ng-switch-when="itemLoot">
                        <span class="color:red;">
                            @{{ dt = new DateTime("topic.itemId");}}
                            @{{ dt->format('Y-m-d H:i:s'); }}
{{--                            {{ date('d-F-y H:i:s',1426947780000) }}--}}

                        </span>
                        {{--@{{topic.timestamp}}--}}

                        {{--{{ date('d F y', 1427025900000) }}--}}
                        {{--Test: {{ $test }}--}}

                        <b>@{{topic.character}}</b> Looted: <a href="http://www.wowhead.com/item=@{{topic.itemId}}">@{{topic.itemId}}</a>
                        <hr/>
                    </div>
                    <div ng-switch-when="itemPurchase"  class="hunter">
                        @{{topic.character}} Purchased: <a href="http://www.wowhead.com/item=@{{topic.itemId}}">@{{topic.itemId}}</a>
                        <hr/>
                    </div>
                </div>


            </div>
        </div>

    </SECTION>


@endsection
<script src="/js/feeds.js"> </script>