<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contract</title>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
</head>
<body>
<x-app-layout>
    <form action="{{ route('contracts_model.store') }}" method="POST" id="contractForm">
        @csrf
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">Title:</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="name" name="name" type="text" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content">Content:</label>
            </div>
            <div class="md:w-2/3">
                <div id="editorjs" class="bg-gray-200 border-2 border-gray-200 rounded  py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"></div>
                <input type="hidden" name="content" id="content">
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Ajouter le modèle de contrat
                </button>
            </div>
        </div>
    </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editor = new EditorJS({
                holder: 'editorjs',
                tools: {
                    header: {
                        class: Header,
                        inlineToolbar: true
                    },
                    checklist: {
                        class: Checklist,
                        inlineToolbar: true
                    },
                    paragraph: {
                        class: Paragraph,
                        inlineToolbar: true
                    },
                    table: {
                        class: Table,
                        inlineToolbar: true
                    },
                },
                onChange: function () {
                    editor.save().then((outputData) => {
                        document.getElementById('content').value = JSON.stringify(outputData);
                    }).catch((error) => {
                        console.log('Saving failed: ', error);
                    });
                }
            });

            document.getElementById('contractForm').addEventListener('submit', function (event) {
                event.preventDefault();
                editor.save().then((outputData) => {
                    document.getElementById('content').value = JSON.stringify(outputData);
                    this.submit();
                }).catch((error) => {
                    console.log('Saving failed: ', error);
                });
            });
        });
    </script>
</x-app-layout>
</body>
</html>
