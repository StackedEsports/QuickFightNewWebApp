<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        $state = bin2hex(random_bytes(16));  // Generate a secure random state
        session(['state' => $state]);
        Log::info('redirectToProvider session data:', session()->all()); // Log the entire session

       // $response = Socialite::driver('discord')->stateless(false)->with(['state' => $state])->redirect();
        Log::info('OAuth request state:', ['state' => $state, 'session_id' => session()->getId()]);
        return Socialite::driver('discord')->stateless()->redirect();

        //return $response;
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $discordUser = Socialite::driver('discord')->stateless()->user();
        // Find or create a user in your database
        $user = User::updateOrCreate([
            'discord_id' => $discordUser->id,
        ], [
            'name' => $discordUser->name,
            'email' => $discordUser->email,
            'avatar' => $discordUser->avatar,
            'password' => null, // Explicitly setting password as null
        ]);
        Log::info("User created or updated:", [
            'discord_id' => $user->discord_id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar
        ]);

        // Log the user in
        Auth::login($user, true);
        Log::info("User logged in:", ['user_id' => $user->id]);

        return redirect()->to('/home'); // Redirect to a desired location
    }
}

