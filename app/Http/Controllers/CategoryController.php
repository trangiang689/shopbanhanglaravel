<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;



class
CategoryController extends Controller
{
    protected $CategoryRepo;

    public function __construct(CategoryRepositoryInterface $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->CategoryRepo->paginates(5);


        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =new Category();
        $htmloption = $this->CategoryRepo->getCategory($parentId='');


        return view('admin.categories.create', compact('htmloption', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => str_slug($request->get('name'))
        ];

        $this->CategoryRepo->create($category);
        return redirect()->route('admin.categories.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete add Category']);
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
        $category = $this->CategoryRepo->find($id);
        $htmloption = $this->CategoryRepo->getCategory($category->parent_id);
        return view('admin.categories.edit', compact('category', 'htmloption'));
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
        $category = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => str_slug($request->get('name'))
        ];
        $this->CategoryRepo->update($id, $category);
        return redirect()->route('admin.categories.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete Edit Faculty']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->CategoryRepo->getParent($id) == 0) {
            $this->CategoryRepo->delete($id);
            return redirect()->route('admin.categories.index')->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Delete category']);
        } else {
            echo "<script type='text/javascript' >
                alert('Sorry! You Can Not Delete this Category');
                window.location = '";
            echo route('admin.categories.index');
            echo "';
            </script>";
        }
    }

}
