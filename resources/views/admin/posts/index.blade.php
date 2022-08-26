<x-layout>
    <x-slot name="content">
      
        <x-settings heading="All post">

            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <x-panel>
                <table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Naslov</th>
      <th scope="col">Status</th>
      <th scope="col">Editovanje</th>
      <th scope="col">Brisanje</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <!-- <th scope="row">3</th> -->
      <td><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></td>
      <td>
        <span class="px-3 py-1 border border-green-300 rounded-full text-green-300 text-xs uppercase font-semibold">Published</span>
      </td>
      <td>
        <a href="/admin/post/edit/{{ $post->id }}">Edit</a>
      </td>
      <td>
        <form action="/admin/post/{{ $post->id }}" method="post">
          @csrf
          @method('delete')
          <button class="text-xs text-gray-400">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                </x-panel>
            </main>

        </x-settings>
    </x-slot>
</x-layout>