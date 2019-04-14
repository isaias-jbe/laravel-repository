<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'url', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Relacionamento Category 1 <-> * Product (Um pra N)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
