<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $BrandRepo;
    protected $faculty;

    public function __construct(BrandRepositoryInterface $BrandRepo, CategoryRepositoryInterface $faculty)
    {
        $this->BrandRepo = $BrandRepo;
        $this->faculty = $faculty;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->BrandRepo->paginates(5);


        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand =new Brand();
        $htmloption = $this->BrandRepo->getBrand($parentId='');


        return view('admin.brands.create', compact('htmloption', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'slug' => str_slug($request->get('name'))
        ];

        $this->BrandRepo->create($brand);
        return redirect()->route('admin.brands.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete add Brand']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->BrandRepo->find($id);
        $htmloption = $this->BrandRepo->getBrand($brand->parent_id);
        if ($brand) {
            $facultiesDisabled = [];
            $facultiesSelected = $this->BrandRepo->find($id)->faculty;
            foreach ($facultiesSelected as $key => $facultySelected) {
                $facultiesDisabled[$key] = $facultySelected->id;
            }
            $facultiesDisabled = json_encode(array_values($facultiesDisabled));

            $facultiesObject = $this->faculty->getAll();
//            echo "<pre>";
//            print_r($facultiesObject);
//            echo "</pre>";
            $faculties = [];
            if (is_array($facultiesObject) || is_object($facultiesObject)) {
                foreach ($facultiesObject as $facultyObject) {
                    $faculties[$facultyObject->id] = $facultyObject->name;
                }
            }
            return view('admin.brands.edit', compact('brand', 'htmloption', 'faculties', 'facultiesDisabled'));
       }
// else {
//            return redirect()->route('admin.brands.edit')->with('warning', sprintf('Id không tồn tại'));
//        }

//        $brand = $this->BrandRepo->find($id);
//        $htmloption = $this->BrandRepo->getBrand($brand->parent_id);
//        return view('admin.brands.edit', compact('brand', 'htmloption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'slug' => str_slug($request->get('name'))
        ];
        $this->BrandRepo->update($id, $brand);
        return redirect()->route('admin.brands.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete Edit Brand']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->BrandRepo->getParent($id) == 0) {
            $this->BrandRepo->delete($id);
            return redirect()->route('admin.brands.index')->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Delete Brand']);
        } else {
            echo "<script type='text/javascript' >
                alert('Sorry! You Can Not Delete this Brand');
                window.location = '";
            echo route('admin.brands.index');
            echo "';
            </script>";
        }
    }
}
