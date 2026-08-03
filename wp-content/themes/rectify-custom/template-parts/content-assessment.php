<?php
/**
 * Assessment / Project Cost Estimator page content.
 *
 * Loaded by page.php via get_template_part('template-parts/content', 'assessment')
 * for the top-level `assessment` page, sharing the site's normal
 * get_header()/get_footer() flow (top promo strip, mega-menu nav, footer)
 * like every other content page instead of a standalone template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Only the Assessment page loads this part now. The Get a Free Quote URL used
 * to mirror it and read these builder sections from the Assessment page; it
 * renders the quotation content with its own sections instead - see page.php.
 */
$ra_source_page_id = get_the_ID();
?>

<article id="post-<?php echo esc_attr( $ra_source_page_id ); ?>" <?php post_class( 'ra-page', $ra_source_page_id ); ?>>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-title' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-title-band">
        <div class="rx-wrap">
            <span class="ra-kicker ra-kicker-red">PRICING</span>
            <h1><?php esc_html_e( 'Get an indicative estimate for your foundation stabilisation project', 'rectify-custom' ); ?></h1>
            <nav class="ra-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php esc_html_e( 'Project Cost Estimate', 'rectify-custom' ); ?></span>
            </nav>
        </div>
    </section>
    <?php } ?>

    <section class="ra-hero" id="estimator">
        <div class="rx-wrap ra-hero-inner">

            <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-hero' ) ) {
                // rendered by plugin, nothing else to do here
            } else { ?>
            <div class="ra-hero-copy">
                <h2>Estimate the cost of stabilising your foundation</h2>
                <p>Use our estimator to calculate an indicative cost range based on your property's foundation type, movement severity and project scope. Every Rectify project is engineered to suit the structure and ground conditions, so your final quotation is confirmed after a professional assessment.</p>
                <p class="ra-hero-label">Before You Estimate</p>
                <ul class="ra-hero-list">
                    <li>Built using typical Rectify project data</li>
                    <li>Helps you understand likely investment before requesting a quotation</li>
                    <li>Engineered solutions tailored to your property's conditions</li>
                    <li>Final pricing confirmed after professional site assessment</li>
                </ul>
            </div>
            <?php } ?>

            <section class="ra-estimator" aria-labelledby="ra-estimator-title">
                <h2 id="ra-estimator-title">Project Cost Estimator</h2>

                <div class="ra-form-grid">
                    <label class="ra-field ra-field-select">
                        <span class="ra-field-label">Foundation / Slab Type</span>
                        <select id="ra-foundation" required>
                            <option value="" selected disabled>Foundation / Slab Type</option>
                            <option value="strip">Foundation Stabilisation</option>
                            <option value="raft">Slab Re-levelling &amp; Void Filling</option>
                            <option value="waffle">Waffle Slab Footing (edge / ribs)</option>
                            <option value="pavement">Infill / Pavement Slab (slab lift / void fill)</option>
                        </select>
                    </label>

                    <div class="ra-form-row">
                        <label class="ra-field" id="ra-length-field">
                            <span class="ra-field-label">Footing Length Treated (m)</span>
                            <input id="ra-length" type="number" min="2" placeholder="Footing Length Treated (m)" inputmode="decimal">
                        </label>

                        <label class="ra-field" id="ra-area-field" hidden>
                            <span class="ra-field-label">Treated Area (m&sup2;)</span>
                            <input id="ra-area" type="number" min="5" placeholder="Treated Area (m²)" inputmode="decimal">
                        </label>

                        <label class="ra-field ra-field-select">
                            <span class="ra-field-label">Access &amp; Working Space</span>
                            <select id="ra-access" required>
                                <option value="" selected disabled>Access &amp; Working Space</option>
                                <option value="easy">Easy (drive-up, open)</option>
                                <option value="standard">Standard (typical suburban)</option>
                                <option value="tight">Tight (limited clearance)</option>
                                <option value="veryTight">Very Tight (hand access only)</option>
                            </select>
                        </label>
                    </div>

                    <label class="ra-field ra-field-select">
                        <span class="ra-field-label">Severity of Movement</span>
                        <select id="ra-severity" required>
                            <option value="" selected disabled>Severity of Movement</option>
                            <option value="minor">Minor (hairline cracking)</option>
                            <option value="moderate">Moderate (visible cracking / doors bind)</option>
                            <option value="major">Major (noticeable settlement / rotation)</option>
                            <option value="severe">Severe (significant differential movement)</option>
                        </select>
                    </label>

                    <div class="ra-form-row">
                        <label class="ra-field ra-field-select">
                            <span class="ra-field-label">Live Services in Work Zone</span>
                            <select id="ra-services" required>
                                <option value="" selected disabled>Live services in Work Zone</option>
                                <option value="none">None obvious</option>
                                <option value="present">Present (typical)</option>
                                <option value="congested">Congested (locate and pothole)</option>
                            </select>
                        </label>

                        <label class="ra-field ra-field-select">
                            <span class="ra-field-label">Region</span>
                            <select id="ra-region" required>
                                <option value="" selected disabled>Region</option>
                                <option value="metro">Metro</option>
                                <option value="regional">Regional</option>
                                <option value="remote">Remote</option>
                            </select>
                        </label>
                    </div>

                    <label class="ra-check ra-field-full">
                        <input id="ra-geotech" type="checkbox">
                        <span>Include Investigation / Design Allowance</span>
                    </label>
                </div>

                <div class="ra-result" aria-live="polite">
                    <p class="ra-result-label">Estimated range (ex GST)</p>
                    <div class="ra-result-values">
                        <span class="ra-money" id="ra-low">$11,914</span>
                        <span class="ra-muted">to</span>
                        <span class="ra-money" id="ra-high">$16,118</span>
                    </div>
                    <p class="ra-result-note">This is an order-of-cost guide only. Final pricing depends on site conditions, required lift, resin volume and engineering design.</p>
                </div>
            </section>
        </div>
    </section>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-investment' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-section ra-section-white" id="ranges">
        <div class="rx-wrap">
            <div class="ra-section-head">
                <div>
                    <h2>Typical Investment by Solution</h2>
                </div>
                <p>Explore the typical investment ranges for Rectify's most common residential structural stabilisation solutions. These figures are indicative only and will vary depending on the size of the project, site conditions and engineering requirements.</p>
            </div>

            <div class="ra-card-grid">
                <article class="ra-card">
                    <h3>Foundation Stabilisation</h3>
                    <div class="ra-price">
                        <span class="ra-price-prefix">From</span>
                        <p class="ra-price-value">$600&ndash;$1,200 <span class="ra-price-suffix">per linear metre</span></p>
                    </div>
                    <p class="ra-list-label">Typical applications</p>
                    <div class="ra-list">
                        <ul>
                            <li>Strip footings</li>
                            <li>Waffle and raft slabs</li>
                            <li>Foundation movement</li>
                            <li>Structural re-levelling</li>
                        </ul>
                    </div>
                    <p class="ra-card-note"><strong>Best for:</strong> Homes experiencing cracks, sinking foundations or uneven floors.</p>
                </article>

                <article class="ra-card">
                    <h3>Slab Re-levelling &amp; Void Filling</h3>
                    <div class="ra-price">
                        <span class="ra-price-prefix">From</span>
                        <p class="ra-price-value">$150&ndash;$320 <span class="ra-price-suffix">per m&sup2;</span></p>
                    </div>
                    <p class="ra-list-label">Typical applications</p>
                    <div class="ra-list">
                        <ul>
                            <li>Void filling beneath slabs</li>
                            <li>Sunken concrete slabs</li>
                            <li>Pavements and hardstands</li>
                            <li>Localised settlement correction</li>
                        </ul>
                    </div>
                    <p class="ra-card-note"><strong>Best for:</strong> Restoring support beneath settled concrete without replacement.</p>
                </article>

                <article class="ra-card">
                    <h3>Engineering &amp; Assessment</h3>
                    <div class="ra-price">
                        <span class="ra-price-prefix">From</span>
                        <p class="ra-price-value">$750&ndash;$1,400 <span class="ra-price-suffix">per assessment</span></p>
                    </div>
                    <p class="ra-list-label">May include</p>
                    <div class="ra-list">
                        <ul>
                            <li>Site assessment</li>
                            <li>Engineering review</li>
                            <li>Structural recommendations</li>
                            <li>Scope of works</li>
                        </ul>
                    </div>
                    <p class="ra-card-note"><strong>Best for:</strong> Confirming the most appropriate remediation solution before works commence.</p>
                </article>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-why' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-section ra-section-dark ra-why-band">
        <div class="rx-wrap ra-why-grid">
            <div class="ra-why-media">
                <img src="<?php echo esc_url( rx_asset_url( 'images/assessment/why-ranges-worker.jpg' ) ); ?>" alt="">
            </div>
            <div class="ra-why-copy">
                <h2>Why are these shown as ranges?</h2>
                <p>Every home is different. Foundation type, soil conditions, structural movement, site access and engineering requirements all influence the final project cost. Our estimator and assessment provide a more accurate indication based on your property's specific conditions.</p>
                <div class="ra-why-lists">
                    <div>
                        <h4>Cost Influence:</h4>
                        <div class="ra-list">
                            <ul>
                                <li>Foundation size and depth</li>
                                <li>Severity of settlement</li>
                                <li>Ground conditions</li>
                                <li>Access around the property</li>
                                <li>Required lift and stabilisation</li>
                                <li>Engineering and council requirements where applicable</li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h4>What's included:</h4>
                        <div class="ra-list">
                            <ul>
                                <li>Engineered treatment design</li>
                                <li>Precision resin injection</li>
                                <li>Specialist equipment</li>
                                <li>Qualified technicians</li>
                                <li>Quality assurance throughout the works</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p class="ra-why-footnote">Additional engineering, permits or structural repairs may be quoted separately where required.</p>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-examples' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-section" id="scenarios">
        <div class="rx-wrap">
            <div class="ra-section-head ra-section-head--stack">
                <div>
                    <h2>Typical project examples</h2>
                </div>
                <p>Every home is different, but these examples provide a realistic indication of common Rectify projects.</p>
            </div>

            <div class="ra-scenarios">
                <article class="ra-scenario">
                    <h3>Minor Foundation Movement</h3>
                    <div class="ra-list ra-list-arrows">
                        <ul>
                            <li>8 lm Strip Footing</li>
                            <li>Suitable for homes with minor cracking and localised settlement.</li>
                        </ul>
                    </div>
                    <div class="ra-price">
                        <span class="ra-price-prefix">Indicative investment</span>
                        <p class="ra-price-value">$7,500&ndash;$12,500*</p>
                    </div>
                </article>

                <article class="ra-scenario">
                    <h3>Slab Settlement</h3>
                    <div class="ra-list ra-list-arrows">
                        <ul>
                            <li>50 m&sup2; Concrete Slab</li>
                            <li>Ideal where voids beneath the slab have caused uneven settlement.</li>
                        </ul>
                    </div>
                    <div class="ra-price">
                        <span class="ra-price-prefix">Indicative investment</span>
                        <p class="ra-price-value">$7,500&ndash;$16,000*</p>
                    </div>
                </article>

                <article class="ra-scenario">
                    <h3>Moderate Foundation Movement</h3>
                    <div class="ra-list ra-list-arrows">
                        <ul>
                            <li>18 lm Waffle Slab Edge Beams</li>
                            <li>For homes requiring foundation stabilisation with moderate structural movement.</li>
                        </ul>
                    </div>
                    <div class="ra-price">
                        <span class="ra-price-prefix">Indicative investment</span>
                        <p class="ra-price-value">$13,000&ndash;$27,000*</p>
                    </div>
                </article>
            </div>
            <p class="ra-scenarios-footnote">*These examples are indicative only. Actual project costs vary depending on site conditions, access, engineering requirements and the extent of structural movement. Final pricing is confirmed following a professional assessment.</p>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-faqs' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-section ra-section-white" id="faqs">
        <div class="rx-wrap">
            <div class="ra-section-head">
                <div>
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>

            <div class="ra-faq">
                <?php foreach ( rectify_custom_get_faq_group( 'assessment' ) as $ra_faq_index => $ra_faq_item ) : ?>
                <details id="assessment-faq-<?php echo esc_attr( $ra_faq_index ); ?>" <?php echo 0 === $ra_faq_index ? 'open' : ''; ?>>
                    <summary><?php echo esc_html( $ra_faq_item['question'] ); ?></summary>
                    <p><?php echo esc_html( $ra_faq_item['answer'] ); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( $ra_source_page_id, 'assessment-quote' ) ) {
        // rendered by plugin
    } else { ?>
    <section class="ra-section ra-section-dark" id="get-a-quote">
        <div class="rx-wrap ra-quote-grid">
            <div class="ra-quote-copy">
                <h2>Ready to understand your property's condition?</h2>
                <p>Structural movement can be complex. Our team is here to help you understand the cause, the risks, and the most appropriate solution for your property or asset.</p>
                <p class="ra-quote-label">We'll review:</p>
                <ul class="ra-hero-list">
                    <li>Photos of visible cracking</li>
                    <li>Foundation or slab concerns</li>
                    <li>Previous engineering reports (if available)</li>
                    <li>Property access and project requirements</li>
                </ul>
            </div>

            <div class="rx-quotation-page">
                <div class="rx-quotation-form-card ra-quote-card">
                    <h3>Get a Free Quote</h3>
                    <div class="rx-quotation-form">
                        <?php echo do_shortcode( '[rectify_hubspot_form portal_id="48201196" form_id="a1c00f4d-e08e-4d15-8916-d0cc2528f9c0" region="ap1"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

</article>

<script>
(function(){
    const base = {
        underpinPerLm: 850,
        slabLiftPerM2: 210,
        mobilisation: 1200,
        geotech: 1800
    };
    const multipliers = {
        severity: { minor: 0.9, moderate: 1, major: 1.25, severe: 1.55 },
        access: { easy: 0.95, standard: 1, tight: 1.15, veryTight: 1.3 },
        services: { none: 1, present: 1.08, congested: 1.18 },
        region: { metro: 1, regional: 1.12, remote: 1.25 }
    };
    const els = {
        foundation: document.getElementById('ra-foundation'),
        lengthField: document.getElementById('ra-length-field'),
        areaField: document.getElementById('ra-area-field'),
        length: document.getElementById('ra-length'),
        area: document.getElementById('ra-area'),
        severity: document.getElementById('ra-severity'),
        access: document.getElementById('ra-access'),
        services: document.getElementById('ra-services'),
        region: document.getElementById('ra-region'),
        geotech: document.getElementById('ra-geotech'),
        low: document.getElementById('ra-low'),
        high: document.getElementById('ra-high')
    };
    const money = (value) => new Intl.NumberFormat('en-AU', {
        style: 'currency',
        currency: 'AUD',
        maximumFractionDigits: 0
    }).format(value);
    const update = () => {
        if (!els.foundation) return;
        const foundation = els.foundation.value;
        const isPavement = foundation === 'pavement';
        els.lengthField.hidden = isPavement;
        els.areaField.hidden = !isPavement;

        const quantity = isPavement ? els.area.value : els.length.value;
        const isComplete = foundation && quantity && els.severity.value &&
            els.access.value && els.services.value && els.region.value;

        // Keep the Figma example range visible until the required estimator
        // inputs have been completed; never calculate from placeholder values.
        if (!isComplete) return;

        const length = Math.max(0, parseFloat(els.length.value) || 0);
        const area = Math.max(0, parseFloat(els.area.value) || 0);
        const mult = multipliers.severity[els.severity.value] *
            multipliers.access[els.access.value] *
            multipliers.services[els.services.value] *
            multipliers.region[els.region.value];
        const unit = isPavement ? base.slabLiftPerM2 * area : base.underpinPerLm * length;
        const subtotal = unit * mult + base.mobilisation;
        const total = els.geotech.checked ? subtotal + base.geotech : subtotal;
        const low = Math.max(0, total * 0.85);
        const high = total * 1.15;

        els.low.textContent = money(low);
        els.high.textContent = money(high);
    };
    Object.keys(els).forEach((key) => {
        const el = els[key];
        if (el && (el.tagName === 'INPUT' || el.tagName === 'SELECT')) {
            el.addEventListener('input', update);
            el.addEventListener('change', update);
        }
    });
    update();
})();
</script>
