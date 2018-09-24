<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Sodo;
use Mail;
use Helper, File, Session, Auth;

class ContactController extends Controller
{ 
   
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                       
            'email' => 'email|required',
            'full_name' => 'required',
            'content' => 'required',
            'phone' => 'required'         
        ],
        [            
            'full_name.required' => 'Bạn chưa nhập họ và tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'content.required' => 'Bạn chưa nhập nội dung.'            
        ]);       
        if(isset($dataArr['image_list'])){
            $dataArr['image_list'] = json_encode($dataArr['image_list']);
        }
        $rs = Contact::create($dataArr);

        $emailArr = ['hoangnhonline@gmail.com', 'lananhthoitrang@gmail.com'];
        
        
        Mail::send('frontend.contact.email',
            [                   
                'dataArr'             => $rs
            ],
            function($message) use ($dataArr, $emailArr) {                    
                $message->subject('Khách hàng gửi Tư vấn / Góp ý / Báo giá');
                $message->to($emailArr);
                $message->replyTo($dataArr['email'], $dataArr['full_name']);
                $message->from('web.0917492306@gmail.com', 'LAHAVA');
                $message->sender('web.0917492306@gmail.com', 'LAHAVA');
        });        

        Session::flash('message', 'Gửi thông tin thành công.');

        return redirect()->route('tuvan');
    }

    public function storeSodo(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                       
            
            'full_name' => 'required',           
            'phone' => 'required',  
            'email' => 'email|required',      
        ],
        [            
            'full_name.required' => 'Bạn chưa nhập họ và tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
        ]);       

        $rs = Sodo::create($dataArr);
        $emailArr = ['hoangnhonline@gmail.com', 'lananhthoitrang@gmail.com'];
        
        
        Mail::send('frontend.contact.so-do',
            [                   
                'dataArr'             => $rs
            ],
            function($message) use ($dataArr, $emailArr) {                    
                $message->subject('Khách hàng gửi số đo');
                $message->to($emailArr);
                $message->replyTo($dataArr['email'], $dataArr['full_name']);
                $message->from('web.0917492306@gmail.com', 'LAHAVA');
                $message->sender('web.0917492306@gmail.com', 'LAHAVA');
        });   
        Session::flash('message', 'Gửi số đo thành công.');

        return redirect()->route('hd-sodo','#sodo');
    }
    
}
