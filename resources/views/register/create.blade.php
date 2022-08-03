<x-layout>
 
    <x-slot name="content">
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
              <small id="helpId" class="text-muted">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
              @error('email')
              <small id="helpId" class="text-muted">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control" placeholder="" aria-describedby="helpId">
              @error('username')
              <small id="helpId" class="text-muted bg-red">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
              @error('password')
              <small id="helpId" class="text-muted">{{ $message }}</small>
              @enderror
            </div>
            <x-form.submit-button>Submit</x-form.submit-button>
        </form>
    </main>
    </x-slot>


</x-layout>