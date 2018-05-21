<?php

namespace App\Policies;

use App\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before($user, $ability)
    {

        if( $user->isAdmin() )
        {

            return true;
        }
    }
    public function show(Usuario $authUser, Usuario $user)
    {
        
        return $authUser->id === $user->id;
    }
    public function edit(Usuario $authUser, Usuario $user)
    {
        
        return $authUser->id === $user->id;
    }
    
    public function update(Usuario $authUser, Usuario $user)
    {
        return $authUser->id === $user->id;
    }
    
    public function create(Usuario $authUser, Usuario $user)
    {
        return $authUser->id === $user->id;
    }
    
    public function store(Usuario $authUser, Usuario $user)
    {
        return $authUser->id === $user->id;
    }

     public function destroy(Usuario $authUser, Usuario $user)
    {
        return $authUser->id === $user->id;
    }
}
