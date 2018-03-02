<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function register()
    {
        return view('users.register');
    }

    public function login()
    {
        return view('users.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
        $data = [
            'avatar' => '/images/default-avatar.jpg',
            'confirm_code' => str_random(48)
        ];
        $user = User::create(array_merge($request->all(), $data));
        $this->sendVerifyEmailTo($user);
        return redirect('/');
    }

    private function sendVerifyEmailTo($user)
    {
        $data = [
            'name' => $user->name,
            'url' => route('active', ['confirm_code' => $user->confirm_code])
        ];
        $template = new SendCloudTemplate('Register', $data);
        Mail::raw($template, function ($message) use ($user) {
            $message->from('widung@163.com', 'Laravel App');
            $message->to($user->email);
        });
    }

    public function accountActive($confirm_code)
    {
        $user = User::where('confirm_code', $confirm_code)->first();
        if (is_null($user)) {
            return redirect('/');
        } else {
            $user->is_confirmed = 1;
            $user->confirm_code = str_random(48);
            $user->save();
            return redirect('user/login');
        }
    }

    public function sign(UserLoginRequest $request)
    {
        if (\Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_confirmed' => 1
        ])) {
            return redirect('/');
        } else {
            \Session::flash('user_login_failed', '密码不正确或邮箱没验证');
            return redirect('user/login')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
