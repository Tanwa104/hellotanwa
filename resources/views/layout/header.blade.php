<html>
    <head>
        <title> welcome to gruhseva</title>
    </head>
 
</head>
<body>
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0">GruhSeva</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                @php
        
                @endphp
                @if(auth()->user()==null)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login as</a>
                    <div class="dropdown-menu m-0">
                        <a href="loguser" class="dropdown-item">User</a>
                        <a href="loghelp" class="dropdown-item">Helper</a>
                        <a href="" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                @endif
                @if(auth()->user()!=null)
                @if(auth()->user()->role_id==1)
                <a href="{{route('edus.index')}}" class="nav-item nav-link">Edit Profile</a>
                <a href="" class="nav-item nav-link">Bookings</a>
                <a href="{{route('propuser.select')}}" class="nav-item nav-link">view proposals</a>
                
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <input type="submit" class="btn btn-primary py-2 px-4" value="logout" onclick="event.preventDefault();
                                    this.closest('form').submit();">
               </form>
    
        @endif
        @if(auth()->user()->role_id==2)
        
                <a href="{{route('edhelp.index')}}" class="nav-item nav-link">Edit profile</a>
                <a href="" class="nav-item nav-link">rules and regulation</a>
                
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <input type="submit" class="btn btn-primary py-2 px-4" value="logout" onclick="event.preventDefault();
                                    this.closest('form').submit();">
               </form>
    
        @endif
        @endif
        </div>
        
    </nav>
</div>
    </body>