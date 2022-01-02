function searchtext()
{
    // Characters to be escaped [.*+?^${}()|[\]\\] 
    let textToSearch = document.getElementById("search-field").value.toLowerCase();
    let paragraph1 = document.getElementsByClassName("modal-desc")[0];

    let paragraph2 = document.getElementsByClassName("modal-title")[0];

    textToSearch = textToSearch.replace(/[.*+?^${}()|[\]\\]/g,"\\$&");

    let pattern = new RegExp(`${textToSearch}`,"gi");

    paragraph1.innerHTML = paragraph1.textContent.replace(pattern, match => `<mark>${match}</mark>`);
    paragraph2.innerHTML = paragraph2.textContent.replace(pattern, match => `<mark>${match}</mark>`);

}
