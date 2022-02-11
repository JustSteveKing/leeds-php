<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update: {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section aria-labelledby="create-blog-post">
                <form action="{{ route('app:posts:update', $post->slug) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="bg-white py-6 px-4 sm:p-6">

                            <div class="mt-6 grid grid-cols-4 gap-6">
                                <div class="col-span-4 sm:col-span-2">
                                    <label
                                        for="title"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Title
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        autocomplete="off"
                                        class="mt-1 block w-full border border-gray-300 @error('title') border-red-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                        required
                                        value="{{ old('title', $post->title) }}"
                                    >

                                    @error('title')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4 sm:col-span-2">
                                    <label
                                        for="category"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Category
                                    </label>
                                    <select
                                        id="category"
                                        name="category"
                                        class="mt-1 block w-full bg-white border border-gray-300 @error('title') border-red-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >
                                        <option value>Please select ...</option>
                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                @if ($category->id === $post->category->id)
                                                    selected
                                                @endif
                                            >
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4">
                                    <label
                                        for="description"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Description / Except
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        id="description"
                                        autocomplete="off"
                                        class="mt-1 block w-full border border-gray-300 @error('description') border-red-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                        required
                                        value="{{ old('description', $post->description) }}"
                                    >
                                    @error('description')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4">
                                    <label
                                        for="content"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Content
                                    </label>
                                    <textarea
                                        name="content"
                                        id="content"
                                        autocomplete="off"
                                        class="mt-1 block w-full border border-gray-300 @error('content') border-red-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >{{ old('content', $post->content) }}</textarea>

                                    @error('content')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                type="submit"
                                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </section>

        </div>
    </div>
</x-app-layout>
