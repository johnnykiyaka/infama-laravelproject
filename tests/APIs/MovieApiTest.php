<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Movie;

class MovieApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_movie()
    {
        $movie = factory(Movie::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/movies', $movie
        );

        $this->assertApiResponse($movie);
    }

    /**
     * @test
     */
    public function test_read_movie()
    {
        $movie = factory(Movie::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/movies/'.$movie->id
        );

        $this->assertApiResponse($movie->toArray());
    }

    /**
     * @test
     */
    public function test_update_movie()
    {
        $movie = factory(Movie::class)->create();
        $editedMovie = factory(Movie::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/movies/'.$movie->id,
            $editedMovie
        );

        $this->assertApiResponse($editedMovie);
    }

    /**
     * @test
     */
    public function test_delete_movie()
    {
        $movie = factory(Movie::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/movies/'.$movie->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/movies/'.$movie->id
        );

        $this->response->assertStatus(404);
    }
}
