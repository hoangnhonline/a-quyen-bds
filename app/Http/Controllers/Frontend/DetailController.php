<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CateParent;
use App\Models\Cate;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Banner;
use App\Models\MetaData;
use App\Models\Tag;
use App\Models\Settings;
use App\Models\TagObjects;
use App\Models\Articles;
use App\Models\Color;
use App\Models\Size;
use App\Models\ArticlesCate;
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
        $tl = $request->tl ? $request->tl : 0;
        Helper::counter(1, 3);
        $productArr = [];
        $slug = $request->slug;
        $detail = Product::where('slug', $slug)->first();
        if(!$detail){
            return redirect()->route('home');
        }
        $id = $detail->id;
        $loaiDetail = CateParent::find( $detail->parent_id );
        $parent_id = $loaiDetail->id;
        $cateDetail = Cate::find( $detail->cate_id );

        $hinhArr = ProductImg::where('product_id', $detail->id)->get()->toArray();
        
        if( $detail->meta_id > 0){
           $meta = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $meta['title'] != '' ? $meta['title'] : $detail->name;
           $seo['description'] = $meta['description'] != '' ? $meta['description'] : $detail->name;
           $seo['keywords'] = $meta['keywords'] != '' ? $meta['keywords'] : $detail->name;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name;
        }               
        if($detail->thumbnail_id){
            $socialImage = ProductImg::find($detail->thumbnail_id)->image_url;
        }else{
            $socialImage = '';
        }
       
        $query = Product::where('product.slug', '<>', '')
                    ->where('product.parent_id', $detail->parent_id)
                    ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')                   
                    ->select('product_img.image_url', 'product.*')
                    ->where('product.id', '<>', $detail->id);                        
                    $otherList = $query->orderBy('product.id', 'desc')->limit(6)->get();
        $tagSelected = Product::getListTag($detail->id);

        // get list size selected
        $colorArr = $sizeArr = [];
        $colorList = Color::orderBy('display_order')->get();      
        $sizeList = Size::orderBy('display_order')->get();    
        foreach($colorList as $color){
            $colorArr[$color->id] = $color;
        }        
        foreach($detail->colors as $color){
            $colorSelected[] = $color->color_id;
        }         

       // dd($colorSelected);
        return view('frontend.detail.index', compact('detail', 'loaiDetail', 'cateDetail', 'hinhArr', 'productArr', 'seo', 'socialImage', 'otherList', 'tagSelected',
            'sizeArr', 'sizeSelected', 'colorArr', 'colorSelected', 'parent_id', 'tl'
            ));
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

