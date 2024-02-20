<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-yellow-50 h-screen">
        <div class="mx-4 sm:p-8">
            <h1 class="text-xl text-gray-700 font-semibold hover:underline cursor-pointer">
                お問い合わせ
            </h1>
            <x-message :message="session('message')" />

            <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{old('title')}}" placeholder="Enter Title">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">本文</label>
                    <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>

                <div class="md:flex items-center">
                    <div class="w-full flex flex-col">
                        <label for="email" class="font-semibold leading-none mt-4">メールアドレス</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <input type="text" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="email" value="{{old('email')}}" placeholder="Enter Email">
                    </div>
                </div>
                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>