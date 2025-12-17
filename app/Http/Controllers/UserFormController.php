<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormResponse;
use Illuminate\Http\Request;
use App\Models\FormResponseValue;

class UserFormController extends Controller
{
    public function list()
    {
        return view('forms.list', ['forms' => Form::all()]);
    }


    public function show($id)
    {
        $form = Form::with('fields.options')->findOrFail($id);
        return view('forms.show', compact('form'));
    }


    public function submit(Request $request, $id)
    {
        $response = FormResponse::create(['form_id' => $id]);
        foreach ($request->except('_token') as $fieldId => $value) {
            FormResponseValue::create([
                'response_id' => $response->id,
                'field_id' => $fieldId,
                'value' => is_array($value) ? json_encode($value) : $value
            ]);
        }
        return back()->with('success', 'Form Submitted');
    }
}
