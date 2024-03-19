const activeSelect      = document.querySelector('#btn-active') 
const disabledSelect    = document.querySelector('#btn-disabled') 
const searchEmployers   = document.querySelector('#searchEmployers') 

const tableNormal = document.querySelector('#normal')
const tableSelect = document.querySelector('#select')

const trSelect = document.querySelector('#select>tr')

activeSelect.addEventListener('click',()=>{
    getEmployees('ativo')

    disabledSelect.disabled = false
    activeSelect.disabled   = true 
})

disabledSelect.addEventListener('click',()=>{
    getEmployees('desativado')

    activeSelect.disabled   = false
    disabledSelect.disabled = true

})

searchEmployers.addEventListener('blur',() => {
    const search = searchEmployers.value
    getEmployees(search[0].toUpperCase() + search.substring(1))
})

function getEmployees(statusOrName){
    $.ajax({
        url: 'http://localhost:8000/armazem/funcionarios/getEmployees',
        method: 'POST',
        dataType: 'json'
    }).done(function(res){
        tableSelect.innerHTML = ''
        for (let i = 0; i < res.length; i++) {

            if(res[i].name == statusOrName){
                tableSelect.style.display = ''
                tableNormal.style.display = 'none'
                
                tableSelect.innerHTML += `<tr>
                <td>${res[i].name}</td>
                <td>${res[i].dateOfBirth}</td>
                <td>${res[i].gender}</td>
                <td>${res[i].email}</td>
                <td>${res[i].phone}</td>
                <td>${res[i].status}</td>
                <td>${res[i].accessLevel}</td>
                <td><a href="funcionarios/Alterar/?pos=${res[i].id}">Alterar</a></td>
                                        </tr>`
                
                
            }else if(res[i].status == statusOrName){
                tableSelect.style.display = ''
                tableNormal.style.display = 'none'
                
                tableSelect.innerHTML += `<tr>
                <td>${res[i].name}</td>
                <td>${res[i].dateOfBirth}</td>
                <td>${res[i].gender}</td>
                <td>${res[i].email}</td>
                <td>${res[i].phone}</td>
                <td>${res[i].status}</td>
                <td>${res[i].accessLevel}</td>
                <td><a href="funcionarios/Alterar/?pos=${res[i].id}">Alterar</a></td>
                                        </tr>`
                
                
            }

        }

    })
}