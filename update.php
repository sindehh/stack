<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $mobilenumber = isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : '';
        $gendoption = isset($_POST['gendoption']) ? $_POST['gendoption'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $idnumber = isset($_POST['idnumber']) ? $_POST['idnumber'] : '';
        $bachelor = isset($_POST['bachelor']) ? $_POST['bachelor'] : '';
        $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';


        $stmt = $pdo->prepare('UPDATE contacts SET id = ?, fullname = ?, birthdate = ?, email = ?, mobilenumber = ?, gender = ?, address = ?, idnumber = ?, bachelor = ?, zip = ?, comment = ?,  WHERE id =?');
        $stmt->execute([$id, $fullname, $birthdate, $email, $mobilenumber, $gendoption, $address, $idnumber, $bachelor, $zip, $comment, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?= template_header('Read') ?>


<div class="content update">
    <form action="update.php?id=<?= $contact['id'] ?>" method="post">
        <div class="form first"></div>
        <div class="details personal">
            <span class="title"><b>Personal Details</b></span>

            <div class="fields">
                <div class="input-field">
                    <label>Full name</label>
                    <input type="textarea" name="name" placeholder="Enter your name" value="<?= $contact['name'] ?>" id="name" required>
                </div>

                <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" name="birthdate" placeholder="Enter Birth Date" value="<?= $contact['birthdate'] ?>" id="birthdate" required>
                </div>

                <div class="input-field">
                    <label>Email</label>
                    <input type="textarea" name="email" placeholder="Enter your Email" value="<?= $contact['email'] ?>" id="email" required>
                </div>
                <div class="input-field">
                    <label>Mobile Number</label>
                    <input type="textarea" name="mobilenumber" maxlength="11" placeholder="Enter your mobile number" value="<?= $contact['mobilenumber'] ?>" id="mobilenumber" required>
                </div>

                <div class="input-field">
                    <label class="gend">Gender</label>
                    <select class="gender" value="<?= $contact['gender'] ?>" id="gender">
                        <option disabled selected value placeholder="Select an option">Select an option</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="">Other</option>

                    </select>

                </div>
                <div class="input-field">
                    <label>Address</label>
                    <input type="textarea" name="address" placeholder="Enter address" value="<?= $contact['address'] ?>" id="address" required>
                </div>
            </div>
        </div>

        <div class="details ID">
            <span class="title"><b>Student Details</b></span>

            <div class="fields">
                <div class="input-field">
                    <label>ID number</label>
                    <input type="textarea" name="idnumber" maxlength="11" placeholder="ID number with dash" value="<?= $contact['idnumber'] ?>" id="idnumber" required>
                </div>

                <div class="input-field">
                    <label class="course">Courses</label>
                    <select class="choices" value="<?= $contact['choices'] ?>" id="choices">
                        <option disabled selected value placeholder="Select an option">Select an option</option>
                        <option value="cs">Computer Science</option>
                        <option value="IT">Information Technology</option>
                        <option value="ERP">ERP</option>
                        <option value="DA">Data Analytics</option>
                        <option value="CE">Computer Engineering</option>
                    </select>


                </div>
                <div class="input-field">
                    <label>Zip code</label>
                    <input type="text" name="zip" maxlength="5" placeholder="Enter code" value="<?= $contact['zipcode'] ?>" required>
                </div>
                <div class="input-field">
                    <p class="gg">Leave us a message/suggestions<b>(Optional)</b></p>
                    <textarea id="comments" class="input-textarea" name="comment" value="<?= $contact['comment'] ?>" placeholder="Write something..."></textarea>
                </div>
            </div>
        </div>
        <button class="nextBtn">
            <span class="btnText" value="Update">Update</span>
            <i class="uil uil-navigator"></i>
        </button>
        <?php if ($msg) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
</div>
</form>
</div>


<?= template_footer() ?>