<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    
    /**
     * Get the addresses of the subscription.
     */
    public function address()
    {
      return $this->belongsTo('App\Models\Address');
    }
    /**
     * Get the addresses of the subscription.
     */
    public function plan()
    {
      return $this->belongsTo('App\Models\Plan');
    }
}
