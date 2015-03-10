<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuRequest;
use App\Menu;
use Illuminate\Http\Request;

class MenuBuilderController extends DashboardController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = [];
        $data['menus'] = \Auth::user()->menus()->get();

        return view('menubuilder.index', $data);
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return Response
     */
	public function store(MenuRequest $request)
	{
        $menu = new Menu($request->all());
        \Auth::user()->menus()->save($menu);

        return redirect('business\menu_builder');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $menu = Menu::findOrFail($id);
        $data['menu'] = $menu;
        $data['products'] = \Auth::user()->products()->lists('name', 'id');

        return view('menubuilder.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MenuRequest $request)
	{
		$menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect('business\menu_builder');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
