<style>
    .side-nav {
        position: absolute;
    }
</style>







@include('Firebase.Includes.head')
<div class="container">
  <nav class="side-nav">
    <ul class="nav-menu">
      <li class="nav-item active"><a href="{{ url('master')}}"><i class="fas fa-tachometer-alt"></i><span class="menu-text">Dashboard</span></a></li>
      <li class="nav-item"><a href=" {{ url('users') }}" id=><i class="fas fa-user"></i><span class="menu-text">Users</a></li>
      <li class="nav-item"><a href="{{url('users')}}"><i class="fas fa-file-alt"></i><span class="menu-text">Posts</span></a></li>
      <li class="nav-item"><a href="{{url('users')}}"><i class="fas fa-play "></i><span class="menu-text">Quiz</span></a></li>
      <li class="nav-item"><a href="{{url('users')}}"><i class="fas fa-play "></i><span class="menu-text">Content</span></a></li>
      <li class="nav-item"><a href="{{url('modules')}}"><i class="fas fa-play "></i><span class="menu-text">Modules</span></a></li>
      <li class="nav-item"><a href="{{url('users')}}" id="logout"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Logout</span></a></li>
    </ul>
  </nav>
</div>
<div><a href="{{url('users')}}">Click Here</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-firestore.js"></script>

<script type="module">
    $(function() {
        $("li").click(function(e) {
            e.preventDefault();
            $("li").removeClass("active");
            $(this).addClass("active");
        });

    

        const firebaseConfig = {
        apiKey: "AIzaSyCYLWmEsShRRHX07S3QkcoqoejNGG3V_8E",
        authDomain: "capstoneproject-e67d6.firebaseapp.com",
        databaseURL: "https://capstoneproject-e67d6-default-rtdb.firebaseio.com",
        projectId: "capstoneproject-e67d6",
        storageBucket: "capstoneproject-e67d6.appspot.com",
        messagingSenderId: "37051941413",
        appId: "1:37051941413:web:b6d40fe1a9f5c67f36f5cc",
        measurementId: "G-K3RJD93Y44"
        };
        firebase.initializeApp(firebaseConfig);


        const auth = firebase.auth();


        const logout = document.querySelector('#logout');
        logout.addEventListener('click', (e) => {
            e.preventDefault();
            auth.signOut().then(() => {
                console.log('User Logout');
                // Check if the user is successfully logged out
                if (auth.currentUser === null) {
                    window.location.href = '/'; // Change to the appropriate URL for the welcome page
                } else {
                    console.error('Logout failed');
                    // Handle logout failure
                }
            });
        });
        
    });

    

</script>
