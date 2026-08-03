<?php
/**
 * Cracked Walls page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cracked_images = array(
    'hero'       => rx_asset_url( 'images/cracked-walls/intro-wall-crack.png' ),
    'why_matter' => rx_asset_url( 'images/cracked-walls/why-matters-worker.png' ),
    'before'     => rx_asset_url( 'images/cracked-walls/before-crack.jpg' ),
    'after'      => rx_asset_url( 'images/cracked-walls/after-crack.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/cracked-walls/foundation-settlement.png',
        'title' => 'Foundation Settlement',
        'copy'  => array(
            'Foundation settlement occurs when the soil beneath your home compresses or loses its ability to adequately support the building. As different areas of the foundation settle at different rates, stress is transferred into the walls, often resulting in cracks around doors, windows, corners, or brickwork.',
            'Settlement can develop gradually over many years or occur more quickly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before cosmetic repairs are undertaken.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/reactive-clay-soil.png',
        'title' => 'Reactive Clay Soils',
        'copy'  => array(
            'Many Australian homes are built on reactive clay soils, which naturally expand when they absorb moisture and shrink as they dry out. This constant cycle of expansion and contraction places repeated pressure on foundations.',
            'Over time, these seasonal soil movements can cause foundations to lift or settle unevenly, leading to cracks in internal plaster, brickwork, and external walls. Reactive soils are one of the most common causes of structural movement throughout Australia.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/seasonal-moisture.png',
        'title' => 'Seasonal Moisture Changes',
        'copy'  => array(
            'Extended dry periods followed by heavy rainfall can significantly alter moisture levels within the ground surrounding your property. As soil dries, it contracts, and when moisture returns, it expands again.',
            'These natural seasonal cycles can cause gradual foundation movement, particularly where soil conditions are already reactive. The resulting movement often appears as new wall cracks or the widening of existing cracks over time.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/tree-roots.jpg',
        'title' => 'Tree Roots',
        'copy'  => array(
            'Large trees and established vegetation located close to a building can affect soil moisture by drawing water from the ground through their root systems. This drying effect may cause certain soils to shrink unevenly beneath sections of the foundation.',
            'If movement becomes uneven across the structure, cracks may begin to appear in walls, brickwork, or concrete slabs. Professional assessment can determine whether nearby vegetation is contributing to foundation movement.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/leaking-pipes.jpg',
        'title' => 'Leaking Pipes',
        'copy'  => array(
            'Underground water leaks, damaged stormwater systems, or leaking plumbing can introduce excess moisture into the soil beneath a building. Over time, this may soften the supporting ground, wash away fine particles, or create underground voids.',
            'As the soil loses strength, sections of the foundation may settle unevenly, leading to structural movement and wall cracking. Addressing the water source is an important part of any long-term repair strategy.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/erosion.png',
        'title' => 'Erosion',
        'copy'  => array(
            'Water movement beneath or around a property can gradually erode supporting soils, reducing the stability of foundations. Heavy rainfall, poor drainage, uncontrolled surface water, or underground water flow may all contribute to erosion over time.',
            'As supporting ground is lost, foundations can begin to move, causing cracks in walls, uneven floors, and other signs of structural distress. Rectify specialises in ground improvement and erosion remediation designed to restore ground stability while minimising disruption.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/compacted-fill.jpg',
        'title' => 'Poorly Compacted Fill',
        'copy'  => array(
            'If the soil beneath a building was not adequately compacted during construction, it may continue to compress long after the building has been completed. This gradual compression can create differential settlement, where one section of the building settles more than another.',
            'The resulting movement places stress on the structure and may lead to cracking in walls, ceilings, floors, and other building elements.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/nearby-excavation.png',
        'title' => 'Nearby Excavation',
        'copy'  => array(
            'Construction work on neighbouring properties, roadworks, service trenching, or other excavation activities can sometimes disturb surrounding ground conditions. Removing or altering soil close to existing foundations may change how the ground supports nearby structures.',
            'Although not every excavation causes damage, significant ground disturbance has the potential to contribute to foundation movement and the development of structural cracks in some situations.',
        ),
    ),
    array(
        'image' => 'images/cracked-walls/ageing-foundations.jpg',
        'title' => 'Ageing Foundations',
        'copy'  => array(
            'As buildings age, construction materials naturally experience decades of environmental exposure, loading, and ground movement. While many older homes remain structurally sound, ageing foundations may become more susceptible to movement if soil conditions change or drainage deteriorates.',
            'Older properties may therefore develop wall cracks as a result of cumulative movement rather than a single isolated event. A professional inspection can determine whether the movement is historic, ongoing, or requires remediation.',
        ),
    ),
);

$advantage_cards = array(
    array(
        'icon'  => 'Rectify Icon prof.svg',
        'title' => 'Unrivalled Experience',
        'copy'  => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Engineered Fill.svg',
        'title' => 'Cutting-Edge Technology',
        'copy'  => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Corrective Method.svg',
        'title' => 'Seamless Delivery',
        'copy'  => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
        'title' => 'Affordable Solutions',
        'copy'  => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Certifications and Compliance.svg',
        'title' => 'Quality Assurance',
        'copy'  => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
    ),
    array(
        'icon'  => 'home-advantage/save-environment.svg',
        'title' => 'Environmentally Conscious',
        'copy'  => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-cracked-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-cracked-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Wall crack repair specialists in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Cracked Walls', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-intro',
                'render' => function () use ( $cracked_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Repair structural wall cracks, foundation movement & subsidence without major excavation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Cracks in walls are one of the earliest warning signs that your home\'s foundations may be moving. While some hairline cracks are simply the result of normal settling, widening, diagonal or recurring cracks can indicate foundation settlement, reactive soil movement or subsidence.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we specialise in identifying the root cause of structural wall cracks rather than simply repairing the visible damage. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property, helping prevent further movement while restoring structural stability.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $cracked_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Structural crack on an exterior brick wall', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why are my walls cracking?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'Wall cracks are one of the most common signs that something may be changing within your property. While some cracks are simply the result of normal ageing or minor building movement, others can indicate that the ground beneath your home has shifted, causing stress on the foundations and the structure above.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we believe the first step is understanding why the cracks have appeared. Identifying the underlying cause allows the correct repair solution to be selected, helping to prevent ongoing structural movement rather than simply hiding the visible damage.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-causes',
                'render' => function () use ( $causes ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-causes rx-cracked-causes--photo">
                        <div class="rx-wrap">
                            <div class="rx-cracked-causes-grid">
                                <?php foreach ( $causes as $cause ) : ?>
                                    <article class="rx-cracked-cause-card rx-cracked-cause-card--photo">
                                        <figure class="rx-cracked-cause-photo">
                                            <img src="<?php echo esc_url( rx_asset_url( $cause['image'] ) ); ?>" alt="<?php echo esc_attr( $cause['title'] ); ?>">
                                        </figure>
                                        <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                                        <?php foreach ( $cause['copy'] as $paragraph ) : ?>
                                            <p><?php echo esc_html( $paragraph ); ?></p>
                                        <?php endforeach; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-matters',
                'render' => function () use ( $cracked_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <figure class="rx-cracked-matters-media">
                                <img src="<?php echo esc_url( $cracked_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Rectify technician assessing an exterior wall', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'Why identifying the cause matters', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Identifying the cause of wall cracks is essential before cosmetic repairs are attempted. Repairing the crack without stabilising the underlying foundation often results in the crack returning.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we focus on diagnosing the source of the movement first. Where foundation instability is identified, solutions such as chemical underpinning, polyurethane resin injection, and other ground engineering techniques can stabilise the supporting ground before cosmetic repairs are completed. This approach addresses the root cause rather than simply covering up the symptoms.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-advantage',
                'render' => function () use ( $cracked_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $cracked_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <div class="rx-cracked-advantage-head">
                                <div>
                                    <span class="rx-kicker"><?php esc_html_e( 'OUR ADVANTAGE', 'rectify-custom' ); ?></span>
                                    <h2><?php esc_html_e( 'Why Homeowners Choose Rectify', 'rectify-custom' ); ?></h2>
                                </div>
                                <p><?php esc_html_e( 'At Rectify, we don\'t just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.', 'rectify-custom' ); ?></p>
                            </div>
                            <div class="rx-cracked-advantage-grid">
                                <?php foreach ( $advantage_cards as $card ) : ?>
                                    <article class="rx-cracked-advantage-card">
                                        <span class="rx-cracked-card-icon">
                                            <img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt="">
                                        </span>
                                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-performance',
                'render' => function () use ( $cracked_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-cracked-compare">
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $cracked_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <span class="rx-cracked-compare-divider" aria-hidden="true">
                                    <span class="rx-cracked-compare-arrows">&#9664;&#9654;</span>
                                </span>
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $cracked_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-cracked-help',
                'render' => function () use ( $cracked_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $cracked_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>
                            <?php $rx_cracked_help_arrow = '<span class="rx-cracked-help-arrow" aria-hidden="true"><svg viewBox="0 0 36 17.4375" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.5875 7.72333C35.5871 7.72291 35.5868 7.72242 35.5863 7.722L28.2383 0.409495C27.6879 -0.138309 26.7975 -0.136271 26.2496 0.414276C25.7017 0.964753 25.7038 1.85512 26.2543 2.40299L31.1877 7.3125H1.40625C0.629578 7.3125 0 7.94207 0 8.71875C0 9.49542 0.629578 10.125 1.40625 10.125H31.1876L26.2543 15.0345C25.7039 15.5824 25.7018 16.4727 26.2496 17.0232C26.7976 17.5738 27.688 17.5757 28.2384 17.028L35.5864 9.71549C35.5868 9.71507 35.5871 9.71458 35.5876 9.71416C36.1384 9.16446 36.1366 8.27121 35.5875 7.72333Z" fill="#BD1726"/></svg></span>'; ?>
                            <div class="rx-cracked-help-grid">
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                            <g clip-path="url(#clip0_986_5061_a)">
                                                <path d="M59.1029 59.9541L59.2787 61.4841L59.2197 63.8199L59.2464 67.9965C59.259 70.1171 57.6629 72.0001 55.4608 71.9986L6.49372 71.9776C4.80622 71.9776 3.10185 70.3435 3.09482 68.7488L3.05966 60.1932C3.03857 55.0393 6.73138 50.5168 11.5745 48.7871L18.6901 46.246C19.6787 45.2447 20.3959 44.4221 21.7754 43.8061V40.5183C19.9698 38.4511 18.7689 36.0619 18.1628 33.4238C15.0283 32.4015 14.0397 26.8327 15.8875 24.7022C16.2728 24.2579 16.7748 24.1496 17.4287 23.8191C16.412 23.393 15.4445 23.4211 14.5206 22.9486C13.8878 22.6238 13.2676 21.991 13.2592 21.2569L13.2311 18.4655C13.2198 17.394 14.0945 16.5347 15.2012 16.5263L15.2575 14.0794C15.9564 9.7974 18.4918 6.00193 22.1242 3.68021C23.1845 3.0024 24.2983 2.73521 25.4612 2.37802C25.8676 1.69458 26.1981 0.49646 27.2022 0.306616C29.6743 -0.157446 32.1606 0.00145991 34.6651 0.157554C36.1642 0.250366 37.2231 1.3388 37.1373 2.89834C38.8895 3.17677 40.397 3.84615 41.7653 4.88677C45.3751 7.63037 47.4423 11.9208 47.3467 16.5305C48.4872 16.6683 49.3478 17.4474 49.3267 18.5907L49.2887 20.6663C49.0398 22.0233 47.912 22.9318 46.6548 23.341C46.0937 23.5238 45.534 23.4465 44.9983 23.9077C46.1261 24.1721 46.8953 24.8836 47.1568 25.9608C47.8065 28.6397 46.9206 32.3902 44.1911 33.4632C43.5484 36.1576 42.3123 38.5383 40.5236 40.5886L40.5137 43.8666C41.7822 44.2674 42.6386 45.1997 43.4767 46.201C43.824 46.6158 45.6283 46.5202 45.4229 47.9096C45.3442 48.4454 44.7339 49.0458 44.1123 48.811C43.4233 48.5508 42.6315 48.3554 42.0086 47.949C41.5543 47.4061 41.1958 46.6355 40.4265 46.2221L34.3333 53.3363L32.1831 55.6144V69.8808L55.4509 69.8611C56.4564 69.8611 57.0934 68.9541 57.0892 68.0682L57.0568 60.9076C57.0484 59.1441 55.337 57.984 56.6251 57.0741C57.0723 56.7577 57.7951 56.8491 58.1481 57.4299C58.5967 58.1682 58.9975 59.0204 59.1043 59.9555L59.1029 59.9541ZM45.0756 21.458C45.8715 21.458 46.5873 21.1402 46.9586 20.641C47.3495 20.1151 47.2623 19.3458 47.0668 18.7763L43.3108 18.7383C42.7609 18.7327 42.3742 18.0605 42.4206 17.6218C42.4754 17.1071 42.834 16.6486 43.3979 16.6177L45.2247 16.5179C45.1825 11.9265 42.8593 7.67677 38.7798 5.6138C38.2679 5.35505 37.7645 5.1399 37.1317 5.15396L37.1078 14.5758C37.1078 15.1313 36.5411 15.4786 36.077 15.4674C35.634 15.4561 35.035 15.1468 35.035 14.5913L35.0223 3.01365C35.0223 2.0799 33.8692 2.23599 32.2647 2.13333C30.8218 2.04193 29.4268 2.15584 28.0122 2.33302C27.7858 2.36115 27.6029 2.65927 27.6029 2.88709L27.6086 14.3494C27.6086 14.9597 27.2162 15.3971 26.6608 15.466C26.2698 15.5152 25.5343 15.2382 25.5329 14.6911L25.4992 4.85162C25.045 4.70396 24.647 4.85162 24.2462 5.04849C21.3986 6.45052 19.2765 8.90162 18.1304 11.8632C17.5356 13.4002 17.1995 14.9429 17.3218 16.5966L19.2512 16.6332C19.7758 16.643 20.1118 17.2266 20.1048 17.6963C20.0978 18.1294 19.7406 18.7215 19.2343 18.7285L15.3756 18.7819L15.3151 20.3527C15.2786 21.3132 16.3768 21.4847 17.6397 21.4833L45.0756 21.458ZM37.0206 40.9908C39.715 38.7085 41.5206 35.8046 42.2139 32.3944C42.3489 31.7307 42.827 31.4115 43.4697 31.3355C43.9112 31.2835 44.2768 30.8518 44.5075 30.4665C45.4187 28.9505 45.3878 26.5543 44.8422 26.2041C44.6537 26.0832 44.2178 26.5697 43.4964 26.2885C43.2559 26.1943 42.9297 25.9271 42.9212 25.5629L42.8776 23.6715H19.5043L19.5367 25.1536C19.5465 25.5966 19.375 25.9833 19.06 26.2027C18.3484 26.6977 17.717 26.0213 17.4709 26.2126C16.7523 26.7736 17.0265 31.2132 19.2372 31.4213C19.6858 31.4635 20.0176 31.7954 20.1062 32.2524C20.8656 36.2208 23.1803 39.6844 26.6593 41.7868C28.2076 42.7219 29.9908 43.2001 31.7809 43.1283C33.7834 43.0482 35.4878 42.2888 37.0192 40.9908H37.0206ZM38.4423 45.2124L38.3509 42.6263C36.2345 44.0157 33.9578 44.6555 31.5109 44.8665L30.8092 44.8496C28.3187 44.7891 26.08 43.8751 23.9383 42.4871L23.9073 45.3263L29.3945 51.6952L31.1242 53.4319C33.7173 50.7713 36.0573 48.053 38.4437 45.2138L38.4423 45.2124ZM21.9414 54.9844L26.4203 51.6629L21.8612 46.1968C21.2889 46.6341 20.829 47.0729 20.4704 47.6565L21.9428 54.9844H21.9414ZM30.0133 69.8738L30.0076 55.5329L27.8223 53.3082L21.7501 57.8757C21.3536 58.0908 20.9415 58.0726 20.6012 57.8616C20.2848 57.6647 20.1765 57.3357 20.095 56.9208L18.475 48.638L13.1397 50.5449C11.8347 51.0118 10.6225 51.518 9.51154 52.3322C7.07732 54.0563 5.52482 56.6213 5.24638 59.6251L5.1831 67.891C5.17607 68.8022 5.60497 69.8583 6.73841 69.8597L30.0104 69.8738H30.0133Z" fill="#BD1726"/>
                                                <path d="M35.1452 62.8398C33.3648 61.2986 32.9261 58.8334 33.9836 56.7226C34.8766 54.9409 36.0902 53.4362 37.2053 51.7825C38.3345 50.1076 40.1978 49.3314 42.2031 49.8672C43.7064 50.2694 44.8075 51.5659 45.5444 50.4747C47.6917 47.2994 49.6914 44.0453 51.5434 40.6815C52.5152 38.9153 50.1934 38.6284 48.6578 36.782C47.3936 35.2633 47.3697 33.1483 48.2711 31.3947C49.1725 29.6411 50.2159 27.8861 51.3648 26.1958C51.7994 25.5559 52.5208 25.127 53.1564 24.7403C54.4178 23.9725 55.8522 23.8642 57.2359 24.3719C57.9812 24.6461 58.7055 24.9273 59.41 25.3759C61.4983 26.7105 63.1 28.8226 63.7427 31.254C64.4458 33.9147 64.0858 36.6034 63.1141 39.1361C61.0792 44.439 56.8436 51.1722 53.5459 55.9295L49.3145 61.4195C48.4848 62.4953 47.5314 63.37 46.4303 64.1603C42.7909 66.7717 38.4062 65.6594 35.148 62.8398H35.1452ZM35.8525 57.7436C35.2773 58.7519 35.4053 60.0203 36.1436 60.7726C37.9914 62.657 40.9023 64.0787 43.4772 63.2364C44.7569 62.8187 45.7848 62.0073 46.7102 61.044C48.3062 59.3819 49.6787 57.6381 51.0302 55.7439C54.498 50.8811 58.9094 43.9047 61.0384 38.4301C63.0592 33.2326 61.653 29.0969 56.9336 26.2605C55.5611 25.4364 54.0325 25.795 53.2225 27.159L50.2159 32.2215C49.7195 33.0569 49.5044 34.0595 50.0008 34.9609C50.6223 36.093 52.6023 36.9142 53.2942 37.8747C54.2448 39.1965 53.9861 40.787 53.2155 42.1384C51.3142 45.4698 49.4073 48.6831 47.2417 51.8444C46.6567 52.6994 45.6287 53.2464 44.6205 53.2014C43.8358 53.1648 43.2058 52.7472 42.5195 52.3478C41.6266 51.8289 40.2723 51.459 39.4891 52.4378C38.1602 54.0986 36.9339 55.8479 35.8553 57.7422L35.8525 57.7436Z" fill="#BD1726"/>
                                                <path d="M62.6033 60.3084C62.0197 60.57 61.4656 60.2282 61.2617 59.7628C61.0888 59.3676 61.138 58.6321 61.6274 58.3861C63.2136 57.5887 64.5299 56.4862 65.4538 54.9253C66.455 53.235 66.9388 51.2943 66.7686 49.3017C66.5999 47.3329 65.8953 45.4275 64.482 44.0564C63.9758 43.5656 63.6945 42.9721 64.1811 42.3421C64.5622 41.85 65.3638 41.8289 65.8602 42.3182C67.812 44.2504 68.826 46.7845 68.9328 49.5365C69.1086 54.0492 66.7391 58.4507 62.6033 60.3084Z" fill="#BD1726"/>
                                                <path d="M59.1468 55.4766C59.0653 54.7215 59.4042 54.4163 59.9358 54.1224C62.1633 52.8863 62.9297 49.9458 61.6134 47.7704C61.2633 47.1924 61.3448 46.5469 61.8918 46.1686C62.3475 45.8536 63.0745 45.9352 63.4289 46.5132C65.4904 49.8811 64.2347 54.3333 60.7654 56.2036C60.4279 56.3851 60.1073 56.4455 59.7909 56.3021C59.4956 56.1685 59.1933 55.8929 59.1483 55.478L59.1468 55.4766Z" fill="#BD1726"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_986_5061_a">
                                                    <rect width="72" height="72" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link rx-cracked-help-link-phone" href="tel:1800182020">
                                        <svg viewBox="0 0 23.9997 24.0001" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6795 1.32019C21.7996 0.440119 20.7396 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33335 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.18761 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18232 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/></svg>
                                        <?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?>
                                    </a>
                                </article>
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                            <g clip-path="url(#clip0_0_225_a)">
                                                <path d="M17.4375 14.2341L17.3967 10.3964L11.4272 10.3528C10.0463 10.343 8.45578 11.2388 8.45578 12.863V65.6536C8.45438 67.1006 9.73406 68.3297 11.1136 68.3311L38.3302 68.3438L40.4831 70.3434L11.6888 70.3856C8.89875 70.3898 6.48563 68.452 6.48703 65.5411V12.8489C6.48984 10.6284 8.29125 8.63719 10.4611 8.4375L17.6794 8.33906C18.2348 6.95109 19.4639 5.92031 20.9573 5.89922L23.7094 5.85984C24.0848 2.45672 26.8959 -0.119531 30.2864 -0.0660938C33.5855 -0.0140625 36.3305 2.53547 36.6666 5.85844L39.5972 5.91328C41.0062 5.94 42.165 7.01438 42.712 8.34047L49.8178 8.42344C51.8738 8.44734 53.7834 10.4723 53.7863 12.6169L53.827 39.9684L51.8963 39.6717L51.8484 37.5863L51.84 13.1864C51.84 11.828 51.0455 10.4273 49.5717 10.4175L42.975 10.3725L42.9258 14.2706C42.9131 15.2972 42.0848 16.0889 41.0709 16.2984L19.2839 16.3013C18.3023 16.0481 17.4488 15.293 17.4375 14.2341ZM40.6631 14.2706C40.9261 14.2706 41.0091 14.0766 41.0091 13.9627L40.9936 9.66375C40.9908 8.82563 40.3973 7.93266 39.5142 7.92703L35.8973 7.90313C35.5092 7.90031 35.228 7.78781 35.0044 7.55297C34.7456 7.28297 34.7372 7.01578 34.7442 6.5925C34.785 4.06688 32.7108 1.89844 30.1191 1.93641C27.585 1.97297 25.5938 4.11609 25.6134 6.59391C25.6163 7.00594 25.612 7.28719 25.3631 7.56563C25.1817 7.76953 24.9005 7.88625 24.5616 7.88906L20.9447 7.91156C20.063 7.91719 19.3416 8.78906 19.35 9.66375L19.3922 14.2706H40.6631Z" fill="#BD1726"/>
                                                <path d="M44.3419 70.8356C38.932 68.49 35.3447 63.2686 35.0072 57.4397C34.6177 50.7023 38.7352 44.3981 45.0225 42.0412C50.4253 40.0177 56.4005 41.2762 60.5588 45.1603C67.2159 51.3773 67.1681 62.0395 60.4012 68.1722C56.0953 72.0745 49.7925 73.1995 44.3419 70.8356ZM60.9581 64.7423C65.0939 59.0569 64.388 51.5616 59.4787 46.7536C54.8395 42.21 47.6058 41.7122 42.3886 45.6033C38.6297 48.4059 36.4781 53.0255 36.8944 57.7462C37.2094 61.3195 38.9222 64.5722 41.5491 66.8812C47.3836 72.0098 56.3766 71.0395 60.9581 64.7423Z" fill="#BD1726"/>
                                                <path d="M22.4662 32.1258L13.8445 32.0878C13.2075 32.085 12.4453 31.3411 12.4369 30.7083L12.3384 22.8178C12.33 22.1836 12.3933 21.6014 12.7969 21.1359C13.2005 20.6705 13.7531 20.5059 14.4 20.5045L21.9755 20.4919C22.9388 20.4905 23.9498 21.0614 23.9513 22.1231L23.9583 30.4819C23.9583 31.3158 23.2748 31.9416 22.4677 32.1272L22.4662 32.1258ZM22.365 30.42L22.3509 22.1681L14.0175 22.178L14.0147 30.4369L22.365 30.4186V30.42Z" fill="#BD1726"/>
                                                <path d="M22.4494 46.5652L14.0597 46.5877C13.0528 46.5905 12.3736 45.7073 12.3736 44.7483L12.3694 37.2825C12.3694 36.6286 12.3975 36.0563 12.8489 35.588C13.2286 35.1956 13.7517 34.9777 14.3944 34.9762L21.9811 34.9706C22.9148 34.9706 23.9428 35.5627 23.9442 36.6061L23.9597 44.9733C23.9611 45.7256 23.258 46.5623 22.448 46.5652H22.4494ZM22.3678 44.9058L22.3439 36.6708L14.2791 36.6497C14.0738 36.7031 13.9936 36.8466 13.995 37.0519L14.0498 44.9409L22.3664 44.9058H22.3678Z" fill="#BD1726"/>
                                                <path d="M22.3073 61.1775L13.8938 61.1859C13.1077 60.9862 12.4003 60.4237 12.3975 59.5687L12.3666 51.4195C12.3623 50.3986 13.1203 49.5478 14.168 49.5506L22.4128 49.5717C23.2214 49.5731 23.9611 50.4 23.9597 51.1903L23.9442 59.6756C23.9428 60.4758 23.0723 61.1775 22.3059 61.1775H22.3073ZM22.3523 51.3731C22.3523 51.1481 21.8644 51.1608 21.7209 51.1636L19.5905 51.2114L15.7613 51.1762L14.0077 51.2677L14.0273 59.4984L22.32 59.5111L22.3523 51.3731Z" fill="#BD1726"/>
                                                <path d="M44.4755 39.1247L27.5569 39.1359C27.1083 39.1359 26.8144 38.5763 26.827 38.243C26.8439 37.838 27.1519 37.3359 27.6497 37.3359L44.4502 37.3444C44.9044 37.3444 45.0998 37.8436 45.1294 38.1431C45.1589 38.4427 45.0014 39.1233 44.4755 39.1233V39.1247Z" fill="#BD1726"/>
                                                <path d="M44.3897 24.6347L27.5597 24.6319C27.0759 24.6319 26.8523 24.0848 26.8538 23.7502C26.8552 23.4155 27.0703 22.8417 27.5611 22.8417L44.4487 22.8445C44.9297 22.8445 45.1406 23.4239 45.128 23.7445C45.1139 24.0877 44.9114 24.6347 44.3897 24.6347Z" fill="#BD1726"/>
                                                <path d="M38.6986 29.5144L27.7861 29.5003C27.2166 29.5003 26.8748 29.0883 26.858 28.6144C26.8439 28.1883 27.1252 27.637 27.6708 27.637H38.6648C39.1627 27.637 39.4763 28.1292 39.4805 28.4963C39.4861 28.9631 39.2456 29.3161 38.7 29.513L38.6986 29.5144Z" fill="#BD1726"/>
                                                <path d="M38.662 42.1636C39.2442 42.1636 39.4833 42.6937 39.4636 43.0959C39.4439 43.4981 39.1317 43.9523 38.6423 43.9537L27.7847 43.9861C27.1997 43.9875 26.8678 43.5656 26.8608 43.1002C26.8509 42.5166 27.2292 42.1481 27.8634 42.1481L38.662 42.1622V42.1636Z" fill="#BD1726"/>
                                                <path d="M33.757 53.9888L27.5442 53.9578C27.0802 53.955 26.8509 53.4262 26.8636 53.0648C26.8762 52.7034 27.0816 52.1761 27.5484 52.1761L34.1381 52.1634L33.7584 53.9902L33.757 53.9888Z" fill="#BD1726"/>
                                                <path d="M33.6909 58.6223C32.1623 58.6702 27.8648 58.7841 27.3586 58.5745C26.9873 58.4213 26.8552 58.0514 26.8636 57.7013C26.8692 57.4242 27.0478 56.8477 27.4711 56.8434L33.563 56.7914C33.5166 57.4411 33.5813 57.9952 33.6909 58.6209V58.6223Z" fill="#BD1726"/>
                                                <path d="M29.4834 9.18844C28.3162 8.83406 27.6567 7.69219 27.7453 6.62063C27.8437 5.41828 28.6734 4.45641 29.9208 4.30734C31.493 4.12031 32.76 5.47453 32.6405 6.98484C32.5209 8.49516 31.0683 9.66938 29.4848 9.18703L29.4834 9.18844ZM29.8842 6.17344C29.4427 6.41531 29.4159 6.87375 29.6212 7.16344C29.8266 7.45312 30.2006 7.54453 30.4959 7.40391C30.8602 7.23094 30.9614 6.80062 30.8011 6.46312C30.6548 6.15797 30.2695 5.96109 29.8842 6.17344Z" fill="#BD1726"/>
                                                <path d="M57.3441 65.5088L52.5319 65.5045C51.9539 65.5045 51.6684 65.1038 51.6684 64.5511L51.6755 59.3888L48.7589 59.4042L48.7252 64.8633C48.7223 65.2683 48.2316 65.4989 47.8814 65.4989L43.0214 65.5031C42.5292 65.5031 42.1355 65.1839 42.1341 64.6552L42.1158 57.4833L40.5591 57.4538C40.2089 57.4467 39.9684 57.0909 39.908 56.8631C39.8011 56.4581 39.9136 56.1263 40.2117 55.838L49.4663 46.9083C49.9472 46.4442 50.5406 46.5258 50.9892 46.9617L53.2856 49.1948C53.4516 48.5634 53.3391 47.7464 54.0042 47.7464H56.7014C57.1373 47.7464 57.3216 48.2105 57.3202 48.5873L57.3089 53.0255L60.4434 56.0588C60.6642 56.2725 60.6389 56.6536 60.5433 56.9025C60.4617 57.1163 60.2508 57.4397 59.9442 57.4439L58.3242 57.4664L58.3186 64.6242C58.3186 65.1544 57.8911 65.5073 57.3441 65.5073V65.5088ZM52.5389 57.6394C53.1113 57.6394 53.3573 58.2033 53.3573 58.6617V63.7917L56.6423 63.7734V56.7464C56.6423 56.4258 56.7675 56.1136 56.9869 56.0531L57.7955 55.8267L50.1652 48.5888L42.6839 55.8169C43.3294 55.9673 43.6894 56.1319 43.7597 56.6395L43.7541 63.7973L47.1206 63.7889L47.108 58.3411C47.1966 57.8756 47.5383 57.6436 48.0038 57.6422L52.5389 57.638V57.6394ZM55.6973 51.3155L55.717 49.3889C55.4048 49.3186 55.1911 49.3144 54.8831 49.4002C54.7552 50.3677 54.8016 50.9175 55.6973 51.3155Z" fill="#BD1726"/>
                                                <path d="M15.3534 26.9944C14.947 26.5866 14.9597 26.1211 15.2831 25.7681C15.6066 25.4152 16.1002 25.3336 16.4728 25.6964L17.5683 26.7623L19.9702 24.1847C20.302 23.8289 20.7548 23.7923 21.112 24.0595C21.4298 24.2972 21.6408 24.8245 21.2991 25.1887L18.1308 28.5623C17.7947 28.9195 17.3025 28.9505 16.9509 28.5975L15.3534 26.993V26.9944Z" fill="#BD1726"/>
                                                <path d="M15.2761 41.3831C14.8809 40.9936 15.0131 40.4423 15.3858 40.1484C16.2155 39.4931 16.6936 40.5844 17.5809 41.2467L19.8591 38.79C20.2134 38.4075 20.6072 38.2303 21.0516 38.5059C21.4031 38.7239 21.6633 39.2963 21.3089 39.6731L18.128 43.0481C17.8959 43.2942 17.4094 43.4841 17.1563 43.2338L15.2775 41.3817L15.2761 41.3831Z" fill="#BD1726"/>
                                                <path d="M17.0789 57.7294L15.1538 55.7648C14.8739 55.4794 15.0933 55.0491 15.2663 54.8297C15.5025 54.533 16.0045 54.3459 16.3069 54.6258L17.5458 55.7691L20.1853 53.0719C20.4961 52.7541 21.0994 53.0058 21.2892 53.2617C21.5761 53.6484 21.4805 54.0745 21.1345 54.4373L17.9972 57.7252C17.768 57.9642 17.3278 57.9825 17.0789 57.7294Z" fill="#BD1726"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_0_225_a">
                                                    <rect width="72" height="72" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>"><?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); echo $rx_cracked_help_arrow; ?></a>
                                </article>
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                            <g>
                                                <path d="M9.46266 63.7425L9.49359 42.2353L9.50484 40.4072C9.09984 40.3031 8.63719 40.2778 8.23359 40.3791C7.75266 40.4986 7.49812 40.9177 7.43766 41.3859L7.38844 44.6077L7.36734 67.3847H30.3708C30.9698 67.3847 31.3945 67.5844 31.5577 68.1848C31.6294 68.933 32.2158 69.7542 33.0384 69.7584L36.2742 69.7711C37.2291 69.7753 37.9505 68.9667 37.9758 68.0625C38.1867 67.5169 38.603 67.3847 39.1739 67.3847H64.2262V41.6194C64.2262 40.853 63.578 40.3748 62.9297 40.4002C62.6456 40.3791 62.4586 40.3594 62.1323 40.4522L62.1281 53.6316C62.1281 53.8819 61.9523 54.0886 61.8427 54.1941C61.4475 54.5709 60.698 54.2391 60.3267 53.5247L60.3197 38.6522C58.6252 38.0109 56.8814 37.6678 55.0912 37.5666L54.8114 36.5625C54.7397 36.3023 54.5077 36.1013 54.5836 35.7764L63.9225 35.7455C64.1475 35.7455 64.3064 35.5866 64.4119 35.5261C64.5469 35.4488 64.7297 35.0705 64.5581 34.9116L60.8161 31.4747L59.2383 32.8317C58.635 33.3506 57.9839 33.3169 57.42 32.7712L55.0041 30.4397L52.5248 32.6855C51.7908 32.5434 51.0708 31.6392 51.4012 31.327L54.1055 28.7648C54.6314 28.267 55.402 28.267 55.9111 28.7648L58.3467 31.1513L59.9456 29.7563C60.4561 29.3105 61.1072 29.3133 61.6134 29.7563L64.5862 32.3592L64.6102 22.4494C64.6102 22.0219 64.2516 21.6788 63.8255 21.6788L50.8106 21.683C50.4366 21.683 50.1145 22.0092 50.1131 22.3664L50.1019 29.5959C50.1019 29.8983 49.9809 30.1008 49.7756 30.2273C49.3397 30.4959 48.7294 30.1852 48.3202 29.648L48.3342 22.2159C48.337 20.9658 49.2581 20.0686 50.4802 19.8295L50.5012 10.4977L44.9592 10.485C43.7498 10.4006 42.8316 9.55125 42.698 8.34469L42.6783 2.25L29.5003 2.24438C29.0714 2.24438 28.7986 2.55656 28.8 2.97984L28.8113 31.6547C28.8113 31.9514 29.2458 32.092 29.4342 32.2256C29.3344 32.7755 28.7381 33.3408 28.087 33.2367C27.5245 33.1467 26.9944 32.5167 26.9944 31.8656L27.0042 2.52281C27.0042 1.25016 28.1784 0.379687 29.3541 0.381094L43.9608 0.386719C44.287 0.386719 44.5739 0.579375 44.7933 0.801562L51.7598 7.86937C52.1423 8.19 52.2802 8.57109 52.2802 9.08297V19.8436L64.1714 19.8759C65.5186 19.8802 66.4453 21.1584 66.4228 22.4466L66.3975 35.3433C66.3947 36.5203 65.3569 37.4034 64.2628 37.5708L62.1773 37.6284C62.0733 37.8281 62.055 38.4244 62.3137 38.5875C64.1334 38.257 65.9869 39.4369 65.9911 41.362L66.0192 52.5333V67.4241C66.0206 68.3986 65.2612 69.2395 64.2825 69.2395L39.5536 69.2564C39.0586 70.5389 38.0011 71.3995 36.7102 71.6161L32.9273 71.6316C31.5844 71.4502 30.4847 70.5811 29.9967 69.2578L7.11281 69.2184C6.24797 69.217 5.58422 68.3002 5.58703 67.4663L5.67844 41.033C5.68406 39.5184 7.25766 38.5102 8.55141 38.4877L9.54422 38.4708L9.585 36.7706C9.59906 36.187 10.0758 35.9297 10.5694 35.7427C13.2005 34.7456 15.8991 34.1733 18.7298 34.0003H23.1441C25.4433 34.1536 27.6497 34.5206 29.8069 35.287C30.1092 35.3953 30.5887 35.5416 30.6464 35.8453L30.2597 36.8719C30.2006 37.0294 30.0923 37.1461 29.9995 37.2023C29.842 37.2952 29.6958 37.2178 29.4989 37.1489C27.1294 36.3164 24.6811 35.9325 22.1737 35.8411L19.6988 35.8327C16.8342 35.8228 13.9739 36.3994 11.3133 37.5005L11.2669 56.7183L11.2177 62.3039C12.3328 61.8384 13.3861 61.6275 14.5252 61.3631C21.1092 60.0919 28.1728 60.8414 33.8794 64.7241L33.9286 54.1055C33.93 53.7117 34.4714 53.5219 34.7245 53.505C35.0002 53.4867 35.6245 53.6794 35.6273 54.0928L35.6752 64.6608C40.3369 61.4714 45.6483 60.4308 51.1509 60.9286C53.0508 61.0425 54.817 61.4081 56.6114 61.9622C57.5241 63.0577 58.8741 63.6427 60.3014 63.4612C60.6319 63.4191 61.0678 63.1631 61.3448 63.4528C61.5262 63.6412 61.6416 64.9308 61.2028 65.3273C60.982 65.527 60.5433 65.6817 60.1903 65.4905C54.8283 62.602 48.1008 61.8877 42.2437 63.5681C39.6872 64.3022 37.44 65.5594 35.3827 67.2089C34.9327 67.5703 34.3055 67.3664 33.885 67.0402C29.5861 63.6961 24.4097 62.4586 18.9998 62.6878C16.117 62.8102 13.4002 63.3248 10.7606 64.4695C10.3205 64.6608 9.46547 64.3809 9.46687 63.7509L9.46266 63.7425ZM47.6353 8.64984L49.7616 8.48531L44.5191 3.19359L44.4755 7.91859C44.4642 9.17719 46.0955 8.17453 47.6353 8.64984Z" fill="#BD1726"/>
                                                <path d="M61.9298 61.7555C60.6459 62.7891 58.8417 62.8242 57.6773 61.6669L51.2241 55.2502C50.7473 54.7748 50.7713 54.1927 50.6742 53.6063L49.358 52.2422C44.3053 55.7044 37.5623 54.7791 33.5391 50.182C30.2105 46.3781 29.4469 41.0456 31.7798 36.4781C33.1158 33.8625 35.3039 31.7517 38.077 30.6183C41.4886 29.2219 45.4191 29.4694 48.6155 31.3228C54.6652 34.8314 56.6184 42.6417 52.8736 48.6127L54.2883 49.9866C54.9225 50.0709 55.4892 50.0991 55.9856 50.5927L60.1397 54.7256L62.6527 57.2822C63.6848 58.6772 63.2855 60.6628 61.927 61.7569L61.9298 61.7555ZM52.8581 43.5994C53.5458 38.963 51.0933 34.4306 46.8422 32.5125C43.3716 30.9473 39.4552 31.3819 36.4303 33.6881C33.968 35.5655 32.4197 38.4539 32.2763 41.5673C32.0245 47.0053 35.9888 51.6952 41.3227 52.3941C46.9392 53.1309 52.0439 49.0936 52.8581 43.598V43.5994ZM51.7739 52.148L52.8047 51.075L51.8034 50.0752L50.7305 51.1495L51.7739 52.148ZM59.0063 60.4055C59.5941 60.9862 60.5236 60.6248 60.9398 60.1945C61.4025 59.715 61.6486 58.7995 61.1002 58.2567L54.8423 52.0636C54.6258 51.8484 54.2686 51.9792 54.1069 52.1423L52.7681 53.4825C52.6275 53.6245 52.553 53.7961 52.5966 53.9705C52.6247 54.0816 52.7091 54.1898 52.837 54.3164L59.0048 60.4069L59.0063 60.4055Z" fill="#BD1726"/>
                                                <path d="M26.152 30.3412C26.1563 31.8642 25.3814 33.1917 23.7937 33.1945L8.24906 33.217C7.00031 33.2184 5.69531 32.4309 5.69391 31.0627L5.69109 16.3505C5.69109 15.3155 6.75563 14.2875 7.78078 14.2875H24.0469C25.117 14.2875 26.107 15.3548 26.1098 16.418L26.1506 30.3427L26.152 30.3412ZM21.9122 31.3172L23.7122 31.2975C23.9948 31.2947 24.3352 31.0711 24.3352 30.7308L24.3422 16.8033C24.3422 16.3912 24.0398 16.1156 23.6545 16.1156L8.16188 16.0973C7.73859 16.0973 7.46438 16.3927 7.46438 16.7991L7.47141 30.967C7.71609 31.3045 8.09297 31.3805 8.47406 31.3481C9.46125 31.2637 10.3711 31.3214 11.3639 31.3214H20.0053L21.9136 31.3158L21.9122 31.3172Z" fill="#BD1726"/>
                                                <path d="M45.4162 22.14H32.3606C31.8094 22.14 31.4212 21.8067 31.3636 21.3188C31.3144 20.9053 31.5773 20.3048 32.1398 20.3048H45.7017C46.2417 20.3034 46.4977 20.9334 46.4527 21.3145C46.3922 21.8194 46.0322 22.1414 45.4162 22.1414V22.14Z" fill="#BD1726"/>
                                                <path d="M45.7552 17.3489L32.0386 17.318C31.4817 17.318 31.3031 16.5811 31.3875 16.2225C31.5113 15.7036 31.9191 15.4913 32.4788 15.4913H45.3656C45.9113 15.4913 46.3275 15.712 46.4358 16.2295C46.5272 16.6627 46.3402 17.1802 45.7552 17.3489Z" fill="#BD1726"/>
                                                <path d="M27.3038 54.3136C23.4295 54.0225 19.6833 54.0028 15.8681 54.3234C15.2592 54.3741 14.9442 53.7595 14.992 53.3166C15.0525 52.7498 15.5053 52.4939 16.0889 52.4531L18.135 52.3083L25.1128 52.3055L27.052 52.4362C27.5808 52.4714 27.983 52.778 28.0884 53.242C28.1686 53.5922 27.9028 54.3586 27.3038 54.3136Z" fill="#BD1726"/>
                                                <path d="M24.9089 48.9066L18.3952 48.9178L16.3308 49.0795C15.7556 49.1245 15.2213 49.0345 15.0328 48.472C14.8669 47.977 15.1509 47.3527 15.7486 47.2683C17.3194 47.0447 18.862 47.0475 20.4736 47.0264C22.7461 46.9955 24.9356 46.9927 27.18 47.2416C27.6877 47.2978 28.073 47.6452 28.1025 48.1247C28.132 48.6042 27.7552 49.1428 27.2109 49.0978L24.9103 48.9066H24.9089Z" fill="#BD1726"/>
                                                <path d="M27.3192 43.868C23.5139 43.5403 19.8338 43.5516 16.0988 43.8469C15.518 43.8933 15.0891 43.6331 15.0019 43.11C14.9358 42.7106 15.1538 42.0877 15.7219 42.0356C19.5863 41.6827 23.4492 41.6981 27.3248 42.0272C27.8114 42.068 28.1067 42.518 28.1067 42.9103C28.1067 43.335 27.8634 43.7597 27.3192 43.8666V43.868Z" fill="#BD1726"/>
                                                <path d="M41.7698 26.9845L32.1764 26.9592C31.6223 26.9578 31.3355 26.3573 31.3622 25.9706C31.4016 25.3884 31.8417 25.0777 32.4506 25.0791L41.6222 25.0819C42.1158 25.0819 42.4786 25.4855 42.532 25.8792C42.5953 26.3475 42.3225 26.7623 41.7713 26.9845H41.7698Z" fill="#BD1726"/>
                                                <path d="M38.7225 12.548L32.2495 12.555C31.6716 12.555 31.3284 12.0234 31.3636 11.5523C31.4058 11.0067 31.8375 10.6594 32.4309 10.6608L38.8477 10.6777C39.3905 10.6791 39.683 11.2345 39.6703 11.6494C39.6548 12.1134 39.3103 12.5466 38.7211 12.548H38.7225Z" fill="#BD1726"/>
                                                <path d="M60.1481 23.7136C61.3702 23.3986 62.4586 24.1369 62.7553 25.2577C63.052 26.3784 62.3334 27.4795 61.2084 27.8058C60.1566 28.1109 59.0203 27.4514 58.6828 26.3953C58.3284 25.2844 58.9275 24.0286 60.1481 23.7136Z" fill="#BD1726"/>
                                                <path d="M42.4237 50.7234C38.0166 50.6166 34.4348 47.1572 34.0411 42.8681C33.7584 39.7898 35.0733 36.9225 37.4878 35.0831C41.1244 32.3128 46.3134 32.947 49.2216 36.488C51.3956 39.1373 51.8794 42.7809 50.3086 45.9267C48.8939 48.7603 45.907 50.8078 42.4252 50.722L42.4237 50.7234ZM48.1838 38.1277C46.6467 35.9156 43.9861 34.8497 41.3691 35.3348C38.932 35.7863 36.8747 37.5877 36.1055 40.0838C35.1605 43.1522 36.5147 46.4034 39.2245 47.9602C42.0005 49.5548 45.5287 48.9895 47.6409 46.6538C49.7784 44.2898 50.0738 40.8488 48.1838 38.1291V38.1277Z" fill="#BD1726"/>
                                                <path d="M20.2641 24.7331L14.4942 28.1953C14.0105 28.485 13.0809 28.0772 13.0795 27.4936L13.0725 20.392C13.0725 19.7719 13.995 19.3528 14.5336 19.6748L20.1136 23.0273C20.4202 23.2116 20.5945 23.5167 20.6241 23.8064C20.6508 24.0666 20.6016 24.532 20.2641 24.7331ZM18.0534 23.9302L14.8894 22.0261L14.8809 25.8694L18.0548 23.9287L18.0534 23.9302Z" fill="#BD1726"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); echo $rx_cracked_help_arrow; ?></a>
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
