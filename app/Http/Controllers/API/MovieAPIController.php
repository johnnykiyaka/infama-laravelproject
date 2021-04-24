<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMovieAPIRequest;
use App\Http\Requests\API\UpdateMovieAPIRequest;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MovieController
 * @package App\Http\Controllers\API
 */

class MovieAPIController extends AppBaseController
{
    /** @var  MovieRepository */
    private $movieRepository;

    public function __construct(MovieRepository $movieRepo)
    {
        $this->movieRepository = $movieRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/movies",
     *      summary="Get a listing of the Movies.",
     *      tags={"Movie"},
     *      description="Get all Movies",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Movie")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $movies = $this->movieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($movies->toArray(), 'Movies retrieved successfully');
    }

    /**
     * @param CreateMovieAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/movies",
     *      summary="Store a newly created Movie in storage",
     *      tags={"Movie"},
     *      description="Store Movie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Movie that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Movie")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Movie"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMovieAPIRequest $request)
    {
        $input = $request->all();

        $movie = $this->movieRepository->create($input);

        return $this->sendResponse($movie->toArray(), 'Movie saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/movies/{id}",
     *      summary="Display the specified Movie",
     *      tags={"Movie"},
     *      description="Get Movie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Movie",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Movie"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Movie $movie */
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            return $this->sendError('Movie not found');
        }

        return $this->sendResponse($movie->toArray(), 'Movie retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMovieAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/movies/{id}",
     *      summary="Update the specified Movie in storage",
     *      tags={"Movie"},
     *      description="Update Movie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Movie",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Movie that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Movie")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Movie"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMovieAPIRequest $request)
    {
        $input = $request->all();

        /** @var Movie $movie */
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            return $this->sendError('Movie not found');
        }

        $movie = $this->movieRepository->update($input, $id);

        return $this->sendResponse($movie->toArray(), 'Movie updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/movies/{id}",
     *      summary="Remove the specified Movie from storage",
     *      tags={"Movie"},
     *      description="Delete Movie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Movie",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Movie $movie */
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            return $this->sendError('Movie not found');
        }

        $movie->delete();

        return $this->sendSuccess('Movie deleted successfully');
    }
}
