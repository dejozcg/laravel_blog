<x-layout>
 
    <x-slot name="content">
    <main class="max-w-lg mx-auto mt-10">
      <x-panel>
        <x-form.field>
          <form action="/login" method="post">
              @csrf
              <x-form.input name="email" type="email" autocompleate="username"></x-form.input>
              <x-form.input name="password" type="password"></x-form.input>
              
              
              <x-form.submit-button>Publish</x-form.submit-button>
          </form>
        </x-form.field>
      </x-panel>
    </main>
    </x-slot>


</x-layout>