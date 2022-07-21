<x-layout>
 
    <x-slot name="content">
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input value="{{ old('email') }}" type="text" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="email or password">
              @error('email')
              <small id="helpId" class="text-muted">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
              @error('password')
              <small id="helpId" class="text-muted">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    </x-slot>


</x-layout>