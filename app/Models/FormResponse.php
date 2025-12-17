<?php

namespace App\Models;

use App\Models\FormResponseValue;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    protected $fillable = ['form_id', 'user_id'];
    public function values()
    {
        return $this->hasMany(FormResponseValue::class, 'response_id');
    }
}
