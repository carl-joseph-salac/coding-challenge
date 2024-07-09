@extends('app')

@section('content')
    <div class="flex flex-col items-center justify-center flex-grow">
        <header>
            <h1 class="mb-10 text-6xl">
                Register
            </h1>
        </header>
        <main class="w-[500px] bg-white rounded-lg shadow-lg  py-5 px-10">
            <form action="{{ route('registerUser') }}" method="post" class="flex flex-col items-center gap-5">
                @csrf
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input class="w-full input input-bordered {{ $errors->has('name') ? 'input-error' : '' }}" name="name"
                        value="{{ old('name') }}" type="text" placeholder="Type here" />
                    @error('name')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input class="w-full input input-bordered {{ $errors->has('email') ? 'input-error' : '' }}"
                        name="email" value="{{ old('email') }}" type="" placeholder="Type here" />
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
                    <input class="w-full input input-bordered {{ $errors->has('password') ? 'input-error' : '' }}"
                        name="password" type="password" placeholder="Type here" />
                    @error('password')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <button type="submit" class="mt-2 text-white btn btn-success">Create Account</button>
                <a href="{{ route('showLogin') }}" class="link link-info">Already have an account?</a>
            </form>
        </main>
    </div>
@endsection
