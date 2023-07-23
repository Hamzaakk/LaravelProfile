<x-master title="Profile">
   <x-Alert type="primary"> 
       <h5>Profile Page</h5>
   </x-Alert>
   <div class="row">
   @foreach ($profiles as $profile)
    <x-cardProfile :profile='$profile'/>
   @endforeach
 </div>
{{$profiles->links()}}


</x-master>  
 