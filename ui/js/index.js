$(document).ready( function (){

    phpDeleteTest();
});

/*
        ----POST TEST----
function phpPostTest(){
    $.ajax({
        method: 'POST',
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
}*/

function createURL(url, parameters){
    
    for(let i=0; i <= parameters.length - 1; i++ ){

        url += `?${i}=${parameters[i]}`; 
        console.log(url);

    }

    return url;

}

function phpDeleteTest(){

    /*
    let url = createURL('http://localhost:8080/scandi/api/index.php', itemsToDelete);
    */
    let data = {
        skuToDelete:['4243NDSNKAKU'],
        args: {
            sku : '0',
            name: '0',
            price: 0,
        }
    };
    console.log(JSON.stringify(data));

    $.ajax({
        method: 'DELETE',
        url: 'http://localhost:8080/scandi/api/index.php',
        data: JSON.stringify(data)
    }).done(function (msg){
        console.log(msg);
    });
}