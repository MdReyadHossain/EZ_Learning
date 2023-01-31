function valideditstudent(reg) {
    let fnameErr = document.getElementById("fnameErr");
    let lnameErr = document.getElementById("lnameErr");
    let dobErr = document.getElementById("dobErr");
    let phoneErr = document.getElementById("phoneErr");
    let relErr = document.getElementById("relErr");
    let emailErr = document.getElementById("emailErr");

    fnameErr.innerHTML = "";
    lnameErr.innerHTML = "";
    dobErr.innerHTML = "";
    phoneErr.innerHTML = "";
    relErr.innerHTML = "";
    emailErr.innerHTML = "";

    let firstname = reg.firstname.value;
    let lastname = reg.lastname.value;
    let dob = reg.dob.value;
    let phone = reg.phone.value;
    let religion = reg.religion.value;
    let email = reg.email.value;

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

    if (phone == "") {
        phoneErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (religion == "none") {
        relErr.innerHTML = "❗Must be selected.";
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
    } 

    else if (!validRegex.test(email)) {
        emailErr.innerHTML = "❗Invalid email format.";
        isvalid = false;
    }

    return isvalid;
}