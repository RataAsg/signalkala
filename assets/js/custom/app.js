// rataasgharpor@gmail.com
// ADD ALL JS FRAMEWORKS
// import 'leaflet/dist/leaflet.js';
import anime from 'animejs';
import AOS from 'aos';
// ----------------------
jQuery(function () {
	//Model
	var appModel = {
		el: {},
	};
	// animTarget,easing,opacityStart,opacityEnd,start,end,duration,delay
	function animationX(animTarget, easing, opacityStart, opacityEnd, start, end, duration, delay) {
		anime({
			targets: animTarget, //animation target element
			easing: easing, //how animation  moves
			opacity: [opacityStart, opacityEnd],
			translateX: [start, end],
			duration: duration, //duration of animation
			delay: anime.stagger(delay), //delay for animation
			loop: false,
		});
	}
	function animationY(animTarget, easing, opacityStart, opacityEnd, start, end, duration, delay) {
		anime({
			targets: animTarget, //animation target element
			easing: easing, //how animation  moves
			opacity: [opacityStart, opacityEnd],
			translateY: [start, end],
			duration: duration, //duration of animation
			delay: delay, //delay for animation
			loop: false,
		});
	}
	function animationHeight(animTarget, easing, start, end, duration, delay) {
		anime({
			targets: animTarget, //animation target element
			easing: easing,
			height: [start, end],
			duration: duration, //duration of animation
			delay: delay, //delay for animation
			loop: false,
		});
	}
	function animationWidth(animTarget, easing, opacityStart, opacityEnd, start, end, duration, delay) {
		anime({
			targets: animTarget, //animation target element
			easing: easing,
			opacity: [opacityStart, opacityEnd],
			width: [start, end],
			duration: duration, //duration of animation
			delay: delay, //delay for animation
			loop: false,
		});
	}

	//Controller
	var appController = {
		// INIT ALL CONTROLLERS
		init: function () {
			// AOS.init();
			// jQuery('.fancybox').fancybox();
			// appController.stickyMenu();
			if (document.querySelector('.page-template-index')) {
				appController.sliderVerticalDotNav();
				appController.sliderProductCategory();
				appController.sliderBestSellProductMobile();
				appController.sliderLatestBlog();
			} else if (document.querySelector('.single-product')) {
				appController.syncQuantity();
				appController.totalPriceOnSingle();
				appController.extendedProductDetails();
				appController.similarProductsCounter();
				appController.sliderRelatedProduct();
			} else if (document.querySelector('.post-type-archive-projects')) {
			} else if (document.querySelector('.page-template-page-about')) {
			} else if (document.querySelector('.category-news')) {
			} else if (document.querySelector('.search')) {
			}
		},
		// Whole Website Func
		stickyMenu: function() {
			$(window).scroll(function(){
				if($(window).scrollTop() < 100){
					$("header").removeClass('sticky-header');
				}
				else{
					$("header").addClass('sticky-header');
				}
			});
        },
		// Home Page Func
		sliderVerticalDotNav: function () {
			var homeHeadSlider = new Swiper(".home-head-slider", {
				autoplay: {
					delay: 3000,
					disableOnInteraction:false,
				},
				loop:true,
				pagination: {
				  el: ".home-head-slider .swiper-pagination",
				  clickable: true,
				},
				navigation: {
                    nextEl: '.home-head-slider .swiper-button-next',
                    prevEl: '.home-head-slider .swiper-button-prev',
                },
			});
		},
		sliderProductCategory: function () {
			var homeProductCategorySlider = new Swiper(".home-category-slider", {
				// autoplay: {
				// 	delay: 3000,
				// 	disableOnInteraction:false,
				// },
				loop:true,
				slidesPerView: 3,
				spaceBetween: 30,
				pagination: {
				  el: ".home-category-slider .swiper-pagination",
				  clickable: true,
				},
				navigation: {
                    nextEl: '.home-category-button-next',
                    prevEl: '.home-category-button-prev',
                },
				breakpoints:{
					640: {
						slidesPerView: 3,
					},
					768: {
						slidesPerView: 4,
					},
					1024: {
						slidesPerView: 5,
					},
					1920: {
						slidesPerView: 6,
					}
				}
			});	
		},
		sliderBestSellProductMobile: function () {
			var homeProductCategorySlider = new Swiper(".bestseller-products-mobile", {
				// autoplay: {
				// 	delay: 3000,
				// 	disableOnInteraction:false,
				// },
				loop:false,
				slidesPerView: 2,
				spaceBetween: 10,
				breakpoints:{
					640: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
					768: {
						slidesPerView: 4,
						spaceBetween: 30,
					},
				}
			});	
		},
		sliderLatestBlog: function () {
			var latestBlogSlider = new Swiper(".latest-blog-slider", {
				autoplay: {
					delay: 3000,
					disableOnInteraction:false,
				},
				loop:false,
				slidesPerView: 1,
				spaceBetween: 10,
				breakpoints:{
					640: {
						spaceBetween: 20,
						slidesPerView: 2,
					},
					768: {
						spaceBetween: 30,
						slidesPerView: 3,
					},
					1024: {
						spaceBetween: 30,
						slidesPerView: 3,
					},
				},
				// pagination: {
				//   el: ".latest-blog-slider .swiper-pagination",
				//   clickable: true,
				// },
				navigation: {
                    nextEl: '.latest-blog-button-next',
                    prevEl: '.latest-blog-button-prev',
                },
			});	
		},
		// Single Product Func
		syncQuantity: function () {
			var quantity = jQuery('.cart .quantity input').val();
			jQuery('.current-number .amount').text(quantity);
			jQuery('.cart .quantity input').change(function () {
				var quantity = jQuery('.cart .quantity input').val();
				jQuery('.current-number .amount').text(quantity);
			})
		},
		totalPriceOnSingle: function () {
			var quantity = jQuery('.cart .quantity input').val();
			var priceRule = jQuery('.price-rule-active .amount').text();
			console.log(priceRule);
			
			jQuery('.price-conatiner .price').text(quantity * priceRule);
			jQuery('.cart .quantity input').change(function () {
				quantity = jQuery('.cart .quantity input').val();
				priceRule = parseInt(jQuery('.price-rule-active .amount').text());
				jQuery('.price-conatiner .price').text(quantity * priceRule * 1000);
			})
		},
		extendedProductDetails: function () {
			jQuery('#extendedProductDetails').click(function () {
				jQuery('.wrapper').toggleClass('added-extended-product-details');
			});	
		},
		similarProductsCounter: function () {
			let checkboxValues = {taxonomy:"",category:""};
			let checkboxArray = [];
			jQuery('.similar-product-checkbox').click(function () {
				if(jQuery(this).is(':checked')){
					checkboxValues = {taxonomy:jQuery(this).attr('id'),category:jQuery(this).attr('value')};
					checkboxArray.push(checkboxValues);
				}
				else {
					checkboxArray = checkboxArray.filter((item) => item.category !== jQuery(this).attr('value'));
				}
				console.log(checkboxArray);
			});
			
		},
		sliderRelatedProduct: function () {
			var relatedProductSlider = new Swiper(".related-products_slider", {
				// autoplay: {
				// 	delay: 3000,
				// 	disableOnInteraction:false,
				// },
				loop:true,
				slidesPerView: 2,
				spaceBetween: 10,
				navigation: {
                    nextEl: '.related-products_slider-button-next',
                    prevEl: '.related-products_slider-button-prev',
                },
				breakpoints:{
					640: {
						slidesPerView: 3,
						spaceBetween: 30,
					},
					768: {
						slidesPerView: 4,
						spaceBetween: 30,
					},
					1024: {
						slidesPerView: 5,
						spaceBetween: 30,
					}
				}
			});	
		},
	};
	//View
	var appView = {
		init: function () {
			appController.init();
		},
	};
	// EXPORT INIT
	appView.init();
});
jQuery(document).ready(function () {});
