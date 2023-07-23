@if (session()->has('success'))
<x-alert type='success'>
  compte cree avec success
</x-alert>
@endif
@if (session()->has('danger'))
<x-alert type='danger'>
email déja existe
</x-alert>
@endif

@if(session('supprisionProfile'))
    <div class="alert alert-danger">
        {{ session('supprisionProfile') }}
    </div>
@endif

@if (session()->has('succsessUpdate'))
<x-alert type='success'>
{{session('succsessUpdate')}}
</x-alert>
@endif

