<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use App\Repositories\BaseRepository;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Menu::class;
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

    public function __construc()
    {
        $this->htmlselect = '';
    }

    public function menuRecusive($parentId, $id = 0, $text = '')
    {
        $data = Menu::all();
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                if (!empty('$parentId') && $parentId == $value->id) {
                    $this->htmlselect .= "<option selected value='" . $value->id . "'>" . $text . $value->name . "</option>";
                } else {
                    $this->htmlselect .= "<option  value='" . $value->id . "'>" . $text . $value->name . "</option>";
                }

                $this->menuRecusive($parentId, $value->id, $text . '--');

            }

        }
        return $this->htmlselect;
    }

    public function getMenu($parentId)
    {
        $htmloption = $this->menuRecusive($parentId);
        return $htmloption;
    }

    public function getParent($id){
        return $this->model->where('parent_id',$id)->count();
    }
}
