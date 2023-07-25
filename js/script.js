const send =() =>{
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    var alert1 = document.getElementById("alert1");
    // var alert2 = document.getElementById("alert2");

    var form= new FormData();
    form.append("name",name);
    form.append("email",email);
    form.append("subject",subject);
    form.append("message",message);

    fetch("sendEmailProcess.php", {
        method: "POST",
        body: form,
    })
        .then((resp) => resp.text())
        .then((resp) => {

            if (resp == "Success") {
                alert("Success send message");
                window.location = "contact.html";

            } else {
                alert(resp);
            }
        })
        .catch((e) => {
            console.log(e);
        })
};

const custom_alert=(text) =>{
    let alert1 = document.getElementById("snackbar");
    alert1.innerHTML = text;
    alert1.className = "show";
    // After 3 seconds, remove the show class from DIV
    setTimeout(() => {
        snackbar.className = snackbar.className.replace("show", "");
    }, 2000);

}

