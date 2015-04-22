<?php 
/**
 * Project Name: soaguild.dev
 * Filename:     PagesAreLoadingCest.php
 * Author:       simon
 * Created at:   17/04/15
 * Upated  at:   17/04/15
 *
 * Description:
 */

use \SeleniumGuy as Guy;


class PagesAreLoadingCest {
    public function _before()
    {
    }

    public function _after()
    {
    }

    /**
     *-----------------
     * View Home Page
     *-----------------
     *
     * Feature:
     *   View the home page
     *
     *   WHO  ==> As a Guest
     *            With no access level
     *
     *   WHAT ==> I want to View the home page
     *
     * @param Guy $I
     */
    public function VewHomePage(Guy $I)
    {
        $I->wantTo('View Home Page');

        $I->amOnPage('/');
        $I->see('Welcome');
    }

    /**
     *-----------------
     * View About Page
     *-----------------
     *
     * Feature:
     *   View the home page
     *
     *   WHO  ==> As a Guest
     *            With no access level
     *
     *   WHAT ==> I want to View the About page
     *
     * @param Guy $I
     */
    public function VewAboutPage(Guy $I)
    {
        $I->wantTo('View About Page');

        $I->amOnPage('/about');
        $I->see('Who we are . . .');
    }


    /**
     *---------------
     * View News Page
     *---------------
     *
     * Feature:
     *   View the home page
     *
     *   WHO  ==> As a Guest
     *            With no access level
     *
     *   WHAT ==> I want to View the News page
     *
     * @param Guy $I
     */
    public function VewNewsPage(Guy $I)
    {
        $I->wantTo('View News Page');

        $I->amOnPage('/news');
        $I->see('Whats new?');
    }

    /**
     *--------------------
     * View live Chat Page
     *--------------------
     *
     * Feature:
     *   View the Live Chat page
     *
     *   WHO  ==> As a Guild Member
     *            With member access level
     *
     *   WHAT ==> I want to View the Live Chat page
     *
     * @param Guy $I
     */
    public function TestLiveChatPage(Guy $I)
    {
        $I->wantTo('View the Live Chat page');
        $this->login($I);

        $I->amOnPage('/chat');
        $I->see('chat page');
    }


    /**
     *------------------------
     * Protected login method
     *------------------------
     *
     * usage: $this->login($I);
     *
     * @param Guy $I
     */
    protected function login(Guy $I)
    {
        $I->amOnPage('auth/login');
        $I->see('Login');
        $I->fillField("[name=email]", "borca@soaguild.com");
        $I->fillField("[name=password]", "password");
        $I->click("[type=submit]");
//        $I->see('Borca');
    }


}