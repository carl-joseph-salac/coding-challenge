@extends('app')

@section('content')
    @include('navbar')
    <main class="relative flex flex-col items-center flex-grow h-full py-20">
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
                        <!-- row 1 -->
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                            <td>
                                <a class="text-white btn btn-info btn-sm" href="{{ route('showEdit') }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <!-- Open the modal using ID.showModal() method -->
                                <button class="text-white btn btn-error btn-sm" onclick="my_modal_1.showModal()">
                                    Delete
                                </button>
                                <dialog id="my_modal_1" class="modal">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">Are you sure you want to delete?</h3>
                                        <div class="flex items-center justify-center w-full gap-5 text-center modal-action">
                                            <form action="{{ route('delete') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="w-20 text-white btn btn-error">Yes</button>
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
                        <!-- row 2 -->
                        <tr class="hover">
                            <th>2</th>
                            <td>Hart Hagerty</td>
                            <td>Desktop Support Technician</td>
                            <td>Purple</td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
