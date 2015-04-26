<h1>Callback !</h1>
<?php
use fkooman\OAuth\Client\Callback;
use fkooman\OAuth\Client\ClientConfig;
use fkooman\OAuth\Client\Exception\AuthorizeException;
use fkooman\OAuth\Client\SessionStorage;
use Guzzle\Http\Client;

$clientConfig = new ClientConfig(
array(
"authorize_endpoint" => "https://us.battle.net/oauth/authorize",
"client_id" => env('WOW_API'),
"client_secret" => env('WOW_SECRET'),
"token_endpoint" => "https://us.battle.net/oauth/token",
)
);

try {
$tokenStorage = new SessionStorage();
$httpClient = new Client();
$cb = new Callback("http://soaguild.dev/oauth_wow", $clientConfig, $tokenStorage, $httpClient);
$cb->handleCallback($_GET);
dd($cb);

header("HTTP/1.1 302 Found");
header("Location: http://soaguild.dev/home");
exit;
} catch (AuthorizeException $e) {
// this exception is thrown by Callback when the OAuth server returns a
// specific error message for the client, e.g.: the user did not authorize
// the request
die(sprintf("ERROR: %s, DESCRIPTION: %s", $e->getMessage(), $e->getDescription()));
} catch (Exception $e) {
// other error, these should never occur in the normal flow
die(sprintf("ERROR: %s", $e->getMessage()));
}


?>
