<!DOCTYPE html>
<html>

<head>
    <title>{{ $form->form_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

        <h1 class="text-2xl font-bold mb-6 text-center">
            {{ $form->form_name }}
        </h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST">
            @csrf

            @foreach ($form->fields as $field)
                <div class="mb-4">

                    <label class="block font-medium mb-1">
                        {{ $field->label }}
                        @if ($field->required)
                            <span class="text-red-500">*</span>
                        @endif
                    </label>

                    @if ($field->type === 'text')
                        <input type="text" name="{{ $field->id }}" placeholder="{{ $field->placeholder }}"
                            class="border p-2 w-full rounded" {{ $field->required ? 'required' : '' }}>
                    @endif

                    @if ($field->type === 'textarea')
                        <textarea name="{{ $field->id }}" placeholder="{{ $field->placeholder }}" class="border p-2 w-full rounded"
                            {{ $field->required ? 'required' : '' }}></textarea>
                    @endif

                    @if ($field->type === 'number')
                        <input type="number" name="{{ $field->id }}" class="border p-2 w-full rounded"
                            {{ $field->required ? 'required' : '' }}>
                    @endif

                    @if ($field->type === 'date')
                        <input type="date" name="{{ $field->id }}" class="border p-2 w-full rounded"
                            {{ $field->required ? 'required' : '' }}>
                    @endif

                    @if ($field->type === 'dropdown')
                        <select name="{{ $field->id }}" class="border p-2 w-full rounded"
                            {{ $field->required ? 'required' : '' }}>
                            <option value="">Select</option>
                            @foreach ($field->options as $opt)
                                <option value="{{ $opt->option_text }}">
                                    {{ $opt->option_text }}
                                </option>
                            @endforeach
                        </select>
                    @endif

                    @if ($field->type === 'radio')
                        <div class="space-y-1">
                            @foreach ($field->options as $opt)
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="{{ $field->id }}" value="{{ $opt->option_text }}"
                                        {{ $field->required ? 'required' : '' }}>
                                    {{ $opt->option_text }}
                                </label>
                            @endforeach
                        </div>
                    @endif

                    @if ($field->type === 'checkbox')
                        <div class="space-y-1">
                            @foreach ($field->options as $opt)
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="{{ $field->id }}[]"
                                        value="{{ $opt->option_text }}">
                                    {{ $opt->option_text }}
                                </label>
                            @endforeach
                        </div>
                    @endif

                </div>
            @endforeach

            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Submit
            </button>

        </form>
        <a href="{{ route('forms.list') }}" class="inline-block mt-4 text-blue-600">
            ← Back to List
        </a>
    </div>

</body>

</html>
