//  Carrossel
const imgs = document.getElementById("img");
//const img_length = document.querySelectorall("#img img");
const img = document.querySelector("#img img");
//const img_width=  0;
let idx = 0;


function carrosel(){
    idx++;

    if(idx > 3 - 1){
        idx=0;
        //imgs.style.transform = `translateX(${-idx * 0}px)`;
    }

    img_width = tamanho(img);
    imgs.style.transform = `translateX(${-idx * img_width}px)`;
}

setInterval(carrosel, 2500);

function tamanho(img) {
  const img_width = img.width;
  return img_width;
  //alert(img_width);
}
//var img2 = new Image();
