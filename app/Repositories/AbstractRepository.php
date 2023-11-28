<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    abstract public function getModel(): Model;
    public function getQuery(): Builder
    {
        return $this->getModel()->newQuery();
    }
    public function getAll(?array $select = ['*'], ?array $with = []): Collection
    {
        $query = $this->getQuery()->with($with)->select($select);

        return $query->get();
    }
    public function create(array $data): Model
    {
        return $this->getQuery()->create($data);
    }
    public function getById(int $id, ?array $with = null, ?array $select = ['*']): ?Model
    {
        $query = $this->getQuery()->select($select)->where('id', $id);

        if ($with) {
            $query->with($with);
        }

        return $query->firstOrFail();
    }
    public function updateById(int $id, array $data): ?Model
    {
        $model = $this->getById($id);
        $model->update($data);

        return $model;
    }
    public function delete(int $id): ?bool
    {
        return $this->getQuery()->where('id', $id)->delete();
    }
}
