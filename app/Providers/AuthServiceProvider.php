<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as Gatecontract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gatecontract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('Admin', function($user){
            return $user->nivelAcesso == '0';
        });

        $gate->define('Supervisor', function($user){
            return $user->nivelAcesso == '1';
        });

        $gate->define('Gestor', function($user){
            return $user->nivelAcesso == '2';
        });

        $gate->define('Secretaria', function($user){
            return $user->nivelAcesso == '3';
        });

        $gate->define('Professor', function($user){
            return $user->nivelAcesso == '4';
        });

        $gate->define('Comercial', function($user){
            return $user->nivelAcesso == '5';
        });

        $gate->define('Atendimento', function($user){
            return $user->nivelAcesso == '6';
        });
    }
}
