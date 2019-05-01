<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 24/04/19
 * Time: 21:03
 */

namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function search(Request $request);
}
