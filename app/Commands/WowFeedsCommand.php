<?php namespace soaguild\Commands;

use soaguild\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class WowFeedsCommand extends Command implements SelfHandling {

    public $httpRequest;

    /**
     * Create a new command instance.
     *
     * @param $httpRequest
     */
	public function __construct($httpRequest)
	{
        $this->httpRequest = $httpRequest;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
        // Create array from http request to json
        // suppress the warnings by putting an @ in front of the file_get_contents:
        $html = @file_get_contents($this->httpRequest);
        $json = preg_replace('/,\s*([\]}])/m', '$1', utf8_encode($html));
        $json = json_decode($json);



        $this->httpRequest = !$json == null ? $json : [array('news')];

        return $json;
	}

}
