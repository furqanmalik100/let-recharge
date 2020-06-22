<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table='settings';
    protected $primaryKey='id';
    protected $fillable = ['stripe_public_key','stripe_secret_key','services_api_public_key','services_api_secret_key','airtime_api_login','airtime_api_token'];
}
