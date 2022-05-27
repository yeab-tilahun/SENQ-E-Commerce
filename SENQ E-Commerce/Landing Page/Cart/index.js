    // nav
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
    
    
    
    
    
    //CArt starts here 

    /* Set rates + misc */
    var taxRate = 0.05;
    var shippingRate = 15.00; 
    var fadeTime = 300;
    
    
    /* Assign actions */
    $('.product-quantity input').change( function() {
      updateQuantity(this);
    });
    
    $('.product-removal button').click( function() {
      removeItem(this);
    });
    
    
    /* Recalculate cart */
    function recalculateCart()
    {
      var subtotal = 0;
      
      /* Sum up row totals */
      $('.product').each(function () {
        subtotal += parseFloat($(this).children('.product-line-price').text());
      });
      
      /* Calculate totals */
      var tax = subtotal * taxRate;
      var shipping = (subtotal > 0 ? shippingRate : 0);
      var total = subtotal + tax + shipping;
      
      /* Update totals display */
      $('.totals-value').fadeOut(fadeTime, function() {
        $('#cart-subtotal').html(subtotal.toFixed(2));
        $('#cart-tax').html(tax.toFixed(2));
        $('#cart-shipping').html(shipping.toFixed(2));
        $('#cart-total').html(total.toFixed(2));
        if(total == 0){
          $('.checkout').fadeOut(fadeTime);
        }else{
          $('.checkout').fadeIn(fadeTime);
        }
        $('.totals-value').fadeIn(fadeTime);
      });
    }
    
    
    /* Update quantity */
    function updateQuantity(quantityInput)
    {
      /* Calculate line price */
      var productRow = $(quantityInput).parent().parent();
      var price = parseFloat(productRow.children('.product-price').text());
      var quantity = $(quantityInput).val();
      var linePrice = price * quantity;
      
      /* Update line price display and recalc cart totals */
      productRow.children('.product-line-price').each(function () {
        $(this).fadeOut(fadeTime, function() {
          $(this).text(linePrice.toFixed(2));
          recalculateCart();
          $(this).fadeIn(fadeTime);
        });
      });  
    }
    
    
    /* Remove item from cart */
    function removeItem(removeButton)
    {
      /* Remove row from DOM and recalc cart total */
      var productRow = $(removeButton).parent().parent();
      productRow.slideUp(fadeTime, function() {
        productRow.remove();
        recalculateCart();
      });
    }



