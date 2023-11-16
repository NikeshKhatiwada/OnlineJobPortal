<?php
require_once '/JobPortal/Views/Shared/Menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/Job-style.css">
    <link rel="stylesheet" href="/Libraries/Css/My-profile.css">
    <script src="/Libraries/Javascript/Edit-profile.js"></script>
    <title>Candidate Edit Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form action="Candidate/UpdateProfile" method="post" enctype="multipart/form-data">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-8">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <img src="<?php echo $this->candidateInfo["cImage"]?>"
                                     alt="<?php echo $this->candidateInfo["cName"]. " Picture"?>"
                                     class="m-1" width="100">
                            </div>
                            <div class="job-title2">
                                <label for="candidate-name" class="d-block">
                                    <input id="candidate-name" class="form-control form-control-lg" type="text" maxlength="32" name="candidate-name"
                                           value="<?php echo $this->candidateInfo["cName"]?>"
                                           placeholder="Candidate Name" required autofocus>
                                </label>
                                <label for="candidate-image" class="d-block m-2">
                                    <input class="form-control form-control-sm" type="file" id="candidate-image" name="candidate-image" accept="image/jpeg">
                                </label>
                            </div>
                        </div>
                        <div class="justify-content-end d-grip gap-4">
                            <button class="btn" type="submit" value="submit">Save Edit</button>
                            <a href="<?php echo "Candidate/DeleteProfile?candidate-id=". $this->candidateInfo["cID"]?>"
                               class="text-danger text-decoration-none fs-5">Delete Profile</a>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <div class="small-section-title2">
                                <h4>Candidate Skills</h4>
                                <ul>
                                    <?php
                                    $i = 0;
                                    echo "<li>
                                            <input id='candidate-skill". ($i + 1). "'
                                                class='form-control candidate-skill mt-1 mb-1' type='text' maxlength='20'
                                                name='candidate-skill". ($i + 1). "'
                                                value='". $this->candidateSkill[$i]. "'
                                                placeholder='Skill ". ($i + 1). "' required>
                                        </li>";
                                    ++$i;
                                    while ($i < count($this->candidateSkill)) {
                                        echo "<li>
                                                <input id='candidate-skill". ($i + 1). "'
                                                    class='form-control candidate-skill mt-1 mb-1' type='text' maxlength='20'
                                                    name='candidate-skill". ($i + 1). "'
                                                    value='". $this->candidateSkill[$i]. "'
                                                    placeholder='Skill ". ($i + 1). "'>
                                            </li>";
                                        ++$i;
                                    }
                                    ?>
                                </ul>
                                <button id="add-candidate-skill" class="btn-outline-dark add-candidate-skill px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateSkill()">Add Skill</button>
                            </div>
                            <script>removeAddCandidateSkillButton()</script>
                            <div class="post-details2 mb-50">
                                <div class="small-section-title2">
                                    <h4>Candidate Education Level</h4>
                                </div>
                                <ul>
                                    <li>
                                        <select id="candidate-education" class="form-select-sm" name="candidate-education" required>
                                            <?php
                                            $candidateEducation = ["None", "Primary", "Secondary", "Bachelor", "Master", "Doctorate"];
                                            $i = 0;
                                            while ($i < count($candidateEducation)) {
                                                if($candidateEducation[$i] == $this->candidateInfo["cEduLevel"])
                                                    echo "<option value='". $candidateEducation[$i]. "' selected>". $candidateEducation[$i]. "</option>";
                                                else
                                                    echo "<option value='". $candidateEducation[$i]. "'>". $candidateEducation[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </select>
                                        <label for="candidate-education">Degree</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-details2 mb-50">
                                <div class="small-section-title2">
                                    <h4>Candidate Experience</h4>
                                </div>
                                <ul>
                                    <?php
                                    $i = 0;
                                    while ($i < count($this->candidateExperience)) {
                                        echo "<li>
                                                <input id='candidate-experience". ($i + 1). "-year'
                                                    class='form-control candidate-experience-year d-inline-block mt-2 mb-2' type='number' min='0' max='40' pattern='^\d+$'
                                                    name='candidate-experience". ($i + 1). "-year'
                                                    value='". $this->candidateExperience[$i]["candidateExperienceYear"]. "'
                                                    placeholder='Year for Experience ". ($i + 1). "'>
                                                <label for='candidate-experience". ($i + 1). "-year'>years experience in</label>
                                                <input id='candidate-experience". ($i + 1). "'
                                                    class='form-control candidate-experience d-inline-block mt-2 mb-2' type='text' maxlength='36'
                                                    name='candidate-experience". ($i + 1). "'
                                                    value='". $this->candidateExperience[$i]["candidateExperience"]. "'
                                                    placeholder='Experience ". ($i + 1). "'>
                                                <label for='candidate-experience". ($i + 1). "'>skill</label>
                                            </li>";
                                        ++$i;
                                    }
                                    ?>
                                </ul>
                                <button id="add-candidate-experience" class="btn-outline-dark add-candidate-experience px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateExperience()">Add Experience</button>
                            </div>
                            <script>removeAddCandidateExperienceButton()</script>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3 mb-50">
                        <div class="small-section-title2">
                            <h4>Basic Info</h4>
                        </div>
                        <ul>
                            <li>
                                <label for="candidate-gender" class="form-label">Gender:</label>
                                <span>
                                    <select id="candidate-gender" class="form-select-sm candidate-gender" name="candidate-gender" required>
                                        <?php
                                        $candidateGender = ["Male", "Female"];
                                        if($this->candidateInfo["cGender"] == "M") {
                                            echo "<option value='M' selected>". $candidateGender[0]. "</option>";
                                            echo "<option value='F'>". $candidateGender[1]. "</option>";
                                        }
                                        if($this->candidateInfo["cGender"] == "F") {
                                            echo "<option value='M'>". $candidateGender[0]. "</option>";
                                            echo "<option value='F' selected>". $candidateGender[1]. "</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="candidate-municipality" class="form-label">Municipality:</label>
                                <span>
                                    <input id="candidate-municipality" class="form-control form-control-sm" type="text" maxlength="16" name="candidate-municipality"
                                           value="<?php echo $this->candidateInfo["cMunicipality"]?>"
                                           placeholder="Municipality" required>
                                </span>
                            </li>
                            <li>
                                <label for="candidate-district" class="form-label">District:</label>
                                <span>
                                    <select id="candidate-district" class="form-select-sm candidate-district" name="candidate-district" required>
                                        <optgroup class="form-label" label="Province 1">
                                                <?php
                                                $candidateDistrict = ["Bhojpur", "Dhankuta", "Ilam", "Jhapa", "Khotang",
                                                    "Morang", "Okhaldhunga", "Panchthar", "Sankhuwasabha", "Solukhumbu",
                                                    "Sunsari", "Taplejung", "Tehrathum", "Udayapur"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 2">
                                                <?php
                                                $candidateDistrict = ["Parsa", "Bara", "Rautahat", "Sarlahi", "Dhanusha",
                                                    "Siraha", "Mahottari", "Saptari"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 3">
                                                <?php
                                                $candidateDistrict = ["Sindhuli", "Ramechhap", "Dolakha", "Bhaktapur", "Dhading",
                                                    "Kathmandu", "Kavrepalanchok", "Lalitpur", "Nuwakot", "Rasuwa",
                                                    "Sindhupalchok", "Chitwan", "Makwanpur"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 4">
                                                <?php
                                                $candidateDistrict = ["Baglung", "Gorkha", "Kaski", "Lamjung", "Manang",
                                                    "Mustang", "Myagdi", "Nawalpur", "Parbat", "Syangja",
                                                    "Tanahun"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 5">
                                                <?php
                                                $candidateDistrict = ["Kapilvastu", "Parasi", "Rupandehi", "Arghakhanchi", "Gulmi",
                                                    "Palpa", "Dang", "Pyuthan", "Rolpa", "East Rukum",
                                                    "Banke", "Bardiya"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 6">
                                                <?php
                                                $candidateDistrict = ["West Rukum", "Salyan", "Dolpa", "Humla", "Jumla",
                                                    "Kalikot", "Mugu", "Surkhet", "Dailekh", "Jajarkot"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 7">
                                                <?php
                                                $candidateDistrict = ["Kailali", "Achham", "Doti", "Bajhang", "Bajura",
                                                    "Kanchanpur", "Dadeldhura", "Baitadi", "Darchula"];
                                                $i = 0;
                                                while ($i < count($candidateDistrict)) {
                                                    if($candidateDistrict[$i] == $this->candidateInfo["cDistrict"])
                                                        echo "<option value='". $candidateDistrict[$i]. "' selected>". $candidateDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $candidateDistrict[$i]. "'>". $candidateDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="candidate-dob" class="form-label">Birth Date:</label>
                                <input id="candidate-dob" class="form-control form-control-sm candidate-dob" type="date" min="1908-06-05" max="2008-06-05" name="candidate-dob"
                                       value="<?php echo $this->candidateInfo["cBirthDate"]?>"
                                       required>
                            </li>
                        </ul>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Phones</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            echo "<li>
                                    <input id='candidate-phone". ($i + 1). "'
                                        class='form-control candidate-phone mt-2 mb-2' type='text' minlength='7' maxlength='13' pattern='^\d+$'
                                        name='candidate-phone". ($i + 1). "'
                                        value='". $this->candidatePhone[$i]. "'
                                        placeholder='Phone ". ($i + 1). "' required>
                                </li>";
                            ++$i;
                            while ($i < count($this->candidatePhone)) {
                                echo "<li>
                                        <input id='candidate-phone". ($i + 1). "'
                                            class='form-control candidate-phone mt-2 mb-2' type='text' minlength='7' maxlength='13' pattern='^\d+$'
                                            name='candidate-phone". ($i + 1). "'
                                            value='". $this->candidatePhone[$i]. "'
                                            placeholder='Phone ". ($i + 1). "'>
                                    </li>";;
                                ++$i;
                            }
                            ?>
                        </ul>
                        <button id="add-phone" class="btn-outline-dark add-phone px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidatePhone()">Add Phone</button>
                    </div>
                    <script>removeAddCandidatePhoneButton()</script>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Emails</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            echo "<li>
                                    <input id='candidate-email". ($i + 1). "'
                                        class='form-control candidate-email mt-2 mb-2' type='email' maxlength='46'
                                        name='candidate-email". ($i + 1). "'
                                        value='". $this->candidateEmail[$i]. "'
                                        placeholder='Email ". ($i + 1). "' required>
                                </li>";
                            ++$i;
                            while ($i < count($this->candidateEmail)) {
                                echo "<li>
                                        <input id='candidate-email". ($i + 1). "'
                                            class='form-control candidate-email mt-2 mb-2' type='email' maxlength='46'
                                            name='candidate-email". ($i + 1). "'
                                            value='". $this->candidateEmail[$i]. "'
                                            placeholder='Email ". ($i + 1). "'>
                                    </li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                        <button id="add-email" class="btn-outline-dark add-email px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateEmail()">Add Email</button>
                    </div>
                    <script>removeAddCandidateEmailButton()</script>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>