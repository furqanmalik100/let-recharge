<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSectionMeta extends Model
{
    //
    protected $table='home_section_metas';
    protected $primaryKey='id';
    protected $fillable = ['name','value'];
}
