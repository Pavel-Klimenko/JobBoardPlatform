$( document ).ready(function() {
    var accountType = $('#account_type').val();
    setAccountTypeFields(accountType);

    $('#account_type').change(function() {
        accountType = $('#account_type').val();
        setAccountTypeFields(accountType);
    });

/*  $('#userUploadImage').change(function() {
            let filename = $('#userUploadImage').val();
            $('.uploaded-file').html('File added: ' + filename);
    });*/

});

function setAccountTypeFields(accountType) {
    if (accountType == 'candidate') {
        $('#EMPLOYEE_CNT_INPUT').hide();
        $('#WEB_SITE_INPUT').hide();
        $('#DESCRIPTION_INPUT').hide();

        $('#CATEGORY_ID_INPUT').show();
        $('#LEVEL_INPUT').show();
        $('#YEARS_EXPERIENCE_INPUT').show();
        $('#EXPERIENCE_INPUT').show();
        $('#EDUCATION_INPUT').show();
        $('#SALARY_INPUT').show();
        $('#SKILLS_INPUT').show();
        $('#LANGUAGES_INPUT').show();
        $('#ABOUT_ME_INPUT').show();

    } else {
        $('#CATEGORY_ID_INPUT').hide();
        $('#LEVEL_INPUT').hide();
        $('#EXPERIENCE_INPUT').hide();
        $('#EDUCATION_INPUT').hide();
        $('#YEARS_EXPERIENCE_INPUT').hide();
        $('#SALARY_INPUT').hide();
        $('#SKILLS_INPUT').hide();
        $('#LANGUAGES_INPUT').hide();
        $('#ABOUT_ME_INPUT').hide();

        $('#EMPLOYEE_CNT_INPUT').show();
        $('#WEB_SITE_INPUT').show();
        $('#DESCRIPTION_INPUT').show();
    }
}