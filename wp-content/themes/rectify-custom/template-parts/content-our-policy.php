<?php
/**
 * Privacy Policy page content template.
 *
 * Rendered via page.php's slug-based template_part lookup for the
 * top-level "our-policy" page. Mirrors the Rectify Page Builder plugin's
 * own `legal-hero` / `legal-sections` / `faq-cta` block renderers exactly
 * (see rectify-page-builder/includes/class-renderer.php) so the page looks
 * identical whether it's showing the builder-saved content or this
 * hardcoded fallback.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$policy_sections = array(
    array(
        'heading' => 'Introduction',
        'body'    => "Rectify Group (\u{201c}Rectify\u{201d}, \u{201c}we\u{201d}, \u{201c}our\u{201d}, or \u{201c}us\u{201d}) respects your privacy and is committed to protecting your personal information and commercially sensitive information.\n\nThis Privacy Policy explains how we collect, use, store, disclose, and protect personal information in accordance with the Privacy Act 1988 (Cth) and the Australian Privacy Principles (APPs).\n\nThis policy applies to website visitors, residential clients, commercial and infrastructure clients, suppliers, subcontractors, employees, job applicants, government stakeholders, and any individual interacting with Rectify Group.",
    ),
    array(
        'heading' => 'Who We Are',
        'body'    => "Rectify Group is an Australian registered domestic and commercial builder operating in structural stabilisation, chemical underpinning, ground engineering, asset remediation, and marine and industrial structural durability.\n\nWe operate nationally and may expand internationally in future markets.",
    ),
    array(
        'heading' => 'Information We Collect',
        'body'    => "We may collect personal identification information (name, phone, email, address, company, position), project and site information (property address, reports, photographs, geotechnical data), business information (ABN, insurance details), commercial information (quotes, pricing structures, methodologies, scope documentation), employment information (CVs, qualifications), and website technical data (IP address, cookies, analytics data).\n\nWe only collect information reasonably necessary for our business functions.",
    ),
    array(
        'heading' => 'How We Collect Information',
        'body'    => 'Information may be collected via website enquiry forms, email, phone calls, consultations, tender submissions, employment applications, contracts, site inspections, and cookies/analytics tools.',
    ),
    array(
        'heading' => 'Why We Collect Your Information',
        'body'    => "We collect and use information to assess enquiries, prepare quotes and proposals, provide structural stabilisation and remediation services, manage contracts and compliance obligations, conduct safety assessments, manage recruitment, improve services, and comply with legal requirements.\n\nRectify Group does not sell personal information.",
    ),
    array(
        'heading' => 'Disclosure of Personal Information & Third-Party Contractors',
        'body'    => "Information may be disclosed to engineers, subcontractors, insurers, legal advisors, government authorities, defence stakeholders, and IT service providers where necessary to deliver services or comply with legal obligations.\n\nAll third parties are required to maintain appropriate confidentiality and security standards.\n\nCommercial Confidentiality\n\nRectify\u{2019}s quotes, pricing structures, methodologies, and client communications may contain commercially sensitive information. We take reasonable steps to prevent unnecessary disclosure of such information to third parties.\n\nThird-Party Contractor Protocol\n\nWhere specialist contractors are required:\n\n<ul>\n<li>We do not automatically introduce third-party contractors into client communication threads.</li>\n<li>We do not share full pricing structures or internal methodologies unless contractually required.</li>\n<li>We do not disclose client contact details beyond what is reasonably necessary for project delivery.</li>\n</ul>\n\nWhere appropriate, Rectify may provide contractor details directly to the client, allowing the client to initiate contact at their discretion.\n\nThese measures are designed to protect commercially sensitive information, maintain control of client relationships, avoid confidentiality concerns, prevent unsolicited third-party contact, and support appropriate referral opportunities while preserving trust.",
    ),
    array(
        'heading' => 'International Disclosure',
        'body'    => 'Where data is stored or processed overseas (e.g., cloud services), Rectify Group takes reasonable steps to ensure compliance with Australian privacy laws and appropriate safeguards.',
    ),
    array(
        'heading' => 'Data Security',
        'body'    => "We implement reasonable technical and organisational safeguards including secure servers, restricted access controls, encrypted communications, and internal confidentiality protocols.\n\nWhile we take reasonable steps, no system guarantees absolute security.",
    ),
    array(
        'heading' => 'Retention of Information',
        'body'    => 'Information is retained only as long as necessary to fulfil contractual, legal, warranty, or dispute resolution obligations. When no longer required, it is securely destroyed or de-identified.',
    ),
    array(
        'heading' => 'Cookies & Website Analytics',
        'body'    => 'Our website may use cookies and analytics tools to improve user experience and measure marketing performance. You may disable cookies via browser settings, though this may affect functionality.',
    ),
    array(
        'heading' => 'Access & Correction',
        'body'    => "You may request access to personal information we hold about you and request correction of inaccurate or outdated information.\n\nRequests should be submitted in writing to:\nadmin@rectify.com.au\n\nWe will respond within a reasonable timeframe.",
    ),
    array(
        'heading' => 'Marketing Communications',
        'body'    => "Rectify Group may send service-related or industry communications. You may opt out at any time via unsubscribe links or direct contact.\n\nWe comply with the Spam Act 2003 (Cth).",
    ),
    array(
        'heading' => 'Sensitive Information',
        'body'    => 'Sensitive information is not generally collected. Where required (e.g., employment or safety compliance), it is handled with heightened security and used only for its intended purpose.',
    ),
    array(
        'heading' => 'Complaints',
        'body'    => "If you believe Rectify Group has breached your privacy rights, you may submit a written complaint to:\n\nRectify Group\nRectify Group Head Office\n99-101 Munster Terrace 28 Trade Park Drive\nNorth Melbourne VIC 3051 Tullamarine VIC 3043\nadmin@rectify.com.au\n\nWe will investigate and respond within a reasonable timeframe.\n\nIf you are not satisfied with our response, you may contact the Office of the Australian Information Commissioner (OAIC).",
    ),
    array(
        'heading' => 'Changes to This Policy',
        'body'    => 'Rectify Group may update this Privacy Policy to reflect legal, operational, national, or international changes. The most current version will be available on our website.',
    ),
    array(
        'heading' => 'Contact Us',
        'body'    => "If you have questions about this Privacy Policy, please contact:\n\nRectify Group\n1800 18 20 20\nRectify Group Head Office\n99-101 Munster Terrace 28 Trade Park Drive\nNorth Melbourne VIC 3051 Tullamarine VIC 3043\nadmin@rectify.com.au\nwww.rectify.com.au",
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-faq-page rx-legal-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'policy-hero',
                'render' => function () {
                    ?>
                    <section class="rx-faq-hero rx-legal-hero">
                        <div class="rx-wrap">
                            <h1><?php esc_html_e( 'Privacy Policy', 'rectify-custom' ); ?></h1>

                            <nav class="rx-faq-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Privacy Policy', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'policy-content',
                'render' => function () use ( $policy_sections ) {
                    ?>
                    <section class="rx-legal-body">
                        <div class="rx-wrap">
                            <ol class="rx-legal-list">
                                <?php foreach ( $policy_sections as $item ) : ?>
                                    <li class="rx-legal-item">
                                        <h2><?php echo esc_html( $item['heading'] ); ?></h2>
                                        <div class="rx-legal-item-copy"><?php echo wp_kses_post( wpautop( $item['body'] ) ); ?></div>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'policy-help',
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
