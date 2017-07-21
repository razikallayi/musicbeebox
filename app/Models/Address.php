<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	'user_id', 'name','house_no','street','address','city','postcode','is_primary','is_billing','is_shipping','is_active','created_at','updated_at'
	];


    /**
     * Get the user of address.
     */
    public function user()
    {
      return $this->hasOne('App\Models\User');
    }

}
