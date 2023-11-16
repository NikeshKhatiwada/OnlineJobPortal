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
    <script src="/Libraries/Javascript/Create-job.js"></script>
    <title>Job Creation Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form action="Agency/InsertJob" method="post">
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
                                    <input id="job-title" class="form-control form-control-lg" type="text" maxlength="40" name="job-title" placeholder="Job Title" required autofocus>
                                </label>
                                <span class="d-inline-block pt-10 pb-10">
                                    <?php echo $this->agencyInfo["aName"]?>
                                </span>
                            </div>
                        </div>
                        <div class="justify-content-end d-grip gap-4">
                            <button class="btn" type="submit" value="submit">Save Job</button>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <label for="job-info" class="small-section-title form-label fs-4 fw-bold">Job Description</label>
                            <textarea id="job-info" class="form-control" rows="10" maxlength="600" name="job-info" required></textarea>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title">
                                <h4>Required Skills</h4>
                            </div>
                            <ul>
                                <li>
                                    <input id="job-skill1" class="form-control job-skill mt-1 mb-1" type="text" maxlength="20" name="job-skill1" placeholder="Skill 1" required>
                                </li>
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
                                        <option value="None">None</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                        <option value="Doctorate">Doctorate</option>
                                    </select>
                                    <label for="job-education">Degree or Higher</label>
                                </li>
                                <li>
                                    <input id="job-experience" class="form-control job-experience d-inline-block mt-2 mb-2" type="number" min="0" max="20" pattern="^\d+$" name="job-experience" placeholder="Year" required>
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
                                        <option value="Full Time Job">Full Time Job</option>
                                        <option value="Part Time Job">Part Time Job</option>
                                        <option value="Temporary Part Time Job">Temporary Part Time Job</option>
                                        <option value="Temporary Full Time Job">Temporary Full Time Job</option>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="job-city" class="form-label">City:</label>
                                <span>
                                    <input id="job-city" class="form-control form-control-sm" type="text" maxlength="16" name="job-city" placeholder="City" required>
                                </span>
                            </li>
                            <li>
                                <label for="job-district" class="form-label">District:</label>
                                <span>
                                    <select id="job-district" class="form-select-sm job-district" name="job-district" required>
                                        <optgroup class="form-label" label="Province 1">
                                            <option value="Bhojpur">Bhojpur</option>
                                            <option value="Dhankuta">Dhankuta</option>
                                            <option value="Ilam">Ilam</option>
                                            <option value="Jhapa">Jhapa</option>
                                            <option value="Khotang">Khotang</option>
                                            <option value="Morang">Morang</option>
                                            <option value="Okhaldhunga">Okhaldhunga</option>
                                            <option value="Panchthar">Panchthar</option>
                                            <option value="Sankhuwasabha">Sankhuwasabha</option>
                                            <option value="Solukhumbu">Solukhumbu</option>
                                            <option value="Sunsari">Sunsari</option>
                                            <option value="Taplejung">Taplejung</option>
                                            <option value="Tehrathum">Tehrathum</option>
                                            <option value="Udayapur">Udayapur</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 2">
                                            <option value="Parsa">Parsa</option>
                                            <option value="Bara">Bara</option>
                                            <option value="Rautahat">Rautahat</option>
                                            <option value="Sarlahi">Sarlahi</option>
                                            <option value="Dhanusha">Dhanusha</option>
                                            <option value="Siraha">Siraha</option>
                                            <option value="Mahottari">Mahottari</option>
                                            <option value="Saptari">Saptari</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 3">
                                            <option value="Sindhuli">Sindhuli</option>
                                            <option value="Ramechhap">Ramechhap</option>
                                            <option value="Dolakha">Dolakha</option>
                                            <option value="Bhaktapur">Bhaktapur</option>
                                            <option value="Dhading">Dhading</option>
                                            <option value="Kathmandu" selected>Kathmandu</option>
                                            <option value="Kavrepalanchok">Kavrepalanchok</option>
                                            <option value="Lalitpur">Lalitpur</option>
                                            <option value="Nuwakot">Nuwakot</option>
                                            <option value="Rasuwa">Rasuwa</option>
                                            <option value="Sindhupalchok">Sindhupalchok</option>
                                            <option value="Chitwan">Chitwan</option>
                                            <option value="Makwanpur">Makwanpur</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 4">
                                            <option value="Baglung">Baglung</option>
                                            <option value="Gorkha">Gorkha</option>
                                            <option value="Kaski">Kaski</option>
                                            <option value="Lamjung">Lamjung</option>
                                            <option value="Manang">Manang</option>
                                            <option value="Mustang">Mustang</option>
                                            <option value="Myagdi">Myagdi</option>
                                            <option value="Nawalpur">Nawalpur</option>
                                            <option value="Parbat">Parbat</option>
                                            <option value="Syangja">Syangja</option>
                                            <option value="Tanahun">Tanahun</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 5">
                                            <option value="Kapilvastu">Kapilvastu</option>
                                            <option value="Parasi">Parasi</option>
                                            <option value="Rupandehi">Rupandehi</option>
                                            <option value="Arghakhanchi">Arghakhanchi</option>
                                            <option value="Gulmi">Gulmi</option>
                                            <option value="Palpa">Palpa</option>
                                            <option value="Dang">Dang</option>
                                            <option value="Pyuthan">Pyuthan</option>
                                            <option value="Rolpa">Rolpa</option>
                                            <option value="East Rukum">East Rukum</option>
                                            <option value="Banke">Banke</option>
                                            <option value="Bardiya">Bardiya</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 6">
                                            <option value="West Rukum">West Rukum</option>
                                            <option value="Salyan">Salyan</option>
                                            <option value="Dolpa">Dolpa</option>
                                            <option value="Humla">Humla</option>
                                            <option value="Jumla">Jumla</option>
                                            <option value="Kalikot">Kalikot</option>
                                            <option value="Mugu">Mugu</option>
                                            <option value="Surkhet">Surkhet</option>
                                            <option value="Dailekh">Dailekh</option>
                                            <option value="Jajarkot">Jajarkot</option>
                                        </optgroup>
                                        <optgroup class="form-label" label="Province 7">
                                            <option value="Kailali">Kailali</option>
                                            <option value="Achham">Achham</option>
                                            <option value="Doti">Doti</option>
                                            <option value="Bajhang">Bajhang</option>
                                            <option value="Bajura">Bajura</option>
                                            <option value="Kanchanpur">Kanchanpur</option>
                                            <option value="Dadeldhura">Dadeldhura</option>
                                            <option value="Baitadi">Baitadi</option>
                                            <option value="Darchula">Darchula</option>
                                        </optgroup>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="job-salary" class="form-label">Salary/m:</label>
                                <span>
                                    <input id="job-salary" class="form-control form-control-sm job-salary" type="number" min="20000" step="1000" pattern="^\d+$" name="job-salary" placeholder="Salary in Rs." required>
                                </span>
                            </li>
                            <li>
                                <label for="job-deadline" class="form-label">Deadline:</label>
                                <span>
                                    <input id="job-deadline" class="form-control form-control-sm job-date" type="date" min="2021=06-05" name="job-deadline" required>
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