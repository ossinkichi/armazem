let inputCode = document.querySelector('.code')
let inputProduct = document.querySelector('.name')
let inputAmount = document.querySelector('.amount')
let btnSubmit = document.querySelector('.btn-success')


$.ajax({
    url: 'http://localhost:8000/armazem/estoque/getEstoqueJson',
    method: 'POST',
    dataType: 'json'
}).done(function(res){
    console.log(res)

    inputCode.addEventListener('blur', ()=>{
        for(let i = 0; i < res.length; i++){
            if(res[i].code == inputCode.value){
                inputProduct.value = res[i].name
            }
        }
    })
})

btnSubmit.addEventListener('click',()=>{
    alert('clicado')
})







// function setCompra(res){
//     inputCode.addEventListener('blur', function(){

//             for(i = 0; i < res.length; i++){
//                 console.log(res)
//                 // if(inputCode.value == res[i].code){
//                 //     inputProduct.value = res[i].name
//                 //     inputPrice.value = res[i].price
//                 //     inputQuant.addEventListener('blur', function(){
//                 //         inputPriceAll.value = (inputQuant.value * inputPrice.value)
//                 //     })

//                 // }else if(inputCode.value != res[i].code){
//                 //     alert('Produto não encontrado!')
//                 // }
//             }
//         })

// }