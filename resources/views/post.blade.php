<x-layout>
    <x-slot name="content">
        <article>
            <h1>{{ $post->title }}</h1>

            <div>
                <p>
                    {{ $post->body }}
                </p>
            </div>
        </article>
        <p><a href="/">Go back</a></p>
    </x-slot>
</x-layout>