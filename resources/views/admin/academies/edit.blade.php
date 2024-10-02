@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Pricing')" class="p-4" />

        <form class="w-full" action="{{ route('admin.academies.update', $academy->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 md:gap-6">
                <!-- Title Address -->
                <div>
                    <x-input-label for="video_title" :value="__('Video Title')" /><span class="text-red-500">*</span>
                    <x-text-input id="video_title" class="block mt-1 w-full" type="text" name="video_title"
                        value="{{ $academy->video_title }}" required autofocus placeholder="Title" />
                    <x-input-error :messages="$errors->get('video_title')" class="mt-2" />
                </div>
                <!-- URL -->
                <div>
                    <x-input-label for="url" :value="__('Url')" /><span class="text-red-500">*</span>
                    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url"
                        value="{{ $academy->url }}" required autofocus placeholder="url" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>

            </div>

            <div class="my-5">
                <div class="flex items-center space-4">
                    <div class="max-w-40">
                        <img id="selected-image" src="{{ asset('assets/images/academies/' . $academy->image) }}"
                            alt="Selected Image" class=" max-w-full max-h-40 pr-4" />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="types" :value="__('Upload image (max : 2MB)')" />
                        <x-file-input id="dropzone-file" type="file" name="image"
                            accept="image/png, image/jpeg, image/gif" onchange="displaySelectedImage(event)" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>
            </div>
            <!-- Description Address -->
            <div class="grid md:grid-cols-1 md:gap-6">
                <div>
                    <x-input-label for="description" :value="__('Description')" /><span class="text-red-500">*</span>
                    <textarea name="description" id="description" cols="30" rows="10">{{ $academy->description }}}</textarea>

                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

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
