function validnews(nande) {
    let news = nande.news.value;

    let isvalid = true;

    if (news == "") {
        alert("News and Events won't announce with empty box!");
        isvalid = false;
    }
    
    return isvalid;
}

function validchngpass(pass) {
    let passErr = document.getElementById("passErr");
    let currErr = document.getElementById("currErr");
    let newErr = document.getElementById("newErr");
    let reErr = document.getElementById("reErr");

    passErr.innerHTML = "";
    currErr.innerHTML = "";
    newErr.innerHTML = "";
    reErr.innerHTML = "";

    let currentpass = pass.currentpass.value;
    let newpassword = pass.newpassword.value;
    let repassword = pass.repassword.value;

    let isvalid = true;

    if (currentpass == "") {
        currErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (newpassword == "") {
        newErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    if (repassword == "") {
        reErr.innerHTML = "❗Should not be empty.";
        isvalid = false;
    }

    else if(newpassword !== repassword) {
        newErr.innerHTML = "❌Password not matched!";
        isvalid = false;
    }

    return isvalid;
}