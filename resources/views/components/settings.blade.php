@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-4 pb-2 border-b">{{ $heading }}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a class="{{ request()->is('admin/post') ? 'text-blue-500' : '' }}" href="/admin/post">All posts</a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/post/create') ? 'text-blue-500' : '' }}" href="/admin/post/create">New Post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>