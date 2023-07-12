<?php
namespace App\Http\Controllers;

use App\Http\Requests\ForgotChangeRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class UserController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // $request_params = Input::all();
        // echo "<pre>";
        // print_r($request_params);
        // die();
        // dd('ok');
        $user = new User();
        $exist_email = $user->getUserByEmail($request->email);
        if(!$exist_email->isEmpty())
        {
            // dd($exist_email);
            return back()->withInput()->withErrors(['email'=>'Email already exists']);
        }
        try
        {
            $userData = [];
            $userData['user_name'] = $request->user_name;
            $userData['first_name'] = $request->firstName;
            $userData['last_name'] = $request->lastName;
            $userData['gender'] = $request->gender;
            $userData['email'] = $request->email;
            $userData['password'] = Hash::make($request->password);
            $userData['phone'] = $request->phone;
            User::create($userData);
            return redirect()->route('loginUser')->with('success', 'User successfully created Please login');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Failed to save user information. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginPage()
    {
        return view('login');
    }
    public function register()
    {
        return view('signup');
    }

    public function login(LoginRequest $request)
    {
        // dd($request);
        $email_address = $request->email;
        $password = $request->password;
        // $result = Customer::where('email', $email_address)->get()->first();
        // // dd($result['customer_id']);
        // if ($result)
        // {
        //     if(Hash::check($password, $result['password']))
        //     {
        //         session()->put('user_id', $result['customer_id']);
        //         $user_name = $result['first_name'].' '.$result['last_name'];
        //         session()->put('user_name', $user_name);
        //         return redirect()->route('dashboardProduct')->with('success', 'Login successful');
        //     }
        //     else
        //     {
        //         return back()->withInput()->withErrors(['password'=>'Password is incorrect']);
        //     }
        // }
        // else
        // {
        //     return back()->withInput()->withErrors(['email_address'=>'Email does\'t exist']);
        // }

        if(Auth::attempt(['email' => $email_address, 'password' => $password]))
        {
            return redirect()->route('dashboardProduct')->with('success', 'Login successful');
        }
        else
        {
            return back()->withInput()->withErrors(['password'=>'Password is incorrect']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginUser')->with('success', 'Successfully logged out');

    }

    // Change Password
    public function resetPassword()
    {
        return view('reset');
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        // dd(Auth()->user()->id);
        $newPassword = Hash::make($request->newPassword);
        $user = new User();
        $user_data = $user->findUser(Auth()->user()->id);
        $result = $user_data->update([
            'password' => $newPassword,
        ]);
        Auth::logout();
        if($result)
        {
            return redirect()->route('loginUser')->with('success', 'Password successfully change');
        }
        else
        {
            return redirect()->back()->with('error', 'Password not changed');
        }
    }


    // Forgot Password
    public function forgotPassword()
    {
        return view('forgot');
    }

    public function forgotPasswordEmail(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                ? back()->withInput()->with(['success' => __($status)])
                : back()->withInput()->with(['error' => __($status)]);
    }

    public function resetForm($token) {
        return view('reset-password', ['token' => $token]);
    }

    public function changePassword(ForgotChangeRequest $request) {
        // dd('ok');
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('loginUser')->with('success', __($status))
                    : back()->with(['error' => __($status)]);
    }
}
