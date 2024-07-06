@extends('app')

@section('content')
    @include('navbar')
    <div class="flex flex-col items-center justify-center flex-grow mb-10">
        <header>
            <h1 class="mb-10 text-6xl">
                Create Info
            </h1>
        </header>
        <main class="w-[500px] bg-white rounded-lg shadow-lg  py-5 px-10">
            <form action="{{ route('saveInfo') }}" method="POST" class="flex flex-col items-center gap-5">
                @csrf
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input class="w-full input input-bordered" name="name" value="{{ old('name') }}" type="text"
                        placeholder="Type here" />
                    @error('name')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Job</span>
                    </div>
                    <input class="w-full input input-bordered" name="job" value="{{ old('job') }}" type="text"
                        placeholder="Type here" />
                    @error('job')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Favorite Color</span>
                    </div>
                    <input class="w-full input input-bordered" name="fav_color" value="{{ old('fav_color') }}"
                        type="text" placeholder="Type here" />
                    @error('fav_color')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <button type="submit" class="mt-3 text-white btn btn-success">Submit</button>
                <a href="{{ route('showHome') }}" class="link link-info">Go to home</a>
            </form>
        </main>
    </div>
@endsection
