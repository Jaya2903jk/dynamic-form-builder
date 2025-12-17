<!DOCTYPE html>
<html>

<head>
    <title>Admin – Forms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Forms</h1>

            <a href="/admin/forms/create" class="bg-blue-600 text-white px-4 py-2 rounded">
                + Create Form
            </a>
        </div>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Form Name</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($forms as $form)
                    <tr>
                        <td class="border p-2">{{ $form->id }}</td>
                        <td class="border p-2">{{ $form->form_name }}</td>
                        <td class="border p-2 space-x-2">
                            <a href="/form/{{ $form->id }}" class="text-blue-600 underline">View</a>

                            <a href="/admin/forms/{{ $form->id }}/responses"
                                class="text-green-600 underline">Responses</a>
                                
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4">
                            No forms created yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
