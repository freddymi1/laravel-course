@extends('layouts.app')


@section('content')
    <div class="flex justify-center items-center">
        <div class="md:w-4/12 lg:w-4/12 sm:w-full bg-white items-center p-6 rounded-lg">
            <h1 class="text-blue-500 pb-6 uppercase text-center font-bold text-lg">
                Login page
            </h1>
            @if (session('status'))
                <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Alert!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>

            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Adresse email</label>
                    <input type="email" name="email" id="email" placeholder="Votre adresse email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="">
                    @error('password')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox mr-2">
                        <label class="text-gray-400" for="remember">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
