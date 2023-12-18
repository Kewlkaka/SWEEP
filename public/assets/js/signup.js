console.log('Active');

const nextBtn = document.getElementById('nextBtn');
const nextBtnStep2 = document.getElementById('nextBtnStep2');
const nextBtnStep3 = document.getElementById('nextBtnStep3');
const nextBtnStep4 = document.getElementById('nextBtnStep4');
const nextBtnStep5 = document.getElementById('nextBtnStep5');
const nextBtnStep6 = document.getElementById('nextBtnStep6');
const nextBtnStep7 = document.getElementById('nextBtnStep7');

let currentStep = 1;
showStep(currentStep);

function showStep(step) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((stepElement) => {
        stepElement.classList.add('hidden');
    });

    // Show the current step
    document.getElementById(`step${step}`).classList.remove('hidden');
} 

nextBtn.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    const studentCheckbox = document.getElementById('student');
    const employeeCheckbox = document.getElementById('employee');
    const organizationCheckbox = document.getElementById('organization');
    const isStudentSelected = studentCheckbox.checked;
    const isEmployeeSelected = employeeCheckbox.checked;
    const isOrganizationSelected = organizationCheckbox.checked;

    if (isStudentSelected) {
        currentStep = 2;
    } else if(isEmployeeSelected) {
        currentStep = 5;
    } else if (isOrganizationSelected) {
        currentStep = 7;
    }

    showStep(currentStep);
});

nextBtnStep2.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    currentStep = 3;
    showStep(currentStep);
});

nextBtnStep3.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    currentStep = 4;
    showStep(currentStep);
});

nextBtnStep4.addEventListener('click', function (event) {
    event.preventDefault();
    const formData = gatherStudentFormData();
    submitStudentFormData(formData);
});

nextBtnStep5.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    currentStep = 6;
    showStep(currentStep);
});

nextBtnStep6.addEventListener('click', function (event) {
    event.preventDefault();
    const formData = gatherEmployeeFormData();
    submitEmployeeFormData(formData);
});

nextBtnStep7.addEventListener('click', function(event) {
    event.preventDefault();
    const formData = gatherOrganizationFormData();
    submitOrganizationFormData(formData);
})

function gatherStudentFormData() {
    const formData = {
        //step1
        student_name: document.getElementById('name').value,
        student_desc: document.getElementById('desc').value,

        //step2
        student_university_name: document.getElementById('student_university_name').value,
        student_gender: getCheckboxValue('student_gender'),
        student_program_id: document.getElementById('student_program').value,
        student_level_of_education_id: document.getElementById('student_level_of_education').value,
        student_current_year: document.getElementById('student_current_year').value,

        //step3
        student_work_experience: document.getElementById('student_work_experience').value,
        student_country_id: document.getElementById('student_country').value,
        student_dob: document.getElementById('student_dob').value,
        student_email: document.getElementById('student_email').value,
        student_password: document.getElementById('student_password').value,
        student_password_confirmation: document.getElementById('student_password_confirmation').value,
    };

    console.log(formData);

    return formData;
}

function gatherEmployeeFormData() {
    const formData = {
        //step1
        emp_name: document.getElementById('name').value, //
        emp_desc: document.getElementById('desc').value, //

        //step5
        emp_org_name: document.getElementById('emp_org_name').value, //
        emp_position: document.getElementById('emp_position').value, //
        emp_country_id: parseInt(document.getElementById('emp_country').value), //
        emp_work_experience: parseInt(document.getElementById('emp_work_experience').value), //
        emp_gender: getCheckboxValue('emp_gender'), //

        //step6
        emp_industry_id: parseInt(document.getElementById('emp_industry').value), //
        emp_email: document.getElementById('emp_email').value, //
        emp_password: document.getElementById('emp_password').value,
        emp_password_confirmation: document.getElementById('emp_password_confirmation').value,
    };

    console.log(formData);

    return formData;
}

function gatherOrganizationFormData() {
    const formData = {
        //step1
        org_name: document.getElementById('name').value,
        org_desc: document.getElementById('desc').value,

        org_industry_id: parseInt(document.getElementById('org_industry').value),
        org_country_id: parseInt(document.getElementById('org_country').value),
        org_email: document.getElementById('org_email').value,
        org_password: document.getElementById('org_password').value,
        org_password_confirmation: document.getElementById('org_password_confirmation').value,
    };

    console.log(formData);

    return formData;
}

function getCheckboxValue(name) {
    const checkedInput = document.querySelector(`input[name="${name}"]:checked`);
    return checkedInput ? checkedInput.value : null;
}

function submitStudentFormData(formData) {
    fetch('/create-student', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Form submitted successfully', data);
        if (data.message === 'Student created successfully') {
            alert('Account created successfully');
            window.location.href = '/?message=Account created successfully';
        }
    })
    .catch(error => {
        console.error('Error submitting form', error);
        console.log('Complete error object:', error);
        error.response.text().then(data => {
            console.log('Error response:', data);
        });
    });
}

function submitEmployeeFormData(formData) {
    fetch('/create-employee', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Form submitted successfully', data);
        if (data.message === 'Employee created successfully') {
            alert('Account created successfully');
            window.location.href = '/?message=Account created successfully';
        }
    })
    .catch(error => {
        console.error('Error submitting form', error);
        console.log('Complete error object:', error);
        error.response.text().then(data => {
            console.log('Error response:', data);
        });
    });
}

function submitOrganizationFormData(formData) {
    fetch('/create-organization', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Form submitted successfully', data);
        if (data.message === 'Organization created successfully') {
            alert('Account created successfully');
            window.location.href = '/?message=Account created successfully';
        }
    })
    .catch(error => {
        console.error('Error submitting form', error);
        console.log('Complete error object:', error);
        error.response.text().then(data => {
            console.log('Error response:', data);
        });
    });
}

