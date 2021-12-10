

function validateEmployeeForm() {

    let employee_no = document.forms["employee_create_form"]["employee_no"].value;
    let employee_name_en = document.forms["employee_create_form"]["employee_name_en"].value;
    let employee_name_ar = document.forms["employee_create_form"]["employee_name_ar"].value;
    let employee_id = document.forms["employee_create_form"]["employee_id"].value;
    let birth_date = document.forms["employee_create_form"]["birth_date"].value;
    let mobile_no = document.forms["employee_create_form"]["mobile_no"].value;
    let frmVali = true;

    if ( employee_no == ""  ) {
        document.getElementById('employee_no_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (employee_name_en == "") {
        document.getElementById('employee_name_en_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (employee_name_ar == "") {
        document.getElementById('employee_name_ar_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (employee_id == "") {
        document.getElementById('employee_id_msg').innerHTML = "This field is required.";
        frmVali = false;
    }
    
    if (isNaN(employee_id)) {
        document.getElementById('employee_id_msg').innerHTML = "Enter only number.";
        frmVali = false;
    }
    
    if ( employee_id.length != 10 ) {
        document.getElementById('employee_id_msg').innerHTML = "The ID number must be 10 digits.";
        frmVali = false;
    }
    

    if (employee_id == "") {
        document.getElementById('employee_id_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (birth_date == "") {
        document.getElementById('birth_date_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (mobile_no == "") {
        document.getElementById('mobile_no_msg').innerHTML = "This field is required.";
        frmVali = false;
    }
    if (isNaN(mobile_no)) {
        document.getElementById('employee_id_msg').innerHTML = "Enter only number.";
        frmVali = false;
    }

    

    if (frmVali==false) {
        return false;
    }
}


function validateEmployeeNationalityForm() {

    let nationality = document.forms["employee_nationality_create_form"]["nationality"].value;
    let frmVali = true;

    if (nationality == "") {
        document.getElementById('nationality_msg').innerHTML = "This field is required.";
        frmVali = false;
    }

    if (frmVali == false) {
        return false;
    }
}