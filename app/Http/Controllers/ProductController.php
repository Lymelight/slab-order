<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends DashboardController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = [];
        $data['products'] = \Auth::user()->products()->get();

        return view('products.index', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
	public function store(ProductRequest $request)
	{
        $product = new Product($request->all());
        \Auth::user()->products()->save($product);

        return redirect('business\products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ProductRequest $request
     * @return Response
     */
	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);
        $product->update($request->all());

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
