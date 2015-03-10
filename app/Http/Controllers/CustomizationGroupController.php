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

	private function syncCustomizations(CustomizationGroup $customization_group, $customizations)
    {

        $customization_group->customizations()->sync($customizations);
    }

    /**
	 * Display a listing of all Customization Groups belong to a user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [];
        $data['customization_groups'] = \Auth::user()->customizationGroups()->get();
        $data['customizations'] = \Auth::user()->customizations()->lists('name', 'id');
        $data['customizations_selected'] = [];

        return view('customizationgroups.index', $data);

	}

    /**
     * Store a newly created Customization Group in the database.
     *
     * @param CustomizationGroupRequest $request
     * @internal param $CustomizationGroupRequest
     * @return Response
     */
	public function store(CustomizationGroupRequest $request)
    {
        $customization_group = new CustomizationGroup($request->all());
        \Auth::user()->customizationGroups()->save($customization_group);

        $this->syncCustomizations($customization_group, $request->input('customizations'));

        return redirect('business\customization_groups');
	}

	/**
	 * Show the form for editing an existing Customization Group record.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $data = [];
        $customizationGroup = CustomizationGroup::findOrFail($id);
        $data['customization_group'] = $customizationGroup;
        $data['customizations'] = \Auth::user()->customizations()->lists('name', 'id');
        $data['customizations_selected'] = $customizationGroup->customizations->lists('id');

        return view('customizationgroups.edit', $data);
	}

    /**
     * Update the specified Customization Group in the database.
     *
     * @param  int $id
     * @param LocationRequest $request
     * @return Response
     */
	public function update($id, CustomizationGroupRequest $request)
	{
        $customization_group = CustomizationGroup::findOrFail($id);

        $customization_group->update($request->all());
        $this->syncCustomizations($customization_group, $request->input('customizations'));

        return redirect('business\customization_groups');
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
