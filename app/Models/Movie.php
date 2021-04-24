<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Movie",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="series",
 *          description="series",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="seriesStart",
 *          description="seriesStart",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="seriesEnds",
 *          description="seriesEnds",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Movie extends Model
{
    use SoftDeletes;

    public $table = 'movies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'series',
        'seriesStart',
        'seriesEnds'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'series' => 'string',
        'seriesStart' => 'date',
        'seriesEnds' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
