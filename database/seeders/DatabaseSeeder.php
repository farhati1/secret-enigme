<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'YoumnaM',
            'tel' => '+33698628273',
            'devinette' => "Toujours élégante en classy mastour, je ne me laisse pas faire et j'affirme ma personnalité. Nous avons un village commun. Qui suis-je ?",
            'reponse' => 'MOUNIRA' ,

        ]);
        User::factory()->create([
            'name' => 'YoumnaS',
            'tel' => '+33766083746',
            'devinette' => 'Toujours prête à faire rire avec mes phrases hallucinantes, je suis connue pour ma gentillesse et mon humour. Je dis hayigo au lieu de dire hayibo. Qui suis-je ?',
            'reponse' => 'CHAIMA' ,
        ]);
        User::factory()->create([
            'name' => 'Esmat',
            'tel' => '+33744554517',
            'devinette' => "Je suis très cultivée et j'apporte toujours des arguments solides lors des débats. J'aime trop mettre plusieurs sous pulls. Qui suis-je ?",
            'reponse' => 'NASFATI' ,
        ]);
        User::factory()->create([
            'name' => 'Chaima',
            'tel' => '+33767120473',
            'devinette' => 'Gentil et respectueux, ma passion pour la Sira me pousse à partager des histoires inspirantes. Je suis celui sur qui l’on peut toujours compter pour un conseil éclairé. Qui suis-je ?',
            'reponse' => 'AKRAM' ,
        ]);
        User::factory()->create([
            'name' => 'Mounira',
            'tel' => '+33646032117',
            'devinette' => "Avec une grande maîtrise de l'arabe et une organisation exemplaire, je suis toujours prête à défendre mes idées. J'emploie assez souvent des mots arabes like sonak. Qui suis-je ?",
            'reponse' => 'DJEHANE' ,
        ]);
        User::factory()->create([
            'name' => 'Djehane',
            'tel' => '+33663121633',
            'devinette' => "Timide et poli, j'aime rendre service aux autres. Je suis souvent gêné dans les conversations et ma voiture n'a pratiquement jamais d'essence. Qui suis-je ?",
            'reponse' => 'TAJWIDI' ,
        ]);
        User::factory()->create([
        'name' => 'Djaddou',
            'tel' => '+336449201632',
            'devinette' => "Infirmière passionnée, ma voix douce enchante ceux qui m'écoutent. On a l'impression que je deteste les hommes. Est-ce vrai? Qui suis-je ?",
            'reponse' => 'YOUMNAS' ,
    ]);
        User::factory()->create([
            'name' => 'Akram',
            'tel' => '+33695214075',
            'devinette' => "Les autres me respectent pour mes compétences au niveau du Qur'an. Je fais parti des personnes à qui tu as raconté tes histoires incroyables. Qui suis-je ?",
            'reponse' => 'ZOUBERT' ,
        ]);
        User::factory()->create([
            'name' => 'Zoubert',
            'tel' => '+33695185161',
            'devinette' => 'Née en Égypte, je suis reconnue pour mon intelligence vive et ma détermination. Désolé de te dire que je suis la préférée de ton foundi. Qui suis-je ?',
            'reponse' => 'ESMAT' ,
        ]);
        User::factory()->create([
            'name' => 'Tadjwidi',
            'tel' => '+33767689168',
            'devinette' => "Je suis un peu nonchalant, j'aime le rouge et je n’hésite pas à faire preuve d’humour. Je me fais tjrs bully en classe. Qui suis-je ?",
            'reponse' => 'DJADDOU' ,
        ]);
        User::factory()->create([
            'name' => 'Nasfati',
            'tel' => '+33766828442',
            'devinette' => 'Je suis celle qui gère les projets avec brio, dotée d’une grande sagesse et d’une écoute attentive. Les autres se tournent vers moi pour des conseils, car je comprends les émotions et les besoins des gens. Mon era du moment etre influenceuse. Qui suis-je ?',
            'reponse' => 'YOUMNAM' ,
        ]);
        User::factory()->create([
            'name' => 'Farhati',
            'tel' => '+33660059265',
            'devinette' => 'Félicitations ! Vous avez déchiffré chaque prénom et chaque indice. Mon nom porte en lui un immense bonheur. Qui suis-je ?',
            'reponse' => 'FARHATI' ,
        ]);


    }
}
