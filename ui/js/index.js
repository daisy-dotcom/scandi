$(document).ready( function (){

    phpTest();
});

function phpTest(){
    $.ajax({
        method: 'POST',
        url: 'http://localhost:8080/scandi/api/index.php',
        data: {
            sku: '4243NDSNKAKU',
            name: 'Carrie',
            price: '50.50',
            size: '15',
            productType: 'Book',
            request: 'insert'
        }
    }).done(function (msg){
        console.log(msg);
    });
}