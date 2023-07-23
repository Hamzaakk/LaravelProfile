<x-master title="publications">
    <x-alert type='primary'> Publications </x-alert>

   <div class="d-flex m-2 flex-wrap">
    @foreach ($publications as $publication)
    <x-publication :publication='$publication' >
    </x-publication>
    
    @endforeach
</div>
</x-master>    