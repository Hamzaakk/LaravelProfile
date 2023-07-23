<x-master title="personal Profile" >
  
  <div class="card container my-3" style="width: 400px">
    <img src="{{asset('storage/'.$profile->image)}}" class="card-img-top" alt="Sunset Over the Sea"/>
    <div class="card-body">
      <h6 class="text-center">{{$profile['name']}}</h6>
      <p class="text-center">{{$profile->created_at->format('Y-d-m')}}</p>
      <p class="card-text">
        <hr>
        <span class="text-primary"> bio :</span>
       {{$profile['bio']}}
        <hr>
      </p>
      <p>Email : <a href="mailto:{{$profile['email']}}">{{$profile['email']}}</a></p>

    </div>

  </div>
        
       <div class="container">
       
          @if($profile->publications->isEmpty())
                
                     <x-alert type='warning'>
                      Auccun Publication
                     </x-alert>
                     
                 @else
                 <span class="badge text-bg-warning w-10">Publications :</span>

                 <div class="d-flex flex-wrap justify-content-center">
                  @foreach ($profile->publications as $item)
                  <x-publication :canedit="auth()->user()->id === $item->profile_id" :publication='$item'> 
                    
                  </x-publication>
        
                  @endforeach
                  
                </div>
                 @endif
           
         
              
          
             
          
         
       </div>

</x-master>