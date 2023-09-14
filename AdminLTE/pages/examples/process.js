let deleteButton = document.querySelectorAll(".btn-danger");

deleteButton.forEach(function(item){
    item.addEventListener("click",tikla);
})

function tikla(e)
{
    let as = e.target.parentElement.parentElement;
    let number = as.children[0].textContent.trim();
    // id değerini tutar

    // console.log("1");
    as.remove();
    requestResponse(number,as);

    e.preventDefault();
}


function requestResponse(number)
{
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            console.log("312");
        }
    }
    request.open("GET","deleteTry.php?p="+number,true);
    request.send();
}


// console.log(deleteButton);