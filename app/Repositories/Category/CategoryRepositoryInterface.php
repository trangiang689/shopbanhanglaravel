<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{

    public function paginates($litmit);
    public function parent();
    public function __construc();
    public function categoryRecusive($parentId,$id =0,$text = '');
    public function getCategory($parentId);
    public function getParent($id);
}
