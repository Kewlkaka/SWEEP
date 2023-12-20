
function initializeSidebar() {
    let menuicn = document.getElementById("menuIcn");
    let nav = document.querySelector(".navcontainer");
    let navIcon = document.querySelectorAll(".iconOpen");

    menuicn.addEventListener("click", () => {
        nav.classList.toggle("navclose");
        for (let i = 0; i < navIcon.length; i++) {
            navIcon[i].classList.toggle("iconClose");
        }
    }); 

    let sidebarTab = document.querySelectorAll(".nav-option"); 
    const profileSection = document.querySelector(".profileSection"); //main
    const taskCreatorSection = document.querySelector(".taskCreator"); 
    const taskViewerSection = document.querySelector(".taskViewer"); 
    const findSection = document.querySelector(".find"); 
    const teamSection = document.querySelector(".team"); 
    const chatSection = document.querySelector(".chat"); 
    let selectedTabIndex = 0;

    let contentSections = document.querySelectorAll(".profileSection > div");

    function handleTabClick(tabIndex) {

        sidebarTab.forEach((tab, index) => {
            if (index === tabIndex) {
                tab.classList.add("selected");
            } else {
                tab.classList.remove("selected");
            } 
        });

        if(tabIndex === 0) {
            profileSection.classList.toggle("selected-section", tabIndex === 0);
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 1) {
            taskCreatorSection.classList.toggle("selected-section", tabIndex === 1);
            profileSection.classList.value = "profileSection";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 2) {
            taskViewerSection.classList.toggle("selected-section", tabIndex === 2);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 3) {
            findSection.classList.toggle("selected-section", tabIndex === 3);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 4) {
            teamSection.classList.toggle("selected-section", tabIndex === 4);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            chatSection.classList.value = "chat";
        } else {
            chatSection.classList.toggle("selected-section", tabIndex === 5);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
        }

        selectedTabIndex = tabIndex;
        
    }

    sidebarTab.forEach((sidebarTab, index) => {
        sidebarTab.addEventListener("click", () => {
            console.log(index);
            handleTabClick(index);
        }); 
    });

    handleTabClick(selectedTabIndex);
}

initializeSidebar();

const swBtn = document.getElementById('createSweepAssignmentBtn');

swBtn.addEventListener('click', (event) => {
    event.preventDefault();
    captureFormData();
})
function captureFormData() {
    var formData = {
        sw_title: $('#sw_title').val(),
        sw_detail: $('#sw_detail').val(),
        sw_compensation_proposed: $('input[name=sw_compensation_proposed]:checked').val(),
        sw_student_program_req_id: $('#sw_student_program_req_id').val(),
        sw_complexity: $('input[name=sw_complexity]:checked').val(),
        sw_student_prior_experience_req: $('input[name=sw_student_prior_experience_req]:checked').val(),
        sw_student_country_req_id: $('#sw_student_country_req_id').val(),
        sw_deadline: $('#sw_deadline').val(),
    };

    console.log(formData);
    submitStudentFormData(formData);
}

function submitStudentFormData(formData) {
    $.ajax({
        url: '/create-task',
        type: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: JSON.stringify(formData),
        success: function (data) {
            
    
            console.log('Form submitted successfully', data);
            if (data.message === 'Task created successfully') {
                //alert('Task created successfully');
                updateUI(data);
            }
        },
        error: function (error) {
            console.error('Error submitting form', error);
            console.log('Complete error object:', error);
            if (error.responseJSON) {
                console.log('Error response:', error.responseJSON);
            }
        }
    });
}

function updateUI(data) {
    const matchingStudents = data.matchingStudents;
    $('.studentBox').remove();
    const studentsContainer = document.querySelector('.studentsView');
    const dontLikeAny = document.querySelector('.dontLikeAny');
    const assignSpecificallyLink = document.querySelector('.assignLink');

    if (dontLikeAny) {
        studentsContainer.removeChild(dontLikeAny);
    }

    if (assignSpecificallyLink) {
        studentsContainer.removeChild(assignSpecificallyLink);
    }
    if(matchingStudents.length > 0) {
        matchingStudents.forEach(student => {
            const studentBox = $(`<div class="studentBox" data-student-id="${student.id}"></div>`);
            const studentName = $(`<h2>${student.name}</h2>`);
            studentBox.append(studentName);
            studentBox.append('<i class="fa-solid fa-message"></i>');
            $('.studentsView').append(studentBox);
        });
        const dontLikeAny = document.createElement('h2');
        dontLikeAny.classList.add('dontLikeAny');
        dontLikeAny.textContent = "Don't find one you like?";
        const assignSpecificallyLink = document.createElement('a');
        assignSpecificallyLink.textContent = 'Assign Specifically';
        assignSpecificallyLink.href = '/assignSpecifically';
        assignSpecificallyLink.classList.add('assignLink');
        studentsContainer.appendChild(dontLikeAny);
        studentsContainer.appendChild(assignSpecificallyLink);
        document.querySelectorAll('.studentBox').forEach(studentBox => {
            studentBox.addEventListener('click', function () {
                const studentId = this.getAttribute('data-student-id');
                console.log('student ID:', studentId);
                assignTask(studentId);
            });
        });
    } else {
        const noMatchMessage = document.createElement('p');
        noMatchMessage.textContent = 'No students were matched for this task.';
        studentsContainer.appendChild(noMatchMessage);
    }
}

