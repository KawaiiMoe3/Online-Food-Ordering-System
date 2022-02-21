onload = function(){
    //Declare error message and username's input
    let usernameErrorMsg = document.getElementById("errorMessage")
    let usernameElt = document.getElementById("username")

    //Onblur on username's input
    usernameElt.onblur = function(){
        //Get the username's input
        let usernameValue = usernameElt.value
        //Clear which empty on front and behind
        usernameValue = usernameValue.trim()

        //Check whether username's input is empty or not
        if (usernameValue.length == 0) {
            //Empty
            usernameErrorMsg.innerText = "Username cannot be empty!"
        }
        else{
            //Not empty 
            //Check whether username's input is between 5-15 characters or not
            if(usernameValue.length < 5 || usernameValue.length > 15){
                //Not between 5-15 characters
                usernameErrorMsg.innerText="Username must between [5-15] characters!"
            }
            else{
                //Verify username's input
                let usernameRegExp = /^[A-Za-z0-9]+$/
                let usernameOk = usernameRegExp.test(usernameValue)
                if (usernameOk){
                    //True
                }
                else{
                    //False
                    usernameErrorMsg.innerText = "Username can only consist of alphabets or numbers!"
                }
            }
        }
    }

    //Onfocus on username's input
    usernameElt.onfocus = function(){
        //If error message exists
        if(usernameErrorMsg.innerText != ""){
            //Clear the text of username's input
            usernameElt.value = ""
        }
        //Clear the error message
        usernameErrorMsg.innerText = ""
    }

    //Declare error message and password's input
    let passwordErrorMsg = document.getElementById("errorMessage")
    let passwordElt = document.getElementById("password")

    //Onblur on password's input
    passwordElt.onblur = function(){
        //Get the password's input
        let passwordValue = passwordElt.value
        //Clear which empty on front and behind
        passwordValue = passwordValue.trim()

        //Check whether password's input is empty or not
        if (passwordValue.length == 0) {
            //Empty
            passwordErrorMsg.innerText = "Please kindly enter your password!"
        }
        else{ 
            //Not empty 
            //Check whether password's input is more than 5 characters or not
            if(passwordValue.length < 5){
                //Not more than 5 characters
                passwordErrorMsg.innerText="Password must more than 5 characters!"
            }
            else{
                 //Verify password's input
                 let passwordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}$/
                 let passwordOk = passwordRegExp.test(passwordValue)
                 if (passwordOk){
                     //True
                 }
                 else{
                     //False
                     passwordErrorMsg.innerText = "Password must contain at least 1 uppercase and 1 lowercase alphabetical and at least 1 numeric character!"
                 }
            }
        }
    }
    
    //Onfocus on password's input
    passwordElt.onfocus = function(){
        //If error message exists
        if(passwordErrorMsg.innerText != ""){
            //Clear the text of password's input
            passwordElt.value = ""
        }
        //Clear the error message
        passwordErrorMsg.innerText = ""
    }

    //Declare error message and email's input
    let emailErrorMsg = document.getElementById("errorMessage")
    let emailElt = document.getElementById("email")
    
    //Onblur on email's input
    emailElt.onblur = function(){
        //Get the email's input
        let emailValue = emailElt.value
        //Clear which empty on front and behind
        emailValue = emailValue.trim()

        //Check whether email's input is empty or not
        if (emailValue.length == 0) {
            //Empty
            emailErrorMsg.innerText = "Email cannot be empty!"
        }
        else{
            //Not empty 
            //Check whether email's input is legal or not
            let emailRegExp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
            let emailOk= emailRegExp.test(emailValue)
            if(emailOk){
                //True
                emailErrorMsg.innerText = ""
            }else{
                //False
                emailErrorMsg.innerText = "Plase enter a legal email address!"
            }
        }
    }

    //Onfocus on email's input
    emailElt.onfocus = function(){
        //If error message exists
        if(emailErrorMsg.innerText != ""){
            //Clear the text of email's input
            emailElt.value = ""
        }
        //Clear the error message
        emailErrorMsg.innerText = ""
    }

    //Declare error message and TelNo's input
    let phoneErrorMsg = document.getElementById("errorMessage")
    let phoneElt = document.getElementById("phone")

    //Onblur on TelNo's input
    phoneElt.onblur = function(){
        //Get the TelNo's input
        let phoneValue = phoneElt.value
        //Clear which empty on front and behind
        phoneValue = phoneValue.trim()

        //Check whether TelNo's input is empty or not
        if (phoneValue.length == 0) {
            //Empty
            phoneErrorMsg.innerText = "Phone number cannot be empty!"
        }
        else{
            /**Not empty 
             * Check whether TelNo's input is legal or not
             * Example of legal TelNo:
             *  1. +60 1112345678 (include +60 and 10 digits)
             *  2. 60 1112345678 (include 60 and 10 digits)
             *  3. 011 12345678 (not include +60 or 60 and 11 digits)
             *  Below for not 011 users:
             *  1. 010 1234567 (not include +60 or 60 and 10 digits)  
             *  2. 60 101234567 (include 60 and 9 digits)
             *  3. +60 101234567 (include +60 and 9 digits) 
             * 
             * Example of illegal TelNo:
             *  1. Not a number (NAN)
             *  2. More than 11 digits or less than 9 digits
             *  3. 011 1234567 (011 users less than 11 digits)
             *  4. 014 12345678 (Not 011 users but more than 10 digits)
             *  5. Include illegal symbol such as (-), (,), (.), (!@#$%^&*()[])...
             */
            let phoneRegExp = /^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/
            let phoneOk= phoneRegExp.test(phoneValue)
            if(phoneOk){
                //True
                phoneErrorMsg.innerText = ""
            }else{
                //False
                phoneErrorMsg.innerText = "Plase enter a legal phone number!"
            }
        }
    }

    //Onfocus on email's input
    phoneElt.onfocus = function(){
        //If error message exists
        if(phoneErrorMsg.innerText != ""){
            //Clear the text of email's input
            phoneElt.value = ""
        }
        //Clear the error message
        phoneErrorMsg.innerText = ""
    }

    //Declare error message and address's input
    let addressErrorMsg = document.getElementById("errorMessage")
    let addressElt = document.getElementById("address")
    
    //Onblur on address's input
    addressElt.onblur = function(){
        //Get the address's input
        let addressValue = addressElt.value
        //Clear which empty on front and behind
        addressValue = addressValue.trim()

        //Check whether address's input is empty or not
        if (addressValue.length == 0) {
            //Empty
            addressErrorMsg.innerText = "Address cannot be empty!"
        }
        else{
            //Not empty 
            //Check whether address's input is legal or not
            let addressRegExp = /^[\d+]+,[A-Za-z0-9\s]+,[A-Za-z0-9\s]+,(\d{5})$/ 
            let addressOk = addressRegExp.test(addressValue)
            if(addressOk){
                //True
                addressErrorMsg.innerText = ""
            }else{
                //False
                addressErrorMsg.innerText = "Plase enter a legal address and postcode!"
            }
        }
    }

    //Onfocus on address's input
    addressElt.onfocus = function(){
        //If error message exists
        if(addressErrorMsg.innerText != ""){
            //Clear the error message
            addressErrorMsg.innerText = ""
        }
    }

    //Set an onclick event to Signup button
    let signUpBtn = document.getElementById("signUpBtn")
    signUpBtn.onclick = function(){
        //Trigger focus and blur event on the following data when signup button clicked
        usernameElt.focus()
        usernameElt.blur()

        passwordElt.focus()
        passwordElt.blur()

        emailElt.focus()
        emailElt.blur()

        phoneElt.focus()
        phoneElt.blur()

        addressElt.focus()
        addressElt.blur()

        //Check user's input is legal or not
        if(usernameErrorMsg.innerText=="" && passwordErrorMsg.innerText=="" && emailErrorMsg.innerText=="" && phoneErrorMsg.innerText=="" && addressErrorMsg.innerText==""){
            //Legal and submit
            let formRegister = document.getElementById("formRegister")
            formRegister.submit()
        }
    }
}