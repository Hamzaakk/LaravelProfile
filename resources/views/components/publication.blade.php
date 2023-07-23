<div class="card mb-3 m-2 " style="max-width: 400px;">
    <div class="row g-0">
   <p class="text-center"> 
    <span class=" text float- ">{{$publication->profile->name}}</span> </p>
        {{-- <p class="text-center  ">
          <span class="badge rounded-pill text-bg-dark">
            email 
          </span>
          <span class=" text-warning"> {{$publication->profile->email}} </span></p> --}}
<hr>
      <div class="col-md-4">
        {{-- {{$publication->profile}} --}}
       
        @if(!is_null($publication->image))
        <img
        src="{{asset('storage/'.$publication->image)}}"
        alt="Trendy Pants and Shoes"
        class="img-fluid rounded-start"
        width="200px"
      />
        @else
      
        @endif
      </div>
      <div class="col-md-8">
       
        <div class="card-body">
          @can('update', $publication)
          <a class="btn btn-primary btn-sm float-end ms-1" href="{{route('publications.edit',$publication->id)}}" class="stretched-link">edit</a>
          @endcan
          @can('delete', $publication)
              
          
          <form action="{{route('publications.destroy',$publication->id)}}" method="POST">
            @csrf
          @method('DELETE')
            <button onclick="return confirm('confirmer la suppristion')" class="btn btn-danger  btn-sm float-end " type="submit">supprimer</button>
          </form>
          @endcan
          <div class="pt-5">
          <h5 class="card-title">{{$publication->title}}</h5>
          <p class="card-text">
           {{$publication->body}}
          </p>
          <p class="card-text">
            <small class="text-muted">created at  {{$publication->created_at->format('Y-d-m')}}</small>
          </p>
        </div>
        </div>
        
      </div>
 <a href="{{route('profile.details',$publication->profile_id)}} " class="stretchedd-link"></a>
    </div>
  </div>
