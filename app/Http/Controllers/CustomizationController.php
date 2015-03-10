<?php namespace App\Http\Controllers;

use App\Customization;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CustomizationRequest;
use App\User;
use Request;

class CustomizationController extends DashboardController {

	/**
	 * Display a list of Customizations belonging to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [];
        $data['customizations'] = \Auth::user()->customizations()->get();

        return view('customizations.index', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomizationRequest $request
     * @internal param $CustomizationRequest
     * @return Response
     */
	public function store(CustomizationRequest $request)
    {

        $customization = new Customization($request->all());
        \Auth::user()->customizations()->save($customization);

        return redirect('business\customizations');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $customization = Customization::findOrFail($id);

        return view('customizations.edit', compact('customization'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CustomizationRequest $request
     * @return Response
     */
	public function update($id, CustomizationRequest $request)
	{
        $customization = Customization::findOrFail($id);

        $customization->update($request->all());

        return redirect('business\customizations');
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
