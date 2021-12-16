<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventoPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return $user->id === $user->id;
    }

    public function new(User $user)
    {
        return $user->tipo === "2";
    }

    public function add(User $user)
    {
        return $user->tipo === "2";
    }

    public function edit(User $user)
    {
        return $user->tipo === "2";
    }

    public function update(User $user)
    {
        return $user->tipo === "2";

    }   
    public function delete(User $user)
    {
        return $user->tipo === "2";
    }




}
