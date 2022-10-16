$(document).ready( function (){

    phpTest();
});

function phpTest(){
    $.ajax({
        method: 'DELETE',
        url: 'http://localhost:8080/scandi/api/index.php',
        data: {
            args : {
                sku : '',
                name: '',
                price: 0,
            },
            skuToDelete: ['4243NDSNKAKU'],
            productType: 'Product',
            request: 'delete'
        }
    }).done(function (msg){
        console.log(msg);
    });
}