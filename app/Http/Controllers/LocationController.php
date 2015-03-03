<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LocationRequest;
use App\Location;
use App\User;
use Request;

class LocationController extends DashboardController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = [];
        $data['locations'] = Location::all();

        return view('locations.index', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationRequest $request
     * @return Response
     */
	public function store(LocationRequest $request)
    {

        $location = new Location($request->all());
        \Auth::user()->locations()->save($location);

        return redirect('business\locations');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('locations.edit', compact('location'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param LocationRequest $request
     * @return Response
     */
	public function update($id, LocationRequest $request)
	{
        $location = Location::findOrFail($id);

        $location->update($request->all());

        return redirect('business\locations');
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
