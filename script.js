let button_RUB = document.querySelector('.RUB');
let button_UAH = document.querySelector('.UAH');
let button_USD = document.querySelector('.USD');
let currency = document.querySelector('.my_hidden_input').value;

console.log(currency);
async function request() {
      const promis = await fetch("http://data.fixer.io/api/latest&rates?access_key=9a16ba7cc162face7a997a6078ab4e9e");
      if(promis.ok){
            const bank = await promis.json();
           return bank;
      }else{
            console.error(`Error ${promis.status}`);
      }
     
}

async function load(){
      // await request();
      let test = await request().then(function(text){
           return text.rates;
      });
      button_RUB.onclick = function(){
            window.location = `tours.php?pain=${test.RUB}&znak=₽`;  
      }
      button_UAH.onclick = function(){
            window.location = `tours.php?pain=${test.UAH}&znak=₴`;  
      }
      button_USD.onclick = function(){
            window.location = `tours.php?pain=${test.USD}&znak=$`;  
      }
            
}
load();
// button_RUB.onclick = load();
// button_UAH.onclick = load();
if(currency != ''){
      setInterval(load_2_0,60000 * 60); 
}
async function load_2_0(){
      let test = await request().then(function(text){
           return text.rates;
      });
      if(currency == '₽'){
            window.location = `tours.php?pain=${test.RUB}&znak=₽`; 
      }
      if(currency == '₴'){
            window.location = `tours.php?pain=${test.UAH}&znak=₴`;     
      }  
      if(currency == '$'){
            window.location = `tours.php?pain=${test.USD}&znak=$`;     
      }             
}

//34.10478
// document.querySelector('.calc_cousrs').onclick = function(){
      // jQuery(document).ready(function($){
      //       $.ajax({
      //             type: 'POST',
      //             url: 'rates.php',
      //             //dataType: 'json',
      //             data:{
      //                   "rates":'154',
      //             },
                  // success: function(){
                  //       document.querySelector('.i_delete_it_later').text('All is good');
                  // }
      //       })
      //     });
           
      // }