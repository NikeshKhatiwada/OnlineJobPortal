function showAgencyRegistrationLink() {
    document.getElementById("register-agency").style.display = "inline";
}
function changeRegistrationLink() {
    let selection = document.getElementById("user");
    let selectedItem = selection.options[selection.selectedIndex].value;
    if(selectedItem === "agency") {
        document.getElementById("register-agency").style.display = "inline";
        document.getElementById("register-candidate").style.display = "none";
    }
    else if(selectedItem === "candidate") {
        document.getElementById("register-agency").style.display = "none";
        document.getElementById("register-candidate").style.display = "inline";
    }
}