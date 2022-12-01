$(document).ready( function(){

    getProducts();
    $('#add-btn').click(toAddProductPage);
    $('#delete-product-btn').click(massDelete);

});

function getProducts(){
    $.ajax({
        method: 'GET',
        url: 'http://localhost:80/scandi/api/index.php?product=all'
    }).done(function (msg){
        let data = JSON.parse(msg);
        addProductsToContainer(data);
    });
}

function addProductsToContainer(data){
    let productHTML = ``;

    for (let product of data){

        productHTML += `<div class="box-container"> \n
        <div class="box"> \n
        <input type="checkbox" class="delete-checkbox"> \n
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

    //$('#product-container').append(productHTML);
    
    console.log(productHTML);

}

function toAddProductPage(){
    location.href = 'pages/addproduct.html';
}

function massDelete(){
    let skuToDelete = [];
    $('.delete-checkbox:checked + p').each( function() {
        skuToDelete.push($(this).text());
    });

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
        if (msg === 'SUCCESS'){
            getProducts();
        }
    });

}