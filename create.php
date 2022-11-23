<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {



    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : date('Y-m-d H:i:s');
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobilenumber = isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : '';
    $gendoption = isset($_POST['gendoption']) ? $_POST['gendoption'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $idnumber = isset($_POST['idnumber']) ? $_POST['idnumber'] : '';
    $bachelor = isset($_POST['bachelor']) ? $_POST['bachelor'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $fullname, $birthdate, $email, $mobilenumber, $gendoption, $address, $idnumber, $bachelor, $zip, $comment]);
    $msg = 'Created Successfully!';
}
?>


<?= template_header('Create') ?>

<div class="container">
    <header>
        <h2>STUDENT ID SYSTEM</h1>
    </header>

    <form action="create.php" method="POST">
        <div class="form first"></div>
        <div class="details personal">
            <span class="title"><b>Personal Details</b></span>

            <div class="fields">
                <div class="input-field">
                    <label>Full name</label>
                    <input type="textarea" name="fullname" placeholder="Enter your name" required>
                </div>

                <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" name="birthdate" placeholder="Enter Birth Date" required>
                </div>

                <div class="input-field">
                    <label>Email</label>
                    <input type="textarea" name="email" placeholder="Enter your Email" required>
                </div>
                <div class="input-field">
                    <label>Mobile Number</label>
                    <input type="textarea" name="mobilenumber" maxlength="11" placeholder="Enter your mobile number" required>
                </div>

                <div class="input-field">
                    <label class="gend">Gender</label>
                    <select class="gender" name="gendoption">
                        <option disabled selected value placeholder="Select an option">Select an option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to say">Prefer not to say</option>

                    </select>

                </div>
                <div class="input-field">
                    <label>Address</label>
                    <input type="textarea" name="address" placeholder="Enter address" required>
                </div>
            </div>
        </div>

        <div class="details ID">
            <span class="title"><b>Student Details</b></span>

            <div class="fields">
                <div class="input-field">
                    <label>ID number</label>
                    <input type="textarea" name="idnumber" maxlength="11" placeholder="ID number with dash" required>
                </div>

                <div class="input-field">
                    <label class="course">Courses</label>
                    <select class="choices" name="bachelor">
                        <option disabled selected value placeholder="Select an option">Select an option</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="ERP">ERP</option>
                        <option value="Data Analytics">Data Analytics</option>
                        <option value="Computer Engineering">Computer Engineering</option>
                    </select>
                </div>


                <div class="input-field">
                    <label>Zip code</label>
                    <input type="text" name="zip" maxlength="5" placeholder="Enter code" required>
                </div>
                <div class="input-field">
                    <p class="gg">Leave us a message/suggestions<b>(Optional)</b></p>
                    <textarea id="comments" class="input-textarea" name="comment" placeholder="Write something..." style="width: 318%"></textarea>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button class="nextBtn">
                <span class="btnText">Submit</span>
                <i class="uil uil-navigator"></i>
                <button class="">
                    <a href="read.php" style="color: #fff; outline: none; border: none; text-decoration: none;">Contacts</a>
                    <i class="uil uil-navigator"></i>
                </button>


        </div>
</div>
</form>
</div>




<?= template_footer() ?>