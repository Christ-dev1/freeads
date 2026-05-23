<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function showFormSignUp(){

        if(Auth::check()){
             return
            redirect()->route('sign-up');
        }
        return view('auth.sign-up');  
    }

     public function showFormLogin(){
        if(Auth::check()){
             return redirect()->route('header');
             return redirect()->route('auth.userpage');
        }
        return view('auth.login');
    }


    public function Login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('ads.index');
    }

    return back()->withErrors([
        'email' => 'Les identifiants ne correspondent pas.',
    ])->onlyInput('email');
}


    public function SignUp(Request $request){ ;
        $request->validate([
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'telephone' => 'required|unique:users,telephone',
            
        ]);


     $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone
        ]);
    
            
    $url = URL::temporarySignedRoute(
        'welcomemail', 
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    Mail::to($user->email)->send(new WelcomeEmail($user, $url));

    return redirect()->route('sign-up')->with('success', "Inscription réussie ! Vérifie ton mail pour valider ton profil.");

}


  public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect()->route('ads.index'); 
}

}