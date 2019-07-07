<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 15/04/19
 * Time: 20:49
 */

namespace App\Repositories\Core;


use DeepCopy\Exception\PropertyException;
//use Illuminate\Support\Facades\DB;
use Illuminate\Database\DatabaseManager as DB;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\PropertyTableNotExists;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $db;
    protected $tb;
    protected $orderBy = ['column' => 'id', 'order' => 'DESC'];

    public  function __construct(DB $db)
    {
        $this->tb = $this->resolveTable();
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db->table($this->tb)->orderBy($this->orderBy['column'], $this->orderBy['order'])->get();
    }

    public function findById(int $id)
    {
        return $this->db->table($this->tb)->find($id);
    }

    public function findWhere(string $column, $value)
    {
        return $this->db->table($this->tb)->where($column, $value)->get();
    }

    public function findWhereFirst(string $column, $value)
    {
        return $this->db->table($this->tb)->where($column, $value)->first();
    }

    public function paginate(int $totalPage = 10)
    {
        return $this->db->table($this->tb)
                        ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                        ->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->db->table($this->tb)->insert($data);
    }

    public function update(int $id, array $data)
    {
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->db->table($this->tb)->where('id', $id)->delete();
    }

    public function orderBy(string $column, string $order = 'DESC')
    {
        $this->orderBy = ['column' => $column, 'order' => $order];

        return $this;
    }

    public function resolveTable()
    {
        if (!property_exists($this, 'table'))
        {
            throw new PropertyTableNotExists();
        }

        return $this->table;
    }
}
