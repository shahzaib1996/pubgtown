<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposit';
    protected $guarded = ['id'];
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
