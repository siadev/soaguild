<?php
/**
 * Project Name: soaguild.dev
 * Filename:     WowLogin.php
 * Author:       simon
 * Created at:   24/04/15
 * Upated  at:   24/04/15
 *
 * Description:
 */
 

namespace soaguild;

use Exception;
use fkooman;
use fkooman\Guzzle\Plugin\BearerAuth\BearerAuth;
use fkooman\OAuth\Client\ClientConfig;
use Guzzle;


trait WowLogin
{
    /**
     * SET URL PARAMS
     *
     */
    public function wow_authenticated()
    {
        // SET URL PARAMS
        $apiUri = "https://us.battle.net/oauth";

        $clientConfig = new ClientConfig(
            array(
                "authorize_endpoint" => "https://us.battle.net/oauth/authorize",
                "client_id" => env('WOW_API'),
                "client_secret" => env('WOW_SECRET'),
                "token_endpoint" => "https://us.battle.net/oauth/token",
                "redirect_uri" => "http://soaguild.dev/callback/",
                "state" => "test",
                "scope" => 'wow.profile',

            )
        );

        $tokenStorage = new fkooman\OAuth\Client\SessionStorage();
        $httpClient = new Guzzle\Http\Client();
        $api = new fkooman\OAuth\Client\Api("http://soaguild.com/callback/", $clientConfig, $tokenStorage, $httpClient);

        $context = new fkooman\OAuth\Client\Context("wow.profile", array("authorizations"));

        $accessToken = $api->getAccessToken($context);

        if (false === $accessToken) {
            /* no valid access token available, go to authorization server */
            header("HTTP/1.1 302 Found");
            header("Location: " . $api->getAuthorizeUri($context));
            exit;
        }

        try {
            $client = new Guzzle\Http\Client();
            $bearerAuth = new BearerAuth($accessToken->getAccessToken());
            $client->addSubscriber($bearerAuth);
            $response = $client->get($apiUri)->send();
            header("Content-Type: application/json");
            echo 'SOA Response: ' . $response->getBody();
        } catch (fkooman\Guzzle\Plugin\BearerAuth\Exception\BearerErrorResponseException $e) {
            if ("invalid_token" === $e->getBearerReason()) {
                // the token we used was invalid, possibly revoked, we throw it away
                $api->deleteAccessToken($context);
                $api->deleteRefreshToken($context);
                /* no valid access token available, go to authorization server */
                dd('token: ' . $accessToken);

                header("HTTP/1.1 302 Found");
                header("Location: " . $api->getAuthorizeUri($context));
                exit;
            }
            throw $e;
        } catch (Exception $e) {
            die(sprintf('ERROR: %s', $e->getMessage()));
        }


    }



}