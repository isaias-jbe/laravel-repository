<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 14/04/19
 * Time: 21:31
 */

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function findWhere(string $column, $value);
    public function findWhereFirst(string $column, $value);
    public function paginate(int $totalPage = 10);
    public function store(array $data);
    public function update(int $id, array $data);
    public function destroy(int $id);
    public function orderBy(string $column, string $order = 'DESC');
}
