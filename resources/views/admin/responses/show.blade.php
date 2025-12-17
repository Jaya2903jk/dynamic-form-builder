<!DOCTYPE html>
<html>

<head>
    <title>Submission Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold mb-4">
            Submission #{{ $response->id }}
        </h2>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-left">Field</th>
                    <th class="border p-2 text-left">Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response->values as $val)
                    <tr>
                        <td class="border p-2 font-medium">
                            {{ $val->field->label }}
                        </td>
                        <td class="border p-2">
                            {{ is_array(json_decode($val->value, true)) ? implode(', ', json_decode($val->value, true)) : $val->value }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.forms.responses', $response->form_id) }}" class="inline-block mt-4 text-blue-600">
            ← Back to Responses
        </a>


    </div>

</body>

</html>
