<?php
/**
 * Header Template
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rectify_menu_options = get_option('rectify_megamenu_options', array());
$rectify_menu_location = isset($rectify_menu_options['location']) ? $rectify_menu_options['location'] : 'rectify_megamenu';
$rectify_menu_items = array();
$rectify_menu_has_children = false;
$rectify_fallback_menu_services = rectify_custom_residential_menu_services();
$rectify_service_defaults = rectify_custom_service_defaults();
$rectify_service_aliases = rectify_custom_service_aliases();

if (has_nav_menu($rectify_menu_location)) {
    $rectify_menu_locations = get_nav_menu_locations();

    if (isset($rectify_menu_locations[$rectify_menu_location])) {
        $rectify_menu_object = wp_get_nav_menu_object($rectify_menu_locations[$rectify_menu_location]);
        $rectify_menu_items = $rectify_menu_object ? wp_get_nav_menu_items($rectify_menu_object->term_id) : array();
        $rectify_menu_items = is_array($rectify_menu_items) ? $rectify_menu_items : array();

        foreach ($rectify_menu_items as $rectify_menu_item) {
            if (!empty($rectify_menu_item->menu_item_parent)) {
                $rectify_menu_has_children = true;
                break;
            }
        }
    }
}


if (!$rectify_menu_has_children && !empty($rectify_menu_items)) {
    $rectify_flat_menu_services = array();

    foreach ($rectify_menu_items as $rectify_menu_item) {
        if (!empty($rectify_menu_item->menu_item_parent)) {
            continue;
        }

        $menu_key = sanitize_title(wp_strip_all_tags($rectify_menu_item->title));
        $default_key = isset($rectify_service_aliases[$menu_key]) ? $rectify_service_aliases[$menu_key] : $menu_key;
        $default_service = isset($rectify_service_defaults[$default_key])
            ? $rectify_service_defaults[$default_key]
            : array('Rectify Icon Set_Foundation Repair.svg', $rectify_menu_item->title, 'Explore Rectify solutions for this structural movement concern.');

        $rectify_flat_menu_services[] = array(
            $default_service[0],
            $rectify_menu_item->title,
            !empty($rectify_menu_item->description) ? $rectify_menu_item->description : $default_service[2],
            $rectify_menu_item->url,
        );
    }

    if (!empty($rectify_flat_menu_services)) {
        $rectify_fallback_menu_services = $rectify_flat_menu_services;
    }
}


$rectify_use_wordpress_mega_menu = has_nav_menu($rectify_menu_location) && class_exists('Rectify_Mega_Menu_Walker') && $rectify_menu_has_children;

$rectify_industries_services = array(
    array(content_url('uploads/2026/07/IMG_7021-1.png'), 'Transport Assets', '#projects'),
    array(content_url('uploads/2026/07/IMG_0867-2.png'), 'Commercial Buildings', '#projects'),
    array(content_url('uploads/2026/07/freepik__create-a-realistic-highend-industrial-image-of-cri__84123-1.png'), 'Utilities & Energy', '#projects'),
    array(content_url('uploads/2026/07/freepik_create-a-highend-photorea_2778498636-1.png'), 'Marine & Coastal', '#projects'),
    array(content_url('uploads/2026/07/Gemini_Generated_Image_lhbvhnlhbvhnlhbv-1.png'), 'Industrial Facilities', '#projects'),
    array(rx_asset_url('images/residential/residential-hero-strip.jpg'), 'Civil Infrastructure', '#projects'),
    array(content_url('uploads/2026/07/Gemini_Generated_Image_o9z3ubo9z3ubo9z3-1.png'), 'Mining & Resources', '#projects'),
    array(content_url('uploads/2026/07/residential-and-strata.png'), 'Residential & Strata', '#projects'),
);

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    /*
     * Start the Helvetica request during the initial HTML parse instead of
     * waiting for style.css to download and parse. `crossorigin` is required
     * on font preloads even same-origin: fonts are fetched in anonymous CORS
     * mode, and without it the browser downloads the file twice.
     *
     * The href must match the url() in style.css exactly (no ver query arg),
     * otherwise the preload is a separate resource and the font is fetched
     * twice.
     */
    $rx_font_path = trailingslashit( get_template_directory() ) . 'fonts/HelveticaRegular.woff';
    ?>
    <?php if ( file_exists( $rx_font_path ) ) : ?>
        <link rel="preload" as="font" type="font/woff" crossorigin href="<?php echo esc_url( get_template_directory_uri() . '/fonts/HelveticaRegular.woff' ); ?>">
    <?php endif; ?>
   <?php
    $rx_home_css_path = trailingslashit(get_stylesheet_directory()) . 'rectify-homepage-draft2-v3/assets/css/rectify-home.css';
    $rx_home_css_ver = file_exists($rx_home_css_path) ? filemtime($rx_home_css_path) : null;
    ?>
    <link rel="stylesheet" href="<?php echo esc_url(add_query_arg('ver', $rx_home_css_ver, rx_asset_url('css/rectify-home.css'))); ?>">
    <?php
    // Mobile/tablet overrides for the sitewide header/nav + homepage layout (rectify-home.css above).
    $rx_home_mobile_css_path = trailingslashit(get_stylesheet_directory()) . 'assets/css/mobile/home-mobile.css';
    $rx_home_mobile_css_ver = file_exists($rx_home_mobile_css_path) ? filemtime($rx_home_mobile_css_path) : null;
    ?>
    <link rel="stylesheet" href="<?php echo esc_url(add_query_arg('ver', $rx_home_mobile_css_ver, rx_asset_url('css/mobile/home-mobile.css'))); ?>">
    <?php if ( is_page( 'contact-us' ) ) : ?>
        <?php
        $rx_contact_css_path = trailingslashit( get_stylesheet_directory() ) . 'rectify-homepage.css';
        $rx_contact_css_ver  = file_exists( $rx_contact_css_path ) ? filemtime( $rx_contact_css_path ) : null;
        ?>
        <link rel="stylesheet" href="<?php echo esc_url( add_query_arg( 'ver', $rx_contact_css_ver, get_stylesheet_directory_uri() . '/rectify-homepage.css' ) ); ?>">
        <?php
        // Mobile/tablet overrides for the Contact Us page's bespoke layout (rectify-homepage.css above).
        $rx_contact_mobile_css_path = trailingslashit( get_stylesheet_directory() ) . 'assets/css/mobile/contact-mobile.css';
        $rx_contact_mobile_css_ver  = file_exists( $rx_contact_mobile_css_path ) ? filemtime( $rx_contact_mobile_css_path ) : null;
        ?>
        <link rel="stylesheet" href="<?php echo esc_url( add_query_arg( 'ver', $rx_contact_mobile_css_ver, rx_asset_url( 'css/mobile/contact-mobile.css' ) ) ); ?>">
    <?php endif; ?>
    <?php if ( is_page( array( 'assessment', 'get-a-free-quote' ) ) ) : ?>
        <?php
        $rx_assessment_css_path = trailingslashit( get_stylesheet_directory() ) . 'assets/css/assessment.css';
        $rx_assessment_css_ver  = file_exists( $rx_assessment_css_path ) ? filemtime( $rx_assessment_css_path ) : null;
        ?>
        <link rel="stylesheet" href="<?php echo esc_url( add_query_arg( 'ver', $rx_assessment_css_ver, get_stylesheet_directory_uri() . '/assets/css/assessment.css' ) ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('rx-template-clean'); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/sticky-quick-quote' ); ?>

