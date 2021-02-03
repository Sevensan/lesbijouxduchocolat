window.onscroll = ()=>{
    if(document.documentElement.scrollTop > 80){
        document.getElementById("borderNav").style.left = "100%";
        document.getElementById("borderNav").style.background = "linear-gradient(370deg, rgba(37,37,37,1) 0%, rgba(218,165,32,1) 100%)";
    }
    else{
        document.getElementById("borderNav").style.left = "0";
        document.getElementById("borderNav").style.background = "rgba(218,165,32,1)";
    }
}

let nav = document.getElementById("navbar").offsetHeight;
let h1 = document.getElementById("h1");
h1.style.paddingTop = nav + 'px';


let imgCat = document.getElementsByClassName("bgCat");
console.log(imgCat);

// function imgClick(){
//     imgCat.addEventListener("click", );
// }
// imgClick();