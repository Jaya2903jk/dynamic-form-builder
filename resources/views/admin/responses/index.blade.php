<!DOCTYPE html>
<html>

<head>
    <title>{{ $form->form_name }} – Responses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold mb-4">
            {{ $form->form_name }} – Responses
        </h2>

        @if ($responses->isEmpty())
            <p class="text-gray-500">No submissions yet.</p>
        @else
            <ul class="space-y-2">
                @foreach ($responses as $r)
                    <li class="border p-3 rounded hover:bg-gray-50">
                        <a href="{{ url('/admin/responses/' . $r->id) }}" class="text-blue-600 font-medium">
                            Submission #{{ $r->id }}
                        </a>
                        <span class="text-sm text-gray-500 ml-2">
                            {{ $r->created_at->format('d M Y, h:i A') }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('admin.forms.index') }}" class="inline-block mt-4 text-blue-600">
            ← Back to List
        </a>
    </div>

</body>

</html>
