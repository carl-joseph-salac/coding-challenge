@extends('app')

@section('content')
    @include('navbar')
    <div class="flex flex-col items-center justify-center flex-grow mb-10">
        <header>
            <h1 class="mb-10 text-6xl">
                Edit Info
            </h1>
        </header>
        <main class="w-[500px] bg-white rounded-lg shadow-lg  py-5 px-10">
            <form action="{{ route('updateInfo', ['info' => $info]) }}" method="POST"
                class="flex flex-col items-center gap-5">
                @csrf
                @method('put')
                <label class="relative w-full form-control">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input class="w-full input input-bordered {{ $errors->has('name') ? 'input-error' : '' }}" name="name"
                        value="{{ old('name', $info->name) }}" type="text" placeholder="Type here" />
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
                    <input class="w-full input input-bordered {{ $errors->has('job') ? 'input-error' : '' }}" name="job"
                        value="{{ old('job', $info->job) }}" type="text" placeholder="Type here" />
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
                    <input class="w-full input input-bordered {{ $errors->has('fav_color') ? 'input-error' : '' }}"
                        name="fav_color" value="{{ old('fav_color', $info->fav_color) }}" type="text"
                        placeholder="Type here" />
                    @error('fav_color')
                        <div class="absolute label -bottom-7">
                            <span class="text-red-600 label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <button type="submit" class="mt-3 text-white btn btn-success">Update</button>
                <a href="{{ route('showHome') }}" class="link link-info">Go to home</a>
            </form>
        </main>
    </div>
@endsection
