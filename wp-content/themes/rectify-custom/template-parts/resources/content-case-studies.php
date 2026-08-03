<?php
/**
 * Case Studies listing page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Every card links to the single case study template until each case
// study has its own dedicated page.
$case_study_single_page = get_page_by_path( 'resources/case-studies-sigle-page' );
if ( ! $case_study_single_page instanceof WP_Post ) {
    $case_study_single_page = get_page_by_path( 'case-studies-sigle-page' );
}
$case_study_single_url = $case_study_single_page instanceof WP_Post ? get_permalink( $case_study_single_page ) : '#';

$filters      = array( array( 'key' => 'all', 'label' => 'All' ) );
$case_studies = array();

// Pull real posts from the Case Studies And News & Insights post type,
// filtered to the "Case Studies" branch of the Article Category taxonomy.
$case_parent_term = get_term_by( 'slug', 'case-studies', 'article_category' );

if ( $case_parent_term instanceof WP_Term ) {
    $child_terms = get_terms( array(
        'taxonomy'   => 'article_category',
        'parent'     => $case_parent_term->term_id,
        'hide_empty' => false,
        'orderby'    => 'term_id',
    ) );

    if ( ! is_wp_error( $child_terms ) ) {
        foreach ( $child_terms as $child_term ) {
            $filters[] = array( 'key' => $child_term->slug, 'label' => $child_term->name );
        }
    }

    $case_query = new WP_Query( array(
        'post_type'      => 'rectify_article',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
        'tax_query'      => array(
            array(
                'taxonomy' => 'article_category',
                'field'    => 'term_id',
                'terms'    => $case_parent_term->term_id,
            ),
        ),
    ) );

    foreach ( $case_query->posts as $case_post ) {
        $child_term = function_exists( 'rectify_custom_article_child_term' )
            ? rectify_custom_article_child_term( $case_post, $case_parent_term->term_id )
            : null;

        $thumbnail = get_the_post_thumbnail_url( $case_post, 'large' );

        $case_studies[] = array(
            'category' => $child_term instanceof WP_Term ? $child_term->slug : 'all',
            'badge'    => ( $child_term instanceof WP_Term ? $child_term->name . ' ' : '' ) . 'Case Study',
            'image'    => $thumbnail ? $thumbnail : rx_asset_url( 'images/home/resources-image.webp' ),
            'title'    => get_the_title( $case_post ),
            'url'      => get_permalink( $case_post ),
        );
    }
}

// Fallback to the original hard-coded cards if no posts exist yet.
if ( empty( $case_studies ) ) {
    $filters = array(
        array( 'key' => 'all', 'label' => 'All' ),
        array( 'key' => 'residential', 'label' => 'Residential' ),
        array( 'key' => 'infrastructure', 'label' => 'Infrastructure' ),
        array( 'key' => 'commercial', 'label' => 'Commercial' ),
    );

    $case_studies = array(
    array(
        'category' => 'residential',
        'badge'    => 'Residential Case Study',
        'image'    => rx_asset_url( 'images/home/sloping-slab.webp' ),
        'title'    => 'Sinkhole Remediation Explained: Early Warning Signs and How to Fix Them',
    ),
    array(
        'category' => 'infrastructure',
        'badge'    => 'Infrastructure Case Study',
        'image'    => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
        'title'    => 'Government Infrastructure Maintenance Solutions for Ground Stability and Structural Remediation',
    ),
    array(
        'category' => 'commercial',
        'badge'    => 'Commercial Case Study',
        'image'    => rx_asset_url( 'images/home/TruckandVanathouse.jpg' ),
        'title'    => 'Void Filling Under Concrete: How Engineered Fill Solutions Prevent Long-Term Damage',
    ),
    array(
        'category' => 'residential',
        'badge'    => 'Residential Case Study',
        'image'    => rx_asset_url( 'images/home/rectify-homepage-hero.webp' ),
        'title'    => 'Chemical Underpinning in Australia: the Smart Fix for Cracked Walls, Sloping Floors & Unstable Foundations',
    ),
    array(
        'category' => 'infrastructure',
        'badge'    => 'Infrastructure Case Study',
        'image'    => rx_asset_url( 'images/home/IMG_0867-1.jpg' ),
        'title'    => 'Marine Structures Repair Strategies for Erosion Control and Structural Stability',
    ),
    array(
        'category' => 'commercial',
        'badge'    => 'Commercial Case Study',
        'image'    => rx_asset_url( 'images/home/craced-walls.webp' ),
        'title'    => 'Ground Subsidence Explained and the Most Effective Way to Repair It',
    ),
    array(
        'category' => 'residential',
        'badge'    => 'Residential Case Study',
        'image'    => rx_asset_url( 'images/home/horizontal-crack.webp' ),
        'title'    => 'Jammed Door Repairs to Restore Functionality in Homes & Buildings',
    ),
    array(
        'category' => 'infrastructure',
        'badge'    => 'Infrastructure Case Study',
        'image'    => rx_asset_url( 'images/home/resources-image.webp' ),
        'title'    => 'Road Infrastructure Maintenance Strategies for Preventing Ground Failure and Structural Deterioration',
    ),
    array(
        'category' => 'commercial',
        'badge'    => 'Commercial Case Study',
        'image'    => rx_asset_url( 'images/home/jamming-doors.webp' ),
        'title'    => 'Cracks in Brick Walls: Causes, Warning Signs, and Effective Repair Methods',
    ),
    );

    foreach ( $case_studies as $index => $study ) {
        $case_studies[ $index ]['url'] = $case_study_single_url;
    }
}

$help_cards = array(
    array(
        'icon'  => 'Rectify Icon Set_Call Expert.svg',
        'title' => 'Call Us',
        'copy'  => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
        'type'  => 'phone',
        'phone' => '1800 18 20 20',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Request Assessment 1.svg',
        'title' => 'Estimate Project Cost',
        'copy'  => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
        'type'  => 'link',
        'label' => 'Get My Cost Estimate',
        'url'   => home_url( '/assessment/' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Explore Resources 1.svg',
        'title' => 'Explore Resources',
        'copy'  => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
        'type'  => 'link',
        'label' => 'Explore Resources',
        'url'   => home_url( '/resources/' ),
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-case-study-page' ); ?>>

    <section class="rx-case-study-hero">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'Case Studies', 'rectify-custom' ); ?></span>
            <h1><?php esc_html_e( 'Real Projects. Real Results.', 'rectify-custom' ); ?></h1>
            <p><?php esc_html_e( 'See how Rectify has helped homeowners, asset managers and infrastructure operators overcome structural challenges across Australia.', 'rectify-custom' ); ?></p>

            <div class="rx-case-study-filters" role="tablist" aria-label="<?php esc_attr_e( 'Filter case studies', 'rectify-custom' ); ?>">
                <?php foreach ( $filters as $index => $filter ) : ?>
                    <button
                        type="button"
                        class="rx-case-study-filter<?php echo 0 === $index ? ' is-active' : ''; ?>"
                        data-filter="<?php echo esc_attr( $filter['key'] ); ?>"
                        role="tab"
                        aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
                    ><?php echo esc_html( strtoupper( $filter['label'] ) ); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-case-study-band">
        <div class="rx-wrap">
            <div class="rx-case-study-grid">
                <?php foreach ( $case_studies as $study ) : ?>
                    <a class="rx-case-study-card" href="<?php echo esc_url( $study['url'] ); ?>" data-category="<?php echo esc_attr( $study['category'] ); ?>">
                        <figure>
                            <img src="<?php echo esc_url( $study['image'] ); ?>" alt="">
                            <span class="rx-case-study-badge"><?php echo esc_html( strtoupper( $study['badge'] ) ); ?></span>
                        </figure>
                        <h3><?php echo esc_html( $study['title'] ); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="rx-case-study-load-more">
                <button type="button" class="rx-case-study-load-btn">
                    <?php esc_html_e( 'Load More Case Studies', 'rectify-custom' ); ?>
                    <span aria-hidden="true">&#8594;</span>
                </button>
            </div>
        </div>
    </section>

    <section class="rx-case-study-cta" style="<?php echo esc_attr( '--rx-case-study-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

            <div class="rx-case-study-help-grid">
                <?php foreach ( $help_cards as $card ) : ?>
                    <article class="rx-case-study-help-card">
                        <span class="rx-case-study-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                        <?php if ( 'phone' === $card['type'] ) : ?>
                           <a class="rx-case-single-help-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g clip-path="url(#clip0_1042_11539)">
                                    <path d="M22.6795 1.32019C21.7996 0.440119 20.7395 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33334 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.1876 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18231 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1042_11539">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                                </svg>
                             <?php echo esc_html( $card['phone'] ); ?>
                            </a>
                        <?php else : ?>
                            <a class="rx-case-study-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</article>
