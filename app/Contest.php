<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contest';
    public function contest_player() {
        return $this->hasMany('App\ContestPlayer');
    }
}
