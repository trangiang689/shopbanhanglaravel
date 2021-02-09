<?php
namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Brand::class;
    }

    public function paginates($litmit)
    {
        return $this->model->orderby('id', 'DESC')->latest()->paginate($litmit);
    }

    public function parent()
    {
        return $this->model->get()->toArray();

    }

    private $htmlselect;

    public function __construc(){
        $this->htmlselect ='';
    }

    public function brandRecusive($parentId,$id =0,$text = '')
    {
        $data = Brand::all();
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                if (!empty('$parentId') && $parentId== $value->id){
                    $this->htmlselect.= "<option selected value='".$value->id."'>".$text.$value->name."</option>";
                }
                else{
                    $this->htmlselect.= "<option  value='".$value->id."'>".$text.$value->name."</option>";
                }

                $this->brandRecusive($parentId,$value->id,$text.'--');

            }

        }
        return $this->htmlselect;
    }
    public function getBrand($parentId){
        $htmloption = $this->brandRecusive($parentId);
        return $htmloption;
    }

    public function getParent($id){
        return $this->model->where('parent_id',$id)->count();
    }

}
