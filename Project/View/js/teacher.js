function validteacher(valid) {
    let inputErr = document.getElementById("inputErr");
    let dobErr = document.getElementById("dobErr");
    let emailErr = document.getElementById("emailErr");
    inputErr.innerHTML = "";
    dobErr.innerHTML = "";
    emailErr.innerHTML = "";

    let name = valid.name.value;
    let gender = valid.gender.value;
    let dob = valid.dob.value;
    let phone = valid.phone.value;
    let email = valid.email.value;
    let isvalid = true;

    var date = new Date(dob);
    var currdate = new Date();
    
    if (name == "") {
        inputErr.innerHTML = "❗Input should not be empty.";
        isvalid = false;
    }
    if (gender == "") {
        inputErr.innerHTML = "❗Input should not be empty.";
        isvalid = false;
    }
    if (dob == "") {
        inputErr.innerHTML = "❗Input should not be empty.";
        isvalid = false;
    }
    else if ((currdate.getFullYear() - date.getFullYear()) < 18) {
        dobErr.innerHTML = "❌Not old enough, Must be 18 or older.";
        isvalid = false;
    }
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "") {
        inputErr.innerHTML = "❗Input should not be empty.";
        isvalid = false;
    } 
    else if (!validRegex.test(email)) {
        emailErr.innerHTML = "❗Invalid email format.";
        isvalid = false;
    }
    var validphone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if(phone == "") {
        inputErr.innerHTML = "❗Input should not be empty.";
        isvalid = false;
    }
    else if(!validphone.test(phone)) {
        inputErr.innerHTML = "❗Invalid contact number.";
        isvalid = false;
    }

    return isvalid;
}

function validchngpass(pass) {
    let currErr = document.getElementById("currErr");
    let newErr = document.getElementById("newErr");
    let reErr = document.getElementById("reErr");

    currErr.innerHTML = "";
    newErr.innerHTML = "";
    reErr.innerHTML = "";

    let currentpassword = pass.currentpassword.value;
    let newpassword = pass.newpassword.value;
    let retypepassword = pass.retypepassword.value;

    let isvalid = true;

    if (currentpassword == "") {
        currErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (newpassword == "") {
        newErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    else if(newpassword.length < 8) {
        newErr.innerHTML = "❌Password atleast 8 characters long.";
        isvalid = false;
    }

    if (retypepassword == "") {
        reErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    else if(newpassword !== retypepassword) {
        newErr.innerHTML = "❌Password not matched!";
        isvalid = false;
    }

    return isvalid;
}