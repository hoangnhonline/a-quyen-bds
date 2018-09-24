<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ArticlesImg extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles_img';	

	 /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'articles_id', 
                    'image_url', 
                    'display_order',                    
                    'is_thumbnail'
                ];
    
}
