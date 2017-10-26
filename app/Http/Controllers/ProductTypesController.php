<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductsTypeRequest;
use App\ProductType;

class ProductTypesController extends Controller
{
   public function getlist()
   {
   		$data = ProductType::paginate(10);
    	return view('back-end.product_types.list',['data'=>$data]);
   }
   public function getedit($id)
   {
           $data = ProductType::where('id',$id)->first();
           try{
            $parent = ProductType::where('id',$data->parent_id)->first();
           } catch(Exception $e) {
               echo '';
           }

           
   		return view('back-end.product_types.edit',['data'=>$data, 'parent' => $parent]);
   }

   public function postedit($id, ProductsTypeRequest $rq)
   {
   		$data = ProductType::find($id);
        $data->name = $rq->txtName;
        $data->slug = str_slug($rq->txtName,'-');
        $data->parent_id = $rq->sltParent;
        $data->save(); 
    return redirect('admin/product_types')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã sửa kiểu sản phẩm thành công']);
   }

   public function getadd()
   {
   		return view('back-end.product_types.add');
   }

   public function postadd(ProductsTypeRequest $rq)
   {
   		$data = new ProductType();
        $data->name = $rq->txtName;
        $data->parent_id = $rq->sltParent;
        $data->slug = str_slug($rq->txtName,'-');
        $data->save(); 
    return redirect('admin/product_types')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã thêm kiểu sản phẩm thành công']);
   }

   public function getdel($id)
   {
       $item = ProductType::find($id);
        $item->delete();
        return redirect('admin/product_types')
        ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xoá kiểu sản phẩm thành công']);
   }
}
