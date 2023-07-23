<x-master title="login">
<div class="container w-75 my-5 bg-light">
    <h2> Authentification </h2>
  @error('email')
  <x-alert type='danger'>
   email or password inccorect
  </x-alert>
  @enderror
  @if(session('successLogout'))

    <x-alert type='danger'>
        {{ session('successLogout') }}
           </x-alert>
@endif

    <form method="POST" action="{{route('loginAction')}}" class="my-1">
        <!-- Email input -->
        @csrf
        <div class="form-outline mb-4">
          <input type="email" id="form1Example1" class="form-control" name="email"/>
          <label class="form-label" for="form1Example1">Email address</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="form1Example2" class="form-control" name="password"/>
          <label class="form-label" for="form1Example2">Password</label>
        </div>
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
             <a href="#!">Forgot password?</a>
          </div>
          </div>
      
       
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
      </form>

    </div>

</x-master>