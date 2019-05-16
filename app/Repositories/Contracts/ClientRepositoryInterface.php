<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 11/05/19
 * Time: 14:16
 */

namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface ClientRepositoryInterface
{
    public function search(Request $request);
}
