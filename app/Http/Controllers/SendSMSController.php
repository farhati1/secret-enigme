<?php

namespace App\Http\Controllers;

use App\Jobs\SendCredentialsViaSMS;
use App\Models\User;

class SendSMSController extends Controller
{
    public function sendSMS($id): \Illuminate\Http\JsonResponse
    {
// Assurez-vous que l'utilisateur existe
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

// Dispatcher le job
        SendCredentialsViaSMS::dispatch($id);

        return response()->json(['message' => 'SMS en cours d\'envoi']);
    }
}
