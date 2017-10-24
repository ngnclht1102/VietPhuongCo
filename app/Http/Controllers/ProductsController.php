<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\EditProductsRequest;
use App\Http\Requests;
use App\Products;
use App\ProductType;
use App\Category;
use App\Pro_details;
use App\Detail_img;
use Auth;
use DateTime,File,Input,DB;


class ProductsController extends Controller
{
	public function getlist($id)
	{
        if ($id!='all') {
            $pro = Products::where('cat_id',$id)->orderBy('created_at','desc')->paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                    
        } else {
            $pro = Products::orderBy('created_at','desc')->paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
        }		
	}
    public function getadd()
    {
        $type= ProductType::where('status',1)->get();
		$cat= Category::where('type',1)->get();
		return view('back-end.products.add',['data'=>[],'cat'=>$cat,'type'=>$type]);
    }
    public function postadd(AddProductsRequest $rq)
    {
    	$pro = new Products();

    	$pro->name = $rq->txtname;
    	$pro->slug = str_slug($rq->txtname,'-');
    	$pro->intro = $rq->txtintro;
    	$pro->r_intro = $rq->txtre_Intro;
    	$pro->review = $rq->txtReview;
    	$pro->price = $rq->txtprice;
    	$pro->cat_id = $rq->sltCate;
        $pro->product_type = $rq->sltType;
    	$pro->user_id = Auth::guard('admin')->user()->id;
    	$pro->created_at = new datetime;
    	$pro->status = '1';
    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$pro->images = $filename;    	
    	$rq->file('txtimg')->move('uploads/products/',$filename);
    	$pro->save();    	
	return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);    	

    }
    public function getdel($id)
    {
        $detail = Detail_img::where('pro_id',$id)->get();
        foreach ($detail as $row) {                
               $dt = Detail_img::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url; 
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
    	$pro = Products::find($id);
        $pro->delete();
        return redirect('admin/sanpham/all')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }
    public function getedit($id)
    {
        $type= ProductType::where('status',1)->get();
		$cat= Category::where('type',1)->get();

        $dt = Products::where('id',$id)->first();
        $c_id= $dt->cat_id;
        $loai= Category::where('id',$c_id)->first();
        $p_id = $loai->parent_id;

        $pro = Products::where('id',$id)->first();
        return view('back-end.products.edit',['pro'=>$pro,'cat'=>$cat,'type'=>$type]);    
    }
    public function postedit($id,EditProductsRequest $rq)
    {
    	$pro = Products::find($id);

        $pro->name = $rq->txtname;
        $pro->slug = str_slug($rq->txtname,'-');
        $pro->intro = $rq->txtintro;
        $pro->r_intro = $rq->txtre_Intro;
        $pro->review = $rq->txtReview;
        $pro->tag = $rq->txttag;
        $pro->price = $rq->txtprice;
        $pro->cat_id = $rq->sltCate;
        $pro->product_type = $rq->sltType;
        $pro->user_id = Auth::guard('admin')->user()->id;
        $pro->updated_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('uploads/products/').$pro->images;        
        if ($rq->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $rq->file('txtimg')->move('uploads/products/',$filename);
        }       
        $pro->save(); 
    return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu !']);       
    }
}
