<?php
include 'top.php';
?>
<main>
    <p>Create Table SQL</p>

    <pre>
    CREATE TABLE tblPollutionCountry(
        pmkPollutionCountry int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fldCountry VARCHAR(50) DEFAULT NULL,
        fldAmount VARCHAR(50) DEFAULT NULL,
        fldAmountOcean VARCHAR(50) DEFAULT NULL,
        fldPopulation VARCHAR(50) DEFAULT NULL
    )
    </pre>

    <h2>Insert records into the table labs</h2>
    <pre>
    INSERT INTO tblPollutionCountry
    (pmkPollutionCountry, fldCountry, 
    fldAmount, fldAmountOcean, fldPopulation)
    VALUES
    (1, 'China', '8.80m', '3.53m', '1.338b'),
    (2, 'Indonesia', '3.20m', '1.29m', '244m'),
    (3, 'Philippines', '1.90m', '0.75m', '94.64m');
    </pre>

    <pre>
        CREATE TABLE tblPlasticSurvey (
	    pmkSurveyId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	    fldEmail varchar(50) DEFAULT NULL,
	    fldGender varchar(50) DEFAULT NULL,
	    fldWater tinyint(1) DEFAULT 0,
	    fldSoda tinyint(1) DEFAULT 0,
	    fldBags tinyint(1) DEFAULT 0,
	    fldNone tinyint(1) DEFAULT 0,
	    fldOften varchar(11) DEFAULT NULL
    )
    </pre>

    <pre>
    INSERT INTO tblPlasticSurvey
    (pmkSurveyId, fldEmail, fldGender, fldWater, fldSoda, fldBags, fldNone, fldOften)
    VALUES
    (1, 'mrbeast@uvm.edu', 'Male', 1, 1, 1, 0, 'Some');
    </pre>

</main>
<?php include 'footer.php'; ?>
