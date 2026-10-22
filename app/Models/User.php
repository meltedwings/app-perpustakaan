<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $guarded = ['id'];
    
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
