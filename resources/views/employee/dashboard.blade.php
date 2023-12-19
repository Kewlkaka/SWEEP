<x-dashboard-base>
    <div class="profileSection">
        <div class="circle"></div>
        <h1 class="userHeading">Welcome Sarah</h1>
        <div class="avatarContainer">
            <img class="avatar" src="{{ asset('assets/img/avatarGirl.png') }}" alt="">
        </div>
        <div class="infoBox2">
            <h2>Organization: Swift</h2>
        </div>
        <div class="infoBox3">
            <h2>Designation:</h2>
            <h2>Software Engineer</h2>
        </div>
        <div class="infoBox1">
            <h2>Work Experience: 10+</h2>
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
                    <form class="swForm" action="/create-task" method="POST">
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="title">Title:</label>
                            <input class="taskCreatorInput" type="text" name="title" id="title">
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="details">Task Details:</label>
                            <textarea class="detailInputTextArea" name="desc" id="desc" cols="30" rows="7"></textarea>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="compensation">Are you offering any monetary
                                compensation?</label>
                            <div class="checkBoxContainer">
                                <label for="Yes">Yes:</label>
                                <input type="checkbox" id="Yes" name="compensation" value="Yes">
                                <label for="No">No:</label>
                                <input type="checkbox" id="No" name="compensation" value="No">
                            </div>
                        </div>
                        <h2 class="idealFit">Who would be an ideal fit?</h2>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="priorWe">Do you require someone with prior work
                                experience?</label>
                            <div class="checkBoxContainer">
                                <label for="Yes">Yes:</label>
                                <input type="checkbox" id="Yes" name="priorWe" value="Yes">
                                <label for="No">No:</label>
                                <input type="checkbox" id="No" name="priorWe" value="No">
                            </div>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="student_program">Which field is most relevant to your
                                assignment?</label>
                            <select id="student_program" name="student_program">
                                <option value="1">Computer Science</option>
                                <option value="2">Bachelors in Business Administration
                                </option>
                                <option value="3">Accounting and Finance</option>
                                <option value="4">Media Sciences</option>
                            </select>
                        </div>
                        <div class="formLabelAndInput">
                            <label class="taskCreatorLabel" for="student_country">Where would your ideal candidate be
                                residing:</label>
                            <select id="student_country" name="student_country">
                                <option value="1">Pakistan</option>
                                <option value="2">United Kingdom</option>
                            </select>
                        </div>
                        <button type="submit" class="swBtn">Create Sweep Assignment</button>
                    </form>
                </div>
            </div>
            <div class="studentsView">
                <h1>Step2: Pick a student:</h1>
                <div class="studentBox">
                    <h2>John</h2>
                    <i id="sendMessage" class="fa-solid fa-message"></i>
                </div>
                <div class="studentBox">
                    <h2>Sarah</h2>
                    <i id="sendMessage" class="fa-solid fa-message"></i>
                </div>
                <div class="studentBox">
                    <h2>Jacob</h2>
                    <i id="sendMessage" class="fa-solid fa-message"></i>
                </div>
                <h2>Dont find one you like?</h2>
                <a class="assignLink" href="/assignStudent">Assign Specifically</a>
            </div>
        </div>
    </div>
    <!--
    <div class="taskCreator">
        <div class="createAssignment">
            <h1 class="taskCreatorHeading">Schedule your next Sweep Assignment...</h1>
            <div class="SW_formContainer">
                <form class="swForm" action="/create-task" method="POST">
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="title">Title:</label>
                        <input class="taskCreatorInput" type="text" name="title" id="title">
                    </div>
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="details">Task Details:</label>
                        <textarea class="detailInputTextArea" name="desc" id="desc" cols="30" rows="10"></textarea>
                    </div>
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="compensation">Are you offering any monetary
                            compensation?</label>
                        <div class="checkBoxContainer">
                            <label for="Yes">Yes:</label>
                            <input type="checkbox" id="Yes" name="compensation" value="Yes">
                            <label for="No">No:</label>
                            <input type="checkbox" id="No" name="compensation" value="No">
                        </div>
                    </div>
                    <h2 class="idealFit">Who would be an ideal fit?</h2>
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="priorWe">Do you require someone with prior work
                            experience?</label>
                        <div class="checkBoxContainer">
                            <label for="Yes">Yes:</label>
                            <input type="checkbox" id="Yes" name="priorWe" value="Yes">
                            <label for="No">No:</label>
                            <input type="checkbox" id="No" name="priorWe" value="No">
                        </div>
                    </div>
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="student_program">Which field is most relevant to your
                            assignment?</label>
                        <select id="student_program" name="student_program">
                            <option value="1">Computer Science</option>
                            <option value="2">Bachelors in Business Administration
                            </option>
                            <option value="3">Accounting and Finance</option>
                            <option value="4">Media Sciences</option>
                        </select>
                    </div>
                    <div class="formLabelAndInput">
                        <label class="taskCreatorLabel" for="student_country">Where would your ideal candidate be
                            residing:</label>
                        <select id="student_country" name="student_country">
                            <option value="1">Pakistan</option>
                            <option value="2">United Kingdom</option>
                        </select>
                    </div>
                    <button type="submit" class="swBtn">Create Sweep Assignment</button>
                </form>
            </div>
        </div>
        <div class="studentsView">
            <h1>Step2: Pick a student:</h1>
            <div class="studentBox">
                <h2>John</h2>
                <i id="sendMessage" class="fa-solid fa-message"></i>
            </div>
            <div class="studentBox">
                <h2>Sarah</h2>
                <i id="sendMessage" class="fa-solid fa-message"></i>
            </div>
            <div class="studentBox">
                <h2>Jacob</h2>
                <i id="sendMessage" class="fa-solid fa-message"></i>
            </div>
        </div>
    </div>
-->
    <div class="taskViewer">
        <p>Task Viewer Section</p>
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
