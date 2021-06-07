<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediumRequest;
use App\Http\Requests\UpdateMediumRequest;
use App\Repositories\MediumRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MediumController extends AppBaseController
{
    /** @var  MediumRepository */
    private $mediumRepository;

    public function __construct(MediumRepository $mediumRepo)
    {
        $this->mediumRepository = $mediumRepo;
    }

    /**
     * Display a listing of the Medium.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $media = $this->mediumRepository->all();

        return view('media.index')
            ->with('media', $media);
    }

    /**
     * Show the form for creating a new Medium.
     *
     * @return Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created Medium in storage.
     *
     * @param CreateMediumRequest $request
     *
     * @return Response
     */
    public function store(CreateMediumRequest $request)
    {
        $input = $request->all();

        $medium = $this->mediumRepository->create($input);

        Flash::success('Medium saved successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Display the specified Medium.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            Flash::error('Medium not found');

            return redirect(route('media.index'));
        }

        return view('media.show')->with('medium', $medium);
    }

    /**
     * Show the form for editing the specified Medium.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            Flash::error('Medium not found');

            return redirect(route('media.index'));
        }

        return view('media.edit')->with('medium', $medium);
    }

    /**
     * Update the specified Medium in storage.
     *
     * @param int $id
     * @param UpdateMediumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediumRequest $request)
    {
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            Flash::error('Medium not found');

            return redirect(route('media.index'));
        }

        $medium = $this->mediumRepository->update($request->all(), $id);

        Flash::success('Medium updated successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Remove the specified Medium from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            Flash::error('Medium not found');

            return redirect(route('media.index'));
        }

        $this->mediumRepository->delete($id);

        Flash::success('Medium deleted successfully.');

        return redirect(route('media.index'));
    }
}
