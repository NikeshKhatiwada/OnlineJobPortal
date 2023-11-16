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
    <title>Agency Edit Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <form action="Agency/UpdateProfile" method="post" enctype="multipart/form-data">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-8">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                     alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>" class="m-1" width="100">
                            </div>
                            <div class="job-title2">
                                <label for="agency-name" class="d-block">
                                    <input id="agency-name" class="form-control form-control-lg" type="text" maxlength="48" name="agency-name"
                                           value="<?php echo $this->agencyInfo["aName"]?>"
                                           placeholder="Agency Name" required autofocus>
                                </label>
                                <label for="agency-image" class="d-block m-2">
                                    <input class="form-control form-control-sm" type="file" id="agency-image" name="agency-image" accept="image/jpeg">
                                </label>
                            </div>
                        </div>
                        <div class="justify-content-end d-grip gap-4">
                            <button class="btn" type="submit" value="submit">Save Edit</button>
                            <a href="<?php echo "Agency/DeleteProfile?agency-id=". $this->agencyInfo["aID"]?>"
                               class="text-danger text-decoration-none fs-5">Delete Profile</a>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <label for="agency-description" class="small-section-title2 form-label fs-4 fw-bold">Agency Description</label>
                            <textarea id="agency-description" class="form-control" rows="8" maxlength="500" name="agency-description" required><?php echo $this->agencyInfo["aDescription"]?></textarea>
                        </div>
                        <div class="post-details2 mb-50">
                            <div class="small-section-title2">
                                <h4>Agency Type</h4>
                            </div>
                            <ul>
                                <?php
                                $i = 0;
                                echo "<li>
                                        <input id='agency-type". ($i + 1). "'
                                            class='form-control agency-type mt-1 mb-1' type='text' maxlength='24'
                                            name='agency-type". ($i + 1). "'
                                            value='". $this->agencyType[$i]. "'
                                            placeholder='Type ". ($i + 1). "' required>
                                    </li>";
                                ++$i;
                                while ($i < count($this->agencyType)) {
                                    echo "<li>
                                            <input id='agency-type". ($i + 1). "'
                                                class='form-control agency-type mt-1 mb-1' type='text' maxlength='24'
                                                name='agency-type". ($i + 1). "'
                                                value='". $this->agencyType[$i]. "'
                                                placeholder='Type ". ($i + 1). "'>
                                        </li>";
                                    ++$i;
                                }
                                ?>
                            </ul>
                            <button id="add-agency-type" class="btn-outline-dark add-agency-type px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyType()">Add Type</button>
                        </div>
                        <script>removeAddAgencyTypeButton()</script>
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
                                    <input id="agency-city" class="form-control form-control-sm" type="text" maxlength="16" name="agency-city"
                                           value="<?php echo $this->agencyInfo["aCity"]?>"
                                           placeholder="City" required>
                                </span>
                            </li>
                            <li>
                                <label for="agency-district" class="form-label">District:</label>
                                <span>
                                    <select id="agency-district" class="form-select-sm agency-district" name="agency-district" required>
                                        <optgroup class="form-label" label="Province 1">
                                                <?php
                                                $agencyDistrict = ["Bhojpur", "Dhankuta", "Ilam", "Jhapa", "Khotang",
                                                    "Morang", "Okhaldhunga", "Panchthar", "Sankhuwasabha", "Solukhumbu",
                                                    "Sunsari", "Taplejung", "Tehrathum", "Udayapur"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 2">
                                                <?php
                                                $agencyDistrict = ["Parsa", "Bara", "Rautahat", "Sarlahi", "Dhanusha",
                                                    "Siraha", "Mahottari", "Saptari"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 3">
                                                <?php
                                                $agencyDistrict = ["Sindhuli", "Ramechhap", "Dolakha", "Bhaktapur", "Dhading",
                                                    "Kathmandu", "Kavrepalanchok", "Lalitpur", "Nuwakot", "Rasuwa",
                                                    "Sindhupalchok", "Chitwan", "Makwanpur"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 4">
                                                <?php
                                                $agencyDistrict = ["Baglung", "Gorkha", "Kaski", "Lamjung", "Manang",
                                                    "Mustang", "Myagdi", "Nawalpur", "Parbat", "Syangja",
                                                    "Tanahun"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 5">
                                                <?php
                                                $agencyDistrict = ["Kapilvastu", "Parasi", "Rupandehi", "Arghakhanchi", "Gulmi",
                                                    "Palpa", "Dang", "Pyuthan", "Rolpa", "East Rukum",
                                                    "Banke", "Bardiya"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 6">
                                                <?php
                                                $agencyDistrict = ["West Rukum", "Salyan", "Dolpa", "Humla", "Jumla",
                                                    "Kalikot", "Mugu", "Surkhet", "Dailekh", "Jajarkot"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                            <optgroup class="form-label" label="Province 7">
                                                <?php
                                                $agencyDistrict = ["Kailali", "Achham", "Doti", "Bajhang", "Bajura",
                                                    "Kanchanpur", "Dadeldhura", "Baitadi", "Darchula"];
                                                $i = 0;
                                                while ($i < count($agencyDistrict)) {
                                                    if($agencyDistrict[$i] == $this->agencyInfo["aDistrict"])
                                                        echo "<option value='". $agencyDistrict[$i]. "' selected>". $agencyDistrict[$i]. "</option>";
                                                    else
                                                        echo "<option value='". $agencyDistrict[$i]. "'>". $agencyDistrict. "</option>";
                                                    ++$i;
                                                }
                                                ?>
                                            </optgroup>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="agency-doe" class="form-label">Established Date:</label>
                                <input id="agency-doe" class="form-control form-control-sm agency-doe" type="date" min="1620-01-02" max="2021-01-02" name="agency-doe"
                                       value="<?php echo $this->agencyInfo["aEstablishmentDate"]?>"
                                       required>
                            </li>
                        </ul>
                    </div>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Phones</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            echo "<li>
                                    <input id='agency-phone". ($i + 1). "'
                                        class='form-control agency-phone mt-2 mb-2' type='text' minlength='7' maxlength='13' pattern='^\d+$'
                                        name='agency-phone". ($i + 1). "'
                                        value='". $this->agencyPhone[$i]. "'
                                        placeholder='Phone ". ($i + 1). "' required>
                                </li>";
                            ++$i;
                            while ($i < count($this->agencyPhone)) {
                                echo "<li>
                                        <input id='agency-phone". ($i + 1). "'
                                            class='form-control agency-phone mt-2 mb-2' type='text' minlength='7' maxlength='13' pattern='^\d+$'
                                            name='agency-phone". ($i + 1). "'
                                            value='". $this->agencyPhone[$i]. "'
                                            placeholder='Phone ". ($i + 1). "'>
                                    </li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                        <button id="add-phone" class="btn-outline-dark add-phone px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyPhone()">Add Phone</button>
                    </div>
                    <script>removeAddAgencyPhoneButton()</script>
                    <div class="post-details4 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Emails</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            echo "<li>
                                    <input id='agency-email". ($i + 1). "'
                                        class='form-control agency-email mt-2 mb-2' type='email' maxlength='46'
                                        name='agency-email". ($i + 1). "'
                                        value='". $this->agencyEmail[$i]. "'
                                        placeholder='Email ". ($i + 1). "' required>
                                </li>";
                            ++$i;
                            while ($i < count($this->agencyEmail)) {
                                echo "<li>
                                        <input id='agency-email". ($i + 1). "'
                                            class='form-control agency-email mt-2 mb-2' type='email' maxlength='46'
                                            name='agency-email". ($i + 1). "'
                                            value='". $this->agencyEmail[$i]. "'
                                            placeholder='Email ". ($i + 1). "'>
                                    </li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                        <button id="add-email" class="btn-outline-dark add-email px-4 py-2 mt-2 mb-2" type="button" onclick="addAgencyEmail()">Add Email</button>
                    </div>
                    <script>removeAddAgencyEmailButton()</script>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>