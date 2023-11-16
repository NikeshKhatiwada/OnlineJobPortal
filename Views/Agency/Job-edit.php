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
    <link rel="stylesheet" href="/Libraries/Css/My-job.css">
    <script src="/Libraries/Javascript/Edit-job.js"></script>
    <title>Job Edit Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form action="<?php
        echo 'Agency/UpdateJob?job-id='. $this->jobInfo['jID']
        ?>" method="post">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-8">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                     alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>"
                                     class="m-1" width="100">
                            </div>
                            <div class="job-title">
                                <label for="job-title" class="d-block">
                                    <input id="job-title" class="form-control form-control-lg" type="text" maxlength="40" name="job-title"
                                           value="<?php echo $this->jobInfo["jName"]?>"
                                           placeholder="Job Title" required autofocus>
                                </label>
                                <span class="d-inline-block pt-10 pb-10">
                                    <?php echo $this->agencyInfo["aName"]?>
                                </span>
                            </div>
                        </div>
                        <div class="justify-content-end d-grid gap-4">
                            <button class="btn" type="submit" value="submit">Save Edit</button>
                            <a href="<?php echo "Agency/DeleteJob?job-id=". $this->jobInfo["jID"] ?>" class="text-danger text-decoration-none fs-5">Delete Vacancy</a>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <label for="job-info" class="small-section-title form-label fs-4 fw-bold">Job Description</label>
                            <textarea id="job-info" class="form-control" rows="10" maxlength="600" name="job-info" required><?php echo $this->jobInfo["jDescription"]?></textarea>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title">
                                <h4>Required Skills</h4>
                                <script>removeAddSkill()</script>
                            </div>
                            <ul>
                                <?php
                                $i = 0;
                                echo "<li>
                                        <input id='job-skill". ($i + 1). "'
                                           class='form-control job-skill mt-1 mb-1' type='text' maxlength='20'
                                           name='job-skill". ($i + 1). "'
                                           value='". $this->jobSkill[$i]. "'
                                           placeholder='Skill ". ($i + 1). "' required>
                                    </li>";
                                ++$i;
                                while ($i < count($this->jobSkill)) {
                                    echo "<li>
                                        <input id='job-skill". ($i + 1). "'
                                           class='form-control job-skill mt-1 mb-1' type='text' maxlength='20'
                                           name='job-skill". ($i + 1). "'
                                           value='". $this->jobSkill[$i]. "'
                                           placeholder='Skill ". ($i + 1). "'>
                                    </li>";
                                    ++$i;
                                }
                                ?>
                            </ul>
                            <button id="add-job-skill" class="btn-outline-dark add-job-skill px-4 py-2 mt-2" type="button" onclick="addSkill()">Add Skill</button>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title">
                                <h4>Education and Experience</h4>
                            </div>
                            <ul>
                                <li>
                                    <select id="job-education" class="form-select-sm" name="job-education" required>
                                        <?php
                                        $jobEducation = ["None", "Primary", "Secondary", "Bachelor", "Master", "Doctorate"];
                                        $i = 0;
                                        while ($i < count($jobEducation)) {
                                            if($jobEducation[$i] == $this->jobInfo["jEduLevel"])
                                                echo "<option value='". $jobEducation[$i]. "' selected>". $jobEducation[$i]. "</option>";
                                            else
                                                echo "<option value='". $jobEducation[$i]. "'>". $jobEducation[$i]. "</option>";
                                            ++$i;
                                        }
                                        ?>
                                    </select>
                                    <label for="job-education">Degree or Higher</label>
                                </li>
                                <li>
                                    <input id="job-experience" class="form-control job-experience d-inline-block mt-2 mb-2" type="number" min="0" max="20" pattern="^\d+$" name="job-experience"
                                           value="<?php echo $this->jobInfo["jExperienceYear"]?>"
                                           placeholder="Year" required>
                                    <label for="job-experience">years experience needed</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3 mb-50">
                        <div class="small-section-title">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>
                                <label for="job-type" class="form-label">Type:</label>
                                <span>
                                    <select id="job-type" class="form-select-sm job-type" type="text" name="job-type" required>
                                        <?php
                                        $jobType = ["Full Time Job", "Part Time Job",
                                            "Temporary Part Time Job", "Temporary Full Time Job"];
                                        $i = 0;
                                        while ($i < count($jobType)) {
                                            if($jobType[$i] == $this->jobInfo["jType"])
                                                echo "<option value='". $jobType[$i]. "' selected>". $jobType[$i]. "</option>";
                                            else
                                                echo "<option value='". $jobType[$i]. "'>". $jobType[$i]. "</option>";
                                            ++$i;
                                        }
                                        ?>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="job-city" class="form-label">City:</label>
                                <span>
                                    <input id="job-city" class="form-control form-control-sm" type="text" maxlength="16" name="job-city"
                                           value="<?php echo $this->jobInfo["jCity"]?>"
                                           placeholder="City" required>
                                </span>
                            </li>
                            <li>
                                <label for="job-district" class="form-label">District:</label>
                                <span>
                                    <select id="job-district" class="form-select-sm job-district" name="job-district" required>
                                        <optgroup class="form-label" label="Province 1">
                                            <?php
                                            $jobDistrict = ["Bhojpur", "Dhankuta", "Ilam", "Jhapa", "Khotang",
                                                "Morang", "Okhaldhunga", "Panchthar", "Sankhuwasabha", "Solukhumbu",
                                                "Sunsari", "Taplejung", "Tehrathum", "Udayapur"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 2">
                                            <?php
                                            $jobDistrict = ["Parsa", "Bara", "Rautahat", "Sarlahi", "Dhanusha",
                                                "Siraha", "Mahottari", "Saptari"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 3">
                                            <?php
                                            $jobDistrict = ["Sindhuli", "Ramechhap", "Dolakha", "Bhaktapur", "Dhading",
                                                "Kathmandu", "Kavrepalanchok", "Lalitpur", "Nuwakot", "Rasuwa",
                                                "Sindhupalchok", "Chitwan", "Makwanpur"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 4">
                                            <?php
                                            $jobDistrict = ["Baglung", "Gorkha", "Kaski", "Lamjung", "Manang",
                                                "Mustang", "Myagdi", "Nawalpur", "Parbat", "Syangja",
                                                "Tanahun"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 5">
                                            <?php
                                            $jobDistrict = ["Kapilvastu", "Parasi", "Rupandehi", "Arghakhanchi", "Gulmi",
                                                "Palpa", "Dang", "Pyuthan", "Rolpa", "East Rukum",
                                                "Banke", "Bardiya"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 6">
                                            <?php
                                            $jobDistrict = ["West Rukum", "Salyan", "Dolpa", "Humla", "Jumla",
                                                "Kalikot", "Mugu", "Surkhet", "Dailekh", "Jajarkot"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 7">
                                            <?php
                                            $jobDistrict = ["Kailali", "Achham", "Doti", "Bajhang", "Bajura",
                                                "Kanchanpur", "Dadeldhura", "Baitadi", "Darchula"];
                                            $i = 0;
                                            while ($i < count($jobDistrict)) {
                                                if($jobDistrict[$i] == $this->jobInfo["jDistrict"])
                                                    echo "<option value='". $jobDistrict[$i]. "' selected>". $jobDistrict[$i]. "</option>";
                                                else
                                                    echo "<option value='". $jobDistrict[$i]. "'>". $jobDistrict[$i]. "</option>";
                                                ++$i;
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="job-salary" class="form-label">Salary/m:</label>
                                <span>
                                    <input id="job-salary" class="form-control form-control-sm job-salary" type="number" min="20000" step="1000" pattern="^\d+$" name="job-salary"
                                           value="<?php echo $this->jobInfo["jSalary"]?>"
                                           placeholder="Salary in Rs." required>
                                </span>
                            </li>
                            <li>
                                <label for="job-deadline" class="form-label">Deadline:</label>
                                <span>
                                    <input id="job-deadline" class="form-control form-control-sm job-date" type="date" min="2021-06-05" max="2022-06-05" name="job-deadline"
                                           value="<?php echo $this->jobInfo["jDeadline"]?>"
                                           required>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>