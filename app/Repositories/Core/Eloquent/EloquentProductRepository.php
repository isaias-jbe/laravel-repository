<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 14/04/19
 * Time: 23:00
 */

namespace App\Repositories\Core\Eloquent;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class EloquentProductRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{

    /**
     * @return string Model
     */
    public function entity()
    {
        return Product::class;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        return $this->entity->where(function ($query) use ($request) {

                if ( isset($request->name) && !empty($request->name) ){
                    $filter = $request->name;
                    $query->where(function ($querySub) use ($filter) {
                        $querySub->where('name', 'LIKE', "%{$filter}%")
                            ->orWhere('description', 'LIKE', "%{$filter}%");
                    });
                }

                if ( isset($request->price) && !empty($request->price) ){
                    $query->where('price', $request->price);
                }

                if ( isset($request->category) && !empty($request->category) ){
                    $query->where('category_id', $request->category);
                }
            })->paginate();
    }

}
