<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 11/05/19
 * Time: 14:18
 */

namespace App\Repositories\Core\Eloquent;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ClientRepositoryInterface;

class EloquentClientRepository extends BaseEloquentRepository implements ClientRepositoryInterface
{
    /**
     * @return string
     */
    public function entity()
    {
        return Client::class;
    }

    public function search(Request $request)
    {

    }

}
