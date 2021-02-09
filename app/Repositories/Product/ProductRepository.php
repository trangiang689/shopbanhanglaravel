<?php
namespace App\Repositories\Product;

use App\Models\Category;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
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

    private $htmlselect;

    public function __construc(){
        $this->htmlselect ='';
    }

    public function categoryRecusive($parentId,$id =0,$text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                if (!empty('$parentId') && $parentId== $value->id){
                    $this->htmlselect.= "<option selected value='".$value->id."'>".$text.$value->name."</option>";
                }
                else{
                    $this->htmlselect.= "<option  value='".$value->id."'>".$text.$value->name."</option>";
                }

                $this->categoryRecusive($parentId,$value->id,$text.'--');

            }

        }
        return $this->htmlselect;
    }
    public function getCategory($parentId){
        $htmloption = $this->categoryRecusive($parentId);
        return $htmloption;
    }

}
