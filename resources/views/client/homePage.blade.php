@extends('client.layout.client')

@section('content')
    <!-- Start hero -->
    <section class="dark:bg-gray-900 mt-24 light-color-gradient">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="lg:col-span-5 lg:flex sm:order-2 sm:mb-8 smlg:-translate-y-4">
                <img src="{{ asset('assets/images/heroes/' . $hero->image) }}"
                    class="max-h-[300px] w-full object-contain sm:mx-auto" />
            </div>
            <div class="mr-auto place-self-center lg:col-span-7 sm:order-1">
                <h1
                    class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-5xl dark:text-white">
                    {{ $hero->title }}
                </h1>
                <div class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {{-- {!! $hero->description !!} --}}
                    {!! $hero->description !!}

                </div>

                <!-- Start Search -->
                <form class="w-full mx-auto">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"-
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $hero->placeholder }}" required />
                    </div>
                    <div class="text-center mt-8">
                        <button type="button"
                            class="text-white bg-black hover:bg-slate-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center">
                            {{ $hero->button_title }}
                        </button>
                    </div>
                </form>
                <!-- End Search -->
            </div>
        </div>
    </section>
    <!-- End hero -->

    <!-- Start Section -->
    <div class="mt-10">
        <p class="text-center text-4xl font-bold mb-4">Features</p>
        <div class="max-w-screen-xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-4 p-4">
            @forelse ($features as $feature)
                <a href="#"
                    class="p-8 text-center justify-center items-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light"><img
                        src="{{ asset('assets/images/features/' . $feature->image) }}"
                        class="w-full h-[50px] object-contain" />
                    <h3 class="mt-3 font-semibold text-xl text-gray-900 dark:text-white">
                        {{ $feature->name }}
                    </h3>
                </a>
            @empty
                <p>No Items</p>
            @endforelse


        </div>
    </div>
    <!-- End Section -->

    <!-- Start Library -->
    <div class="">
        <div class="max-w-screen-xl mx-auto p-4">
            <p class="text-3xl font-bold mb-2">Trust By Libraries</p>
            <p class="text-sm text-black">
                We are a rapidly growing community of members from various
                libraries in Cambodia, united as one digital library
                community.
            </p>
        </div>
        <div class="max-w-screen-xl mx-auto grid grid-cols-2 lg:grid-cols-6 gap-4 p-4">

            @forelse ($libraries as $library)
                <a mx-autoa href="#"
                    class="block px-3 py-4 text-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light"><img
                        src="{{ asset('assets/images/libraries/' . $library->image) }}"
                        class="w-16 h-16 object-contain mx-auto" />
                    <h3 class="font-semibold text-sm text-gray-900 dark:text-white mt-3.5">
                        {{ $library->name }}
                    </h3>
                </a>
            @empty
                \<p>No Item</p>
            @endforelse

        </div>


    </div>
    <!-- End Library -->
@endsection
