@extends('master')
@section('breadcrumbs', Breadcrumbs::render('guildmembers'))

@section('styles')
    
@endsection

@section('scripts')
    
@endsection


@section('content')
    <h1>Retrieving Members</h1>



    <SECTION id="guild-members"  ng-app>
        <div>
            <label for="name">Name</label><input type="text" ng-model="name"/>
        </div>
        <div>
            <input type="checkbox" ng-model="checked"/><label>Hide</label>
        </div>
        <div ng-show="checked" class="page">
            Hello @{{ name || "world"  }}!
        </div>


        <div ng-controller="MembersController">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default" ng-repeat="toon in characters">
                    <div class="panel-heading" role="tab" id=@{{ @{{toon.character.name}}  }}>
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span ng-switch="toon.character.class">
                                    <div if-warrior  ng-switch-when="1"  class="warrior">@{{item}}
                                        @{{toon.character.name}} (Warrior)</div>
                                    <div if-palladin ng-switch-when="2"  class="paladin">
                                        @{{toon.character.name}} (Paladin)</div>
                                    <div if-hunter   ng-switch-when="3"  class="hunter">
                                        @{{toon.character.name}} (Hunter)</div>
                                    <div if-rogue    ng-switch-when="4"  class="rogue">
                                        @{{toon.character.name}} (Rogue)</div>
                                    <div if-priest   ng-switch-when="5"  class="priest">
                                        @{{toon.character.name}} (Priest)</div>
                                    <div if-hunter   ng-switch-when="6"  class="deathnight">
                                        @{{toon.character.name}} (deathnight)</div>
                                    <div if-rogue    ng-switch-when="7"  class="shaman">
                                        @{{toon.character.name}} (shaman)</div>
                                    <div if-priest   ng-switch-when="8"  class="mage">
                                        @{{toon.character.name}} (mage)</div>
                                    <div if-hunter   ng-switch-when="9"  class="warlock">
                                        @{{toon.character.name}} (warlock)</div>
                                    <div if-rogue    ng-switch-when="10" class="monk">
                                        @{{toon.character.name}} (monk)</div>
                                    <div if-priest   ng-switch-when="11" class="druid">
                                        @{{toon.character.name}} (druid)</div>
                                </span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Details:
                            level: @{{toon.character.level}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </SECTION>

    {{--<div id="wrapper" ng-app>--}}
        {{--<div>--}}
            {{--<label for="name">Name</label><input type="text" ng-model="name"/>--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<input type="checkbox" ng-model="checked"/><label>Hide</label>--}}
        {{--</div>--}}
        {{--<div ng-show="checked">--}}
            {{--Hello @{{ name || "world"  }}!--}}
        {{--</div>--}}

        {{--<div ng-controller="MembersController">--}}
            {{--<ol>--}}
                {{--<li ng-repeat="toon in characters">--}}
                    {{--<span ng-switch="toon.character.class">--}}
                        {{--<div if-warrior  ng-switch-when="1"  class="warrior">--}}
                            {{--@{{toon.character.name}} (Warrior)</div>--}}
                        {{--<div if-palladin ng-switch-when="2"  class="paladin">--}}
                            {{--@{{toon.character.name}} (Paladin)</div>--}}
                        {{--<div if-hunter   ng-switch-when="3"  class="hunter">--}}
                            {{--@{{toon.character.name}} (Hunter)</div>--}}
                        {{--<div if-rogue    ng-switch-when="4"  class="rogue">--}}
                            {{--@{{toon.character.name}} (Rogue)</div>--}}
                        {{--<div if-priest   ng-switch-when="5"  class="priest">--}}
                            {{--@{{toon.character.name}} (Priest)</div>--}}
                        {{--<div if-hunter   ng-switch-when="6"  class="deathnight">--}}
                            {{--@{{toon.character.name}} (deathnight)</div>--}}
                        {{--<div if-rogue    ng-switch-when="7"  class="shaman">--}}
                            {{--@{{toon.character.name}} (shaman)</div>--}}
                        {{--<div if-priest   ng-switch-when="8"  class="mage">--}}
                            {{--@{{toon.character.name}} (mage)</div>--}}
                        {{--<div if-hunter   ng-switch-when="9"  class="warlock">--}}
                            {{--@{{toon.character.name}} (warlock)</div>--}}
                        {{--<div if-rogue    ng-switch-when="10" class="monk">--}}
                            {{--@{{toon.character.name}} (monk)</div>--}}
                        {{--<div if-priest   ng-switch-when="11" class="druid">--}}
                            {{--@{{toon.character.name}} (druid)</div>--}}
                    {{--</span>--}}
                    {{--level: @{{toon.character.level}}<br/>--}}
                {{--</li>--}}
            {{--</ol>--}}

        {{--</div>--}}

    {{--</div>--}}

@endsection

<script src="/js/members.js"> </script>