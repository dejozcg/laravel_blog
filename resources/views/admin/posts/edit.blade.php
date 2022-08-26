<x-layout>
    <x-slot name="content">
        <x-settings :heading="'Edit post: ' . $post->title">

            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <x-panel>
                    <form action="/admin/post/{{ $post->id }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @csrf
                        @method('PATCH')
                        <x-form.input name="title" :value="old('title', $post->title)" />
                        <div class="flex mt-6">
                            <div class="flex-1">
                                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                            </div>
                            <img src="{{ isset($post->thumbnail) ? asset('storage/' . $post->thumbnail) : '' }}" alt="Blog Post illustration" class="rounded-xl ml-6" width="100">
                        </div>
                        <x-form.input name="slug" :value="old('slug', $post->slug)" />
                        <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                        <x-form.textarea name="body">{{ old('excerpt', $post->body) }}</x-form.textarea>
                        
                        <x-form.field >
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id">
                                <option value="">All</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''  }} >{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                            <x-form.error name="category_id" />
                        </x-form.field>
      
                       <x-form.submit-button>Update</x-form.submit-button>
                    </form>
                </x-panel>
            </main>

        </x-settings>
    </x-slot>
</x-layout>