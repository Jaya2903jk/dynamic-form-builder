<?php

namespace App\Models;

use App\Models\FormField;
use Illuminate\Database\Eloquent\Model;

class FormResponseValue extends Model
{
    protected $fillable = ['response_id','field_id','value'];
     public function field()
    {
        return $this->belongsTo(FormField::class, 'field_id');
    }
}
