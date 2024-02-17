<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            あなただけのすべらない話
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="post" action="{{ route('episode.store') }}">
            @csrf
            <div class="w-full flex flex-col">
                <label for="title" class="font-semibold mt-4">■最近会った出来事を思い返してタイトルを考えてみよう！■<br><br>(遊び、ニュース、季節、友達、旅、健康、仕事、学校、家族、恋人、住居、食事、etc...)</label>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title">
                <value="{{old('title')}}">
            </div>

            <div class="w-full flex flex-col">
                <label for="when" class="font-semibold mt-4">■出来事を5W1H1Dに整理してみよう！■<br><br>いつ？</label>
                <input type="text" name="when" class="w-auto py-2 border border-gray-300 rounded-md" id="when">
            </div>

            <div class="w-full flex flex-col">
                <label for="where" class="font-semibold mt-4">どこで？</label>
                <input type="text" name="where" class="w-auto py-2 border border-gray-300 rounded-md" id="where">
            </div>

            <div class="w-full flex flex-col">
                <label for="who" class="font-semibold mt-4">だれが？</label>
                <input type="text" name="who" class="w-auto py-2 border border-gray-300 rounded-md" id="who">
            </div>

            <div class="w-full flex flex-col">
                <label for="what" class="font-semibold mt-4">なにを？</label>
                <input type="text" name="what" class="w-auto py-2 border border-gray-300 rounded-md" id="what">
            </div>

            <div class="w-full flex flex-col">
                <label for="do" class="font-semibold mt-4">どうした？</label>
                <input type="text" name="do" class="w-auto py-2 border border-gray-300 rounded-md" id="do">
            </div>

            <div class="w-full flex flex-col">
                <label for="why" class="font-semibold mt-4">なぜ？</label>
                <input type="text" name="why" class="w-auto py-2 border border-gray-300 rounded-md" id="why">
            </div>

            <div class="w-full flex flex-col">
                <label for="how" class="font-semibold mt-4">どのように？</label>
                <input type="text" name="how" class="w-auto py-2 border border-gray-300 rounded-md" id="how">
            </div>

            <div class="w-full flex flex-col">
                <label for="point" class="font-semibold mt-4">この話で一番共感してほしい、または、一番面白いポイントは？</label>
                <input type="text" name="point" class="w-auto py-2 border border-gray-300 rounded-md" id="point">
            </div>

            <div class="w-full flex flex-col">
                <label for="beginning" class="font-semibold mt-4">■起承転結にまとめて、フリとオチを作ってみよう！■<br><br>起</label>
                <textarea name="beginning" class="w-auto py-2 border border-gray-300 rounded-md" id="beginning" cols="30" rows="2"></textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="development" class="font-semibold mt-4">承</label>
                <textarea name="development" class="w-auto py-2 border border-gray-300 rounded-md" id="development" cols="30" rows="2"></textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="turnand" class="font-semibold mt-4">転</label>
                <textarea name="turnand" class="w-auto py-2 border border-gray-300 rounded-md" id="turnand" cols="30" rows="2"></textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="conclusion" class="font-semibold mt-4">結</label>
                <textarea name="conclusion" class="w-auto py-2 border border-gray-300 rounded-md" id="conclusion" cols="30" rows="2"></textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="episode" class="font-semibold mt-4">■足りない分を補足し、より面白くなるよう脚色したら完成！(比喩や擬態法も入れてみよう)■</label>
                <x-input-error :messages="$errors->get('episode')" class="mt-2" />
                <textarea name="episode" class="w-auto py-2 border border-gray-300 rounded-md" id="episode" cols="30" rows="10"></textarea>
                <value="{{old('episode')}}">
            </div>

            <x-primary-button class="mt-4">
                完成！
            </x-primary-button>
        </form>
    </div>
</x-app-layout>