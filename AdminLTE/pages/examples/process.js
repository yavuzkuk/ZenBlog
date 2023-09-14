let deleteButton = document.querySelectorAll(".btn-danger");
// class değeri btn-danger olan bütün tagler bulunur
deleteButton.forEach(function(item){
    item.addEventListener("click",tikla);
    // bu taglere tek tek click eventi atanır
})

function tikla(e)
{
    let as = e.target.parentElement.parentElement;
    let number = as.children[0].textContent.trim();
    // id değerini tutar

    as.remove(); // blog değeri silinir
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
