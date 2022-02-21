onload = function(){

    //Declare error message and password's input
    let currentPasswordErrorMsg = document.getElementById("errorMessage")
    let currentPasswordElt = document.getElementById("currentPassword")

    //Onblur on password's input
    currentPasswordElt.onblur = function(){
         //Get the password's input
         let currentPasswordValue = currentPasswordElt.value
         //Clear which empty on front and behind
         currentPasswordValue = currentPasswordValue.trim()

         //Check whether password's input is empty or not
        if (currentPasswordValue.length == 0) {
            //Empty
            currentPasswordErrorMsg.innerText = "Current password cannot be empty!"
        }
    }

    //Onfocus on password's input
    currentPasswordElt.onfocus = function(){
        //If error message exists
        if(currentPasswordErrorMsg.innerText != ""){
            //Clear the text of password's input
            currentPasswordElt.value = ""
        }
        //Clear the error message
        currentPasswordErrorMsg.innerText = ""
    }

    //Declare error message and password's input
    let newPasswordErrorMsg = document.getElementById("errorMessage")
    let newPasswordElt = document.getElementById("newPassword")

    //Onblur on password's input
    newPasswordElt.onblur = function(){
        //Get the password's input
        let newPasswordValue = newPasswordElt.value
        //Clear which empty on front and behind
        newPasswordValue = newPasswordValue.trim()

        //Check whether password's input is empty or not
        if (newPasswordValue.length == 0) {
            //Empty
            newPasswordErrorMsg.innerText = "Please kindly enter your new password!"
        }
        else{ 
            //Not empty 
            //Check whether password's input is more than 5 characters or not
            if(newPasswordValue.length < 5){
                //Not more than 5 characters
                newPasswordErrorMsg.innerText="Password must more than 5 characters!"
            }
            else{
                 //Verify password's input
                 let passwordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}$/
                 let passwordOk = passwordRegExp.test(newPasswordValue)
                 if (passwordOk){
                     //True
                 }
                 else{
                     //False
                     newPasswordErrorMsg.innerText = "Password must contain at least 1 uppercase and 1 lowercase alphabetical and at least 1 numeric character!"
                 }
            }
        }
    }
    
    //Onfocus on password's input
    newPasswordElt.onfocus = function(){
        //If error message exists
        if(newPasswordErrorMsg.innerText != ""){
            //Clear the text of password's input
            newPasswordElt.value = ""
        }
        //Clear the error message
        newPasswordErrorMsg.innerText = ""
    }

    //Declare error message and password's input
    let cofirmPasswordErrorMsg = document.getElementById("errorMessage")
    let confirmPasswordElt = document.getElementById("confirmPassword")

    //Onblur on password's input
    confirmPasswordElt.onblur = function(){
         //Get the password's input
        let confirmPasswordValue = confirmPasswordElt.value
        //Clear which empty on front and behind
        confirmPasswordValue = confirmPasswordValue.trim()
 
        //Check whether password's input is empty or not
        if (confirmPasswordValue.length == 0) {
            //Empty
            cofirmPasswordErrorMsg.innerText = "Confirm password cannot be empty!"
        }
        else{
            //Declare new password value
            let newPasswordValue = newPasswordElt.value

            //Verify password's input
            let confirmPasswordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}$/
            let conformPasswordOk = confirmPasswordRegExp.test(confirmPasswordValue)
            if(conformPasswordOk){
                //Check whether confirm password is match the new password or not
                if(newPasswordValue != confirmPasswordValue){
                    //Did not matched
                    cofirmPasswordErrorMsg.innerText = "The confirmed password does not match the new password!"
                }
                else{
                    //Matched
                    cofirmPasswordErrorMsg.innerText = ""
                }
            }
            else{
                //False
                cofirmPasswordErrorMsg.innerText = "The confirmed password does not match the new password!"
            }
        }
    }

    //Onfocus on password's input
    confirmPasswordElt.onfocus = function(){
        //If error message exists
        if(cofirmPasswordErrorMsg.innerText != ""){
            //Clear the text of password's input
            confirmPasswordElt.value = ""
        }
        //Clear the error message
        cofirmPasswordErrorMsg.innerText = ""
    }

    //Set an onclick event to Signup button
    let savePasswordBtn = document.getElementById("savePasswordBtn")
    savePasswordBtn.onclick = function(){
        //Trigger focus and blur event on the following data when signup button clicked
        newPasswordElt.focus()
        newPasswordElt.blur()

        confirmPasswordElt.focus()
        confirmPasswordElt.blur()

        //Check user's input is legal or not
        if(newPasswordErrorMsg.innerText=="" && cofirmPasswordErrorMsg.innerText==""){
            //Legal and submit
            let passwordChanger = document.getElementById("passwordChanger")
            passwordChanger.submit()
        }
    }
}