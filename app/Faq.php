<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $table='faqs';
    protected $primaryKey='id';
    protected $fillable = ['question','answer','status'];
}
