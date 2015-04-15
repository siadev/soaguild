<?php namespace soaguild\Http\Controllers;

use Illuminate\Contracts\Bus\Dispatcher;
use soaguild\Http\Requests;
use soaguild\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Add Command Classes
use soaguild\Commands\WowFeedsCommand;
use soaguild\Commands\WowApiFeedsCommandBus;
use soaguild\Commands\WowApiFeedsCommand;

class PagesController extends Controller {

    public $wow_Toon;
    public $wow_Api;
    public $wow_Realm;

    protected $commandBus;


    public function home()
    {
	$title = 'Home';
        return view('pages.home', compact('title'));
    }

    /**
     * About page.
     *
     * @return View
     */
    public function about()
    {
        return view('pages.about');

    }

    /**
     *  News page.
     *
     * @return View
     */
    public function news()
    {
        return view('pages.news');
    }

    public function feeds($wow_Realm = 'dreadmaul')
    {
        $title ='Activity Feeds';
        $this->wow_Api= env('WOW_API');
        $this->wow_Realm=$wow_Realm;

        // Build Http string to send to Command
        $httpRequest = "https://us.api.battle.net/wow/guild/"
            . $this->wow_Realm
            . "/sons%20of%20anarchy?fields=news&locale=en_US&apikey="
            . $this->wow_Api;

        // Instantiate Command Variable to parse.
        $command = new WowFeedsCommand($httpRequest);
        // $command = new WowApiFeedsCommandBus($httpRequest);
        // Call Self Handling Command through
        // the Laravel command bus (dispatcher).

        $json = $this->dispatch($command);

        return view('pages.activity_feeds', compact('title', 'wow_api', 'wow_realm', 'json'));
    }

    public function coc()
    {
            $title = "Code of Conduct";
            return view('pages.coc', compact('title'));
    }

    public function chat()
    {
        return view('pages.chat');
    }


}
