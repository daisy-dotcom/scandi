$(document).ready( function (){

    //phpPostFurnitureTest();
    //phpPostDVDTest();
    //phpPostBookTest();
    //phpGetTest();
});


function phpPostBookTest(){
    let url = 'http://localhost:80/scandi/api/index.php'
    $.ajax({
        method: 'POST',
        url: url,
        data: {
            args : {
                sku : '4243NDSNKAKU',
                name: 'Carrie',
                price: 50.50,
                weight: 15
            },
            productType: 'Book'
        }
    }).done(function (msg){
        console.log(msg);
    });
}


function phpDeleteTest(){

    let data = {
        skuToDelete:['4243NDSNKAKU','FWELUOHI43I7'],
        args: {
            sku : '0',
            name: '0',
            price: 0,
        }
    };

    let url = 'http://localhost:80/scandi/api/index.php';
    $.ajax({
        method: 'DELETE',
        url: url,
        data: JSON.stringify(data)
    }).done(function (msg){
        console.log(msg);
    });
}


function phpGetTest(){
    let url = 'http://localhost:80/scandi/api/index.php?product=all';
    $.ajax({
        method: 'GET',
        url: url
    }).done(function (msg){
        console.log(msg);
    });
}

function phpPostFurnitureTest(){

    let url = 'http://localhost/scandi/api/index.php';

    $.ajax({
        method: 'POST',
        url: url,
        data: {
            args : {
                sku : 'ER89YH4ERIU',
                name: 'Ottoman',
                price: 340,
                length: 10,
                width: 45,
                height: 7
            },
            productType: 'Furniture'
        }
    }).done(function (msg){
        console.log(msg);
    });
}

function phpPostDVDTest(){
    let url = 'http://localhost:80/scandi/api/index.php';

    $.ajax({
        method: 'POST',
        url: url,
        data: {
            args : {
                sku : 'FWELUOHI43I7',
                name: 'Scott Pilgrim Saves the World',
                price: 70,
                size: 4
            },
            productType: 'DVD'
        }
    }).done(function (msg){
        console.log(msg);
    });
}