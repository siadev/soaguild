<?php 
/**
 * Project Name: soaguild.dev
 * Filename:     PagesTest.php
 * Author:       simon
 * Created at:   11/04/15
 * Upated  at:   11/04/15
 *
 * Description:
 */
 
class PagesTest extends TestCase{
    /**
     * A basic functional test for home page.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAbout()
    {
        $response = $this->call('GET', 'about');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testFeeds()
    {
        $response = $this->call('GET', 'feeds');
        $this->assertEquals(200, $response->getStatusCode());
    }




}