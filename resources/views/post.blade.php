<x-layout>
    <x-slot name="content">
        <article>
            <h1>{{ $posts->title }}</h1>
            Writen by: <a href="/user/{{ $posts->user->id }}">{{ $posts->user->name }}</a>, Category: 
            <a href="/categories/{{ $posts->category->slug }}">{{ $posts->category->name }}</a>
            <div>
                <p>
                    {!! $posts->body !!}
                </p>
            </div>
        </article>
        <p><a href="/">Go back</a></p>
    </x-slot>
</x-layout>