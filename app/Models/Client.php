<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cpf', 'phone', 'email',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
