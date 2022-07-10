<x-layout>
    <x-slot name="content">
        @include('_post-header') 

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
           @if($posts->count())
            <x-post-featured-card :post="$posts[0]" />

                <div class="lg:grid lg:grid-cols-2">
        
                </div>

                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card 
                        :post="$post" 
                        class="bg-red {{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
            @else
            <p>No posts yet. Please chack leater.</p>
            @endif
        </main>

    </x-slot>
</x-layout>


    <!-- @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            Writen by: <a href="/autor/{{ $post->user->username }}">{{ $post->user->name }}</a>, Category: 
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach -->