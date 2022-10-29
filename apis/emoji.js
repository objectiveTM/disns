url = "http://127.0.0.1:5500"
let html = document.body.innerHTML
    .replace(/{emoji:(.*)}/gim , `<img src="${url}/apis/imgs/$1.png" width=30px/>`)

document.body.innerHTML = html;