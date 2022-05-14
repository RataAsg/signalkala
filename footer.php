<!-- footer -->
<footer class="w-full bg-black py-8 md:py-1">
    <section class="container m-auto">
        <?php if(get_field('footer_logo','option')):?>
            <div class="flex md:hidden justify-start w-1/2">
                <img src="<?php echo get_field('footer_logo','option')['url'];?>" class="object-contain object-center" alt="<?php echo get_field('footer_logo','option')['alt'];?>">
            </div>
        <?php endif;?>
        <div class="w-full py-6 flex flex-col md:flex-row items-center text-white gap-6 md:gap-3 lg:gap-6">
            <div class="w-full md:w-auto flex items-center">
                <div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5915 12.5967C7.55266 17.6341 6.40957 11.8064 3.20131 15.0124C0.108311 18.1045 -1.66938 18.724 2.24941 22.6417C2.74027 23.0362 5.85904 27.7822 16.8195 16.8248C27.7812 5.8661 23.038 2.74414 22.6434 2.25341C18.7151 -1.67514 18.1063 0.112905 15.0133 3.20504C11.805 6.41241 17.6303 7.55925 12.5915 12.5967Z" fill="white"/>
                    </svg>
                </div>
                <div class="flex flex-col text-xs lg:text-sm">
                    <?php if(have_rows('telephone','option')):?>
                    <div class="telephone-box flex flex-row items-center gap-2">
                        <?php while(have_rows('telephone','option')):the_row();
                                $telephoneTitle = get_sub_field('title');
                                $telephoneLink = get_sub_field('link');
                        ?>
                        <a href="tel:<?php echo $telephoneLink;?>" class="telephone-box_item p-2"><?php echo $telephoneTitle;?></a>
                        <?php endwhile;?>
                    </div>
                    <?php endif;?>
                    <?php if(get_field('open_hours','option')):?>
                        <span class="open-hours px-2"><?php echo get_field('open_hours','option');?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3 text-xs lg:text-sm">
                <div>
                    <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 0C6.98136 0.00294898 4.56672 0.997261 2.78577 2.76482C1.00482 4.53238 0.00298142 6.92886 1.0107e-05 9.42857C-0.00300648 11.4713 0.669311 13.4587 1.91383 15.0857C1.91383 15.0857 2.17292 15.4243 2.21524 15.4731L9.5 24L16.7882 15.4689C16.8262 15.4234 17.0862 15.0857 17.0862 15.0857L17.087 15.0831C18.3309 13.4568 19.0029 11.4704 19 9.42857C18.997 6.92886 17.9952 4.53238 16.2142 2.76482C14.4333 0.997261 12.0186 0.00294898 9.5 0ZM9.5 12.8571C8.81676 12.8571 8.14886 12.6561 7.58076 12.2793C7.01266 11.9026 6.56989 11.3671 6.30842 10.7406C6.04695 10.1141 5.97854 9.42477 6.11184 8.75969C6.24513 8.09461 6.57414 7.4837 7.05727 7.00421C7.5404 6.52471 8.15594 6.19817 8.82605 6.06588C9.49617 5.93359 10.1908 6.00148 10.822 6.26098C11.4532 6.52048 11.9928 6.95993 12.3723 7.52376C12.7519 8.08759 12.9545 8.75046 12.9545 9.42857C12.9534 10.3375 12.5891 11.2089 11.9415 11.8517C11.2939 12.4944 10.4159 12.856 9.5 12.8571Z" fill="white"/>
                    </svg>
                </div>
                <?php if(get_field('address','option')):?>
                    <span class="address w-full lg:w-3/4"><?php echo get_field('address','option');?></span>
                <?php endif;?>
            </div>
        </div>
        <div class="w-full py-8 flex items-center gap-3 lg:gap-6 text-white border-t border-b border-white">
            <?php if(have_rows('sources','option')):?>
                <div class="hidden md:flex flex-col w-1/4 h-full gap-y-4">
                    <span class="fa-font-semi-bold text-xl">
                        منابع
                    </span>
                    <ul class="footer-links text-sm">
                        <?php while(have_rows('sources','option')):the_row();
                        $title = get_sub_field('title');
                        $link = get_sub_field('link');?>
                        <li class="mb-4">
                            <a href="<?php echo $link;?>" class="p-2 pr-0">
                                <?php echo $title;?>
                            </a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            <?php endif;?>
            <?php if(have_rows('help','option')):?>
                <div class="flex flex-col w-1/2 md:w-1/4 h-full gap-y-4">
                    <span class="fa-font-semi-bold text-xl">
                        کمک
                    </span>
                    <ul class="footer-links text-sm">
                        <?php while(have_rows('help','option')):the_row();
                        $title = get_sub_field('title');
                        $link = get_sub_field('link');?>
                        <li class="mb-4">
                            <a href="<?php echo $link;?>" class="p-2 pr-0">
                                <?php echo $title;?>
                            </a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            <?php endif;?>
            <?php if(have_rows('about','option')):?>
                <div class="flex flex-col w-1/2 md:w-1/4 h-full gap-y-4">
                    <span class="fa-font-semi-bold text-xl">
                        درباره‌ما
                    </span>
                    <ul class="footer-links text-sm">
                        <?php while(have_rows('about','option')):the_row();
                        $title = get_sub_field('title');
                        $link = get_sub_field('link');?>
                        <li class="mb-4">
                            <a href="<?php echo $link;?>" class="p-2 pr-0">
                                <?php echo $title;?>
                            </a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            <?php endif;?>
            <?php if(get_field('footer_logo','option')):?>
            <div class="hidden md:flex justify-end w-1/3 md:w-1/4">
                <img src="<?php echo get_field('footer_logo','option')['url'];?>" class="object-contain object-center" alt="<?php echo get_field('footer_logo','option')['alt'];?>">
            </div>
            <?php endif;?>
        </div>
        <div class="w-full py-4 flex flex-col">
            <div class="w-full flex flex-col-reverse md:flex-row justify-between items-center gap-3 md:gap-0 text-white text-xs">
                <div class="w-full md:w-3/4 flex justify-center md:justify-start items-center text-center md:text-right">
                    <p>کلیه حقوق محفوظ است. | حقوق بشر | حریم خصوصی | کوکی ها | حقوقی | دسترسی | نقشه سایت</p>
                </div>
                <div class="social-container flex flex-row-reverse justify-end items-center gap-5">
                    <?php if(get_field('facebook','option')):
                        $facebookLink = get_field('facebook','option');?>
                        <a href="<?php echo $facebookLink;?>">
                            <svg width="10" height="19" viewBox="0 0 10 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.137019V3.15144H8.18287C6.75926 3.15144 6.49306 3.82512 6.49306 4.79567V6.95373H9.88426L9.43287 10.3335H6.49306V19H2.95139V10.3335H0V6.95373H2.95139V4.46454C2.95139 1.57572 4.74537 0 7.36111 0C8.61111 0 9.6875 0.0913462 10 0.137019Z" fill="#41C363"/>
                            </svg>
                        </a>
                    <?php endif;?>
                    <?php if(get_field('twitter','option')):
                        $twitterLink = get_field('twitter','option');?>
                        <a href="<?php echo $twitterLink;?>">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 1.6625C17.4975 2.3625 16.8693 2.98594 16.1497 3.48906C16.1612 3.64219 16.1612 3.79531 16.1612 3.94844C16.1612 8.61875 12.4492 14 5.66498 14C3.57488 14 1.63325 13.4203 0 12.4141C0.296954 12.4469 0.582486 12.4578 0.890862 12.4578C2.61548 12.4578 4.20304 11.9 5.47081 10.9484C3.84898 10.9156 2.48985 9.89844 2.02157 8.49844C2.25 8.53125 2.47843 8.55313 2.71827 8.55313C3.04949 8.55313 3.38071 8.50938 3.68909 8.43281C1.99873 8.10469 0.730965 6.68281 0.730965 4.96562C0.730965 4.95469 0.730965 4.93281 0.730965 4.92188C1.22208 5.18437 1.79315 5.34844 2.39848 5.37031C1.40482 4.73594 0.753807 3.65312 0.753807 2.42812C0.753807 1.77187 0.936547 1.17031 1.25634 0.645313C3.07233 2.78906 5.80203 4.18906 8.86295 4.34219C8.80584 4.07969 8.77158 3.80625 8.77158 3.53281C8.77158 1.58594 10.4162 0 12.4607 0C13.5228 0 14.4822 0.426562 15.1561 1.11562C15.9898 0.9625 16.7893 0.667188 17.4975 0.2625C17.2233 1.08281 16.6409 1.77187 15.8756 2.20937C16.618 2.13281 17.3376 1.93594 18 1.6625Z" fill="#41C363"/>
                            </svg>
                        </a>
                    <?php endif;?>
                    <?php if(get_field('linkedin','option')):
                        $linkedinLink = get_field('linkedin','option');?>
                        <a href="<?php echo $linkedinLink;?>">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.86263 5.19891V16H0.210281V5.19891H3.86263ZM4.09505 1.86376C4.10611 2.89918 3.30924 3.72752 2.03645 3.72752H2.01433C0.785812 3.72752 0 2.89918 0 1.86376C0 0.80654 0.81901 0 2.05859 0C3.30924 0 4.08398 0.80654 4.09505 1.86376ZM9.51823 6.73412C9.99871 5.99446 10.8655 4.94823 12.8053 4.94823C15.207 4.94823 17 6.49591 17 9.80926V16H13.3587V10.2234C13.3587 8.77384 12.8275 7.78202 11.5104 7.78202C10.5033 7.78202 9.90559 8.44687 9.63997 9.08992C9.55143 9.3297 9.51823 9.64578 9.51823 9.97275V16H5.87695C5.92122 6.21253 5.87695 5.19891 5.87695 5.19891H9.51823V6.73412Z" fill="#41C363"/>
                            </svg>
                        </a>
                    <?php endif;?>
                    <?php if(get_field('rss','option')):
                        $rssLink = get_field('rss','option');?>
                        <a href="<?php echo $rssLink;?>">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.3633 13.8182C4.3633 15.0227 3.38611 16 2.18166 16C0.977202 16 0 15.0227 0 13.8182C0 12.6136 0.977202 11.6364 2.18166 11.6364C3.38611 11.6364 4.3633 12.6136 4.3633 13.8182ZM10.181 15.2159C10.1924 15.4205 10.1242 15.6136 9.98787 15.7614C9.85152 15.9205 9.65836 16 9.45383 16H7.91985C7.54487 16 7.23808 15.7159 7.20399 15.3409C6.87447 11.875 4.12469 9.125 0.659042 8.79545C0.28407 8.76136 0 8.45455 0 8.07955V6.54545C0 6.34091 0.0795379 6.14773 0.238617 6.01136C0.363608 5.88636 0.545415 5.81818 0.727219 5.81818H0.784027C3.2043 6.01136 5.48822 7.06818 7.20399 8.79545C8.93114 10.5114 9.98788 12.7955 10.181 15.2159ZM15.9988 15.2386C16.0101 15.4318 15.942 15.625 15.7943 15.7727C15.6579 15.9205 15.4761 16 15.2716 16H13.6467C13.2603 16 12.9422 15.7045 12.9195 15.3182C12.5445 8.71591 7.28353 3.45455 0.681763 3.06818C0.295429 3.04545 0 2.72727 0 2.35227V0.727273C0 0.522727 0.0795331 0.340909 0.227249 0.204545C0.363603 0.0681819 0.545415 0 0.727219 0C0.738582 0 0.749944 0 0.761307 0C4.73828 0.204545 8.47663 1.875 11.2946 4.70455C14.1239 7.52273 15.7942 11.2614 15.9988 15.2386Z" fill="#41C363"/>
                            </svg>
                        </a>
                    <?php endif;?>
                    <?php if(get_field('youtube','option')):
                        $youtubeLink = get_field('youtube','option');?>
                        <a href="<?php echo $youtubeLink;?>">
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.9354 9.57778L13.3371 6.8L7.9354 3.98889V9.57778ZM10.0001 0C14.2076 0 16.9978 0.2 16.9978 0.2C17.3884 0.244444 18.2478 0.244444 19.0067 1.04444C19.0067 1.04444 19.6205 1.64444 19.7991 3.02222C20.0112 4.63333 20.0001 6.24444 20.0001 6.24444V7.75556C20.0001 7.75556 20.0112 9.36667 19.7991 10.9778C19.6205 12.3444 19.0067 12.9556 19.0067 12.9556C18.2478 13.7444 17.3884 13.7444 16.9978 13.7889C16.9978 13.7889 14.2076 14 10.0001 14C4.79926 13.9556 3.20328 13.8 3.20328 13.8C2.75686 13.7222 1.75243 13.7444 0.993507 12.9556C0.993507 12.9556 0.379658 12.3444 0.201088 10.9778C-0.0109635 9.36667 9.87429e-05 7.75556 9.87429e-05 7.75556V6.24444C9.87429e-05 6.24444 -0.0109635 4.63333 0.201088 3.02222C0.379658 1.64444 0.993507 1.04444 0.993507 1.04444C1.75243 0.244444 2.61177 0.244444 3.00239 0.2C3.00239 0.2 5.79255 0 10.0001 0Z" fill="#41C363"/>
                            </svg>
                        </a>
                    <?php endif;?>
                </div>
            </div>
            <div class="w-full md:w-3/4 text-center md:text-right text-xs mt-1" style="color:#DBDBDB">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای</p>
            </div>
        </div>
    </section>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>