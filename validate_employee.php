<?php
// Check if 'employee_id' is part of the POST data
if (isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id']; // Retrieve 'employee_id' from POST request data

    // This checks if the employee ID matches the format using the regular expression
    if (preg_match("/^[A-Za-z]{4}[0-9]{4}$/", $employee_id)) {
        echo "Employee ID is in the correct format."; // The employee id is in the correct format
    } else {
        echo "Employee ID was incorrect. <a href='employee.html'>Go back and re-enter name and Employee ID.</a>"; // Did not match
    }
} else {
    echo "Please submit the form with an Employee ID. <a href='employee.html'>Go back to the form.</a>"; //Tells the user if the employee id was not set
}
?>
