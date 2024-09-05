
let loginbtn= document.getElementById('loginbtn');


loginbtn.addEventListener('click', function(event) {
    event.preventDefault(); 
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if (email == "" || password == "") {
        alert('Please fill out the fields');
        return; 
    } else {
        let form = document.getElementById('loginform'); 
        form.submit(); 
    }
});