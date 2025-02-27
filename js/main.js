document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById('container');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  if (registerBtn && loginBtn) {
      registerBtn.addEventListener('click', () => {
          container.classList.add("active");
      });

      loginBtn.addEventListener('click', () => {
          container.classList.remove("active");
      });
  } 
});
function toggleInvoiceInfo() {
  const invoiceInfo = document.getElementById('invoice-info');
  if (invoiceInfo.classList.contains('hidden')) {
      invoiceInfo.classList.remove('hidden');
  } else {
      invoiceInfo.classList.add('hidden');
  }
}
function toggleInvoiceInfo() {
  const invoiceInfo = document.getElementById('invoice-info');
  const arrowIcon = document.getElementById('arrow-icon');

  if (invoiceInfo.classList.contains('hidden')) {
      invoiceInfo.classList.remove('hidden');
      arrowIcon.classList.add('rotate-180'); // Xoay mũi tên xuống
  } else {
      invoiceInfo.classList.add('hidden');
      arrowIcon.classList.remove('rotate-180'); // Xoay mũi tên lên
  }
}
jQuery(document).ready(function($) {

	'use strict';
      
      $('#form-submit .date').datepicker({
      });

      var owl = $("#owl-suiteroom");

        owl.owlCarousel({
          
          pagination : true,
          paginationNumbers: false,
          autoPlay: 6000, //Set AutoPlay to 3 seconds
          items : 1, //10 items above 1000px browser width
          itemsDesktop : [1000,1], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,1], // betweem 900px and 601px
          itemsTablet: [600,1], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
          
      });


      var owl = $("#owl-mostvisited");

        owl.owlCarousel({
          
          pagination : true,
          paginationNumbers: false,
          autoPlay: 6000, //Set AutoPlay to 3 seconds
          items : 4, //10 items above 1000px browser width
          itemsDesktop : [1000,4], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,2], // betweem 900px and 601px
          itemsTablet: [600,1], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
          
      });


        
        $('.recommendedgroup > div').hide();
        $('.recommendedgroup > div:first-of-type').show();
        $('.tabs a').click(function(e){
          e.preventDefault();
            var $this = $(this),
            tabgroup = '#'+$this.parents('.tabs').data('recommendedgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
        })


        $('.weathergroup > div').hide();
        $('.weathergroup > div:first-of-type').show();
        $('.tabs a').click(function(e){
          e.preventDefault();
            var $this = $(this),
            tabgroup = '#'+$this.parents('.tabs').data('weathergroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
        })


        $('.tabgroup > div').hide();
        $('.tabgroup > div:first-of-type').show();
        $('.tabs a').click(function(e){
          e.preventDefault();
            var $this = $(this),
            tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
        })



        $(".pop-button").click(function () {
            $(".pop").fadeIn(300);
            
        });

        $(".pop > span").click(function () {
            $(".pop").fadeOut(300);
        });


        $(window).on("scroll", function() {
            if($(window).scrollTop() > 100) {
                $(".header").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
               $(".header").removeClass("active");
            }
        });


	/************** Mixitup (Filter Projects) *********************/
    	$('.projects-holder').mixitup({
            effects: ['fade','grayscale'],
            easing: 'snap',
            transitionSpeed: 400
        });

        
});
function validateForm(event) {
  var from = document.getElementById("from").value;
  var to = document.getElementById("to").value;
  var departure = document.getElementById("departure").value;
  var returnDate = document.getElementById("return").value;

  // Kiểm tra điểm đi và điểm đến trùng nhau
  if (from === to) {
      Swal.fire({
          icon: "error",
          title: "Lỗi!",
          text: "Điểm đi và điểm đến không được trùng nhau!",
          confirmButtonText: "OK",
          timer: 3000
      });
      event.preventDefault(); // Ngăn form gửi đi
      return false;
  }

  // Kiểm tra ngày về phải sau ngày đi
  if (returnDate && departure && returnDate <= departure) {
      Swal.fire({
          icon: "warning",
          title: "Ngày không hợp lệ!",
          text: "Ngày về phải sau ngày đi!",
          confirmButtonText: "OK",
          timer: 3000
      });
      event.preventDefault(); // Ngăn form gửi đi
      return false;
  }
}
document.addEventListener("DOMContentLoaded", function () {
  let today = new Date().toISOString().split("T")[0]; // Lấy ngày hôm nay dưới dạng YYYY-MM-DD

  // Gán thuộc tính `min` cho input ngày đi & ngày về
  document.getElementById("departure").min = today;
  document.getElementById("return").min = today;

  // Ngăn người dùng nhập ngày cũ bằng bàn phím
  document.getElementById("departure").addEventListener("input", function () {
      if (this.value < today) {
          this.value = today;
      }
  });

  document.getElementById("return").addEventListener("input", function () {
      if (this.value < today) {
          this.value = today;
      }
  });
});