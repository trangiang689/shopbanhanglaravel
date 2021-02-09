<?php
namespace App\Repositories\Tag;

use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function paginates($litmit)
    {
        return $this->model->orderby('id', 'DESC')->paginate($litmit);
    }
    public function parent()
    {
        return $this->model->get()->toArray();
    }
}
