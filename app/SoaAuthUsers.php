<?php  namespace soaguild;
/**
 * Project Name: soaguild.dev
 * Filename:     SoaAuthUsers.php
 * Author:       simon
 * Created at:   24/04/15
 * Upated  at:   24/04/15
 *
 * Description:
 */

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class SoaAuthUsers {


    use  AuthenticatesAndRegistersUsers;


    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.soalogin');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'main_toon' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('main_toon', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('main_toon', 'remember'))
            ->withErrors([
                'main_toon' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'Main Toon or Password does not match our records';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }



}