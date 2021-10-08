@extends('layouts.app')


@section('content')
    <div class="flex justify-center items-center">
        <div class="lg:w-4/12 md:w-1/2 sm:w-full bg-white p-6 rounded-lg">
            <h1 class="text-blue-500 uppercase pb-6 text-center font-bold text-lg">
                Register page
            </h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Votre nom"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Prenoms</label>
                    <input type="text" name="username" id="username" placeholder="Votre prenom"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="   text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="sr-only">Comfirmation mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_cofirmation"
                        placeholder="Comfirmez votre mot de passe"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        value="">
                    @error('password_confirmation')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
