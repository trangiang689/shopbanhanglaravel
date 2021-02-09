<?php
namespace App\Repositories\Brand;

interface BrandRepositoryInterface
{

    public function paginates($litmit);
    public function parent();
    public function __construc();
    public function brandRecusive($parentId,$id =0,$text = '');
    public function getBrand($parentId);
    public function getParent($id);

}
