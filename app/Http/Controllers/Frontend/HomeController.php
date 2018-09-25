<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Articles;
use App\Models\ArticlesImg;
use App\Models\Newsletter;
use App\Models\Settings;
use App\Models\Pages;

use Helper, File, Session, Auth, Hash;

class HomeController extends Controller
{
    public function __construct(){        
       
    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */    
    public function index(Request $request){
        Helper::counter(1, 3);    
        
        $articlesList = Articles::where('status', 1)->orderBy('id', 'desc')->get();
      
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo = $settingArr;
        
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];
        $seo['keywords'] = $settingArr['site_keywords'];

        $socialImage = $settingArr['banner'];
        $bannerList =  Banner::where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        return view('frontend.home', compact(
                                'articlesList', 
                                'socialImage', 
                                'seo', 
                                'bannerList'
                               ));
    }
    
    public function getNoti(){
        $countMess = 0;
        if(Session::get('userId') > 0){
            $countMess = CustomerNotification::where(['customer_id' => Session::get('userId'), 'status' => 1])->count();    
        }
        return $countMess;
    }
    
    public function pages(Request $request){
        
        Helper::counter(1, 3);
        $slug = $request->slug;

        $detail = Pages::where('slug', $slug)->first();
         
        if(!$detail){
            return redirect()->route('home');
        }
        $seo['title'] = $detail->meta_title ? $detail->meta_title : $detail->title;
        $seo['description'] = $detail->meta_description ? $detail->meta_description : $detail->title;
        $seo['keywords'] = $detail->meta_keywords ? $detail->meta_keywords : $detail->title;      
        $bannerList =  Banner::where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        return view('frontend.pages', compact('detail', 'seo', 'slug', 'bannerList'));    
    }   

}
