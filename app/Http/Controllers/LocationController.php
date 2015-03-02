<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateLocationRequest;
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

        return view('business\locations', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('business\location', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLocationRequest $request
     * @return Response
     */
	public function store(CreateLocationRequest $request)
    {

        $location = new Location($request->all());
        \Auth::user()->locations()->save($location);

        return redirect('business\locations');
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
		//
        $location = Location::findOrFail($id);

        return view('business\location\edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $location = new Location($request->all());
        \Auth::user()->locations()->save($location);

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
