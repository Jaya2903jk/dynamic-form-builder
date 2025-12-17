<?php

namespace App\Models;

use App\Models\FormField;
use App\Models\FormResponse;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['form_name'];
    public function fields()
    {
        return $this->hasMany(FormField::class);
    }
    public function responses()
    {
        return $this->hasMany(FormResponse::class);
    }
}
