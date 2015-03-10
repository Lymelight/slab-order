<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends DashboardController {

	private function syncCustomizationGroups(Product $product, $customization_groups)
    {
        $product->customizationGroups()->sync($customization_groups);
    }

    /**
	 * Display all Products a user owns.
	 *
	 * @return Response
	 */
	public function index()
	{

        /**
         * Display all products a user owns
         * Populate an array with potential customization groups that the user owns for use in the embedded New Product form
         * Send an empty array for which customization groups are selected, since we'll be creating a new record, not loading an existing one, but
         * it's great to use the same form for both tasks
         */
        $data = [];
        $data['products'] = \Auth::user()->products()->get();
        $data['customization_groups'] = \Auth::user()->customizationGroups()->lists('name', 'id');
        $data['customization_groups_selected'] = [];

        return view('products.index', $data);
	}

    /**
     * Store a newly created Product in the database.
     *
     * @param ProductRequest $request
     * @return Response
     */
	public function store(ProductRequest $request)
	{
        /**
         * Request all inputs from the form, create a new Product record and automatically assign the allowed variables from inputs,
         * Run the syncCustomizationGroups function for the product, which grabs the selected customization groups and creates the appropriate relationships
         * on the pivot table
         */

        $product = new Product($request->all());
        \Auth::user()->products()->save($product);

        $this->syncCustomizationGroups($product, $request->input('customization_groups'));

        return redirect('business\products');
	}

	/**
	 * Show the form for editing a Product specified by an id.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        /**
         * Grab the product by its ID. populate an array with potential customization groups that the user owns for use in the page's multi-select,
         * populate an array of which (if any) are already selected
         */
		$product = Product::findOrFail($id);
        $data['product'] = $product;
        $data['customization_groups'] = \Auth::user()->customizationGroups()->lists('name', 'id');
        $data['customization_groups_selected'] = $product->customizationGroups->lists('id');

        return view('products.edit', $data);
	}

    /**
     * Update the specified Product in the database
     *
     * @param  int $id
     * @param ProductRequest $request
     * @return Response
     */
	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);
        $product->update($request->all());

        $this->syncCustomizationGroups($product, $request->input('customization_groups'));

        return redirect('business\products');
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
