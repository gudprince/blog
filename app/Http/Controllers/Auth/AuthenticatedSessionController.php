<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Contracts\Geolocator;
use App\Models\UserGeolocation;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request ): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $ip = $request->ip();

        // Here is where we get the geolocation 

      //  $geolocation = $geolocator->locate($ip);
     
       //// $data = ['country' => $geolocation->country(),
        //        'ip_address' => $geolocation->ip(),
        ////        'city' => $geolocation->city(),
           //     'user_id' => Auth()->id()
               // ];
        //UserGeolocation::create($data);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
