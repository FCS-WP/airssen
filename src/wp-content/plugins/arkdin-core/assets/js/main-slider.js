;(function($){
    $(window).on('elementor/frontend/init',function(){
      
      function slickInit() {
        if ($.exists('.cs_slider')) {
          $('.cs_slider').each(function () {
            // Slick Variable
            var $ts = $(this).find('.cs_slider_container');
            var $slickActive = $(this).find('.cs_slider_wrapper');
            // Auto Play
            var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
            // Auto Play Time Out
            var autoplaySpdVar = 3000;
            if (autoPlayVar > 1) {
              autoplaySpdVar = autoPlayVar;
              autoPlayVar = 1;
            }
            // Slide Change Speed
            var speedVar = parseInt($ts.attr('data-speed'), 10);
            // Slider Loop
            var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
            // Slider Center
            var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
            // Variable Width
            var variableWidthVar = Boolean(
              parseInt($ts.attr('data-variable-width'), 10),
            );
            // Pagination
            var paginaiton = $(this)
              .find('.cs_pagination')
              .hasClass('cs_pagination');
            // Slide Per View
            var slidesPerView = $ts.attr('data-slides-per-view');
            if (slidesPerView == 1) {
              slidesPerView = 1;
            }
            if (slidesPerView == 'responsive') {
              var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
              var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
              var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
              var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
              var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
            }
            // Fade Slider
            var fadeVar = parseInt($($ts).attr('data-fade-slide'));
            fadeVar === 1 ? (fadeVar = true) : (fadeVar = false);

            // Slick Active Code
            $slickActive.slick({
              autoplay: autoPlayVar,
              dots: paginaiton,
              centerPadding: '28%',
              speed: speedVar,
              infinite: loopVar,
              autoplaySpeed: autoplaySpdVar,
              centerMode: centerVar,
              fade: fadeVar,
              prevArrow: $(this).find('.cs_left_arrow'),
              nextArrow: $(this).find('.cs_right_arrow'),
              appendDots: $(this).find('.cs_pagination'),
              slidesToShow: slidesPerView,
              variableWidth: variableWidthVar,
              swipeToSlide: true,
              responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: lgPoint,
                  },
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: mdPoint,
                  },
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: smPoint,
                  },
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: xsPoing,
                  },
                },
              ],
            });
          });
        }
        
        $('.cs_service_product_thumb').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          asNavFor: '.cs_service_product_nav',
          appendDots: $('.cs_pagination_2'),
        });

        $('.cs_service_product_nav').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          asNavFor: '.cs_service_product_thumb',
          focusOnSelect: true,
          prevArrow: $('.cs_service_product_nav_left_arrow'),
          nextArrow: $('.cs_service_product_nav_right_arrow'),
          responsive: [
            {
              breakpoint: 1400,
              settings: {
                slidesToShow: 4,
              },
            },
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      }

      var triggerSwiper = [
        'hero-banner',
        'tg-team',
        'testimonial',
        'arkdin-portfolio',
        'services',
      ];
      
      $.each(triggerSwiper, function(index, item) {
        elementorFrontend.hooks.addAction('frontend/element_ready/' + item + '.default', function($scope, $) {
          slickInit();
        });
      });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/hero-banner.default', function(scope,$){  

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });
      
          if ($.exists('.cs_video_open')) {
            $('body').append(`
              <div class="cs_video_popup">
                <div class="cs_video_popup-overlay"></div>
                <div class="cs_video_popup-content">
                  <div class="cs_video_popup-layer"></div>
                  <div class="cs_video_popup-container">
                    <div class="cs_video_popup-align">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="about:blank"></iframe>
                      </div>
                    </div>
                    <div class="cs_video_popup-close"></div>
                  </div>
                </div>
              </div>
            `);
            $(document).on('click', '.cs_video_open', function (e) {
              e.preventDefault();
              var video = $(this).attr('href');

              $('.cs_video_popup-container iframe').attr('src', `${video}`);

              $('.cs_video_popup').addClass('active');
            });
            $('.cs_video_popup-close, .cs_video_popup-layer').on(
              'click',
              function (e) {
                $('.cs_video_popup').removeClass('active');
                $('html').removeClass('overflow-hidden');
                $('.cs_video_popup-container iframe').attr('src', 'about:blank');
                e.preventDefault();
              },
            );
          }      

        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/about.default', function(scope,$){

        $('.cs_tabs .cs_tab_links a').on('click', function (e) {
          var currentAttrValue = $(this).attr('href');
          $('.cs_tabs ' + currentAttrValue)
            .fadeIn(400)
            .siblings()
            .hide();
          $(this).parents('li').addClass('active').siblings().removeClass('active');
          e.preventDefault();
        });

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/services.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });          

        $('.cs_tabs .cs_tab_links a').on('click', function (e) {
          var currentAttrValue = $(this).attr('href');
          $('.cs_tabs ' + currentAttrValue)
            .fadeIn(400)
            .siblings()
            .hide();
          $(this).parents('li').addClass('active').siblings().removeClass('active');
          e.preventDefault();
        });


        }); 

        elementorFrontend.hooks.addAction( 'frontend/element_ready/features.default', function(scope,$){
            
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });   


        elementorFrontend.hooks.addAction( 'frontend/element_ready/testimonial.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/arkdin-cta.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });


        });  

        elementorFrontend.hooks.addAction( 'frontend/element_ready/brand.default', function(scope,$){


        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/tp-faq.default', function(scope,$){
          
       $('.cs_accordian').children('.cs_accordian_body').hide();
        $('.cs_accordian.active').children('.cs_accordian_body').show();
        $('.cs_accordian_head').on('click', function () {
          $(this)
            .parent('.cs_accordian')
            .siblings()
            .children('.cs_accordian_body')
            .slideUp(250);
          $(this).siblings().slideDown(250);
          $(this)
            .parent()
            .parent()
            .siblings()
            .find('.cs_accordian_body')
            .slideUp(250);
          /* Accordian Active Class */
          $(this).parents('.cs_accordian').addClass('active');
          $(this).parent('.cs_accordian').siblings().removeClass('active');
        });


        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/service-details.default', function(scope,$){

          $('.cs_accordian').children('.cs_accordian_body').hide();
          $('.cs_accordian.active').children('.cs_accordian_body').show();
          $('.cs_accordian_head').on('click', function () {
            $(this)
              .parent('.cs_accordian')
              .siblings()
              .children('.cs_accordian_body')
              .slideUp(250);
            $(this).siblings().slideDown(250);
            $(this)
              .parent()
              .parent()
              .siblings()
              .find('.cs_accordian_body')
              .slideUp(250);
            /* Accordian Active Class */
            $(this).parents('.cs_accordian').addClass('active');
            $(this).parent('.cs_accordian').siblings().removeClass('active');
          });

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/contact-info.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/tp-award.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });
        }); 

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tp-fact.default', function(scope,$){
                
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });  
 
          
        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/portfolio-tab.default', function(scope,$){


        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/case-study.default', function(scope,$){
          
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });
          

        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/features.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });
        });



        elementorFrontend.hooks.addAction( 'frontend/element_ready/blogpost.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });



    });
})(jQuery);