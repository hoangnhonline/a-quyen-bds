<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Tag;
use App\Models\TagObjects;
use App\Models\Articles;
use App\Models\ArticlesImg;
use App\Models\MetaData;
use App\Models\Rating;

use Helper, File, Session, Auth, Image;

class ArticlesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {   
        
        $cate_id = isset($request->cate_id) ? $request->cate_id : null;

        $title = isset($request->title) && $request->title != '' ? $request->title : '';
        
        $query = Articles::where('status', 1);

        if( $cate_id > 0){
            $query->where('cate_id', $cate_id);
        }
        // check editor
        if( Auth::user()->role < 3 ){
            $query->where('created_user', Auth::user()->id);
        }
        if( $title != ''){
            $query->where('alias', 'LIKE', '%'.$title.'%');
        }

        $items = $query->orderBy('is_hot', 'desc')->orderBy('id', 'desc')->paginate(20);
        
        $cateArr = ArticlesCate::where('type', 1)->get();
        
        return view('backend.articles.index', compact( 'items', 'cateArr' , 'title', 'cate_id' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        
        $cateArr = ArticlesCate::where('type', 1)->get();
        
        $cate_id = $request->cate_id;

        $tagArr = Tag::where('type', 1)->orderBy('id', 'desc')->get();

        return view('backend.articles.create', compact( 'tagArr', 'cateArr', 'cate_id'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();

        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required' ,                                 
        ],
        [
            'title.required' => 'Bạn chưa nhập tên dự án',
            'slug.required' => 'Bạn chưa nhập slug',
        ]);
       
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
        
        $dataArr['alias'] = str_slug($dataArr['title'], " ");
        $dataArr['slug'] = str_slug($dataArr['title'], "-");

        $dataArr['status'] = 1;     

        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id;  

        $rs = Articles::create($dataArr);

        $articles_id = $rs->id;       

        $this->storeImage( $articles_id, $dataArr);
        $this->storeMeta($articles_id, 0, $dataArr);
        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('articles.index');
    }

    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [ 'title' => $dataArr['meta_title'], 'description' => $dataArr['meta_description'], 'keywords'=> $dataArr['meta_keywords'], 'custom_text' => $dataArr['custom_text'], 'updated_user' => Auth::user()->id ];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;            
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;
            
            $modelSp = Articles::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);           
            $model->update( $arrData );
        }              
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        
        $tagSelected = [];

        $detail = Articles::find($id);
        if( Auth::user()->role < 3 ){
            if($detail->created_user != Auth::user()->id){
                return redirect()->route('articles.index');
            }
        }
        $cateArr = ArticlesCate::where('type', 1)->get();    

        $tmpArr = TagObjects::where(['type' => 1, 'object_id' => $id])->get();
        
        if( $tmpArr->count() > 0 ){
            foreach ($tmpArr as $value) {
                $tagSelected[] = $value->tag_id;
            }
        }
        
        $tagArr = Tag::where('type', 1)->get();
        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }

        return view('backend.articles.edit', compact('tagArr', 'tagSelected', 'detail', 'cateArr', 'meta'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required' ,                                 
        ],
        [
            'title.required' => 'Bạn chưa nhập tên dự án',
            'slug.required' => 'Bạn chưa nhập slug',
        ]);
       
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;      
        
        $dataArr['alias'] = str_slug($dataArr['title'], " ");
        $dataArr['slug'] = str_slug($dataArr['title'], "-");

        $dataArr['updated_user'] = Auth::user()->id;
            
        $model = Articles::find($dataArr['id']);

        $model->update($dataArr);
        
        $articles_id = $dataArr['id'];

        $this->storeMeta( $articles_id, $dataArr['meta_id'], $dataArr);
        $this->storeImage( $articles_id, $dataArr);
        Session::flash('message', 'Chỉnh sửa thành công');

        return redirect()->route('articles.edit', $dataArr['id']);
    }

    public function storeImage($id, $dataArr){     
        //process old image
        $imageIdArr = isset($dataArr['image_id']) ? $dataArr['image_id'] : [];
        $hinhXoaArr = ArticlesImg::where('articles_id', $id)->whereNotIn('id', $imageIdArr)->lists('id');
        if( $hinhXoaArr )
        {
            foreach ($hinhXoaArr as $image_id_xoa) {
                $model = ArticlesImg::find($image_id_xoa);
                $urlXoa = config('dongsg.upload_path')."/".$model->image_url;
                if(is_file($urlXoa)){
                    unlink($urlXoa);
                }
                $model->delete();
            }
        }       

        //process new image
        if( isset( $dataArr['thumbnail_id'])){
            $thumbnail_id = $dataArr['thumbnail_id'];

            $imageArr = []; 

            if( !empty( $dataArr['image_tmp_url'] )){

                foreach ($dataArr['image_tmp_url'] as $k => $image_url) {
                    
                    $origin_img = base_path().$image_url;
                    
                    if( $image_url ){

                        $imageArr['is_thumbnail'][] = $is_thumbnail = $dataArr['thumbnail_id'] == $image_url  ? 1 : 0;

                        $img = Image::make($origin_img);
                        $w_img = $img->width();
                        $h_img = $img->height();

                        $tmpArrImg = explode('/', $origin_img);
                        
                        $new_img = config('dongsg.upload_thumbs_path').end($tmpArrImg);

                        if($w_img/$h_img > 360/204){

                            Image::make($origin_img)->resize(null, 204, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(360, 204)->save($new_img);
                        }else{
                            Image::make($origin_img)->resize(360, null, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(360, 204)->save($new_img);
                        }

                        $imageArr['name'][] = $image_url;
                        
                    }
                }
            }
            if( !empty($imageArr['name']) ){
                foreach ($imageArr['name'] as $key => $name) {
                    $rs = ArticlesImg::create(['articles_id' => $id, 'image_url' => $name, 'display_order' => 1]);                
                    $image_id = $rs->id;
                    if( $imageArr['is_thumbnail'][$key] == 1){
                        $thumbnail_id = $image_id;
                    }
                }
            }
            $model = Articles::find( $id );
            $model->thumbnail_id = $thumbnail_id;
            $model->save();
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Articles::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('articles.index');
    }
}
