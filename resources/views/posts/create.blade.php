<x-layout>
    <x-slot name="content">
        @include('posts._header')
        <section class="py-8 max-w-md mx-auto">
            <h1 class="text-lg font-bold mb-4">Publish new post</h1>
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <x-panel>
                    <form action="/admin/post" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                            @error('title')
                            <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" value="{{ old('thumbnail') }}" name="thumbnail" id="thumbnail" class="form-control" aria-describedby="helpId">
                            @error('thumbnail')
                            <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input value="{{ old('slug') }}" type="slug" class="form-control" name="slug" id="slug" aria-describedby="emailHelpId" placeholder="">
                            @error('slug')
                            <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" cols="30" rows="10">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                            <small id="helpId" class="text-muted bg-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="body">Body</label>
                            <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                            @error('body')
                            <small id="helpId" class="text-muted bg-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''  }} >{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                            @error('body')
                            <small id="helpId" class="text-muted bg-red">{{ $message }}</small>
                            @enderror
                        </div>
                       <x-submit-button>Publish</x-submit-button>
                    </form>
                </x-panel>
            </main>
        </section>

    </x-slot>
</x-layout>