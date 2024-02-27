const codeGenerated = len => {
    let code = '';
    do{
        code += Math.random().toString(6).substring(20)
    }while(code.length <= len){
        return code
    }
}

console.log(codeGenerated(7))