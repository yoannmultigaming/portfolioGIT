let etap2 = 0;

function enleveractiveimage(){
  for(let i = 0 ; i < 3 ; i ++) {
    img__silder2[i].classList.remove('active')
  }
}

setInterval(function() {
  etap2++;
  if (etap2 >= 3) {
    etap2 = 0;
  }
  enleveractiveimage();
  img__silder2[etap2].classList.add('active');

}, 3000)