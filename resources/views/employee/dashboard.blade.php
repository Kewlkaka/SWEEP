<x-dashboard-base>
    <div class="profileSection">
        <div class="circle"></div>
        <h1 class="userHeading">Welcome {{ $employee['emp_name'] }}</h1>
        <div class="avatarContainer">
            @if ($employee['emp_gender'] === 'F')
                <img class="avatar" src="{{ asset('assets/img/avatarGirl.png') }}" alt="">
            @else
                <img class="avatar" src="{{ asset('assets/img/3d-avatar_of_men.png') }}" alt="">
            @endif
        </div>
        <div class="infoBox2">
            <h2>Organization: {{ $employee['emp_org_name'] }}</h2>
        </div>
        <div class="infoBox3">
            <h2>Designation:</h2>
            <h2>{{ $employee['emp_position'] }}</h2>
        </div>
        <div class="infoBox1">
            <h2>Work Experience: {{ $employee['emp_work_experience'] }}+</h2>
        </div>
        <div class="infoBox4">
            <h2>Awaiting Completion:</h2>
            <h2>0</h2>
        </div>
    </div>

    <div class="taskCreator">
        <div class="container">
            <div class="createAssignment">
                <h1 class="taskCreatorHeading">Schedule your next Sweep Assignment...</h1>
                <div class="SW_formContainer">
                    <form class="swForm">
                        @csrf
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="sw_title">Title:</label>
                            <input class="taskCreatorInput" type="text" name="sw_title" id="sw_title">
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="sw_detail">Task Details:</label>
                            <textarea class="detailInputTextArea" name="sw_detail" id="sw_detail" cols="30" rows="7"></textarea>
                        </div>
                        <div class="formLabelAndInput">
                            <div class="checkBoxContainer">
                                <label class="taskCreatorLabel" for="sw_compensation_proposed">Are you offering any
                                    monetary
                                    compensation?</label>
                                <label for="Yes">Yes:</label>
                                <input type="checkbox" id="Yes" name="sw_compensation_proposed" value="Yes">
                                <label for="No">No:</label>
                                <input type="checkbox" id="No" name="sw_compensation_proposed" value="No">
                            </div>
                        </div>
                        <div class="formLabelAndInput">
                            <div class="checkBoxContainer">
                                <label class="taskCreatorLabel" for="sw_complexity">Complexity of task?</label>
                                <label for="easy">Easy:</label>
                                <input type="checkbox" id="easy" name="sw_complexity" value="easy">
                                <label for="medium">Medium:</label>
                                <input type="checkbox" id="medium" name="sw_complexity" value="medium">
                                <label for="hard">Hard:</label>
                                <input type="checkbox" id="hard" name="sw_complexity" value="hard">
                            </div>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="sw_deadline">When do you need this by?</label>
                            <input class="taskCreatorInput" id="sw_deadline" type="date" name="sw_deadline">
                        </div>
                        <h2 class="idealFit">Who would be an ideal fit?</h2>
                        <div class="formLabelAndInput">
                            <div class="checkBoxContainer">
                                <label class="taskCreatorLabel" for="sw_student_prior_experience_req">Do you require
                                    someone with
                                    prior
                                    work
                                    experience?</label>
                                <label for="Yes_pe">Yes:</label>
                                <input type="checkbox" id="Yes_pe" name="sw_student_prior_experience_req"
                                    value="Yes">
                                <label for="No_pe">No:</label>
                                <input type="checkbox" id="No_pe" name="sw_student_prior_experience_req"
                                    value="No">
                            </div>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="sw_student_program_req_id">Which field is most relevant
                                to
                                your
                                assignment?</label>
                            <select id="sw_student_program_req_id" name="sw_student_program_req_id">
                                <option value="1">Computer Science</option>
                                <option value="2">Bachelors in Business Administration
                                </option>
                                <option value="3">Accounting and Finance</option>
                                <option value="4">Media Sciences</option>
                            </select>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="sw_student_country_req_id">Where would your ideal
                                candidate be
                                residing:</label>
                            <select id="sw_student_country_req_id" name="sw_student_country_req_id">
                                <option value="1">Pakistan</option>
                                <option value="2">United Kingdom</option>
                            </select>
                        </div>
                        <button id="createSweepAssignmentBtn" class="swBtn">Create Sweep
                            Assignment</button>
                    </form>
                </div>
            </div>
            <div class="studentsView">
                <h1>Step2: Pick a student:</h1>
            </div>
        </div>
    </div>
    <div class="taskViewer">
        <div class="flexContainerz">
            <div class="flex2">
                <h1>Sweep Assignments</h1>
                <div class="sweepAssignmentsTable"></div>
            </div>
            <div class="flex3">
                <h1>Sweep Histories</h1>
                <div class="sweepHistoriesTable"></div>
            </div>
        </div>
    </div>

    <div class="find">
        <p>Find Section</p>
    </div>

    <div class="team">
        <p>Team Section</p>
    </div>

    <div class="chat">
        <p>Chat Section</p>
    </div>

</x-dashboard-base>
