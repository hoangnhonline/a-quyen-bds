<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesImg;
use App\Models\Banner;
use App\Models\Settings;
use App\Models\Articles;
use App\Models\MetaData;

use Helper, File, Session, Auth, Response;

class DetailController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){
        
       

    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {           
        Helper::counter(1, 3);
        $productArr = [];
        $slug = $request->slug;
        $detail = Articles::where('slug', $slug)->first();
        if(!$detail){
            return redirect()->route('home');
        }
        $id = $detail->id;        
        
        if( $detail->meta_id > 0){
           $meta = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $meta['title'] != '' ? $meta['title'] : $detail->title;
           $seo['description'] = $meta['description'] != '' ? $meta['description'] : $detail->title;
           $seo['keywords'] = $meta['keywords'] != '' ? $meta['keywords'] : $detail->title;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->title;
        }               
        if($detail->thumbnail_id){
            $socialImage = $detail->thumbnail->image_url;
        }else{
            $socialImage = '';
        }
       
        $query = Articles::where('status', 1)->where('id', '<>', $detail->id);                        
        $otherList = $query->orderBy('id', 'desc')->limit(6)->get();
        $bannerList =  Banner::where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        return view('frontend.detail', compact('detail', 'seo', 'socialImage', 'otherList', 'bannerList'));
    }
    public function full(Request $request)
    {   
        
        $productArr = [];
        $id = $request->id;
        $detail = Product::find($id);
        if(!$detail){
            return redirect()->route('home');
        }
        $seo['title'] = $seo['description'] = $seo['keywords'] = "Hình ảnh chi tiết sản phẩm ". $detail->name;
        if($detail->thumbnail_id){
            $socialImage = ProductImg::find($detail->thumbnail_id)->image_url;
        }else{
            $socialImage = '';
        }
        return view('frontend.detail.full', compact('detail', 'seo', 'socialImage'));
    }  

    public function tags(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');

        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $is_search = 0;
        $tagName = $request->tagName;

        $title = '';
        $cateDetail = (object) [];       
        
        $cateDetail = Tag::where('slug', $tagName)->first();
       
         $moviesArr = Film::where('status', 1)
        ->join('tag_objects', 'id', '=', 'tag_objects.object_id')
        ->where('tag_objects.tag_id', $cateDetail->id)
        ->where('tag_objects.type', 1)
        ->groupBy('object_id')
        ->orderBy('id', 'desc')->paginate(30);        
       
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;
        $cateDetail->name = "Phim theo tags : ".'"'.$cateDetail->name.'"';
        

        return view('frontend.cate', compact('title', 'settingArr', 'is_search', 'moviesArr', 'cateDetail', 'layout_name', 'page_name', 'cateActiveArr', 'moviesActiveArr'));
    }
    public function tagDetail(Request $request){
        $name = $request->name;
        
        $detail = Tag::where('name', urldecode($name))->first();
        //dd($detail->type);
        if(!$detail){
            return redirect()->route('home');
        }        
        
        $articlesList = (object)[];
        $listId = [];
        $listId = TagObjects::where(['type' => 1, 'tag_id' => $detail->id])->lists('object_id');
        if($listId){
            $listId = $listId->toArray();
        }
        if(!empty($listId)){
            $articlesList = Articles::whereIn('id', $listId)->orderBy('id', 'desc')->paginate(20);
        }  
        $newArr = Articles::orderBy('id', 'desc')->limit(6)->get(); 
        $page = $request->page ? $request->page : 1;
        if( $detail->meta_id > 0){
           $seo = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $seo['title'] != '' ? $seo['title'] : $detail->name;
           $seo['description'] = $seo['description'] != '' ? $seo['description'] : $detail->name;
           $seo['keywords'] = $seo['keywords'] != '' ? $seo['keywords'] : $detail->name;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name;
        }                     
         $articlesCate = ArticlesCate::where(['status' => 1])->orderBy('display_order')->get();
         $is_tag = 1;
        return view('frontend.news.index', compact('title', 'articlesList', 'seo', 'socialImage', 'articlesCate', 'newArr', 'page', 'is_tag', 'name'));
        
    }
}

