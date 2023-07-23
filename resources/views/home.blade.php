<x-master title="Home Page">

    @if(session('successLogin'))
    
    <x-Alert type="success"> 
        {{ session('successLogin') }}
    </x-Alert>
   @endif
   
    <x-Alert type="primary"> 
        <h5>Home Page</h5>
    </x-Alert>
    <x-table-useres :useres='$useres' />
   
</x-master>  