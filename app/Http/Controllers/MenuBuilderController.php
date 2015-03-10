<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuBuilderRequest;
use App\Http\Requests\MenuRequest;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuBuilderController extends DashboardController {

	/**
	 * Display a listing of the Menus that are available to "Build" (i.e. Owned by the user, at this point, though later, it would be helpful,
     * to include criteria such as, "Not Live at a Location", etc.
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
     * Show the form for editing a menu that the user owns
     *
     * @param  int  $id
     * @return Response
     */
    public function editMenu($id)
    {
        $menu = Menu::findOrFail($id);

        $data['menu'] = $menu;
        $data['menu_products'] = $menu->products()->get();

        $data['products'] = \Auth::user()->products()->lists('name', 'id');
        $data['products_selected'] = $menu->products->lists('id');

        return view('menubuilder.edit', $data);
    }


    /**
     * Create the relationship between products and menus as they are added in the menu-builder
     *
     * @param Menu $menu
     * @param $products
     */
    private function syncProducts(Menu $menu, $products)
    {
        $menu->products()->sync($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param MenuBuilderRequest $request
     * @return Response
     */
	public function updateProducts($id, MenuBuilderRequest $request)
	{
		$menu = Menu::findOrFail($id);

        $this->syncProducts($menu, $request->input('products'));

        $menu->product_count = $menu->products()->count();

        $menu->save();

        return Redirect::back();
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
