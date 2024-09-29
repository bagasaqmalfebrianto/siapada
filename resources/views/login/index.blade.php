@extends('layout.main')

@section('container')
    @if(session()->has('success'))
        <div class="flex justify-center z-10">
            <div class="alert alert-danger alert-dismissible fade show w-400" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="flex justify-center z-10">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="flex justify-center z-10">
        <div class="p-12 bg-white mx-auto rounded-2xl w-600">
            <div class="mb-4">
                <h3 class="font-semibold text-2xl text-gray-800">LOGIN</h3>
                <p class="text-gray-500">Silahkan masuk ke akun Anda.</p>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                        @error('email')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                        <input type="email" class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#324DAF] @error('email') is-invalid @enderror" placeholder="name@example.com" name="email" id="email" autofocus required value="{{ old('email') }}">
                    </div>
                    <div class="space-y-2">
                        <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">Password</label>
                        <input class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#324DAF]" type="password" placeholder="Enter your password" name="password" id="password">
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center bg-[#324DAF] hover:bg-[#324DAF] text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
