<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateflightRequest;
use App\Http\Requests\UpdateflightRequest;
use App\Repositories\flightRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class flightController extends AppBaseController
{
    /** @var  flightRepository */
    private $flightRepository;

    public function __construct(flightRepository $flightRepo)
    {
        $this->flightRepository = $flightRepo;
    }

    /**
     * Display a listing of the flight.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $flights = $this->flightRepository->all();

        return view('flights.index')
            ->with('flights', $flights);
    }

    /**
     * Show the form for creating a new flight.
     *
     * @return Response
     */
    public function create()
    {
        return view('flights.create');
    }

    /**
     * Store a newly created flight in storage.
     *
     * @param CreateflightRequest $request
     *
     * @return Response
     */
    public function store(CreateflightRequest $request)
    {
        $input = $request->all();

        $flight = $this->flightRepository->create($input);

        Flash::success('Flight saved successfully.');

        return redirect(route('flights.index'));
    }

    /**
     * Display the specified flight.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $flight = $this->flightRepository->find($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flights.index'));
        }

        return view('flights.show')->with('flight', $flight);
    }

    /**
     * Show the form for editing the specified flight.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $flight = $this->flightRepository->find($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flights.index'));
        }

        return view('flights.edit')->with('flight', $flight);
    }

    /**
     * Update the specified flight in storage.
     *
     * @param int $id
     * @param UpdateflightRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateflightRequest $request)
    {
        $flight = $this->flightRepository->find($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flights.index'));
        }

        $flight = $this->flightRepository->update($request->all(), $id);

        Flash::success('Flight updated successfully.');

        return redirect(route('flights.index'));
    }

    /**
     * Remove the specified flight from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $flight = $this->flightRepository->find($id);

        if (empty($flight)) {
            Flash::error('Flight not found');

            return redirect(route('flights.index'));
        }

        $this->flightRepository->delete($id);

        Flash::success('Flight deleted successfully.');

        return redirect(route('flights.index'));
    }
}
