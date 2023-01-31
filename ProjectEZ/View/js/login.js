function validlogin(login) {
    let userErr = document.getElementById("userErr");
    let passErr = document.getElementById("passErr");

    userErr.innerHTML = "";
    passErr.innerHTML = "";

    let user = login.user.value;
    let pass = login.pass.value;

    let isvalid = true;
    let isEmpty = false;
    if(user === "") {
        userErr.innerHTML = "❗Username should not empty!";
        isvalid = false;
        isEmpty = true;
    }
    if(pass === "") {
        passErr.innerHTML = "❗Password should not empty!";
        isvalid = false;
        isEmpty = true;
    }
    return isvalid;
}