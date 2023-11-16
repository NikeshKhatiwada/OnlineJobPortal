function showJobAvailability() {
    let selection = document.getElementById("vacancyType");
    let selectedItem = selection.options[selection.selectedIndex].value;
    let jobStatusItem = document.getElementsByClassName("job-status");
    let i = 0;
    let jobStatus = [];
    while(i < jobStatusItem.length) {
        jobStatus[i] = jobStatusItem[i].innerText;
        ++i;
    }
    if(selectedItem === "all") {
        i = 0;
        while (i < jobStatus.length) {
            jobStatusItem[i].parentNode.parentNode.parentNode.style.display = "block";
            ++i;
        }
    }
    if(selectedItem === "available") {
        i = 0;
        while (i < jobStatus.length) {
            if(jobStatus[i] == "Available")
                jobStatusItem[i].parentNode.parentNode.parentNode.style.display = "block";
            else
                jobStatusItem[i].parentNode.parentNode.parentNode.style.display = "none";
            ++i;
        }
    }
    if(selectedItem === "expired") {
        i = 0;
        while (i < jobStatus.length) {
            if(jobStatus[i] == "Expired")
                jobStatusItem[i].parentNode.parentNode.parentNode.style.display = "block";
            else
                jobStatusItem[i].parentNode.parentNode.parentNode.style.display = "none";
            ++i;
        }
    }
}