<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="flight",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="movie",
 *          description="movie",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="start",
 *          description="start",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="stop",
 *          description="stop",
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
class flight extends Model
{
    use SoftDeletes;

    public $table = 'flights';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movie',
        'start',
        'stop'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'movie' => 'string',
        'start' => 'date',
        'stop' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
