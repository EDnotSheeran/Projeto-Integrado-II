<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Certificado;
use App\Models\Evento;
use App\Models\Phone;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Evento::class => EventoPolicy::class,
        Certificado::class => CertificadoPolicy::class,
        Address::class => AddressPolicy::class,
        Phone::class => PhonePolicy::class
    
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
