$(function () {
    $("#reg_form").validate({
        // Specify the validation rules
        rules: {
            name: 'required',
            phone: 'required',

            username: {
                required: true,
                minlength: 5,
                maxlength: 10,
            },
            email: {
                required: true,
                email: true,
            },
            pass: "required",
            repass: {
                required: true,
                equalTo: "#pass_id",
            },
        },
        // Specify the validation error messages
        messages: {
            name: 'Enter your name',
            phone: 'Enter your phone number',
            username: {
                required: 'Enter username',
                minlength: 'Enter atleat 5 char',
                maxlength: 'Enter maximum 10 char',
            },
            email: {
                required: 'Enter email address',
                email: 'Enter valid email address! ',
            },
            pass: 'Enter password',
            repass: {
                required: 'Enter confirmed password',
                equalTo: "Password did not match"
            }
        },


        submitHandler: function (form) {
            form.submit();
        }
    });
});