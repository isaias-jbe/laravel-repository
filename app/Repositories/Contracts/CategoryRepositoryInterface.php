<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 15/04/19
 * Time: 21:16
 */

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function search(Request $request);
    public function productsByCategoryId(int $id);
    public function countProductsByCategoryId(int $id);
}
