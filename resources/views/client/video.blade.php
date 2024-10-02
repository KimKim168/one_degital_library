@extends('client.layout.client')

@section('content')
    <!-- Start Banner -->
    {{-- 
    <div class="bg-slate-300 mt-[100px]">
        <img src="{{ asset('assets/client/images/Banner - Copy.png') }}" class="max-h-[300px] w-full object-cover" />
    </div> --}}

    {{-- <div class="text-center mt-12">
        <h2 class="text-4xl font-extrabold text-black sm:text-5xl">
            Videos
        </h2>
        <p class="mt-4 text-xl text-black">
            Learn from our experts with simple, easy-to-follow, step-by-step
            instructions.
        </p>
    </div> --}}

    <!--Start Video -->
    <section class="py-8 antialiased dark:bg-gray-900 md:py-12 mt-20">
        <div class="mx-auto max-w-screen-xl 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-4 sm:mx-auto place-items-center grid  gap-6 sm:grid-cols-2  md:mb-8 lg:grid-cols-4">
                @forelse ($videos as $video)
                    <div
                        class="max-w-sm border hover:scale-105 transition duration-300 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <a href="{{ $video->url }}" target="_blank">
                            <img class="rounded-t-lg aspect-video w-full"
                                src="{{ asset('assets/images/videos/' . $video->image) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="{{ $video->url }}">
                                <h5
                                    class="mb-2 text-2xl font-bold  tracking-tight line-clamp-1 text-gray-900 dark:text-white">
                                    {{ $video->video_title }}
                                </h5>
                            </a>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">
                                {!! $video->description !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Item</p>
                @endforelse
            </div>
    </section>
    <!-- Ead Video -->
@endsection
