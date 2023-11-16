<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/Job-style.css">
    <link rel="stylesheet" href="/Libraries/Css/My-profile.css">
    <script src="/Libraries/Javascript/Create-profile.js"></script>
    <title>Agency Creation Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form id="agency-form" action="Agency/InsertProfile" method="post" enctype="multipart/form-data">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-8">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="job-title2">
                                <label for="agency-name" class="d-block">
                                    <input id="agency-name" class="form-control form-control-lg" type="text" maxlength="48" name="agency-name" placeholder="Agency Name" required autofocus>
                                </label>
                                <label for="agency-image" class="d-block m-2">
                                    <input class="form-control form-control-sm" type="file" id="agency-image" name="agency-image" accept="image/jpeg" required>
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
                                <h4>Agency Password</h4>
                            </div>
                            <ul>
                                <li>
                                    <input id="agency-password1" class="form-control agency-password mt-1 mb-1" type="password" minlength="10" maxlength="20" name="agency-password1" placeholder="Enter Password" required>
                                </li>
                                <li>
                                    <input id="agency-password2" class="form-control agency-password mt-1 mb-1" type="password" minlength="10" maxlength="20" name="agency-password2" placeholder="Confirm Password" required>
                                </li>
                            </ul>
                            <span id="agency-password-error" class="text-danger" hidden>Both passwords are not same.</span>
                        </div>
                        <div class="post-details2 mb-50">
                            <label for="agency-description" class="small-section-title2 form-label fs-4 fw-bold">Agency Description</label>
                            <textarea id="agency-description" class="form-control" rows="8" maxlength="500" name="agency-description" required></textarea>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title2">
                                <h4>Agency Type</h4>
                            </div>
                            <ul>
                                <li>
                                    <input id="agency-type1" class="form-control agency-type mt-1 mb-1" type="text" maxlength="24" name="agency-type1" placeholder="Type 1" required>
                                </li>
                            </ul>
                            <button id="add-agency-type" class="btn-outline-dark add-agency-type px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyType()">Add Type</button>
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
                                <label for="agency-city" class="form-label">City:</label>
                                <span>
                                    <input id="agency-city" class="form-control form-control-sm" type="text" maxlength="16" name="agency-city" placeholder="City" required>
                                </span>
                            </li>
                            <li>
                                <label for="agency-district" class="form-label">District:</label>
                                <span>
                                    <select id="agency-district" class="form-select-sm agency-district" name="agency-district" required>
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
                                <label for="agency-doe" class="form-label">Established Date:</label>
                                <input id="agency-doe" class="form-control form-control-sm agency-doe" type="date" min="1620-01-02" max="2021-01-02" name="agency-doe" required>
                            </li>
                        </ul>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Phones</h4>
                        </div>
                        <ul>
                            <li>
                                <input id="agency-phone1" class="form-control agency-phone mt-2 mb-2" type="text" minlength="7" maxlength="13" pattern="^\d+$" name="agency-phone1" placeholder="Phone 1" required>
                            </li>
                        </ul>
                        <button id="add-phone" class="btn-outline-dark add-phone px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyPhone()">Add Phone</button>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Emails</h4>
                        </div>
                        <ul>
                            <li>
                                <input id="agency-email1" class="form-control agency-email mt-2 mb-2" type="email" maxlength="46" name="agency-email1" placeholder="Email 1" required>
                            </li>
                        </ul>
                        <button id="add-email" class="btn-outline-dark add-email px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyEmail()">Add Email</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>