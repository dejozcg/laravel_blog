<x-layout>
    <x-slot name="content">
        @include('posts._header') 

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
            {{ $posts->links() }}
        </main>

    </x-slot>
</x-layout>