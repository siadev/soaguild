<?php

$clientConfig = new fkooman\OAuth\Client\ClientConfig(
array(
"authorize_endpoint" => "http://soaguild.dev/oauth_wow",
"client_id" => env('WOW_API'),
"client_secret" => env('WOW_SECRET'),
"token_endpoint" => "https://us.battle.net/oauth/token",
)
);

try {
$tokenStorage = new fkooman\OAuth\Client\SessionStorage();
$httpClient = new Guzzle\Http\Client();
$cb = new fkooman\OAuth\Client\Callback("http://soaguild.dev/oauth_wow", $clientConfig, $tokenStorage, $httpClient);
$cb->handleCallback($_GET);

header("HTTP/1.1 302 Found");
header("Location: http://soaguild.dev");
exit;
} catch (fkooman\OAuth\Client\Exception\AuthorizeException $e) {
// this exception is thrown by Callback when the OAuth server returns a
// specific error message for the client, e.g.: the user did not authorize
// the request
die(sprintf("ERROR: %s, DESCRIPTION: %s", $e->getMessage(), $e->getDescription()));
} catch (Exception $e) {
// other error, these should never occur in the normal flow
die(sprintf("ERROR: %s", $e->getMessage()));
}
