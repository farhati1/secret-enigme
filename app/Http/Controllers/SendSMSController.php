<?php

namespace App\Http\Controllers;

use App\Jobs\SendCredentialsViaSMS;
use App\Models\User;

class SendSMSController extends Controller
{
    public function sendSMS()
    {
// Assurez-vous que l'utilisateur existe
        $user = User::all();
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        else{
           $phone = SendCredentialsViaSMS::dispatch();
            dd($phone);
            return response()->json(['message' => 'SMS en cours d\'envoi']);
        }

    }
}
