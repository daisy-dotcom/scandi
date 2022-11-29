const subForm = {
    DVD: `<label for="size">Size (MB)</label> \n
        <input id="size" type="number" min="0" step="1" name="size" required>`,
    Book: `<label for="weight">Weight (KG)</label> \n
        <input id="weight" type="number" min="0" step="1" name="weight" required>`,
    Furniture: `<label for="height">Height (CM)</label> \n
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
    $('#sub-form').html('')
    $('#sub-form').append(subForm[$(this).val()]);
}

function buttonEventListener(){
    if ($(this).text() === 'SAVE'){
        saveProduct();
    }
    else{
        cancelProductAdd();
    }
}

function saveProduct(){
    $('#product_form').validate();
    console.log(validator.errors()); 


}