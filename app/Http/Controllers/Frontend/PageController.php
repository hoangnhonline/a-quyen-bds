<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use Helper, File, Session, Auth;
use Mail;

class PageController extends Controller
{
    public function index(Request $request)
    {
       // return $request->email;
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
        }

        return 'sucess';
    }
    public function customerService(Request $request){
      $seo['title'] = "Hướng dẫn mua hàng";
      $seo['description'] = "Dịch vụ khách hàng - LAHAVA Vietnam"; 
      $seo['keywords'] = "lahava, wedding dress, áo cưới, đầm dạ hội, đầm dự tiệc, evening dresses, party dress";
      return view('frontend.pages.customer-service', compact('seo'));
    }

    public function hdSodo(Request $request){
      $seo['title'] = "Hướng dẫn lấy số đo may áo dài, áo cưới";
      $seo['description'] = "Hướng dẫn chi tiết cách tự lấy số đo may áo dài, áo cưới, đầm váy dạ hội một cách chính xác và nhanh nhất. LAHAVA"; 
      $seo['keywords'] = "hướng dẫn lấy số đo may áo dài, áo cưới";
      return view('frontend.pages.hd-sodo', compact('seo')); 
    }

    public function tuvan(Request $request){
      $seo['title'] = "Tư vấn - báo giá";
      $seo['description'] = "Tư vấn - báo giá sản phẩm LAHAVA"; 
      $seo['keywords'] = "tư vấn may áo dài, áo cưới";
      return view('frontend.pages.tu-van', compact('seo')); 
    }
}

