<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebLog extends Model
{
    protected $table =  "website_logs";
    protected $fillable = ['log'];
}
