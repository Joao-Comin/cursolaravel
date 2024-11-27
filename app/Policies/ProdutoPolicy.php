<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Produto;


class ProdutoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verProdutos(User  $user, Produto $produto){
        return $user->id == $produto->id_user;
    }
}
