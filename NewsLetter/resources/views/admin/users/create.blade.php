<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-900 overflow-hidden shadow-sm m-2 sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Users</a>
                </div>
                <div class="flex  flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="sm:col-span-6 ">
                                

                                <div class="inputBox">
                                    <input type="text" id="name" name="name"
                                        class="" />
                                        <span for="name" > user name
                                        </span>
                                    </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror


                                <div class="inputBox">
                                    <input type="email" id="email" name="email"
                                        />
                                        <span for="email" > Email </span>

                                    </div>
                                @error('email')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror


                                <div class="inputBox">
                                    <input type="password" id="password" name="password"
                                        />
                                        <span for="password" > Password </span>

                                    </div>
                                @error('password')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
