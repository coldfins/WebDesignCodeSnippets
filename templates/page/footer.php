<footer>
	
<!-- Main Footer -->
<section class="main_footer py-5">
    <div class="our_container">
  
		<div class="row">
	      
		  <div class="col-lg-3 my-3 my-lg-0">
				<h3 class="footer-content__title">Service Links</h3>
                <ul class="footer-nav">
                    <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><span><a href="#">Jobs</a></span></li>
				    <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><span><a href="#">Unternehmen</a></span></li>
				    <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><span><a href="#">Persse / Medien</a></span></li>
                </ul>
          </div>
 
          <div class="col-lg-3 my-3 my-lg-0">
			     <h3 class="footer-content__title">Leistungsangebot</h3>
                 <ul class="footer-nav">
                     <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><a href="#">Kurs</a></span></li>
				     <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><a href="#">Kontaktformular</a></span></li>
                </ul>
          </div>

          <div class="col-lg-3 my-3 my-lg-0">
                 <h3 class="footer-content__title">Über uns</h3>
                 <ul class="footer-nav">
                       <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><a href="#">Arbeitshilfen</a></span></li>
				       <li class="py-1"><img src="../src/assets/images/arow_right.png" alt="list_style_arrow" class="mr-2"><a href="#">Checklisten</a></span></li>
                 </ul>
          </div>

	      <div class="col-lg-3 my-3 my-lg-0">
				<h3 class="footer-content__title _no-icon">Newsletter</h3>
 
			    <form>
				  <input type="email" class="main_footer_input_style mb-3" id="footer_email" placeholder="E-Mail" name="email"/>
				  <div>
				  <input class="styled-checkbox mt-1" id="main_footer_checkbox" type="checkbox">
                  <label for="main_footer_checkbox" class="main_footer_lable_style">Einverstandniserklarung</label>
				  </div>
                  <button class="main_footer_button"><a href="#">Abonnieren</a></button>
			   </form>
				
		  </div>
       
		</div>
		
    </div>
</section>

<!--SUB FOOTER-->

<section class="container-fluid sub_footer_background_color px-0">
    <div class="our_container">
	    
		<div class="row sub_footer py-2">
		    <div class="col-8 col-md-4 col-lg-3 order-2 order-md-1 py-2 py-md-0 pl-3 mx-auto">
			    <img src="../src/assets/images/logo.png" alt="footer-logo" class="img-fluid"/>
			</div>
			<div class="col-md-8 col-lg-9 my-auto order-1 order-md-2 py-2 py-md-0 text-md-left text-center">
			    <a href="#">Impressum</a>
			    <a href="#">Datenschutz</a>
			    <a href="#">AGB</a>
			</div>
		</div>
		
	</div>
</section>

</footer>


<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="../src/assets/scripts/bootstrap.bundle.min.js"></script>
<script src="../src/assets/scripts/main.min.js"></script>
<script src="../src/assets/scripts/jquery.min.js"></script>
<script src="../src/assets/scripts/owl.carousel.min.js"></script>
<script src="../src/assets/scripts/prefixfree.min.js"></script>
<script src="../src/assets/scripts/mobile-header.js"></script>
<script>
$(function($) {
// video player
	
	$(".play_icon").click(function () {
		$("#video")[0].src += "?autoplay=1";
		$(".video_hover_section").hide();
    });
	
});
</script>

<script>
   $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	navText: ["<img src='../src/assets/images/arow_left.png'>","<img src='../src/assets/images/arow_right.png'>"],
	dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
</script>
	
<script>
	$(document).ready(function(){
       $('.owl-carousel').owlCarousel();
	});
</script>
<script>
$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up  
$(window).resize(function(){
	if ($(window).width() >= 980){	

      // when you hover a toggle show its dropdown menu
      $(".navbar .dropdown-toggle").hover(function () {
         $(this).parent().toggleClass("show");
         $(this).parent().find(".dropdown-menu").toggleClass("show"); 
       });

        // hide the menu when the mouse leaves the dropdown
      $( ".navbar .dropdown-menu" ).mouseleave(function() {
        $(this).removeClass("show");  
      });
  
		// do something here
	}	
});  
  
  

// document ready  
});
	
</script>

<script>
    $(document).ready(function() {
        $(".mobile_menu").slideMobileMenu({
            onMenuLoad: function(menu) {
                console.log(menu)
                console.log("menu loaded")
            },
            onMenuToggle: function(menu, opened) {
                console.log(opened)
            }
        });
    })
</script>
</body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</body>
</html>
