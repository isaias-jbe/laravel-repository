<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 14/04/19
 * Time: 23:04
 */

namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function search(Request $request);
}
