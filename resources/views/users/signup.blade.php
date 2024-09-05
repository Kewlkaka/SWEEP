<x-base>
    <div class="signupContainer">
        <div class="signupContainerGrid__items">
            <div class="signupImageContainer">
                <img class="signupImage" src="{{ asset('assets/img/signupSuccessMountain.jpg') }}" alt="">
            </div>
            <div class="signupFormContainer">
                <h2 class="signupHeading">Create a new account</h2>
                <p class="signupSubtitle">Already have an account? <a class="signInLink" href="/login">Sign in</a></p>
                <form class="signupForm">
                    @csrf
                    <div id="step1" class="step">
                        <label class="signupLabel" for="name">Name:</label>
                        <input class="signupInput" type="text" name="name" id="name" required>

                        <label class="signupLabel" for="occupation">What defines you best:</label>
                        <div class="checkBoxContainer">
                            <label for="student">Student</label>
                            <input type="checkbox" id="student" name="occupation" value="student">
                            <label for="employee">Employee</label>
                            <input type="checkbox" id="employee" name="occupation" value="employee">
                            <label for="organization">Organization</label>
                            <input type="checkbox" id="organization" name="occupation" value="organization">
                        </div>

                        <label class="signupLabel" for="desc">Tell us about yourself:</label>
                        <textarea class="signupInputTextArea" name="desc" id="desc" cols="30" rows="10"></textarea>
                        <p class="textAreaSubtitle">Employers will use this information to find you, make sure to
                            mention your skills
                        </p>

                        <div class="btnContainer">
                            <button id="nextBtn" class="signupBtn">Next-></button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div id="step2" class="step hidden">
                        <label class="signupLabel" for="student_university_name">University Name:</label>
                        <input class="signupInput" type="text" name="student_university_name"
                            id="student_university_name" required>

                        <label class="signupLabel" for="student_gender">Gender:</label>
                        <div class="checkBoxContainer">
                            <label for="male">M:</label>
                            <input type="checkbox" id="male" name="student_gender" value="M">
                            <label for="female">F:</label>
                            <input type="checkbox" id="female" name="student_gender" value="F">
                        </div>

                        <label class="signupLabel" for="student_program">Program:</label>
                        <select id="student_program" name="student_program">
                            <option value="1">Computer Science</option>
                            <option value="2">Bachelors in Business Administration
                            </option>
                            <option value="3">Accounting and Finance</option>
                            <option value="4">Media Sciences</option>
                        </select>

                        <label class="signupLabel" for="student_level_of_education">Currently Pursuing:</label>
                        <select id="student_level_of_education" name="student_level_of_education" required>
                            <option value="1">Bachelors</option>
                            <option value="2">Masters</option>
                        </select>

                        <label class="signupLabel" for="student_current_year">Current Year in University</label>
                        <input class="signupInput" type="number" name="student_current_year" id="student_current_year"
                            required>

                        <div class="btnContainer">
                            <button id="nextBtnStep2" class="signupBtn">Next-></button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div id="step3" class="step hidden">
                        <label class="signupLabel" for="student_work_experience">Years of Prior Work Experience</label>
                        <input class="signupInput" type="number" name="student_work_experience"
                            id="student_work_experience">

                        <label class="signupLabel" for="student_country">Country:</label>
                        <select id="student_country" name="student_country">
                            <option value="1">Pakistan</option>
                            <option value="2">United Kingdom</option>
                        </select>

                        <label class="signupLabel" for="student_dob">Date of Birth:</label>
                        <input class="signupInput" type="date" id="student_dob" name="student_dob" required>

                        <div class="btnContainer">
                            <button id="nextBtnStep3" class="signupBtn">Next-></button>
                        </div>
                    </div>

                    <!--Step4-->
                    <div id="step4" class="step hidden">
                        <label class="signupLabel" for="student_email">Email:</label>
                        <input class="signupInput" type="email" name="student_email" id="student_email" required>

                        <label class="signupLabel" for="student_password">Password:</label>
                        <input class="signupInput" type="password" name="student_password" id="student_password"
                            required>

                        <label class="signupLabel" for="student_password_confirmation">Confirm Password:</label>
                        <input class="signupInput password_confirmation" type="password"
                            name="student_password_confirmation" id="student_password_confirmation" required>

                        <div class="btnContainer">
                            <button id="nextBtnStep4" class="signupBtn">Submit-></button>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div id="step5" class="step hidden">
                        <label class="signupLabel" for="emp_org_name">Organization:</label>
                        <input class="signupInput" type="text" name="emp_org_name" id="emp_org_name" required>

                        <label class="signupLabel" for="emp_position">Current Position:</label>
                        <input class="signupInput" type="text" name="emp_position" id="emp_position" required>

                        <label class="signupLabel" for="emp_country">Country:</label>
                        <select id="emp_country" name="emp_country" required>
                            <option value="1">Pakistan</option>
                            <option value="2">United Kingdom</option>
                        </select>

                        <label class="signupLabel" for="emp_work_experience">Years of Prior Work Experience</label>
                        <input class="signupInput" type="number" name="emp_work_experience"
                            id="emp_work_experience">

                        <label class="signupLabel" for="emp_gender">Gender:</label>
                        <div class="checkBoxContainer">
                            <label for="male">M:</label>
                            <input type="checkbox" id="emp_gender" name="emp_gender" value="M">
                            <label for="female">F:</label>
                            <input type="checkbox" id="emp_gender" name="emp_gender" value="F">
                        </div>

                        <div class="btnContainer">
                            <button id="nextBtnStep5" class="signupBtn">Next-></button>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div id="step6" class="step hidden">

                        <label class="signupLabel" for="emp_industry">Industry:</label>
                        <select id="emp_industry" name="emp_industry" required>
                            <option value="1">FinTech</option>
                            <option value="2">Technology
                            </option>
                            <option value="3">Business</option>
                            <option value="4">Arts</option>
                        </select>

                        <label class="signupLabel" for="emp_email">Email:</label>
                        <input class="signupInput" type="email" name="emp_email" id="emp_email" required>

                        <label class="signupLabel" for="emp_password">Password:</label>
                        <input class="signupInput" type="password" name="emp_password" id="emp_password" required>

                        <label class="signupLabel" for="emp_password_confirmation">Confirm Password:</label>
                        <input class="signupInput password_confirmation" type="password"
                            name="emp_password_confirmation" id="emp_password_confirmation" required>

                        <div class="btnContainer">
                            <button id="nextBtnStep6" class="signupBtn">Submit-></button>
                        </div>
                    </div>

                    <!--Step7-->
                    <div id="step7" class="step hidden">
                        <label class="signupLabel" for="org_industry">Industry:</label>
                        <select id="org_industry" name="org_industry" required>
                            <option value="1">FinTech</option>
                            <option value="2">Technology
                            </option>
                            <option value="3">Business</option>
                            <option value="4">Arts</option>
                        </select>

                        <label class="signupLabel" for="org_country">Country:</label>
                        <select id="org_country" name="org_country" required>
                            <option value="1">Pakistan</option>
                            <option value="2">United Kingdom</option>
                        </select>

                        <label class="signupLabel" for="org_email">Email:</label>
                        <input class="signupInput" type="email" name="org_email" id="org_email" required>

                        <label class="signupLabel" for="org_password">Password:</label>
                        <input class="signupInput" type="password" name="org_password" id="org_password" required>

                        <label class="signupLabel password_confirmation" for="org_password_confirmation">Confirm
                            Password:</label>
                        <input class="signupInput" type="password" name="org_password_confirmation"
                            id="org_password_confirmation" required>

                        <div class="btnContainer">
                            <button id="nextBtnStep7" class="signupBtn">Submit-></button>
                        </div>
                    </div>

                </form>
                <div id="validationError"></div>
            </div>
        </div>
    </div>
</x-base>
