@props(['type'])
<div class="alert alert-{{$type}} my-3" role="alert">
    {{$slot}}
  </div>