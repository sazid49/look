/**
 * Validate and submit the registration form.
 */
$("#create form").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 4
        },
        password_confirmation: "required",
        bot_protection: "required"
    },
    submitHandler: function(form) {
        AS.Http.submit(form, getRegisterFormData(form), function (response) {
            AS.Util.displaySuccessMessage($(form), response.message);
        });
    }
});

/**
 * Get registration form data as JSON.
 * @param form
 */
function getRegisterFormData(form) {
    return {
        action: "registerUser",
        user: {
            email: form['email'].value,
            firstname: form['firstname'].value,
            lastname: form['lastname'].value,
            phone: form['phone'].value,
            password: AS.Util.hash(form['password'].value),
            password_confirmation: AS.Util.hash(form['password_confirmation'].value),
            bot_protection: form['bot_protection'].value
        }
    };
}
