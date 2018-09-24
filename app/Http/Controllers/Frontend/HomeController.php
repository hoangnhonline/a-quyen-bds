<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CateParent;
use App\Models\Cate;
use App\Models\Product;
use App\Models\SpThuocTinh;
use App\Models\ProductImg;
use App\Models\ThuocTinh;
use App\Models\LoaiThuocTinh;
use App\Models\Banner;
use App\Models\HoverInfo;
use App\Models\Articles;
use App\Models\ArticlesCate;
use App\Models\Customer;
use App\Models\Newsletter;
use App\Models\Settings;
use App\Models\Pages;

use Helper, File, Session, Auth, Hash;

class HomeController extends Controller
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
    public function index(Request $request){
        Helper::counter(1, 3);    
        $query = Product::where( [ 'status' => 1, 'is_hot' => 1])                            
                        ->where('price', '>', 0)            
			->where('thumbnail_id', '>', 0)
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')           
                        ->select('product_img.image_url', 'product.*')                        
                        ->orderBy('product.id', 'desc')            
                        ->limit(10);
       
        $productList = $query->get();

      //  dd($hoverInfo);
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo = $settingArr;
        
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];
        $seo['keywords'] = $settingArr['site_keywords'];

        $socialImage = $settingArr['banner'];      
        
        $hotParent = CateParent::where('is_hot',1)->orderBy('display_order')->get();

        return view('frontend.home.index', compact(
                                'productList', 
                                'socialImage', 
                                'seo', 
                                'hotParent'
                               ));
    }
    
    public function getNoti(){
        $countMess = 0;
        if(Session::get('userId') > 0){
            $countMess = CustomerNotification::where(['customer_id' => Session::get('userId'), 'status' => 1])->count();    
        }
        return $countMess;
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $tu_khoa = $request->keyword ? trim($request->keyword) : '';        
        $page = $request->page ? $request->page : 1;
        $loaiDetail = (object) [];
        $query = Product::where('product.status', 1);
        $query->where('price', '>', 0)->where('cate_parent.status', 1)                        
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')                     
                        ->join('cate_parent', 'cate_parent.id', '=', 'product.parent_id')
                        ->select('product_img.image_url', 'product.*');
        if($tu_khoa){
            $query->where('product.alias', 'LIKE', '%'.$tu_khoa.'%');
            $query->orWhere('product.code', 'LIKE', '%'.$tu_khoa.'%');
        }
        
        $query->orderBy('id', 'desc');
        
        $productList = $query->paginate(12);
        $loaiDetail->name = $seo['title'] = $seo['description'] =$seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";
        $layout = 3;       
        //var_dump("<pre>", $hoverInfo);die;
        return view('frontend.search.index', compact('productList', 'tu_khoa', 'seo', 'loaiDetail', 'cateArr', 'parent_id', 'cate_id','layout', 'page'));
    }
    public function thanhLy(Request $request)
    {
        $page = $request->page ? $request->page : 1;
        $loaiDetail = (object) [];
        $query = Product::where('product.status', 1)->where('thanh_ly', 1);
        $query->where('price', '>', 0)->where('cate_parent.status', 1)                        
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')                     
                        ->join('cate_parent', 'cate_parent.id', '=', 'product.parent_id')
                        ->select('product_img.image_url', 'product.*');       
        
        $query->orderBy('id', 'desc');
        
        $productList = $query->paginate(12);
        $seo['title'] = "Thanh lý áo dài, váy dạ hội, áo cưới giá rẻ";
        $seo['description'] = "Áo dài thanh lý cho studio, áo cưới, váy dạ hội mới 100%, các sản phẩm là hàng mẫu, thường là size S. Giá thanh lý lên đến 80% so với giá gốc";
        $seo['keywords'] = "lahava, wedding dress, áo cưới, đầm dạ hội, đầm dự tiệc, evening dresses, party dress";       
        $layout = 3;       
        //var_dump("<pre>", $hoverInfo);die;
        return view('frontend.search.thanh-ly', compact('productList', 'seo', 'sort','layout', 'page'));
    }
    public function pages(Request $request){
        
        Helper::counter(1, 3);
        $slug = $request->slug;

        $detailPage = Pages::where('slug', $slug)->first();
         
        if(!$detailPage){
            return redirect()->route('home');
        }
        $seo['title'] = $detailPage->meta_title ? $detailPage->meta_title : $detailPage->title;
        $seo['description'] = $detailPage->meta_description ? $detailPage->meta_description : $detailPage->title;
        $seo['keywords'] = $detailPage->meta_keywords ? $detailPage->meta_keywords : $detailPage->title;      

        return view('frontend.pages.index', compact('detailPage', 'seo', 'slug'));    
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function contact(Request $request){        

        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        return view('frontend.contact.index', compact('seo', 'socialImage'));
    }


    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}
