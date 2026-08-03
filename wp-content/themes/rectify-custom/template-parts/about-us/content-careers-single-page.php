<?php
/**
 * Careers single job page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$is_job_opportunity = 'job_opportunity' === get_post_type();

/**
 * Flatten an ACF repeater of { point } rows into a plain list of strings.
 *
 * @param array $rows Repeater rows.
 * @return string[]
 */
$rx_job_points = function ( $rows ) {
    $points = array();

    if ( is_array( $rows ) ) {
        foreach ( $rows as $row ) {
            if ( ! empty( $row['point'] ) ) {
                $points[] = $row['point'];
            }
        }
    }

    return $points;
};

$job_title           = $is_job_opportunity ? get_the_title() : 'Area Manager - Vic & SA';
$job_about_html      = $is_job_opportunity && function_exists( 'get_field' ) ? get_field( 'job_about_the_opportunity' ) : '';
$job_apply_label     = $is_job_opportunity && function_exists( 'get_field' ) ? get_field( 'job_apply_button_label' ) : '';
$job_apply_url       = $is_job_opportunity && function_exists( 'get_field' ) ? get_field( 'job_apply_url' ) : '';
$job_apply_label     = $job_apply_label ? $job_apply_label : 'Apply in LinkedIn';
$job_apply_url       = $job_apply_url ? $job_apply_url : '#';

$why_this_role = array(
    'Inbound-led, not cold-call-led — you spend your time qualifying and converting genuine prospects, not chasing names off a list.',
    'Dedicated VIC & SA territories you can build into your own business unit.',
    'A technical sell that matters — you\'re solving real structural problems for people who are often stressed about their biggest asset.',
    'Direct line to senior leadership, with the support to test ideas, refine the proposition, and grow the territory.',
    'Genuine career path — from Area Manager into broader Business Development, Account Management or Sales Leadership as we continue to grow.',
);

$key_responsibilities = array(
    'Visit properties exhibiting structural distress and engage face-to-face with homeowners, real estate agents, strata managers, builders and commercial clients.',
    'Listen, diagnose and clearly explain Rectify\'s residential and commercial solutions — the technologies, the value-add benefits, and the longevity those solutions add to the structure.',
    'Build and manage a healthy pipeline of opportunities across your territory, working inbound leads through to booked jobs.',
    'Develop and execute sales strategies that grow revenue, profitability and contribution margin in your area.',
    'Prepare and present to clients, including at industry events, real estate / strata forums and on-site presentations.',
    'Partner with our on-site delivery teams — gather their input on complex jobs before quoting, support them during delivery, and protect the quality of every job you book.',
    'Champion the customer through every stage — from first call, through to quote, sign-off, delivery and after-care — including timely follow-up and survey / review capture.',
    'Contribute to the broader sales team — share what\'s working, support your peers, and help lift quote conversion rates and tender quality across the group.',
    'Keep your eyes on the market — track competitor activity, new inspection tools and technologies, and emerging industry needs, and feed insights back to leadership.',
    'Maintain accurate records of activity, leads and pipeline in our CRM.',
);

$about_you = array(
    'Demonstrated B2B sales experience, ideally with exposure to building, construction, property services, structural repair, building products or related industries — but we\'ll back the right person from an adjacent field.',
    'Commercial acumen — you understand pricing, margin, and how the deal you write today affects profitability tomorrow.',
    'Confident customer-facing communicator — equally comfortable across a kitchen table with a worried homeowner, in a real-estate office, or presenting at an industry event.',
    'Strong listening, negotiation and conflict-resolution skills — you can read the room, hold the line, and bring people to a win-win outcome.',
    'Problem-solver who can pick up technical concepts quickly and translate them into language a non-technical client understands.',
    'Self-directed and accountable — you can own a territory, plan your week, and deliver to targets without being managed move-by-move.',
    'Calm under pressure, resilient, and team-oriented — the on-site team is your delivery partner, and you treat them that way.',
    'Excellent time management and the discipline to keep CRM data clean; Hubspot experience is a plus, but not essential.',
    'Valid Australian driver\'s license and the right to work in Australia.',
);

$whats_on_offer = array(
    'Competitive base salary plus superannuation.',
    'Fully expensed company vehicle, or generous vehicle allowance (including fuel and tolls) — your choice.',
    'Uncapped commission structure that rewards you for what you book — with accelerators for jobs you bring in on your own merit, and additional bonuses for hitting team and KPI milestones.',
    'Inbound lead flow that lets you focus on conversion, not prospecting from scratch.',
    'Ongoing training and development in our technologies, solutions and sales process — we want you to be the most credible voice in the room when you walk into a job.',
    'A clear, measurable performance framework (financial, individual, client, company and job-related KPIs) so you always know how you\'re tracking and how performance translates into reward.',
    'Modern Tullamarine head office, supportive senior leadership, and a culture built on excellence, empowerment, commitment and integrity.',
    'Genuine career progression as we continue to grow across SE Australia — and beyond.',
);

