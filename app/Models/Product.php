<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



/**
 * Class Product
 * @package App\Models
 * @version March 8, 2021, 2:09 pm UTC
 *
 * @property string $title
 * @property string $cover_url
 * @property string $images
 * @property string $condition
 * @property string $description
 * @property boolean $is_soldout
 * @property boolean $is_unavailable
 * @property string $wholesale_price
 * @property string $old_wholesale_price
 * @property string $commission
 * @property string $min_suggestion_price
 * @property string $max_suggestion_price
 * @property string $delivery_price
 * @property string $abj_delivery_price
 * @property string $location
 */
class Product extends Model
{

    use HasFactory;


    public $table = 'products';




    public $fillable = [
        'title',
        'cover_url',
        'images',
        'condition',
        'description',
        'is_soldout',
        'is_unavailable',
        'wholesale_price',
        'old_wholesale_price',
        'commission',
        'min_suggestion_price',
        'max_suggestion_price',
        'delivery_price',
        'abj_delivery_price',
        'location'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'cover_url' => 'string',
        'images' => 'string',
        'condition' => 'string',
        'description' => 'string',
        'is_soldout' => 'boolean',
        'is_unavailable' => 'boolean',
        'wholesale_price' => 'string',
        'old_wholesale_price' => 'string',
        'commission' => 'string',
        'min_suggestion_price' => 'string',
        'max_suggestion_price' => 'string',
        'delivery_price' => 'string',
        'abj_delivery_price' => 'string',
        'location' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    function getCopyAttribute(){
        // $r = env('APP_URL')."/products/".$this->id;
        $n = "\n";
        $r = "";
        $r .= "Produit";
        $r .= $n.$this->title."";
        $r .= $n.$this->description;
        $r .= $n.$this->price;
        $r .= $n.$this->delivery;
        $r .= "";
        return $r;
    }


}
