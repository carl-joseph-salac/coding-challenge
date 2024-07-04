@extends('app')

@section('content')
    <div class="flex flex-col items-center justify-center flex-grow">
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
                    <input type="email" placeholder="Type here" class="w-full input input-bordered" />
                    <div class="absolute label -bottom-7">
                        <span class="hidden text-red-600 label-text-alt">Bottom Left label</span>
                    </div>
                </label>
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="password" placeholder="Type here" class="w-full input input-bordered" />
                    <div class="absolute label -bottom-7">
                        <span class="hidden text-red-600 label-text-alt">Bottom Left label</span>
                    </div>
                </label>
                <button type="submit" class="text-white btn btn-success">Sign in</button>
                <a href="{{ route('showRegister') }}" class="link link-info">Don't have an account?</a>
            </form>
        </main>
    </div>
@endsection
