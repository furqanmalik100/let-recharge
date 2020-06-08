<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSectionMeta extends Model
{
    //
    protected $table='contact_section_metas';
    protected $primaryKey='id';
    protected $fillable = ['name','value'];
}
