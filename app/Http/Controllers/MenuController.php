<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuRequest;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends DashboardController {

	/**
	 * Display a list of all the Menus a user owns
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
     * Store the newly created Menu in the database
     *
     * @param MenuRequest $request
     * @return Response
     */
	public function store(MenuRequest $request)
	{
        /**
         * Request all form inputs, create a new Menu Record belonging to the user
         */
        $menu = new Menu($request->all());
        \Auth::user()->menus()->save($menu);

        return redirect('business\menus');
	}


	/**
	 * Display the form for editing an existing Menu record
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        /**
         * Find
         */
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
