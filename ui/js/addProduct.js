const subForm = {
    DVD: `<legend>Please enter the size of the DVD to the closest whole number</legend> \n
        <label for="size">Size (MB)</label> \n
        <input id="size" type="number" min="0" step="1" name="size" required>`,
    Book: `<legend>Please enter the weight of the book to the closest whole number</legend> \n
        <label for="weight">Weight (KG)</label> \n
        <input id="weight" type="number" min="0" step="1" name="weight" required>`,
    Furniture: `<legend>Please enter the height, width and length of the piece of furniture 
    to the closest whole number</legend> \n
    <label for="height">Height (CM)</label> \n
    <input id="height" type="number" min="0" step="1" name="height" required> \n

    <label for="width">Width (CM)</label> \n
    <input id="width" type="number" min="0" step="1" name="width" required> \n

    <label for="length">Length (CM)</label> \n
    <input id="length" type="number" min="0" step="1" name="length" required>`

};

$(document).ready( function(){
    $('#productType').change(generateSubForm);
    $('button').click(buttonEventListener);

});

function generateSubForm(){
    if($('#product_form fieldset').next()){
        $('#product_form fieldset').next().remove();
    };

    let subFormHTML = `<fieldset> \n`;
    subFormHTML += subForm[$(this).val()];
    subFormHTML += ` \n </fieldset> \n`;

    $(subFormHTML).insertAfter('#product_form fieldset');

}

function buttonEventListener(){
    if ($(this).text() === 'SAVE'){
        validateForm();
    }
    else{
        cancelProductAdd();
    }
}

function validateForm(){
    let data = {};

    let isValid = true;
    
    $('#product_form fieldset input, #product_form fieldset select').each( function(){
            let element = $(this).get(0);
            if(!element.checkValidity()){
                isValid = false;
                console.log(element);
                console.log(element.validationMessage);
                displayErrorMessage(element.validationMessage);
                return false;
            }
            
            else{
                data[element.id] = element.value;
            }
        }
    );

    if (isValid){
        console.log(data);
        postData(data);
    }
}

function displayErrorMessage(err){
    let errorMessage;

    if((err.includes("fill")) || (err.includes("select"))){
        errorMessage = "Please submit required data";
    }
    else{
        errorMessage = "Please provide the data of indicated type";
    }

    if(!$('.error-msg').length){
        $('.container').prepend(`<p class="error-msg">${errorMessage}</p>`);
    }
    else{
        $('.error-msg').text(errorMessage);
    }
}

function postData(data){
    let productType = data.productType;
    let args = delete data.productType ? data : {};

    $.ajax({
        method: 'POST',
        url: 'http://localhost:80/scandi/api/index.php',
        data: {
            productType: productType,
            args : args
        }
    }).done(function (msg){
        if (msg === "SUCCESS"){
            toHomePage();
        }
    });
    
}

function toHomePage() {
    location.href = "../index.html";
}

function cancelProductAdd(){
    toHomePage();
}
