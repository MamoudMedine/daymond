<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Medium
 * @package App\Models
 * @version March 8, 2021, 5:22 pm UTC
 *
 * @property string $url
 * @property string $title
 * @property string $detail
 */
class Medium extends Model
{


    public $table = 'media';
    



    public $fillable = [
        'url',
        'title',
        'detail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'title' => 'string',
        'detail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'title text'
    ];

    
}
