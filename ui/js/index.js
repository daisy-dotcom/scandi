$(document).ready( function(){

    $('#add-btn').click(addButtonEventListener);
    $('#delete-product-btn').click(massDeleteEventListener);

});

function addButtonEventListener(e){
    location.href = 'pages/addproduct.html';
}

function massDeleteEventListener(e){
    let skuToDelete = [];
    $('.delete-checkbox:checked + p').each( function() {
        skuToDelete.push($(this).text());
    });
    
    console.log(skuToDelete);
}