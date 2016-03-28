<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model
{

    protected $fillable = [
        'project_name',
        'customer_id',
        'partner_id',
        'support_partner_id',
        'pm_id',
        'region_id',
        'country',
        'acd_type_id',
        'project_type_id',
        'integrations',
        'pre_integrations',
        'status',
        'master_status',
        'original_date',
        'expected_date',
        'delivery_date',
        'days_contracted',
        'days_spent',
        'amount_eur',
        'amount_usd',
        'amount_pending',
        'expenses_reported_eur',
        'expenses_reported_usd',
        'not_expenses_reported_eur',
        'not_expenses_reported_usd',
        'cost_project_mo',
        'completed',
        'description',
        'campaign',
        'gdrive_link',
        'crm_link',
        'pl_link',
        'imp_type',
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

    public function support_partner()
    {
        return $this->hasOne(Partner::class, 'id', 'support_partner_id');
    }

    public function pm()
    {
        return $this->hasOne(Pm::class, 'id', 'pm_id');
    }

    public function acd_type()
    {
        return $this->hasOne(Acd::class, 'id', 'acd_type_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class)->select('*', DB::raw('sum(january + february + march + april + may + june + july) as YDT') );
    }

    public function comments_count()
    {
        return $this->comments->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'project_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function pintegrations()
    {
        return $this->hasMany(Integration::class, 'project_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function licenses()
    {
        return $this->hasMany(ProjectLicense::class, 'project_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
