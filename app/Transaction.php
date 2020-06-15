<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'recipient', 'product', 'product_id', 'country', 'amount', 'external_id', 'charge_id', 'type', 'user_id', 'operator', 'operator_id', 'country_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