<main class="rx-home" id="top">
    <div class="rx-top-strip">
        <div class="rx-wrap rx-top-strip-inner">
            <?php ob_start(); ?>
            <span class="rx-top-strip-message">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="rx-top-strip-phrase">PROVEN EXPERTS <span>•</span> TRUSTED BY THOUSANDS <span>•</span> RESULTS YOU CAN MEASURE</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="rx-top-strip-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9.58435 3.78061C9.651 3.72696 9.71948 3.67551 9.7909 3.62662C9.87284 3.57116 9.97339 3.55034 10.0706 3.56871C10.1678 3.58708 10.2539 3.64314 10.3099 3.72468C10.366 3.80621 10.3875 3.9066 10.3699 4.00396C10.3522 4.10132 10.2968 4.18775 10.2157 4.24442C10.1604 4.28268 10.1067 4.32278 10.0546 4.36472C9.977 4.42596 9.87839 4.45411 9.78019 4.44303C9.68198 4.43195 9.59212 4.38255 9.53014 4.30556C9.46817 4.22858 9.4391 4.13024 9.44925 4.03193C9.4594 3.93363 9.50796 3.8433 9.58435 3.78061Z" fill="white"/>
                        <path d="M8.44925 5.52339C8.53067 5.19402 8.66578 4.88032 8.84915 4.59486C8.90314 4.51198 8.98767 4.45378 9.08436 4.43293C9.18105 4.41208 9.28206 4.43026 9.36541 4.48353C9.44875 4.53679 9.50768 4.62082 9.52938 4.71732C9.55107 4.81382 9.53376 4.91499 9.48123 4.99879C9.34219 5.21519 9.23952 5.45289 9.17728 5.70246C9.15346 5.79893 9.09231 5.88199 9.00728 5.93339C8.92225 5.9848 8.82029 6.00034 8.7238 5.97661C8.62732 5.95288 8.5442 5.89181 8.49272 5.80682C8.44124 5.72184 8.4256 5.61989 8.44925 5.52339Z" fill="white"/>
                        <path d="M8.0625 20.9879H6.9375C6.83804 20.9879 6.74266 20.9484 6.67233 20.8781C6.60201 20.8078 6.5625 20.7124 6.5625 20.6129C6.5625 20.5135 6.60201 20.4181 6.67233 20.3477C6.74266 20.2774 6.83804 20.2379 6.9375 20.2379H8.0625C8.16196 20.2379 8.25734 20.2774 8.32767 20.3477C8.39799 20.4181 8.4375 20.5135 8.4375 20.6129C8.4375 20.7124 8.39799 20.8078 8.32767 20.8781C8.25734 20.9484 8.16196 20.9879 8.0625 20.9879Z" fill="white"/>
                        <path d="M17.0625 20.9879H15.9375C15.838 20.9879 15.7427 20.9484 15.6723 20.8781C15.602 20.8078 15.5625 20.7124 15.5625 20.6129C15.5625 20.5135 15.602 20.4181 15.6723 20.3477C15.7427 20.2774 15.838 20.2379 15.9375 20.2379H17.0625C17.162 20.2379 17.2573 20.2774 17.3277 20.3477C17.398 20.4181 17.4375 20.5135 17.4375 20.6129C17.4375 20.7124 17.398 20.8078 17.3277 20.8781C17.2573 20.9484 17.162 20.9879 17.0625 20.9879Z" fill="white"/>
                        <path d="M20.5983 16.8708C19.6239 15.6359 15.6088 14.3418 14.7647 14.0801C14.7314 13.5516 14.6696 13.0252 14.5794 12.5033C15.2169 11.8816 15.6578 11.0864 15.8475 10.2164C16.0951 10.033 16.3023 9.80059 16.4561 9.53357C16.5879 9.31964 16.6747 9.08107 16.7112 8.83245C16.7476 8.58383 16.733 8.33038 16.6681 8.08761C16.8553 8.01775 17.0169 7.89264 17.1313 7.72886C17.2458 7.56509 17.3077 7.37039 17.309 7.17059C17.3098 6.97787 17.2563 6.78881 17.1547 6.6251C17.053 6.46139 16.9072 6.32965 16.7341 6.245C16.7183 5.32916 16.4181 4.4409 15.8749 3.70334C15.3318 2.96578 14.5726 2.41547 13.7027 2.12869C13.6649 1.94814 13.5663 1.78602 13.4234 1.6694C13.2805 1.55278 13.1019 1.48872 12.9174 1.48792H11.1493C10.9715 1.48892 10.7991 1.54886 10.659 1.65835C10.5189 1.76785 10.419 1.92071 10.3751 2.09301C9.48115 2.37133 8.69734 2.92363 8.13449 3.67181C7.57164 4.41998 7.25823 5.32616 7.23858 6.26221C7.07365 6.34983 6.93565 6.48064 6.83935 6.64065C6.74304 6.80065 6.69205 6.98384 6.69183 7.17059C6.69291 7.36779 6.7532 7.56012 6.8649 7.72264C6.9766 7.88516 7.13454 8.01037 7.31826 8.08205C7.24011 8.43596 7.25684 8.80423 7.36676 9.1496C7.516 9.60664 7.81776 9.99852 8.22149 10.2596C8.42274 11.1153 8.84922 11.9016 9.45672 12.537C9.36884 13.0485 9.30855 13.5645 9.27611 14.0825C8.40251 14.3434 4.47991 15.5667 3.50945 16.7631C2.63201 17.8447 2.31816 21.6755 2.28521 22.1087C2.27786 22.2078 2.31013 22.3057 2.37492 22.381C2.43971 22.4563 2.53173 22.5028 2.63078 22.5103C2.72983 22.5178 2.82781 22.4857 2.90322 22.4211C2.97864 22.3564 3.02531 22.2645 3.03301 22.1655C3.1176 21.0531 3.47283 17.9987 4.09173 17.2355C4.41404 16.8382 5.24497 16.3952 6.18792 15.989V19.1129H5.81292C5.76367 19.1129 5.7149 19.1226 5.6694 19.1414C5.62389 19.1603 5.58255 19.1879 5.54772 19.2227C5.5129 19.2575 5.48528 19.2989 5.46644 19.3444C5.4476 19.3899 5.4379 19.4387 5.43792 19.4879V22.1371C5.43792 22.2365 5.47743 22.3319 5.54775 22.4023C5.61808 22.4726 5.71346 22.5121 5.81292 22.5121C5.91237 22.5121 6.00776 22.4726 6.07808 22.4023C6.14841 22.3319 6.18792 22.2365 6.18792 22.1371V19.8629H17.8129V22.1371C17.8129 22.2365 17.8524 22.3319 17.9228 22.4023C17.9931 22.4726 18.0885 22.5121 18.1879 22.5121C18.2874 22.5121 18.3828 22.4726 18.4531 22.4023C18.5234 22.3319 18.5629 22.2365 18.5629 22.1371V19.4879C18.5629 19.4387 18.5532 19.3899 18.5344 19.3444C18.5156 19.2989 18.4879 19.2575 18.4531 19.2227C18.4183 19.1879 18.3769 19.1603 18.3314 19.1414C18.2859 19.1226 18.2372 19.1129 18.1879 19.1129H17.8129V16.0077C18.7999 16.4411 19.6783 16.9157 20.0095 17.3355C20.6023 18.0866 20.9019 21.0725 20.9675 22.1596C20.9742 22.2583 21.0196 22.3504 21.0939 22.4157C21.1682 22.4811 21.2653 22.5144 21.3641 22.5085C21.4628 22.5025 21.5553 22.4578 21.6212 22.384C21.6871 22.3102 21.7212 22.2134 21.716 22.1146C21.6907 21.6907 21.4428 17.941 20.5983 16.8708ZM11.9986 16.8937H12.0037C12.9782 16.8935 14.2006 15.4601 14.6833 14.8407C14.8334 14.8882 15.0055 14.9447 15.1879 15.0058V19.1129H8.81292V15.0133C9.01404 14.948 9.20149 14.8888 9.3648 14.8391C9.83721 15.459 11.031 16.8887 11.9986 16.8937ZM14.0419 14.4418C13.4231 15.2204 12.4956 16.1437 12.0044 16.1437H12.0022C11.5147 16.1412 10.602 15.2109 9.99964 14.4331C10.0212 13.9899 10.0665 13.5482 10.1355 13.1098C11.2729 13.8239 12.8067 13.6472 13.8924 13.0144C13.9681 13.4871 14.018 13.9636 14.0419 14.4418ZM7.63409 6.91187C8.00286 6.89502 7.99409 6.51581 7.99114 6.39112L7.98858 6.23767C8.01024 5.49796 8.25358 4.78182 8.68707 4.18205C9.12056 3.58228 9.72421 3.12655 10.4198 2.87392L10.7333 5.31939C10.7468 5.41743 10.7985 5.50617 10.8772 5.56627C10.9558 5.62637 11.055 5.65296 11.1532 5.64026C11.2513 5.62755 11.3405 5.57658 11.4012 5.49844C11.462 5.4203 11.4894 5.32133 11.4775 5.22307L11.0973 2.28406C11.0994 2.27157 11.1057 2.26017 11.1152 2.25177C11.1246 2.24337 11.1367 2.23847 11.1493 2.23791H12.9174C12.9301 2.23847 12.9421 2.24336 12.9516 2.25177C12.9611 2.26017 12.9674 2.27157 12.9694 2.28406L12.5893 5.22308C12.5768 5.32162 12.6039 5.42109 12.6647 5.49967C12.7254 5.57825 12.8148 5.62954 12.9133 5.64229C13.0118 5.65504 13.1114 5.62821 13.1901 5.56768C13.2689 5.50715 13.3204 5.41787 13.3334 5.3194L13.6449 2.91051C14.3213 3.16992 14.905 3.62496 15.3216 4.21756C15.7382 4.81015 15.9689 5.51344 15.9841 6.23767C15.9841 6.32849 15.9805 6.41852 15.9734 6.50775C15.9695 6.55996 15.9765 6.61241 15.994 6.66176C16.0114 6.71111 16.0391 6.75625 16.075 6.7943C16.111 6.83235 16.1545 6.86246 16.2028 6.88271C16.2511 6.90296 16.3031 6.91289 16.3554 6.91187C16.4551 6.88749 16.559 7.05229 16.559 7.17059C16.559 7.34564 16.369 7.41596 16.2565 7.43006C14.8482 7.58919 13.432 7.67 12.0147 7.67212C10.5879 7.66942 9.1623 7.58861 7.74432 7.43006C7.6319 7.41596 7.44184 7.34564 7.44184 7.17059C7.43997 7.1121 7.45795 7.05469 7.49286 7.00772C7.52777 6.96074 7.57754 6.92696 7.63409 6.91187ZM8.92205 9.9494C8.91132 9.89467 8.88853 9.84302 8.85533 9.79821C8.82214 9.75339 8.77938 9.71653 8.73016 9.69031C8.42455 9.52477 8.19266 9.24999 8.08086 8.9209C8.00897 8.69364 8.00015 8.45112 8.05532 8.21924C9.44357 8.36726 11.0209 8.42211 12.0147 8.42211C12.9919 8.42211 14.5457 8.36783 15.9268 8.22137C15.9764 8.37721 15.9913 8.54202 15.9703 8.70422C15.9494 8.86641 15.8932 9.02206 15.8057 9.16022C15.6829 9.3714 15.5111 9.54994 15.3047 9.68078C15.2609 9.70908 15.2235 9.74623 15.1949 9.78984C15.1662 9.83344 15.147 9.88255 15.1385 9.93402C15.0509 10.4552 14.8485 10.9504 14.546 11.3838C14.2434 11.8171 13.8482 12.1777 13.3891 12.4395C13.3294 12.4704 11.9129 13.1942 10.6978 12.5684C10.2372 12.2779 9.84167 11.8953 9.53607 11.4446C9.23047 10.9939 9.02142 10.4848 8.92205 9.9494ZM6.93792 19.1129V15.6814C7.31933 15.5323 7.70177 15.392 8.06292 15.266V19.1129H6.93792ZM17.0629 19.1129H15.9379V15.2665C16.2981 15.3959 16.6798 15.5398 17.0629 15.6933V19.1129Z" fill="white"/>
                        <path d="M11.9957 7.20665C11.2066 7.20647 10.0717 7.1356 8.96021 7.01713C8.86189 7.00587 8.77201 6.9562 8.71016 6.87894C8.64832 6.80168 8.61953 6.7031 8.63006 6.6047C8.6406 6.5063 8.68961 6.41606 8.76641 6.35364C8.84321 6.29123 8.94158 6.26171 9.04005 6.27153C10.1266 6.38725 11.2315 6.45647 11.9957 6.45665C12.9003 6.45647 14.1201 6.3607 14.9606 6.27134C15.059 6.2618 15.1571 6.2915 15.2337 6.35398C15.3103 6.41646 15.3591 6.50666 15.3696 6.60495C15.38 6.70324 15.3512 6.80168 15.2894 6.87884C15.2276 6.95599 15.1379 7.00563 15.0397 7.01695C14.6229 7.06145 13.1713 7.20647 11.9957 7.20665Z" fill="white"/>
                    </svg>

                    <span>Asset preservation specialists</span>
                </span>
                <span class="rx-top-strip-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M4.35954 5.08593L5.05798 6.52968L6.64235 6.7453C6.95642 6.78749 7.06892 7.17655 6.85329 7.3828L5.69548 8.49374L5.98142 10.0687C6.03767 10.3781 5.70954 10.6125 5.43767 10.4625L4.02673 9.70312L2.61579 10.4625C2.34392 10.6078 2.00173 10.3828 2.07673 10.0453L2.35798 8.48905L1.20017 7.37812C0.975166 7.16249 1.09704 6.77812 1.41579 6.73593L2.99548 6.5203L3.69392 5.07655C3.82517 4.79999 4.22829 4.80468 4.35954 5.08593ZM4.47204 7.03593L4.02673 6.1078L3.57673 7.03593C3.52517 7.14374 3.41735 7.22812 3.29079 7.24687L2.2736 7.3828L3.01892 8.0953C3.10329 8.17968 3.15017 8.30155 3.12673 8.42812L2.94392 9.44062L3.84392 8.9578C3.95173 8.90155 4.08767 8.89218 4.20017 8.9578L5.10485 9.4453L4.92673 8.45155C4.8986 8.32968 4.93142 8.19374 5.02985 8.0953L5.77517 7.3828L4.76735 7.24687C4.64548 7.2328 4.52829 7.15312 4.47204 7.03593ZM12.3377 1.68749L13.0361 3.13124L14.6252 3.34687C14.9392 3.38905 15.0517 3.77812 14.8361 3.98905L13.6783 5.09999L13.9642 6.67499C14.0205 6.98437 13.6924 7.21874 13.4205 7.06874L12.0002 6.30937L10.5892 7.06874C10.3174 7.21405 9.97517 6.98905 10.0502 6.65155L10.3314 5.0953L9.16892 3.98437C8.94392 3.76874 9.06579 3.38437 9.38454 3.34218L10.9642 3.12655L11.6627 1.68749C11.8033 1.40155 12.2017 1.40624 12.3377 1.68749ZM12.4502 3.63749L12.0002 2.70937L11.5549 3.63749C11.5033 3.7453 11.3955 3.82968 11.2689 3.84843L10.247 3.98437L10.9924 4.69687C11.0814 4.78124 11.1236 4.90312 11.1002 5.02968L10.9174 6.04218L11.822 5.55937C11.9299 5.50312 12.0611 5.49374 12.1783 5.55937L13.083 6.04687L12.9049 5.05312C12.8767 4.93124 12.9095 4.7953 13.008 4.69687L13.7533 3.98437L12.7455 3.84374C12.6189 3.83437 12.5064 3.75468 12.4502 3.63749ZM20.3111 5.08593L21.0095 6.52968L22.5939 6.7453C22.908 6.78749 23.0252 7.17655 22.8049 7.3828L21.647 8.49374L21.933 10.0687C21.9892 10.3781 21.6611 10.6125 21.3892 10.4625L19.9783 9.70312L18.5674 10.4625C18.2955 10.6078 17.9533 10.3828 18.0236 10.0453L18.3049 8.48905L17.147 7.37812C16.922 7.16249 17.0439 6.77812 17.3627 6.73593L18.9424 6.5203L19.6408 5.07655C19.7767 4.79999 20.1799 4.80468 20.3111 5.08593ZM20.4236 7.03593L19.9783 6.1078L19.5283 7.03593C19.4767 7.14374 19.3736 7.22812 19.2424 7.24687L18.2252 7.3828L18.9658 8.0953C19.0502 8.17968 19.097 8.30155 19.0736 8.42812L18.8908 9.44062L19.7955 8.9578C19.9033 8.90155 20.0392 8.89218 20.1517 8.9578L21.0611 9.4453L20.883 8.45155C20.8549 8.32968 20.8877 8.19374 20.9861 8.0953L21.7267 7.3828L20.7189 7.24687C20.597 7.2328 20.4799 7.15312 20.4236 7.03593ZM10.2611 14.6578C10.158 14.4797 10.2189 14.25 10.397 14.1469C10.5752 14.0437 10.8049 14.1047 10.908 14.2828L11.4002 15.1359L13.1486 13.3875C13.2939 13.2422 13.533 13.2422 13.6783 13.3875C13.8236 13.5328 13.8236 13.7719 13.6783 13.9172L11.583 16.0125C11.4095 16.1859 11.1189 16.1484 10.997 15.9375L10.2611 14.6578ZM12.0002 10.6969C14.0392 10.6969 15.6939 12.3516 15.6939 14.3906C15.6939 16.4297 14.0392 18.0844 12.0002 18.0844C9.9611 18.0844 8.30642 16.4297 8.30642 14.3906C8.30642 12.3516 9.9611 10.6969 12.0002 10.6969ZM14.0814 12.3094C12.933 11.1609 11.0674 11.1609 9.91892 12.3094C8.77048 13.4578 8.77048 15.3234 9.91892 16.4719C11.0674 17.6203 12.933 17.6203 14.0814 16.4719C15.2299 15.3187 15.2299 13.4578 14.0814 12.3094ZM12.0002 8.37655C15.3189 8.37655 18.0095 11.0672 18.0095 14.3859C18.0095 15.6422 17.6252 16.8094 16.9642 17.775L18.7595 20.8828C18.933 21.1734 18.6939 21.5016 18.3845 21.4547L16.547 21.1641L15.5627 22.3734C15.3892 22.5984 15.0658 22.5609 14.9392 22.3359L13.683 20.1609C12.5861 20.4797 11.4095 20.4797 10.3174 20.1609L9.0611 22.3359C8.93454 22.5609 8.6111 22.5984 8.43767 22.3734L7.45329 21.1641L5.61579 21.4547C5.30173 21.5062 5.08142 21.1641 5.23142 20.8969L7.0361 17.775C5.40485 15.3891 5.70954 12.1781 7.75329 10.1344C8.8361 9.05155 10.3408 8.37655 12.0002 8.37655ZM16.4674 18.4078C15.8955 19.0453 15.1924 19.5562 14.3955 19.9031L15.3142 21.4922L16.1017 20.5266C16.1908 20.4141 16.3267 20.3719 16.458 20.3953L17.7236 20.5969L16.4674 18.4078ZM9.60017 19.9031C8.80798 19.5562 8.10485 19.0453 7.53298 18.4125L6.27204 20.5969L7.53767 20.3953C7.66423 20.3719 7.80485 20.4187 7.89392 20.5266L8.68142 21.4922L9.60017 19.9031ZM15.722 10.6687C13.6689 8.61562 10.3361 8.61562 8.28298 10.6687C6.22985 12.7219 6.22985 16.0547 8.28298 18.1078C10.3408 20.1609 13.6689 20.1609 15.722 18.1078C17.7752 16.0547 17.7752 12.7219 15.722 10.6687Z" fill="white"/>
                    </svg>
                    <span>Over 50 years experience</span>
                </span>
                <span class="rx-top-strip-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                        <path d="M19.4972 5.44032L15.5597 1.50282C15.4984 1.442 15.4256 1.39388 15.3457 1.36122C15.2657 1.32857 15.1801 1.31201 15.0937 1.31251H7.21875C6.6966 1.31251 6.19585 1.51993 5.82663 1.88914C5.45742 2.25836 5.25 2.75912 5.25 3.28126V4.59376C5.25 4.76781 5.31914 4.93473 5.44221 5.0578C5.56528 5.18087 5.7322 5.25001 5.90625 5.25001C6.0803 5.25001 6.24722 5.18087 6.37029 5.0578C6.49336 4.93473 6.5625 4.76781 6.5625 4.59376V3.28126C6.5625 3.10721 6.63164 2.94029 6.75471 2.81722C6.87778 2.69415 7.0447 2.62501 7.21875 2.62501H14.4375V4.59376C14.4375 5.11591 14.6449 5.61667 15.0141 5.98588C15.3833 6.35509 15.8841 6.56251 16.4062 6.56251H18.375V17.7188C18.375 17.8928 18.3059 18.0597 18.1828 18.1828C18.0597 18.3059 17.8928 18.375 17.7187 18.375H9.84375C9.6697 18.375 9.50278 18.4442 9.37971 18.5672C9.25664 18.6903 9.1875 18.8572 9.1875 19.0313C9.1875 19.2053 9.25664 19.3722 9.37971 19.4953C9.50278 19.6184 9.6697 19.6875 9.84375 19.6875H17.7187C18.2409 19.6875 18.7417 19.4801 19.1109 19.1109C19.4801 18.7417 19.6875 18.2409 19.6875 17.7188V5.90626C19.688 5.81989 19.6714 5.73428 19.6388 5.65432C19.6061 5.57437 19.558 5.50164 19.4972 5.44032ZM15.75 4.59376V3.55032L17.4497 5.25001H16.4062C16.2322 5.25001 16.0653 5.18087 15.9422 5.0578C15.8191 4.93473 15.75 4.76781 15.75 4.59376Z" fill="white"/>
                        <path d="M9.18749 10.5C9.18882 9.84289 9.02566 9.19587 8.71288 8.61794C8.40011 8.04002 7.94766 7.54956 7.39679 7.19128C6.84592 6.833 6.21413 6.61828 5.55902 6.56671C4.90391 6.51514 4.24631 6.62834 3.64616 6.89601C3.04601 7.16368 2.52239 7.5773 2.12304 8.09916C1.72368 8.62103 1.46128 9.23454 1.35977 9.88379C1.25825 10.533 1.32084 11.1974 1.54184 11.8162C1.76283 12.4351 2.13519 12.9888 2.62499 13.4269V19.0313C2.62564 19.1608 2.66462 19.2873 2.73703 19.3947C2.80943 19.5022 2.91202 19.5858 3.03187 19.635C3.15138 19.6853 3.2831 19.699 3.4104 19.6745C3.53771 19.65 3.6549 19.5883 3.74718 19.4972L5.24999 17.9878L6.7528 19.4972C6.81413 19.558 6.88685 19.6062 6.9668 19.6388C7.04676 19.6715 7.13238 19.688 7.21874 19.6875C7.30483 19.6897 7.39023 19.6718 7.46812 19.635C7.58796 19.5858 7.69055 19.5022 7.76296 19.3947C7.83536 19.2873 7.87435 19.1608 7.87499 19.0313V13.4269C8.28692 13.0585 8.61667 12.6074 8.8428 12.1032C9.06893 11.5989 9.18637 11.0527 9.18749 10.5ZM6.56249 17.4497L5.71593 16.5966C5.65492 16.5351 5.58234 16.4863 5.50237 16.4529C5.4224 16.4196 5.33663 16.4025 5.24999 16.4025C5.16336 16.4025 5.07758 16.4196 4.99761 16.4529C4.91764 16.4863 4.84506 16.5351 4.78406 16.5966L3.93749 17.4497V14.2078C4.7857 14.514 5.71428 14.514 6.56249 14.2078V17.4497ZM5.24999 13.125C4.73082 13.125 4.2233 12.9711 3.79162 12.6826C3.35994 12.3942 3.02349 11.9842 2.82481 11.5046C2.62613 11.0249 2.57415 10.4971 2.67543 9.98791C2.77672 9.47871 3.02672 9.01098 3.39384 8.64387C3.76095 8.27675 4.22868 8.02675 4.73788 7.92546C5.24708 7.82418 5.77488 7.87616 6.25454 8.07484C6.73419 8.27352 7.14416 8.60997 7.4326 9.04165C7.72104 9.47333 7.87499 9.98085 7.87499 10.5C7.87499 11.1962 7.59843 11.8639 7.10615 12.3562C6.61386 12.8485 5.94619 13.125 5.24999 13.125Z" fill="white"/>
                        <path d="M12.4688 5.25H9.1875C9.01345 5.25 8.84653 5.31914 8.72346 5.44221C8.60039 5.56528 8.53125 5.7322 8.53125 5.90625C8.53125 6.0803 8.60039 6.24722 8.72346 6.37029C8.84653 6.49336 9.01345 6.5625 9.1875 6.5625H12.4688C12.6428 6.5625 12.8097 6.49336 12.9328 6.37029C13.0559 6.24722 13.125 6.0803 13.125 5.90625C13.125 5.7322 13.0559 5.56528 12.9328 5.44221C12.8097 5.31914 12.6428 5.25 12.4688 5.25Z" fill="white"/>
                        <path d="M16.4062 8.53125H11.1562C10.9822 8.53125 10.8153 8.60039 10.6922 8.72346C10.5691 8.84653 10.5 9.01345 10.5 9.1875C10.5 9.36155 10.5691 9.52847 10.6922 9.65154C10.8153 9.77461 10.9822 9.84375 11.1562 9.84375H16.4062C16.5803 9.84375 16.7472 9.77461 16.8703 9.65154C16.9934 9.52847 17.0625 9.36155 17.0625 9.1875C17.0625 9.01345 16.9934 8.84653 16.8703 8.72346C16.7472 8.60039 16.5803 8.53125 16.4062 8.53125Z" fill="white"/>
                        <path d="M16.4062 11.8125H11.1562C10.9822 11.8125 10.8153 11.8816 10.6922 12.0047C10.5691 12.1278 10.5 12.2947 10.5 12.4688C10.5 12.6428 10.5691 12.8097 10.6922 12.9328C10.8153 13.0559 10.9822 13.125 11.1562 13.125H16.4062C16.5803 13.125 16.7472 13.0559 16.8703 12.9328C16.9934 12.8097 17.0625 12.6428 17.0625 12.4688C17.0625 12.2947 16.9934 12.1278 16.8703 12.0047C16.7472 11.8816 16.5803 11.8125 16.4062 11.8125Z" fill="white"/>
                        <path d="M16.4062 15.0938H9.84375C9.6697 15.0938 9.50278 15.1629 9.37971 15.286C9.25664 15.409 9.1875 15.576 9.1875 15.75C9.1875 15.924 9.25664 16.091 9.37971 16.214C9.50278 16.3371 9.6697 16.4062 9.84375 16.4062H16.4062C16.5803 16.4062 16.7472 16.3371 16.8703 16.214C16.9934 16.091 17.0625 15.924 17.0625 15.75C17.0625 15.576 16.9934 15.409 16.8703 15.286C16.7472 15.1629 16.5803 15.0938 16.4062 15.0938Z" fill="white"/>
                    </svg>
                    <span>Licensed Builder</span>
                </span>
                <span class="rx-top-strip-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none">
                        <path d="M18.4148 3.5357C18.4148 3.12888 18.085 2.79909 17.6782 2.79909C17.2713 2.79909 16.9415 3.12888 16.9415 3.5357C16.9415 3.94251 17.2713 4.2723 17.6782 4.2723V5.49998C16.5933 5.49998 15.7139 4.62054 15.7139 3.5357C15.7139 2.45085 16.5933 1.57141 17.6782 1.57141C18.763 1.57141 19.6424 2.45085 19.6424 3.5357C19.6424 4.62054 18.763 5.49998 17.6782 5.49998V4.2723C18.085 4.2723 18.4148 3.94251 18.4148 3.5357Z" fill="white"/>
                        <path d="M4.27218 1.96429C4.27218 1.55747 3.94239 1.22768 3.53557 1.22768C3.12876 1.22768 2.79897 1.55747 2.79897 1.96429C2.79897 2.3711 3.12876 2.70089 3.53557 2.70089V3.92857C2.45073 3.92857 1.57129 3.04913 1.57129 1.96429C1.57129 0.879441 2.45073 0 3.53557 0C4.62042 0 5.49986 0.879441 5.49986 1.96429C5.49986 3.04913 4.62042 3.92857 3.53557 3.92857V2.70089C3.94239 2.70089 4.27218 2.3711 4.27218 1.96429Z" fill="white"/>
                        <path d="M10.214 1.57142C10.214 2.00536 9.86223 2.35713 9.42829 2.35713C8.99435 2.35713 8.64258 2.00536 8.64258 1.57142C8.64258 1.13748 8.99435 0.785706 9.42829 0.785706C9.86223 0.785706 10.214 1.13748 10.214 1.57142Z" fill="white"/>
                        <path d="M2.35756 7.85713C2.35756 8.29106 2.00579 8.64284 1.57185 8.64284C1.13791 8.64284 0.786133 8.29106 0.786133 7.85713C0.786133 7.42319 1.13791 7.07141 1.57185 7.07141C2.00579 7.07141 2.35756 7.42319 2.35756 7.85713Z" fill="white"/>
                        <path d="M19.6427 7.07142C19.6427 7.50536 19.2909 7.85713 18.857 7.85713C18.4231 7.85713 18.0713 7.50536 18.0713 7.07142C18.0713 6.63748 18.4231 6.28571 18.857 6.28571C19.2909 6.28571 19.6427 6.63748 19.6427 7.07142Z" fill="white"/>
                        <path d="M4.55092 8.66886C5.61613 8.55183 6.54504 8.84244 7.24258 9.29501C7.91477 9.73114 8.44253 10.367 8.6158 11.0212C8.7303 11.4536 8.47649 11.8983 8.04914 12.0141C7.62182 12.1299 7.18263 11.8732 7.06813 11.4408C7.02667 11.2844 6.8199 10.9467 6.37761 10.6597C5.96057 10.3892 5.39442 10.2069 4.72407 10.2805C3.7139 10.3915 2.95052 11.048 2.59775 11.9711C2.24405 12.8968 2.30554 14.1049 3.0395 15.2475C3.28061 15.6229 3.17546 16.125 2.80454 16.369C2.43362 16.6129 1.93741 16.5065 1.69627 16.1312C0.694558 14.5719 0.555811 12.8192 1.10328 11.3864C1.65171 9.95123 2.89102 8.85127 4.55092 8.66886Z" fill="white"/>
                        <path d="M12.4871 6.74792C12.4871 6.55352 12.2902 6.07264 11.7033 5.58858C11.1551 5.13653 10.4047 4.80675 9.59012 4.80675C8.78635 4.80675 8.21103 4.99566 7.79221 5.26252C7.37127 5.53073 7.06048 5.90837 6.83572 6.35849C6.37362 7.28395 6.30833 8.45499 6.41083 9.27919C6.46753 9.73509 6.14584 10.1508 5.69226 10.2078C5.23867 10.2648 4.82508 9.94146 4.76838 9.48555C4.64096 8.46101 4.6991 6.92827 5.35628 5.61214C5.69115 4.9415 6.18882 4.31384 6.90578 3.85701C7.62489 3.39882 8.51698 3.14288 9.59012 3.14288C10.8447 3.14289 11.9567 3.64505 12.7535 4.30222C13.5115 4.9274 14.1424 5.8331 14.1424 6.74792C14.1424 7.20736 13.7718 7.57982 13.3147 7.57985C12.8576 7.57985 12.4871 7.20738 12.4871 6.74792Z" fill="white"/>
                        <path d="M13.904 6.28571C15.2205 6.28571 16.1668 6.84752 16.7157 7.5993C17.0302 8.03012 17.2189 8.53404 17.263 9.02143C18.1452 9.18547 19.1384 9.5692 19.9177 10.3085C20.9966 11.3321 21.5354 12.9122 21.0126 15.1254C20.9166 15.5318 20.4929 15.7871 20.0662 15.6957C19.6394 15.6043 19.3713 15.2008 19.4673 14.7944C19.8948 12.9848 19.4214 11.9668 18.7998 11.3771C18.1313 10.7429 17.1494 10.4693 16.3733 10.4332C16.1258 10.4217 15.8983 10.3007 15.7584 10.1059C15.6185 9.91122 15.5824 9.66539 15.6607 9.44153C15.7218 9.26704 15.7012 8.85241 15.4153 8.46063C15.1611 8.11248 14.6994 7.79426 13.904 7.79426C13.4711 7.79426 13.1692 7.98205 12.946 8.25635C12.7037 8.55414 12.5947 8.912 12.5825 9.09853C12.5551 9.51424 12.179 9.83017 11.7425 9.80419C11.306 9.77815 10.9743 9.41997 11.0016 9.00424C11.0333 8.52032 11.2544 7.87242 11.694 7.33216C12.1528 6.7684 12.8849 6.28571 13.904 6.28571Z" fill="white"/>
                        <path d="M14.0343 14.5633C14.8364 14.0863 15.8483 14.0791 16.6911 14.2295C17.5472 14.3822 18.4058 14.729 18.9749 15.1641C19.1274 15.2806 19.4431 15.3649 19.9059 15.3545C20.3402 15.3447 20.7693 15.2551 21.0158 15.1797C21.4256 15.0543 21.8529 15.3082 21.9701 15.7469C22.0872 16.1857 21.8498 16.643 21.4399 16.7684C21.086 16.8766 20.5246 16.9935 19.9383 17.0067C19.3806 17.0193 18.6454 16.9429 18.0774 16.5086C17.7459 16.2552 17.1249 15.9823 16.4373 15.8596C15.7362 15.7346 15.1399 15.7963 14.7841 16.0078C13.6394 16.6886 10.9636 18.1753 8.24496 16.5586C6.26829 15.3832 4.64617 16.0605 3.53003 16.5914C2.91701 16.8831 2.27758 16.9328 1.75528 16.8948C1.23391 16.8569 0.775268 16.7277 0.485334 16.6035C0.0895332 16.4341 -0.102873 15.9533 0.0554028 15.5296C0.213733 15.1059 0.662918 14.8997 1.05874 15.0692C1.19764 15.1286 1.49805 15.2198 1.86006 15.2461C2.22115 15.2724 2.5896 15.2303 2.90285 15.0813C4.10247 14.5106 6.33996 13.5354 8.99476 15.1141C10.9076 16.2515 12.8634 15.2596 14.0343 14.5633Z" fill="white"/>
                    </svg>
                    <span>Australian Resin</span>
                </span>
            </span>
            <?php $rx_top_strip_message = ob_get_clean(); ?>
            <p class="rx-top-strip-text" aria-label="Proven experts. Trusted by thousands. Results you can measure. Asset preservation specialists. Over 50 years experience. Licensed Builder. Australian Resin.">
                <span class="rx-top-strip-track" aria-hidden="true">
                    <?php echo $rx_top_strip_message . $rx_top_strip_message; ?>
                </span>
            </p>
        </div>
    </div>

    <header class="rx-primary-nav" aria-label="Rectify main header">
        <div class="rx-wrap rx-nav-inner">
            <a class="rx-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(rx_asset_url('images/rectify.png')); ?>" alt="Rectify logo" class="rx-logo-img" style="max-width: 240px">
            </a>
            <div class="rx-nav-contact">
                <a class="rx-phone" href="tel:1800182020"><img src="<?php echo esc_url(rx_asset_url('icons/phone.svg')); ?>" alt=""> 1800 18 20 20</a>
                <a class="rx-btn rx-btn-red" href="<?php echo esc_url(home_url('/get-a-free-quote/')); ?>">GET A FREE QUOTE</a>
            </div>
            <button type="button" class="rx-menu-toggle" aria-expanded="false" aria-controls="rx-mobile-menu" aria-label="Open menu">
                <span class="rx-menu-toggle-bar"></span>
                <span class="rx-menu-toggle-bar"></span>
                <span class="rx-menu-toggle-bar"></span>
            </button>
        </div>
    </header>

    <nav class="rx-menu-bar" id="rx-mobile-menu" aria-label="Homepage navigation">
        <div class="rx-mobile-menu-head">
            <button type="button" class="rx-menu-close" aria-label="Close menu">
                <span class="rx-menu-close-bar"></span>
                <span class="rx-menu-close-bar"></span>
            </button>
            <div class="rx-mobile-menu-contact">
                <a class="rx-mobile-phone" href="tel:1800182020"><img src="<?php echo esc_url(rx_asset_url('icons/phone.svg')); ?>" alt=""> 1800 18 20 20</a>
                <a class="rx-btn rx-btn-red rx-mobile-cta" href="<?php echo esc_url(home_url('/get-a-free-quote/')); ?>">GET A FREE QUOTE</a>
            </div>
        </div>
        <div class="rx-wrap">
            <?php if ($rectify_use_wordpress_mega_menu) : ?>
                <?php
                $rectify_menu_args = array(
                    'theme_location' => $rectify_menu_location,
                    'container' => false,
                    'menu_class' => 'rx-menu',
                    'depth' => 2,
                    'walker' => new Rectify_Mega_Menu_Walker(),
                    'fallback_cb' => false,
                );

                wp_nav_menu($rectify_menu_args);
                ?>
            <?php else : ?>
                <ul class="rx-menu rx-menu-fallback">
                    <li class="menu-item rx-menu-item rx-mega-parent is-active menu-item-has-children">
                        <a class="rx-mega-link" href="#services" aria-haspopup="true" aria-expanded="false">
                            <span class="rx-mega-link">Residential</span>
                            <span class="arrow-down"></span>
                        </a>
                        <div class="rx-mega-submenu">
                            <div class="rx-mega-submenu-inner">
                                <div class="rx-mega-submenu-intro">
                                    <h3>Residential Problem We Rectify</h3>
                                    <p>With half a century of combined expertise, Rectify Group brings cutting-edge solutions right to your doorstep. Your home’s structural integrity is in safe hands.</p>
                                    <a class="rx-mega-cta" href="#services">EXPLORE MORE SOLUTIONS</a>
                                </div>
                                <ul class="rx-mega-submenu-list">
                                    <?php foreach ($rectify_fallback_menu_services as $service) : ?>
                                        <li class="rx-mega-child">
                                            <a class="rx-mega-sub-link" href="<?php echo esc_url(isset($service[3]) ? $service[3] : '#services'); ?>">
                                                <span class="rx-mega-icon-wrap"><img class="rx-mega-icon" src="<?php echo esc_url(rx_asset_url('icons/' . $service[0])); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-sub-copy">
                                                    <span class="rx-mega-sub-title"><?php echo esc_html($service[1]); ?></span>
                                                    <span class="rx-mega-sub-desc"><?php echo esc_html($service[2]); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#commercial" aria-haspopup="true" aria-expanded="false"><span class="rx-mega-link" >Commercial Solutions</span> <span class="arrow-down"></span></a>
                    <div class="rx-mega-submenu">
                            <div class="rx-mega-submenu-inner">
                                <div class="rx-mega-submenu-intro">
                                    <h3>Residential Problem We Rectify</h3>
                                    <p>With half a century of combined expertise, Rectify Group brings cutting-edge solutions right to your doorstep. Your home’s structural integrity is in safe hands.</p>
                                    <a class="rx-mega-cta" href="#services">EXPLORE MORE SOLUTIONS</a>
                                </div>
                                <ul class="rx-mega-submenu-list">
                                    <?php foreach ($rectify_fallback_menu_services as $service) : ?>
                                        <li class="rx-mega-child">
                                            <a class="rx-mega-sub-link" href="<?php echo esc_url(isset($service[3]) ? $service[3] : '#services'); ?>">
                                                <span class="rx-mega-icon-wrap"><img class="rx-mega-icon" src="<?php echo esc_url(rx_asset_url('icons/' . $service[0])); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-sub-copy">
                                                    <span class="rx-mega-sub-title"><?php echo esc_html($service[1]); ?></span>
                                                    <span class="rx-mega-sub-desc"><?php echo esc_html($service[2]); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="rx-menu-item rx-mega-parent menu-item-has-children menu-industries">
                        <a class="rx-mega-link" href="#projects" aria-haspopup="true" aria-expanded="false">
                            <span class="rx-mega-link">Industries</span>
                            <span class="arrow-down"></span>
                        </a>
                        <div class="rx-mega-submenu rx-mega-submenu--industries">
                            <div class="rx-mega-submenu-inner rx-mega-submenu-inner--industries">
                                <div class="rx-mega-submenu-intro rx-mega-submenu-intro--industries">
                                    <h3>Industries We Serve</h3>
                                    <p>Delivering engineered structural solutions across residential, commercial, industrial, and critical infrastructure sectors.</p>
                                </div>
                                <ul class="rx-mega-industries-grid">
                                    <?php foreach ($rectify_industries_services as $industry) : ?>
                                        <li class="rx-mega-industries-item">
                                            <a class="rx-mega-industries-link" href="<?php echo esc_url($industry[2]); ?>">
                                                <span class="rx-mega-industries-media"><img src="<?php echo esc_url($industry[0]); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-industries-label"><?php echo esc_html($industry[1]); ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="rx-menu-item rx-mega-parent menu-item-has-children">
                        <a class="rx-mega-link" href="#resources" aria-haspopup="true" aria-expanded="false">
                            <span class="rx-mega-link">Resources</span>
                            <span class="arrow-down"></span>
                        </a>
                        <div class="rx-mega-submenu rx-mega-submenu--resources">
                            <div class="rx-mega-resources">
                                <div class="rx-mega-resources-col">
                                    <h3 class="rx-mega-resources-heading">Residential Case Studies</h3>
                                    <a class="rx-mega-resources-card" href="<?php echo esc_url(home_url('/resources/case-studies/')); ?>">
                                        <span class="rx-mega-resources-card-label">Recent Residential Project</span>
                                        <span class="rx-mega-resources-card-media">
                                            <img src="<?php echo esc_url(rx_asset_url('images/home/IMG_0867-1.jpg')); ?>" alt="" loading="lazy" decoding="async">
                                        </span>
                                        <span class="rx-mega-resources-card-title">Soil Stabilization for Apartment Block Construction in Hampton, Victoria</span>
                                    </a>
                                    <a class="rx-mega-resources-more" href="<?php echo esc_url(home_url('/resources/case-studies/')); ?>">See More Case Studies</a>
                                </div>
                                <div class="rx-mega-resources-col">
                                    <h3 class="rx-mega-resources-heading">Commercial Case Studies</h3>
                                    <a class="rx-mega-resources-card" href="<?php echo esc_url(home_url('/resources/case-studies/')); ?>">
                                        <span class="rx-mega-resources-card-label">Recent Commercial Project</span>
                                        <span class="rx-mega-resources-card-media">
                                            <img src="<?php echo esc_url(rx_asset_url('images/home/Wall-with-prop7.jpg')); ?>" alt="" loading="lazy" decoding="async">
                                        </span>
                                        <span class="rx-mega-resources-card-title">Warehouse Stability Resolved in South Geelong</span>
                                    </a>
                                    <a class="rx-mega-resources-more" href="<?php echo esc_url(home_url('/resources/case-studies/')); ?>">See More Case Studies</a>
                                </div>
                                <div class="rx-mega-resources-col">
                                    <h3 class="rx-mega-resources-heading">News &amp; Insights</h3>
                                    <a class="rx-mega-resources-card" href="<?php echo esc_url(home_url('/resources/news-and-insights/')); ?>">
                                        <span class="rx-mega-resources-card-label">Recent Blog Post</span>
                                        <span class="rx-mega-resources-card-media">
                                            <img src="<?php echo esc_url(rx_asset_url('images/home/article_2.png')); ?>" alt="" loading="lazy" decoding="async">
                                        </span>
                                        <span class="rx-mega-resources-card-title">Red flags when comparing costs</span>
                                    </a>
                                    <a class="rx-mega-resources-more" href="<?php echo esc_url(home_url('/resources/news-and-insights/')); ?>">See More News &amp; Insights</a>
                                </div>
                                <div class="rx-mega-resources-col rx-mega-resources-col--faqs">
                                    <h3 class="rx-mega-resources-heading">FAQs</h3>
                                    <ul class="rx-mega-resources-faq-list">
                                        <li><a href="<?php echo esc_url(home_url('/resources/faq/residential/')); ?>">Residential FAQs</a></li>
                                        <li><a href="<?php echo esc_url(home_url('/resources/faq/commercial/')); ?>">Commercial FAQs</a></li>
                                        <li><a href="<?php echo esc_url(home_url('/resources/faq/our-process/')); ?>">Our Process FAQs</a></li>
                                        <li><a href="<?php echo esc_url(home_url('/resources/faq/our-technology/')); ?>">Our Technology FAQs</a></li>
                                        <li><a href="<?php echo esc_url(home_url('/resources/faq/industries-we-serve/')); ?>">Industries We Serve FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="rx-menu-item rx-mega-parent menu-item-has-children">
                        <a class="rx-mega-link" href="#about" aria-haspopup="true" aria-expanded="false">
                            <span class="rx-mega-link">About Us</span>
                            <span class="arrow-down"></span>
                        </a>
                        <div class="rx-mega-submenu rx-mega-submenu--about">
                            <div class="rx-mega-submenu-inner rx-mega-submenu-inner--about">
                                <div class="rx-mega-submenu-intro rx-mega-submenu-intro--about">
                                    <h3>Structural Stability. Engineering Confidence.</h3>
                                    <p>We deliver engineered solutions that stabilise structures, reduce risk, and extend asset life.</p>
                                </div>
                                <div class="rx-mega-about">
                                    <ul class="rx-mega-about-col">
                                        <li class="rx-mega-about-item is-active">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_About Us.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">About Rectify dddddd</span>
                                                    <span class="rx-mega-about-desc">Engineering-led specialists dedicated to structural performance and long-term asset preservation.</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/our-story/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Our Story.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Our Story</span>
                                                    <span class="rx-mega-about-desc">Engineering confidence into every structure we touch.</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/our-locations/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Our Locations.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Our Locations</span>
                                                    <span class="rx-mega-about-desc">Delivering specialised solutions wherever they're needed.</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="rx-mega-about-col">
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/meet-the-team/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Meet the Team.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Meet the Team</span>
                                                    <span class="rx-mega-about-desc">Experienced professionals committed to getting it right.</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/our-technology/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Our Technology.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Our Technology</span>
                                                    <span class="rx-mega-about-desc">Advanced technologies, practical expertise, and solutions designed around measurable outcomes.</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/our-process/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Our Process.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Our Process</span>
                                                    <span class="rx-mega-about-desc">Assessed. Engineered. Verified.</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="rx-mega-about-col">
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/certifications-and-compliance/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Certifications and Compliance.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Certifications &amp; Compliance</span>
                                                    <span class="rx-mega-about-desc">Registered builders delivering compliant, performance-driven solutions across diverse sectors.</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="rx-mega-about-item">
                                            <a class="rx-mega-about-link" href="<?php echo esc_url(home_url('/about-us/careers/')); ?>">
                                                <span class="rx-mega-about-icon-wrap"><img class="rx-mega-about-icon" src="<?php echo esc_url(rx_asset_url('icons/Rectify Icon Set_Careers.svg')); ?>" alt="" loading="lazy" decoding="async"></span>
                                                <span class="rx-mega-about-copy">
                                                    <span class="rx-mega-about-title">Careers</span>
                                                    <span class="rx-mega-about-desc">Work alongside industry specialists on projects that protect and strengthen critical assets.</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <li><a href="#contact"><span class="rx-mega-link">Contact Us</span></a></li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
