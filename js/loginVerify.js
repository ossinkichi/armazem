const email = document.querySelector('#mail')

email.addEventListener("change",getValue)

const getValue = ({target}) => {
    const valueOfinput = target.value
    if(valueOfinput.includes("@gmail.com")){
        console.log('foi')
    }
}