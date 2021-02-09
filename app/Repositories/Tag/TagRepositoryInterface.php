<?php
namespace App\Repositories\Tag;

interface TagRepositoryInterface
{
    public function paginates($litmit);
    public function parent();
}
