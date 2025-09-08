<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_hero','show_cta','show_products','show_partners','show_projects','show_clients','show_contact_teaser',
        'order_hero','order_cta','order_products','order_partners','order_projects','order_clients','order_contact_teaser',
    ];

    public static function getSettings(): self
    {
        return static::query()->first() ?? static::create();
    }
}


