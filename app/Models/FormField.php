<?php

namespace App\Models;

use App\Models\FieldOption;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $fillable = ['form_id', 'label', 'type', 'required', 'placeholder', 'sort_order'];
    public function options()
    {
        return $this->hasMany(FieldOption::class, 'field_id');
    }
}
