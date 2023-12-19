<x-base>
    <body>
        <div class="login">
            <div class="logincard">
                <div class="leftcard">
                    <h1>Not a part of our <span>service?</span></h1>
                    <a href="/signUp"><button>Sign Up <img src="{{ asset('assets/img/login-icon.png') }}" alt=""></button></a>
                </div>
                <div class="rightcard">
                    <div class="formcard">
                        <h1>Login</h1>
                        <p>Welcome back to our service</p>
                        <div class="rightloginform">
                            <form method="post" id="loginform"action="{{url('/')}}/login">
                                @csrf    
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" >
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" >
                                <div class="center"><button id="loginbtn" type="submit">Sign in <img src="{{ asset('assets/img/login-icon.png') }}" alt=""></button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="{{ asset('assets/js/login.js') }}"></script>
    </body>
</x-base>