function validregistration(reg) {
    let fnameErr = document.getElementById("fnameErr");
    let lnameErr = document.getElementById("lnameErr");
    let preErr = document.getElementById("preErr");
    let genderErr = document.getElementById("genderErr");
    let dobErr = document.getElementById("dobErr");
    let relErr = document.getElementById("relErr");
    let emailErr = document.getElementById("emailErr");
    let userErr = document.getElementById("userErr");
    let passErr = document.getElementById("passErr");
    let conpassErr = document.getElementById("conpassErr");

    fnameErr.innerHTML = "";
    lnameErr.innerHTML = "";
    dobErr.innerHTML = "";
    genderErr.innerHTML = "";
    relErr.innerHTML = "";
    preErr.innerHTML = "";
    emailErr.innerHTML = "";
    userErr.innerHTML = "";
    conpassErr.innerHTML = "";

    let firstname = reg.firstname.value;
    let lastname = reg.lastname.value;
    let gender = reg.gender.value;
    let dob = reg.dob.value;
    let religion = reg.religion.value;
    let preaddress = reg.preaddress.value;
    let email = reg.email.value;
    let username = reg.username.value;
    let password = reg.password.value;
    let conpassword = reg.conpassword.value;

    let isvalid = true;

    var date = new Date(dob);
    var currdate = new Date();

    if (firstname == "") {
        fnameErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    if (lastname == "") {
        lnameErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (religion == "none") {
        relErr.innerHTML = "❗Must be selected.";
        isvalid = false;
    }

    if (gender == "") {
        genderErr.innerHTML = "❗Must be selected.";
        isvalid = false;
    }

    if (preaddress == "") {
        preErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    if (dob == "") {
        dobErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    } else if ((currdate.getFullYear() - date.getFullYear()) < 5) {
        dobErr.innerHTML = "❌Not old enough, Must be 5 or older.";
        isvalid = false;
    }

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "") {
        emailErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    } else if (!validRegex.test(email)) {
        emailErr.innerHTML = "❗Invalid email format.";
        isvalid = false;
    }
    if (username == "") {
        userErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    } 
    
    else if (username.length > 8) {
        userErr.innerHTML = "❌Username up to 8 characters long.";
        isvalid = false;
    }

    if (password == "") {
        passErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (conpassword == "") {
        conpassErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    } 
    
    if (conpassword !== password) {
        passErr.innerHTML = "❗Not matched.";
        isvalid = false;
    }

    return isvalid;
}

function validteacher(reg) {
    let nameErr = document.getElementById("nameErr");
    let dobErr = document.getElementById("dobErr");
    let emailErr = document.getElementById("emailErr");
    let genderErr = document.getElementById("genderErr");
    let phoneErr = document.getElementById("phoneErr");
    let userErr = document.getElementById("userErr");
    let passErr = document.getElementById("passErr");
    let conpassErr = document.getElementById("conpassErr");

    nameErr.innerHTML = "";
    dobErr.innerHTML = "";
    emailErr.innerHTML = "";
    genderErr.innerHTML = "";
    phoneErr.innerHTML = "";
    userErr.innerHTML = "";
    conpassErr.innerHTML = "";

    let name = reg.name.value;
    let gender = reg.gender.value;
    let dob = reg.dob.value;
    let email = reg.email.value;
    let phone = reg.phone.value;
    let username = reg.username.value;
    let password = reg.password.value;
    let confirmpassword = reg.conpassword.value;

    let isvalid = true;

    var date = new Date(dob);
    var currdate = new Date();

    if(name == "") {
        nameErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if(gender == "") {
        genderErr.innerHTML = "❗Must be selected.";
        isvalid = false;
    }

    var validphone = /^[0-9]$/;
    if(phone == "") {
        phoneErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    // else if(!validphone.test(phone)) {
    //     phoneErr.innerHTML = "❗Invalid contact number.";
    //     isvalid = false;
    // }

    if(dob == "") {
        dobErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    else if((currdate.getFullYear()-date.getFullYear()) < 18) {
        dobErr.innerHTML = "❌Not old enough, Must be 18 or older.";
        isvalid = false;
    }

    var validemail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(email == "") {
        emailErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }
    else if(!validemail.test(email)) {
        emailErr.innerHTML = "❗Invalid email format.";
        isvalid = false;
    }

    if(username == "") {
        userErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    else if(username.length > 8) {
        userErr.innerHTML = "❌Username up to 8 characters long.";
        isvalid = false;
    }

    if(password == "") {
        passErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if(confirmpassword == "") {
        conpassErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if(confirmpassword !== password) {
        passErr.innerHTML = "❗Not matched.";
        isvalid = false;
    }

    return isvalid;
}