function assignTask(studentId) {
    const formData = {
        studentId: studentId,
    };

    $.ajax({
        url: '/assign-student',
        type: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: JSON.stringify(formData),
        success: function (data) {
            
            console.log('Assignment successful', data);
            if (data.message === 'Task assigned successfully') {
                showSuccessMessage();
            }
        },
        error: function (error) {
            console.error('Error assigning task', error);
            console.log('Complete error object:', error);
            if (error.responseJSON) {
                console.log('Error response:', error.responseJSON);
            }
        }
    });
}

function fetchSweepHistories() {
    $.ajax({
        url: '/fetch-sweep-histories',
        type: 'GET',
        success: function (data) {
            console.log('Sweep histories fetched successfully', data);
            displaySweepHistoriesTable(data);
        },
        error: function (error) {
            console.error('Error fetching sweep histories', error);
            console.log('Complete error object:', error);
            if (error.responseJSON) {
                console.log('Error response:', error.responseJSON);
            }
        }
    });
}

function showSuccessMessage() {
    const studentsContainer = document.querySelector('.studentsView');
    const dontLikeAny = document.querySelector('.dontLikeAny');
    const assignSpecificallyLink = document.querySelector('.assignLink');
    const studentBoxes = document.querySelectorAll('.studentBox');
    if(dontLikeAny) {
        dontLikeAny.remove();
    }
    if(assignSpecificallyLink) {
        assignSpecificallyLink.remove();
    }
    $('.studentBox').remove();
    console.log('Called');
    const successMessage = document.createElement('h1');
    successMessage.classList.add('successMessage');
    successMessage.textContent = 'Task assigned successfully';
    studentsContainer.appendChild(successMessage);
}

function displaySweepHistoriesTable(data) {
    const tableContainer = document.querySelector('.sweepHistoriesTable');

    while (tableContainer.firstChild) {
        tableContainer.removeChild(tableContainer.firstChild);
    }

    if (data.sweepAssignments.length > 0 || data.sweepHistories.length > 0) {
        if (data.sweepAssignments.length > 0) {
            createAndRenderTable(data.sweepAssignments, 'SweepAssignment');
        }

        if (data.sweepHistories.length > 0) {
            createAndRenderHistoryTable(data.sweepHistories, 'SweepHistory');
        }
    } else {
        const noHistoriesMessage = document.createElement('p');
        noHistoriesMessage.textContent = 'No sweep histories available.';
        tableContainer.appendChild(noHistoriesMessage);
    }
}

function createAndRenderTable(data, type) {
    
    const table = document.createElement('table');
    table.classList.add('sweepHistories');

    
    const headerRow = document.createElement('tr');
    const headers = ['ID', 'Title', 'Detail'];
    headers.forEach(headerText => {
        const th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    table.appendChild(headerRow);

    
    data.forEach(item => {
        const row = document.createElement('tr');

        
        const rowData = [
            item.id,
            item.sw_title,
            item.sw_detail,
        ];

        rowData.forEach(cellData => {
            const td = document.createElement('td');
            td.textContent = cellData;
            row.appendChild(td);
        });

        table.appendChild(row);
    });

    const tableContainer = document.querySelector('.sweepAssignmentsTable');
    tableContainer.appendChild(table);
}

function createAndRenderHistoryTable(data, type) {
    
    const table = document.createElement('table');
    table.classList.add('sweepHistories');

    
    const headerRow = document.createElement('tr');
    const headers = ['ID', 'Assigned By', 'Assigned to', /* add other headers based on your fields */];
    headers.forEach(headerText => {
        const th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    table.appendChild(headerRow);

    
    data.forEach(item => {
        const row = document.createElement('tr');

        
        const rowData = [
            item.id,
            item.sw_emp_id,
            item.sw_student_id,
        ];

        rowData.forEach(cellData => {
            const td = document.createElement('td');
            td.textContent = cellData;
            row.appendChild(td);
        });

        table.appendChild(row);
    });

    const tableContainer = document.querySelector('.sweepHistoriesTable');
    tableContainer.appendChild(table);
}

const observerConfig = {
    root: null,
    rootMargin: '0px',
    threshold: 0.5, // Adjust as needed
};

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            
            fetchSweepHistories();
            observer.unobserve(entry.target); 
        }
    });
}


const observer = new IntersectionObserver(handleIntersection, observerConfig);


const taskViewer = document.querySelector('.taskViewer');


if (taskViewer) {
    observer.observe(taskViewer);
}