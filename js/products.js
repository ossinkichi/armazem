const inputCode = document.querySelector('.code')
const inputProduct = document.querySelector('.name')
const inputAmount = document.querySelector('.amount')
const btnSubmit = document.querySelector('.btn')


$.ajax({
    url: 'http://localhost:8000/estoque/getEstoqueJson',
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


$('#form').submit(function(e){
    e.preventDefault()

    let code   = inputCode.value
    let name   = inputProduct.value
    let amount = inputAmount.value

    $.ajax({
        url: 'http://localhost:8000/estoque/addOrder',
        method: 'POST',
        data: {name: name, code: code, amount: amount},
        dataType: 'json'
    }).done(function(res){
        console.log(res)
    })
})