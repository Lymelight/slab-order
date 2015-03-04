<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuRequest;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = [];
        $data['menus'] = \Auth::user()->menus()->get();

        return view('menus.index', $data);
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

        return redirect('business\menus');
	}


    /**
     * @param $id
     */
    public function show($id)
    {

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

        return view('menus.edit', compact('menu'));
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

        return redirect('business\menus');
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
