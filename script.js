function checkCookTime(){
    let number = document.getElementById("cooktime");

    if(number.value < 0){
        number.value = 0;
    }
}