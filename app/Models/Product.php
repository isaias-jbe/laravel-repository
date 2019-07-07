<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'cost_price', 'sale_price', 'photo', 'description'];

    /**
     * Sobrescrita do metodo boot() para incluir um padrão de ordenação
     * global para o Model Product
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByPrice', function (Builder $builder) {
            $builder->orderBy('id');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Relacionamento Product 1 <-> 1 Category (Um pra Um)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'sales')->withPivot('qty', 'price');
    }
}
