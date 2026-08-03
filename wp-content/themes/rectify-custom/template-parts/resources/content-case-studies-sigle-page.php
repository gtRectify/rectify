<?php
/**
 * Case Study Single Page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id = get_the_ID();

$rx_get_field = function ( $name, $fallback = '' ) use ( $post_id ) {
    $value = function_exists( 'get_field' )
        ? get_field( $name, $post_id )
        : get_post_meta( $post_id, $name, true );

    if (
        ( null === $value || false === $value || '' === $value )
        && function_exists( 'acf_maybe_get_field' )
        && function_exists( 'acf_get_value' )
    ) {
        $field = acf_maybe_get_field( $name, $post_id, false );

        if ( $field ) {
            $value = acf_get_value( $post_id, $field );
        }
    }

    return ( null === $value || false === $value || '' === $value ) ? $fallback : $value;
};

$rx_image_url = function ( $image, $size = 'large', $fallback = '' ) {
    if ( is_array( $image ) ) {
        if ( ! empty( $image['sizes'][ $size ] ) ) {
            return $image['sizes'][ $size ];
        }

        if ( ! empty( $image['url'] ) ) {
            return $image['url'];
        }
    }

    if ( is_numeric( $image ) ) {
        $url = wp_get_attachment_image_url( (int) $image, $size );
        return $url ? $url : $fallback;
    }

    if ( is_string( $image ) && '' !== $image ) {
        return $image;
    }

    return $fallback;
};

$rx_link = function ( $link, $fallback_url = '#', $fallback_label = '' ) {
    if ( is_array( $link ) ) {
        return array(
            'url'   => ! empty( $link['url'] ) ? $link['url'] : $fallback_url,
            'title' => ! empty( $link['title'] ) ? $link['title'] : $fallback_label,
        );
    }

    return array(
        'url'   => is_string( $link ) && '' !== $link ? $link : $fallback_url,
        'title' => $fallback_label,
    );
};

$rx_card_icon = function ( $icon, $fallback_file = '' ) use ( $rx_image_url ) {
    if ( is_string( $icon ) && '' !== $icon && false === strpos( $icon, '://' ) && 0 !== strpos( $icon, '/' ) && 0 !== strpos( $icon, 'data:' ) ) {
        $red_icon = rx_asset_url( 'icons-red/' . $icon );
        return $red_icon ? $red_icon : rx_asset_url( 'icons/' . $icon );
    }

    $fallback = $fallback_file ? rx_asset_url( 'icons-red/' . $fallback_file ) : '';
    return $rx_image_url( $icon, 'thumbnail', $fallback );
};

// The single case study template currently doubles for every card until
// each case study gets its own dedicated page, so related/CTA links all
// resolve back to this same page.
$case_single_permalink = get_permalink( $post_id );

// Hero / breadcrumb
$kicker      = $rx_get_field( 'case_kicker', function_exists( 'rectify_custom_article_kicker_label' ) ? rectify_custom_article_kicker_label( $post_id ) : 'Case Study' );
$hero_title  = $rx_get_field( 'case_title', get_the_title() );
$hero_image  = $rx_image_url( $rx_get_field( 'case_hero_image' ), 'full', get_the_post_thumbnail_url( $post_id, 'full' ) ?: rx_asset_url( 'images/home/sloping-slab.webp' ) );
$intro_copy  = $rx_get_field( 'case_intro_copy', 'Sinkholes are one of the most dramatic and dangerous forms of ground failure. While they are often associated with sudden collapse, in many cases there are early warning signs — if recognised and addressed — can prevent major damage and safety risks. By understanding how sinkholes form, the indicators of instability, and the modern solutions available, property owners and asset managers can act before a small problem becomes a costly emergency.' );

// The real content editors write in wp-admin (the block editor "editor"
// field) — this is what should actually show on the front end when present.
$article_raw_content = get_post_field( 'post_content', $post_id );
$article_has_content  = '' !== trim( wp_strip_all_tags( $article_raw_content ) );

// Breadcrumb: link/label to the post's actual top-level Article Category
// ("Case Studies" or "News & Insights"), matching its permalink structure.
$article_top_term       = function_exists( 'rectify_custom_get_article_top_term' )
    ? rectify_custom_get_article_top_term( $post_id )
    : null;
$article_category_slug  = function_exists( 'rectify_custom_article_category_url_segment' )
    ? rectify_custom_article_category_url_segment( $article_top_term )
    : 'case-studies';
$article_category_url   = home_url( '/resources/' . $article_category_slug . '/' );
$article_category_label = $article_top_term instanceof WP_Term ? $article_top_term->name : $kicker;

// Mechanisms of failure
$mechanisms_title = $rx_get_field( 'case_mechanisms_title', 'Mechanisms of Failure: How Sinkholes Form' );
$mechanisms_intro  = $rx_get_field( 'case_mechanisms_intro', 'Sinkholes occur when the ground beneath a structure or surface loses support, leaving a void that eventually collapses. Several contributing factors are common:' );

$default_mechanisms = array(
    array(
        'title' => 'Poor Consolidation of Fill',
        'copy'  => 'Where engineered fill has not been adequately compacted, long-term settlement can lead to voids and instability beneath slabs, pavements, or building foundations.',
    ),
    array(
        'title' => 'Large Water Leaks',
        'copy'  => 'Burst water mains, leaking sewers, or poor drainage can wash away fine soils, gradually leaving the ground unsupported until the ground collapses.',
    ),
    array(
        'title' => 'Old Mining Areas',
        'copy'  => 'Abandoned mine shafts and tunnels are a frequent cause of subsidence. When left unfilled, they create hidden voids that can collapse decades later, triggering large sinkholes at the surface.',
    ),
    array(
        'title' => 'Geological Factors',
        'copy'  => 'In some regions, natural processes such as the dissolution of limestone or reactive clays can cause the ground to shift and later fail.',
    ),
);

$mechanisms = $rx_get_field( 'case_mechanisms_list', $default_mechanisms );

// Early warning signs
$signs_title = $rx_get_field( 'case_signs_title', 'Early Warning Signs of Sinkhole Activity' );
$signs_intro = $rx_get_field( 'case_signs_intro', 'While some sinkholes appear suddenly, many provide visible warning signs:' );

$default_signs = array(
    array( 'text' => 'Cracks forming in concrete slabs, pavements, or foundations.' ),
    array( 'text' => 'Depressions or soft spots developing in lawns, car parks, or roads.' ),
    array( 'text' => 'Tilting of fences, retaining walls, or utility poles.' ),
    array( 'text' => 'Doors and windows sticking due to uneven building settlement.' ),
    array( 'text' => 'Localised ponding of water in previously level areas.' ),
    array( 'text' => 'A hollow or "drumming" sound when slabs are tapped, indicating voiding beneath.' ),
);

$signs       = $rx_get_field( 'case_signs_list', $default_signs );
$signs_outro = $rx_get_field( 'case_signs_outro', 'Recognising these symptoms early is critical — they signal the ground is losing support and that intervention is required before a full collapse.' );

// How to fix
$fix_title = $rx_get_field( 'case_fix_title', 'How to Fix Sinkholes' );
$fix_intro = $rx_get_field( 'case_fix_intro', 'The right remediation method depends on the scale and cause of the voiding.' );

$default_fix_methods = array(
    array(
        'title'        => 'Resin Injection',
        'best_for'     => 'Small to medium sinkholes or voids beneath slabs, pavements, and foundations.',
        'how_it_works' => 'High-strength expanding resins are injected into the ground through small-diameter holes. The resin fills cavities, compacts surrounding soils, and re-supports the overlying structure.',
        'benefits'     => array(
            'Fast curing — often trafficable within hours.',
            'Non-invasive — no need for bulk excavation.',
            'Precise — can stabilise with millimetre-level control.',
        ),
    ),
    array(
        'title'        => 'Cellular Concrete (Flowable Fill)',
        'best_for'     => 'Large voids, abandoned mine shafts, and extensive washout zones.',
        'how_it_works' => 'Pumpable cellular concrete flows into large cavities, filling irregular spaces and providing lightweight, durable support.',
        'benefits'     => array(
            'Effective for bulk stabilisation.',
            'Lightweight material avoids overloading weak soils.',
            'Cost-effective compared to excavation and rebuild.',
        ),
    ),
);

$fix_methods = $rx_get_field( 'case_fix_methods', $default_fix_methods );

// Why proactive repair matters
$proactive_title = $rx_get_field( 'case_proactive_title', 'Why Proactive Repair Matters' );
$proactive_intro = $rx_get_field( 'case_proactive_intro', 'Waiting until a sinkhole has collapsed dramatically increases repair complexity and cost. Emergency interventions often require:' );

$default_proactive_list = array(
    array( 'text' => 'Full slab or pavement replacement.' ),
    array( 'text' => 'Extensive excavation and reinstatement.' ),
    array( 'text' => 'Closures of roads, facilities, or utilities.' ),
    array( 'text' => 'Higher safety risks during remediation.' ),
);

$proactive_list  = $rx_get_field( 'case_proactive_list', $default_proactive_list );
$proactive_outro = $rx_get_field( 'case_proactive_outro', 'By acting early, voids can be stabilised quickly with resin injection or cellular concrete, preventing collapse and preserving infrastructure with minimal disruption.' );

// Preventative measures
$preventative_title = $rx_get_field( 'case_preventative_title', 'Preventative Measures' );

$default_preventative_list = array(
    array( 'text' => 'Regular inspection of slabs, pavements, and landscaped areas for signs of voiding.' ),
    array( 'text' => 'Maintenance of plumbing and drainage systems to avoid leaks and erosion.' ),
    array( 'text' => 'Proactive investigation in areas with known mining history or reactive soils.' ),
    array( 'text' => 'Incorporating ground remediation into asset management programs rather than waiting for failures.' ),
);

$preventative_list = $rx_get_field( 'case_preventative_list', $default_preventative_list );

// Rectify specialists
$specialists_title = $rx_get_field( 'case_specialists_title', 'Rectify: Specialists in Sinkhole Remediation' );
$specialists_intro  = $rx_get_field( 'case_specialists_intro', 'Rectify provides tailored solutions for sinkhole remediation, from residential properties to major infrastructure. With expertise in both resin injection and cellular concrete filling, Rectify delivers:' );

$default_specialists_list = array(
    array( 'text' => 'Rapid, non-invasive stabilisation of small to medium voids.' ),
    array( 'text' => 'Large-scale remediation of mine-related and erosion-induced sinkholes.' ),
    array( 'text' => 'Documented outcomes with level surveys and treatment records.' ),
    array( 'text' => 'Customer-focused delivery with minimal disruption to property owners and the public.' ),
);

$specialists_list = $rx_get_field( 'case_specialists_list', $default_specialists_list );

// Conclusion
$conclusion_title = $rx_get_field( 'case_conclusion_title', 'Conclusion' );
$conclusion_para_1 = $rx_get_field( 'case_conclusion_copy_1', 'Sinkholes represent a serious risk, but they rarely occur without warning. Cracks, depressions, and water pooling are all signals that the ground is losing support. Modern engineered solutions such as resin injection and cellular concrete filling allow voids to be stabilised safely and cost-effectively — before a collapse causes major damage.' );
$conclusion_para_2 = $rx_get_field( 'case_conclusion_copy_2', 'With proven expertise across a wide range of ground remediation projects, Rectify Group is the trusted partner to detect, stabilise, and repair sinkholes, safeguarding property and infrastructure for the long term.' );

// Author
$author_name  = $rx_get_field( 'case_author_name', 'Amelia Martin' );
$author_bio   = $rx_get_field( 'case_author_bio', "Amelia Martin's expertise in structural engineering is matched only by her eloquence in writing about it. With numerous successful projects under her belt, she's a respected voice in the industry. When not advocating for building longevity, Amelia enjoys hosting backyard barbecues, playing the didgeridoo, and mastering the art of Australian Rules Football." );
$author_image = $rx_image_url( $rx_get_field( 'case_author_image' ), 'thumbnail', rx_asset_url( 'images/rectify.png' ) );
$author_link  = $rx_link( $rx_get_field( 'case_author_link' ), home_url( '/resources/' ), "View Author's Other Posts" );

// Related case studies (sidebar)
$related_title = $rx_get_field( 'case_related_title', 'Related Case Study' );

$default_related = array(
    array(
        'title' => $hero_title,
        'image' => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
    ),
    array(
        'title' => $hero_title,
        'image' => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
    ),
    array(
        'title' => $hero_title,
        'image' => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
    ),
);

$related_case_studies = $rx_get_field( 'case_related_list', $default_related );

// Bottom CTA band (shared copy with the case studies listing page)
$cta_title = $rx_get_field( 'case_cta_title', 'Need Help Choosing the Right Solution?' );
$cta_copy  = $rx_get_field( 'case_cta_copy', "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence." );

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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-case-single-page rx-subpage rx-residential-figma' ); ?>>

    <section class="rx-case-single-hero">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php echo esc_html( strtoupper( $kicker ) ); ?></span>
            <h1><?php echo esc_html( $hero_title ); ?></h1>
            <nav class="rx-case-single-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( $article_category_url ); ?>"><?php echo esc_html( $article_category_label ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html( $hero_title ); ?></span>
            </nav>
        </div>
    </section>

    <section class="rx-case-single-body">
        <div class="rx-wrap rx-case-single-layout">

            <div class="rx-case-single-main">

                <?php if ( $hero_image ) : ?>
                    <figure class="rx-case-single-hero-image rx-reveal">
                        <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>">
                    </figure>
                <?php endif; ?>

                <?php if ( $article_has_content ) : ?>

                    <div class="rx-case-single-richtext rx-case-single-article-content rx-reveal">
                        <?php echo apply_filters( 'the_content', $article_raw_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>

                <?php else : ?>

                <div class="rx-case-single-richtext rx-reveal">
                    <p><?php echo esc_html( $intro_copy ); ?></p>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $mechanisms_title ); ?></h2>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $mechanisms_intro ); ?></p>
                    </div>
                    <?php if ( ! empty( $mechanisms ) && is_array( $mechanisms ) ) : ?>
                        <div class="rx-case-single-mechanism-list">
                            <?php foreach ( $mechanisms as $mechanism ) : ?>
                                <?php
                                $mechanism_title = isset( $mechanism['title'] ) ? $mechanism['title'] : '';
                                $mechanism_copy  = isset( $mechanism['copy'] ) ? $mechanism['copy'] : '';
                                ?>
                                <div class="rx-case-single-mechanism-item">
                                    <h4><?php echo esc_html( $mechanism_title ); ?></h4>
                                    <p><?php echo esc_html( $mechanism_copy ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $signs_title ); ?></h2>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $signs_intro ); ?></p>
                    </div>
                    <?php if ( ! empty( $signs ) && is_array( $signs ) ) : ?>
                        <ul class="rx-case-single-checklist">
                            <?php foreach ( $signs as $sign ) : ?>
                                <?php $sign_text = isset( $sign['text'] ) ? $sign['text'] : ''; ?>
                                <li><?php echo esc_html( $sign_text ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $signs_outro ); ?></p>
                    </div>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $fix_title ); ?></h2>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $fix_intro ); ?></p>
                    </div>

                    <?php if ( ! empty( $fix_methods ) && is_array( $fix_methods ) ) : ?>
                        <?php foreach ( $fix_methods as $method ) : ?>
                            <?php
                            $method_title = isset( $method['title'] ) ? $method['title'] : '';
                            $method_best  = isset( $method['best_for'] ) ? $method['best_for'] : '';
                            $method_how   = isset( $method['how_it_works'] ) ? $method['how_it_works'] : '';
                            $method_benefits = isset( $method['benefits'] ) && is_array( $method['benefits'] ) ? $method['benefits'] : array();
                            ?>
                            <div class="rx-case-single-method">
                                <h3><?php echo esc_html( $method_title ); ?></h3>
                                <?php if ( $method_best ) : ?>
                                    <div class="rx-case-single-method-row">
                                        <span class="rx-case-single-method-label"><?php esc_html_e( 'Best for', 'rectify-custom' ); ?></span>
                                        <p><?php echo esc_html( $method_best ); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $method_how ) : ?>
                                    <div class="rx-case-single-method-row">
                                        <span class="rx-case-single-method-label"><?php esc_html_e( 'How It Works', 'rectify-custom' ); ?></span>
                                        <p><?php echo esc_html( $method_how ); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if ( ! empty( $method_benefits ) ) : ?>
                                    <div class="rx-case-single-method-row">
                                        <span class="rx-case-single-method-label"><?php esc_html_e( 'Benefits', 'rectify-custom' ); ?></span>
                                        <ul class="rx-case-single-checklist">
                                            <?php foreach ( $method_benefits as $benefit ) : ?>
                                                <?php $benefit_text = is_array( $benefit ) && isset( $benefit['text'] ) ? $benefit['text'] : $benefit; ?>
                                                <li><?php echo esc_html( $benefit_text ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $proactive_title ); ?></h2>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $proactive_intro ); ?></p>
                    </div>
                    <?php if ( ! empty( $proactive_list ) && is_array( $proactive_list ) ) : ?>
                        <ul class="rx-case-single-checklist">
                            <?php foreach ( $proactive_list as $item ) : ?>
                                <?php $item_text = isset( $item['text'] ) ? $item['text'] : ''; ?>
                                <li><?php echo esc_html( $item_text ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $proactive_outro ); ?></p>
                    </div>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $preventative_title ); ?></h2>
                    <?php if ( ! empty( $preventative_list ) && is_array( $preventative_list ) ) : ?>
                        <ul class="rx-case-single-checklist">
                            <?php foreach ( $preventative_list as $item ) : ?>
                                <?php $item_text = isset( $item['text'] ) ? $item['text'] : ''; ?>
                                <li><?php echo esc_html( $item_text ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="rx-case-single-section rx-reveal">
                    <h2><?php echo esc_html( $specialists_title ); ?></h2>
                    <div class="rx-case-single-richtext">
                        <p><?php echo esc_html( $specialists_intro ); ?></p>
                    </div>
                    <?php if ( ! empty( $specialists_list ) && is_array( $specialists_list ) ) : ?>
                        <ul class="rx-case-single-checklist">
                            <?php foreach ( $specialists_list as $item ) : ?>
                                <?php $item_text = isset( $item['text'] ) ? $item['text'] : ''; ?>
                                <li><?php echo esc_html( $item_text ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="rx-case-single-conclusion rx-reveal">
                    <h3><?php echo esc_html( $conclusion_title ); ?></h3>
                    <p><?php echo esc_html( $conclusion_para_1 ); ?></p>
                    <p><?php echo esc_html( $conclusion_para_2 ); ?></p>
                </div>

                <?php endif; ?>

                <div class="rx-case-single-author rx-reveal">
                    <?php if ( $author_image ) : ?>
                        <figure>
                            <img src="<?php echo esc_url( $author_image ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
                        </figure>
                    <?php endif; ?>
                    <div class="rx-case-single-author-body">
                        <h4><?php echo esc_html( $author_name ); ?></h4>
                        <p><?php echo esc_html( $author_bio ); ?></p>
                        <a class="rx-case-single-author-link" href="<?php echo esc_url( $author_link['url'] ); ?>">
                            <?php echo esc_html( strtoupper( $author_link['title'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                        </a>
                    </div>
                </div>

            </div>

            <aside class="rx-case-single-sidebar">
                <span class="rx-kicker"><?php echo esc_html( strtoupper( $related_title ) ); ?></span>
                <?php if ( ! empty( $related_case_studies ) && is_array( $related_case_studies ) ) : ?>
                    <div class="rx-case-single-related-list">
                        <?php foreach ( $related_case_studies as $related ) : ?>
                            <?php
                            $related_title_text = isset( $related['title'] ) ? $related['title'] : '';
                            $related_image      = isset( $related['image'] ) ? $rx_image_url( $related['image'], 'large' ) : '';
                            ?>
                            <a class="rx-case-single-related-card" href="<?php echo esc_url( $case_single_permalink ); ?>">
                                <?php if ( $related_image ) : ?>
                                    <figure>
                                        <img src="<?php echo esc_url( $related_image ); ?>" alt="">
                                    </figure>
                                <?php endif; ?>
                                <h4><?php echo esc_html( $related_title_text ); ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </aside>

        </div>
    </section>

    <section class="rx-case-single-cta" style="<?php echo esc_attr( '--rx-case-single-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html( $cta_title ); ?></h2>
            <p><?php echo esc_html( $cta_copy ); ?></p>

            <div class="rx-case-single-help-grid">
                <?php foreach ( $help_cards as $card ) : ?>
                    <article class="rx-case-single-help-card">
                        <span class="rx-case-single-card-icon"><img src="<?php echo esc_url( $rx_card_icon( $card['icon'] ) ); ?>" alt=""></span>
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
                            <a class="rx-case-single-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</article>
