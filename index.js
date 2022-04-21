
// to change the width of the combo box accordingly
function validate()
{
 var drop_down = document.getElementById("cat-for-search");
 var selected_item = drop_down.options[drop_down.selectedIndex].value

    if (selected_item == "All")
   {
    drop_down.style.width="45px";
   }
   
   else if (selected_item == "Electronics")
   {
    drop_down.style.width="99px";
   }

   else if (selected_item == "Cosmetics")
   {
    drop_down.style.width="97px";
   }

   else if (selected_item == "Clothes")
   {
    drop_down.style.width="78px";
   }

   else if (selected_item == "Furniture")
   {
    drop_down.style.width="90px";
   }

   else if (selected_item == "Foods")
   {
    drop_down.style.width="68px";
   }

   
}
validate()

// for top nav to minimize size when scroll
const nav = document.querySelector('#top');
const icon =  document.getElementById('icon');
const icon2 =  document.getElementById('icon2');
const icon3  =  document.getElementById('icon3');
const icon4 =  document.getElementById('icon4');


let navTop = nav.offsetTop;

function fixedNav() {
  if (window.scrollY > navTop) {    
    nav.classList.add('fixed');  
    icon.classList.remove('fa-2x');    
    icon2.classList.remove('fa-2x');    
    icon3.classList.remove('fa-2x');    
    icon4.classList.remove('fa-2x');     
  } 
  else {
    nav.classList.remove('fixed');    
    icon.classList.add('fa-2x');    
    icon2.classList.add('fa-2x');    
    icon3.classList.add('fa-2x');    
    icon4.classList.add('fa-2x'); 
  }
}

window.addEventListener('scroll', fixedNav);