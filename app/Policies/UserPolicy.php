<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user){
        
        return $user->tipo === "2";
    }

    public function new(User $user){
        return $user->tipo === "2";
    }
    
    public function add(User $user){
        return $user->tipo === "2";
    }
    
    public function edit(User $user){
        return $user->tipo === "2";
    }
    
    public function update(User $user){
        return $user->tipo === "2";
    }
    
    public function delete(User $user){
        return $user->tipo === "2";
    }

    public function editProfile(User $user, User $data){

        return ($user->id === $data->id || $user->tipo === "2");
    }   
    
    public function updateProfile(User $user, User $data){

        return ($user->id === $data->id || $user->tipo === "2");
    }  
}
