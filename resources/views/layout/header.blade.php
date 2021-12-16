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
            @if(!empty($users))
            @foreach($users as $user)
            @foreach($users_req as $user_req)
            @foreach($users_acc as $user_acc)


            @if(($user->name==$user_req->name) && ($user->name==$user_acc->name))

            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="POST">
            @csrf
         
            <li>{{$user->name}}<input type="submit" class="" value="Friend"></li>


            @elseif ($user->name==$user_req->name)

            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="POST">
            @csrf
         
            <li>{{$user->name}}<input type="submit" class="" value="Pending Friend"></li>


            @elseif ($user->name!=$user_req->name)



            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="POST">
            @csrf
         
            <li>{{$user->name}}<input type="submit" class="" value="Requested Friend"></li>
            <li style="display:none;">{{$user->name}}<input type="hidden" class="" name="sender_id" value={{Auth::user()->id}}></li>
            <li style="display:none;">{{$user->name}}<input type="hidden" class="" name="sender_name" value={{Auth::user()->name}}></li>
            <li style="display:none;">{{$user->name}}<input type="hidden" class="" name="reciever_id" value={{$user->id}}></li>
            <li style="display:none;">{{$user->name}}<input type="hidden" class="" name="reciever_name" value={{$user->name}}></li>
          </form>




            @endif
            @endforeach
            @endforeach
            @endforeach
            @endif
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