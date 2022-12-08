$(document).ready( function (){

    phpPostDVDTest();
    //phpDeleteTest();
});


function phpPostBookTest(){
    $.ajax({
        method: 'POST',
        url: 'http://localhost:80/scandi/api/index.php',
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
    $.ajax({
        method: 'DELETE',
        url: 'http://localhost:80/scandi/api/index.php',
        data: JSON.stringify(data)
    }).done(function (msg){
        console.log(msg);
    });
}


function phpGetTest(){

    $.ajax({
        method: 'GET',
        url: 'http://localhost:80/scandi/api/index.php?product=all'
    }).done(function (msg){
        console.log(msg);
    });
}

function phpPostFurnitureTest(){
    $.ajax({
        method: 'POST',
        url: 'http://localhost:80/scandi/api/index.php',
        data: {
            args : {
                sku : 'FWELUOHI43I7',
                name: 'Table',
                price: 400,
                length: 70,
                width: 13,
                height: 6
            },
            productType: 'Furniture'
        }
    }).done(function (msg){
        console.log(msg);
    });
}

function phpPostDVDTest(){
    $.ajax({
        method: 'POST',
        url: 'http://localhost:80/scandi/api/index.php',
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