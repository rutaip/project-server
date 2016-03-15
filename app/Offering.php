<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $fillable = [
        'project_name',
        'customer_id',
        'partner_id',
        'pm_id',
        'region_id',
        'country',
        'acd_type_id',
        'project_type_id',
        'sd',
        'master_status',
        'original_date',
        'expected_date',
        'delivery_date',
        'days_contracted',
        'days_spent',
        'amount_eur',
        'amount_usd',
        'amount_pending',
        'completed',
        'description',
        'vsp_link',
        'user_id',
        'color'
    ];

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function partner()
    {
        return $this->hasOne(Partner::class, 'id', 'partner_id');
    }

    public function pm()
    {
        return $this->hasOne(Pm::class, 'id', 'pm_id');
    }

    public function acd_type()
    {
        return $this->hasOne(Acd::class, 'id', 'acd_type_id');
    }

    public function comments_count()
    {
        return $this->comments->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'offering_id', 'id')->orderBy('created_at', 'DESC');
    }
}
