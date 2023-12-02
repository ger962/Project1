@include('Firebase.Includes.head')
    <body class="antialiased">
    <div class="holder">
      <form id="login-form" method="post">
        <div class="login-container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="name" name="name" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="psw" name="psw" required>
            <label>
            <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
            </label>

            <button type="submit">Login</button>

        </div>

        <div class="login-container" style="background-color:#f1f1f1">
            <span class="psw">Forgot<a href="#">password?</a></span>
        </div>
      </form>
    </div>

    <!-- Add this inside your <body> tag -->
    <div id="error-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="error-message"></p>
    </div>
    </div>

        
    <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-firestore.js"></script>
    <script>
    
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("psw");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Add this inside your script block
        const errorModal = document.getElementById('error-modal');
        const errorMessageElement = document.getElementById('error-message');
        const closeButton = document.querySelector('.close');

        function displayErrorModal(message) {
        errorMessageElement.innerText = message;
        errorModal.style.display = 'block';
        }

        closeButton.addEventListener('click', () => {
        errorModal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
        if (event.target === errorModal) {
            errorModal.style.display = 'none';
        }
        });


        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
        const db = firebase.firestore();

        const loginForm = document.querySelector('#login-form');
       
        let failedAttempts = 0;
	        let lockUntil = null;
	        let password = loginForm['psw'].value;
	        loginForm.addEventListener('submit', (e) => {
	            e.preventDefault();
	            
	            const email = loginForm['name'].value;
	            const password = loginForm['psw'].value;
	
	            if (password.length < 8 || password.length > 128 ) {
	                displayErrorModal('Password Is to Short. Please Try Again');
	                return;
	            }
	         
	            auth.signInWithEmailAndPassword(email, password)
	            .then(cred => {
	                console.log('login successful: ', cred.user);
	                resetFailedAttempts();
	                window.location.href = '/master';
	            })
	            .catch(error => {
	                console.error('login error ', error);
	                
	                incrementFailedAttempts();
	                if(isLocked()) {
	                    displayErrorModal('Login Locked, Wait For 5 Minutes. ');
	                   
	                    
	                } else {
	                    displayErrorModal('Login Failed. Check Your Credentials. ');
	                } 
	                
	            });
	            
	        });
	
	        function incrementFailedAttempts() {
	            failedAttempts++;
	            if(failedAttempts >= 5) {
	                lockUntil = new Date(Date.now() + 5 * 60 * 1000);
	            }
	        }
	        function isLocked(){
	            return lockUntil !== null && new Date() < lockUntil;
	        }    
	        function resetFailedAttempts(){
	            failedAttempts = 0;
	            lockUntil = null;
        }
      
    </script>
    </body>
</html>
