<x-master title='Create Profile'>
    <x-alert type='primary my-2' >
     modifier profile
    </x-alert> 
    @if ($errors->any())
    <x-alert type='danger my-2' >
     <h6>Errors:</h6>
     <ul>
     @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
     @endforeach
     </ul>
    </x-alert> 
    @endif
    <form class="w-50 container" method="POST" action="{{route('updateProfileAction',$profile->id)}}" enctype="multipart/form-data">
     <!-- Name input -->
     @method('PUT')
     @csrf
     <div class="form-outline mb-4">
       <input type="text" id="form4Example1" class="form-control" name='name' value="{{old('name',$profile->name)}}"/>
       <label class="form-label" for="form4Example1">Name</label>
     </div>
   
     <!-- Email input -->
     <div class="form-outline mb-4">
       <input type="email" id="form4Example2" class="form-control" name='email' value="{{old('email',$profile->email)}}"/>
       <label class="form-label" for="form4Example2">
         Email address
     
     </label>
     </div>
   <!-- password input -->
   <div class="form-outline mb-4">
     <input type="password" id="form4Example2" class="form-control" name='password'/>
     <label class="form-label" for="form4Example2"> password</label>
   </div>
   <!-- password input -->
   <div class="form-outline mb-4">
     <input type="password" id="form4Example2" class="form-control" name='password_confirmation'/>
     <label class="form-label" for="form4Example2"> password conifirmation </label>
   </div>
     <!-- Message input -->
     <div class="form-outline mb-4">
       <textarea class="form-control" id="form4Example3" rows="4" name='bio' >{{old('bio',$profile->bio)}}</textarea>
       <label class="form-label" for="form4Example3">bio</label>
     </div>

     <label  >image</label>
     <div class="form-outline mb-4">
       <input type="file" id="form4Example2" class="form-control" name='image'/>
     </div>
  
   
     <!-- Submit button -->
     <button type="submit" class="btn btn-primary btn-block mb-4" name='send'>Update</button>
   </form>
 </x-master>