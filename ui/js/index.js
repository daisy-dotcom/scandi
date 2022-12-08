$(document).ready( function(){

    getProducts();
    $('#add-btn').click(toAddProductPage);
    $('#delete-product-btn').click(massDelete);

});

function getProducts(){
    let url = 'http://localhost:80/scandi/api/index.php?product=all';
    $.ajax({
        method: 'GET',
        url: url
    }).done(function (msg){
        //console.log(msg);
        let data = JSON.parse(msg);
        addProductsToContainer(data);
    });
}

function addProductsToContainer(data){
    $('#product-container').html('');
    
    let productHTML = ``;

    for (let product of data){

        productHTML += `<div class="box-container"> \n
        <input type="checkbox" class="delete-checkbox"> \n
        <div class="box"> \n
        <p>${product.sku}</p> \n
        <p>${product.name}</p> \n
        <p><span>${parseInt(product.price).toFixed(2)}</span> $</p> \n `;

        if (product.weight){
            productHTML += `<p>Weight: <span>${product.weight}</span>KG</p> \n`;
        }

        else if (product.size){
            productHTML += `<p>Size: <span>${product.size}</span> MB</p> \n`;
        }

        else{
            productHTML += `<p>Dimensions: 
            <span>${product.height}x${product.width}x${product.length}
            </span></p> \n`;
        }

        productHTML += `</div> \n
        </div> \n`;
    
    }

    $('#product-container').append(productHTML);

}

function toAddProductPage(){
    location.href = '../../add-product.html';
}

function massDelete(){
    let skuToDelete = [];
    $('.delete-checkbox:checked + div > p:first-child').each( function() {
        skuToDelete.push($(this).text());
    });
    //console.log(skuToDelete);
    dbDelete(skuToDelete);

}

function dbDelete(skuToDelete){
    let data = {
        skuToDelete: skuToDelete,
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
        //console.log(`Delete log: ${msg}`)
        //console.log(msg=='SUCCESS');
        if (msg == "SUCCESS"){
            getProducts();
        }
    });

}