<x-layout>
 
    <x-slot name="content">
    <main class="max-w-lg mx-auto mt-6 lg:mt-20 space-y-6">
      <x-panel>
        <x-form.field>
          <form action="/register" method="post">
              @csrf
              <x-form.input type="text" name="name" aria-describedby="helpId"></x-form.input>
              <x-form.input type="email" name="email" aria-describedby="emailHelpId"></x-form.input>
              <x-form.input type="text" name="username" aria-describedby="helpId"></x-form.input>
              <x-form.input type="password" name="password" aria-describedby="helpId"></x-form.input>
  
              <x-form.submit-button>Submit</x-form.submit-button>
          </form>
        </x-form.field>
      </x-panel>
    </main>
    </x-slot>


</x-layout>