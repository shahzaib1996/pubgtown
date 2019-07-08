<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contest';
    protected $guarded = ['id'];
    public function contest_player() {
        return $this->hasMany('App\ContestPlayer');
    }
}
