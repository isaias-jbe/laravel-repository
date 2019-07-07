<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 24/04/19
 * Time: 21:07
 */

namespace App\Repositories\Core\Eloquent;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function entity()
    {
        return User::class;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        return $this->entity
            ->where('name', 'LIKE', "%{$request->input('filter')}%")
            ->orWhere('email', $request->input('filter'))
            ->paginate();
    }

}
