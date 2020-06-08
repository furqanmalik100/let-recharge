<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutSectionMeta extends Model
{
    //
    protected $table='about_section_metas';
    protected $primaryKey='id';
    protected $fillable = ['name','value'];
}
