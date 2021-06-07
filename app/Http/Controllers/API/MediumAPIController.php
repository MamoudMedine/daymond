<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMediumAPIRequest;
use App\Http\Requests\API\UpdateMediumAPIRequest;
use App\Models\Medium;
use App\Repositories\MediumRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MediumResource;
use Response;

/**
 * Class MediumController
 * @package App\Http\Controllers\API
 */

class MediumAPIController extends AppBaseController
{
    /** @var  MediumRepository */
    private $mediumRepository;

    public function __construct(MediumRepository $mediumRepo)
    {
        $this->mediumRepository = $mediumRepo;
    }

    /**
     * Display a listing of the Medium.
     * GET|HEAD /media
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $media = $this->mediumRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MediumResource::collection($media), 'Media retrieved successfully');
    }

    /**
     * Store a newly created Medium in storage.
     * POST /media
     *
     * @param CreateMediumAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMediumAPIRequest $request)
    {
        $input = $request->all();

        $medium = $this->mediumRepository->create($input);

        return $this->sendResponse(new MediumResource($medium), 'Medium saved successfully');
    }

    /**
     * Display the specified Medium.
     * GET|HEAD /media/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Medium $medium */
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            return $this->sendError('Medium not found');
        }

        return $this->sendResponse(new MediumResource($medium), 'Medium retrieved successfully');
    }

    /**
     * Update the specified Medium in storage.
     * PUT/PATCH /media/{id}
     *
     * @param int $id
     * @param UpdateMediumAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediumAPIRequest $request)
    {
        $input = $request->all();

        /** @var Medium $medium */
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            return $this->sendError('Medium not found');
        }

        $medium = $this->mediumRepository->update($input, $id);

        return $this->sendResponse(new MediumResource($medium), 'Medium updated successfully');
    }

    /**
     * Remove the specified Medium from storage.
     * DELETE /media/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Medium $medium */
        $medium = $this->mediumRepository->find($id);

        if (empty($medium)) {
            return $this->sendError('Medium not found');
        }

        $medium->delete();

        return $this->sendSuccess('Medium deleted successfully');
    }
}
