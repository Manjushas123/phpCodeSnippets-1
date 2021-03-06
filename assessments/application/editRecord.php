<?php
require 'crudoperations.php';
require 'validation.php';
require 'validatingLeave.php';
if (!empty($_GET['id'])) {
    $crudObj = new CrudOperations();
    $studentData = $crudObj->readRecord($_GET['id']);
    $input['studentName'] = $studentData['studentName'];
    $input['Department'] = $studentData['Department'];
    $input['Gender'] = $studentData['Gender'];
    $input['Roll_no'] = $studentData['Roll_no'];
    $input['Physics'] = $studentData['Physics'];
    $input['Chemistry'] = $studentData['Chemistry'];
    $input['Maths'] = $studentData['Maths'];
    $input['Total'] = $studentData['Total'];
    $input['Percentage'] = $studentData['Percentage'];
    $input['startDate'] = $studentData['startDate'];
    $input['endDate'] = $studentData['endDate'];
    $input['studentLeave'] = $studentData['studentLeave'];
}
if ($_POST) {
    $responseOfEdit = "";
    $crudObj = new CrudOperations();
    $validationObject = new Validation();
    $responseOfValidation = $validationObject->validate($_POST);
    $validationObjectOfLeave = new ValidatingLeave();
    $responseOfValidationOfLeave = $validationObjectOfLeave->validate($_POST);
    $errorMessage = $responseOfValidation['message'];
    $errorMessage = $responseOfValidationOfLeave['message'];
    if ($responseOfValidation['status'] && $responseOfValidationOfLeave['status']) {
        $responseOfEdit = $crudObj->editStudentRecord($_POST, $_GET['id']);
    }
    if ($responseOfEdit === true ) {
        header('Location:index.php');
    }
} 
$Department = $input['Department'];
$Gender = $input['Gender'];
?>
<html>
<head>
<h1 align="center">Update Information</h1>
<title>Student Information</title>
<style>
.error
{
    color :yellow;
    background : red;
}
</style>
</head>
<body bgcolor="pink">
<form method="post" action="">
<table>
<tr>
<td><label>Enter the Student Name:</label></td>
<td><input type="text" name="studentName" value="<?php echo $input['studentName']; ?>" />
<?php 
if (!empty($errorMessage['studentName'])) {
    echo $errorMessage['studentName'];
} else {
    echo '';
}
?>
 
</td>
</tr>
<tr>
<td><label>Enter the Department:</label></td>
<td><select name="Department">
<option disable selected value>select</option>
<option <?php if ($Department == 'Computer Science') { ?> selected <?php } ?> value="Computer Science">Computer Science</option>
<option <?php if ($Department == 'Electronics') { ?> selected <?php } ?> value="Electronics">Electronics</option>
<option <?php if ($Department == 'Mechanical') { ?> selected <?php } ?> value="Mechanical">Mechanical</option>
<option <?php if ($Department == 'Civil') { ?> selected <?php } ?> value="Civil">Civil</option>
<option <?php if ($Department == 'Electrical') { ?> selected <?php } ?> value="Electrical">Electrical</option>
<option <?php if ($Department == 'Aeronatics') { ?> selected <?php } ?> value="Aeronatics">Aeronatics</option>
<option <?php if ($Department == 'Chemical') { ?> selected <?php } ?> value="Chemical">Chemical</option>
<option <?php if ($Department == 'Metallurgy') { ?> selected <?php } ?> value="Metallurgy">Metallurgy</option>
<option <?php if ($Department == 'Medical electronics') { ?> selected <?php } ?> value="Medical electronics">Medical electronics</option>
</select>
<?php
if (!empty($errorMessage['Department'])) {
    echo $errorMessage['Department']; 
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the Gender:</label></td>
<td><input type="radio" <?php if($Gender == "male") echo "checked" ?> name="Gender" value="male" />Male
<input type="radio" <?php if($Gender == "female") echo "checked" ?> name="Gender" value="female" />Female
<?php 
if (!empty($errorMessage['Gender'])) {
    echo $errorMessage['Gender'];
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the Roll_no:</label></td>
<td><input type="text" name="Roll_no" value="<?php echo $input['Roll_no']; ?>" />
<?php 
if (!empty($errorMessage['Roll_no'])) {
    echo $errorMessage['Roll_no'];
} else {
    echo '';
}
?> 
</td>
</tr>
<tr>
<td><label>Enter the marks of Physics:</label></td>
<td><input type="text" name="Physics" value="<?php echo $input['Physics']; ?>" />
<?php 
if (!empty($errorMessage['Physics'])) {
    echo $errorMessage['Physics'];
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the marks of Chemistry:</label></td>
<td><input type="text" name="Chemistry" value="<?php echo $input['Chemistry']; ?>" />
<?php 
if (!empty($errorMessage['Chemistry'])) {
    echo $errorMessage['Chemistry'];
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the marks of Maths:</label></td>
<td><input type="text" name="Maths" value="<?php echo $input['Maths']; ?>" />
<?php 
if (!empty($errorMessage['Maths'])) {
    echo $errorMessage['Maths'];
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the start date:</label></td>
<td><input type="date" name="startDate" value="<?php echo $input['startDate'] ?>" >
<?php 
if (!empty($errorMessage['startDate'])) {
    echo $errorMessage['startDate'];
} else {
    echo '';
}
?>
</td>
</tr>
<tr>
<td><label>Enter the end date:</label></td>
<td><input type="date" name="endDate" value="<?php echo $input['endDate'] ?>" >
<?php 
if (!empty($errorMessage['endDate'])) {
    echo $errorMessage['endDate'];
} else {
    echo '';
}
?>
</td>
</tr>
</table>
<input type="submit" name="update" value="update" class="error">
</form>
</body>
</html>
<a href="index.php">Go to index page</a>
  

    