@extends('client.layout.client')

@section('content')
    <!-- Start Banner -->
    <div class="bg-slate-300 mt-[100px]">
        <img src="{{ asset('assets/client/images/supportCenter - Copy.png') }}" class="max-h-[300px] w-full object-cover" />
    </div>
    <!-- End Banner -->

    <!-- Start Support -->
    <section class="max-w-screen-xl mx-auto mt-10">

        <div class="mb-12">
            <p class="text-xl font-bold text-black sm:text-3xl">

                {{ $supports->title }}
            </p>
            <p class="text-black my-3">

                {!! $supports->description !!}
            </p>

            <div class="mt-5">
                <a href=" {{ $supports->url }}" target="_blank"
                    class="inline-flex items-center gap-2 justify-center hover:text-gray-900 dark:hover:text-white">
                    <img class="h-[50px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                        src="{{ asset('assets/client/images/telegram - Copy.png') }}" alt="Facebook page" />
                    <span class="text-xl">Chat With US</span>
                </a>
            </div>
        </div>


    </section>

    <!-- End Support -->
@endsection
