$(document).on("click", ".quantity .sub", function () {
    let doc = $(this).parent()[0];
    for (var i = 0; i < doc.childNodes.length; i++) {
        if (doc.childNodes[i].className == "quantity-input") {
            if(doc.childNodes[i].value == 0)  break;
            doc.childNodes[i].value = parseInt(doc.childNodes[i].value) - 1;
            break;
        }
    }
});
$(document).on("click", ".quantity .plus", function () {
    let doc = $(this).parent()[0];
    for (var i = 0; i < doc.childNodes.length; i++) {
        if (doc.childNodes[i].className == "quantity-input") {
            doc.childNodes[i].value = parseInt(doc.childNodes[i].value) + 1;
            break;
        }
    }
});
$(document).on("click", ".delete-link a", function () {
    $(this).parent()[0].parentElement.parentElement.remove();
});