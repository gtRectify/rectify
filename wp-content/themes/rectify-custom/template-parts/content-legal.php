<?php
/**
 * Legal hub page content template.
 *
 * Rendered via page.php's slug-based template_part lookup for the
 * top-level "legal" page. Shares the rx-faq-page / rx-faq-hero / rx-faq-cta
 * components used by content-our-policy.php and similar plural-CSS pages.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$legal_blocks = array(
    array(
        'heading' => 'Privacy',
        'body'    => 'Learn how Rectify collects, stores, uses and protects personal information in accordance with the Privacy Act 1988 (Cth) and the Australian Privacy Principles.',
        'links'   => array(
            array( 'label' => 'Privacy Policy', 'url' => home_url( '/our-policy/' ) ),
            array( 'label' => 'Privacy Complaint Process', 'url' => home_url( '/privacy-complaint-process/' ) ),
        ),
    ),
    array(
        'heading' => 'Website Terms',
        'body'    => 'The terms governing your use of the Rectify website, including acceptable use, intellectual property, disclaimers and limitations of liability.',
        'links'   => array(
            array( 'label' => 'Website Terms of Use', 'url' => home_url( '/website-terms-of-use/' ) ),
        ),
    ),
);

$legal_entities = array(
    'Rectify Group Pty Limited - 96 631 432 883',
    'Rectify Group Construction License - CDB-U 72327',
    'Rectify Group Construction License - CCB-L 100073',
);

$legal_blocks_2 = array(
    array(
        'heading' => 'Modern Slavery',
        'body'    => 'Rectify is committed to ethical business practices, responsible procurement and protecting human rights throughout our operations and supply chain.',
        'links'   => array(
            array( 'label' => 'Modern Slavery Statement', 'url' => home_url( '/modern-slavery-statement/' ) ),
        ),
    ),
    array(
        'heading' => 'Environmental, Social & Governance (ESG)',
        'body'    => 'Learn about Rectify\'s commitment to sustainable construction practices, environmental responsibility, workplace safety and governance.',
        'links'   => array(
            array( 'label' => 'Environmental & Sustainability Statement', 'url' => home_url( '/sustainability/' ) ),
        ),
    ),
    array(
        'heading' => 'Certifications & Compliance',
        'body'    => 'View our certifications, licences, accreditations and compliance commitments that support the quality, safety and performance of our work.',
        'links'   => array(
            array( 'label' => 'Environmental & Sustainability Statement', 'url' => home_url( '/about-us/certifications-compliance/' ) ),
        ),
    ),
    array(
        'heading' => 'Contractor & Supplier Information',
        'body'    => 'Important information for subcontractors, suppliers and project partners working with Rectify.',
        'links'   => array(
            array( 'label' => 'Third-Party Contractor Protocol', 'url' => home_url( '/third-party-contractor-protocol/' ) ),
        ),
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-faq-page rx-legal-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'legal-hero',
                'render' => function () {
                    ?>
                    <section class="rx-faq-hero rx-legal-hero">
                        <div class="rx-wrap">
                            <h1><?php esc_html_e( 'Legal', 'rectify-custom' ); ?></h1>

                            <nav class="rx-faq-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Legal', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'legal-intro',
                'render' => function () {
                    ?>
                    <section class="rx-legal-intro">
                        <div class="rx-wrap">
                            <p><?php esc_html_e( 'A central location for Rectify Group\'s legal documents, policies and corporate disclosures.', 'rectify-custom' ); ?></p>
                            <p><?php esc_html_e( 'Our legal documents outline how we operate, protect personal information, manage our relationships with customers, suppliers and partners, and comply with Australian laws and industry standards.', 'rectify-custom' ); ?></p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'legal-content',
                'render' => function () use ( $legal_blocks, $legal_entities, $legal_blocks_2 ) {
                    ?>
                    <section class="rx-legal-body">
                        <div class="rx-wrap">
                            <ul class="rx-legal-block-list">
                                <?php foreach ( $legal_blocks as $block ) : ?>
                                    <li>
                                        <div class="rx-legal-block-head">
                                            <h2><?php echo esc_html( $block['heading'] ); ?></h2>
                                            <p><?php echo esc_html( $block['body'] ); ?></p>
                                        </div>
                                        <div class="rx-legal-block-links">
                                            <?php foreach ( $block['links'] as $link ) : ?>
                                                <a class="rx-legal-block-link" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?> <span aria-hidden="true">&#8594;</span></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                                <li>
                                    <div class="rx-legal-block-head">
                                        <h2><?php esc_html_e( 'Legal Entities', 'rectify-custom' ); ?></h2>
                                        <p><?php esc_html_e( 'Information relating to Rectify Group\'s registered legal entities and business details.', 'rectify-custom' ); ?></p>
                                    </div>
                                    <div class="rx-legal-entity-list">
                                        <?php foreach ( $legal_entities as $entity ) : ?>
                                            <p><?php echo esc_html( $entity ); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </li>

                                <?php foreach ( $legal_blocks_2 as $block ) : ?>
                                    <li>
                                        <div class="rx-legal-block-head">
                                            <h2><?php echo esc_html( $block['heading'] ); ?></h2>
                                            <p><?php echo esc_html( $block['body'] ); ?></p>
                                        </div>
                                        <div class="rx-legal-block-links">
                                            <?php foreach ( $block['links'] as $link ) : ?>
                                                <a class="rx-legal-block-link" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?> <span aria-hidden="true">&#8594;</span></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                                <li>
                                    <div class="rx-legal-office">
                                        <h2><?php esc_html_e( 'Contact Us', 'rectify-custom' ); ?></h2>
                                        <p><?php esc_html_e( 'If you have questions regarding any legal document or policy, please contact us.', 'rectify-custom' ); ?></p>
                                        <h3><?php esc_html_e( 'Rectify Group Head Office', 'rectify-custom' ); ?></h3>
                                        <dl class="rx-legal-office-details">
                                            <div>
                                                <dt><?php esc_html_e( 'Telephone:', 'rectify-custom' ); ?></dt>
                                                <dt><?php esc_html_e( 'Address:', 'rectify-custom' ); ?></dt>
                                                <dt><?php esc_html_e( 'Email:', 'rectify-custom' ); ?></dt>
                                                <dt><?php esc_html_e( 'Website:', 'rectify-custom' ); ?></dt>
                                            </div>
                                            <div>
                                                <dd><a href="tel:1800182020" style="color:inherit;text-decoration:none;">1800 18 20 20</a></dd>
                                                <dd>28 Trade Park Drive, Tullamarine VIC 3043</dd>
                                                <dd><a href="mailto:admin@rectify.com.au" style="color:inherit;text-decoration:none;">admin@rectify.com.au</a></dd>
                                                <dd><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:inherit;text-decoration:none;">www.rectify.com.au</a></dd>
                                            </div>
                                        </dl>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'legal-help',
                'render' => function () {
                    ?>
                    <section class="rx-faq-cta" style="<?php echo esc_attr( '--rx-faq-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

                            <div class="rx-faq-help-grid">
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Call Expert.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-phone" href="tel:1800182020">
                                        <span aria-hidden="true">&#9742;</span> <?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?>
                                    </a>
                                </article>
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Request Assessment_red.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>"><?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
                                </article>
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Explore Resources.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
                                </article>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
        ) );
    endif;
    ?>

</article>
