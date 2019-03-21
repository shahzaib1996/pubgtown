<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestPlayer extends Model
{
    protected $table = 'contest_payment';
    
    public function contest() {
    	return $this->belongsTo('App\Contest');
    }
    public function user() {
    	return $this->belongsTo('App\User');
    }

}
