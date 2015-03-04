<?php namespace App\Http\Controllers;

use App\CustomizationGroup;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CustomizationGroupRequest;
use App\Http\Requests\LocationRequest;
use App\Location;
use App\User;
use Request;

class CustomizationGroupController extends DashboardController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [];
        $data['customization_groups'] = \Auth::user()->customizationGroups()->get();

        return view('customizationgroups.index', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomizationGroupRequest $request
     * @internal param $CustomizationGroupRequest
     * @return Response
     */
	public function store(CustomizationGroupRequest $request)
    {

        $customization_group = new CustomizationGroup($request->all());
        \Auth::user()->customizationGroups()->save($customization_group);

        return redirect('business\customizationgroups');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $customization_group = CustomizationGroup::findOrFail($id);

        return view('customizationgroups.edit', compact('customization_group'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param LocationRequest $request
     * @return Response
     */
	public function update($id, CustomizationGroupRequest $request)
	{
        $customization_group = CustomizationGroup::findOrFail($id);

        $customization_group->update($request->all());

        return redirect('business\customizationgroups');
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
