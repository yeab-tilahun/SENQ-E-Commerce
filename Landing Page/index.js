(function($) { // Begin jQuery
    $(function() { // DOM ready
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.nav-dropdown').toggle();
        // Close one dropdown when selecting another
        $('.nav-dropdown').not($(this).siblings()).hide();
        e.stopPropagation();
      });
      // Clicking away from dropdown will remove the dropdown class
      $('html').click(function() {
        $('.nav-dropdown').hide();
      });
      // Toggle open and close nav styles on click
      $('#nav-toggle').click(function() {
        $('nav ul').slideToggle();
      });
      // Hamburger to X toggle
      $('#nav-toggle').on('click', function() {
        this.classList.toggle('active');
      });
    }); // end DOM ready
  })(jQuery); // end jQuery





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
    drop_down.style.width="79px";
   }

   else if (selected_item == "Cloths")
   {
    drop_down.style.width="68px";
   }

   else if (selected_item == "Furniture")
   {
    drop_down.style.width="90px";
   }

   else if (selected_item == "Beauty Supplies")
   {
    drop_down.style.width="63px";
   }

   else if (selected_item == "Office Supplies")
   {
    drop_down.style.width="59px";
   }
   else if (selected_item == "Sport and Fitness")
   {
    drop_down.style.width="58px";
   }
   else if (selected_item == "Computer and  Accessories")
   {
    drop_down.style.width="84px";
   }
   else if (selected_item == "Other")
   {
    drop_down.style.width="58px";
   }
   else if (selected_item == "Books")
   {
    drop_down.style.width="58px";
   }
}


//SLider
(function() {

	function init(item) {
		var items = item.querySelectorAll('li'),
        current = 0,
        autoUpdate = true,
        timeTrans = 5000;

		items[current].className = "current";
		if (items.length > 1) items[items.length-1].className = "prev_slide";

		var navigate = function(dir) {
			items[current].className = "";

			if (dir === 'right') {
				current = current < items.length-1 ? current + 1 : 0;
			} else {
				current = current > 0 ? current - 1 : items.length-1;
			}

			var	nextCurrent = current < items.length-1 ? current + 1 : 0,
				prevCurrent = current > 0 ? current - 1 : items.length-1;

			items[current].className = "current";
			items[prevCurrent].className = "prev_slide";
			items[nextCurrent].className = "";
		}
    
    item.addEventListener('mouseenter', function() {
			autoUpdate = false;
		});

		item.addEventListener('mouseleave', function() {
			autoUpdate = true;
		});

		setInterval(function() {
			if (autoUpdate) navigate('right');
		},timeTrans);

	}

	[].slice.call(document.querySelectorAll('.cd-slider')).forEach( function(item) {
		init(item);
	});

})();



  BtnsAddtoCart=document.querySelectorAll(".addtocart");  
  for(i=0;i<BtnsAddtoCart.length;i++){
    BtnsAddtoCart[i].onclick=()=>{
      window.open("Products/index.php?search_input=&cat=All","_self")
    }
  }


  

// Brands for mobile view
// let slideIndex = 0;            
// function showSlides() {
//     let i;
//     let slides = document.getElementsByClassName("brands-mob");
//     for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//     }
//     slideIndex++;
//     if (slideIndex >= slides.length-1) {slideIndex =1}    
//     slides[slideIndex].style.display = "block";  

//     setInterval( setTimeout(showSlides, 2000))// Change image every 2 seconds
//   }
  
//   setInterval(function() {
//     $(window).resize(function() {
//       if ($(window).width() < 760) {
//         showSlides();
//       }
//      else {
//      }
//     });
  
//   },2000);