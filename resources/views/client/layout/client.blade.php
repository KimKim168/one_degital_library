<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Start Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <style>
        .light-color-gradient {
            position: relative;
            background-color: #f5f6f7;
            background-image: linear-gradient(54deg,
                    rgba(255, 131, 122, 0.25),
                    rgba(255, 131, 122, 0) 28%),
                linear-gradient(241deg,
                    rgba(239, 152, 207, 0.25),
                    rgba(239, 152, 207, 0) 36%);
        }
    </style>
</head>

<body style="font-family: Poppins, Arial, Helvetica, sans-serif">
    <!-- Start Navbar -->
    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
            <a href="#" class="flex items-center justify-center space-x-1 rtl:space-x-reverse">
                <img src="{{ asset('assets/client/images/logo - Copy/DGLogo.png') }}"
                    class="overflow-hidden h-[60px]" />
                <img src="{{ asset('assets/client/images/logo - Copy/textLogo.png') }}"
                    class="overflow-hidden h-[50px]" />
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse md:hidden">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:justify-center md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ url('/') }}"
                            class="{{ request()->is('/') ? 'underline text-red-500 underline-offset-8 block text-center  md:p-0' : 'text-gray-900 block text-center md:p-0  hover:text-gray-500' }}"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/pricing') }}"
                            class="{{ request()->is('pricing') ? 'underline text-red-500 underline-offset-8 block text-center  md:p-0' : 'text-gray-900 block text-center md:p-0 hover:text-gray-500' }}"
                            aria-current="page">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ url('/academy') }}"
                            class="{{ request()->is('academy') ? 'underline text-red-500 underline-offset-8 block text-center  md:p-0' : 'text-gray-900 block text-center md:p-0 hover:text-gray-500' }}"
                            aria-current="page">Academy</a>
                    </li>

                    <li>
                        <a href="{{ url('/video') }}"
                            class="{{ request()->is('video') ? 'underline text-red-500 underline-offset-8 block text-center  md:p-0' : 'text-gray-900 block text-center md:p-0 hover:text-gray-500' }}"
                            aria-current="page">Videos</a>
                    </li>

                    <li>
                        <a href="{{ url('/support') }}"
                            class="{{ request()->is('support') ? 'underline text-red-500 underline-offset-8 block text-center  md:p-0' : 'text-gray-900 block text-center md:p-0 hover:text-gray-500' }}"
                            aria-current="page">Support</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('content')

    <!-- Start Footer -->
    <footer class="light-color-gradient mt-12 p-4 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="md:mb-0 grid items-center">
                    <a href="#" class="flex items-center justify-center space-x-1 rtl:space-x-reverse">
                        <img src="{{ asset('assets/client/images/logo - Copy/DGLogo.png') }}"
                            class="overflow-hidden h-[60px]" />
                        <img src="{{ asset('assets/client/images/logo - Copy/textLogo.png') }}"
                            class="overflow-hidden h-[50px]" />
                    </a>
                </div>
                <div>
                    <h2 class="mb-3 text-sm font-semibold uppercase dark:text-white lg:text-center">
                        Social Link
                    </h2>

                    <div class="flex flex-wrap gap-2 mt-4 mb-4 lg:justify-center sm:mt-0">
                        @forelse ($linkSocials as $linkSocial)
                            <a href="{{ $linkSocial->url }}" target="_blank"
                                class="hover:text-gray-900 dark:hover:text-white ">
                                <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                    src="{{ asset('assets/images/links/' . $linkSocial->logo_image) }}"
                                    alt="Facebook page" />
                                <span class="sr-only">{{ $linkSocial->name }}</span>
                            </a>
                        @empty
                            <p>No Item</p>
                        @endforelse


                    </div>
                </div>
            </div>
            <hr class="my-3 border-gray-700 sm:mx-auto dark:border-gray-700 lg:my-6" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-700 sm:text-center dark:text-gray-400">© 2024 . All Rights Reserved.
                </span>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</body>

</html>
