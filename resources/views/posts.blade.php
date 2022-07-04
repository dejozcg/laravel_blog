<x-layout>
    <x-slot name="content">
    @foreach ($posts as $post)
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
    @endforeach
    </x-slot>
</x-layout>