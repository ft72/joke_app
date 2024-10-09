<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function refresh(Request $request)
    {
        $joke = $this->fetchJoke();
        $request->session()->put('joke', $joke);

        return redirect()->route('dashboard');
    }

    private function fetchJoke()
    {
        $response = Http::withoutVerifying()->get('https://official-joke-api.appspot.com/random_joke');
        if ($response->successful()) {
            $jokeData = $response->json();
            return $jokeData['setup'] . ' - ' . $jokeData['punchline'];
        }
        return 'No joke available at the moment.';
    }
}
