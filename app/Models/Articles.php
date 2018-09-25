<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Articles extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles';

	 /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'slug', 
        'alias', 
        'description',
        'contact', 
        'about',
        'image_list',
        'cate_id', 
        'thumbnail_id',                            
        'position', 
        'status', 
        'display_order', 
        'utilities', 
        'ground', 
        'process',
        'is_hot', 
        'content',
        'meta_id', 
        'created_user', 
        'updated_user'
    ];
    public static function getListTag($id){
        $query = TagObjects::where(['object_id' => $id, 'tag_objects.type' => 1])
            ->join('tag', 'tag.id', '=', 'tag_objects.tag_id')        
            ->get();
        return $query;
    }
    public function createdUser()
    {
        return $this->belongsTo('App\Models\Account', 'created_user');
    }
    public function updatedUser()
    {
        return $this->belongsTo('App\Models\Account', 'updated_user');
    }
    public function cates()
    {
        return $this->belongsTo('App\Models\ArticlesCate', 'cate_id');
    }
    public function thumbnail()
    {
        return $this->belongsTo('App\Models\ArticlesImg', 'thumbnail_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\ArticlesImg', 'articles_id');
    }
}
