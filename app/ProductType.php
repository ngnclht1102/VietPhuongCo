<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table ='product_types';
	protected $guarded =[];
    public function products()
	{
		return $this->hasMany('App\Products','product_type');
	}
}
