<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLinksMeta extends Model
{
    //
    protected $table='social_links_metas';
    protected $primaryKey='id';
    protected $fillable = ['platform_name','link'];
}
