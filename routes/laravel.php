<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['web'])->get('/docs/login', function() {
    return view('scribe_auth::login');
})->name('scribe_auth.login');

Route::middleware(['web'])->get('/docs/auth', function() {
    if (!session()->has('scribe_authenticated')) {
        return redirect()->route('scribe_auth.login');
    } else {
        return redirect()->route('scribe');
    }
});

Route::middleware(['web'])->post('/docs/auth', function(Request $request) {
    $key = config('scribe_auth.auth_key');

    if ($request->input('key') === $key) {
        $request->session()->put('scribe_authenticated', true);

        return redirect()->route('scribe');
    }

    return back()->withErrors(['key' => 'Invalid Password']);
})->name('scribe_auth.auth');