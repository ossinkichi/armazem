let inputCode = document.querySelector('#code')
let inputProduct = document.querySelector('#name')
let inputPrice = document.querySelector('#price')
let inputQuant = document.querySelector('#quant')
let inputPriceAll = document.querySelector('#priceAll')

let items = []


function getProducts(){
    $.ajax({
        url: 'http://localhost/armazem/estoque/getEstoqueJson',
        method: 'POST',
        dataType: 'json'
    }).done(function(res){
        console.log(res)
        setCompra(res)
    })
}

function setCompra(res){
    inputCode.addEventListener('blur', function(){

            for(i = 0; i < res.length; i++){
                if(inputCode.value == res[i].code){
                    inputProduct.value = res[i].name
                    inputPrice.value = res[i].price
                    inputQuant.addEventListener('blur', function(){
                        inputPriceAll.value = (inputQuant.value * inputPrice.value)
                    })

                }else if(inputCode.value != res[i].code){
                    alert('Produto não encontrado!')
                }
            }
        })

}

getProducts()

function addProduct(){
    items = {
        'code': inputCode.value,
        'name': inputProduct.value,
        'price unid': inputPrice.value,
        'amount': inputQuant.value,
        'price all': inputPriceAll.value
    }

    console.log(items)
}