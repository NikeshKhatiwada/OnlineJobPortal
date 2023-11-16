function addSkill() {
    let list = document.getElementsByClassName("job-skill");
    let listLength = list.length;
    if(listLength === 5) {
        let listButton = document.getElementById("add-job-skill");
        listButton.remove();
    }
    let listItem = document.createElement("li");
    let inputItem = document.createElement("input");
    inputItem.id = "job-skill" + (listLength + 1);
    inputItem.classList.add("form-control");
    inputItem.classList.add("job-skill");
    inputItem.classList.add("mt-1");
    inputItem.classList.add("mb-1");
    inputItem.type = "text";
    inputItem.maxLength = 20;
    inputItem.name = "job-skill" + (listLength + 1);
    inputItem.placeholder = "Skill " + (listLength + 1);
    listItem.appendChild(inputItem);
    list[listLength - 1].parentNode.parentNode.appendChild(listItem);
}