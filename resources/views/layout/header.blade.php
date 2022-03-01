<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Social Media</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          @if (!empty(Auth::user()->name))
          <a class="nav-link" href="#">Hello {{Auth::user()->name}} </a>
          @endif
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Members
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          
            
            
          

            @if(!empty($users_acc))
            @foreach($users_acc as $user_acc)

            <form action="{{ route('follow',['id'=>$user_acc->id]) }}"  method="POST">
            @csrf
         
            <li>{{$user_acc->name}} <input type="submit" class="btn-success rounded" value="Friend"></li>

            @endforeach

            @endif

            @if(!empty($users_req))
            @foreach($users_req as $user_req)
            

            <form action="{{ route('follow',['id'=>$user_req->id]) }}"  method="POST">
            @csrf
         
            <li>{{$user_req->name}} <input type="submit" class="btn-warning rounded" value="Pending Friend"></li>


            @endforeach
            @endif


            @if(!empty($other_users))

            @foreach($other_users as $other_user)


            <form action="{{ route('follow',['id'=>$other_user->id]) }}"  method="POST">
            @csrf
         
            <li>{{$other_user->name}} <input type="submit" class=" btn-primary rounded" value="Follow"></li>








      

            @endforeach
            @endif
         
          </form>




         
            
          
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item">
          @if (empty(Auth::user()->name))
          <a class="nav-link " href="register">Register</a>
          @endif
        </li>
        <li class="nav-item">
          @if (empty(Auth::user()->name))
          <a class="nav-link " href="login">Login</a>
          @endif
        </li>
        <li class="nav-item">
          @if (!empty(Auth::user()->name))
          <a class="nav-link " href="signout">Signout</a>
          @endif
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>