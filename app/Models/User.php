<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Authenticatable
{
    //
    use softDeletes;
    protected $dates=['deleted_at'];
}
