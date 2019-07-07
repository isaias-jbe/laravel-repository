<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 16/04/19
 * Time: 19:50
 */

namespace App\Repositories\Core\Eloquent;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class EloquentCategoryRepository extends BaseEloquentRepository implements CategoryRepositoryInterface
{

    /**
     * @return string
     */
    public function entity()
    {
        return Category::class;
    }

//    /**
//     * @param array $data
//     * @return bool
//     */
//    public function store(array $data)
//    {
//        $data['url'] = kebab_case($data['title']);
//        return $this->entity->insert($data);
//    }
//
//    /**
//     * @param int $id
//     * @param array $data
//     * @return int
//     */
//    public function update(int $id, array $data)
//    {
//        $data['url'] = kebab_case($data['title']);
//        return $this->entity->where('id', $id)->update($data);
//    }

    /**
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function productsByCategoryId(int $id)
    {
        return $this->entity->where('category_id', $id)->get();
    }

    /**
     * @param int $id
     * @return int
     */
    public function countProductsByCategoryId(int $id)
    {
        return $this->entity->where('category_id', $id)->count();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        return $this->entity->where( function ($query) use ($request) {

                if( isset($request->name) ){
                    $query->where('name', 'LIKE', "%{$request->name}%");
                }

                if( isset($request->description) ){
                    $query->orWhere('description', 'LIKE', "%{$request->description}%");
                }
            })->paginate();
    }

}
