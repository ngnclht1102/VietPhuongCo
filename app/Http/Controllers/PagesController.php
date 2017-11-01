<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Requests;
use App\Http\SearchRequest;
use Auth;
use App\Products;
use App\Category;
use App\Pro_detail;
use App\News;
use App\Oders;
use App\Contacts;
use App\Oders_detail;
use DB,Cart,Datetime;

class PagesController extends Controller
{
    public function index()
    {
        $news =  DB::table('news')
                    ->where('is_pin', '1')
                    ->orderBy('created_at', 'desc')
                    ->where('status','=','1')
                    ->paginate(12);   
    	return view('home',['news'=>$news]);
    }
    public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }
    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('index');   
    }
    public function getcart()
    {   
    	return view ('detail.card')
        ->with('slug','Chi tiết đơn hàng');
    }
    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('detail.oder')
            ->with('slug','Xác nhận');
        }        
    }
    
    public function lienhe(Request $rq)
    {
         $this->validate($rq, [
            'name' => 'required|max:255',
            'note' => 'required',
            'email' => 'required|email',
        ], $this->messagesContact());


        $contact = new Contacts();
        $contact->email = $rq->email;
        $contact->name = $rq->name;
        $contact->note = $rq->note;
        $contact->save();
        
        return redirect()->route('lienhe')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Thành công. Cám ơn bạn đã gửi thông tin, chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất!']);    
        
    }
    public function messagesContact()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'name.max' => 'Vui lòng nhập họ và tên hợp lệ. (Dưới 255 ký tự)',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'note.required'  => 'Vui lòng nhập nội dung',
        ];
    }

    public function postoder(Request $rq)
    {
        $oder = new Oders();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->c_id = Auth::user()->id;
        $oder->qty = Cart::count();
        $oder->sub_total = floatval($total);
        $oder->total =  floatval($total);
        $oder->note = $rq->txtnote;
        $oder->status = 0;
        $oder->type = 'cod';
        $oder->created_at = new datetime;
        $oder->save();
        $o_id =$oder->id;

        foreach (Cart::content() as $row) {
           $detail = new Oders_detail();
           $detail->pro_id = $row->id;
           $detail->qty = $row->qty;
           $detail->o_id = $o_id;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        return redirect()->route('getcart')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);    
        
    }
    public function getcate($cat, Request $rq)
    {   
    	if ($cat == 'tim-kiem') {
            if($rq->keyword || $rq->tag) {
                $new =  DB::table('news')
                        ->orderBy('created_at', 'desc')
                        ->where('cat_id','=','22')
                        ->where('status','=','1')
                        ->paginate(5);
                
                if($rq->keyword){
                    $all = DB::table('news')
                        ->orderBy('created_at', 'desc')
                        ->where('title','like','%'.$rq->keyword.'%')
                        ->orWhere('slug','like','%'.$rq->keyword.'%')
                        ->orWhere('intro','like','%'.$rq->keyword.'%')
                        ->orWhere('full','like','%'.$rq->keyword.'%')
                        ->orWhere('tag','like','%'.$rq->keyword.'%')
                        ->paginate(10,['*'],'trang');
                    $products = DB::table('products')
                        ->join('category', 'products.cat_id', '=', 'category.id')
                        ->where('category.name','like','%'.$rq->keyword.'%')
                        ->orWhere('products.name','like','%'.$rq->keyword.'%')
                        ->orWhere('products.slug','like','%'.$rq->keyword.'%')
                        ->orWhere('r_intro','like','%'.$rq->keyword.'%')
                        ->orWhere('review','like','%'.$rq->keyword.'%')
                        ->orWhere('tag','like','%'.$rq->keyword.'%')
                        ->select('products.*')
                        ->paginate(12,['*'],'trang_sanpham');
                }
                else if($rq->tag) {
                    $products = [];
                    $all = DB::table('news')
                        ->orderBy('created_at', 'desc')
                        ->where('title','like','%'.$rq->tag.'%')
                        ->orWhere('slug','like','%'.$rq->tag.'%')
                        ->orWhere('intro','like','%'.$rq->tag.'%')
                        ->orWhere('full','like','%'.$rq->tag.'%')
                        ->orWhere('tag','like','%'.$rq->tag.'%')
                        ->paginate(10,['*'],'trang');
                 }   
    		    return view('search',['data'=>$new,'all'=>$all,'products'=>$products]);
            } 
            return redirect()->route('index');
    	} 

        elseif ($cat == 'lien-he') {            
            return view('contact');
        }

        elseif ($cat == 'san-pham') {
            if($rq->hang || $rq->type) {
                if($rq->hang && $rq->type) {
                    $products = DB::table('products')
                    ->join('category', 'products.cat_id', '=', 'category.id')
                    ->where('category.id','=',$rq->hang)
                    ->where('product_type','=',$rq->type)
                    ->select('products.*')
                    ->paginate(12);
                } else
                if($rq->hang) {
                    $products = DB::table('products')
                    ->join('category', 'products.cat_id', '=', 'category.id')
                    ->where('category.id','=',$rq->hang)
                    ->select('products.*')
                    ->paginate(12);
                }else
                if($rq->type) {
                    
                        
                    $type =  current(DB::table('product_types')->where('id', $rq->type)->get());

                    if($type->parent_id == 0 ) {
                        $products = [];
                        $idList = array(
                            0 => $type->id,
                        );
                        $children =  DB::table('product_types')->where('parent_id', $type->id)->get();
                        foreach ($children as $key => $child) {
                            $idList[] = $child->id;
                        }
                        
                        $products = DB::table('products')
                        ->join('category', 'products.cat_id', '=', 'category.id')
                        ->whereIn('product_type',$idList)
                        ->select('products.*')
                        ->paginate(12);
                    } else {
                        $products = DB::table('products')
                        ->join('category', 'products.cat_id', '=', 'category.id')
                        ->where('product_type','=',$rq->type)
                        ->select('products.*')
                        ->paginate(12);
                    }
                }
            } else {
                $products = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->select('products.*')
                ->paginate(12);
            }
            
            return view('product',['data'=>$products]);
        }
        
        elseif ($cat == 'giai-phap') {
            $new =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->where('cat_id','=','22')
                    ->where('status','=','1')
                    ->paginate(5);
            $all = DB::table('news')
                   ->orderBy('is_top', 'desc')
                   ->orderBy('created_at', 'desc')
                   ->where('cat_id','=','22')
                   ->where('status','=','1')
                   ->paginate(10,['*'],'trang');
            return view('new_list',['data'=>$new,'all'=>$all]);
        } elseif ($cat == 'kien-thuc') {
            $new =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->where('cat_id','=','23')
                    ->where('id','<>','26')
                    ->where('status','=','1')
                    ->paginate(5);
            $all = DB::table('news')
                   ->orderBy('is_top', 'desc')
                   ->orderBy('created_at', 'desc')
                   ->where('cat_id','=','23')
                   ->where('id','<>','26')
                   ->where('status','=','1')
                   ->paginate(10,['*'],'trang');
            return view('new_list',['data'=>$new,'all'=>$all]);
        } 
        
    }
    public function detail($cat,$id,$slug)
    {
        if ($cat =='tin-tuc') {
            $new = News::where('id',$id)->first();
            return view('detail.news',['data'=>$new,'slug'=>$slug]);
        } elseif ($cat =='mobile') {
            $mobile = Products::where('id',$id)->first();
            if (empty($mobile)) {
                return view ('errors.503');
                } else {
                   return view ('detail.mobile',['data'=>$mobile,'slug'=>$slug]);
               }
        }
        elseif ($cat =='laptop') {
            $lap = Products::where('id',$id)->first();
            if (empty($lap)) {
            return redirect()->route('index');
            } else {
           return view ('detail.laptop',['data'=>$lap,'slug'=>$slug]);
            }
        }
        elseif ($cat =='pc') {            
            $pc = Products::where('id',$id)->first();
            if (empty($pc)) {
                return redirect()->route('index');
            } else {
                return view ('detail.pc',['data'=>$pc,'slug'=>$slug]);
            }
        } 
        elseif ($cat =='san-pham') {            
            $pc = Products::where('id',$id)->first();
            if (empty($pc)) {
                return redirect()->route('index');
            } else {
                return view ('product-detail',['data'=>$pc,'slug'=>$slug]);
            }
        } else {
            return redirect()->route('index');
        }
    }

    
}
