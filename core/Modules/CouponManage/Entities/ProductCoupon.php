<?php

namespace Modules\CouponManage\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCoupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'code',
        'discount',
        'discount_type',
        'discount_on',
        'discount_on_details',
        'expire_date',
        'status',
        'minimum_quantity',
        'minimum_spend',
        'maximum_spend',
        'usage_limit_per_coupon',
        'usage_limit_per_user',
    ];

}
