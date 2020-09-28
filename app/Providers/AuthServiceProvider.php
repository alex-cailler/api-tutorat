<?php

namespace App\Providers;

use App\Models\Classe;
use App\Models\ClasseParticipant;
use App\Models\Matter;
use App\Models\User;
use App\Policies\ClasseParticipantPolicy;
use App\Policies\ClassePolicy;
use App\Policies\MatterPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class                 => UserPolicy::class,
        Matter::class               => MatterPolicy::class,
        ClasseParticipant::class    => ClasseParticipantPolicy::class,
        Classe::class               => ClassePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        // chemin a partir du quel les clefs de passport doivent être charger
        // Passport::loadKeysFrom('/secret-keys/oauth');
    }
}
