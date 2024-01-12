$( document ).ready(function() {
    $("#edit_personal_info").click(function() {
        showEditPersonalDataForm();
    });

    $(".edit_vacancy").click(function() {
        let vacancyId = $(this).data('vacancy-id');
        console.log(vacancyId);

        showEditVacancyForm(vacancyId);
    });


    $('#user-image').change(function() {
        let filename = $('#user-image').val();
        $('.uploaded-file').html('File added: ' + filename);
        $('#sendButton').show();
    });

});



function showEditVacancyForm(vacancyId) {
    $.ajax({
        type:'POST',
        url:'/ajax/get-vacancy',

        data: {
            "_token": $(`#token_for_vacancy_${vacancyId}`).val(),
            "ID": vacancyId
        },

        success:function(data) {
            //console.log(data);
            //$("#msg").html(data.msg);

            $('.blog_details, .add_vacancy_button').hide();
            $('.blog_details.edit-form').show();


            //filling vacancy form

            $('.edit_vacancy_form .vacancy.VACANCY_ID').val(vacancyId);
            $('.edit_vacancy_form .vacancy.NAME').val(data.vacancy.NAME);
            $('.edit_vacancy_form .vacancy.COUNTRY').val(data.vacancy.COUNTRY);
            $('.edit_vacancy_form .vacancy.CITY').val(data.vacancy.CITY);
            $('.edit_vacancy_form .vacancy.SALARY_FROM').val(data.vacancy.SALARY_FROM);


            let categoryId = data.vacancy.CATEGORY_ID;
            $(`.blog_details.edit-form .vacancy.CATEGORY_ID li[data-value=${categoryId}]`)
                .trigger('click')
                .trigger('click');

            $('.edit_vacancy_form .vacancy.DESCRIPTION').html(data.vacancy.DESCRIPTION);
            fillTextAreaByOptions(data.vacancy.RESPONSIBILITY, '.edit_vacancy_form .vacancy.RESPONSIBILITY');
            fillTextAreaByOptions(data.vacancy.QUALIFICATIONS, '.edit_vacancy_form .vacancy.QUALIFICATIONS');
            $('.edit_vacancy_form .vacancy.BENEFITS').html(data.vacancy.BENEFITS);
        }
    });

}


//TODO перенести такие функции в HELPER для JS
function fillTextAreaByOptions(jsonListOfOptions, selector) {
    let arrayOfOptions = JSON.parse(jsonListOfOptions);
    for (key in arrayOfOptions) {
        $(selector).append(arrayOfOptions[key] + "\n");
    }
}



function showEditPersonalDataForm() {
    $('#edit_personal_info').hide();
    $('.blog_details.user-info').hide();

    $('#save_personal_info').show();
    $('.blog_details.edit-form').show();
}
