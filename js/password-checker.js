const form = document.querySelector("form");
const password = document.getElementById("pword");
const confirmPassword = document.getElementById("pword2");
const strengthFill = document.getElementById("strength-fill");

password.addEventListener("input", validatePassword);
confirmPassword.addEventListener("input", validatePassword);

form.addEventListener("submit", function(e){

    if(!validatePassword()){
        alert("Lösenordet uppfyller inte kraven.");
        e.preventDefault();
    }

});

function validatePassword(){

    let pass1 = password.value;
    let pass2 = confirmPassword.value;

    let score = 0;

    let lengthOk = pass1.length >= 12;
    let upperLowerOk = /[a-z]/.test(pass1) && /[A-Z]/.test(pass1);
    let numberOk = /[0-9]/.test(pass1);
    let symbolOk = /[^A-Za-z0-9]/.test(pass1);
    let matchOk = pass1 !== "" && pass1 === pass2;

    updateRule("rule-length", lengthOk);
    updateRule("rule-upperlower", upperLowerOk);
    updateRule("rule-number", numberOk);
    updateRule("rule-symbol", symbolOk);
    updateRule("rule-match", matchOk);

    if(lengthOk) score++;
    if(upperLowerOk) score++;
    if(numberOk) score++;
    if(symbolOk) score++;

    updateBar(score);

    return lengthOk && upperLowerOk && numberOk && symbolOk && matchOk;
}

function updateRule(id, passed){

    const el = document.getElementById(id);
    const text = el.dataset.label;

    if(passed){
        el.innerHTML =
            "<i class='fa-sharp fa-light fa-circle-check'></i> " + text;
    } else {
        el.innerHTML =
            "<i class='fa-sharp fa-light fa-circle-xmark'></i> " + text;
    }
}

function updateBar(score){

    let width = (score / 4) * 100;
    strengthFill.style.width = width + "%";

    if(score <= 1){
        strengthFill.style.background = "red";
    }
    else if(score <= 3){
        strengthFill.style.background = "orange";
    }
    else{
        strengthFill.style.background = "green";
    }
}