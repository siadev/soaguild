<?php
use Illuminate\Support\Facades\Auth;
use soaguild\User;

/**
 * Project Name: soaguild.dev
 * Filename:     AuthenticatedPagesTest.php
 * Author:       simon
 * Created at:   13/04/15
 * Upated  at:   13/04/15
 *
 * Description:
 */
 
class AuthenticatedPagesTest extends TestCase{
    /**
     * @test
     */
    public function test_it_logs_in_user()
    {
        $user = new User(['name' => 'xxxx']);
        $this->be($user);

    }

    public function testUnauthenticatedUserIndexAccess() {
        $response = $this->call('GET', 'coc');

        $this->assertEquals(200, $response->getStatusCode());
    }

}