<!doctype html>
<html <?php language_attributes(); ?> class="no-js is-smooth-scroll-compatible is-loading">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <div class="wrapper relative fa-font-reg">
        <!-- Top Header is started -->
        <header class="main-header w-full h-full bg-transparent">
            <section class="w-full h-full">
                <div class="w-full container m-auto flex justify-between items-center gap-8">
                    <!-- Header's Right Column is started-->
                    <div class="right-column hidden lg:flex justify-start items-center h-full">
                        <!-- Logo -->
                        <?php  the_custom_logo();?>
                    </div>
                    <!-- Mobile Header's Menu Icon started-->
                    <div class="mobile-menu-icon relative block lg:hidden">
                            <span class="absolute"></span>
                            <span class="absolute"></span>
                            <span class="absolute"></span>
                    </div>
                    <div class="right-column flex lg:hidden justify-start items-center h-full">
                            <!-- Logo -->
                            <?php  the_custom_logo();?>
                        </div>
                    <div class="c-search w-1/2 hidden lg:flex justify-between items-center h-12">
                            <input class="w-3/4 h-full bg-transparent px-5 py-3" placeholder="?????????? ???????? ?????? ?????? ???? ?????????? ????????">
                            <button class="w-10 h-full cursor-pointer flex justify-center items-center">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7082 0.925781C16.4081 0.925781 21.0443 5.56206 21.0443 11.2619C21.0443 13.951 20.0123 16.4037 18.3236 18.2444L21.6466 21.5605C21.9576 21.8715 21.9586 22.3746 21.6477 22.6856C21.4927 22.8427 21.2878 22.9202 21.084 22.9202C20.8813 22.9202 20.6775 22.8427 20.5215 22.6877L17.1583 19.334C15.3892 20.7508 13.146 21.599 10.7082 21.599C5.00843 21.599 0.371094 16.9617 0.371094 11.2619C0.371094 5.56206 5.00843 0.925781 10.7082 0.925781ZM10.7082 2.51791C5.88622 2.51791 1.96322 6.43985 1.96322 11.2619C1.96322 16.0839 5.88622 20.0069 10.7082 20.0069C15.5292 20.0069 19.4522 16.0839 19.4522 11.2619C19.4522 6.43985 15.5292 2.51791 10.7082 2.51791Z" fill="white"/>
                                </svg>
                            </button>
                    </div>
                    <!-- Header's Left Column is started-->
                    <div class="left-column flex justify-between items-center gap-2 lg:gap-4 xl:gap-6 h-full">
                        <!-- Header's Left Column's Links-->
                        <!-- Cart Link -->
                        <div class="relative cart-container">
                            <a href="/" class="cart-link flex items-center">
                                <svg class="hidden lg:block" width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.13273 26.7505C9.25944 26.7505 10.1763 27.6657 10.1763 28.7924C10.1763 29.9191 9.25944 30.836 8.13273 30.836C7.00602 30.836 6.09077 29.9191 6.09077 28.7924C6.09077 27.6657 7.00602 26.7505 8.13273 26.7505ZM25.9333 26.7505C27.0616 26.7505 27.9784 27.6657 27.9784 28.7924C27.9784 29.9191 27.0616 30.836 25.9333 30.836C24.8066 30.836 23.8913 29.9191 23.8913 28.7924C23.8913 27.6657 24.8066 26.7505 25.9333 26.7505ZM1.38542 0.0149708L4.66771 0.583059C5.19634 0.676162 5.59874 1.11485 5.6445 1.65138L6.01534 6.07142L7.39429 6.07202C7.61931 6.07212 7.84195 6.07222 8.06222 6.07232L10.5939 6.07352C10.7957 6.07362 10.9952 6.07372 11.1925 6.07382L13.9878 6.07536C14.1634 6.07546 14.3369 6.07556 14.5083 6.07567L16.4672 6.07692C16.6224 6.07702 16.7756 6.07713 16.9268 6.07723L18.6497 6.0785C18.7858 6.07861 18.9199 6.07871 19.0523 6.07882L20.5545 6.08011C20.6726 6.08022 20.7891 6.08033 20.9038 6.08044L21.8911 6.08142C21.9959 6.08153 22.099 6.08164 22.2006 6.08175L23.3439 6.08307C23.4331 6.08319 23.5208 6.0833 23.607 6.08341L24.5724 6.08476C24.6472 6.08487 24.7207 6.08498 24.7928 6.0851L25.4063 6.08612C25.4706 6.08624 25.5337 6.08635 25.5955 6.08646L26.2789 6.08785C26.3312 6.08797 26.3823 6.08808 26.4323 6.0882L26.8529 6.08925C26.8965 6.08937 26.939 6.08949 26.9805 6.0896L27.4314 6.09103C27.4652 6.09115 27.4981 6.09126 27.5301 6.09138L27.7949 6.09246C27.8218 6.09258 27.8479 6.09271 27.8732 6.09283L28.141 6.09429C28.1605 6.09441 28.1793 6.09453 28.1974 6.09465L28.3433 6.09576C28.3577 6.09588 28.3716 6.09601 28.3848 6.09613L28.4899 6.09725C28.5001 6.09738 28.5098 6.0975 28.519 6.09763L28.5905 6.09876C28.5972 6.09889 28.6036 6.09901 28.6096 6.09914L28.6548 6.10028C28.659 6.10041 28.6628 6.10054 28.6664 6.10067L28.6992 6.10221C28.7012 6.10234 28.703 6.10247 28.7048 6.1026C28.7201 6.10404 28.7224 6.1043 28.7247 6.10456C29.6036 6.23238 30.3769 6.69159 30.9039 7.39854C31.431 8.10392 31.6519 8.97341 31.5257 9.84448L30.0281 20.1932C29.7456 22.1625 28.0351 23.6474 26.0468 23.6474H8.81317C6.73492 23.6474 4.97542 22.0252 4.80657 19.9501L3.3611 2.75915L0.983022 2.34887C0.33761 2.23525 -0.0931901 1.62455 0.0172715 0.979143C0.130889 0.333731 0.754208 -0.0860227 1.38542 0.0149708ZM7.07771 8.439L6.21417 8.43846L7.16572 19.756C7.23515 20.6271 7.94684 21.2804 8.81633 21.2804H26.0436C26.8658 21.2804 27.568 20.6681 27.6847 19.8555L29.1839 9.5052C29.2186 9.25903 29.157 9.01286 29.0071 8.81403C28.8588 8.61362 28.641 8.48422 28.3949 8.44951C28.3835 8.44994 28.3562 8.45034 28.3139 8.4507L28.1422 8.45168C28.1063 8.45183 28.0669 8.45197 28.0239 8.4521L27.1299 8.45345C27.0545 8.45351 26.9761 8.45355 26.8947 8.45359L24.7928 8.45351C24.6756 8.45346 24.5561 8.45341 24.4344 8.45336L22.0357 8.4519C21.892 8.4518 21.7467 8.45169 21.5999 8.45158L20.2426 8.45049C20.088 8.45036 19.9322 8.45023 19.7754 8.4501L18.3377 8.44883C18.1753 8.44869 18.0122 8.44854 17.8484 8.44839L16.858 8.44748C16.6919 8.44732 16.5252 8.44717 16.3582 8.44701L14.8469 8.4456C14.6784 8.44545 14.5098 8.44529 14.3412 8.44513L13.3302 8.44419C13.162 8.44403 12.9939 8.44388 12.8261 8.44373L11.8238 8.44282C11.6575 8.44267 11.4918 8.44252 11.3266 8.44237L9.85826 8.44111C9.69742 8.44097 9.53745 8.44084 9.37844 8.44071L7.52281 8.4393C7.37306 8.4392 7.22466 8.43909 7.07771 8.439ZM23.5091 11.9043C24.1624 11.9043 24.6927 12.4345 24.6927 13.0878C24.6927 13.7411 24.1624 14.2713 23.5091 14.2713H19.1349C18.48 14.2713 17.9513 13.7411 17.9513 13.0878C17.9513 12.4345 18.48 11.9043 19.1349 11.9043H23.5091Z" fill="#8C8C8C"/>
                                </svg>
                                <svg class="block lg:hidden" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.18452 20.8202C7.04132 20.8202 7.73852 21.5326 7.73852 22.4095C7.73852 23.2864 7.04132 24 6.18452 24C5.32771 24 4.63171 23.2864 4.63171 22.4095C4.63171 21.5326 5.32771 20.8202 6.18452 20.8202ZM19.7209 20.8202C20.5789 20.8202 21.2761 21.5326 21.2761 22.4095C21.2761 23.2864 20.5789 24 19.7209 24C18.8641 24 18.1681 23.2864 18.1681 22.4095C18.1681 21.5326 18.8641 20.8202 19.7209 20.8202ZM1.05354 0.0116519L3.54955 0.453802C3.95155 0.526265 4.25755 0.867703 4.29235 1.28529L4.57435 4.72546L5.62298 4.72592C5.79409 4.726 5.9634 4.72608 6.1309 4.72615L8.05608 4.72709C8.20953 4.72717 8.36127 4.72725 8.51132 4.72733L10.637 4.72852C10.7705 4.7286 10.9025 4.72868 11.0328 4.72876L12.5224 4.72973C12.6405 4.72982 12.757 4.7299 12.872 4.72998L14.1822 4.73097C14.2856 4.73105 14.3876 4.73113 14.4883 4.73122L15.6306 4.73222C15.7205 4.73231 15.809 4.73239 15.8963 4.73247L16.6471 4.73324C16.7267 4.73332 16.8052 4.73341 16.8824 4.7335L17.7519 4.73453C17.8197 4.73461 17.8863 4.7347 17.9519 4.73479L18.686 4.73584C18.7429 4.73593 18.7988 4.73601 18.8536 4.7361L19.3202 4.7369C19.3691 4.73699 19.417 4.73708 19.464 4.73717L19.9838 4.73825C20.0235 4.73834 20.0624 4.73843 20.1004 4.73852L20.4203 4.73934C20.4534 4.73943 20.4857 4.73952 20.5173 4.73961L20.8602 4.74072C20.8859 4.74081 20.9109 4.7409 20.9352 4.741L21.1365 4.74184C21.157 4.74193 21.1769 4.74202 21.1961 4.74212L21.3998 4.74325C21.4146 4.74335 21.4289 4.74344 21.4426 4.74354L21.5536 4.7444C21.5646 4.7445 21.5751 4.74459 21.5852 4.74469L21.6651 4.74556C21.6728 4.74566 21.6802 4.74576 21.6872 4.74586L21.7416 4.74674C21.7467 4.74684 21.7515 4.74693 21.7561 4.74703L21.7905 4.74792C21.7936 4.74802 21.7966 4.74812 21.7993 4.74822L21.8242 4.74942C21.8258 4.74953 21.8272 4.74963 21.8285 4.74973C21.8402 4.75084 21.8419 4.75105 21.8436 4.75125C22.512 4.85074 23.1 5.20814 23.5008 5.75837C23.9016 6.30737 24.0696 6.98411 23.9736 7.66207L22.8348 15.7166C22.62 17.2494 21.3192 18.4051 19.8072 18.4051H6.70196C5.12155 18.4051 3.78355 17.1425 3.65515 15.5274L2.55594 2.14748L0.747537 1.82815C0.256735 1.73972 -0.0708662 1.26441 0.0131341 0.762078C0.0995345 0.259747 0.573536 -0.0669525 1.05354 0.0116519ZM5.38223 6.56817L4.72555 6.56775L5.44916 15.3764C5.50196 16.0543 6.04316 16.5628 6.70436 16.5628H19.8048C20.43 16.5628 20.964 16.0863 21.0528 15.4537L22.1928 7.39801C22.2192 7.20641 22.1724 7.01481 22.0584 6.86006C21.9456 6.70408 21.78 6.60337 21.5928 6.57635C21.5842 6.57669 21.5634 6.577 21.5312 6.57728L21.4007 6.57804C21.3734 6.57816 21.3434 6.57826 21.3107 6.57837L20.6309 6.57942C20.5735 6.57946 20.5139 6.5795 20.4521 6.57953L18.8537 6.57946C18.7645 6.57943 18.6736 6.57939 18.5811 6.57935L16.757 6.57822C16.6477 6.57813 16.5372 6.57805 16.4256 6.57796L15.3934 6.57712C15.2759 6.57702 15.1574 6.57691 15.0382 6.57681L13.9449 6.57583C13.8214 6.57571 13.6973 6.5756 13.5728 6.57548L12.8197 6.57477C12.6933 6.57465 12.5666 6.57453 12.4395 6.57441L11.2903 6.57331C11.1622 6.57319 11.0339 6.57307 10.9057 6.57294L10.1369 6.57221C10.009 6.57209 9.8812 6.57197 9.75362 6.57185L8.99137 6.57114C8.86496 6.57103 8.73892 6.57091 8.61331 6.5708L7.4967 6.56981C7.37439 6.56971 7.25274 6.56961 7.13182 6.56951L5.7207 6.56841C5.60683 6.56833 5.49398 6.56825 5.38223 6.56817ZM17.8775 9.26523C18.3743 9.26523 18.7775 9.67791 18.7775 10.1864C18.7775 10.6949 18.3743 11.1075 17.8775 11.1075H14.5511C14.0531 11.1075 13.6511 10.6949 13.6511 10.1864C13.6511 9.67791 14.0531 9.26523 14.5511 9.26523H17.8775Z" fill="#8C8C8C"/>
                                </svg>
                            </a>
                        </div>
                        <!-- Login Or Register Link -->
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>" class="c-btn__login fa-font-bold p-2">
                            <svg class="" width="24" height="30" viewBox="0 0 24 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.2 0H9.6C8.32696 0 7.10606 0.499059 6.20589 1.38739C5.30571 2.27572 4.8 3.48055 4.8 4.73684V11.0526H6.4V4.73684C6.4 3.89932 6.73714 3.09609 7.33726 2.50387C7.93737 1.91165 8.75131 1.57895 9.6 1.57895H19.2C20.0487 1.57895 20.8626 1.91165 21.4627 2.50387C22.0629 3.09609 22.4 3.89932 22.4 4.73684V25.2632C22.4 26.1007 22.0629 26.9039 21.4627 27.4961C20.8626 28.0883 20.0487 28.4211 19.2 28.4211H9.6C8.75131 28.4211 7.93737 28.0883 7.33726 27.4961C6.73714 26.9039 6.4 26.1007 6.4 25.2632V18.9474H4.8V25.2632C4.8 26.5194 5.30571 27.7243 6.20589 28.6126C7.10606 29.5009 8.32696 30 9.6 30H19.2C20.473 30 21.6939 29.5009 22.5941 28.6126C23.4943 27.7243 24 26.5194 24 25.2632V4.73684C24 3.48055 23.4943 2.27572 22.5941 1.38739C21.6939 0.499059 20.473 0 19.2 0ZM0 14.2105H16.4L11.2 9.07895L12.2624 7.89474L19.4624 15L12.2624 22.1053L11.2 20.9211L16.4 15.7895H0V14.2105Z" fill="#00D37F"/>
                            </svg>
                            <span class="text-sm lg:text-base hidden lg:block">
                                ????????/???????????????
                            </span>
                        </a>
                    </div>
                </div>
                <div class="menu-list-container w-full container m-auto hidden lg:flex items-center mt-3">
                    <div class= "py-2">
                        <!-- Header Menu -->
                        <?php wp_nav_menu( array( 'theme_location' => 'signalkala-menu' ));?>
                    </div>
                </div>
            </section>
        </header>
        <!-- Top Header is ended -->