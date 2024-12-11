<?php

namespace App\Jobs;

use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendCredentialsViaSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Récupérer les credentials Twilio du fichier .env
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        // Récupérer l'utilisateur depuis la base de données
        $user = User::find($this->id);

        // S'assurer que l'utilisateur existe
        if (!$user) {
            return;
        }
        // Composer le message
        $message = "As salaam anleykoum, {$user->name}, \n";
        $message .= "Tes identifiants sont : \n";
        $message .= "Nom: {$user->name} \n";
        $message .= "Code: {$user->code} \n";
        $message .= "Veuillez vous connecter sur: https://enigme-app-tb4jj.ondigitalocean.app/";


        // Créer une instance du client Twilio
        $client = new Client($sid, $token);


        // Envoyer le SMS
        $client->messages->create(
            '+33660059265',
            [
                'from' => $twilioPhoneNumber,
                'body' => $message
            ]
        );
    }
}
