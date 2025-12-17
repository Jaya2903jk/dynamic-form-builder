<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
use App\Models\FieldOption;
use App\Models\FormResponse;
use Illuminate\Http\Request;

class AdminFormController extends Controller
{
    public function index()
    {
        return view('admin.forms.index', [
            'forms' => Form::all()
        ]);
    }
    public function create()
    {
        return view('admin.forms.create');
    }
    public function store(Request $request)
    {
        $form = Form::create([
            'form_name' => $request->form_name
        ]);

        foreach ($request->fields as $i => $field) {
            $formField = FormField::create([
                'form_id'     => $form->id,
                'label'       => $field['label'],
                'type'        => $field['type'],
                'required'    => isset($field['required']),
                'placeholder' => $field['placeholder'] ?? null,
                'sort_order'  => $i
            ]);

            if (in_array($field['type'], ['dropdown', 'radio', 'checkbox'])) {
                foreach ($field['options'] ?? [] as $opt) {
                    if (!empty($opt)) {
                        FieldOption::create([
                            'field_id'   => $formField->id,
                            'option_text' => $opt
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.forms.index')->with('success', 'Form created successfully!');
    }
    // public function edit(Form $form)
    // {
    //     $form->load('fields.options');
    //     return view('admin.forms.edit', compact('form'));
    // }

    // public function update(Request $request, Form $form)
    // {
    //     $form->update([
    //         'form_name' => $request->form_name
    //     ]);

    //     $form->fields()->delete();

    //     foreach ($request->fields as $i => $field) {

    //         $formField = FormField::create([
    //             'form_id'     => $form->id,
    //             'label'       => $field['label'],
    //             'type'        => $field['type'],
    //             'required'    => isset($field['required']),
    //             'placeholder' => $field['placeholder'] ?? null,
    //             'sort_order'  => $i
    //         ]);

    //         if (in_array($field['type'], ['dropdown', 'radio', 'checkbox'])) {
    //             foreach ($field['options'] ?? [] as $opt) {
    //                 FieldOption::create([
    //                     'field_id' => $formField->id,
    //                     'option_text' => $opt
    //                 ]);
    //             }
    //         }
    //     }

    //     return redirect('/admin/forms');
    // }

    public function responses(Form $form)
    {
        $responses = $form->responses()->latest()->get();
        return view('admin.responses.index', compact('form', 'responses'));
    }

    public function showResponse(FormResponse $response)
    {
        $response->load('values.field');
        return view('admin.responses.show', compact('response'));
    }
}
