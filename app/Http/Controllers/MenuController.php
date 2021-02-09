<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\Menu\MenuRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $MenuRepo;

    public function __construct(MenuRepositoryInterface $MenuRepo)
    {
        $this->MenuRepo = $MenuRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->MenuRepo->paginates(5);


        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = new Menu();
        $htmloption = $this->MenuRepo->menuRecusive($parentId= '');



        return view('admin.menus.create',compact('htmloption','menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = [
            'name' => $request->get('name'),
            'parent_id'=>$request->get('parent_id'),
            'slug'=>str_slug($request->get('name'))
        ];

        $this->MenuRepo->create($menu);
        return redirect()->route('admin.menus.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete add Menu']);
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
        $menu = $this->MenuRepo->find($id);
        $htmloption = $this->MenuRepo->getmenu($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'htmloption'));
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
        $menu = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => str_slug($request->get('name'))
        ];
        $this->MenuRepo->update($id, $menu);
        return redirect()->route('admin.menus.index')
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
        if ($this->MenuRepo->getParent($id) == 0) {
            $this->MenuRepo->delete($id);
            return redirect()->route('admin.menus.index')->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Delete Menu']);
        } else {
            echo "<script type='text/javascript' >
                alert('Sorry! You Can Not Delete this Menu');
                window.location = '";
            echo route('admin.menus.index');
            echo "';
            </script>";
        }
    }
}