if ( $is_job_opportunity && function_exists( 'get_field' ) ) {
    $job_why_this_role         = $rx_job_points( get_field( 'job_why_this_role' ) );
    $job_key_responsibilities  = $rx_job_points( get_field( 'job_key_responsibilities' ) );
    $job_about_you             = $rx_job_points( get_field( 'job_about_you' ) );
    $job_whats_on_offer        = $rx_job_points( get_field( 'job_whats_on_offer' ) );

    if ( $job_why_this_role ) {
        $why_this_role = $job_why_this_role;
    }
    if ( $job_key_responsibilities ) {
        $key_responsibilities = $job_key_responsibilities;
    }
    if ( $job_about_you ) {
        $about_you = $job_about_you;
    }
    if ( $job_whats_on_offer ) {
        $whats_on_offer = $job_whats_on_offer;
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
        'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
        'title' => 'Estimate Project Cost',
        'copy'  => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
        'type'  => 'link',
        'label' => 'Get My Cost Estimate',
        'url'   => home_url( '/assessment/' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Explore Resources.svg',
        'title' => 'Explore Resources',
        'copy'  => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
        'type'  => 'link',
        'label' => 'Explore Resources',
        'url'   => home_url( '/resources/' ),
    ),
);

$careers_page = get_page_by_path( 'about-us/careers' );
if ( ! $careers_page instanceof WP_Post ) {
    $careers_page = get_page_by_path( 'careers' );
}
$careers_url = $careers_page instanceof WP_Post ? get_permalink( $careers_page ) : home_url( '/careers/' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-career-detail-page' ); ?>>

    <section class="rx-career-detail-hero">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'Careers', 'rectify-custom' ); ?></span>
            <h1><?php echo esc_html( $job_title ); ?></h1>
            <nav class="rx-career-detail-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php esc_html_e( 'About Us', 'rectify-custom' ); ?></span>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( $careers_url ); ?>"><?php esc_html_e( 'Careers', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html( $job_title ); ?></span>
            </nav>
        </div>
    </section>

    <section class="rx-career-detail-content">
        <div class="rx-wrap">
            <div class="rx-career-detail-copy">

                <h2><?php esc_html_e( 'About the opportunity', 'rectify-custom' ); ?></h2>
                <?php if ( $job_about_html ) : ?>
                    <?php echo $job_about_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted ACF WYSIWYG content authored by site admins. ?>
                <?php else : ?>
                    <p><?php esc_html_e( 'As an Area Manager at Rectify, you\'ll own a dedicated territory across Victoria or South Australia. Your job is to meet homeowners, real estate agents, strata managers and commercial clients face-to-face — at properties that are showing real, visible distress — listen to what they\'re worried about, and walk them through how our solutions and technologies can put their building back on stable ground.', 'rectify-custom' ); ?></p>
                    <p><?php esc_html_e( 'This is not a cold-calling role. Our pipeline is fuelled by strong inbound leads — homeowners and buyers/sellers who already know they have a foundation issue and are actively looking for a solution. Your job is to convert. Apply current sales strategies, build trust, and grow sales in your patch.', 'rectify-custom' ); ?></p>
                    <p><?php esc_html_e( 'You\'ll report to the Director / BDM, work alongside our wider sales team, and partner closely with our on-site delivery teams so that every job you book is one we can confidently deliver.', 'rectify-custom' ); ?></p>
                <?php endif; ?>

                <h2><?php esc_html_e( 'Why this role', 'rectify-custom' ); ?></h2>
                <ul class="rx-career-detail-list">
                    <?php foreach ( $why_this_role as $item ) : ?>
                        <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h2><?php esc_html_e( 'Key responsibilities', 'rectify-custom' ); ?></h2>
                <ul class="rx-career-detail-list">
                    <?php foreach ( $key_responsibilities as $item ) : ?>
                        <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h2><?php esc_html_e( 'About you', 'rectify-custom' ); ?></h2>
                <ul class="rx-career-detail-list">
                    <?php foreach ( $about_you as $item ) : ?>
                        <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h2><?php esc_html_e( 'What\'s on offer', 'rectify-custom' ); ?></h2>
                <ul class="rx-career-detail-list">
                    <?php foreach ( $whats_on_offer as $item ) : ?>
                        <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="rx-career-detail-apply">
                    <h3><?php esc_html_e( 'How to apply', 'rectify-custom' ); ?></h3>
                    <p><?php esc_html_e( 'If you\'ve read this and thought "that\'s the role I\'ve been looking for" — we\'d love to hear from you.', 'rectify-custom' ); ?></p>
                    <p>
                        <?php
                        printf(
                            /* translators: %s: bold "Apply on LinkedIn" text */
                            esc_html__( 'Click %s and attach your CV along with a short note (a paragraph is plenty) telling us about a deal or customer relationship you\'re particularly proud of, and what you\'d want to bring to a dedicated Rectify territory across Victoria and South Australia.', 'rectify-custom' ),
                            '<strong>' . esc_html__( 'Apply on LinkedIn', 'rectify-custom' ) . '</strong>'
                        );
                        ?>
                    </p>
                    <p><?php esc_html_e( 'Applications will be reviewed as they\'re received. We\'ll be in touch shortly after.', 'rectify-custom' ); ?></p>
                    <a class="rx-career-detail-apply-btn" href="<?php echo esc_url( $job_apply_url ); ?>">
                        <?php echo esc_html( $job_apply_label ); ?>
                        <span aria-hidden="true">&#8594;</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="rx-career-detail-cta" style="<?php echo esc_attr( '--rx-career-detail-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

            <div class="rx-career-detail-help-grid">
                <?php foreach ( $help_cards as $card ) : ?>
                    <article class="rx-career-detail-help-card">
                        <span class="rx-career-detail-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                        <?php if ( 'phone' === $card['type'] ) : ?>
                            <a class="rx-career-detail-help-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( $card['phone'] ); ?>
                            </a>
                        <?php else : ?>
                            <a class="rx-career-detail-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</article>
