@extends('app')

@section('content')
    <div class="relative flex flex-col items-center justify-center flex-grow">
        @if (session('registered'))
            <div role="alert" class="absolute w-auto text-white alert alert-success top-20" id="alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('registered') }}</span>
            </div>
        @elseif (session('wrong'))
            <div role="alert" class="absolute w-auto text-white alert alert-error top-20" id="alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('wrong') }}</span>
            </div>
        @endif
        <header>
            <h1 class="mb-10 text-6xl">
                Login
            </h1>
        </header>
        <main class="w-[500px] bg-white rounded-lg shadow-lg  py-5 px-10">
            <form action="{{ route('loginUser') }}" method="POST" class="flex flex-col items-center gap-5">
                @csrf
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input class="w-full input input-bordered" name="email" value="{{ old('email') }}" type=""
                        placeholder="Type here" />
                    @error('email')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input class="w-full input input-bordered" name="password" type="password" placeholder="Type here" />
                    @error('password')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <button type="submit" class="mt-3 text-white btn btn-success">Sign in</button>
                <a href="{{ route('showRegister') }}" class="link link-info">Don't have an account?</a>
            </form>
        </main>
    </div>
@endsection

@section('additionalScript')
    <script>
        const alertSuccess = document.getElementById('alert-success');
        const alertError = document.getElementById('alert-error');

        if (alertSuccess) {
            setTimeout(() => {
                alertSuccess.remove();
            }, 3000);
        }
        if (alertError) {
            setTimeout(() => {
                alertError.remove();
            }, 3000);
        }
    </script>
@endsection
