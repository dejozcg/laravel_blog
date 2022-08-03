<x-layout>
    <x-slot name="content">
        @include('posts._header')
        <section class="py-8 max-w-md mx-auto">
            <h1 class="text-lg font-bold mb-4">Publish new post</h1>
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <x-panel>
                    <form action="/admin/post" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @csrf
                        <x-form.input name="title" />
                        <x-form.input name="thumbnail" type="file" />
                        <x-form.input name="slug" />
                        <x-form.textarea name="excerpt" />
                        <x-form.textarea name="body" />
                        
                        <x-form.field >
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id">
                                <option value="">All</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''  }} >{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                            <x-form.error name="category_id" />
                        </x-form.field>
      
                       <x-form.submit-button>Publish</x-form.submit-button>
                    </form>
                </x-panel>
            </main>
        </section>

    </x-slot>
</x-layout>