<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Models\Product;
use App\Models\MetaData;

use Helper, File, Session, Auth;
use Mail;

class NewsController extends Controller
{
    public function newsListCate(Request $request)
    {
        Helper::counter(1, 3);
        $slug = $request->slug;
        $page = $request['page'] ? $request['page'] : 1;       
        $cateArr = [];
       
        $cateDetail = ArticlesCate::where('slug', $slug)->first();
        if(!$cateDetail){
            return redirect()->route('home');
        }

        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesList = Articles::where('cate_id', $cateDetail->id)->orderBy('id', 'desc')->paginate(20);        
        $seo['title'] = $cateDetail->meta_title ? $cateDetail->meta_title : $cateDetail->title;
        $seo['description'] = $cateDetail->meta_description ? $cateDetail->meta_description : $cateDetail->title;
        $seo['keywords'] = $cateDetail->meta_keywords ? $cateDetail->meta_keywords : $cateDetail->title;
        $socialImage = $cateDetail->image_url;   
        $newArr = Articles::orderBy('id', 'desc')->limit(6)->get();   
        $articlesCate = ArticlesCate::where(['status' => 1])->orderBy('display_order')->get();
        $page = $request->page ? $request->page : 1;
        return view('frontend.news.index', compact('title', 'newArr', 'articlesList', 'cateDetail', 'seo', 'socialImage', 'page', 'newProductList', 'articlesCate', 'page'));
    } 
    public function newsList(Request $request)
    {
        Helper::counter(1, 3);
        $articlesList = Articles::orderBy('id', 'desc')->paginate(10);

        $seo['title'] = "Blog";
        $seo['description'] = "Chia sẻ xu hướng thời trang áo cưới, dạ hội, áo dài cưới, phụ kiện và các sự kiện liên quan đến LAHAVA";
        $seo['keywords'] = "áo dài cưới, váy cưới dạ hội";
        $socialImage = null;      
        $articlesCate = ArticlesCate::where(['status' => 1])->orderBy('display_order')->get();
        $newArr = Articles::orderBy('id', 'desc')->limit(6)->get(); 
        $page = $request->page ? $request->page : 1;
        return view('frontend.news.index', compact('title', 'articlesList', 'seo', 'socialImage', 'articlesCate', 'newArr', 'page'));
    }      

     public function newsDetail(Request $request)
    { 

        Helper::counter(1, 3);
        $slug = $request->slug;

        $detail = Articles::where( 'slug', $slug )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_id', 'created_at', 'cate_id')
                ->first();
        
        if( $detail ){           

            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $newArr = Articles::where('id', '<>', $detail->id)->orderBy('id', 'desc')->limit(6)->get();
            $otherArr = Articles::where( ['cate_id' => $detail->cate_id] )->where('id', '<>', $detail->id)->orderBy('id', 'desc')->limit(6)->get();
            
            if( $detail->meta_id > 0){
               $meta = MetaData::find( $detail->meta_id )->toArray();
               $seo['title'] = $meta['title'] != '' ? $meta['title'] : $detail->name;
               $seo['description'] = $meta['description'] != '' ? $meta['description'] : $detail->name;
               $seo['keywords'] = $meta['keywords'] != '' ? $meta['keywords'] : $detail->name;
            }else{
                $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name;
            } 
            
            $socialImage = $detail->image_url; 
          
            $tagSelected = Articles::getListTag($detail->id);
            $cateDetail = ArticlesCate::find($detail->cate_id);
            $articlesCate = ArticlesCate::where(['status' => 1])->orderBy('display_order')->get();
            return view('frontend.news.news-detail', compact('title',  'newArr', 'detail', 'otherArr', 'seo', 'socialImage', 'tagSelected', 'cateDetail', 'articlesCate'));
        }else{
            return view('erros.404');
        }
    }
}

