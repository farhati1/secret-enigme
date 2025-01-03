<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show()
    {
        $user = Auth::user();

        return Inertia::render('Secret', [
            'user' => $user
        ]);
    }
    public function demiFinal()
    {
        $user = Auth::user();
        return Inertia::render('DemiFinale', [
            'user' => $user
        ]);
    }

    public function final()
    {
        $user = Auth::user();
        return Inertia::render('Final', [
            'user' => $user
        ]);
    }
    /**
     * Update the user's profile information.
     */



}
