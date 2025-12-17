<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form Builder</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white rounded-lg shadow-xl p-10 w-full max-w-2xl text-center">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Dynamic Form Builder</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="{{ route('admin.forms.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-lg text-xl font-semibold shadow-md transition transform hover:-translate-y-1">
                    Admin Dashboard
                </a>

                <a href="{{ route('forms.list') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg text-xl font-semibold shadow-md transition transform hover:-translate-y-1">
                    User Dashboard
                </a>
            </div>


        </div>
    </div>

</body>

</html>
