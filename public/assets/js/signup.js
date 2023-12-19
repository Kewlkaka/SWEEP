console.log('Active');
function displayValidationError(message) {
    const errorDiv = document.getElementById('validationError');
    errorDiv.innerHTML = `<p style="color: red;">${message}</p>`;
}

// Function to hide validation error message
function hideValidationError() {
    const errorDiv = document.getElementById('validationError');
    errorDiv.innerHTML = '';
}

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

    let student_name= document.getElementById('name').value
    let student_desc= document.getElementById('desc').value
    if(student_name==""){
        displayValidationError('Please Enter your Name.');
        return;
    }
    if(student_desc==""){
        displayValidationError('Please enter your description');
        return;
    }
    // Validate at least one occupation is selected
    if (!isStudentSelected && !isEmployeeSelected && !isOrganizationSelected) {
        displayValidationError('Please select at least one occupation.');
        return;
    }
    if(isStudentSelected&&isOrganizationSelected){
        displayValidationError('Please select only one occupation.');
        return;
    }
    if(isEmployeeSelected&&isOrganizationSelected){
        displayValidationError('Please select only one occupation.');
        return;
    }
    if(isEmployeeSelected&&isStudentSelected){
        displayValidationError('Please select only one occupation.');
        return;
    }
    if(isEmployeeSelected&&isStudentSelected&&isOrganizationSelected){
        displayValidationError('Please select only one occupation.');
        return;
    }

    if (isStudentSelected) {
        currentStep = 2;
    } else if(isEmployeeSelected) {
        currentStep = 5;
    } else if (isOrganizationSelected) {
        currentStep = 7;
    }
    hideValidationError();

    showStep(currentStep);
});

nextBtnStep2.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    //validation

    student_university_name= document.getElementById('student_university_name').value
    student_gender= getCheckboxValue('student_gender')
    student_current_year= document.getElementById('student_current_year').value

    if(student_university_name==""){
        displayValidationError('Please enter your University Name');
        return;
    }
    if(student_gender==""){
        displayValidationError('Please select your gender');
        return;
    }

    if(student_current_year==""){
        displayValidationError('Please enter your current year');
        return;
    }

    if(student_current_year>5){
        displayValidationError('Please enter a valid year (1-5)');
        return;
    }

    currentStep = 3;
    hideValidationError();
    
    showStep(currentStep);
});

nextBtnStep3.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    student_work_experience= document.getElementById('student_work_experience').value;
    student_dob= document.getElementById('student_dob').value;
    
    if(student_work_experience==""){
        displayValidationError('Please enter your prior experience');
        return;
    }
    console.log(student_dob);
    if(student_dob==""){
        displayValidationError('Please enter your date of birth');
        return;
    }
    
    
   
    currentStep = 4;
    hideValidationError();
    showStep(currentStep);
});

nextBtnStep4.addEventListener('click', function (event) {
    event.preventDefault();
    const formData = gatherStudentFormData();
    student_email= document.getElementById('student_email').value
    student_password= document.getElementById('student_password').value
    student_password_confirmation= document.getElementById('student_password_confirmation').value
    
    if(student_email==""){
        displayValidationError('Please enter your email');
        return;
    }
    if(student_password=="" || student_password_confirmation==""){
        displayValidationError('Please enter a password');
        return;
    }
    if(student_password!==student_password_confirmation){
        displayValidationError('Please enter same password');
        return;
    }
    
    hideValidationError();
    submitStudentFormData(formData);
});

nextBtnStep5.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Button clicked');

    emp_org_name= document.getElementById('emp_org_name').value
    emp_position= document.getElementById('emp_position').value
    emp_work_experience= parseInt(document.getElementById('emp_work_experience').value)
    emp_gender= getCheckboxValue('emp_gender')

    if(emp_org_name==""){
        displayValidationError('Please enter your organisation name');
        return;
    }
    if(emp_position==""){
        displayValidationError('Please enter your position');
        return;
    }
   
    if(emp_work_experience==""){
        displayValidationError("Please indicate your work experience");
        return;
    }

    currentStep = 6;
    showStep(currentStep);
});

nextBtnStep6.addEventListener('click', function (event) {
    event.preventDefault();
    emp_industry_id= parseInt(document.getElementById('emp_industry').value)
    emp_email= document.getElementById('emp_email').value
    emp_password= document.getElementById('emp_password').value
    emp_password_confirmation= document.getElementById('emp_password_confirmation').value
    
    if(emp_industry_id==""){
        displayValidationError('Please enter your industry name');
        return;
    }
    if(emp_email==""){
        displayValidationError('Please enter your email');
        return;
    }
    if(emp_password=="" || emp_password_confirmation==""){
        displayValidationError('Please enter a password');
        return;
    }
   
    if(emp_password!==emp_password_confirmation){
        displayValidationError("Please enter matching passwords");
        return;
    }

    const formData = gatherEmployeeFormData();
    submitEmployeeFormData(formData);
});

nextBtnStep7.addEventListener('click', function(event) {
    event.preventDefault();
    org_industry_id= parseInt(document.getElementById('org_industry').value)
    org_country_id= parseInt(document.getElementById('org_country').value)
    org_email= document.getElementById('org_email').value
    org_password= document.getElementById('org_password').value
    org_password_confirmation= document.getElementById('org_password_confirmation').value
    if(org_industry_id==""){
        displayValidationError('Please enter your industry name');
        return;
    }
    if(org_country_id==""){
        displayValidationError('Please enter your country id');
        return;
    }
    if(org_email==""){
        displayValidationError('Please enter your email');
        return;
    }
    if(org_password=="" || org_password_confirmation==""){
        displayValidationError('Please enter a password');
        return;
    }
   
    if(org_password!==org_password_confirmation){
        displayValidationError("Please enter matching passwords");
        return;
    }


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

    console.log(formData['student_password']);

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

