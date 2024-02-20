<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー一覧
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-6">
            <table class="text-left w-full border-collapse mt-8">
                <tr class="bg-green-600">
                    <th class="p-3 text-left text-white">＃</th>
                    <th class="p-3 text-left text-white">名前</th>
                    <th class="p-3 text-left text-white">Email</th>
                </tr>
                @foreach($users as $user)
                <tr class="bg-white">
                    <td class="border-gray-light border hover:bg-gray-100 p-3">{{$user->id}}</td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">{{$user->name}}</td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">{{$user->email}}</td>
                </tr>
                @endforeach
            </table>
         </div>
    </div>
</x-app-layout>