<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            あなただけのすべらない話
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <form>
            <div class="w-full flex flex-col">
                <label for="title" class="font-semibold mt-4">タイトル</label>
                <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title">
            </div>

            <div class="w-full flex flex-col">
                <label for="episode" class="font-semibold mt-4">足りない分を補足し、より面白くなるよう脚色してみよう。(比喩や擬態法も入れてみよう)</label>
                <textarea name="episode" class="w-auto py-2 border border-gray-300 rounded-md" id="episode" cols="30" rows="10">
                </textarea>
            </div>

            <x-primary-button class="mt-4">
                登録する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>