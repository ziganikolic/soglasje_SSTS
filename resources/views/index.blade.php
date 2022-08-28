@extends('layouts.app')

@section('content')

    <div class="w-11/12 m-auto">
        <div class=" bg-white p-10 rounded-lg mb-4">

            <div class="overflow-hidden overflow-x-auto w-full align-middle sm:rounded-lg flex justify-around ">

                <div class="sm:text-center lg:text-left flex-initial p-6 w-full md:w-1/2">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Aplikacija za </span>
                        <span class="block text-blue-600 xl:inline">vnos soglasij</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Aplikacija omogoča shranjevanje soglasji v
                        digitalno obliko, dijakom omogoča lažjo in hitrejšo izbiro privolitev,
                        profesorjem pa lažjo evidenco soglasji.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        @guest

                                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Login</a>
                        @endguest
                    </div>
                </div>



                    <img class="items-center object-center justify-center hidden md:block" src="{{ asset('img/Profiling_Flatline.png') }}" alt="">
                    {{-- SLIKA GRE TUKAJ --}}


            </div>



        </div>
    </div>



@endsection
