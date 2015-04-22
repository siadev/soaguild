<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\MinkExtension\Context\MinkContext ;
use Illuminate\Support\Facades\Auth;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use Migrator, DatabaseTransactions;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    /*
     *  Fields for Login or Registration methods
     */
    private $main_toon;
    private $email;

    public function __construct()
    {

    }


    /**
     * @Then wait :arg1 seconds
     */
    public function waitSeconds($seconds)
    {
        $this->getSession()->wait(1000*$seconds);
    }


    /**
     * @When I Sign In
     */
    public function iSignIn()
    {
        $this->visit('auth/login');

        $this->fillField('email', $this->email);

        $this->fillField('password', 'password');

        $this->pressButton('Login');
    }

    /**
     * @When I sign in with invalid credentials
     */
    public function iSignInWithInvalidCredentials()
    {
        $this->email = 'invalid@example.com';
        $this->iSignIn();
    }

    /**
     * @Given I have an account :main_toon :email
     * @param $main_toon
     * @param $email
     */
    public function iHaveAnAccount($main_toon, $email)
    {
        $this->iRegister($main_toon, $email);
        $this->visit("auth/logout");

    }


    /**
     * @When I register :main_toon :email
     * @param $main_toon
     * @param $email
     */
    public function iRegister($main_toon, $email)
    {
        $this->main_toon = $main_toon;
        $this->email = $email;

        $this->visit('auth/register');

        $this->fillField('main_toon', $main_toon);
        $this->fillField('email', $email);
        $this->fillField('password', 'password');
        $this->fillField('password_confirmation', 'password');

        $this->pressButton('Register');

        $this->printLastResponse();  // <===  Display response useful for errors.

    }

    /**
     * @Then I should have an account
     */
    public function iShouldHaveAnAccount()
    {
        $this->assertSignedIn();
    }


    /**
     * @Then I should be logged in
     */
    public function iShouldBeLoggedIn()
    {
        $this->assertSignedIn();
    }



    /**
     * @Then I should not be logged in
     */
    public function iShouldNotBeLoggedIn()
    {
        PHPUnit::assertTrue(Auth::guest());

    }
    /**
     *
     */
    private function assertSignedIn()
    {
        PHPUnit::assertTrue(Auth::check());

        // $this->assertPageAddress('home');
    }
}
