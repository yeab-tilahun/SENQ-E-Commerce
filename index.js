
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
