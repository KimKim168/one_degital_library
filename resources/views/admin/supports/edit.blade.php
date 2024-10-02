@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Item')" class="p-4" />

        <form class="w-full" action="{{ route('admin.supports.update', $support->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 md:gap-6">
                <!-- Name Address -->
                <div>
                    <x-input-label for="title" :value="__('Title')" /><span class="text-red-500">*</span>
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                        value="{{ $support->title }}" required autofocus placeholder="Title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <!-- URL -->
                <div>
                    <x-input-label for="url" :value="__('Url')" /><span class="text-red-500">*</span>
                    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url"
                        value="{{ $support->url }}" required autofocus placeholder="url" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="description" :value="__('description')" /><span class="text-red-500">*</span>
                <textarea name="description" id="description" cols="30" rows="10">
                    {{ $support->description }}
                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-outline-button href="{{ URL::previous() }}">
                    Go back
                </x-outline-button>
                <x-submit-button>
                    Submit
                </x-submit-button>
            </div>
        </form>


    </div>

    <script>
        function displaySelectedImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const imgElement = document.getElementById('selected-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                    imgElement.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imgElement.src = "#";
                imgElement.classList.add('hidden');
            }
        }
    </script>
@endsection
