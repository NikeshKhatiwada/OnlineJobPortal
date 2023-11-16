function removeAddAgencyTypeButton() {
    let typeList = document.getElementsByClassName("agency-type");
    let typeListLength = typeList.length;
    if(typeListLength === 6) {
        let typeListButton = document.getElementById("add-agency-type");
        typeListButton.remove();
    }
}
function removeAddAgencyPhoneButton() {
    let phoneList = document.getElementsByClassName("agency-phone");
    let phoneListLength = phoneList.length;
    if(phoneListLength === 3) {
        let phoneListButton = document.getElementById("add-phone");
        phoneListButton.remove();
    }
}
function removeAddAgencyEmailButton() {
    let emailList = document.getElementsByClassName("agency-email");
    let emailListLength = emailList.length;
    if(emailListLength === 3) {
        let emailListButton = document.getElementById("add-email");
        emailListButton.remove();
    }
}
function addAgencyType() {
    let typeList = document.getElementsByClassName("agency-type");
    let typeListLength = typeList.length;
    if(typeListLength === 5) {
        let typeListButton = document.getElementById("add-agency-type");
        typeListButton.remove();
    }
    let typeListItem = document.createElement("li");
    let typeInputItem = document.createElement("input");
    typeInputItem.id = "agency-type" + (typeListLength + 1);
    typeInputItem.classList.add("form-control");
    typeInputItem.classList.add("agency-type");
    typeInputItem.classList.add("mt-1");
    typeInputItem.classList.add("mb-1");
    typeInputItem.type = "text";
    typeInputItem.maxLength = 24;
    typeInputItem.name = "agency-type" + (typeListLength + 1);
    typeInputItem.placeholder = "Type " + (typeListLength + 1);
    typeListItem.appendChild(typeInputItem);
    typeList[typeListLength - 1].parentNode.parentNode.appendChild(typeListItem);
}
function addAgencyPhone() {
    let phoneList = document.getElementsByClassName("agency-phone");
    let phoneListLength = phoneList.length;
    if(phoneListLength === 2) {
        let phoneListButton = document.getElementById("add-phone");
        phoneListButton.remove();
    }
    let phoneListItem = document.createElement("li");
    let phoneInputItem = document.createElement("input");
    phoneInputItem.id = "agency-phone" + (phoneListLength + 1);
    phoneInputItem.classList.add("form-control");
    phoneInputItem.classList.add("agency-phone");
    phoneInputItem.classList.add("mt-2");
    phoneInputItem.classList.add("mb-2");
    phoneInputItem.type = "text";
    phoneInputItem.minLength = 7;
    phoneInputItem.maxLength = 13;
    phoneInputItem.pattern = "^\\d+$";
    phoneInputItem.name = "agency-phone" + (phoneListLength + 1);
    phoneInputItem.placeholder = "Phone " + (phoneListLength + 1);
    phoneListItem.appendChild(phoneInputItem);
    phoneList[phoneListLength - 1].parentNode.parentNode.appendChild(phoneListItem);
}
function addAgencyEmail() {
    let emailList = document.getElementsByClassName("agency-email");
    let emailListLength = emailList.length;
    if(emailListLength === 2) {
        let emailListButton = document.getElementById("add-email");
        emailListButton.remove();
    }
    let emailListItem = document.createElement("li");
    let emailInputItem = document.createElement("input");
    emailInputItem.id = "agency-email" + (emailListLength + 1);
    emailInputItem.classList.add("form-control");
    emailInputItem.classList.add("agency-email");
    emailInputItem.classList.add("mt-2");
    emailInputItem.classList.add("mt-2");
    emailInputItem.type = "email";
    emailInputItem.maxLength = 46;
    emailInputItem.name = "agency-email" + (emailListLength + 1);
    emailInputItem.placeholder = "Email " + (emailListLength + 1);
    emailListItem.appendChild(emailInputItem);
    emailList[emailListLength - 1].parentNode.parentNode.appendChild(emailListItem);
}
function removeAddCandidateSkillButton() {
    let skillList = document.getElementsByClassName("candidate-skill");
    let skillListLength = skillList.length;
    if(skillListLength === 6) {
        let skillListButton = document.getElementById("add-candidate-skill");
        skillListButton.remove();
    }
}
function removeAddCandidateExperienceButton() {
    let experienceList = document.getElementsByClassName("candidate-experience");
    let experienceListLength = experienceList.length;
    if(experienceListLength === 3) {
        let experienceListButton = document.getElementById("add-candidate-experience");
        experienceListButton.remove();
    }
}
function removeAddCandidatePhoneButton() {
    let phoneList = document.getElementsByClassName("candidate-phone");
    let phoneListLength = phoneList.length;
    if(phoneListLength === 3) {
        let phoneListButton = document.getElementById("add-phone");
        phoneListButton.remove();
    }
}
function removeAddCandidateEmailButton() {
    let emailList = document.getElementsByClassName("candidate-email");
    let emailListLength = emailList.length;
    if(emailListLength === 3) {
        let emailListButton = document.getElementById("add-email");
        emailListButton.remove();
    }
}
function addCandidateSkill() {
    let skillList = document.getElementsByClassName("candidate-skill");
    let skillListLength = skillList.length;
    if(skillListLength === 5) {
        let skillListButton = document.getElementById("add-candidate-skill");
        skillListButton.remove();
    }
    let skillListItem = document.createElement("li");
    let skillInputItem = document.createElement("input");
    skillInputItem.id = "candidate-skill" + (skillListLength + 1);
    skillInputItem.classList.add("form-control");
    skillInputItem.classList.add("candidate-skill");
    skillInputItem.classList.add("mt-1");
    skillInputItem.classList.add("mb-1");
    skillInputItem.type = "text";
    skillInputItem.maxLength = 20;
    skillInputItem.name = "candidate-skill" + (skillListLength + 1);
    skillInputItem.placeholder = "Skill " + (skillListLength + 1);
    skillListItem.appendChild(skillInputItem);
    skillList[skillListLength - 1].parentNode.parentNode.appendChild(skillListItem);
}
function addCandidateExperience() {
    let experienceList = document.getElementsByClassName("candidate-experience");
    let experienceListLength = experienceList.length;
    if(experienceListLength === 2) {
        let experienceListButton = document.getElementById("add-candidate-experience");
        experienceListButton.remove();
    }
    let experienceListItem = document.createElement("li");
    let experienceYearInputItem = document.createElement("input");
    let experienceYearLabelItem = document.createElement("label");
    let experienceInputItem = document.createElement("input");
    let experienceLabelItem = document.createElement("label");
    experienceYearInputItem.id = "candidate-experience" + (experienceListLength + 1) + "-year";
    experienceYearInputItem.classList.add("form-control");
    experienceYearInputItem.classList.add("candidate-experience-year");
    experienceYearInputItem.classList.add("d-inline-block");
    experienceYearInputItem.classList.add("mt-2");
    experienceYearInputItem.classList.add("mb-2");
    experienceYearInputItem.type = "number";
    experienceYearInputItem.min = "0";
    experienceYearInputItem.max = "40";
    experienceYearInputItem.pattern = "^\\d+$";
    experienceYearInputItem.name = "candidate-experience" + (experienceListLength + 1) + "-year";
    experienceYearInputItem.placeholder = "Year for Experience " + (experienceListLength + 1);
    experienceYearLabelItem.htmlFor = "candidate-experience" + (experienceListLength + 1) + "-year";
    experienceYearLabelItem.innerText = " years experience in ";
    experienceInputItem.id = "candidate-experience" + (experienceListLength + 1);
    experienceInputItem.classList.add("form-control");
    experienceInputItem.classList.add("candidate-experience");
    experienceInputItem.classList.add("d-inline-block");
    experienceInputItem.classList.add("mt-2");
    experienceInputItem.classList.add("mb-2");
    experienceInputItem.type = "text";
    experienceInputItem.maxLength = 36;
    experienceInputItem.name = "candidate-experience" + (experienceListLength + 1);
    experienceInputItem.placeholder = "Experience " + (experienceListLength + 1);
    experienceLabelItem.htmlFor = "candidate-experience" + (experienceListLength + 1);
    experienceLabelItem.innerText = " skill";
    experienceListItem.appendChild(experienceYearInputItem);
    experienceListItem.appendChild(experienceYearLabelItem);
    experienceListItem.appendChild(experienceInputItem);
    experienceListItem.appendChild(experienceLabelItem);
    experienceList[experienceListLength - 1].parentNode.parentNode.appendChild(experienceListItem);
}
function addCandidatePhone() {
    let phoneList = document.getElementsByClassName("candidate-phone");
    let phoneListLength = phoneList.length;
    if(phoneListLength === 2) {
        let phoneListButton = document.getElementById("add-phone");
        phoneListButton.remove();
    }
    let phoneListItem = document.createElement("li");
    let phoneInputItem = document.createElement("input");
    phoneInputItem.id = "candidate-phone" + (phoneListLength + 1);
    phoneInputItem.classList.add("form-control");
    phoneInputItem.classList.add("candidate-phone");
    phoneInputItem.classList.add("mt-2");
    phoneInputItem.classList.add("mb-2");
    phoneInputItem.type = "text";
    phoneInputItem.minLength = 7;
    phoneInputItem.maxLength = 13;
    phoneInputItem.pattern = "^\\d+$";
    phoneInputItem.name = "candidate-phone" + (phoneListLength + 1);
    phoneInputItem.placeholder = "Phone " + (phoneListLength + 1);
    phoneListItem.appendChild(phoneInputItem);
    phoneList[phoneListLength - 1].parentNode.parentNode.appendChild(phoneListItem);
}
function addCandidateEmail() {
    let emailList = document.getElementsByClassName("candidate-email");
    let emailListLength = emailList.length;
    if(emailListLength === 2) {
        let emailListButton = document.getElementById("add-email");
        emailListButton.remove();
    }
    let emailListItem = document.createElement("li");
    let emailInputItem = document.createElement("input");
    emailInputItem.id = "candidate-email" + (emailListLength + 1);
    emailInputItem.classList.add("form-control");
    emailInputItem.classList.add("candidate-email");
    emailInputItem.classList.add("mt-2");
    emailInputItem.classList.add("mt-2");
    emailInputItem.type = "email";
    emailInputItem.maxLength = 46;
    emailInputItem.name = "candidate-email" + (emailListLength + 1);
    emailInputItem.placeholder = "Email " + (emailListLength + 1);
    emailListItem.appendChild(emailInputItem);
    emailList[emailListLength - 1].parentNode.parentNode.appendChild(emailListItem);
}