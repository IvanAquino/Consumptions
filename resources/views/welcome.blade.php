<x-guest-layout>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/icons/icon-152x152.png') }}" class="h-8" alt="Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @guest
                    <a type="button" href="{{ route('login') }}"
                        class="font-semibold text-gray-800 dark:text-white hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mr-1">
                        {{ __('Log in') }}
                    </a>
                    <a type="button" href="{{ route('register') }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        {{ __('Register') }}
                    </a>
                @endguest
                @auth
                    <a type="button" href="{{ route('dashboard') }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        {{ __('My vehicles') }}
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <x-dashboard-container>
        <section
            class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    {{ __('Effortless Vehicle Management at Your Fingertips') }}
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-30 dark:text-gray-200">
                    {{ __('Discover RutaFácil, your go-to app for streamlined vehicle management. Effortlessly track mileage, fuel consumption, and expenses. Embrace a smarter way to manage your vehicles, all in one intuitive platform.') }}
                </p>
            </div>
            <div
                class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-[550px] absolute top-0 left-0 z-0">
            </div>
        </section>


        {{-- Features --}}
        <section class="z-1">
            <h2 class="text-center font-semibold text-3xl dark:text-white mb-4">
                {{ __('Features') }}
            </h2>
            <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Vehicle Registration') }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        <span class="text-semibold dark:text-gray-300">{{ __('Vehicle Registration') }}:</span>
                        {{ __('Register your vehicle in the app, including details such as make, model, and current mileage for accurate tracking.') }}
                    </p>
                </div>

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                    </svg>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Consumption Tracking') }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        <span
                            class="text-semibold dark:text-gray-300">{{ __('Fuel Consumption and Expense Control') }}:</span>
                        {{ __('Log and monitor fuel consumption, mileage, and associated costs for each vehicle. Maintain detailed control of your operating expenses.') }}
                    </p>
                </div>

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                    </svg>

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Automatic Calculation') }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        <span class="text-semibold dark:text-gray-300">{{ __('Updated Mileage') }}:</span>
                        {{ __('The app automatically calculates the distance traveled, making it easier to track and plan for maintenance or inspections.') }}
                    </p>
                </div>

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                    </svg>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ __('Team Collaboration') }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        <span class="text-semibold dark:text-gray-300">{{ __('Teamwork') }}:</span>
                        {{ __('Add people to your team within the app to collectively manage vehicles and share relevant information.') }}
                    </p>
                </div>
            </div>
        </section>
    </x-dashboard-container>

</x-guest-layout>
