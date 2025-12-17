<!DOCTYPE html>
<html>
<head>
    <title>Available Forms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
    <h1 class="text-xl font-bold mb-4">Available Forms</h1>

    <ul class="space-y-3">
        @forelse($forms as $form)
            <li class="flex justify-between items-center border p-3 rounded">
                <span class="font-medium">{{ $form->form_name }}</span>

                <a href="{{ url('/form/'.$form->id) }}"
                   class="bg-blue-600 text-white px-4 py-1 rounded">
                    Fill Form
                </a>
            </li>
        @empty
            <li class="text-gray-500">No forms available</li>
        @endforelse
    </ul>
</div>

</body>
</html>
