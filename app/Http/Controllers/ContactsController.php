<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contacts;

class ContactsController extends Controller
{
   public function getlist()
   {
   		$data = Contacts::paginate(10);
    	return view('back-end.contacts.list',['data'=>$data]);
   }
   public function getedit($id)
   {
   		$data = Contacts::where('id',$id)->first();
   		return view('back-end.contacts.edit',['data'=>$data]);
   }

   public function getdel($id)
   {
       $item = Contacts::find($id);
        	$item->delete();
        	return redirect('admin/contacts')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xoá liên hệ thành công']);
   }
}
