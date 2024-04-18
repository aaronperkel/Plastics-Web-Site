<?php 
    include 'top.php'; 

    $genders = array('Male', 'Female', 'Other', 'Prefer not to say');

    $dataIsGood = false;

    $message = '';

    $email = '';
    $gender = '';
    $water = 0;
    $soda = 0;
    $bags = 0;
    $none = 0;
    $howOften = '';

    function getData($field) {
        if (!isset($_POST[$field])) {
            $data = "";
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        return $data;
    }
    
    function verifyAlphaNum($testString) {
        // Check for letters, numbers and dash, period, space and single quote only.
        // added & ; and # as a single quote sanitized with html entities will have 
        // this in it bob's will be come bob's
        return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;
    }

    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $gender = getData('lstGender');
    $water = (int) getData('chkWater');
    $soda = (int) getData('chkSoda');
    $bags = (int) getData('chkBags');
    $none = (int) getData('chkNone');
    $howOften = getData('radRecycle');

    print PHP_EOL . '<!-- Starting Validation -->' . PHP_EOL;
    $dataIsGood = true;

    if ($email == '') {
        $message .= '<p class="mistake">Please type in your email address.</p>';
        $dataIsGood = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= '<p class="mistake">Your email address contains invalid characters.</p>';
        $dataIsGood = false;
    }

    if ($gender == '') {
        $message .= '<p class="mistake">Please choose your gender</p>';
        $dataIsGood = false;
    } elseif(!in_array($gender, $genders)) {
        $message .= '<p class="mistake">Please choose your gender</p>';
        $dataIsGood = false;
    }

    $totalChecked = 0;

    if ($water != 1) $water = 0;
    $totalChecked += $water;

    if ($soda != 1) $soda = 0;
    $totalChecked += $soda;

    if ($bags != 1) $bags = 0;
    $totalChecked += $bags;

    if ($none != 1) $none = 0;
    $totalChecked += $none;

    if ($totalChecked == 0) {
        $message .= '<p class="mistake">Please choose at least one checkbox that describes you.</p>';
        $dataIsGood = false;
    }

    if ($howOften != "Every" AND $howOften != "Most" AND $howOften != "Half" AND
        $howOften != "Some" AND $howOften != "Never") {
            $message .= '<p class="mistake">Please select how often you recycle</p>';
            $dataIsGood = false;
    }

    print '<!-- Starting Saving -->';
    if ($dataIsGood) {
        $sql = 'INSERT INTO tblPlasticSurvey (fldEmail, fldGender, fldWater, fldSoda, fldBags, fldNone, fldOften)
        VALUES (?, ?, ?, ?, ?, ?, ?)';
        $statement = $pdo->prepare($sql);
        $data = array($email, $gender, $water, $soda, $bags, $none, $howOften);

        if ($statement->execute($data)) {
            $message .= '<h2>Thank you</h2>';
            $message .= '<p>Your information was successfully saved.</p>';
        } else {
            $message .= '<p>Record was NOT successfully saved.</p>';
            $dataIsGood = false;
        }
    }
    ?>
        <main>
            <h1>Plastic Use</h1>
            <section>
                <h2>A bottle</h2>
                <figure class="roundedCorners">
                        <img src="../images/bottle.png" alt="A Plastic Water Bottle" width=200 class="roundedCorners">
                        <figcaption><cite><a href="https://www.vecteezy.com/png/27291807-a-plastic-bottle-of-water-on-a-transparent-background" target="_blank">Source</a></cite></figcaption>
                </figure>
            </section>
            <section>
                <h2>Survey</h2>
                <p>I am collecting data on people's plastic use</p>
                <?php 
                print $message;


                print '<p>Post Array:</p><pre>';
                print_r($_POST);
                print '</pre>';
                ?>
            </section>
            <section>
                <h2>Your thoughts</h2>
                <form action="#" id="survey" method="POST">
                    <fieldset class="contact">
                        <legend>Plastic Use Survey</legend>
                        <p>
                            <label class="required" for="txtEmail">Email</label>
                            <input id="txtEmail" maxlength="30"
                            name="txtEmail" onfocus="this.select()"
                            tabindex="305" type="email" value="<?php
                            print $email; ?>" required>
                        </p>
                    </fieldset>

                    <fieldset class="listbox">
                        <legend>Gender</legend>
                        <p>
                            <select id="lstGender" name="lstGender">
                                <option
                                <?php if ($gender == "Male") print 'selected'; ?>
                                    value="Male">Male</option>
                                <option
                                <?php if ($gender == "Female") print 'selected'; ?>
                                    value="Female">Female</option>
                                <option
                                <?php if ($gender == "Other") print 'selected'; ?>
                                    value="Other">Other</option>
                                <option
                                <?php if ($gender == "None") print 'selected'; ?>
                                    value="Prefer not to say">Prefer not to say</option>
                            </select>
                        </p>
                    </fieldset>
                    
                    <fieldset class="checkbox">
                        <legend>Select the plastics you use (choose at least one)</legend>
                        <p>
                            <input id="chkWater" name="chkWater"
                            <?php if ($water) print 'checked'; ?>
                            type="checkbox" value="1">
                            <label for="chkWater">Water Bottles (single-use)</label>
                        </p>
                        <p>
                            <input id="chkSoda" name="chkSoda"
                            <?php if ($soda) print 'checked'; ?>
                            type="checkbox" value="1">
                            <label for="chkSoda">Soda Bottles</label>
                        </p>
                        <p>
                            <input id="chkBags" name="chkBags"
                            <?php if ($bags) print 'checked'; ?>
                            type="checkbox" value="1">
                            <label for="chkBags">Single-use Grocery Bags</label>
                        </p>
                        <p>
                            <input id="chkNone" name="chkNone"
                            <?php if ($none) print 'checked'; ?>
                            type="checkbox" value="1">
                            <label for="chkNone">None of the above</label>
                        </p>
                    </fieldset>

                    <fieldset class="radio">
                        <legend>How often do you recycle?</legend>
                        <p>
                            <input type="radio" id="radEveryTime" name="radRecycle" value="Every" 
                            <?php if ($howOften == "Every") print 'checked'; ?>
                            required>
                            <label class="radio-field" for="radEveryTime">Every piece of plastic I use (100%)</label>
                        </p>
                        <p>
                            <input type="radio" id="radMost" name="radRecycle" value="Most" 
                            <?php if ($howOften == "Most") print 'checked'; ?>
                            required>
                            <label class="radio-field" for="radMost">Most of the time (85%)</label>
                        </p>
                        <p>
                            <input type="radio" id="radHalf" name="radRecycle" value="Half" 
                            <?php if ($howOften == "Half") print 'checked'; ?>
                            required>
                            <label class="radio-field" for="radHalf">Half of the time (50%)</label>
                        </p>
                        <p>
                            <input type="radio" id="radSometimes" name="radRecycle" value="Some" 
                            <?php if ($howOften == "Some") print 'checked'; ?>
                            required>
                            <label class="radio-field" for="radSometimes">Sometimes (30%)</label>
                        </p>
                        <p>
                            <input type="radio" id="radNever" name="radRecycle" value="Never" 
                            <?php if ($howOften == "Never") print 'checked'; ?>
                            required>
                            <label class="radio-field" for="radNever">Never (0%)</label>
                        </p>
                    </fieldset>

                    <fieldset class="buttons">
                        <input id="btnSubmit" name="btnSubmit"
                        type="submit" value="Submit">
                    </fieldset>
                </form>
            </section>
        </main>
        <?php include 'footer.php'; ?> 