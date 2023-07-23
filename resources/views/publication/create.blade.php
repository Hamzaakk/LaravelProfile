<x-master title='Create publication'>
    <x-alert type='primary my-2' >
    Add publication 
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
    <form class="w-50 container" method="POST" action="{{route('publications.store')}}" enctype="multipart/form-data">
     <!-- Name input -->
     @csrf
     <div class="form-outline mb-4">
       <input type="text" id="form4Example1" class="form-control" name="title" value="{{old('title')}}" required/>
       <label class="form-label" for="form4Example1">Titer</label>
     </div>
   
    
     <!-- Message input -->
     <div class="form-outline mb-4">
       <textarea class="form-control" id="form4Example3" rows="4" name="body" required>{{old('body')}}</textarea>
       <label class="form-label" for="form4Example3">body</label>
     </div>
  
     <!-- image input -->    
     <label  >image</label>
     <div class="form-outline mb-4">
       <input type="file" id="form4Example2" class="form-control" name="image"/>
     </div>
 
 
     <!-- Submit button -->
     <button type="submit" class="btn btn-primary btn-block mb-4" name='send'>Ajouter</button>
   </form>
 </x-master>