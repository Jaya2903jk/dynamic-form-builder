<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-3xl mx-auto p-6 bg-white shadow">
    <form method="POST" action="/admin/forms">
        @csrf

        <input name="form_name" class="border p-2 w-full mb-4" placeholder="Form Name (Job Application Form)" required>

        <div id="fields"></div>

        <button type="button" onclick="addField()" class="bg-gray-600 text-white px-3 py-1 mb-4">
            + Add Field
        </button>

        <button class="bg-blue-600 text-white px-4 py-2">
            Save Form
        </button>
    </form>
</div>

<script>
    let i = 0;

    function addField() {
        document.getElementById('fields').insertAdjacentHTML('beforeend', `
    <div class="border p-3 mb-3">
        <input name="fields[${i}][label]" placeholder="Field Label"
               class="border p-2 w-full mb-2" required>

        <select name="fields[${i}][type]" class="border p-2 w-full mb-2" onchange="toggleOptions(this, ${i})">
            <option value="text">Text</option>
            <option value="textarea">Textarea</option>
            <option value="number">Number</option>
            <option value="date">Date</option>
            <option value="dropdown">Dropdown</option>
            <option value="radio">Radio</option>
            <option value="checkbox">Checkbox</option>
        </select>

        <input name="fields[${i}][placeholder]" placeholder="Placeholder" class="border p-2 w-full mb-2">

        <label class="inline-flex items-center mb-2">
            <input type="checkbox" name="fields[${i}][required]" class="mr-2"> Required
        </label>

        <!-- OPTIONS CONTAINER -->
        <div id="options-${i}" class="mb-2 hidden">
            <label class="block mb-1 font-medium">Options:</label>
            <div id="options-container-${i}"></div>
            <button type="button" onclick="addOption(${i})" class="bg-gray-300 px-2 py-1 text-sm mb-2">
                + Add Option
            </button>
        </div>
    </div>
    `);
        i++;
    }

    function toggleOptions(select, index) {
        const container = document.getElementById(`options-${index}`);
        if (['dropdown', 'radio', 'checkbox'].includes(select.value)) {
            container.classList.remove('hidden');
        } else {
            container.classList.add('hidden');
        }
    }

    function addOption(index) {
        const container = document.getElementById(`options-container-${index}`);
        const optionCount = container.children.length;
        container.insertAdjacentHTML('beforeend', `
        <input type="text" name="fields[${index}][options][]" placeholder="Option ${optionCount+1}"
               class="border p-2 w-full mb-1" required>
    `);
    }
</script>
