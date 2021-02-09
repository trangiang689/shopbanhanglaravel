<?php
namespace App\Repositories\Menu;

interface MenuRepositoryInterface
{
    public function paginates($litmit);
    public function parent();
    public function __construc();
    public function menuRecusive($parentId,$id =0,$text = '');
    public function getmenu($parentId);
    public function getParent($id);
}
