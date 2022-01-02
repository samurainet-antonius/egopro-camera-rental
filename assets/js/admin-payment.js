function batal(){
    $.ajax({
        url:'../ajax/batal.php',
        method:'GET',
        success: function(data) {
            console.log(data)
        }
    });
}

setInterval(batal,1000);

function checkStatus(){
    $.ajax({
        url:'ajax/payment.php',
        method:'GET',
        success: function(data) {
            console.log(data)
        }
    });
}

setInterval(checkStatus,1000);