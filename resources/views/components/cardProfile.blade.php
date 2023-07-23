<div class="col-sm-3">
<div class="card mt-3" >
    <img src="{{asset('storage/'.$profile->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$profile->name}}</h5>
      <p class="card-text"> {{Str::limit($profile->bio,50)}}.</p>
      <a href="{{route('profile.details',$profile->id)}}" class="stretched-link"></a>
    </div>
    <div class="card-foot" style="z-index: 9">
      @if (auth()->user()->id === $profile->id)
          
      <form method="get" action="{{route('updateProfile',$profile)}}">
        @csrf
        <button class="btn btn-primary btn-sm float-end ms-1">modifier</button>
      </form>
      <form method="POST" action="{{route('destrpyProfile',$profile->id)}}">
        @csrf
        @method('DELETE')
        <button  onclick="return confirm('confirmer la suppristion')" class="btn btn-danger btn-sm float-end" onclick="confirm()">Supprimer</button>
      </form>
      @endif

    </div>
  </div>
</div>
