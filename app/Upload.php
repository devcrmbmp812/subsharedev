<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    //
    public function uploads() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function user() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

}
