<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/Job-style.css">
    <link rel="stylesheet" href="/Libraries/Css/My-profile.css">
    <script src="/Libraries/Javascript/Create-profile.js"></script>
    <title>Candidate Creation Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form id="candidate-form" action="Candidate/InsertProfile" method="post" enctype="multipart/form-data">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-8">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="job-title2">
                                <label for="candidate-name" class="d-block">
                                    <input id="candidate-name" class="form-control form-control-lg" type="text" maxlength="32" name="candidate-name" placeholder="Candidate Name" required autofocus>
                                </label>
                                <label for="candidate-image" class="d-block m-2">
                                    <input class="form-control form-control-sm" type="file" id="candidate-image" name="candidate-image" accept="image/jpeg" required>
                                </label>
                            </div>
                        </div>
                        <div class="justify-content-end d-grip gap-4">
                            <button class="btn" type="submit" value="submit">Save Profile</button>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <div class="small-section-title2">
                                <h4>Candidate Password</h4>
                            </div>
                            <ul>
                                <li>
                                    <input id="candidate-password1" class="form-control candidate-password mt-1 mb-1" type="password" minlength="10" maxlength="20" name="candidate-password1" placeholder="Enter Password" required>
                                </li>
                                <li>
                                    <input id="candidate-password2" class="form-control candidate-password mt-1 mb-1" type="password" minlength="10" maxlength="20" name="candidate-password2" placeholder="Confirm Password" required>
                                </li>
                            </ul>
                            <span id="candidate-password-error" class="text-danger" hidden>Both passwords are not same.</span>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title2">
                                <h4>Candidate Skills</h4>
                                <ul>
                                    <li>
                                        <input id="candidate-skill1" class="form-control candidate-skill mt-1 mb-1" type="text" maxlength="20" name="candidate-skill1" placeholder="Skill 1" required>
                                    </li>
                                </ul>
                                <button id="add-candidate-skill" class="btn-outline-dark add-candidate-skill px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateSkill()">Add Skill</button>
                            </div>
                            <div class="post-details2 mb-50">
                                <div class="small-section-title2">
                                    <h4>Candidate Education Level</h4>
                                </div>
                                <ul>
                                    <li>
                                        <select id="candidate-education" class="form-select-sm" name="candidate-education" required>
                                            <option value="None">None</option>
                                            <option value="Primary">Primary</option>
                                            <option value="Secondary">Secondary</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Master">Master</option>
                                            <option value="Doctorate">Doctorate</option>
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
                                    <li>
                                        <input id="candidate-experience1-year" class="form-control candidate-experience-year d-inline-block mt-2 mb-2" type="number" min="0" max="40" pattern="^\d+$" name="candidate-experience1-year" placeholder="Year for Experience 1">
                                        <label for="candidate-experience1-year">years experience in</label>
                                        <input id="candidate-experience1" class="form-control candidate-experience d-inline-block mt-2 mb-2" type="text" maxlength="36" name="candidate-experience1" placeholder="Experience 1">
                                        <label for="candidate-experience1">skill</label>
                                    </li>
                                </ul>
                                <button id="add-candidate-experience" class="btn-outline-dark add-candidate-experience px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateExperience()">Add Experience</button>
                            </div>
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
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="candidate-municipality" class="form-label">Municipality:</label>
                                <span>
                                    <input id="candidate-municipality" class="form-control form-control-sm" type="text" maxlength="16" name="candidate-municipality" placeholder="Municipality" required>
                                </span>
                            </li>
                            <li>
                                <label for="candidate-district" class="form-label">District:</label>
                                <span>
                                    <select id="candidate-district" class="form-select-sm candidate-district" name="candidate-district" required>
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
                                <label for="candidate-dob" class="form-label">Birth Date:</label>
                                <input id="candidate-dob" class="form-control form-control-sm candidate-dob" type="date" min="1908-06-05" max="2008-06-05" name="candidate-dob" required>
                            </li>
                        </ul>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Phones</h4>
                        </div>
                        <ul>
                            <li>
                                <input id="candidate-phone1" class="form-control candidate-phone mt-2 mb-2" type="text" minlength="7" maxlength="13" pattern="^\d+$" name="candidate-phone1" placeholder="Phone 1" required>
                            </li>
                        </ul>
                        <button id="add-phone" class="btn-outline-dark add-phone px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidatePhone()">Add Phone</button>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Emails</h4>
                        </div>
                        <ul>
                            <li>
                                <input id="candidate-email1" class="form-control candidate-email mt-2 mb-2" type="email" maxlength="46" name="candidate-email1" placeholder="Email 1" required>
                            </li>
                        </ul>
                        <button id="add-email" class="btn-outline-dark add-email px-4 py-2 mt-2 mb-2" type="button" onclick="addCandidateEmail()">Add Email</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>