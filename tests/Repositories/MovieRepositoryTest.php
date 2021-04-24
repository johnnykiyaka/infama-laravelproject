<?php namespace Tests\Repositories;

use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MovieRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MovieRepository
     */
    protected $movieRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->movieRepo = \App::make(MovieRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_movie()
    {
        $movie = factory(Movie::class)->make()->toArray();

        $createdMovie = $this->movieRepo->create($movie);

        $createdMovie = $createdMovie->toArray();
        $this->assertArrayHasKey('id', $createdMovie);
        $this->assertNotNull($createdMovie['id'], 'Created Movie must have id specified');
        $this->assertNotNull(Movie::find($createdMovie['id']), 'Movie with given id must be in DB');
        $this->assertModelData($movie, $createdMovie);
    }

    /**
     * @test read
     */
    public function test_read_movie()
    {
        $movie = factory(Movie::class)->create();

        $dbMovie = $this->movieRepo->find($movie->id);

        $dbMovie = $dbMovie->toArray();
        $this->assertModelData($movie->toArray(), $dbMovie);
    }

    /**
     * @test update
     */
    public function test_update_movie()
    {
        $movie = factory(Movie::class)->create();
        $fakeMovie = factory(Movie::class)->make()->toArray();

        $updatedMovie = $this->movieRepo->update($fakeMovie, $movie->id);

        $this->assertModelData($fakeMovie, $updatedMovie->toArray());
        $dbMovie = $this->movieRepo->find($movie->id);
        $this->assertModelData($fakeMovie, $dbMovie->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_movie()
    {
        $movie = factory(Movie::class)->create();

        $resp = $this->movieRepo->delete($movie->id);

        $this->assertTrue($resp);
        $this->assertNull(Movie::find($movie->id), 'Movie should not exist in DB');
    }
}
