@props(['useres'])    
<div>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>cpésialité</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($useres as $item)
          <tr>
            <td>
                <p class="fw-normal mb-1">{{$item['id']}}</p>
              </td>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">{{$item['nom']}}</p>
                  <p class="text-muted mb-0">{{$item['prenom']}}</p>
                </div>
              </div>
            </td>
            <td>
              <span class="badge badge-success rounded-pill d-inline">{{$item['specialite']}}</span>
            </td>
           
           
          </tr>
          
          @endforeach
        </tbody>
      </table>
</div>