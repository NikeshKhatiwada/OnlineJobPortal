function showApplicationStatus() {
    let selection = document.getElementById("appStatus");
    let selectedItem = selection.options[selection.selectedIndex].value;
    let applicationStatusItem = document.getElementsByClassName("app-status");
    let i = 0;
    let applicationStatus = [];
    while (i < applicationStatusItem.length) {
        applicationStatus[i] = applicationStatusItem[i].innerText;
        ++i;
    }
    if(selectedItem === "all") {
        i = 0;
        while (i < applicationStatus.length) {
            applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "block";
            ++i;
        }
    }
    if(selectedItem === "pending") {
        i = 0;
        while (i < applicationStatus.length) {
            if(applicationStatus[i] == "Pending")
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "block";
            else
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "none";
            ++i;
        }
    }
    if(selectedItem === "accepted") {
        i = 0;
        while (i < applicationStatus.length) {
            if(applicationStatus[i] == "Accepted")
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "block";
            else
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "none";
            ++i;
        }
    }
    if(selectedItem === "rejected") {
        i = 0;
        while (i < applicationStatus.length) {
            if(applicationStatus[i] == "Rejected")
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "block";
            else
                applicationStatusItem[i].parentNode.parentNode.parentNode.parentNode.style.display = "none";
            ++i;
        }
    }
}