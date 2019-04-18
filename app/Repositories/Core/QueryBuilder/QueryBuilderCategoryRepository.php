<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 15/04/19
 * Time: 21:13
 */

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $data['url'] = kebab_case($data['title']);
        return $this->db->table($this->tb)->insert($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data)
    {
        $data['url'] = kebab_case($data['title']);
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(Request $request)
    {
        return $this->db->table($this->tb)->where( function ($query) use ($request) {

            if( isset($request->title) ){
                $query->where('title', 'LIKE', "%{$request->title}%");
            }

            if( isset($request->url) ){
                $query->orWhere('url', $request->url);
            }

            if( isset($request->description) ){
                $query->orWhere('description', 'LIKE', "%{$request->description}%");
            }
        })->paginate();
    }
}
