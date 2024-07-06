@extends('app')

@section('content')
    @include('navbar')
    <main class="relative flex flex-col items-center flex-grow h-full py-20">
        @if (session('created'))
            <div role="alert" class="absolute w-auto text-white top-3 alert alert-success" id="alert-created">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('created') }}</span>
            </div>
        @elseif (session('updated'))
            <div role="alert" class="absolute w-auto text-white top-3 alert alert-info" id="alert-updated">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('updated') }}</span>
            </div>
        @elseif (session('deleted'))
            <div role="alert" class="absolute w-auto text-white top-3 alert alert-error" id="alert-deleted">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('deleted') }}</span>
            </div>
        @endif
        <div class="relative bg-white rounded-lg shadow-md">
            <a class="absolute text-white btn btn-success btn-sm -top-10" href="{{ route('showCreate') }}">
                Create
            </a>
            <div class="overflow-x-auto overflow-y-auto max-h-[700px] w-[1200px]">
                <table class="table text-center">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($infos)
                            @foreach ($infos as $info)
                                <!-- row 1 -->
                                <tr>
                                    <th>{{ $info->id }}</th>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->job }}</td>
                                    <td>{{ $info->fav_color }}</td>
                                    <td>
                                        <a class="text-white btn btn-info btn-sm"
                                            href="{{ route('showEdit', ['info' => $info]) }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <!-- Open the modal using ID.showModal() method -->
                                        <button class="text-white btn btn-error btn-sm"
                                            onclick="my_modal_{{ $info->id }}.showModal()">
                                            Delete
                                        </button>
                                        <dialog id="my_modal_{{ $info->id }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="text-lg font-bold">Are you sure you want to delete?</h3>
                                                <div
                                                    class="flex items-center justify-center w-full gap-5 text-center modal-action">
                                                    <form action="{{ route('delete', ['info' => $info]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="w-20 text-white btn btn-error">Yes</button>
                                                    </form>
                                                    <form method="dialog">
                                                        <!-- if there is a button in form, it will close the modal -->
                                                        <button class="w-20 btn">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('additionalScript')
    <script>
        const alertCreated = document.getElementById('alert-created');
        if (alertCreated) {
            setTimeout(() => {
                alertCreated.remove();
            }, 3000);
        }

        const alertUpdated = document.getElementById('alert-updated');
        if (alertUpdated) {
            setTimeout(() => {
                alertUpdated.remove();
            }, 3000);
        }

        const alertDeleted = document.getElementById('alert-deleted');
        if (alertDeleted) {
            setTimeout(() => {
                alertDeleted.remove();
            }, 3000);
        }
    </script>
@endsection
