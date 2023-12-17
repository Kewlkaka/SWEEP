<x-base>
    <div class="signupContainer">
        <div class="signupContainerGrid__items">
            <div class="signupImageContainer">
                <img class="signupImage" src="{{ asset('assets/img/signupSuccessMountain.jpg') }}" alt="">
            </div>
            <div class="signupFormContainer">
                <h2 class="signupHeading">Create a new account</h2>
                <p class="signupSubtitle">Already have an account? <a class="signInLink" href="/signIn">Sign in</a></p>
                <form class="signupForm" action="/signUpLogic" method="POST">
                    @csrf
                    <label class="signupLabel" for="name">Name:</label>
                    <input class="signupInput" type="text" name="name" id="name" required>
                    <label class="signupLabel" for="name">What defines you best:</label>
                    <label class="signupLabel" for="aboutYou">Tell us about yourself:</label>
                    <textarea class="signupInputTextArea" name="aboutYou" id="aboutYou" cols="30" rows="10"></textarea>
                    <p class="signupSubtitle">Employers will use this information to find you, make sure to mention your
                        skills</p>
                    <div class="btnContainer">
                        <button class="signupBtn" type="submit">Next-></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-base>
