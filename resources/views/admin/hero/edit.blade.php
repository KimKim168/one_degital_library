@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Update Item')" class="p-4" />

        <form class="w-full" action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <!-- Name Address -->
                <div>
                    <x-input-label for="name" :value="__('Title')" /><span class="text-red-500">*</span>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="title"
                        value="{{ $hero->title }}" required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Placeholder')" /><span class="text-red-500">*</span>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="placeholder"
                        value="{{ $hero->placeholder }}" required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('placeholder')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Button_Title')" /><span class="text-red-500">*</span>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="button_title"
                        value="{{ $hero->button_title }}" required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('bottun_title')" class="mt-2" />
                </div>

            </div>

            <div class="my-5">
                <div class="flex items-center space-4">
                    <div class="max-w-40">
                        <img id="selected-image" src="{{ asset('assets/images/heroes/' . $hero->image) }}"
                            alt="Selected Image" class=" max-w-full max-h-40 pr-4" />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="types" :value="__('Upload Image (max : 2MB)')" />
                        <x-file-input id="dropzone-file" type="file" name="image"
                            accept="image/png, image/jpeg, image/gif" onchange="displaySelectedImage(event)" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div>
                <x-input-label for="name" :value="__('Description')" /><span class="text-red-500">*</span>
                <textarea name="description" id="description" cols="30" rows="10">
                    {{ $hero->description }}
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
