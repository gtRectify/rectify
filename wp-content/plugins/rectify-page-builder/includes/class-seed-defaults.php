<?php
/**
 * Seed defaults: a snapshot of the CURRENT hardcoded homepage content,
 * transcribed into the block-builder shape.
 *
 * This is used ONLY to prefill the admin builder UI the first time an editor
 * opens it (via the "Load current content" button) - it is never
 * auto-saved to postmeta. Real titles/descriptions are used throughout so
 * the starting point in the builder matches what visitors see today.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * @return array List of block arrays: id, type, section_key, label, fields
 */
function rectify_pb_get_seed_blocks()
{
    return array(
        array(
            'id' => 'seed-hero',
            'type' => 'hero',
            'section_key' => 'hero',
            'label' => 'Hero',
            'fields' => array(
                'heading' => 'Structural Stabilisation Specialists',
                'kicker' => "Australia's Leading",
                'body' => 'From foundation movement and sinking slabs to complex ground improvement, Rectify delivers engineered solutions that restore stability, reduce risk and extend asset life. Trusted on 1,000+ completed projects across Australia.',
                'background_video_url' => 'https://www.rectify.com.au/wp-content/uploads/2024/10/heritagelift.mp4',
                'background_poster_image' => 'images/home/rectify-homepage-hero.webp',
                'cta_primary_text' => 'Book a free assessment',
                'cta_primary_url' => '/assessment/',
                'cta_secondary_text' => 'Get my cost estimate',
                'cta_secondary_url' => '/contact/',
                'testimonial_quote' => "Sam was extremely knowledgeable about the subject of walls and floors subsiding. He didn't try to sell me a solution, but instead...",
                'testimonial_name' => 'Geoff Collishaw',
                'testimonial_meta' => '4 days ago',
                'rating_text' => '4.9/5 average rating',
                'review_count_text' => '280+ reviews',
            ),
        ),

        array(
            'id' => 'seed-services',
            'type' => 'services-tabs',
            'section_key' => 'services',
            'label' => 'Core Services',
            'fields' => array(
                'kicker' => 'Core Services',
                'heading' => 'Engineered Solutions With Minimal Disruption',
                'lead' => 'Our specialists stabilise homes using proven techniques designed to address the cause of movement rather than simply hiding the symptoms.',
                'tab1_label' => 'Explore our services',
                'tab2_label' => 'Our Commercial Solutions',
                'items' => array(
                    array('icon' => 'service-cracked-walls', 'title' => 'Cracked Walls'),
                    array('icon' => 'service-sloping-slab', 'title' => 'Sloping Slab'),
                    array('icon' => 'service-jamming-doors-windows', 'title' => 'Jamming Doors & Windows'),
                    array('icon' => 'service-leaning-walls-gaps', 'title' => 'Leaning Walls & Gaps in Doors & Windows'),
                    array('icon' => 'service-leaning-pillars-chimneys', 'title' => 'Leaning Pillars & Chimneys'),
                    array('icon' => 'service-open-uneven-control-joints', 'title' => 'Open/Uneven Control Joints'),
                    array('icon' => 'service-weak-soils', 'title' => 'Weak Soils'),
                    array('icon' => 'service-erosion-control-sinkhole', 'title' => 'Erosion Control & Sinkhole Remediation'),
                ),
                'items_secondary' => array(
                    array('icon' => 'commercial-ground-improvement', 'title' => 'Ground Improvement', 'link_url' => '/commercial-solutions/ground-improvement/'),
                    array('icon' => 'commercial-void-filling', 'title' => 'Void Filling'),
                    array('icon' => 'commercial-realignment-levelling', 'title' => 'Re-Alignment & Levelling'),
                    array('icon' => 'commercial-leak-sealing', 'title' => 'Leak Sealing & Water Stopping'),
                    array('icon' => 'commercial-slab-lifting', 'title' => 'Slab Lifting'),
                    array('icon' => 'commercial-protective-coatings', 'title' => 'Protective Coatings & Concrete Repair'),
                    array('icon' => 'commercial-engineered-fill', 'title' => 'Engineered Fill'),
                    array('icon' => 'commercial-pipe-abandonment', 'title' => 'Pipe Abandonment'),
                    array('icon' => 'commercial-house-relevelling', 'title' => 'House Relevelling'),
                    array('icon' => 'commercial-slab-lifting-2', 'title' => 'Slab Lifting'),
                ),
            ),
        ),

        array(
            'id' => 'seed-signs',
            'type' => 'feature-list',
            'section_key' => 'signs',
            'label' => 'Do These Signs Look Familiar?',
            'fields' => array(
                'kicker' => '',
                'heading' => 'Do these signs look familiar?',
                'lead' => 'These problems are more common than you think.',
                'cta_text' => '',
                'cta_url' => '',
                'items' => array(
                    array('image' => 'images/home/jamming-doors.webp', 'label' => 'Jamming Doors'),
                    array('image' => 'images/home/craced-walls.webp', 'label' => 'Cracked Walls'),
                    array('image' => 'images/home/sloping-slab.webp', 'label' => 'Sloping Slab'),
                    array('image' => 'images/home/gaps-in-windows.webp', 'label' => 'Gaps in Windows'),
                    array('image' => 'images/home/control-joint.webp', 'label' => 'Uneven Joint'),
                    array('image' => 'images/home/horizontal-crack.webp', 'label' => 'Horizontal Crack'),
                ),
            ),
        ),

        array(
            'id' => 'seed-video',
            'type' => 'video-loop',
            'section_key' => 'video',
            'label' => 'Video',
            'fields' => array(
                'video_url' => content_url('uploads/2026/07/SOCIAL-RECTIFY.mp4'),
                'poster_image' => 0,
            ),
        ),

        array(
            'id' => 'seed-causes',
            'type' => 'feature-grid',
            'section_key' => 'causes',
            'label' => 'What Causes Structural Movement?',
            'fields' => array(
                'heading' => 'What Causes Structural Movement?',
                'lead' => 'Expert guidance, technical knowledge and practical advice to help homeowners, property managers and industry professionals make informed decisions about structural stability and asset performance.',
                'items' => array(
                    array('icon' => 'cause-reactive-soil', 'title' => 'Reactive Soil', 'description' => 'Clay soils expand and shrink as moisture levels change, causing movement beneath slabs and footings.'),
                    array('icon' => 'cause-water-leaks', 'title' => 'Water Leaks', 'description' => 'Broken stormwater, sewer and plumbing lines can soften the ground and reduce foundation support.'),
                    array('icon' => 'cause-ground-settlement', 'title' => 'Ground Settlement', 'description' => 'Poorly compacted or weak ground can compress over time and lead to uneven floors or cracks.'),
                    array('icon' => 'cause-trees-vegetation', 'title' => 'Trees & Vegetation', 'description' => 'Tree roots and landscaping can remove moisture from reactive soils and contribute to movement.'),
                ),
            ),
        ),

        array(
            'id' => 'seed-advantage',
            'type' => 'feature-grid',
            'section_key' => 'advantage',
            'label' => 'Why Homeowners Choose Rectify',
            'fields' => array(
                'kicker' => 'Our Advantage',
                'cta_text' => '',
                'cta_url' => '',
                'heading' => 'Why Homeowners Choose Rectify',
                'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative stabilisation technologies and a commitment to quality delivery across every project. The result is a trusted partner focused on reducing risk, restoring confidence and delivering lasting performance.",
                'items' => array(
                    array('icon' => 'adv-experience', 'title' => 'Unrivalled Experience', 'description' => 'Specialist crews, proven systems and experience across residential, commercial and civil assets.'),
                    array('icon' => 'adv-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'Resin injection solutions designed to limit excavation, mess and disruption.'),
                    array('icon' => 'adv-delivery', 'title' => 'Seamless Delivery', 'description' => 'Clear communication from first call through site report, levels and completion.'),
                    array('icon' => 'adv-affordable', 'title' => 'Affordable Solutions', 'description' => 'Practical options that help avoid unnecessary demolition or major reconstruction.'),
                    array('icon' => 'adv-quality', 'title' => 'Quality Assurance', 'description' => 'Performance is checked, recorded and verified with site reporting and levels.'),
                    array('icon' => 'adv-trustworthy', 'title' => 'Trustworthy Company', 'description' => 'A professional team focused on safe work, lasting results and client confidence.'),
                ),
            ),
        ),

        array(
            'id' => 'seed-performance-slider',
            'type' => 'image-slider',
            'section_key' => 'performance-slider',
            'label' => 'Engineered. Rectified. Performance Verified.',
            'fields' => array(
                'heading' => 'Engineered. Rectified. Performance Verified.',
                'lead' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
                'slides' => array(
                    array('image' => 'images/home/before-after-1.png', 'caption' => 'Before image of a cracked wall'),
                    array('image' => 'images/home/before-after-2.png', 'caption' => 'After image of a repaired wall'),
                    array('image' => 'images/home/before-after-3.png', 'caption' => 'After image of a repaired wall'),
                    array('image' => 'images/home/before-after-4.png', 'caption' => 'After image of a repaired wall'),
                    array('image' => 'images/home/before-after-5.png', 'caption' => 'After image of a repaired wall'),
                ),
            ),
        ),

        array(
            'id' => 'seed-reputation',
            'type' => 'image-text',
            'section_key' => 'reputation',
            'label' => 'A Reputation Built On Results',
            'fields' => array(
                'heading' => 'A Reputation Built On Results',
                'copy' => 'Our team is trusted by clients, builders and property partners.',
                'image' => 0,
                'cta_text' => 'Read our Google reviews',
                'cta_url' => '#reviews',
            ),
        ),

        array(
            'id' => 'seed-customers',
            'type' => 'logo-slider',
            'section_key' => 'customers',
            'label' => 'Our Happy Customers',
            'fields' => array(
                'heading' => 'Our Happy Customers',
                'lead' => 'We work with homeowners, engineers, builders, facilities managers and asset owners.',
                'logos' => array(
                    array('image' => 'images/customer-logos/swan-hill.jpg', 'alt' => 'swan-hill.jpg'),
                    array('image' => 'images/customer-logos/MBCM.png', 'alt' => 'MBCM.png'),
                    array('image' => 'images/customer-logos/A1-Precision.jpg', 'alt' => 'A1-Precision.jpg'),
                    array('image' => 'images/customer-logos/City-of-Whittlesea.png', 'alt' => 'City-of-Whittlesea.png'),
                    array('image' => 'images/customer-logos/property-consultant-logo-design.jpg', 'alt' => 'property-consultant-logo-design.jpg'),
                ),
            ),
        ),

        array(
            'id' => 'seed-faqs',
            'type' => 'accordion',
            'section_key' => 'faqs',
            'label' => "The Homeowner's Guide To Structural Movement",
            'fields' => array(
                'heading' => "The Homeowner's Guide To Structural Movement",
                'lead' => "Understand the warning signs, discover the causes and learn what steps you can take to protect your home's long-term stability.",
                'image' => 'images/home/resources-image.webp',
                'items' => array(
                    array('question' => 'Why can my house crack?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'Why are my floors uneven?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'Are cracks getting worse?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'Is foundation movement dangerous?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'How much does remediation cost?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'How do I know which contractor to trust?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'Can this affect resale value?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                    array('question' => 'Will repairs damage my home or garden?', 'answer' => 'Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.'),
                ),
            ),
        ),

        array(
            'id' => 'seed-case-studies',
            'type' => 'feature-grid',
            'section_key' => 'case-studies',
            'label' => 'Real Projects. Real Results.',
            'fields' => array(
                'kicker' => 'Featured Case Studies',
                'heading' => 'Real Projects. Real Results.',
                'lead' => 'See how our team delivers practical, verified outcomes across homes, buildings and assets.',
                'cta_text' => 'View all case studies',
                'cta_url' => '/projects/',
                'items' => array(
                    array('icon' => '', 'image' => 'images/home/article_1.png', 'title' => 'RESIDENTIAL CASE STUDY', 'description' => 'Sinkhole Remediation Explained: Early Warning Signs and How to Fix Them'),
                    array('icon' => '', 'image' => 'images/home/article_2.png', 'title' => 'INFRASTRUCTURE CASE STUDY', 'description' => 'Government Infrastructure Maintenance Solutions for Ground Stability and Structural Remediation'),
                    array('icon' => '', 'image' => 'images/home/article_3.png', 'title' => 'COMMERCIAL CASE STUDY', 'description' => 'Void Filling Under Concrete: How Engineered Fill Solutions Prevent Long-Term Damage'),
                ),
            ),
        ),

        array(
            'id' => 'seed-map',
            'type' => 'raw-map',
            'section_key' => 'map',
            'label' => 'Delivering Results Across Australia',
            'fields' => array(),
        ),

        array(
            'id' => 'seed-partners',
            'type' => 'logo-slider',
            'section_key' => 'partners',
            'label' => 'Our Satisfied Partners',
            'fields' => array(
                'heading' => 'Our Satisfied Partners',
                'lead' => 'Trusted by organisations, builders and infrastructure partners across Australia.',
                'logos' => array(
                    array('image' => 'images/rectify-logo-placeholder.jpg', 'alt' => 'rectify-logo-placeholder.jpg'),
                    array('image' => 'images/rectify-logo-placeholder.jpg', 'alt' => 'rectify-logo-placeholder.jpg'),
                    array('image' => 'images/rectify-logo-placeholder.jpg', 'alt' => 'rectify-logo-placeholder.jpg'),
                    array('image' => 'images/rectify-logo-placeholder.jpg', 'alt' => 'rectify-logo-placeholder.jpg'),
                    array('image' => 'images/rectify-logo-placeholder.jpg', 'alt' => 'rectify-logo-placeholder.jpg'),
                ),
            ),
        ),

        array(
            'id' => 'seed-resources',
            'type' => 'image-text',
            'section_key' => 'resources',
            'label' => 'Resources Strip',
            'fields' => array(
                'heading' => '',
                'copy' => '',
                'image' => 'images/home/TruckandVanathouse.jpg',
                'cta_text' => '',
                'cta_url' => '',
            ),
        ),

        array(
            'id' => 'seed-social',
            'type' => 'feature-grid',
            'section_key' => 'social',
            'label' => 'Structural Insights & Resources',
            'fields' => array(
                'kicker' => 'FEATURED NEWS & INSIGHTS',
                'heading' => 'Structural Insights & Resources',
                'lead' => 'Expert guidance, technical knowledge and practical advice to help homeowners, property managers and industry professionals make informed decisions about structural stability and asset performance.',
                'cta_text' => 'READ MORE NEWS & INSIGHTS',
                'cta_url' => '#',
                'items' => array(
                    array('icon' => '', 'image' => 'images/home/Wall-with-prop7.jpg', 'title' => '', 'description' => 'FAQs before getting house chemically underpinnfed'),
                    array('icon' => '', 'image' => 'images/home/Wall-with-prop7.jpg', 'title' => '', 'description' => 'How to know if the crack is serious'),
                    array('icon' => '', 'image' => 'images/home/Wall-with-prop7.jpg', 'title' => '', 'description' => 'Pre-winter home checklist'),
                    array('icon' => '', 'image' => 'images/home/Wall-with-prop7.jpg', 'title' => '', 'description' => 'Pre-sale property checklist'),
                ),
            ),
        ),

        array(
            'id' => 'seed-follow',
            'type' => 'feature-list',
            'section_key' => 'follow',
            'label' => 'Follow Our Latest Projects & Insights',
            'fields' => array(
                'kicker' => 'FOLLOW OUR SOCIALS test',
                'heading' => 'Follow Our Latest Projects & Insights',
                'lead' => 'Stay up to date with project transformations, industry knowledge, behind-the-scenes updates and the solutions helping protect and restore assets across Australia.',
                'cta_text' => 'READ MORE NEWS & INSIGHTS',
                'cta_url' => '#',
                'items' => array(
                    array('image' => 'images/home/follow2.png', 'label' => 'follow2.png'),
                    array('image' => 'images/home/follow1.png', 'label' => 'follow1.png'),
                    array('image' => 'images/home/follow3.png', 'label' => 'follow3.png'),
                    array('image' => 'images/home/follow4.png', 'label' => 'follow4.png'),
                    array('image' => 'images/home/follow5.png', 'label' => 'follow5.png'),
                    array('image' => 'images/home/follow6.png', 'label' => 'follow6.png'),
                    array('image' => 'images/home/follow7.png', 'label' => 'follow7.png'),
                    array('image' => 'images/home/follow8.png', 'label' => 'follow8.png'),
                ),
            ),
        ),

        array(
            'id' => 'seed-homepage-faq',
            'type' => 'homepage-faq',
            'section_key' => 'homepage-faq',
            'label' => 'Frequently Asked Questions',
            'fields' => array(
                'heading' => 'Frequently Asked Questions',
                'items' => array(
                    array('question' => 'What causes wall cracks?', 'answer' => 'Wall cracks are often caused by foundation movement rather than problems with the walls themselves. In Australia, reactive clay soils can expand during wet periods and shrink during dry conditions, causing foundations to move. Other common causes include soil settlement, poor drainage, leaking pipes, tree roots, and natural building movement over time.'),
                    array('question' => 'Can cracked walls be repaired?', 'answer' => 'Yes. The right repair depends on what caused the cracking. Where foundation movement is involved, the underlying ground or foundation should be stabilised before the wall is repaired cosmetically so the result is more reliable and long lasting.'),
                    array('question' => 'What is foundation settlement?', 'answer' => 'Foundation settlement is the downward movement of a building foundation as the supporting soil compresses, shrinks, erodes, or loses strength. Uneven, or differential, settlement can lead to wall cracks, sticking doors and windows, and sloping floors.'),
                    array('question' => 'How does polyurethane resin injection work?', 'answer' => 'Small access holes are drilled and expanding polyurethane resin is injected beneath the foundation or slab. The resin fills voids and strengthens weak ground; in suitable conditions, controlled injection can also gently lift and re-level settled concrete.'),
                    array('question' => 'Is chemical underpinning permanent?', 'answer' => 'Chemical underpinning is designed as a long-term stabilisation solution when the cause of movement is correctly diagnosed and the treatment is suited to the site. Ongoing drainage, plumbing, and moisture issues should also be addressed to protect the result.'),
                    array('question' => 'How much does foundation repair cost?', 'answer' => 'Foundation repair costs vary with the cause and extent of movement, the area requiring treatment, site access, and the repair method. A site assessment is needed before an accurate scope and quotation can be provided.'),
                    array('question' => 'Can sinking concrete be lifted?', 'answer' => 'Often, yes. Slab lifting can inject expanding material beneath sunken concrete to fill voids, restore support, and carefully raise the slab. Suitability depends on the condition of the concrete and the ground beneath it.'),
                    array('question' => 'What causes uneven floors?', 'answer' => 'Uneven floors can result from foundation settlement, changing soil moisture, poor drainage, leaking pipes, erosion, or movement in subfloor supports. An inspection helps distinguish structural movement from a local flooring or framing issue.'),
                    array('question' => 'When should I repair foundation movement?', 'answer' => 'Arrange an assessment when cracks are widening, doors or windows begin sticking, floors become uneven, or gaps appear around walls and frames. Early investigation can limit further movement and help avoid more extensive repairs.'),
                    array('question' => 'Is structural movement dangerous?', 'answer' => 'Structural movement is not always immediately dangerous, but progressive or significant movement can affect safety and building performance. Rapid changes, large cracks, leaning walls, or sudden floor movement should be assessed promptly by a qualified professional.'),
                    array('question' => 'How long does underpinning take?', 'answer' => 'Many residential chemical underpinning projects can be completed within several days, while larger or more complex sites may take longer. The method, treatment area, access, and site conditions all affect the programme.'),
                    array('question' => 'What is slab lifting?', 'answer' => 'Slab lifting is the controlled re-levelling of sunken concrete by injecting material beneath it. The process fills underlying voids, restores support, and raises the slab with less disruption than removing and replacing the concrete.'),
                    array('question' => 'How do I know if my foundations are failing?', 'answer' => 'Common warning signs include new or widening wall cracks, sticking doors and windows, sloping or uneven floors, gaps around frames, and separation between walls, ceilings, or external features. A professional assessment is needed to confirm the cause.'),
                ),
            ),
        ),

        // array(
        //     'id' => 'seed-team',
        //     'type' => 'image-text',
        //     'section_key' => 'team',
        //     'label' => 'Meet Our Highly Experienced Team',
        //     'fields' => array(
        //         'heading' => 'Meet our Highly Experienced Team',
        //         'copy' => '',
        //         'image' => 'images/home/team.webp',
        //         'cta_text' => 'See all team members',
        //         'cta_url' => '/about-us/meet-the-team/',
        //     ),
        // ),

        array(
            'id' => 'seed-questions',
            'type' => 'feature-grid',
            'section_key' => 'questions',
            'label' => 'Still Have Questions?',
            'fields' => array(
                'heading' => 'Still Have Questions?',
                'lead' => 'Talk with our team about your cracking, uneven floors or structural movement concerns. We will help you understand what is happening and what to do next.',
                'items' => array(
                    array('icon' => 'icon-house-red', 'title' => 'Call Us', 'description' => 'Speak with our friendly team for advice and next steps.', 'link_text' => '1300 301 319', 'link_url' => 'tel:1300301319'),
                    array('icon' => 'icon-house-red', 'title' => 'Book an Assessment', 'description' => 'Arrange a property assessment and receive practical recommendations.', 'link_text' => 'Book online →', 'link_url' => '/contact/'),
                    array('icon' => 'icon-house-red', 'title' => 'Explore Projects', 'description' => 'Review real examples of structural stabilisation and asset support.', 'link_text' => 'View projects →', 'link_url' => '/projects/'),
                ),
            ),
        ),

        array(
            'id' => 'seed-final-cta',
            'type' => 'cta',
            'section_key' => 'final-cta',
            'label' => 'Noticed Cracks, Uneven Floors or Structural Movement?',
            'fields' => array(
                'heading' => 'Noticed Cracks, Uneven Floors or Structural Movement?',
                'button_text' => 'Request a quote',
                'button_url' => '/contact/',
                'phone_number' => '1300 301 319',
            ),
        ),
    );
}

/**
 * Seed content for the "Residential Solutions" hub page (ID 929, slug
 * 'residential'), transcribed from the CURRENT hardcoded default
 * arrays in template-parts/content-residential-solutions.php (its ACF field
 * group is registered but every field is currently empty on that page, so
 * these hardcoded defaults are exactly what visitors see today).
 *
 * @return array
 */
function rectify_pb_get_residential_seed_blocks()
{
    return array(
        array(
            'id' => 'seed-residential-hero',
            'type' => 'residential-hero',
            'section_key' => 'residential-hero',
            'label' => 'Hero',
            'fields' => array(
                'eyebrow' => 'Residential',
                'title' => 'Residential Solutions',
                'heading' => 'Protect Your Home with Long-Term Structural Confidence',
                'copy' => 'Your home is one of your most valuable investments, and when signs of foundation movement begin to appear, acting early can prevent more extensive structural damage. Cracks in walls, uneven floors, sticking doors and windows, or sinking concrete are often symptoms of movement beneath the structure, not just cosmetic issues.',
                'image' => 'images/residential/residential-hero-strip.jpg',
            ),
        ),

        array(
            'id' => 'seed-residential-intro',
            'type' => 'residential-intro',
            'section_key' => 'residential-intro',
            'label' => 'Intro',
            'fields' => array(
                'eyebrow' => '',
                'title' => 'We provide engineering-led residential solutions',
                'copy' => "Designed to stabilise foundations, improve ground conditions, and restore structural performance with minimal disruption to your property. Rather than treating the visible symptoms, we address the underlying cause using proven ground engineering and structural remediation techniques. This aligns with Rectify's positioning as an engineering-led structural stabilisation specialist delivering long-term asset performance rather than cosmetic repairs.",
                'image' => 'images/residential/residential-intro.jpg',
            ),
        ),

        array(
            'id' => 'seed-residential-solutions-grid',
            'type' => 'residential-solutions-grid',
            'section_key' => 'residential-solutions-grid',
            'label' => 'Residential Solutions We Offer',
            'fields' => array(
                'eyebrow' => '',
                'heading' => 'Residential Solutions We Offer',
                'lead' => '',
                'items' => array(
                    array(
                        'icon' => 'res-chemical-underpinning',
                        'title' => 'Chemical Underpinning',
                        'description' => 'Advanced ground stabilisation without major excavation.',
                        'point_title' => 'Benefits:',
                        'points_text' => "Minimal excavation\nFast installation\nReduced disruption\nPrecision lifting where appropriate",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/chemical-underpinning/',
                    ),
                    array(
                        'icon' => 'res-foundation-repair',
                        'title' => 'Foundation Repair',
                        'description' => 'Address structural issues before they become costly.',
                        'point_title' => 'Common signs include:',
                        'points_text' => "Wall cracking\nSloping floors\nDoors and windows sticking\nSeparation around walls or ceilings",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/foundation-repair/',
                    ),
                    array(
                        'icon' => 'res-slab-lifting',
                        'title' => 'Slab Lifting',
                        'description' => 'Restore sunken concrete slabs with precision.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Internal floor slabs\nGarage slabs\nOutdoor concrete slabs\nPathways",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/slab-lifting-slab-jacking/',
                    ),
                    array(
                        'icon' => 'res-house-relevelling',
                        'title' => 'House Relevelling',
                        'description' => "Restore your home's level and structural performance.",
                        'point_title' => 'Helps resolve:',
                        'points_text' => "Sloping floors\nStructural distortion\nMisaligned doors and windows\nOngoing foundation movement",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/house-relevelling/',
                    ),
                    array(
                        'icon' => 'res-driveway-relevelling',
                        'title' => 'Driveway Relevelling',
                        'description' => 'Improve safety, appearance and functionality.',
                        'point_title' => 'Benefits:',
                        'points_text' => "Improved safety\nBetter water drainage\nEnhanced street appeal\nExtended concrete lifespan",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/driveway-relevelling/',
                    ),
                    array(
                        'icon' => 'res-brick-fence-relevelling',
                        'title' => 'Mailbox & Brick Fence Relevelling',
                        'description' => 'Restore stability without unnecessary rebuilding.',
                        'point_title' => 'Ideal for:',
                        'points_text' => "Leaning brick fences\nSunken letterboxes\nBoundary wall movement\nMasonry settlement",
                        'link_text' => 'Learn More',
                        'link_url' => '/mailbox-brick-fence-releveling/',
                    ),
                    array(
                        'icon' => 'res-heritage-building',
                        'title' => 'Basement Construction Support',
                        'description' => 'Build on stronger, more stable ground.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "New basement construction\nSites with unstable ground conditions\nGround stabilisation\nImproving foundation performance",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/basement-construction-support/',
                    ),
                    array(
                        'icon' => 'res-sand-permeation',
                        'title' => 'Sand Permeation',
                        'description' => 'Improve weak or loose ground conditions.',
                        'point_title' => 'Applications:',
                        'points_text' => "Weak or loose soils\nFoundation support\nErosion control\nGround improvement",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/sand-permeation/',
                    ),
                    array(
                        'icon' => 'res-ground-improvement',
                        'title' => 'Ground Improvement',
                        'description' => 'Strengthen the ground before problems develop.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Poor soil conditions\nFoundation support\nResidential extensions\nAreas prone to settlement",
                        'link_text' => 'Learn More',
                        'link_url' => '/residential/ground-improvement/',
                    ),
                ),
            ),
        ),

        array(
            'id' => 'seed-residential-why',
            'type' => 'residential-why',
            'section_key' => 'residential-why',
            'label' => 'Why Choose Rectify',
            'fields' => array(
                'heading' => 'Why Choose Rectify',
                'lead' => '',
                'items' => array(
                    array('icon' => 'res-proven-techniques', 'title' => 'Proven Techniques, Experienced Team', 'description' => 'Established methods in void fill, soil consolidation and controlled lift, delivered by specialists.'),
                    array('icon' => 'res-low-impact', 'title' => 'Low-impact Delivery', 'description' => 'Small injection points, tidy reinstatement and minimal interruption to operations.'),
                    array('icon' => 'res-engineering-assurance', 'title' => 'Engineering Assurance', 'description' => 'Site-specific designs, monitored injection and clear QA verification records.'),
                ),
            ),
        ),

        array(
            'id' => 'seed-residential-cta',
            'type' => 'residential-cta',
            'section_key' => 'residential-cta',
            'label' => 'Not Sure Which Solution You Need?',
            'fields' => array(
                'heading' => 'Not Sure Which Solution You Need?',
                'copy' => "Every home is different, and the visible signs of damage do not always reveal the underlying cause. Our specialists can assess your property's condition, identify the source of foundation movement, and recommend the most appropriate engineered solution for your home.",
                'image' => 0,
                'primary_text' => 'Contact Us',
                'primary_url' => '/contact/',
                'phone_text' => '1800 18 20 20',
                'phone_url' => 'tel:1800182020',
                'email_text' => 'admin@rectify.com.au',
                'email_url' => 'mailto:admin@rectify.com.au',
            ),
        ),
    );
}

/**
 * Seed content for the "Commercial Solutions" hub page (ID 7505, slug
 * 'commercial-solutions'), transcribed from the hardcoded default arrays in
 * template-parts/content-commercial-solutions.php - unlike Residential
 * Solutions, this page has no ACF field group at all, so these hardcoded
 * defaults are the only content that has ever existed for it.
 *
 * @return array
 */
function rectify_pb_get_commercial_seed_blocks()
{
    return array(
        array(
            'id' => 'seed-commercial-hero',
            'type' => 'residential-hero',
            'section_key' => 'commercial-hero',
            'label' => 'Hero',
            'fields' => array(
                'eyebrow' => 'COMMERCIAL',
                'title' => 'Commercial Solutions',
                'heading' => 'Engineering Solutions for Critical Assets and Essential Infrastructure',
                'copy' => 'Rectify partners with asset owners, Tier 1 contractors, engineers, government agencies, and facility managers to deliver engineered structural stabilisation, ground improvement, and asset remediation solutions. Our non-invasive technologies and engineering-led approach restore performance while minimising disruption to operations, occupants, and surrounding infrastructure.',
                'image' => 'images/commercial-archive/hero.jpg',
            ),
        ),

        array(
            'id' => 'seed-commercial-intro',
            'type' => 'residential-intro',
            'section_key' => 'commercial-intro',
            'label' => 'Intro',
            'fields' => array(
                'eyebrow' => '',
                'title' => 'Engineering-Led Solutions for Complex Commercial Projects',
                'copy' => "Rectify delivers specialised commercial solutions that address the underlying causes of structural movement, ground instability, void formation, and concrete deterioration—not just the visible symptoms. Our integrated capabilities span structural stabilisation, ground engineering, and asset remediation, enabling us to solve complex challenges across commercial buildings, industrial facilities, utilities, transport infrastructure, marine assets, and public infrastructure.\n\nEvery solution is supported by detailed engineering assessment, proven remediation technologies, and a commitment to delivering measurable, long-term performance outcomes. Whether the project involves strengthening foundations, filling underground voids, stabilising weak ground, repairing deteriorated concrete, or extending the service life of critical infrastructure, our focus remains the same: reducing risk, minimising disruption, and protecting valuable assets for the future.",
                'image' => 'images/commercial-archive/intro.jpg',
            ),
        ),

        array(
            'id' => 'seed-commercial-solutions-grid',
            'type' => 'residential-solutions-grid',
            'section_key' => 'commercial-solutions-grid',
            'label' => 'Commercial Solutions We Offer',
            'fields' => array(
                'eyebrow' => '',
                'heading' => 'Commercial Solutions We Offer',
                'lead' => '',
                'items' => array(
                    array(
                        'icon' => 'commercial-ground-improvement',
                        'title' => 'Ground Improvement',
                        'description' => 'Strengthening and stabilising weak or variable ground conditions to support long-term asset performance.',
                        'point_title' => 'Benefits:',
                        'points_text' => "Improves ground stability\nIncreases load capacity\nReduces ground movement\nStrengthens weak soils",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/ground-improvement/',
                    ),
                    array(
                        'icon' => 'commercial-realignment-levelling',
                        'title' => 'Re-alignment & Levelling',
                        'description' => 'Correcting structural movement and restoring alignment with precision-engineered lifting solutions.',
                        'point_title' => 'Benefits:',
                        'points_text' => "Restores structural alignment\nCorrects uneven floors\nRe-levels settled structures\nMinimises operational disruption",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/realignment-levelling/',
                    ),
                    array(
                        'icon' => 'commercial-slab-lifting',
                        'title' => 'Slab Lifting',
                        'description' => 'Re-levelling sunken concrete slabs with minimal disruption to operations and surrounding assets.',
                        'point_title' => 'Ideal for:',
                        'points_text' => "Sunken concrete slabs\nWarehouse floors\nLoading docks\nExternal pavements",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/slab-lifting/',
                    ),
                    array(
                        'icon' => 'commercial-engineered-fill',
                        'title' => 'Engineered Fill',
                        'description' => 'Filling voids and improving subsurface conditions to enhance structural stability and load capacity.',
                        'point_title' => 'Ideal for:',
                        'points_text' => "Subsurface voids\nWeak foundation soils\nGround consolidation\nStructural support",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/engineered-fill/',
                    ),
                    array(
                        'icon' => 'commercial-void-filling',
                        'title' => 'Void Filling',
                        'description' => 'Eliminating underground voids that threaten structural integrity, safety, and operational continuity.',
                        'point_title' => 'Benefits:',
                        'points_text' => "Eliminates underground voids\nRestores ground support\nReduces settlement risk\nMinimises disruption",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/void-filling/',
                    ),
                    array(
                        'icon' => 'commercial-leak-sealing',
                        'title' => 'Leak Sealing & Water Stopping',
                        'description' => 'Controlling water ingress through engineered sealing systems that protect structures and critical assets.',
                        'point_title' => 'Ideal for:',
                        'points_text' => "Basements\nLift pits\nConcrete joints\nUnderground structures",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/leak-sealing-water-stopping/',
                    ),
                    array(
                        'icon' => 'commercial-protective-coatings',
                        'title' => 'Protective Coatings & Concrete Repair',
                        'description' => 'Restoring durability and extending asset life through specialised repair and protection systems.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Cracked concrete\nCorroded structures\nChemical exposure\nSurface deterioration",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/protective-coatings-concrete-repair/',
                    ),
                    array(
                        'icon' => 'commercial-pipe-abandonment',
                        'title' => 'Pipe Abandonment',
                        'description' => 'Safe and compliant decommissioning of underground assets using engineered filling and stabilisation methods.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Decommissioned pipelines\nUnderground service pipes\nStormwater systems\nUtility infrastructure",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/pipe-abandonment/',
                    ),
                    array(
                        'icon' => 'commercial-preventative-ground-improvement',
                        'title' => 'Ground Improvement',
                        'description' => 'Strengthen the ground before problems develop.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Weak ground conditions\nFoundation support\nSettlement-prone sites\nLoad-bearing enhancement",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/ground-improvement/',
                    ),
                    array(
                        'icon' => 'commercial-civil-energy-utilities',
                        'title' => 'Civil, Energy and Utilities',
                        'description' => 'Specialised structural remediation and ground engineering solutions that protect critical infrastructure, reduce risk, and minimise operational disruption.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Roads and pavements\nUtility infrastructure\nEnergy facilities\nCivil assets",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/civil-energy-utilities-sector/',
                    ),
                    array(
                        'icon' => 'commercial-hospital-remediation',
                        'title' => 'Hospital Asset Remediation',
                        'description' => 'Engineered remediation solutions that restore structural performance while maintaining safety, compliance, and operational continuity.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Hospitals\nHealthcare facilities\nPlant rooms\nCritical infrastructure",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/hospital-asset-remediation/',
                    ),
                    array(
                        'icon' => 'commercial-undermining-treatment',
                        'title' => 'Underminning Treatment',
                        'description' => 'Stabilising ground affected by erosion and subsurface voids to protect structures from ongoing movement and settlement.',
                        'point_title' => 'Suitable for:',
                        'points_text' => "Erosion voids\nUndermined foundations\nRetaining structures\nSettlement-prone areas",
                        'link_text' => 'Learn More',
                        'link_url' => '/commercial-solutions/undermining-treatment/',
                    ),
                ),
            ),
        ),

        array(
            'id' => 'seed-commercial-why',
            'type' => 'commercial-help',
            'section_key' => 'commercial-help',
            'label' => 'Need Help Choosing the Right Solution?',
            'fields' => array(
                'heading' => 'Need Help Choosing the Right Solution?',
                'lead' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
                'items' => array(
                    array('icon' => 'commercial-call-expert', 'title' => 'Call Us', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone_text' => '1800 18 20 20', 'phone_url' => 'tel:1800182020', 'link_text' => '', 'link_url' => ''),
                    array('icon' => 'commercial-estimate-project-cost', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'phone_text' => '', 'phone_url' => '', 'link_text' => 'Get My Cost Estimate', 'link_url' => '/cost-calculator/'),
                    array('icon' => 'commercial-explore-resources', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'phone_text' => '', 'phone_url' => '', 'link_text' => 'Explore Resources', 'link_url' => '/resources/'),
                ),
            ),
        ),

        array(
            'id' => 'seed-commercial-cta',
            'type' => 'residential-cta',
            'section_key' => 'commercial-cta',
            'label' => 'Not Sure Which Solution You Need?',
            'fields' => array(
                'heading' => 'Not Sure Which Solution You Need?',
                'copy' => "Every home is different, and the visible signs of damage don't always reveal the underlying cause. Our specialists can assess your property's condition, identify the source of foundation movement, and recommend the most appropriate engineered solution for your home.",
                'image' => 0,
                'primary_text' => 'Contact Us',
                'primary_url' => '/contact/',
                'phone_text' => '1800 18 20 20',
                'phone_url' => 'tel:1800182020',
                'email_text' => 'admin@rectify.com.au',
                'email_url' => 'mailto:admin@rectify.com.au',
            ),
        ),
    );
}

/**
 * Seed content for the "Civil, Energy & Utilities Infrastructure Repair &
 * Ground Stabilisation" page (post ID 1010, child of Commercial Solutions),
 * transcribed verbatim from template-parts/commercial-solutions/content-civil-energy-utilities-sector.php
 * (100% hardcoded, no ACF backing).
 *
 * @return array
 */
function rectify_pb_get_civil_seed_blocks()
{
    return array(
        array('id' => 'seed-civil-hero', 'type' => 'solutions-child-hero', 'section_key' => 'civil-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Commercial Solutions',
            'title' => 'Civil, Energy & Utilities Infrastructure Repair & Ground Stabilisation',
        )),

        array('id' => 'seed-civil-intro', 'type' => 'solutions-intro-band', 'section_key' => 'civil-intro', 'label' => 'Intro', 'fields' => array(
            'lede' => 'Stabilise ground, stop water, protect concrete, and manage redundant services—safely, efficiently, and with minimal disruption to live assets and the public.',
            'copy' => 'Rectify Group delivers integrated remediation for civil infrastructure, energy facilities, and utility networks. Our methods are non-destructive, fast to deploy, and engineered to restore function while limiting shutdowns.',
            'related_label' => '',
            'related_text' => '',
            'related_url' => '',
            'image' => 'images/civil-energy-utilities/intro.png',
        )),

        array('id' => 'seed-civil-where-help', 'type' => 'civil-where-help', 'section_key' => 'civil-where-help', 'label' => 'Where We Help', 'fields' => array(
            'heading' => 'Where We Help',
            'items' => array(
                array('icon' => 'civil-figma-transport', 'title' => 'Civil and Transport', 'items_text' => "Road/Bridge Approaches\nPavements\nCulverts\nRetaining Structures\nEmbankments\nTunnels\nPorts\nAirports"),
                array('icon' => 'civil-figma-energy', 'title' => 'Energy', 'items_text' => "Power Stations\nTurbine Bases\nSwitchyards/Substations\nTransformer Bunds\nCable Trenches"),
                array('icon' => 'civil-figma-utilities-water', 'title' => 'Utilities and Water', 'items_text' => "Treatment Plants\nPump Stations\nRising Mains\nManholes\nService Corridors\nReservoirs and Tanks"),
            ),
        )),

        array('id' => 'seed-civil-capabilities', 'type' => 'civil-capabilities', 'section_key' => 'civil-capabilities', 'label' => 'Core Capabilities', 'fields' => array(
            'heading' => 'Core Capabilities',
            'items' => array(
                array(
                    'number' => '1',
                    'title' => 'PU Ground Remediation (Void Fill, Bearing Improvement, Controlled Lift)',
                    'symptoms_label' => 'Typical symptoms:',
                    'symptoms' => 'Settlement at approaches and slabs, pumping/voids, loss of falls, rocking panels, racking of structures.',
                    'steps_text' => "Inject site-specific polyurethane resin to fill voids, bind loose material and compact weak zones.\nApply controlled lift in micro-increments to re-establish levels, tolerances, and drainage falls.\nTargeted injections at shallow or deeper horizons depending on subgrade and fill conditions.",
                    'tags_label' => 'Deliverables:',
                    'tags_text' => "Level surveys before/after\nVolumes/pressures\nInjection Maps\nQA records",
                    'image' => 'images/civil-energy-utilities/capability-ground-remediation.png',
                ),
                array(
                    'number' => '2',
                    'title' => 'Water Stopping & Protective Coatings',
                    'symptoms_label' => 'Typical symptoms:',
                    'symptoms' => 'Infiltration/exfiltration at joints and penetrations, active leaks, dampness/efflorescence, coating failure, corrosion risk.',
                    'steps_text' => "Leak sealing injection (PU or micro-cement) at cracks, joints, wall–slab interfaces, penetrations.\nCurtains/cut-offs behind walls and culverts to control inflows in granular or fractured ground.\nNegative/positive-side waterproofing, anti-carbonation and chemical-resistant coatings for basins, channels and bunds.",
                    'tags_label' => '',
                    'tags_text' => '',
                    'image' => 'images/civil-energy-utilities/capability-water-stopping.png',
                ),
                array(
                    'number' => '3',
                    'title' => 'Cellular Concrete Bulk Fill (Permanent or Temporary)',
                    'symptoms_label' => 'Use cases:',
                    'symptoms' => 'Trench and shaft backfill, annular/void infill, sinkhole stabilisation, redundant chamber fill, ground lowering mitigation, temporary works that must be excavatable.',
                    'steps_text' => "Pump low-density cellular concrete to create lightweight, uniformly bearing fill over large volumes with minimal access.\nChoose densities for permanent structural fill or temporary backfill that is later easy to re-excavate.",
                    'tags_label' => 'Benefits:',
                    'tags_text' => "Fast Placement\nLow Lateral Pressure\nExcellent Flow into Complex Voids\nReduced Truck Movements",
                    'image' => 'images/civil-energy-utilities/capability-cellular-concrete.png',
                ),
                array(
                    'number' => '4',
                    'title' => 'Service Abandonment (Pipes, Culverts, Tanks, Conduits)',
                    'symptoms_label' => 'Drivers:',
                    'symptoms' => 'Redundancy, safety, environmental compliance, leak risk, future earthworks.',
                    'steps_text' => "Design abandonment via cementitious grout or cellular concrete to completely fill internal volumes and prevent collapse or migration.\nSeal ends/penetrations, provide caps and markers, and produce as-built documentation for records.",
                    'tags_label' => 'Typical Assets:',
                    'tags_text' => "Stormwater Culverts\nSewer/Storm Mains\nFuel Lines\nProcess Lines\nRedundant Tanks and Ducts",
                    'image' => 'images/civil-energy-utilities/capability-service-abandonment.png',
                ),
            ),
        )),

        array('id' => 'seed-civil-process', 'type' => 'solutions-process', 'section_key' => 'civil-process', 'label' => 'Our Delivery Process', 'fields' => array(
            'heading' => 'Our Delivery Process',
            'items' => array(
                array('number' => '01', 'title' => 'Investigate & Plan', 'description' => 'Level/permeability checks, void mapping, materials/ground assessment, access and staging plan to keep assets operational.', 'points_text' => ''),
                array('number' => '02', 'title' => 'Design & Treat', 'description' => 'Select resin/grout/coating systems, define horizons and injection grids, set QA/ITP.', 'points_text' => ''),
                array('number' => '03', 'title' => 'Control & Monitor', 'description' => 'Micro-increment lift, pressure/volume control, leak-sealing verification, coating QA.', 'points_text' => ''),
                array('number' => '04', 'title' => 'Verify & Document', 'description' => 'Before/after levels, permeability/flow reduction where applicable, coating DFT/adhesion (if specified), as-built maps and close-out report.', 'points_text' => ''),
            ),
        )),

        array('id' => 'seed-civil-benefits', 'type' => 'solutions-benefits', 'section_key' => 'civil-benefits', 'label' => 'Benefits for Asset Owners and Operators', 'fields' => array(
            'heading' => 'Benefits for Asset Owners and Operators',
            'image' => 'images/civil-energy-utilities/benefits.png',
            'items' => array(
                array('title' => 'Minimal Shutdowns', 'description' => 'Many areas stay live; rapid-cure materials enable same-day traffic/load in typical zones.'),
                array('title' => 'Non-invasive', 'description' => 'Small injection points and tidy workfaces—no bulk demolition.'),
                array('title' => 'Predictable Outcomes', 'description' => 'Monitored lift, measurable leak reduction, documented QA.'),
                array('title' => 'Program Certainty', 'description' => 'Pre-treat risks to avoid mid-construction delays and rework.'),
            ),
        )),

        array('id' => 'seed-civil-why', 'type' => 'commercial-inner-why-cards', 'section_key' => 'civil-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial/why-choose-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial/why-choose-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial/why-choose-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial/why-choose-long-term.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),

        array('id' => 'seed-civil-cta', 'type' => 'residential-cta', 'section_key' => 'civil-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Stabilise and Protect Your Network?',
            'copy' => "We'll assess your site, outline options (remediate vs replace), and deliver a clear program, QA and budget.",
            'image' => 0,
            'primary_text' => 'Contact Us',
            'primary_url' => '/contact/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Hospital Asset Remediation" page (post ID 7611,
 * child of Commercial Solutions), transcribed from Figma node 134:1953.
 * Content images are imported into the Media Library by the builder's
 * theme-asset importer so editors can replace them after seeding.
 *
 * @return array
 */
function rectify_pb_get_hospital_seed_blocks()
{
    return array(
        array('id' => 'seed-hospital-hero', 'type' => 'solutions-child-hero', 'section_key' => 'hospital-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Commercial Solutions',
            'title' => 'Hospital Asset Remediation',
        )),

        array('id' => 'seed-hospital-intro', 'type' => 'solutions-intro-band', 'section_key' => 'hospital-intro', 'label' => 'Intro', 'fields' => array(
            'lede' => 'Protecting healthcare facilities with engineered remediation solutions—safely, discreetly, and without interrupting care.',
            'copy' => 'Hospitals operate around the clock. Even minor asset failures—subsiding floors, water ingress, or concrete deterioration—can affect patient safety, medical equipment, and compliance with strict standards. Rectify delivers targeted remediation solutions designed for the healthcare environment: minimal disruption, proven methods, and measurable outcomes.',
            'related_label' => '',
            'related_text' => '',
            'related_url' => '',
            'image' => 'images/commercial/hospital-asset-remediation/hospital-entrance.png',
        )),

        array('id' => 'seed-hospital-challenges', 'type' => 'hospital-feature-grid', 'section_key' => 'hospital-challenges', 'label' => 'Unique Challenges in Hospital Environments', 'fields' => array(
            'heading' => 'Unique Challenges in Hospital Environments',
            'icon' => 'icon-hospital',
            'items' => array(
                array('title' => 'Continuous Operation', 'description' => 'Work must proceed around patients, staff, and sensitive equipment.'),
                array('title' => 'Hygiene and Safety', 'description' => 'Solutions must be clean, non-toxic, and low-impact.'),
                array('title' => 'Critical Infrastructure', 'description' => 'Utilities, labs, theatres, and wards require uninterrupted service.'),
                array('title' => 'High Standards', 'description' => 'Compliance with healthcare facility guidelines and accreditation requirements.'),
            ),
        )),

        array('id' => 'seed-hospital-where-help', 'type' => 'hospital-where-help', 'section_key' => 'hospital-where-help', 'label' => 'Where We Help in Hospitals', 'fields' => array(
            'heading' => 'Where We Help in Hospitals',
            'items' => array(
                array(
                    'image' => 'images/commercial/hospital-asset-remediation/ground-remediation.png',
                    'title' => 'Ground Remediation',
                    'description' => 'Stabilising weak soils under hospital buildings, car parks, and service corridors. Prevents settlement and ensures long-term performance of critical facilities.',
                    'related_text' => "Chemical Underpinning|||/residential/chemical-underpinning/\nVoid Filling Service|||/commercial-solutions/void-filling/",
                ),
                array(
                    'image' => 'images/commercial/hospital-asset-remediation/water-stopping.png',
                    'title' => 'Water Stopping & Waterproofing',
                    'description' => 'Grouting and sealing against water ingress in basements, plant rooms, lift shafts, and tunnels. Protects against mould, corrosion, and equipment downtime.',
                    'related_text' => 'Leak Sealing / Water Stopping|||/commercial-solutions/leak-sealing-water-stopping/',
                ),
                array(
                    'image' => 'images/commercial/hospital-asset-remediation/void-fill.png',
                    'title' => 'Void Fill & Re-support',
                    'description' => 'Addressing voids beneath slabs and pavements caused by washout or service leaks. Restores full support for heavy medical equipment and high-traffic areas.',
                    'related_text' => 'Slab Lifting|||/commercial-solutions/slab-lifting/',
                ),
                array(
                    'image' => 'images/commercial/hospital-asset-remediation/concrete-repair.png',
                    'title' => 'Concrete Repair & Protection',
                    'description' => 'Repairing spalled, cracked, or chemically attacked concrete in structures, façades, or service areas. Extends asset life and restores compliance with safety standards.',
                    'related_text' => 'Cracked Walls|||/residential/cracked-walls/',
                ),
            ),
        )),

        array('id' => 'seed-hospital-retrospective', 'type' => 'solutions-media-list', 'section_key' => 'hospital-retrospective', 'label' => 'Retrospective Upgrades for New Medical Facilities', 'fields' => array(
            'heading' => 'Retrospective Upgrades for New Medical Facilities',
            'image' => 'images/commercial/hospital-asset-remediation/operating-room.png',
            'list_text' => "Increasing bearing capacity under existing slabs to support heavier imaging, radiology, or robotic surgery equipment.\nPrecision levelling and stabilisation for ultra-low tolerance installations (MRI suites, linear accelerators, laboratory robotics).\nUpgrading performance of existing floors without demolition or rebuild.",
            'list_text_col2' => '',
            'related_label' => '',
            'related_text' => '',
        )),

        array('id' => 'seed-hospital-process', 'type' => 'solutions-process', 'section_key' => 'hospital-process', 'label' => 'Our Delivery Process', 'fields' => array(
            'heading' => 'Our Delivery Process',
            'items' => array(
                array('number' => '01', 'title' => 'Investigate & Plan', 'description' => 'We survey the site, identify risks, and schedule works around patient care—often staged or out-of-hours.', 'points_text' => ''),
                array('number' => '02', 'title' => 'Targeted Remediation', 'description' => 'Select resin/grout/coating systems, define horizons and injection grids, set QA/ITP.', 'points_text' => "Engineered resins and grouts consolidate soil, stop leaks, and fill voids.\nWaterproofing treatments prevent future water ingress.\nSpecialist concrete repair techniques restore structural integrity.\nRetrospective upgrades strengthen and level slabs for today’s advanced medical equipment."),
                array('number' => '03', 'title' => 'Verification & Compliance', 'description' => 'Every solution is checked against required standards: level surveys, watertightness checks, and structural inspections.', 'points_text' => ''),
            ),
        )),

        array('id' => 'seed-hospital-benefits', 'type' => 'solutions-benefits', 'section_key' => 'hospital-benefits', 'label' => 'Benefits for Hospitals', 'fields' => array(
            'heading' => 'Benefits for Hospitals',
            'image' => 'images/commercial/hospital-asset-remediation/hospital-hallway.png',
            'items' => array(
                array('title' => 'Minimal Disruption', 'description' => 'Fast-curing materials, clean installation, and staging around operations.'),
                array('title' => 'Proven Results', 'description' => 'Decades of global application, adapted for sensitive hospital environments.'),
                array('title' => 'Future-ready facilities', 'description' => 'Reinforced floors and precise levelling to support modern medical technology.'),
                array('title' => 'Safer Environments', 'description' => 'Secure structures, dry basements, and restored pavements.'),
            ),
        )),

        array('id' => 'seed-hospital-why', 'type' => 'hospital-feature-grid', 'section_key' => 'hospital-why', 'label' => 'Why Hospitals Choose Rectify', 'fields' => array(
            'heading' => 'Why Hospitals Choose Rectify',
            'icon' => 'icon-hospital',
            'items' => array(
                array('title' => 'Experience in healthcare projects', 'description' => 'Teams familiar with working in sensitive, live environments.'),
                array('title' => 'Clean, non-invasive methods', 'description' => 'No bulk excavation; small injection points and minimal waste.'),
                array('title' => 'Engineering assurance', 'description' => 'Solutions designed, monitored, and documented for compliance.'),
                array('title' => 'Proven people and processes', 'description' => "Methods refined over decades; staff with 10+ years of direct remediation experience."),
            ),
        )),

        array('id' => 'seed-hospital-cta', 'type' => 'residential-cta', 'section_key' => 'hospital-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Protect and Upgrade Your Hospital?',
            'copy' => 'Rectify Group delivers remediation and upgrade programs tailored for healthcare facilities—safely, quickly, and with measurable results.',
            'image' => 0,
            'primary_text' => 'Contact Us',
            'primary_url' => '/contact/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Undermining Treatment" page (post ID 1044, child of
 * Commercial Solutions), transcribed verbatim from
 * template-parts/commercial-solutions/content-undermining-treatment.php
 * (100% hardcoded, no ACF backing).
 *
 * @return array
 */
function rectify_pb_get_undermining_seed_blocks()
{
    return array(
        array('id' => 'seed-undermining-hero-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'undermining-hero', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'Commercial Solutions',
            'title' => 'Undermining Treatment (Ground Remediation for Failing Support & Slab Deflection)',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => '/commercial-solutions/',
            'current_label' => 'Undermining Treatment',
        )),

        array('id' => 'seed-undermining-intro', 'type' => 'solutions-intro-band', 'section_key' => 'undermining-intro', 'label' => 'Intro', 'fields' => array(
            'lede' => 'Restore support, arrest movement, and return assets to service, safely and with minimal disruption.',
            'copy' => 'Undermining occurs when soil beneath a slab or footing is removed, weakened, or displaced. The result is loss of bearing, slab deflection, cracking, binding doors/gates, trip steps and service misalignment. Our ground remediation approach targets the cause (voids, washout, loss of density) and rebuilds support beneath the structure using established injection and consolidation methods delivered by a highly experienced team.',
            'related_label' => 'Related Service:',
            'related_text' => 'Foundation Repair',
            'related_url' => '/residential/foundation-repair/',
            'image' => 'images/commercial-undermining/foundation-photo.png',
        )),

        array('id' => 'seed-undermining-causes', 'type' => 'undermining-causes', 'section_key' => 'undermining-causes', 'label' => 'Why Undermining Happens', 'fields' => array(
            'heading' => 'Why Undermining Happens',
            'items' => array(
                array('title' => 'Material mobilisation by water (scouring/flooding)', 'description' => 'Roof/downpipe discharge, broken stormwater, surface runoff or flood events erode fines and create voids under slabs and footings.'),
                array('title' => 'Animal burrowing', 'description' => 'Rabbits, wombats and other burrowers create tunnels leading to localised collapse under pavements, foundations and garden walls.'),
                array('title' => 'Service leaks & poor drainage', 'description' => 'Leaking water lines and ponding areas soften subgrades and pump fines.'),
                array('title' => 'Slope instability & lateral migration', 'description' => 'Gravity-driven soil movement on grades transfers support away from slabs/footings, opening joints and creating tilt.'),
                array('title' => 'Uncontrolled fill / poor compaction', 'description' => 'Long-term consolidation leaves gaps under slabs and footings.'),
                array('title' => 'Traffic/vibration', 'description' => 'Repetitive loads expose weakened zones, accelerating pumping and void growth.'),
            ),
        )),

        array('id' => 'seed-undermining-symptoms', 'type' => 'solutions-media-list', 'section_key' => 'undermining-symptoms', 'label' => 'Symptoms to look for', 'fields' => array(
            'heading' => 'Symptoms to look for',
            'image' => 'images/commercial-undermining/undermining-symptoms.png',
            'list_text' => "Hollow-sounding (\"drumming\") concrete, rocking slabs, or visible voids at edges.\nDifferential transitions over drains, trip hazards, or loss of falls to drains.\nCracking/rotation of masonry (step cracks, wall opening separation).\nBinding gates/doors, misaligned thresholds or settled crossovers.\nRepeated patch failures where the base keeps moving.",
            'list_text_col2' => '',
            'related_label' => 'Related Problems:',
            'related_text' => "Cracked Wall|||/residential/wall-cracks/\nUneven Floor|||/residential/house-relevelling/",
        )),

        array('id' => 'seed-undermining-process', 'type' => 'solutions-process', 'section_key' => 'undermining-process', 'label' => 'How We Treat Undermining (Process)', 'fields' => array(
            'heading' => 'How We Treat Undermining (Process)',
            'items' => array(
                array('number' => '01', 'title' => 'Investigate & Map', 'description' => 'Level survey to quantify severity of movement and vertical change; locate voids/soft spots; check drainage/services. Where relevant, we may propose CCTV, dye tests or moisture checks.', 'points_text' => ''),
                array('number' => '02', 'title' => 'Design the Remediation', 'description' => 'Select treatment based on ground conditions and access.', 'points_text' => "Void fill & re-support|||Targeted resin injection to fill voids, bond loose material and re-establish contact beneath slabs.\nPermeation/compaction grouting|||Strengthen granular or fill soils and reduce permeability where washout is active.\nLocal underpinning/stiffening zones|||Where footings need deeper improvement.\nWater management measures|||Sealing joints, redirecting downpipes, drainage tweaks to prevent recurrence."),
                array('number' => '03', 'title' => 'Controlled Lift (Where Required)', 'description' => 'Apply micro-increment lift to remove steps, restore falls and relieve binding, monitored in real time for accuracy.', 'points_text' => ''),
                array('number' => '04', 'title' => 'Verify & Make Good', 'description' => 'Plug injection points, seal joints if needed, and document outcomes (levels, volumes, injection map). Provide maintenance recommendations to keep the base stable.', 'points_text' => ''),
            ),
        )),

        array('id' => 'seed-undermining-benefits-v2', 'type' => 'solutions-benefits', 'section_key' => 'undermining-benefits', 'label' => 'Benefits for Hospitals', 'fields' => array(
            'heading' => 'Benefits for Hospitals',
            'image' => 'images/commercial-undermining/treatment-benefits.png',
            'items' => array(
                array('title' => 'Treats the cause', 'description' => 'Rebuilds support at depth and fills hidden voids.'),
                array('title' => 'Minimal disruption', 'description' => 'Small injection points; many areas remain usable during works.'),
                array('title' => 'Precise Outcomes', 'description' => 'Controlled lift to restore function (falls, alignments, door clearances).'),
                array('title' => 'Clean Installation', 'description' => 'Fast-curing materials and tidy reinstatement.'),
            ),
        )),

        array('id' => 'seed-undermining-notes', 'type' => 'solutions-notes', 'section_key' => 'undermining-notes', 'label' => 'Limitations & Cost Factors', 'fields' => array(
            'col1_heading' => 'Limitations & Suitability',
            'col1_copy' => "Concrete is too fractured to act as a single element (multiple broken fragments/delamination). Treatment panel width is too narrow to correct side-to-side levels differentially.\n\nActive slope instability is ongoing—global stability must be addressed, not just local support. Ongoing severe scouring persists (e.g., uncontrolled discharge) without feasible water management.\n\nWe use a level survey and condition assessment to determine if remediation will realistically restore support, alignment and performance.",
            'col2_heading' => 'Cost & Decision Factors',
            'col2_copy' => 'Small, isolated sections are often cheaper to replace than remediate due to fixed entry costs for injection works. Larger areas or multiple panels typically favour remediation, especially where demolition/reinstatement is disruptive.',
            'finish_heading' => 'Finish Matters',
            'finish_copy' => 'Exposed aggregate or stencilled concrete are difficult to colour/texture match—remediation preserves the existing finish.',
            'finish_copy_col2' => 'Tiled/paved overlays may be hard to source or re-lay—keeping the slab often retains these finishes intact.',
        )),

        array('id' => 'seed-undermining-areas', 'type' => 'solutions-media-list', 'section_key' => 'undermining-areas', 'label' => 'Typical Areas We Treat', 'fields' => array(
            'heading' => 'Typical Areas We Treat',
            'image' => 'images/commercial-undermining/typical-areas.png',
            'list_text' => "Driveways\nPavements\nPatios and pool surrounds with edge washout or burrows\nRoad pavements\nHardstands\nGarage thresholds that have dropped or \"pumped\"",
            'list_text_col2' => "Building strip\nSlab foundations undermined by leaks or runoff\nStructure and slabs adjacent to stormwater discharge systems, or on slopes with lateral soil movement",
            'related_label' => '',
            'related_text' => '',
        )),

        array('id' => 'seed-undermining-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'undermining-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),

        array('id' => 'seed-undermining-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'undermining-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Stop Undermining at the Source?',
            'copy' => "We'll inspect, map levels and ground conditions, and advise whether remediation or replacement offers the best result for your asset and finish.",
            'image' => 0,
            'primary_text' => 'Contact Us',
            'primary_url' => '/contact/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Ground Improvement" page (post ID 7592, child of
 * Residential Solutions), newly authored from the supplied Figma reference -
 * unlike every other seed function in this file, this page had no existing
 * hardcoded template to transcribe from (it previously fell back to a
 * generic blank page template), so this is the first source of truth for
 * its content.
 *
 * @return array
 */
function rectify_pb_get_ground_improvement_seed_blocks()
{
    return array(
        array('id' => 'seed-ground-hero', 'type' => 'ground-hero', 'section_key' => 'residential-ground-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Commercial Ground Improvement Solutions Melbourne & South Australia',
            'breadcrumb_current' => 'Ground Improvement',
        )),

        array('id' => 'seed-ground-intro', 'type' => 'ground-intro', 'section_key' => 'residential-ground-intro', 'label' => 'Introduction', 'fields' => array(
            'image' => 'images/ground-improvement/engineered-ground.png',
            'heading' => 'Engineered Ground Improvement for Commercial, Industrial & Infrastructure Projects',
            'copy' => "Weak or unstable ground can compromise the performance of buildings, pavements, warehouses, industrial facilities, and critical infrastructure. Whether caused by poor soil conditions, settlement, erosion, or inadequate compaction, unstable ground can lead to structural movement, uneven slabs, operational disruption, and costly repairs.\n\nAt Rectify, we deliver advanced ground improvement solutions for commercial, industrial, government, and infrastructure projects across Melbourne, Victoria, and South Australia. Our engineering-led approach strengthens the ground beneath existing and proposed structures, improving bearing capacity, reducing settlement, and extending asset life using modern, minimally invasive technologies.\n\nOur solutions are tailored to the unique geotechnical conditions of every site, helping clients reduce construction risks, minimise downtime, and protect valuable assets.",
        )),

        array('id' => 'seed-ground-required', 'type' => 'ground-required', 'section_key' => 'residential-ground-required', 'label' => 'When Is Ground Improvement Required?', 'fields' => array(
            'heading' => 'When Is Ground Improvement Required?',
            'lead' => 'Ground improvement is commonly used when natural ground conditions are unable to safely support existing structures or proposed developments.',
            'items' => array(
                array('icon' => 'ground-corrective-method', 'title' => 'Weak or Compressible Soils', 'description' => 'Loose fill, soft clay, uncontrolled fill, or sandy soils may compress under load, resulting in uneven settlement and reduced structural support.'),
                array('icon' => 'ground-corrective-method', 'title' => 'Foundation Settlement', 'description' => 'Buildings, slabs, and pavements may settle when supporting soils lose strength due to consolidation, moisture changes, or inadequate construction practices.'),
                array('icon' => 'ground-corrective-method', 'title' => 'Industrial & Warehouse Floor Movement', 'description' => 'Heavy machinery, storage systems, forklifts, and repetitive traffic place significant loads on industrial floors. Weak subgrades can lead to slab movement, cracking, and operational issues.'),
                array('icon' => 'ground-corrective-method', 'title' => 'Redevelopment & Building Extensions', 'description' => 'Adding additional loads to an existing structure often requires the supporting ground to be strengthened before construction begins.'),
                array('icon' => 'ground-corrective-method', 'title' => 'Water Damage & Soil Erosion', 'description' => 'Leaking services, groundwater movement, poor drainage, and erosion can weaken the supporting ground and create underground voids beneath structures.'),
                array('icon' => 'ground-corrective-method', 'title' => 'Underground Voids Beneath Structures', 'description' => 'Voids created by soil washout, poorly compacted fill, decaying organic material, or ageing underground services can reduce ground support and increase the risk of settlement.'),
            ),
        )),

        array('id' => 'seed-ground-projects', 'type' => 'ground-projects', 'section_key' => 'residential-ground-projects', 'label' => 'Projects & Applications', 'fields' => array(
            'image_1' => 'images/ground-improvement/damaged-wall.jpg',
            'image_2' => 'images/ground-improvement/soil-erosion.jpg',
            'image_3' => 'images/ground-improvement/technician-ground-injection.jpg',
            'heading' => 'Ground Improvement for Residential, Commercial and Infrastructure Projects',
            'copy' => "Every site presents different ground conditions, which is why effective ground improvement begins with a thorough engineering assessment. Our team evaluates subsurface conditions before recommending the most appropriate stabilisation strategy to achieve long-term performance and minimise project risk.\nRectify delivers ground improvement solutions across a wide range of applications, from residential developments through to major infrastructure and industrial projects.",
            'applications_heading' => 'Typical applications include:',
            'applications' => "Residential foundations and new home construction\nCommercial and industrial facilities\nRoads, pavements and transport infrastructure\nBridges, retaining structures and embankments\nWarehouse and distribution facilities\nCivil construction and redevelopment projects",
        )),

        array('id' => 'seed-ground-why', 'type' => 'ground-why', 'section_key' => 'residential-ground-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'chemical-why-engineering-led', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'chemical-why-structural-expertise', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'chemical-why-non-invasive', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'chemical-why-long-term', 'title' => 'Long-Term Confidence', 'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),

        array('id' => 'seed-ground-cta', 'type' => 'ground-cta', 'section_key' => 'residential-ground-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Build on Stronger Ground with Confidence',
            'copy' => "Ground conditions play a critical role in the long-term performance of every structure. Whether you're addressing existing ground instability or preparing for future construction, Rectify can provide an engineered ground improvement solution tailored to your project.\n\nSpeak with our team today to arrange a site assessment and discover how our ground improvement solutions can help reduce risk, improve stability and protect your investment for years to come.",
            'primary_text' => 'Contact Us',
            'primary_url' => '/contact/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Chemical Underpinning" page (post ID 7586, child of
 * Residential Solutions), transcribed verbatim from the hardcoded default
 * arrays in template-parts/residential-solutions/content-chemical-underpinning.php
 * (its ACF field group is registered but every field is currently empty on
 * that page, so these hardcoded defaults are exactly what visitors see
 * today). A handful of icon references in the original template point at
 * SVG files that do not exist in the theme (broken images even in the
 * current live template); this seed data substitutes the closest existing
 * icon from the icon library instead of preserving the 404s.
 *
 * @return array
 */
function rectify_pb_get_chemical_underpinning_seed_blocks()
{
    return array(
        array('id' => 'seed-chemical-hero', 'type' => 'chemical-hero', 'section_key' => 'residential-chemical-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Chemical Underpinning',
        )),

        array('id' => 'seed-chemical-what', 'type' => 'chemical-what', 'section_key' => 'residential-chemical-what', 'label' => 'What Is It', 'fields' => array(
            'image_1' => 'images/residential/chemical-underpinning/underpinning-process.jpg',
            'image_2' => 'images/residential/chemical-underpinning/resin-samples.jpg',
            'heading' => 'What is Chemical Underpinning?',
            'engineering_heading' => 'Engineering the Ground Beneath Your Home',
            'copy' => "Chemical underpinning is an advanced ground stabilisation method that improves weak or unstable soils beneath existing foundations.\n\nAlso known as polyurethane underpinning is the process of injecting a 2-part resin under the affected area of the slab, causing a rapid expansion which fills any empty spaces (or voids) in the soil. This strengthens the soil and creates a strong base which ensures that the property will no longer sink. Using this solid base, more resin is then injected on top causing the property to lift back into the original position and returning it to a near new state.\n\nRather than excavating beneath your home, specially engineered expanding polyurethane resin is injected into carefully selected locations beneath the slab.",
            'points_title' => 'As the resin expands, it:',
            'points_text' => "Fills underground voids\nDensifies weak soils\nImproves load-bearing capacity\nRestores uniform support beneath the foundation\nCan carefully re-level sections of the structure where appropriate",
            'note' => 'The result is a stronger, more stable foundation with minimal disruption to your property.',
        )),

        array('id' => 'seed-chemical-signs', 'type' => 'chemical-signs', 'section_key' => 'residential-chemical-signs', 'label' => 'Common Signs', 'fields' => array(
            'heading' => 'Common Signs You May Need Chemical Underpinning',
            'intro' => "Many Australian homes are built on reactive clay soils that naturally expand and contract as moisture levels change. Over time, this movement can place stress on your home's foundation, leading to structural issues that become more costly if left untreated.",
            'items' => array(
                array('image' => 'images/residential/chemical-underpinning/sign-cracked-walls.jpg', 'title' => 'Cracks appearing in internal or external walls'),
                array('image' => 'images/residential/chemical-underpinning/sign-doors-windows.jpg', 'title' => 'Doors and windows becoming difficult to open or close'),
                array('image' => 'images/residential/chemical-underpinning/sign-sloping-floor.jpg', 'title' => 'Uneven, sloping or sinking floors'),
                array('image' => 'images/residential/chemical-underpinning/sign-gaps.jpg', 'title' => 'Gaps forming around skirting boards, cornices or ceilings'),
                array('image' => 'images/residential/chemical-underpinning/sign-exterior-cracking.jpg', 'title' => 'Exterior brick cracking'),
                array('image' => 'images/residential/chemical-underpinning/sign-windows-sticking.jpg', 'title' => 'Windows sticking'),
                array('image' => 'images/residential/chemical-underpinning/sign-visible-settlement.jpg', 'title' => 'Visible slab settlement'),
            ),
            'note' => "If you've noticed one or more of these issues, an inspection can determine whether foundation movement is the underlying cause.",
        )),

        array('id' => 'seed-chemical-uses', 'type' => 'chemical-uses', 'section_key' => 'residential-chemical-uses', 'label' => 'Uses List', 'fields' => array(
            'heading' => 'Chemical Underpinning Can Be Used For',
            'copy' => '',
            'items' => array(
                array('icon' => 'chemical-residential-homes', 'title' => 'Residential Homes'),
                array('icon' => 'chemical-house-extensions', 'title' => 'House Extensions'),
                array('icon' => 'chemical-settlement-cracking', 'title' => 'Settlement Caused by Reactive Soil'),
                array('icon' => 'chemical-void-fill-slabs', 'title' => 'Raft Slab Foundations'),
                array('icon' => 'chemical-drainage', 'title' => 'Waffle Slab Foundations'),
                array('icon' => 'chemical-damage-prevention', 'title' => 'Garage'),
                array('icon' => 'chemical-void-foundation', 'title' => 'Void Remediation beneath Foundations'),
                array('icon' => 'chemical-floor-slab', 'title' => 'Internal Floor Slab'),
            ),
        )),

        array('id' => 'seed-chemical-why', 'type' => 'chemical-why', 'section_key' => 'residential-chemical-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'chemical-why-engineering-led', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'chemical-why-structural-expertise', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'chemical-why-non-invasive', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'chemical-why-long-term', 'title' => 'Long-Term Confidence', 'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),

        array('id' => 'seed-chemical-process', 'type' => 'chemical-process', 'section_key' => 'residential-chemical-process', 'label' => 'Process Steps', 'fields' => array(
            'heading' => 'Whatever the cause, our underpinning services can help.',
            'copy' => '',
            'items' => array(
                array('number' => '01', 'title' => 'Structural Assessment', 'description' => 'We inspect your home to identify the cause of movement and determine whether chemical underpinning is the appropriate solution.'),
                array('number' => '02', 'title' => 'Site Preparation', 'description' => 'Our team identifies treatment zones, completes pre-condition surveys, verifies underground services and prepares the work area before injection begins.'),
                array('number' => '03', 'title' => 'Precision Resin Injection', 'description' => 'Small injection ports are installed through the slab and engineered resin is injected at carefully controlled depths and pressures to improve the supporting soils.'),
                array('number' => '04', 'title' => 'Continuous Monitoring', 'description' => 'Throughout the injection process we monitor floor levels and structural movement using precision laser equipment to ensure accurate control.'),
                array('number' => '05', 'title' => 'Completion & Verification', 'description' => 'Injection points are sealed, floor levels are rechecked where applicable and comprehensive project documentation is completed.'),
            ),
        )),

        array('id' => 'seed-chemical-causes', 'type' => 'chemical-causes', 'section_key' => 'residential-chemical-causes', 'label' => 'Causes Of Damage', 'fields' => array(
            'heading' => 'Causes of damage:',
            'items' => array(
                array('icon' => 'chemical-damage', 'image' => 'images/residential/chemical-underpinning/reactive-clay.jpg', 'title' => 'Founding in Reactive Clay Soil', 'description' => 'Clay soils has the ability to absorb or dispel moisture. In a wet environment, clay will absorb moisture increasing its plasticity and expanding. This causes heave in footings and structures. In contrast, in hot and dry environments, it becomes hard, brittle and non-plastic shrinking in the process. During periods of prolonged drought, the clay shrinks to the extent that the structure supported by it subsides significantly. Any other cause for loss of moisture in clay will cause subsidence and settlement, this includes trees and vegetation, or the construction of a new structure which affects the impermeability of soil beside structure.'),
                array('icon' => 'chemical-damage-water', 'image' => 'images/residential/chemical-underpinning/erosion.jpg', 'title' => 'Flooding and Water Erosion', 'description' => 'Poor site drainage can lead to water ponding against and seeping below a concrete structure, be it a house or a warehouse slab. The water weakens soil and washes away the silt/sands from silty and sandy clays. This leads to voids and weakening of soil causing subsidence. Cracked or leaking pipes (drainage or sewer) is another cause of poor site drainage. Therefore, we recommend regular checks of all pipes for any signs of leak.'),
                array('icon' => 'chemical-damage-void', 'title' => 'Undermining or Due to Adjoining Footing Construction', 'description' => 'If the adjoining land to your property is vacant, and during slab preparation your footing is undermined, that is the adjoining cut is below the bottom of your footing, this may loosen soil and cause subsidence.'),
                array('icon' => 'chemical-damage-load', 'title' => 'Load Exceeds Concrete Strength and Soil Bearing Capacity', 'description' => 'A 150mm thick concrete slab can typically support a weight of 860kg/m2. However, the soil supporting the slab can have less support weight/bearing capacity. Once a structure or another type of load, such as a heavy vehicle, overloads this limit, the concrete begins to weaken and cracks can begin to form and soil underneath starts to settle. This creates openings for moisture to enter; weakening the underlying soil. A crack that is 5mm wide has the potential to reduce the weight capacity by up to half of its initial strength.'),
                array('icon' => 'chemical-damage-workmanship', 'image' => 'images/residential/chemical-underpinning/poor-workmanship.jpg', 'title' => 'Poor Workmanship and Inadequate Founding', 'description' => 'Waffle slab footing (edge and internal beams) can be supported on up to 300mm of "controlled fill". The controlled fill has a strict method of laying, and is required to be of clayey materials with 97% of moisture. We recommend that all edge ribs are trenched through this fill and founded into natural clay. However, when the ribs are founded on fill, if it hasn\'t been prepared as per requirements set out in AS2870 - Residential Slabs and Footings, then the fill will settle over time and the slab will subside and show signs of distress.'),
            ),
        )),

        array('id' => 'seed-chemical-cta', 'type' => 'chemical-cta', 'section_key' => 'residential-chemical-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Protect Your Home Before Foundation Movement Gets Worse',
            'copy' => "Foundation movement rarely improves without intervention.\n\nIf you've noticed cracks, settlement or uneven floors, our specialists can determine the underlying cause and recommend the most appropriate solution for your home.",
            'image' => 0,
            'primary_text' => 'CONTACT US',
            'primary_url' => '/contact-us/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Driveway Re-Levelling" page (post ID 1037, child of
 * Residential Solutions), transcribed verbatim from
 * template-parts/residential-solutions/content-driveway-relevelling.php
 * (100% hardcoded, no ACF backing).
 *
 * @return array
 */
function rectify_pb_get_driveway_relevelling_seed_blocks()
{
    return array(
        array('id' => 'seed-driveway-hero', 'type' => 'solution-hero', 'section_key' => 'residential-driveway-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Driveway Re-Levelling',
        )),

        array('id' => 'seed-driveway-intro', 'type' => 'solution-band', 'section_key' => 'residential-driveway-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore levels, remove trip hazards, and preserve your driveway’s appearance—cleanly and with minimal disruption.',
            'body_richtext' => 'Slab driveways can settle or heave when soils change volume, lose bearing or are mobilised through water ingress. Our targeted ground improvement and controlled re-levelling re-supports the slab and lifts it back toward design level—often without removing the driveway or shutting down access for long periods. We inject engineered resin beneath the slab to fill voids, densify weak soils, and apply measured lift, with outcomes verified in real time.',
            'body_list' => '',
            'body_benefits' => array(),
            'image' => 'images/driveway-relevelling/driveway-edge.png',
            'media_position' => 'last',
            'soft' => '',
            'related_label' => 'Related Service:',
            'related_links' => array(array('text' => 'Foundation Repair', 'url' => '/residential/foundation-repair/')),
        )),

        array('id' => 'seed-driveway-why-moves', 'type' => 'solution-band', 'section_key' => 'residential-driveway-why-moves', 'label' => 'Why Driveways Move', 'fields' => array(
            'heading' => 'Why Driveways Move',
            'body_richtext' => '',
            'body_list' => "Reactive soil cycles (wet/dry) causing shrink/swell and differential movement.\nUncontrolled fill / poor compaction leading to long-term consolidation.\nErosion or washout around downpipes, irrigation lines or unsealed panel joints.\nTraffic and point loads (cars, boats, trailers) that overload weak spots.",
            'body_benefits' => array(),
            'image' => 'images/driveway-relevelling/driveway-cracked.png',
            'media_position' => 'first',
            'soft' => 'yes',
            'related_label' => 'Related Problems:',
            'related_links' => array(array('text' => 'Ground Subsidence', 'url' => '/residential/ground-improvement/')),
        )),

        array('id' => 'seed-driveway-process', 'type' => 'solution-process-steps', 'section_key' => 'residential-driveway-process', 'label' => 'How Re-Levelling Works', 'fields' => array(
            'heading' => 'How Driveway Re-Levelling Works',
            'items' => array(
                array('number' => '01', 'title' => 'Assess & Map', 'description' => 'We survey levels, locate voids/soft zones, and define injection points away from edges and services.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
                array('number' => '02', 'title' => 'Targeted Resin Injection', 'description' => 'Small holes are drilled and a high-strength expanding resin is injected at appropriate depths depending upon the contributing factors and desired outcome. The resin fills voids, binds loose material, increases bearing capacity, and can gently lift the slab back toward level.', 'related_label' => 'Related Service', 'related_text' => 'Ground Subsidence', 'related_url' => '/residential/ground-improvement/'),
                array('number' => '03', 'title' => 'Controlled Lift & Checks', 'description' => 'Lift is applied in micro-increments and monitored continuously (levels, joints, falls to drains).', 'related_label' => 'Related Service:', 'related_text' => 'Slab Lifting', 'related_url' => '/residential/slab-lifting-slab-jacking/'),
                array('number' => '04', 'title' => 'Finish & Verify', 'description' => 'Holes are plugged, joints can be sealed, and before/after levels recorded. Where needed, we’ll advise on drainage improvements to prevent reocurrence.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
            ),
        )),

        array('id' => 'seed-driveway-benefits', 'type' => 'solution-band', 'section_key' => 'residential-driveway-benefits', 'label' => 'Benefits', 'fields' => array(
            'heading' => 'Benefits',
            'body_richtext' => '',
            'body_list' => '',
            'body_benefits' => array(
                array('title' => 'Non-destructive', 'description' => 'Keep the existing slab—no bulk demolition.'),
                array('title' => 'Fast return to service', 'description' => 'Resin cures quickly; typical areas useable the same day'),
                array('title' => 'Precise', 'description' => 'Millimetre-scale control to restore falls and remove trip steps.'),
                array('title' => 'Clean workface', 'description' => 'Small injection points; minimal mess and waste.'),
            ),
            'image' => 'images/driveway-relevelling/driveway-benefits.png',
            'media_position' => 'first',
            'soft' => 'yes',
            'related_label' => '',
            'related_links' => array(),
        )),

        array('id' => 'seed-driveway-notes', 'type' => 'solution-notes', 'section_key' => 'residential-driveway-notes', 'label' => 'Limitations & Cost', 'fields' => array(
            'col1_heading' => 'Limitations & Suitability',
            'col1_copy' => "The slab may be too broken to act monolithically and lift together (multiple full-depth crack fragments, shattered corners, delamination).\n\nTreatment width may be too narrow to correct gradient adequately (insufficient slab size prohibits differential recovery).\n\nTreatment width may be too narrow to correct gradient adequately (insufficient slab size prohibits differential recovery).\n\nSevere root heave is the primary cause—resin won’t counter ongoing tree growth forces.\n\nWe’ll perform a level survey to confirm the polarity of movement (heave vs settlement) and the extent of vertical change so you’ll know if ground remediation can realistically restore alignment.",
            'col2_heading' => 'Cost & Decision Factors',
            'col2_copy' => 'Small, isolated sections are often cheaper to replace than to remediate because resin works have a fixed entry cost and mobilisation. Larger areas or multiple panels tend to favour re-levelling, especially where demolition/reinstatement would be disruptive or expensive.',
            'small_notes' => array(
                array('heading' => 'Finish Matters', 'copy' => "Exposed aggregate / stencilled concrete are difficult to match on a partial replacement—re-levelling preserves the original look.\n\nTiled/paved overlays may not be replaceable or available—re-levelling can retain these finishes intact."),
                array('heading' => 'Functionality considerations', 'copy' => 'If settlement has upset drainage, re-levelling can restore falls without a full rebuild.'),
            ),
        )),

        array('id' => 'seed-driveway-issues', 'type' => 'solution-band', 'section_key' => 'residential-driveway-issues', 'label' => 'Typical Issues We Fix', 'fields' => array(
            'heading' => 'Typical Issues We Fix',
            'body_richtext' => '',
            'body_list' => "Sunken panels creating trip steps at garage entries, thresholds, or path interfaces.\nLoss of falls to drains causing ponding.\nVoid pumping and slab drumming over soft spots.\nSettled edges at crossovers and vehicle pads.",
            'body_benefits' => array(),
            'image' => 'images/driveway-relevelling/sunken-panels.png',
            'media_position' => 'first',
            'soft' => 'yes',
            'related_label' => 'Related Service:',
            'related_links' => array(
                array('text' => 'Uneven Floors', 'url' => '/residential/house-relevelling/'),
                array('text' => 'Cracked Walls', 'url' => '/residential/wall-cracks/'),
            ),
        )),

        array('id' => 'seed-driveway-why', 'type' => 'solution-icon-grid', 'section_key' => 'residential-driveway-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'dark' => 'yes',
            'items' => array(
                array('icon' => 'chemical-why-engineering-led', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'chemical-why-structural-expertise', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'chemical-why-non-invasive', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'chemical-why-long-term', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),

        array('id' => 'seed-driveway-cta', 'type' => 'solution-cta', 'section_key' => 'residential-driveway-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Assess Your Driveway?',
            'copy' => 'We’ll inspect, map levels, and advise whether re-levelling or replacement offers the best result for your finish and budget.',
            'primary_text' => 'CONTACT US',
            'primary_url' => '/contact-us/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Basement Construction Remedial Services" page (post
 * ID 7589, child of Residential Solutions), transcribed verbatim from
 * template-parts/residential-solutions/content-basement-construction-support.php
 * (100% hardcoded, no ACF backing). The 4 "Corrective Methods" sub-sections
 * are standardised on the icon-card style (2 of the 4 already used it in the
 * original template; the other 2 used a plain checklist with no icons at
 * all, which reads as an authoring inconsistency rather than an intentional
 * difference) so all 4 "Corrective Methods" blocks look consistent.
 *
 * @return array
 */
function rectify_pb_get_basement_construction_seed_blocks()
{
    return array(
        array('id' => 'seed-basement-hero', 'type' => 'solution-hero', 'section_key' => 'residential-basement-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Basement Construction Remedial Services',
        )),

        array('id' => 'seed-basement-intro', 'type' => 'solution-band', 'section_key' => 'residential-basement-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Protect your basement against structural weaknesses, concrete damage, and water intrusion—so it remains safe, durable, and serviceable for the long term.',
            'body_richtext' => 'Below are the most common remedial categories, the symptoms that signal a problem, and the corrective methods typically used to fix them.',
            'body_list' => '',
            'body_benefits' => array(),
            'image' => 'images/basement-construction-support/hero-basement.jpg',
            'media_position' => 'last',
            'soft' => '',
            'related_label' => 'Related Service:',
            'related_links' => array(array('text' => 'Foundation Repair', 'url' => '/residential/foundation-repair/')),
        )),

        array('id' => 'seed-basement-concrete-repairs', 'type' => 'solution-band', 'section_key' => 'residential-basement-concrete-repairs', 'label' => 'Concrete Repairs', 'fields' => array(
            'heading' => 'Concrete Repairs',
            'body_richtext' => '',
            'body_list' => '',
            'benefits_label' => 'Typical Symptoms',
            'body_benefits' => array(
                array('title' => 'Visible cracking (map, shrinkage, settlement, or structural cracks).', 'description' => ''),
                array('title' => 'Staining at cracks or joints; moisture tracking and efflorescence.', 'description' => ''),
                array('title' => 'Honeycombing, surface scaling, pop-outs, or laitance.', 'description' => ''),
                array('title' => 'Uneven floors, loss of falls to drains, or step hazards.', 'description' => ''),
                array('title' => 'Delamination/hollow "drumming" areas; local spalls—especially near corners/edges.', 'description' => ''),
            ),
            'image' => 'images/basement-construction-support/concrete-repairs.jpg',
            'media_position' => 'first',
            'soft' => 'yes',
            'related_label' => 'Related Service:',
            'related_links' => array(
                array('text' => 'Cracked Walls', 'url' => '/residential/wall-cracks/'),
                array('text' => 'Uneven Floors', 'url' => '/residential/house-relevelling/'),
            ),
        )),

        array('id' => 'seed-basement-concrete-repairs-methods', 'type' => 'solution-icon-grid', 'section_key' => 'residential-basement-concrete-repairs-methods', 'label' => 'Corrective Methods (Concrete Repairs)', 'fields' => array(
            'heading' => 'Corrective Methods',
            'dark' => '',
            'items' => array(
                array('icon' => 'basement-corrective-method', 'title' => 'Crack injection', 'description' => 'Epoxy injection for structural cracks; flexible PU injection for live/leaking cracks with movement or water.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Patch & section repair', 'description' => 'Remove unsound concrete; apply bonding primer; reinstate with polymer-modified or structural repair mortars; reinstate cover and finish.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Stitching & dowelling', 'description' => 'Stainless/galvanised bars or staples across cracks or interfaces to restore load transfer.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Surface re-profiling', 'description' => 'Grinding, levelling mortars, and joint arris rebuilding to restore functionality and drainage falls.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Protective Sealing', 'description' => 'Penetrating sealers or coatings to resist moisture ingress, abrasion, and chemical exposure.'),
            ),
        )),

        array('id' => 'seed-basement-waterproofing', 'type' => 'solution-band', 'section_key' => 'residential-basement-waterproofing', 'label' => 'Waterproofing', 'fields' => array(
            'heading' => 'Waterproofing & Water Intrusion Control',
            'body_richtext' => '',
            'body_list' => '',
            'benefits_label' => 'Typical Symptoms',
            'body_benefits' => array(
                array('title' => 'Damp walls or floors; active leaks at construction joints or service penetrations.', 'description' => ''),
                array('title' => 'Hydrostatic pressure signs: water beads or "sweating" on negative (internal) surfaces.', 'description' => ''),
                array('title' => 'Efflorescence, mould/mildew, and musty odours.', 'description' => ''),
                array('title' => 'Corrosion staining from reinforcement; blistering/peeling coatings.', 'description' => ''),
            ),
            'image' => 'images/basement-construction-support/waterproofing.jpg',
            'media_position' => 'first',
            'soft' => '',
            'related_label' => 'Related Service:',
            'related_links' => array(
                array('text' => 'Cracked Walls', 'url' => '/residential/wall-cracks/'),
                array('text' => 'Uneven Floors', 'url' => '/residential/house-relevelling/'),
            ),
        )),

        array('id' => 'seed-basement-waterproofing-methods', 'type' => 'solution-icon-grid', 'section_key' => 'residential-basement-waterproofing-methods', 'label' => 'Corrective Methods (Waterproofing)', 'fields' => array(
            'heading' => 'Corrective Methods',
            'dark' => '',
            'items' => array(
                array('icon' => 'basement-corrective-method', 'title' => 'Leak sealing injection', 'description' => 'Hydrophilic/hydrophobic PU or micro-cement grouts to stop active water at cracks, cold joints, and wall–slab interfaces.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Membranes & coatings', 'description' => 'Positive-side sheet or liquid membranes; negative-side cementitious/crystalline coatings where external access is limited.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Joint systems', 'description' => 'Waterstops, re-detailing of construction/movement joints, and joint sealant renewal.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Surface re-profiling', 'description' => 'Grinding, levelling mortars, and joint arris rebuilding to restore functionality and drainage falls.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Protective sealing', 'description' => 'Penetrating sealers or coatings to resist moisture ingress, abrasion, and chemical exposure.'),
            ),
        )),

        array('id' => 'seed-basement-foundation', 'type' => 'solution-band', 'section_key' => 'residential-basement-foundation', 'label' => 'Foundation Reinforcement', 'fields' => array(
            'heading' => 'Foundation Reinforcement & Stabilisation',
            'body_richtext' => '',
            'body_list' => '',
            'benefits_label' => 'Typical Symptoms',
            'body_benefits' => array(
                array('title' => 'Differential settlement: diagonal wall cracks, door binding, misaligned frames.', 'description' => ''),
                array('title' => 'Tilt/rotation of retaining walls or columns; racking of partitions.', 'description' => ''),
                array('title' => 'Slab deflection, rocking, or voids beneath slab edges (pumping).', 'description' => ''),
                array('title' => 'Recurring joint steps or trip hazards after patching.', 'description' => ''),
                array('title' => 'Delamination/hollow "drumming" areas; local spalls—especially near corners/edges.', 'description' => ''),
            ),
            'image' => 'images/basement-construction-support/foundation-reinforcement.jpg',
            'media_position' => 'first',
            'soft' => 'yes',
            'related_label' => 'Related Service:',
            'related_links' => array(
                array('text' => 'Ground Improvement', 'url' => '/residential/ground-improvement/'),
                array('text' => 'Slab Lifting', 'url' => '/residential/slab-lifting-slab-jacking/'),
            ),
        )),

        array('id' => 'seed-basement-foundation-methods', 'type' => 'solution-icon-grid', 'section_key' => 'residential-basement-foundation-methods', 'label' => 'Corrective Methods (Foundation)', 'fields' => array(
            'heading' => 'Corrective Methods',
            'dark' => '',
            'items' => array(
                array('icon' => 'basement-corrective-method', 'title' => 'Ground improvement', 'description' => 'Resin injection to fill voids and compact weak zones; compaction or permeation grouting in granular fills to restore bearing and reduce permeability.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Structural strengthening', 'description' => 'Local thickening, additional reinforcement, steel/FRP plates/wraps to increase capacity where design loads have changed.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Controlled lift', 'description' => 'Micro-increment jacking or resin-assisted lift to re-establish levels, door clearances, and falls to drains—monitored in real time.'),
            ),
        )),

        array('id' => 'seed-basement-spalling', 'type' => 'solution-band', 'section_key' => 'residential-basement-spalling', 'label' => 'Concrete Spalling', 'fields' => array(
            'heading' => 'Concrete Spalling ("Concrete Cancer") Remediation',
            'body_richtext' => '',
            'body_list' => '',
            'benefits_label' => 'Typical Symptoms',
            'body_benefits' => array(
                array('title' => 'Rust-coloured staining; cracking parallel to reinforcement lines.', 'description' => ''),
                array('title' => 'Hollow-sounding areas under light hammer sounding.', 'description' => ''),
                array('title' => 'Localised bulging/delamination; concrete breaking away to expose corroded steel.', 'description' => ''),
                array('title' => 'Accelerated deterioration in humid or wet locations.', 'description' => ''),
            ),
            'image' => 'images/basement-construction-support/concrete-spalling.jpg',
            'media_position' => 'first',
            'soft' => '',
            'related_label' => '',
            'related_links' => array(),
        )),

        array('id' => 'seed-basement-spalling-methods', 'type' => 'solution-icon-grid', 'section_key' => 'residential-basement-spalling-methods', 'label' => 'Corrective Methods (Spalling)', 'fields' => array(
            'heading' => 'Corrective Methods',
            'dark' => '',
            'items' => array(
                array('icon' => 'basement-corrective-method', 'title' => 'Break-out & preparation', 'description' => 'Remove all unsound concrete; saw-cut perimeters; prepare a clean, profiled surface.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Rebar Treatment', 'description' => 'Clean to bright metal; continuity checks; apply passivating primer; replace/augment bars where section loss is significant.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Corrosion mitigation', 'description' => 'Install galvanic anodes or consider hybrid/cathodic protection in severe environments; apply anti-carbonation or chloride-resistant coatings.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Structural patching', 'description' => 'Place compatible, low-shrinkage repair mortar; cure and finish; reinstate cover and protective coatings.'),
                array('icon' => 'basement-corrective-method', 'title' => 'Follow-up sealing', 'description' => 'Crack/joint sealing and hydrophobic impregnation to limit future ingress.'),
            ),
        )),

        array('id' => 'seed-basement-process', 'type' => 'solution-process-steps', 'section_key' => 'residential-basement-process', 'label' => 'Delivery Process', 'fields' => array(
            'heading' => 'Our Delivery Process',
            'items' => array(
                array('number' => '01', 'title' => 'Investigate & diagnose', 'description' => 'Level surveys, moisture mapping, hammer sounding, cover meter scans, and (as needed) core tests or CCTV of drains.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
                array('number' => '02', 'title' => 'Design the fix', 'description' => 'Scope tailored to the cause: water management plus repairs, ground improvement plus lift, or structural strengthening.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
                array('number' => '03', 'title' => 'Execute with control', 'description' => 'Low-impact methods; staged works around site operations; continuous monitoring of movement/flows.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
                array('number' => '04', 'title' => 'Verify & document', 'description' => 'Watertightness checks, level re-surveys, pull-off/bond tests (as relevant), as-built records and maintenance advice.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
            ),
        )),

        array('id' => 'seed-basement-why', 'type' => 'solution-icon-grid', 'section_key' => 'residential-basement-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'dark' => 'yes',
            'items' => array(
                array('icon' => 'chemical-why-engineering-led', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'chemical-why-structural-expertise', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'chemical-why-non-invasive', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'chemical-why-long-term', 'title' => 'Long-Term Confidence', 'description' => 'We don\'t just repair today\'s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),

        array('id' => 'seed-basement-cta', 'type' => 'solution-cta', 'section_key' => 'residential-basement-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Strengthen and Waterproof Your Basement?',
            'copy' => 'We\'ll assess the issues, explain options (repair vs replacement), and deliver a clear program and budget.',
            'primary_text' => 'CONTACT US',
            'primary_url' => '/contact-us/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Mailbox / Brick Fence Re-Leveling" page (post ID
 * 1050, child of Residential Solutions), transcribed verbatim from
 * template-parts/residential-solutions/content-mailbox-brick-fence-releveling.php
 * (100% hardcoded, no ACF backing).
 *
 * @return array
 */
function rectify_pb_get_mailbox_brick_fence_seed_blocks()
{
    return array(
        array('id' => 'seed-brick-hero', 'type' => 'brick-hero', 'section_key' => 'residential-brick-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Mailbox / Brick Fence Re-Levelling',
            'breadcrumb_parent_label' => 'Residential Solutions',
            'breadcrumb_parent_url' => '/residential/',
            'breadcrumb_current' => 'Mailbox / Brick fence re-levelling',
        )),

        array('id' => 'seed-brick-intro', 'type' => 'brick-band', 'section_key' => 'residential-brick-intro', 'label' => 'Intro', 'fields' => array(
            'variant' => 'intro',
            'heading' => 'Restore alignment, safety, and street appeal—quickly, cleanly, and without demolition.',
            'copy' => 'Lean, tilt, or cracking in brick mailboxes and masonry fences usually points to soil movement or loss of support beneath the footing. Our targeted ground improvement and controlled re-levelling re-supports the footing, closes cracks, and returns your asset to plumb alignment—often in a single visit.',
            'image' => 'images/mailbox-brick-fence/intro-house.jpg',
            'media_position' => 'last',
            'related_label' => 'Related Service:',
            'related_text' => 'Foundation Repair',
            'related_url' => '/residential/foundation-repair/',
        )),

        array('id' => 'seed-brick-causes', 'type' => 'brick-band', 'section_key' => 'residential-brick-causes', 'label' => 'Why Movement Happens', 'fields' => array(
            'variant' => 'causes',
            'heading' => 'Why Brick Mailbox / Fence Movement Happens',
            'image' => 'images/mailbox-brick-fence/causes-mailbox.jpg',
            'media_position' => 'first',
            'items' => array(
                array('title' => 'Reactive clay cycles', 'description' => 'Shrink/swell with wet–dry changes reduces bearing and shifts the footing.'),
                array('title' => 'Granular soils and washout', 'description' => 'Sand or fill can settle or wash away around services.'),
                array('title' => 'Voids and poor compaction', 'description' => 'Introduced fills consolidate over time, undermining support.'),
                array('title' => 'Water paths', 'description' => 'Downpipes, irrigation, or leaks erode fines and create soft spots.'),
            ),
        )),

        array('id' => 'seed-brick-where', 'type' => 'brick-media-grid', 'section_key' => 'residential-brick-where', 'label' => 'Where We Help', 'fields' => array(
            'heading' => 'Where We Help',
            'items' => array(
                array('image' => 'images/mailbox-brick-fence/where-single-pier.jpg', 'title' => 'Single or twin brick mailbox piers (with/without built-in boxes or parcels).', 'description' => ''),
                array('image' => 'images/mailbox-brick-fence/intro-house.jpg', 'title' => 'Short front boundary masonry fences and wing walls.', 'description' => ''),
                array('image' => 'images/mailbox-brick-fence/where-softclay.jpg', 'title' => 'Letterbox/fence footings over soft clays, sandy soils, or uncontrolled fill.', 'description' => ''),
                array('image' => 'images/mailbox-brick-fence/where-driveway.jpg', 'title' => 'Driveway edges and garden walls affected by water or tree roots.', 'description' => ''),
            ),
        )),

        array('id' => 'seed-brick-process', 'type' => 'brick-process', 'section_key' => 'residential-brick-process', 'label' => 'Process', 'fields' => array(
            'heading' => 'How Rectify Re-Levels Brick Mailbox Piers &amp; Short Masonry Fences',
            'items' => array(
                array('number' => '01', 'title' => 'Diagnose &amp; Plan', 'description' => 'We check plumb/tilt, footing type, soil behaviour and nearby services to map strategic injection points.', 'related_label' => '', 'related_text' => '', 'related_url' => ''),
                array('number' => '02', 'title' => 'Targeted Resin Injection', 'description' => 'Site-specific engineered polyurethane/geopolymer resin is injected via small holes to re-support the footing and improve bearing in the soil below. The expanding resin fills voids, binds loose material, and compacts the zone under load.', 'related_label' => 'Related Service', 'related_text' => 'Ground Improvement', 'related_url' => '/residential/ground-improvement/'),
                array('number' => '03', 'title' => 'Controlled Lift &amp; Alignment', 'description' => 'We apply measured lift to bring the pier/fence back to plumb and relieve binding. Movement is monitored in real time to avoid over-correction.', 'related_label' => 'Related Service:', 'related_text' => 'Slab Lifting', 'related_url' => '/residential/slab-lifting-slab-jacking/'),
                array('number' => '04', 'title' => 'Finish &amp; Verify', 'description' => "We grout injection points, make good the surface, and verify alignment and stability. Where needed, we can repoint open joints or seal minor cracks to keep water out.\n\nOn sites with localised water ingress or sandy soils, small-scale stabilisation or sealing grouts may be added to lock the ground and reduce future washout.", 'related_label' => '', 'related_text' => '', 'related_url' => ''),
            ),
        )),

        array('id' => 'seed-brick-benefits', 'type' => 'brick-band', 'section_key' => 'residential-brick-benefits', 'label' => 'Benefits', 'fields' => array(
            'variant' => 'benefits',
            'heading' => 'Benefits',
            'image' => 'images/mailbox-brick-fence/benefits.jpg',
            'media_position' => 'first',
            'items' => array(
                array('title' => 'Non-destructive', 'description' => 'keep the existing brickwork—no tear-down or rebuild.'),
                array('title' => 'Fast return to service', 'description' => 'Minimal set-up, rapid curing, and neat reinstatement.'),
                array('title' => 'Precise Results', 'description' => 'Millimetre-controlled lift to restore plumb alignment and function.'),
                array('title' => 'Value-preserving', 'description' => 'Cost-effective remediation versus full replacement.'),
            ),
        )),

        array('id' => 'seed-brick-issues', 'type' => 'brick-band', 'section_key' => 'residential-brick-issues', 'label' => 'Typical Issues We Fix', 'fields' => array(
            'variant' => 'issues',
            'heading' => 'Typical Issues We Fix',
            'list_text' => "Leaning or rotated masonry walls and mailboxes.\nStepped or open mortar joints, hairline cracking.\nVoiding/settlement adjacent to services or driveway edges.",
            'image' => 'images/mailbox-brick-fence/typical-issue.jpg',
            'media_position' => 'last',
        )),

        array('id' => 'seed-brick-considerations', 'type' => 'brick-band', 'section_key' => 'residential-brick-considerations', 'label' => 'Important Considerations', 'fields' => array(
            'variant' => 'considerations',
            'label' => 'IMPORTANT CONSIDERATIONS:',
            'heading' => 'Vegetation, Reactivity &amp; Suitability',
            'copy' => "Mailboxes and garden walls generally have shallow footings and are influenced by soil reactivity and moisture changes (refer to CSIRO BTF-18), as well as nearby vegetation.\n\nEstablished trees can alter ground moisture regimes; root activity may disturb foundations. Trees may also lean on structures and cause rotation.\n\nNot all leaning garden walls or letterboxes can be corrected using resin injection. Damage driven by root heave or pushing by plants is not suitable for resin-based repair.\n\nA level survey will determine the polarity of movement and extent of vertical change to assess whether ground remediation can correct alignment.",
            'image' => 'images/mailbox-brick-fence/important-consideration.jpg',
            'media_position' => 'first',
        )),

        array('id' => 'seed-brick-why', 'type' => 'brick-grid', 'section_key' => 'residential-brick-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'variant' => 'why',
            'items' => array(
                array('icon' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),

        array('id' => 'seed-brick-cta', 'type' => 'brick-cta', 'section_key' => 'residential-brick-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Re-Level Your Mailbox or Front Fence?',
            'copy' => "We’ll assess your site and recommend the most efficient remediation plan.",
            'primary_text' => 'CONTACT US',
            'primary_url' => '/contact-us/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the "Sand Permeation" page (post ID 7461, child of
 * Residential Solutions), transcribed from
 * template-parts/residential-solutions/content-sand-permeation.php and
 * completed with the sections shown in the approved design (a "Typical
 * Scenarios & Examples" grid and a "Limitations & Suitability / Cost &
 * Decision Factors" notes band) that the existing template was missing, plus
 * real image assets and working contact links in place of the placeholder
 * "#" links and non-existent image paths in the original file.
 *
 * @return array
 */
function rectify_pb_get_sand_permeation_seed_blocks()
{
    return array(
        array('id' => 'seed-sand-hero', 'type' => 'sand-hero', 'section_key' => 'residential-sand-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Sand permeation grouting & non-cohesive soil control',
        )),

        array('id' => 'seed-sand-intro', 'type' => 'sand-intro', 'section_key' => 'residential-sand-intro', 'label' => 'Intro', 'fields' => array(
            'image' => 'images/sand-permeation/intro-permeation-grout.png',
            'heading' => 'Stabilise running sands, control groundwater, and prevent excavation failure—safely and with minimal disruption.',
            'copy' => "Non-cohesive soils (sands and some gravels) lack the natural \u{2018}stick\u{2019} that holds excavations upright. High permeability allows fines to mobilise, causing voids, loss of support, and slab/footing deflection. Our sand-permeation and ground improvement solutions bind loose grains, reduce permeability, and create a stable, uniform mass that supports construction and protects adjacent assets.",
            'related_label' => 'Related Service:',
            'related_text' => 'Ground Improvement',
            'related_url' => '/residential/ground-improvement/',
        )),

        array('id' => 'seed-sand-risk', 'type' => 'sand-risk', 'section_key' => 'residential-sand-risk', 'label' => 'Why Non-Cohesive Soils Create Risk', 'fields' => array(
            'heading' => 'Why non-cohesive soils create risk',
            'items' => array(
                array('icon' => 'sand-permeation-risk', 'title' => 'No cohesion', 'description' => "Faces ravel and collapse ('running sand') during excavation."),
                array('icon' => 'sand-permeation-risk', 'title' => 'High Permeability', 'description' => 'Water drives fines migration, piping/boiling and scour voids.'),
                array('icon' => 'sand-permeation-risk', 'title' => 'Load Transfer', 'description' => 'Local loss of bearing leads to slab deflection and differential settlement.'),
                array('icon' => 'sand-permeation-risk', 'title' => 'Service Influence', 'description' => 'Broken stormwater/irrigation and dewatering drawdown can accelerate material mobilisation.'),
            ),
        )),

        array('id' => 'seed-sand-scenarios', 'type' => 'sand-scenarios', 'section_key' => 'residential-sand-scenarios', 'label' => 'Typical Scenarios & Examples', 'fields' => array(
            'heading' => 'Typical scenarios & examples',
            'items' => array(
                array('icon' => 'sand-check', 'title' => 'Utility corridors and culvert inlets/outlets experiencing scour and voiding.'),
                array('icon' => 'sand-check', 'title' => 'Retention/SECANT pile support zones where sands would overbreak or wash out.'),
                array('icon' => 'sand-check', 'title' => "Driveway/pavement panels and approach slabs with edge washout ('pumping')."),
                array('icon' => 'sand-check', 'title' => 'Coastal and riverine sites with fluctuating groundwater or flood recovery works.'),
                array('icon' => 'sand-check', 'title' => 'Pre-treatment for trenches, pits and lift shafts in sandy ground.'),
            ),
        )),

        array('id' => 'seed-sand-process', 'type' => 'sand-process', 'section_key' => 'residential-sand-process', 'label' => 'How Sand-Permeation Works', 'fields' => array(
            'heading' => 'How Sand-Permeation Works',
            'items' => array(
                array('image' => 'images/sand-permeation/process-step-1.png', 'number' => '01', 'title' => 'Ground Model & Feasibility', 'description' => 'Assess whether the soil is genuinely groutable sand rather than silty or clay-heavy material. This stage defines groundwater conditions, fines content, permeability, density, and movement constraints to determine if permeation grouting is viable. The main goal is establishing the treatment envelope and acceptance criteria before any injection begins.'),
                array('image' => 'images/sand-permeation/process-step-2.png', 'number' => '02', 'title' => 'Bench Treatability & Grout Selection', 'description' => 'Test grout compatibility with the actual soil pore structure to ensure the grout can permeate without filtering, washing out, or setting too early. Grout type is selected based on particle size and performance requirements, typically using microfine cement for cleaner sands and colloidal silica or chemical grouts for finer or seepage-prone soils. Viscosity, gel time, bleed, and stability are critical QA factors.'),
                array('image' => 'images/sand-permeation/process-step-3.png', 'number' => '03', 'title' => 'Injection Grid & Pilot Calibration', 'description' => 'Develop the injection layout, spacing, staging, and pressure controls through a controlled pilot area. This phase calibrates the relationship between pressure, flow, grout take, and ground response before full production begins. Monitoring systems are established to prevent hydrofracture, uplift, or uncontrolled grout migration.'),
                array('image' => 'images/sand-permeation/process-step-4.png', 'number' => '04', 'title' => 'Primary Permeation Pass', 'description' => 'Carry out the main grout injection process using controlled low-pressure permeation to fill the natural pore spaces without displacing the soil structure. The objective is to create a continuous strengthened and water-tightened ground mass while maintaining stable intake rates and preventing heave or fracturing. Continuous pressure, flow, and volume monitoring are essential during execution.'),
                array('image' => 'images/sand-permeation/process-step-5.png', 'number' => '05', 'title' => 'Secondary Closure & Water Cut-Off', 'description' => 'Perform secondary or tertiary injections to close untreated windows and improve curtain continuity. This stage strengthens local weak zones and further reduces seepage pathways, often using finer or lower-viscosity grouts to penetrate remaining pore spaces missed during the primary pass. Hydraulic continuity and seepage reduction become the main performance targets.'),
                array('image' => 'images/sand-permeation/process-step-6.png', 'number' => '06', 'title' => 'Verification & Construction Integration', 'description' => 'Validate the completed treatment using independent proof testing such as permeability testing, CPTs, coring, pressure testing, or load testing. The grouted ground is then integrated into excavation, dewatering, footing support, or construction sequencing. Any areas failing acceptance criteria are identified for remedial injection before construction proceeds.'),
            ),
        )),

        array('id' => 'seed-sand-benefits', 'type' => 'sand-benefits', 'section_key' => 'residential-sand-benefits', 'label' => 'Benefits', 'fields' => array(
            'image' => 'images/sand-permeation/benefits-photo.png',
            'heading' => 'Benefits',
            'items' => array(
                array('icon' => 'sand-check', 'title' => 'Stable Excavation', 'description' => 'Reduced ravel/collapse risk.'),
                array('icon' => 'sand-check', 'title' => 'Controlled Inflows', 'description' => 'Reduced washout of fines.'),
                array('icon' => 'sand-check', 'title' => 'Improved Bearing Capacity', 'description' => 'Mitigates slab deflection and settlement.'),
                array('icon' => 'sand-check', 'title' => 'Non-destructive Delivery', 'description' => 'Small injection points; minimal disruption.'),
            ),
        )),

        array('id' => 'seed-sand-notes', 'type' => 'sand-notes', 'section_key' => 'residential-sand-notes', 'label' => 'Limitations & Cost', 'fields' => array(
            'col1_heading' => 'Limitations & Suitability',
            'col1_copy' => "Very fine silts/clayey soils may not accept permeation grouts—alternative methods required. High groundwater velocities can cause grout washout; cut-off or staged dewatering may be needed.\n\nAccess constraints or sensitive adjacent structures may limit injection pressures/spacing. Global stability issues (e.g., active slope movement) must be addressed in parallel—not just local sand binding.",
            'col2_heading' => 'Cost & Decision Factors',
            'col2_copy' => "Small, shallow, isolated areas may be cheaper to excavate and replace; injection has fixed entry/mobilisation costs.\n\nLarger treatment zones or works near valuable finishes/services favour grouting to avoid demolition and reinstatement.\n\nProgram risk: pre-treating sands to prevent collapse or inflows often avoids costly delays mid-construction.",
        )),

        array('id' => 'seed-sand-why', 'type' => 'sand-why', 'section_key' => 'residential-sand-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'chemical-why-engineering-led', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('icon' => 'chemical-why-structural-expertise', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('icon' => 'chemical-why-non-invasive', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('icon' => 'chemical-why-long-term', 'title' => 'Long-Term Confidence', 'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),

        array('id' => 'seed-sand-cta', 'type' => 'sand-cta', 'section_key' => 'residential-sand-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Stabilise Sands and Control Mobilisation?',
            'copy' => "We'll assess your ground conditions, design the right mix of permeation/compaction/resin solutions, and coordinate any water management needed to keep works safe and on schedule.",
            'primary_text' => 'Contact Us',
            'primary_url' => '/contact-us/',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/* -----------------------------------------------------------------------
 * "Cracked-style" pages (cracked-walls, foundation-repair, weak-soils,
 * open-uneven-control-joints, leaning-pillars, leaning-house-wall,
 * jammed-doors-windows, sloping-slab). All share the same block types
 * (rectify_pb_get_cracked_*_seed_blocks below produce one block per
 * hardcoded section, matched to the template's rectify_builder_render_section
 * calls by section_key).
 * ---------------------------------------------------------------------*/

function rectify_pb_get_cracked_walls_seed_blocks()
{
    return array(
        array('id' => 'seed-cracked-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-cracked-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Wall crack repair specialists in Melbourne & Adelaide',
            'breadcrumb_label' => 'Cracked Walls',
        )),
        array('id' => 'seed-cracked-intro', 'type' => 'cracked-band', 'section_key' => 'residential-cracked-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => "Repair structural wall cracks, foundation movement & subsidence without major excavation",
            'body' => "Cracks in walls are one of the earliest warning signs that your home's foundations may be moving. While some hairline cracks are simply the result of normal settling, widening, diagonal or recurring cracks can indicate foundation settlement, reactive soil movement or subsidence.\n\nAt Rectify, we specialise in identifying the root cause of structural wall cracks rather than simply repairing the visible damage. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property, helping prevent further movement while restoring structural stability.",
            'image' => 'images/cracked-walls/intro-wall-crack.png',
            'media_position' => 'last',
        )),
        array('id' => 'seed-cracked-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-cracked-whatis', 'label' => 'Why Are My Walls Cracking', 'fields' => array(
            'heading' => 'Why are my walls cracking?',
            'body' => "Wall cracks are one of the most common signs that something may be changing within your property. While some cracks are simply the result of normal ageing or minor building movement, others can indicate that the ground beneath your home has shifted, causing stress on the foundations and the structure above.\n\nAt Rectify, we believe the first step is understanding why the cracks have appeared. Identifying the underlying cause allows the correct repair solution to be selected, helping to prevent ongoing structural movement rather than simply hiding the visible damage.",
        )),
        array('id' => 'seed-cracked-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-cracked-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => '',
            'items' => array(
                array('image' => 'images/cracked-walls/foundation-settlement.png', 'title' => 'Foundation Settlement', 'description' => "Foundation settlement occurs when the soil beneath your home compresses or loses its ability to adequately support the building. As different areas of the foundation settle at different rates, stress is transferred into the walls, often resulting in cracks around doors, windows, corners, or brickwork.\n\nSettlement can develop gradually over many years or occur more quickly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before cosmetic repairs are undertaken."),
                array('image' => 'images/cracked-walls/reactive-clay-soil.png', 'title' => 'Reactive Clay Soils', 'description' => "Many Australian homes are built on reactive clay soils, which naturally expand when they absorb moisture and shrink as they dry out. This constant cycle of expansion and contraction places repeated pressure on foundations.\n\nOver time, these seasonal soil movements can cause foundations to lift or settle unevenly, leading to cracks in internal plaster, brickwork, and external walls. Reactive soils are one of the most common causes of structural movement throughout Australia."),
                array('image' => 'images/cracked-walls/seasonal-moisture.png', 'title' => 'Seasonal Moisture Changes', 'description' => "Extended dry periods followed by heavy rainfall can significantly alter moisture levels within the ground surrounding your property. As soil dries, it contracts, and when moisture returns, it expands again.\n\nThese natural seasonal cycles can cause gradual foundation movement, particularly where soil conditions are already reactive. The resulting movement often appears as new wall cracks or the widening of existing cracks over time."),
                array('image' => 'images/cracked-walls/tree-roots.jpg', 'title' => 'Tree Roots', 'description' => "Large trees and established vegetation located close to a building can affect soil moisture by drawing water from the ground through their root systems. This drying effect may cause certain soils to shrink unevenly beneath sections of the foundation.\n\nIf movement becomes uneven across the structure, cracks may begin to appear in walls, brickwork, or concrete slabs. Professional assessment can determine whether nearby vegetation is contributing to foundation movement."),
                array('image' => 'images/cracked-walls/leaking-pipes.jpg', 'title' => 'Leaking Pipes', 'description' => "Underground water leaks, damaged stormwater systems, or leaking plumbing can introduce excess moisture into the soil beneath a building. Over time, this may soften the supporting ground, wash away fine particles, or create underground voids.\n\nAs the soil loses strength, sections of the foundation may settle unevenly, leading to structural movement and wall cracking. Addressing the water source is an important part of any long-term repair strategy."),
                array('image' => 'images/cracked-walls/erosion.png', 'title' => 'Erosion', 'description' => "Water movement beneath or around a property can gradually erode supporting soils, reducing the stability of foundations. Heavy rainfall, poor drainage, uncontrolled surface water, or underground water flow may all contribute to erosion over time.\n\nAs supporting ground is lost, foundations can begin to move, causing cracks in walls, uneven floors, and other signs of structural distress. Rectify specialises in ground improvement and erosion remediation designed to restore ground stability while minimising disruption."),
                array('image' => 'images/cracked-walls/compacted-fill.jpg', 'title' => 'Poorly Compacted Fill', 'description' => "If the soil beneath a building was not adequately compacted during construction, it may continue to compress long after the building has been completed. This gradual compression can create differential settlement, where one section of the building settles more than another.\n\nThe resulting movement places stress on the structure and may lead to cracking in walls, ceilings, floors, and other building elements."),
                array('image' => 'images/cracked-walls/nearby-excavation.png', 'title' => 'Nearby Excavation', 'description' => "Construction work on neighbouring properties, roadworks, service trenching, or other excavation activities can sometimes disturb surrounding ground conditions. Removing or altering soil close to existing foundations may change how the ground supports nearby structures.\n\nAlthough not every excavation causes damage, significant ground disturbance has the potential to contribute to foundation movement and the development of structural cracks in some situations."),
                array('image' => 'images/cracked-walls/ageing-foundations.jpg', 'title' => 'Ageing Foundations', 'description' => "As buildings age, construction materials naturally experience decades of environmental exposure, loading, and ground movement. While many older homes remain structurally sound, ageing foundations may become more susceptible to movement if soil conditions change or drainage deteriorates.\n\nOlder properties may therefore develop wall cracks as a result of cumulative movement rather than a single isolated event. A professional inspection can determine whether the movement is historic, ongoing, or requires remediation."),
            ),
        )),
        array('id' => 'seed-cracked-matters', 'type' => 'cracked-band', 'section_key' => 'residential-cracked-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why identifying the cause matters',
            'body' => "Identifying the cause of wall cracks is essential before cosmetic repairs are attempted. Repairing the crack without stabilising the underlying foundation often results in the crack returning.\n\nAt Rectify, we focus on diagnosing the source of the movement first. Where foundation instability is identified, solutions such as chemical underpinning, polyurethane resin injection, and other ground engineering techniques can stabilise the supporting ground before cosmetic repairs are completed. This approach addresses the root cause rather than simply covering up the symptoms.",
            'image' => 'images/cracked-walls/why-matters-worker.png',
            'media_position' => 'first',
            'soft' => 'yes',
        )),
        array('id' => 'seed-cracked-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-cracked-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-cracked-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-cracked-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/cracked-walls/before-crack.jpg',
            'after_image' => 'images/cracked-walls/after-crack.jpg',
        )),
        array('id' => 'seed-cracked-help', 'type' => 'cracked-help', 'section_key' => 'residential-cracked-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * The 6 "Why Homeowners Choose Rectify" advantage cards are identical
 * boilerplate across every cracked-style page, so they're centralised here
 * rather than repeated in each seed function below.
 *
 * @return array
 */
function rectify_pb_get_cracked_advantage_items()
{
    return array(
        array('icon' => 'adv-home-experience', 'title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.'),
        array('icon' => 'adv-home-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.'),
        array('icon' => 'adv-home-delivery', 'title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
        array('icon' => 'adv-home-affordable', 'title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
        array('icon' => 'adv-home-quality', 'title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
        array('icon' => 'adv-home-trustworthy', 'title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
    );
}

function rectify_pb_get_foundation_repair_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-foundation-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-foundation-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Foundation Repair Melbourne & South Australia',
            'breadcrumb_label' => 'Foundation Repair',
        )),
        array('id' => 'seed-foundation-intro', 'type' => 'cracked-band', 'section_key' => 'residential-foundation-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Foundation Repair Solutions for Long-Term Structural Stability',
            'body' => "Your home's foundation supports the entire structure. When the ground beneath it begins to move, settle, or weaken, the effects can be seen throughout the property—from cracked walls and uneven floors to sticking doors and slipping concrete slabs.\n\nAt Rectify, we specialise in foundation repair for residential properties across Melbourne, Victoria, and South Australia. Our experienced ground engineering team identifies the underlying cause of structural movement and delivers engineered solutions designed to restore stability while minimising disruption to your home.\n\nWhether your property is experiencing early signs of settlement or more advanced structural movement, we're here to help protect your home with proven, long-term solutions.",
            'image' => 'images/home/Wall-with-prop7.jpg',
            'media_position' => 'last',
            'pin' => 'yes',
        )),
        array('id' => 'seed-foundation-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-foundation-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'What Is Foundation Repair?',
            'body' => 'Foundation repair is the process of stabilizing and strengthening the ground and foundations that support your home. Rather than simply repairing visible cracks or cosmetic damage, effective foundation repair addresses the underlying cause of structural movement.',
        )),
        array('id' => 'seed-foundation-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-foundation-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => 'What Causes Foundation Movement?',
            'items' => array(
                array('icon' => 'cracked-reactive-soil', 'title' => 'Reactive Clay Soils', 'description' => 'Reactive clay expands during wet conditions and contracts as the ground dries. These repeated moisture changes place continual stress on foundations and can lead to differential settlement.'),
                array('icon' => 'cracked-void-filling', 'title' => 'Poor Soil Compaction', 'description' => 'If the fill material beneath a home was not adequately compacted during construction, it may continue to compress over time, causing foundations to settle unevenly.'),
                array('icon' => 'cracked-water-leaking', 'title' => 'Water Leaks Beneath Foundations', 'description' => 'Leaking water services, damaged stormwater pipes or poor drainage can soften supporting soils and reduce their ability to carry structural loads.'),
                array('icon' => 'cracked-sinkhole', 'title' => 'Erosion', 'description' => 'Groundwater movement and poor drainage may gradually wash supporting soils away, leaving foundations without adequate support.'),
                array('icon' => 'cracked-trees-vegetation', 'title' => 'Tree Root Activity', 'description' => 'Large trees, particularly reactive clay soils, can cause shrinkage and uneven foundation movement.'),
                array('icon' => 'cracked-void-beneath-foundation', 'title' => 'Natural Foundation Settlement', 'description' => 'Older homes often experience gradual settlement as soil conditions change over many years. While some settlement is expected, excessive settlement should be professionally assessed.'),
            ),
        )),
        array('id' => 'seed-foundation-matters', 'type' => 'cracked-band', 'section_key' => 'residential-foundation-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why Professional Assessment Is Important',
            'body' => "At Rectify, we take an engineered-led approach to foundation repair. Our specialists carry out a comprehensive site assessment to identify the factors contributing to structural movement, including reactive soils, moisture fluctuations, erosion, inadequate soil compaction, voids beneath the foundation, or foundation settlement. Once the root cause has been identified, we develop a tailored remediation solution using proven techniques such as chemical underpinning, soil stabilisation, ground improvement, and foundation repair.\n\nRather than simply repairing the visible damage, we address the source of the movement to help protect your home against future foundation issues. Our long-term solutions have helped homeowners across Melbourne, Victoria and South Australia safeguard one of their most valuable assets.",
            'image' => 'images/guide-worker.jpg',
            'media_position' => 'first',
        )),
        array('id' => 'seed-foundation-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-foundation-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-foundation-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-foundation-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/home/before-after-1.png',
            'after_image' => 'images/home/before-after-2.png',
        )),
        array('id' => 'seed-foundation-help', 'type' => 'cracked-help', 'section_key' => 'residential-foundation-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * Figma-matched Foundation Stabilisation content.
 * Node 815:11836 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_foundation_repair_seed_blocks()
{
    return array(
        array('id' => 'seed-foundation-banner-figma', 'type' => 'foundation-banner', 'section_key' => 'residential-foundation-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Foundation Stabilisation',
            'breadcrumb_label' => 'Foundation Stabilisation',
        )),
        array('id' => 'seed-foundation-intro-figma', 'type' => 'foundation-intro', 'section_key' => 'residential-foundation-intro', 'label' => 'Introduction', 'fields' => array(
            'heading' => 'Engineered Solutions to Stop Foundation Movement at Its Source',
            'body' => 'When the ground beneath your home moves, your foundation moves with it. Rectify provides engineered foundation stabilisation solutions that address the underlying cause of settlement and movement—not just the visible symptoms. Using advanced ground engineering and structural stabilisation techniques, we restore stability while minimising disruption to your property.',
            'image' => 'images/foundation-stabilisation/intro-technician.jpg',
            'image_alt' => 'Rectify technician stabilising the foundation beside a brick home',
        )),
        array('id' => 'seed-foundation-overview-figma', 'type' => 'foundation-overview', 'section_key' => 'residential-foundation-overview', 'label' => 'What Is Foundation Stabilisation', 'fields' => array(
            'heading' => 'What is Foundation Stabilisation',
            'body' => "Foundation movement is rarely caused by the concrete itself. In most cases, changes beneath the foundation—such as reactive clay soils, erosion, moisture variation, poor compaction or underground voids—cause the structure to settle or move over time. Understanding soil behaviour and site conditions is fundamental to selecting the right stabilisation approach. Australian residential sites are commonly classified according to soil reactivity, with highly reactive soils requiring more robust foundation solutions to accommodate or resist movement.\n\nAt Rectify, every project begins with identifying the source of movement. Rather than masking symptoms, we engineer solutions that improve the ground conditions supporting your home and restore long-term structural performance.",
            'signs_heading' => 'Foundation stabilisation may be recommended if your home has:',
            'signs' => array(
                array('text' => 'Cracking walls, ceilings or brickwork'),
                array('text' => 'Uneven or sloping floors'),
                array('text' => 'Doors and windows that stick or no longer close properly'),
                array('text' => 'Sunken concrete slabs or footings'),
                array('text' => 'Ongoing movement caused by reactive soils'),
                array('text' => 'Localised settlement from erosion or underground voids'),
            ),
        )),
        array('id' => 'seed-foundation-solutions-figma', 'type' => 'foundation-solutions', 'section_key' => 'residential-foundation-solutions', 'label' => 'Foundation Stabilisation Solutions', 'fields' => array(
            'heading' => 'Our Foundation Stabilisation Solutions',
            'lead' => "Every home experiences different ground conditions, which is why there is no one-size-fits-all solution. Rectify's engineers assess your property and recommend the most appropriate stabilisation method based on soil conditions, foundation type and structural movement.",
            'image' => 'images/foundation-stabilisation/cracked-foundation.jpg',
            'image_alt' => 'Cracked concrete foundation revealing weakened supporting ground',
            'items' => array(
                array('image' => 'images/foundation-stabilisation/chemical-underpinning.svg', 'title' => 'Chemical Underpinning', 'description' => 'Advanced expanding resin is injected beneath the foundation to fill voids, strengthen weak ground and restore support to settled structures with minimal excavation.'),
                array('image' => 'images/foundation-stabilisation/ground-improvement.svg', 'title' => 'Ground Improvement', 'description' => 'Where poor soil conditions are the primary cause of movement, engineered ground improvement techniques increase soil density and bearing capacity before further structural damage occurs.'),
                array('image' => 'images/foundation-stabilisation/chemical-underpinning.svg', 'title' => 'Soil Stabilisation', 'description' => 'Weak, loose or moisture-sensitive soils can be strengthened through specialised ground treatment methods that improve long-term foundation performance and reduce future settlement.'),
                array('image' => 'images/foundation-stabilisation/ground-improvement.svg', 'title' => 'Foundation Repair', 'description' => 'Where movement has already affected the structure, Rectify can restore stability through integrated foundation repair solutions designed specifically for the identified cause.'),
            ),
        )),
        array('id' => 'seed-foundation-causes-figma', 'type' => 'foundation-causes-table', 'section_key' => 'residential-foundation-causes', 'label' => 'Why Foundations Move', 'fields' => array(
            'heading' => 'Why Foundations Move?',
            'subheading' => 'Understanding the Cause is the First Step to the Solution',
            'lead' => "Many structural issues begin below ground long before cracks become visible. Changes in soil moisture, inadequate compaction, erosion and underground voids can all reduce the support beneath a home's foundation.",
            'items' => array(
                array('title' => 'Reactive Clay Soil', 'description' => 'Expansion and shrinkage cause seasonal movement beneath foundations.'),
                array('title' => 'Water Leaks', 'description' => 'Softens supporting soils and creates localised settlement.'),
                array('title' => 'Erosion', 'description' => 'Washes away supporting soil beneath slabs and footings.'),
                array('title' => 'Poor site compaction', 'description' => 'Allows foundations to settle over time.'),
                array('title' => 'Underground voids', 'description' => 'Reduces foundation support and increases differential settlement.'),
                array('title' => 'Tree roots and moisture changes', 'description' => 'Dry reactive soils causing shrinkage and movement around the home.'),
            ),
        )),
        array('id' => 'seed-foundation-why-figma', 'type' => 'foundation-why', 'section_key' => 'residential-foundation-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/foundation-stabilisation/engineering-led.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/foundation-stabilisation/structural-expertise.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/foundation-stabilisation/non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/foundation-stabilisation/long-term.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-foundation-cta-figma', 'type' => 'foundation-cta', 'section_key' => 'residential-foundation-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Protect Your Home Before Foundation Movement Gets Worse',
            'copy' => 'Foundation movement rarely resolves itself. An early engineering assessment can identify the cause of the problem and recommend the most effective solution before further structural damage occurs.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_weak_soils_seed_blocks()
{
    return array(
        array('id' => 'seed-soil-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-soil-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Soil Stabilisation Melbourne & South Australia',
            'breadcrumb_label' => 'Soil Stabilisation',
        )),
        array('id' => 'seed-soil-intro', 'type' => 'cracked-band', 'section_key' => 'residential-soil-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Strengthen Weak Ground with Engineered Soil Stabilisation Solutions',
            'body' => "Weak or unstable soil can lead to foundation settlement, wall cracks, uneven floors, sinking concrete slabs, and ongoing structural movement.\n\nAt Rectify, we provide advanced soil stabilisation solutions that improve ground strength beneath residential properties across Melbourne, Victoria, and South Australia. Using innovative ground improvement methodologies, we stabilise weak soils with minimal disruption, helping protect your home's structural integrity for the long term.\n\nWhether you're experiencing early signs of foundation movement or require a proactive ground improvement solution, Rectify delivers tailored recommendations based on your property's unique ground conditions.",
            'image' => 'images/home/IMG_0867-1.jpg',
            'media_position' => 'last',
            'pin' => 'yes',
        )),
        array('id' => 'seed-soil-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-soil-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'What Is Soil Stabilisation?',
            'body' => 'Soil stabilisation is an engineered process used to strengthen weak or unstable ground so it can safely support buildings, slabs, footings, and foundations. Rather than simply repairing visible structural damage, soil stabilisation addresses the underlying cause by improving the engineering properties of the soil beneath the structure.',
        )),
        array('id' => 'seed-soil-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-soil-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => 'What Causes Weak or Unstable Soil?',
            'items' => array(
                array('icon' => 'cracked-reactive-soil', 'title' => 'Seasonal Moisture Changes', 'description' => 'Changes in seasonal weather can have a significant effect on the ground beneath your home. Extended dry conditions may cause certain soil types, particularly reactive clay, to shrink, while periods of heavy rainfall can increase soil moisture and reduce soil strength.'),
                array('icon' => 'cracked-void-filling', 'title' => 'Inadequate Soil Compaction', 'description' => "A building's long-term stability depends on the strength of the ground supporting its foundations. If the soil or fill material beneath a home was not compacted correctly during construction, it may continue to settle long after the building has been completed."),
                array('icon' => 'cracked-water-leaking', 'title' => 'Underground Water Leaks', 'description' => 'Hidden leaks beneath a property can gradually weaken the supporting soil without being immediately visible. Damaged water pipes, leaking stormwater systems, or damaged plumbing can introduce excess moisture into the ground, in some cases creating underground voids.'),
                array('icon' => 'cracked-sinkhole', 'title' => 'Erosion Beneath Foundations', 'description' => "Erosion occurs when water gradually removes or weakens the soil supporting a building's foundations. Poor site drainage, groundwater movement, or damaged infrastructure can all contribute to the gradual loss of supporting material."),
                array('icon' => 'cracked-underpinning', 'title' => 'Ageing Foundations', 'description' => 'Many buildings naturally experience gradual settlement over decades as soil conditions change. While older foundations often remain structurally sound for years, environmental exposure and changing ground conditions can make them more susceptible to movement.'),
                array('icon' => 'cracked-void-beneath-foundation', 'title' => 'Underground Voids', 'description' => 'Underground voids are empty spaces that develop beneath concrete slabs or foundations after soil has been displaced, compressed, or washed away. Without adequate support, the concrete above may begin to sink, crack, or move.'),
            ),
        )),
        array('id' => 'seed-soil-matters', 'type' => 'cracked-band', 'section_key' => 'residential-soil-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why Professional Assessment Is Important',
            'body' => "Cracks, uneven floors or sticking doors are often a symptom of weak or unstable ground beneath the structure rather than the root cause of the problem. A detailed site inspection can identify whether moisture variation, inadequate compaction, or foundation settlement is contributing to the movement.\n\nAt Rectify, our experienced ground engineering specialists assess the underlying cause of foundation movement and recommend tailored remediation solutions, including soil stabilisation, ground improvement, chemical underpinning, and foundation repair. By addressing the source of the problem—not just the visible symptoms—we help homeowners achieve long-term structural stability across Melbourne, Victoria, and South Australia.",
            'image' => 'images/home/Wall-with-prop7.jpg',
            'media_position' => 'first',
        )),
        array('id' => 'seed-soil-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-soil-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-soil-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-soil-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/home/before-after-1.png',
            'after_image' => 'images/home/before-after-2.png',
        )),
        array('id' => 'seed-soil-help', 'type' => 'cracked-help', 'section_key' => 'residential-soil-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_open_uneven_control_joints_seed_blocks()
{
    return array(
        array('id' => 'seed-joints-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-joints-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Open & Uneven Control Joint Repair in Melbourne & Adelaide',
            'breadcrumb_label' => 'Open Uneven Control Joints',
        )),
        array('id' => 'seed-joints-intro', 'type' => 'cracked-band', 'section_key' => 'residential-joints-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Repair Foundation Movement Affecting Brick Articulation Joints Without Major Excavation',
            'body' => "Control joints (also known as articulation joints) are intentionally built into brickwork to allow buildings to expand, contract and move slightly with seasonal temperature and moisture changes. However, when these joints become noticeably wider, uneven or misaligned, they may be signalling movement beneath your home's foundations rather than normal building movement.\n\nAt Rectify, we specialise in identifying whether open or uneven control joints are performing as intended or whether they indicate foundation settlement, subsidence or soil movement. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property to help prevent ongoing structural movement with minimal excavation and disruption.",
            'image' => 'images/open-uneven-control-joints/intro-control-joint.jpg',
            'media_position' => 'last',
        )),
        array('id' => 'seed-joints-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-joints-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Are My Control Joints Opening?',
            'body' => "Control joints, also known as articulation joints or expansion joints, are designed to accommodate small amounts of normal building movement caused by temperature changes, material expansion, and minor foundation settlement. However, if these joints become noticeably wider, uneven, or continue to open over time, they may indicate movement occurring beneath the building rather than normal structural behaviour.\n\nIn many cases, widening control joints are a symptom of foundation movement caused by changing ground conditions. Identifying the underlying cause is essential to determine whether the movement is within expected limits or whether foundation remediation is required. At Rectify, we investigate the source of the movement before recommending the most appropriate solution.",
        )),
        array('id' => 'seed-joints-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-joints-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => '',
            'items' => array(
                array('image' => 'images/open-uneven-control-joints/seasonal-moisture.jpg', 'title' => 'Seasonal Moisture Variation', 'description' => "Seasonal changes in rainfall and temperature can significantly affect the moisture content of the soil beneath a building. During prolonged dry periods, soil may contract, while heavy rainfall can cause it to expand or soften.\n\nThese natural cycles of movement can result in repeated foundation movement, causing control joints to gradually widen over time. Monitoring changes in articulation joints between seasons can help identify ongoing structural movement."),
                array('image' => 'images/open-uneven-control-joints/poor-soil-compaction.jpg', 'title' => 'Poor Soil Compaction', 'description' => "If the soil or fill material beneath a home was not adequately compacted during construction, it can continue to compress or shift over time, reducing the support available to the footings above.\n\nAs the ground gradually consolidates, differential foundation movement can occur, causing articulation joints to widen or become uneven. An engineering assessment can identify whether poorly compacted ground is contributing to the movement."),
                array('image' => 'images/open-uneven-control-joints/underground-water-leaks.jpg', 'title' => 'Underground Water Leaks', 'description' => "Leaking water pipes, damaged stormwater systems, or underground plumbing failures can introduce excess moisture beneath foundations. This may weaken the supporting soil, wash away fine particles, or create underground voids.\n\nAs the ground loses strength, differential foundation movement may occur, causing articulation joints to widen and structural cracks to develop. Repairing the source of the leak is an important part of preventing further movement."),
                array('image' => 'images/open-uneven-control-joints/erosion.jpg', 'title' => 'Erosion', 'description' => "Erosion occurs when flowing water gradually removes or weakens the soil supporting a building's foundations. Poor drainage, heavy rainfall, groundwater movement, or damaged drainage systems can all contribute to the loss of supporting ground.\n\nAs erosion progresses, foundations may settle unevenly, resulting in widening control joints, cracking, and other signs of structural movement. Rectify provides advanced ground improvement and erosion remediation solutions designed to restore support while minimising disruption."),
                array('image' => 'images/open-uneven-control-joints/ageing-foundations.jpg', 'title' => 'Ageing Foundations', 'description' => "Over time, buildings naturally experience decades of seasonal movement, environmental exposure, and gradual settlement. While many older foundations remain structurally sound, changing soil conditions and ageing infrastructure can make them more susceptible to movement.\n\nWhen combined with other contributing factors, ageing foundations may result in articulation joints gradually opening beyond their original design tolerance. An engineering assessment can determine whether the movement is historical or ongoing."),
                array('image' => 'images/open-uneven-control-joints/poor-drainage.jpg', 'title' => 'Poor Drainage', 'description' => "Poor drainage can allow excessive water to collect around foundations, weakening supporting soils or causing reactive clay to expand. In other situations, inadequate drainage may contribute to erosion or uneven drying of the ground.\n\nOver time, these changing ground conditions can lead to foundation movement, affecting the alignment of doors, windows, walls, and floors. Maintaining effective site drainage is an important part of protecting a property's structural integrity."),
            ),
        )),
        array('id' => 'seed-joints-matters', 'type' => 'cracked-band', 'section_key' => 'residential-joints-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'When Should You Be Concerned?',
            'body' => "While articulation joints are designed to accommodate movement, excessive widening or uneven alignment often indicates that the supporting foundations are moving beyond their intended tolerance.\n\nAt Rectify, we begin by identifying the cause of the movement before recommending any repairs. Where foundation instability is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can improve ground support and help minimise further structural movement. By addressing the source of the problem rather than simply repairing the visible symptoms, we provide long-term solutions for residential, commercial, industrial, and infrastructure assets.",
            'image' => 'images/open-uneven-control-joints/concerned-control-joint.jpg',
            'media_position' => 'first',
            'flip' => 'yes',
            'soft' => 'yes',
        )),
        array('id' => 'seed-joints-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-joints-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-joints-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-joints-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/open-uneven-control-joints/before-control-joint.jpg',
            'after_image' => 'images/open-uneven-control-joints/after-control-joint.jpg',
        )),
        array('id' => 'seed-joints-help', 'type' => 'cracked-help', 'section_key' => 'residential-joints-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_leaning_pillars_seed_blocks()
{
    return array(
        array('id' => 'seed-pillars-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-pillars-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Leaning Pillar & Chimney Repair Specialists in Melbourne & Adelaide',
            'breadcrumb_label' => 'Leaning Pillars Chimneys',
        )),
        array('id' => 'seed-pillars-intro', 'type' => 'cracked-band', 'section_key' => 'residential-pillars-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore Structural Stability Without Major Excavation Using Advanced Ground Engineering Solutions',
            'body' => "A leaning pillar or chimney is often one of the most noticeable signs that the supporting foundation has shifted. While the movement may begin gradually, continued settlement beneath the footing can cause masonry structures to tilt, separate from the home, crack or become unstable over time.\n\nBecause brick chimneys and entrance pillars are heavy, concentrated structures, they place significant pressure on the ground beneath them. If the supporting soil weakens through foundation settlement, reactive clay movement, erosion or underground voids, the structure can begin to lean even when the rest of the building appears stable.\n\nAt Rectify, we identify the underlying cause of structural movement before recommending an engineered repair solution. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting soils beneath pillars and chimneys, helping restore stability with minimal excavation and disruption.",
            'image' => 'images/leaning-pillars/hero-intro.jpg',
            'media_position' => 'last',
        )),
        array('id' => 'seed-pillars-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-pillars-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Is My Chimney or Brick Pillar Leaning?',
            'body' => "A leaning chimney or brick pillar is often a sign that the foundation supporting the structure has moved. While the brickwork itself may appear to be the problem, the underlying cause is commonly found beneath the footing, where changing ground conditions reduce the stability of the supporting soil.\n\nChimneys, entrance pillars, boundary pillars, and other masonry structures are particularly vulnerable because they are heavy, rigid, and less able to accommodate movement. Even minor foundation movement can cause these structures to lean, crack, or separate from adjoining walls. At Rectify, we investigate the cause of the movement before recommending the most appropriate remediation solution, ensuring repairs address the source of the problem rather than just the visible symptoms.",
        )),
        array('id' => 'seed-pillars-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-pillars-causes', 'label' => 'Causes', 'fields' => array(
            'items' => array(
                array('image' => 'images/leaning-pillars/reactive-clay-soils.jpg', 'title' => 'Reactive Clay Soils', 'description' => "Reactive clay soils are common throughout many parts of Australia and naturally expand when wet and shrink during dry periods. These repeated cycles of movement place continual pressure on foundations and footings.\n\nAs the soil expands and contracts unevenly, isolated structures such as chimneys and brick pillars may begin to tilt, crack, or separate from adjoining walls. Reactive clay is one of the most common causes of foundation movement affecting residential properties."),
                array('image' => 'images/leaning-pillars/foundation-settlement.jpg', 'title' => 'Foundation Settlement', 'description' => "Foundation settlement occurs when the soil beneath a footing compresses or loses its ability to support the structure evenly. As one side of the footing settles more than the other, the chimney or brick pillar can gradually lean out of alignment.\n\nSettlement may occur slowly over many years or develop more rapidly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before masonry repairs are undertaken."),
                array('image' => 'images/leaning-pillars/poor-soil-compaction.jpg', 'title' => 'Poor Soil Compaction', 'description' => "Properly compacted soil provides the stable base needed to support masonry structures. If the fill beneath a footing was not adequately compacted during construction, it can continue to compress long after the building is completed.\n\nAs the supporting ground settles, the footing may move unevenly, causing brick pillars or chimneys to lean and develop structural cracks. Ground improvement can help restore support beneath affected footings."),
                array('image' => 'images/leaning-pillars/subsidence.jpg', 'title' => 'Subsidence', 'description' => "Subsidence is the downward movement of the ground beneath a structure caused by weakening or loss of soil support. When the soil beneath a chimney or pillar subsides, the footing may settle unevenly, causing the masonry above to lean.\n\nIn addition to visible leaning, subsidence may also result in cracking through brickwork, separation from the house, sticking doors and windows, and uneven floors. A professional assessment is essential to determine the extent of the movement and the most appropriate repair solution."),
                array('image' => 'images/leaning-pillars/water-leaks-beneath-footings.jpg', 'title' => 'Water Leaks Beneath Footings', 'description' => "Leaking water pipes, damaged stormwater systems, or underground plumbing failures can introduce excess moisture beneath foundations. This may soften the soil, wash away fine particles, or create voids beneath footings.\n\nAs the supporting ground weakens, masonry structures can begin to settle unevenly, causing visible leaning or cracking. Repairing the source of the water leak is an important part of preventing further movement."),
                array('image' => 'images/leaning-pillars/underground-voids.jpg', 'title' => 'Underground Voids', 'description' => "Underground voids develop when soil beneath a footing is displaced, washed away, or compresses over time. Without adequate support, the footing may begin to settle unevenly, allowing the structure above to lean.\n\nRectify uses advanced polyurethane resin injection technology to fill underground voids, strengthen weak soils, and restore support beneath affected foundations without the need for extensive excavation. This non-invasive approach helps stabilise the footing while minimising disruption."),
            ),
        )),
        array('id' => 'seed-pillars-matters', 'type' => 'cracked-band', 'section_key' => 'residential-pillars-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why Identifying the Cause Matters',
            'body' => "In many cases, the visible lean is not the root problem. The movement usually begins beneath the footing, where unstable soil causes the structure above to shift over time. Repairing the masonry without stabilising the foundation often results in the same problem returning.\n\nAt Rectify, we focus on identifying and treating the source of the movement before cosmetic repairs are undertaken. Where unstable ground or foundation settlement is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can restore support beneath the footing. By addressing the underlying cause rather than simply repairing the visible damage, we help provide a long-term solution for residential, commercial, and infrastructure assets.",
            'image' => 'images/leaning-pillars/why-identifying-cause-matters.jpg',
            'media_position' => 'first',
        )),
        array('id' => 'seed-pillars-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-pillars-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-pillars-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-pillars-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/leaning-pillars/before-after-1.jpg',
            'after_image' => 'images/leaning-pillars/before-after-2.jpg',
        )),
        array('id' => 'seed-pillars-help', 'type' => 'cracked-help', 'section_key' => 'residential-pillars-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_leaning_house_wall_seed_blocks()
{
    return array(
        array('id' => 'seed-wall-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-wall-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Leaning House Wall Repair in Melbourne & Adelaide',
            'breadcrumb_label' => 'Leaning House Walls',
        )),
        array('id' => 'seed-wall-intro', 'type' => 'cracked-band', 'section_key' => 'residential-wall-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore Structural Stability with Advanced Foundation Repair & Ground Stabilisation',
            'body' => "A leaning wall is one of the clearest signs that your property may be experiencing structural movement. While some walls may appear to lean gradually over many years, others can develop more rapidly due to changing ground conditions, foundation settlement or soil movement.\n\nIn many cases, the problem does not originate in the wall itself—it is supporting the movement occurring beneath the structure. Changes in soil conditions, a lean that is visible along a section of the wall, or internal walls that are visibly out of alignment can all be a sign of ongoing structural movement.\n\nAt Rectify, we specialise in identifying the underlying cause of leaning walls before recommending the most appropriate repair. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property, helping restore stability with minimal disruption compared to traditional excavation methods.",
            'image' => 'images/home/Wall-with-prop7.jpg',
            'media_position' => 'last',
            'pin' => 'yes',
        )),
        array('id' => 'seed-wall-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-wall-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Is My House Wall Leaning?',
            'body' => 'A leaning wall is often a sign that the ground supporting the structure has shifted. While some walls appear slightly out of alignment due to age or construction tolerances, a wall that is visibly leaning, towing, or moving out of plumb should be professionally assessed.',
        )),
        array('id' => 'seed-wall-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-wall-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => 'What Causes Leaning House Walls?',
            'items' => array(
                array('icon' => 'cracked-void-beneath-foundation', 'title' => 'Foundation Settlement', 'description' => 'Foundation settlement occurs when the ground beneath a footing compresses or loses its ability to support the structure evenly. As different sections of the footing settle more than others, the wall can gradually begin to lean or misalign.'),
                array('icon' => 'cracked-reactive-soil', 'title' => 'Reactive Clay Soils', 'description' => 'Reactive clay soils are common throughout many parts of Australia and naturally absorb moisture and shrink and swell during dry periods. These repeated cycles of expansion and contraction can cause a wall to lean or crack over time.'),
                array('icon' => 'cracked-realignment', 'title' => 'Subsidence', 'description' => 'Subsidence is the downward movement of a building caused by weakening or loss of soil support. As the ground beneath a wall subsides, foundations may also become misaligned, causing walls to lean or become unstable.'),
                array('icon' => 'cracked-void-filling', 'title' => 'Poor Soil Compaction', 'description' => 'Buildings rely on properly compacted soil to provide long-term support. If fill material beneath the foundations was not adequately compacted during construction, it can continue to compress over time.'),
                array('icon' => 'cracked-sinkhole', 'title' => 'Erosion', 'description' => "Erosion gradually removes or weakens the soil supporting a building's foundations. Heavy rainfall, groundwater movement, damaged stormwater systems, or long-term water infiltration can all contribute to the loss of supporting material beneath a structure."),
                array('icon' => 'civil-utilities-water', 'title' => 'Drainage Issues', 'description' => 'Poor drainage around a property can have a significant impact on foundation performance. Water pooling near foundations or flowing towards the walls can soften supporting soil and, in some cases, contribute to the loss of support beneath the structure.'),
            ),
        )),
        array('id' => 'seed-wall-matters', 'type' => 'cracked-band', 'section_key' => 'residential-wall-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why Identifying the Cause Matters',
            'body' => "Identifying the cause of the movement is essential before repairing any cosmetic damage. By investigating the underlying cause of structural movement before a solution is recommended, we ensure the problem is solved for good.\n\nAt Rectify, once unstable soil or foundation movement is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, and foundation and soil stabilisation techniques can restore support beneath the structure. By addressing the root cause rather than simply repairing the visible damage, we provide a more durable, long-lasting solution for homes, commercial buildings, and infrastructure.",
            'image' => 'images/guide-worker.jpg',
            'media_position' => 'first',
        )),
        array('id' => 'seed-wall-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-wall-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-wall-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-wall-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/home/before-after-1.png',
            'after_image' => 'images/home/before-after-2.png',
        )),
        array('id' => 'seed-wall-help', 'type' => 'cracked-help', 'section_key' => 'residential-wall-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_jammed_doors_windows_seed_blocks()
{
    return array(
        array('id' => 'seed-doors-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-doors-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Jammed Doors & Sticking Windows Repair in Melbourne & Adelaide',
            'breadcrumb_label' => 'Jammed Doors & Windows',
        )),
        array('id' => 'seed-doors-intro', 'type' => 'cracked-band', 'section_key' => 'residential-doors-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Fix foundation movement causing Doors & Windows to stick without major excavation',
            'body' => "Doors and windows that suddenly become difficult to open or close are often more than a minor inconvenience. While seasonal temperature and humidity changes can sometimes affect timber frames, persistent sticking, jamming or misalignment may indicate movement beneath your home's foundations.\n\nAs the supporting ground shifts, foundations can settle unevenly, causing the structure to move. Even small amounts of foundation movement can place stress on door and window openings, resulting in sticking doors, windows that no longer slide smoothly, visible gaps around frames, or locks that no longer align correctly.\n\nAt Rectify, we identify the root cause of structural movement using advanced assessment techniques before recommending engineered solutions such as chemical underpinning, polyurethane resin injection and ground stabilisation. Rather than simply adjusting the door or window, our goal is to restore stability to the foundation and help prevent future movement.",
            'image' => 'images/jammed-doors-windows/hero-intro.jpg',
            'media_position' => 'last',
        )),
        array('id' => 'seed-doors-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-doors-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Are My Doors or Windows Suddenly Sticking?',
            'body' => "Doors and windows that suddenly become difficult to open or close are often more than just an inconvenience—they can be an early warning sign of foundation movement. As the ground beneath a building shifts, the structure can move slightly out of alignment, causing door and window frames to twist or become distorted.\n\nWhile changes in temperature and humidity can occasionally affect timber doors and windows, persistent sticking or jamming—especially when combined with wall cracks or uneven floors—may indicate that the building's foundations are moving. At Rectify, identifying the underlying cause is the first step in recommending the most appropriate repair solution.",
        )),
        array('id' => 'seed-doors-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-doors-causes', 'label' => 'Causes', 'fields' => array(
            'items' => array(
                array('image' => 'images/jammed-doors-windows/foundation-settlement.jpg', 'title' => 'Foundation Settlement', 'description' => "Foundation settlement occurs when the soil beneath a building compresses or loses its ability to support the structure evenly. As different sections of the foundation settle at varying rates, the building may shift slightly, causing door and window frames to become misaligned.\n\nThis movement often results in doors that drag on the floor, windows that no longer open smoothly, or frames that no longer close properly. Settlement may develop gradually or become more noticeable following changes in ground conditions."),
                array('image' => 'images/jammed-doors-windows/reactive-clay-soils.jpg', 'title' => 'Reactive Clay Soils', 'description' => "Many Australian homes are built on reactive clay soils, which naturally expand when wet and shrink during dry conditions. This continuous cycle causes the ground beneath foundations to move throughout the year.\n\nAs foundations rise or settle unevenly, the building frame can shift, making doors and windows difficult to operate. Reactive soils are one of the most common causes of structural movement in residential properties across Australia."),
                array('image' => 'images/jammed-doors-windows/seasonal-moisture-changes.jpg', 'title' => 'Seasonal Moisture Changes', 'description' => "Extended dry weather followed by periods of heavy rainfall can significantly alter the moisture content of the soil surrounding your home. As the ground dries, it contracts, and when moisture returns, it expands again.\n\nThese natural seasonal changes can gradually affect foundation stability, leading to subtle structural movement that causes doors and windows to stick or jam over time."),
                array('image' => 'images/jammed-doors-windows/subsidence.jpg', 'title' => 'Subsidence', 'description' => "Subsidence occurs when the ground beneath part of a building sinks due to weakened or unstable soil conditions. As the supporting ground moves downward, sections of the foundation may also settle, causing the building to shift.\n\nEven small amounts of subsidence can affect the alignment of doors and windows, making them increasingly difficult to open or close. Subsidence is often accompanied by wall cracks, uneven floors, or visible movement elsewhere in the property."),
                array('image' => 'images/jammed-doors-windows/poor-drainage.jpg', 'title' => 'Poor Drainage', 'description' => "Poor drainage can allow excessive water to collect around foundations, weakening supporting soils or causing reactive clay to expand. In other situations, inadequate drainage may contribute to erosion or uneven drying of the ground.\n\nOver time, these changing ground conditions can lead to foundation movement, affecting the alignment of doors, windows, walls, and floors. Maintaining effective site drainage is an important part of protecting a property's structural integrity."),
                array('image' => 'images/jammed-doors-windows/erosion.jpg', 'title' => 'Erosion', 'description' => "Erosion occurs when water gradually removes or weakens the soil supporting foundations. Heavy rainfall, groundwater movement, damaged drainage systems, or long-term water infiltration can all contribute to the loss of supporting material beneath a structure.\n\nAs the ground becomes less stable, foundations may begin to settle unevenly, affecting the alignment of doors, windows, walls, and floors. Rectify provides ground improvement and foundation stabilisation solutions designed to restore support while minimising disruption."),
            ),
        )),
        array('id' => 'seed-doors-matters', 'type' => 'cracked-band', 'section_key' => 'residential-doors-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'When should you be concerned?',
            'body' => "While some sticking doors are caused by humidity, seasonal timber expansion, or worn hardware, doors and windows that suddenly jam together with wall cracks or uneven floors often indicate movement within the building's foundations.\n\nAt Rectify, we investigate the underlying cause of structural movement before recommending repairs. Where foundation instability is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can help restore support beneath the building. By addressing the source of the problem rather than just the symptoms, we help provide a more durable and long-lasting solution for your property.",
            'image' => 'images/jammed-doors-windows/when-should-you-be-concerned.jpg',
            'media_position' => 'first',
        )),
        array('id' => 'seed-doors-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-doors-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-doors-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-doors-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/jammed-doors-windows/before-after-1.jpg',
            'after_image' => 'images/jammed-doors-windows/before-after-2.jpg',
        )),
        array('id' => 'seed-doors-help', 'type' => 'cracked-help', 'section_key' => 'residential-doors-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_leaning_walls_gaps_seed_blocks()
{
    return array(
        array('id' => 'seed-lwg-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-leaning-walls-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Leaning House Wall Repair in Melbourne & Adelaide',
            'breadcrumb_label' => 'Leaning House Walls',
        )),
        array('id' => 'seed-lwg-intro', 'type' => 'cracked-band', 'section_key' => 'residential-leaning-walls-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore structural stability with advanced foundation repair & ground stabilisation',
            'body' => "A leaning house wall is one of the clearest signs that your property may be experiencing structural movement. While some walls may appear to lean gradually over many years, others can shift more rapidly due to changing ground conditions, foundation settlement or soil movement.\n\nIn many cases, a leaning wall is not the problem itself—it is a symptom of movement occurring beneath the foundations. As supporting soils expand, shrink or lose strength, foundations can settle unevenly, causing external and internal walls to move out of alignment.\n\nAt Rectify, we specialise in identifying the underlying cause of leaning walls before recommending the most appropriate repair solution. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property, helping restore stability with minimal disruption compared to traditional excavation methods.",
            'image' => 'images/leaning-walls-gaps-in-doors-windows/intro-leaning-wall.png',
            'media_position' => 'last',
        )),
        array('id' => 'seed-lwg-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-leaning-walls-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Is My House Wall Leaning?',
            'body' => "A leaning wall is often a sign that the structure beneath your home has shifted. While some walls may appear slightly out of alignment due to age or construction tolerances, a wall that is visibly leaning, bowing, or moving out of plumb should be professionally assessed.\n\nIn many cases, the problem does not originate in the wall itself but in the ground supporting the building. Changes in soil conditions, foundation movement, or loss of ground support can place uneven pressure on the structure, causing walls to lean over time. At Rectify, we focus on identifying the underlying cause before recommending the most appropriate repair solution.",
        )),
        array('id' => 'seed-lwg-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-leaning-walls-causes', 'label' => 'Causes', 'fields' => array(
            'items' => array(
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/foundation-settlement.png', 'title' => 'Foundation Settlement', 'description' => "Foundation settlement occurs when the soil beneath a building compresses or loses its ability to support the structure evenly. As one section of the foundation settles more than another, the building can shift, causing walls to lean, crack, or move out of alignment.\n\nSettlement may develop gradually over many years or occur more rapidly following changes in ground conditions. Early assessment can help determine whether the movement is ongoing and whether foundation stabilisation is required."),
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/reactive-clay-soil.png', 'title' => 'Reactive Clay Soils', 'description' => "Reactive clay soils are common throughout many parts of Australia and naturally expand when they absorb moisture and shrink during dry conditions. These repeated cycles of expansion and contraction create movement beneath foundations.\n\nAs the ground shifts unevenly, different sections of the building may rise or settle at different rates, placing stress on walls and potentially causing them to lean or crack. Reactive soils are one of the leading causes of residential structural movement."),
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/subsidence.png', 'title' => 'Subsidence', 'description' => "Subsidence is the downward movement of the ground beneath a building caused by weakening or loss of soil support. As the ground sinks, foundations may also move, allowing walls to lean or become misaligned.\n\nIn addition to leaning walls, subsidence may cause cracked brickwork, sticking doors and windows, uneven floors, and gaps around window or door frames. A professional assessment is essential to determine the extent of the movement and the most suitable remediation method."),
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/poor-soil-compaction.jpg', 'title' => 'Poor Soil Compaction', 'description' => "Buildings rely on properly compacted soil to provide long-term support. If fill material beneath the foundations was not adequately compacted during construction, it can continue to compress over time.\n\nAs the supporting ground settles unevenly, foundations may shift, creating structural stress that can cause walls to lean, crack, or move out of alignment. Ground improvement techniques can help restore support beneath affected areas."),
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/erosion.png', 'title' => 'Erosion', 'description' => "Erosion gradually removes or weakens the soil supporting a building's foundations. Heavy rainfall, groundwater movement, poor surface drainage, or damaged stormwater systems can all contribute to the loss of supporting ground.\n\nAs erosion creates voids or reduces soil strength, parts of the foundation may settle unevenly, leading to leaning walls and other signs of structural movement. Rectify provides advanced ground improvement and erosion remediation solutions designed to restore stability with minimal disruption."),
                array('image' => 'images/leaning-walls-gaps-in-doors-windows/drainage-issues.jpg', 'title' => 'Drainage Issues', 'description' => "Poor drainage around a property can have a significant impact on foundation performance. Water pooling near foundations or flowing beneath the building can alter soil moisture levels, weaken supporting ground, or contribute to erosion.\n\nThese changing ground conditions may result in uneven foundation movement, increasing the risk of leaning walls, wall cracks, and floor settlement. Maintaining effective drainage helps protect the long-term stability of the structure."),
            ),
        )),
        array('id' => 'seed-lwg-matters', 'type' => 'cracked-band', 'section_key' => 'residential-leaning-walls-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why Identifying the Cause Matters',
            'body' => "Identifying the cause of the movement is essential before any cosmetic repairs are carried out, as repairing the visible damage alone often allows the problem to return.\n\nAt Rectify, we begin by investigating the underlying cause of structural movement before recommending a solution. Where unstable ground or foundation movement is identified, advanced techniques such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can restore support beneath the structure. By addressing the root cause rather than simply repairing the symptoms, we help provide a more reliable, long-term solution for homes, commercial buildings, and infrastructure.",
            'image' => 'images/leaning-walls-gaps-in-doors-windows/matters-leaning-wall.jpg',
            'media_position' => 'first',
            'soft' => 'yes',
            'flip' => 'yes',
        )),
        array('id' => 'seed-lwg-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-leaning-walls-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array('icon' => 'adv-home-experience', 'title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.'),
                array('icon' => 'adv-home-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.'),
                array('icon' => 'adv-home-delivery', 'title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
                array('icon' => 'adv-home-affordable', 'title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
                array('icon' => 'adv-home-quality', 'title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
                array('icon' => 'adv-home-trustworthy', 'title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
            ),
        )),
        array('id' => 'seed-lwg-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-leaning-walls-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/leaning-walls-gaps-in-doors-windows/before-img5135.jpg',
            'after_image' => 'images/leaning-walls-gaps-in-doors-windows/after-img5114.jpg',
        )),
        array('id' => 'seed-lwg-help', 'type' => 'cracked-help', 'section_key' => 'residential-leaning-walls-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_erosion_control_sinkhole_remediation_seed_blocks()
{
    return array(
        array('id' => 'seed-erosion-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-erosion-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Erosion Control & Sinkhole Remediation',
            'breadcrumb_label' => 'Soil Stabilisation',
        )),
        array('id' => 'seed-erosion-intro', 'type' => 'cracked-band', 'section_key' => 'residential-erosion-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Stop Ground Loss Before It Becomes Structural Damage',
            'body' => 'Soil erosion, underground voids and sinkholes can develop gradually beneath your property—often without obvious warning. Left untreated, they can undermine foundations, pavements and infrastructure, leading to costly structural damage. Rectify provides engineered ground stabilisation solutions that restore soil support, halt erosion and protect your property with minimal disruption.',
            'image' => 'images/erosion-control-sinkhole-remediation/intro-image53.png',
            'media_position' => 'last',
        )),
        array('id' => 'seed-erosion-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-erosion-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why Erosion & Sinkholes Occur',
            'subheading' => 'Ground Instability Starts Below the Surface',
            'body' => 'Sinkholes and underground voids can develop through both natural ground conditions and human activity. As soil is displaced or loses its strength, the ground can no longer adequately support structures above, leading to settlement, cracking and structural movement.',
        )),
        array('id' => 'seed-erosion-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-erosion-causes', 'label' => 'Causes', 'fields' => array(
            'items' => array(
                array('image' => 'images/erosion-control-sinkhole-remediation/natural-ground-movement.jpg', 'title' => 'Natural Ground Movement', 'description' => 'Natural soil movement, underground cavities and the dissolution of rock can create hidden voids that eventually collapse into sinkholes.'),
                array('image' => 'images/erosion-control-sinkhole-remediation/water-erosion.png', 'title' => 'Water Erosion', 'description' => 'Flooding, heavy rainfall, leaking services or poor drainage can wash fine soil particles away, weakening the ground and reducing its load-bearing capacity.'),
                array('image' => 'images/erosion-control-sinkhole-remediation/poorly-compacted-backfill.jpg', 'title' => 'Poorly Compacted Backfill', 'description' => 'Previously excavated areas or service trenches that have been inadequately compacted may consolidate over time, creating underground air pockets and surface settlement.'),
            ),
        )),
        array('id' => 'seed-erosion-solutions', 'type' => 'cracked-solutions', 'section_key' => 'residential-erosion-solutions', 'label' => 'Solutions', 'fields' => array(
            'heading' => 'Restore Ground Stability Without Major Excavation',
            'body' => 'Rectify uses patented ultra-low viscosity polyurethane resin injection to treat unstable ground with minimal disruption. Our engineered approach fills underground voids, consolidates loose soils and improves ground bearing capacity without extensive excavation or reconstruction.',
            'image' => 'images/erosion-control-sinkhole-remediation/solutions-image55.png',
            'list_heading' => 'Our Solutions Include',
            'list_items' => array(
                'Soil permeation grouting',
                'Stabilisation of loose sand and weak soils',
                'Sinkhole remediation',
                'Void filling behind concrete structures',
                'High-flow leak cut-off',
                'Underground water flow cut-off',
                'Increased soil bearing capacity',
            ),
            'extra_heading' => 'Soil Stablisation: Resilience Through Resin',
            'extra_body' => "Using patented ultra-low viscosity polyurethane resins, voids can be filled, soil consolidated, erosion halted and soil bearing improved.\n\nPermeation Grouting using Polyurethane can ensure stabilisation, consolidation and binding of soils. Through permeation injection of polyurethane resin in a gridded/sequenced pattern creates a solid mass of soil and rigid resin (ideal for silty and sandy soils).\n\nThe displacement of water and the resulting solid soil/resin mass reverses the erosion process and improves soil stability and soil bearing capacity.",
        )),
        array('id' => 'seed-erosion-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-erosion-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array('icon' => 'adv-home-experience', 'title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.'),
                array('icon' => 'adv-home-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.'),
                array('icon' => 'adv-home-delivery', 'title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
                array('icon' => 'adv-home-affordable', 'title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
                array('icon' => 'adv-home-quality', 'title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
                array('icon' => 'adv-home-trustworthy', 'title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
            ),
        )),
        array('id' => 'seed-erosion-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-erosion-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/erosion-control-sinkhole-remediation/before-img3240.jpg',
            'after_image' => 'images/erosion-control-sinkhole-remediation/after-img3254.jpg',
        )),
        array('id' => 'seed-erosion-help', 'type' => 'cracked-help', 'section_key' => 'residential-erosion-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_sloping_slab_seed_blocks()
{
    return array(
        array('id' => 'seed-slab-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-slab-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'Sinking floor & Concrete slab repair in Melbourne & Adelaide',
            'breadcrumb_label' => 'Sloping Slab',
        )),
        array('id' => 'seed-slab-intro', 'type' => 'cracked-band', 'section_key' => 'residential-slab-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore uneven floors, sunken concrete slabs & foundation stability without major excavation',
            'body' => "Sinking floors and concrete slabs are often one of the earliest signs that the ground beneath your property is no longer providing adequate support. While a floor may initially develop a slight slope or isolated low spot, continued ground movement can eventually lead to wall cracks, sticking doors and windows, uneven surfaces, and foundation settlement.\n\nAt Rectify, we specialise in diagnosing the underlying cause of sinking concrete slabs rather than simply treating the visible symptoms. Using advanced polyurethane resin injection, chemical underpinning and ground stabilisation techniques, we strengthen the supporting soil, fill underground voids and carefully re-level concrete slabs with minimal disruption to your home.",
            'image' => 'images/sloping-slab/intro-tiles.webp',
            'media_position' => 'last',
            'flip' => 'yes',
        )),
        array('id' => 'seed-slab-whatis', 'type' => 'cracked-whatis', 'section_key' => 'residential-slab-whatis', 'label' => 'What Is It', 'fields' => array(
            'heading' => 'Why are my floors Sinking?',
            'body' => "Sinking or uneven floors are often a sign that the ground beneath your home is no longer providing consistent support. While the floor itself may appear to be the problem, the underlying cause is frequently related to movement in the foundation or changes in the supporting soil.\n\nAt Rectify, we understand that every property is different. That's why identifying the source of the movement is the first step in recommending the right repair solution. By addressing the ground beneath the structure rather than just the visible symptoms, long-term stability can often be restored.",
        )),
        array('id' => 'seed-slab-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-slab-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => '',
            'items' => array(
                array('image' => 'images/sloping-slab/foundation-settlement.webp', 'title' => 'Foundation Settlement', 'description' => "Foundation settlement occurs when the soil beneath your home compresses or loses its ability to adequately support the building. As different areas of the foundation settle at different rates, stress is transferred into the walls, often resulting in cracks around doors, windows, corners, or brickwork.\n\nSettlement can develop gradually over many years or occur more quickly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before cosmetic repairs are undertaken."),
                array('image' => 'images/sloping-slab/subsidence.webp', 'title' => 'Subsidence', 'description' => "Subsidence is the downward movement of the ground beneath a property. Unlike normal settlement, subsidence usually occurs when the supporting soil weakens or shifts, causing part of the building to sink.\n\nThis movement may lead to uneven floors, wall cracks, sticking doors and windows, and visible changes throughout the structure. Professional assessment is essential to determine the extent of the movement and the most appropriate remediation solution."),
                array('image' => 'images/sloping-slab/poorly-compacted-fill.webp', 'title' => 'Poorly Compacted Fill', 'description' => "If the soil or fill material beneath a building was not properly compacted during construction, it can continue to compress after the home is built. As the fill settles, gaps may develop beneath slabs and foundations, reducing their support.\n\nThis gradual movement can cause floors to sink, become uneven, or feel unstable underfoot. Proper ground stabilisation can restore support beneath affected areas."),
                array('image' => 'images/sloping-slab/leaking-water-pipes.webp', 'title' => 'Leaking Water Pipes', 'description' => "Underground plumbing leaks, damaged stormwater pipes, or leaking sewer lines can introduce excessive moisture into the surrounding soil. Over time, this may soften the ground, wash away fine soil particles, or create voids beneath the foundation.\n\nAs support beneath the floor decreases, sections of the slab may begin to settle, resulting in uneven or sinking floors. Repairing the water source is an important part of achieving a long-term solution."),
                array('image' => 'images/sloping-slab/drainage-problems.webp', 'title' => 'Drainage Problems', 'description' => "Poor drainage around a property can significantly affect soil stability. Water that pools around foundations or flows beneath the building can alter moisture levels, weaken supporting soils, and contribute to erosion.\n\nOver time, these changing ground conditions may lead to differential settlement, where some areas of the floor sink more than others. Maintaining effective site drainage helps reduce the risk of ongoing foundation movement."),
                array('image' => 'images/sloping-slab/erosion.webp', 'title' => 'Erosion', 'description' => "Erosion occurs when flowing water gradually removes or weakens the soil supporting foundations and concrete slabs. This may be caused by heavy rainfall, groundwater movement, damaged drainage systems, or long-term water infiltration.\n\nAs supporting material is lost, underground voids can develop, allowing foundations and floors to settle unevenly. Rectify provides advanced ground improvement solutions designed to restore stability and reduce the effects of erosion with minimal disruption."),
                array('image' => 'images/sloping-slab/underground-voids.webp', 'title' => 'Underground Voids', 'description' => "Underground voids are empty spaces that develop beneath concrete slabs or foundations after soil has been displaced, compressed, or washed away. Without adequate support, the concrete above may begin to crack, sink, or move.\n\nPolyurethane resin injection can fill these voids, strengthen the surrounding ground, and help restore support beneath affected slabs without the need for extensive excavation."),
                array('image' => 'images/sloping-slab/ageing-foundations.webp', 'title' => 'Ageing Foundations', 'description' => "As buildings age, decades of natural ground movement and environmental changes can gradually affect the performance of their foundations. Older homes may become more susceptible to settlement, particularly if drainage has deteriorated or soil conditions have changed over time.\n\nWhile ageing alone does not always result in sinking floors, it can increase the likelihood of foundation movement when combined with other contributing factors. A professional assessment can determine whether remediation is required."),
                array('image' => 'images/sloping-slab/seasonal-moisture.webp', 'title' => 'Seasonal Moisture Changes', 'description' => "Australia's changing weather patterns can significantly influence the moisture content of the soil beneath a property. Extended dry periods may cause soils to shrink, while heavy rainfall can cause them to expand or soften. These seasonal changes are particularly noticeable in reactive clay soils and can lead to repeated cycles of foundation movement.\n\nOver time, this movement may cause floors to become uneven or begin to sink if the underlying ground loses stability."),
            ),
        )),
        array('id' => 'seed-slab-matters', 'type' => 'cracked-band', 'section_key' => 'residential-slab-matters', 'label' => 'Why It Matters', 'fields' => array(
            'heading' => 'Why addressing the ground is essential',
            'body' => "Repairing the floor without correcting the ground beneath often allows the problem to return.\n\nAt Rectify, our approach focuses on identifying the underlying cause of foundation movement before recommending a solution. Where ground instability is present, advanced techniques such as polyurethane resin injection, chemical underpinning, ground improvement, and slab lifting can stabilise the supporting soil and restore structural performance. By treating the cause rather than simply repairing the visible damage, we help provide a more durable and long-lasting solution for your property.",
            'image' => 'images/sloping-slab/ground-essential.webp',
            'media_position' => 'first',
            'flip' => 'yes',
            'soft' => 'yes',
        )),
        array('id' => 'seed-slab-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-slab-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-slab-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-slab-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/sloping-slab/before.webp',
            'after_image' => 'images/sloping-slab/after.webp',
        )),
        array('id' => 'seed-slab-help', 'type' => 'cracked-help', 'section_key' => 'residential-slab-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * Seed content for the "House Relevelling" page (child of Residential
 * Solutions), transcribed from the Figma design (node 819:13359), matching
 * template-parts/residential/content-house-relevelling.php.
 *
 * @return array
 */
function rectify_pb_get_house_relevelling_seed_blocks()
{
    return array(
        array('id' => 'seed-relevel-hero', 'type' => 'cracked-hero', 'section_key' => 'residential-relevel-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'WHAT WE RECTIFY',
            'title' => 'House Relevelling Melbourne & South Australia',
            'breadcrumb_label' => 'House Relevelling',
        )),
        array('id' => 'seed-relevel-intro', 'type' => 'cracked-band', 'section_key' => 'residential-relevel-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => "Restore Your Home's Level and Stability with Engineered House Relevelling Solutions",
            'body' => "If your floors have become uneven, doors no longer close properly, or cracks continue to appear in your walls, your home may be experiencing foundation movement. These issues often develop gradually as the ground beneath the property settles, shifts, or loses its ability to adequately support the structure.\n\nAt Rectify, we specialise in house relevelling solutions for homes across Melbourne, Victoria, and South Australia. Our experienced ground engineering team identifies the underlying cause of movement before recommending an engineered solution designed to restore stability, improve foundation support, and minimise future settlement.\n\nUnlike cosmetic repairs that only hide the symptoms, our approach focuses on stabilising the ground beneath your home to help protect its long-term structural integrity.",
            'image' => 'images/house-relevelling/intro-house-relevelling.jpg',
            'media_position' => 'last',
        )),
        array('id' => 'seed-relevel-causes-heading', 'type' => 'cracked-whatis', 'section_key' => 'residential-relevel-causes-heading', 'label' => 'Causes Heading', 'fields' => array(
            'heading' => 'What Causes a House to Become Uneven?',
            'body' => 'Most homes do not suddenly become out of level. Foundation movement typically develops over many years due to changing ground conditions.',
        )),
        array('id' => 'seed-relevel-causes', 'type' => 'cracked-causes', 'section_key' => 'residential-relevel-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => '',
            'items' => array(
                array('image' => 'images/house-relevelling/reactive-clay-soils.jpg', 'title' => 'Reactive Clay Soils', 'description' => 'Reactive clay expands during wet weather and contracts during dry periods. This continual movement places stress on foundations and can cause sections of the home to settle unevenly.'),
                array('image' => 'images/house-relevelling/poor-soil-compaction.jpg', 'title' => 'Poor Soil Compaction', 'description' => 'If the fill beneath the foundations was not properly compacted during construction, it may continue to compress over time, resulting in gradual settlement.'),
                array('image' => 'images/house-relevelling/underground-water-leaks.jpg', 'title' => 'Underground Water Leaks', 'description' => 'Leaking plumbing, damaged stormwater systems or poor drainage can soften supporting soils and reduce their load-bearing capacity.'),
                array('image' => 'images/house-relevelling/erosion.jpg', 'title' => 'Erosion', 'description' => 'Groundwater movement and poor surface drainage may gradually wash away supporting soils beneath the foundation, creating voids and uneven settlement.'),
                array('image' => 'images/house-relevelling/tree-root-activity.jpg', 'title' => 'Tree Root Activity', 'description' => 'Large trees can remove moisture from surrounding soils, particularly reactive clays, causing shrinkage and differential movement beneath foundations.'),
                array('image' => 'images/house-relevelling/natural-foundation-settlement.jpg', 'title' => 'Natural Foundation Settlement', 'description' => 'Older homes often experience gradual settlement over time. While some movement is expected, excessive or ongoing settlement should be professionally assessed to determine whether remediation is required.'),
            ),
        )),
        array('id' => 'seed-relevel-process', 'type' => 'cracked-process', 'section_key' => 'residential-relevel-process', 'label' => 'Process Steps', 'fields' => array(
            'heading' => 'How We Re-level Your House In 4 Simple Steps',
            'lead' => 'Our method involves a series of steps designed to ensure the safety, stability, and longevity of your home, with a focus on our trusted chemical underpinning services.',
            'items' => array(
                array('number' => '01', 'title' => 'Precision Drilling', 'description' => 'Our skilled team begins by carefully drilling small, strategically placed holes around the affected area of your foundation. This step is done with precision to ensure minimal impact on your property while preparing for the underpinning process.'),
                array('number' => '02', 'title' => 'Advanced Resin Injection', 'description' => 'We then select the appropriate site specific engineered polyurethane resin and inject through tubes that have been inserted at required depth through the drilled holes. This resin is carefully monitored as it expands, allowing us to precisely control the lift and ensure the process is executed with accuracy.'),
                array('number' => '03', 'title' => 'Ground Improvement', 'description' => "Our engineered resin serves a dual purpose: it initially fills any underground voids and then starts compacting the soil improving the ground's bearing capacity. This proven solution ensures a comprehensive treatment of the subsidence issue, addressing both the cause and the symptom."),
                array('number' => '04', 'title' => 'Controlled Level Improvement', 'description' => "The final step sees your building levels improved. Our experienced team ensures that the most practicable adjustment is made with due diligence, guaranteeing that your home's foundation is not only stabilised but also prepared to stand firm against future subsidence."),
            ),
        )),
        array('id' => 'seed-relevel-advantage', 'type' => 'cracked-advantage', 'section_key' => 'residential-relevel-advantage', 'label' => 'Why Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => rectify_pb_get_cracked_advantage_items(),
        )),
        array('id' => 'seed-relevel-performance', 'type' => 'cracked-performance', 'section_key' => 'residential-relevel-performance', 'label' => 'Performance Verified', 'fields' => array(
            'heading' => 'Engineered. Rectified. Performance Verified.',
            'subtext' => 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.',
            'before_image' => 'images/house-relevelling/before.jpg',
            'after_image' => 'images/house-relevelling/after.jpg',
        )),
        array('id' => 'seed-relevel-help', 'type' => 'cracked-help', 'section_key' => 'residential-relevel-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/* -----------------------------------------------------------------------
 * "FAQ" category pages (rx-faq-* markup), under /resources/faq/: residential,
 * commercial, our-process, our-technology, industries-we-serve.
 * ---------------------------------------------------------------------*/

function rectify_pb_get_faq_intro_text()
{
    return "Find clear answers to the most common questions about cracks, sinking floors, foundation movement, and how Rectify can help protect your home.";
}

function rectify_pb_get_faq_cta_fields()
{
    return array(
        'heading' => 'Need Help Choosing the Right Solution?',
        'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
        'phone_text' => '1800 18 20 20',
        'phone_url' => 'tel:1800182020',
    );
}

function rectify_pb_get_faq_residential_seed_blocks()
{
    return array(
        array('id' => 'seed-faq-residential-hero', 'type' => 'faq-hero', 'section_key' => 'faq-residential-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Resources',
            'title' => 'Frequently Asked Questions',
            'intro' => rectify_pb_get_faq_intro_text(),
            'breadcrumb_label' => 'Residential',
            'breadcrumb_url' => home_url( '/residential/' ),
        )),
        array('id' => 'seed-faq-residential-banner', 'type' => 'faq-banner', 'section_key' => 'faq-residential-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/home/TruckandVanathouse.jpg',
        )),
        array('id' => 'seed-faq-residential-list', 'type' => 'faq-list', 'section_key' => 'faq-residential-list', 'label' => 'Questions', 'fields' => array(
            'heading' => 'Residential FAQs',
            'items' => array(
                array('question' => 'What are the signs my home may have a structural problem?', 'answer' => "Common warning signs include cracks in walls or ceilings, doors and windows that jam or no longer close properly, sloping or bouncy floors, and gaps appearing around skirting boards or architraves. If you notice any of these, it's worth having a specialist assess the cause before it worsens."),
                array('question' => 'Are cracks in my walls always serious?', 'answer' => 'Not every crack points to a structural issue, hairline cracks in plaster can be cosmetic and caused by normal settling. However, cracks that are wide, diagonal, growing over time, or paired with sticking doors and sloping floors usually indicate underlying foundation movement that should be assessed.'),
                array('question' => 'Can a sinking slab be repaired without rebuilding my home?', 'answer' => 'Yes. In most cases a sinking slab can be stabilised and re-levelled using techniques such as chemical underpinning, resin injection or void filling, without the need to demolish or rebuild. A site assessment determines the most suitable method for your property.'),
                array('question' => 'Will the problem continue to get worse if I do nothing?', 'answer' => 'Foundation movement rarely resolves on its own. Left untreated, ground instability typically continues, leading to wider cracking, worsening slopes and more costly repairs down the track. Early intervention is generally the most cost-effective approach.'),
                array('question' => 'How long does a residential stabilisation project take?', 'answer' => 'Most residential stabilisation works are completed within a few days to a couple of weeks, depending on the extent of the movement, the remediation method used and site access. Your specialist will provide a project timeframe as part of your assessment.'),
                array('question' => 'Will I need to move out during the works?', 'answer' => 'In the majority of cases, homeowners are able to remain in the property while works are carried out, as most stabilisation methods are low-disruption. Your project team will let you know in advance if any part of the process requires you to vacate the area.'),
                array('question' => "Can structural movement affect my property's value?", 'answer' => "Yes, unresolved cracking or foundation movement can affect a property's value and make it harder to sell or insure. Addressing the issue with a documented, professional remediation gives buyers and valuers confidence the underlying cause has been resolved."),
                array('question' => 'What causes foundation movement?', 'answer' => 'Foundation movement is most commonly caused by reactive clay soils expanding and contracting with moisture changes, poor drainage, tree roots drawing moisture from the ground, leaking pipes, or inadequate original footings. A site assessment identifies the specific cause for your property.'),
            ),
        )),
        array('id' => 'seed-faq-residential-cta', 'type' => 'faq-cta', 'section_key' => 'faq-residential-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_faq_cta_fields()),
    );
}

function rectify_pb_get_faq_commercial_seed_blocks()
{
    return array(
        array('id' => 'seed-faq-commercial-hero', 'type' => 'faq-hero', 'section_key' => 'faq-commercial-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Resources',
            'title' => 'Frequently Asked Questions',
            'intro' => rectify_pb_get_faq_intro_text(),
            'breadcrumb_label' => 'Commercial',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
        )),
        array('id' => 'seed-faq-commercial-banner', 'type' => 'faq-banner', 'section_key' => 'faq-commercial-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/home/IMG_0867-1.jpg',
        )),
        array('id' => 'seed-faq-commercial-list', 'type' => 'faq-list', 'section_key' => 'faq-commercial-list', 'label' => 'Questions', 'fields' => array(
            'heading' => 'Commercial FAQs',
            'items' => array(
                array('question' => 'What types of commercial properties does Rectify work on?', 'answer' => 'We work across office buildings, retail centres, warehouses, strata properties, industrial facilities, healthcare facilities, educational institutions, and government assets.'),
                array('question' => 'Can works be completed while our facility remains operational?', 'answer' => 'Yes. Our remediation methods are designed to be low-disruption, and works are typically scheduled and staged around your business hours, tenants and site traffic so operations can continue with minimal interruption.'),
                array('question' => 'How do structural issues affect commercial assets?', 'answer' => 'Unresolved structural movement can lead to cracking, uneven floors, jamming doors and, over time, more significant damage to the building envelope. Beyond the physical impact, it can disrupt operations, affect tenant safety and reduce asset value if left unaddressed.'),
                array('question' => 'Do you work with facility managers and strata managers?', 'answer' => 'Yes, we regularly partner with facility managers, strata managers and building owners to assess structural movement, plan remediation works and provide the documentation needed for reporting and compliance.'),
                array('question' => 'Can Rectify support insurance-related structural issues?', 'answer' => 'Yes. We can assess and document structural damage to support insurance claims, and work alongside insurers, loss assessors and building owners to deliver a remediation solution that meets claim requirements.'),
                array('question' => 'Why should commercial owners act early?', 'answer' => 'Acting early on structural movement typically limits the extent of damage, reduces the overall cost of remediation and minimises disruption to operations. Left unaddressed, ground instability tends to worsen, leading to more extensive and costly works down the track.'),
            ),
        )),
        array('id' => 'seed-faq-commercial-cta', 'type' => 'faq-cta', 'section_key' => 'faq-commercial-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_faq_cta_fields()),
    );
}

function rectify_pb_get_faq_our_process_seed_blocks()
{
    return array(
        array('id' => 'seed-faq-process-hero', 'type' => 'faq-hero', 'section_key' => 'faq-our-process-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Resources',
            'title' => 'Frequently Asked Questions',
            'intro' => rectify_pb_get_faq_intro_text(),
            'breadcrumb_label' => 'Our Process',
            'breadcrumb_url' => '',
        )),
        array('id' => 'seed-faq-process-banner', 'type' => 'faq-banner', 'section_key' => 'faq-our-process-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/guide-worker.jpg',
        )),
        array('id' => 'seed-faq-process-list', 'type' => 'faq-list', 'section_key' => 'faq-our-process-list', 'label' => 'Questions', 'fields' => array(
            'heading' => 'Our Process FAQs',
            'items' => array(
                array('question' => 'What happens when I contact Rectify?', 'answer' => 'Our team will discuss your concerns, review the symptoms, and determine the most appropriate next steps, which may include a site inspection or technical assessment.'),
                array('question' => 'What does a structural assessment involve?', 'answer' => 'A specialist visits your property to inspect the affected areas, review signs of movement such as cracking or sloping floors, and where needed take measurements or samples to identify the underlying cause.'),
                array('question' => 'Will I receive a detailed recommendation?', 'answer' => 'Yes. Following your assessment, we provide a written recommendation outlining the cause of the issue, the proposed remediation method, and an estimated cost and timeframe for the works.'),
                array('question' => 'How do you ensure quality outcomes?', 'answer' => 'Our teams follow established engineering methods, use quality-controlled materials, and carry out testing throughout the works to confirm the ground and structure are performing as expected.'),
                array('question' => 'Do you provide documentation and reporting?', 'answer' => 'Yes. We provide documentation covering the assessment findings, the works completed, and testing results, giving you a clear record for your own files, insurers or future reference.'),
                array('question' => 'What happens after the work is completed?', 'answer' => 'Once works are finished, our team reinstates the site, completes final checks and testing, and walks you through the outcome so you understand what was done and what to expect going forward.'),
                array('question' => "What is Rectify's approach to structural issues?", 'answer' => 'We focus on identifying the root cause of the movement first, then apply the least disruptive, most cost-effective remediation method suited to your property, backed by over 50 years of combined industry experience.'),
            ),
        )),
        array('id' => 'seed-faq-process-cta', 'type' => 'faq-cta', 'section_key' => 'faq-our-process-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_faq_cta_fields()),
    );
}

function rectify_pb_get_faq_our_technology_seed_blocks()
{
    return array(
        array('id' => 'seed-faq-technology-hero', 'type' => 'faq-hero', 'section_key' => 'faq-our-technology-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Resources',
            'title' => 'Frequently Asked Questions',
            'intro' => rectify_pb_get_faq_intro_text(),
            'breadcrumb_label' => 'Our Technology',
            'breadcrumb_url' => '',
        )),
        array('id' => 'seed-faq-technology-banner', 'type' => 'faq-banner', 'section_key' => 'faq-our-technology-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/home/Wall-with-prop7.jpg',
        )),
        array('id' => 'seed-faq-technology-list', 'type' => 'faq-list', 'section_key' => 'faq-our-technology-list', 'label' => 'Questions', 'fields' => array(
            'heading' => 'Our Technology FAQs',
            'items' => array(
                array('question' => 'What is chemical underpinning?', 'answer' => 'Chemical underpinning involves injecting engineered materials beneath foundations to stabilise soils, fill voids, and improve ground performance, helping restore structural stability.'),
                array('question' => 'What is ground stabilisation?', 'answer' => 'Ground stabilisation is the process of strengthening weak, loose or reactive soils beneath a structure so they can reliably support the foundation, reducing the risk of further movement.'),
                array('question' => 'What is sand permeation?', 'answer' => 'Sand permeation is a grouting technique that fills the voids between loose, non-cohesive soils such as sand, increasing soil stiffness and controlling groundwater to prevent excavation failure and ground loss.'),
                array('question' => 'What is asset remediation?', 'answer' => 'Asset remediation covers the range of repair and stabilisation works carried out to restore a structure or piece of infrastructure to a safe, functional condition after damage from ground movement, water ingress or general deterioration.'),
                array('question' => 'Are your solutions invasive?', 'answer' => 'No. Our techniques are designed to be low-disruption and require minimal excavation compared to traditional methods, allowing works to be carried out with limited impact on your property or operations.'),
                array('question' => 'How do you determine the right solution?', 'answer' => 'Every project begins with a site assessment to understand the cause and extent of the movement, soil conditions and site access. From there, our specialists recommend the technique best suited to your property and budget.'),
            ),
        )),
        array('id' => 'seed-faq-technology-cta', 'type' => 'faq-cta', 'section_key' => 'faq-our-technology-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_faq_cta_fields()),
    );
}

function rectify_pb_get_faq_industries_we_serve_seed_blocks()
{
    return array(
        array('id' => 'seed-faq-industries-hero', 'type' => 'faq-hero', 'section_key' => 'faq-industries-we-serve-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Resources',
            'title' => 'Frequently Asked Questions',
            'intro' => rectify_pb_get_faq_intro_text(),
            'breadcrumb_label' => 'Industries We Serve',
            'breadcrumb_url' => '',
        )),
        array('id' => 'seed-faq-industries-banner', 'type' => 'faq-banner', 'section_key' => 'faq-industries-we-serve-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/partners-trucks.jpg',
        )),
        array('id' => 'seed-faq-industries-list', 'type' => 'faq-list', 'section_key' => 'faq-industries-we-serve-list', 'label' => 'Questions', 'fields' => array(
            'heading' => 'Industries We Serve FAQs',
            'items' => array(
                array('question' => 'Does Rectify work on infrastructure projects?', 'answer' => 'Yes. Rectify provides ground engineering, stabilisation, and remediation solutions for infrastructure assets including roads, bridges, transport facilities, and public infrastructure.'),
                array('question' => 'Can Rectify support mining and industrial facilities?', 'answer' => 'Yes, we deliver ground stabilisation and asset remediation for mining and industrial sites, including plant foundations, processing facilities and heavy-load hardstand areas, with methods suited to demanding operational environments.'),
                array('question' => 'Do you work in marine environments?', 'answer' => 'Yes, our team has experience stabilising ground and structures around ports, wharves and other marine-adjacent assets, where soil conditions and exposure to water present additional challenges.'),
                array('question' => 'Can Rectify work on defence projects?', 'answer' => 'Yes, we support defence and other government-managed sites, working within the security, access and compliance requirements those projects require.'),
                array('question' => 'Do you partner with Tier 1 contractors?', 'answer' => 'Yes, we regularly work alongside Tier 1 contractors and head contractors as a specialist subcontractor, integrating our ground engineering and remediation works into larger construction and infrastructure programs.'),
                array('question' => 'Can you assist government asset owners?', 'answer' => 'Yes, we work with councils, state agencies and other government asset owners to assess and remediate structural movement across public buildings, infrastructure and community facilities.'),
            ),
        )),
        array('id' => 'seed-faq-industries-cta', 'type' => 'faq-cta', 'section_key' => 'faq-industries-we-serve-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_faq_cta_fields()),
    );
}

/* -----------------------------------------------------------------------
 * Commercial Solutions "solution-*" pages migrated off the default editor:
 * realignment-levelling, slab-lifting, engineered-fill, void-filling,
 * leak-sealing-water-stopping, protective-coatings-concrete-repair,
 * pipe-abandonment. All share the rx-driveway-* design system already used
 * by driveway-relevelling etc.
 * ---------------------------------------------------------------------*/

/**
 * The standard 6-card "The Rectify Advantage" checklist, identical copy
 * across all 7 pages.
 *
 * @return array
 */
function rectify_pb_get_commercial_solution_advantage_items()
{
    return array(
        array('title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with the highest level of expertise and training.'),
        array('title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing the latest developments from around the world.'),
        array('title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
        array('title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
        array('title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
        array('title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
    );
}

/**
 * The standard 6-card "What Causes House Foundations To Sink?" cause list,
 * identical copy reused across slab-lifting, engineered-fill and
 * pipe-abandonment.
 *
 * @return array
 */
function rectify_pb_get_commercial_solution_foundation_cause_items()
{
    return array(
        array('title' => 'Soil Shrinkage and Swelling', 'description' => 'Particularly in areas with clay-heavy soils, the ground can contract significantly during dry spells, reducing support for the piers.'),
        array('title' => 'Soil Swelling', 'description' => 'Conversely, excessive moisture from heavy rains or flooding can cause soils to swell and shift, leading to uneven support.'),
        array('title' => 'Water Erosion and Leaks', 'description' => 'Water flow from rain, drainage problems, or leaks can wash away the soil base, causing piers to settle.'),
        array('title' => 'Poor Compaction', 'description' => "If the soil under a home wasn't compacted properly during construction, it could compress over time under the weight of the building, leading to subsidence."),
        array('title' => 'Tree Root Growth', 'description' => 'Large tree roots can grow extensively underground, displacing the soil around and beneath floor piers.'),
        array('title' => 'Decomposing Materials', 'description' => 'Over time, organic material in the soil, like tree stumps or timber, can decay, causing voids in the earth.'),
    );
}

function rectify_pb_get_commercial_pipe_abandonment_seed_blocks()
{
    return array(
        array('id' => 'seed-cpa-banner', 'type' => 'cpa-banner', 'section_key' => 'commercial-pipe-abandonment-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Pipe Abandonment & Cellular Concrete Grouting Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
            'current_label' => 'Pipe Abandonment',
        )),
        array('id' => 'seed-cpa-intro', 'type' => 'cpa-intro', 'section_key' => 'commercial-pipe-abandonment-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Pipe Abandonment Solutions for Commercial, Industrial & Infrastructure Assets',
            'body_richtext' => "In-ground service pipes have a finite life span and need to be replaced periodically. Unfortunately, excavation and removal of the underground assets can be extremely expensive, given they may run under existing infrastructure, buildings and property. These abandoned pipes cannot be simply be left in situ as there is a risk of collapse that could destabilise the overlying soil, leading to subsidence. If removal is not an option, then adequately grouting the pipes to fill the cavity is the appropriate approach. This will prevent collapse as well as eliminating the build-up of potentially explosive gases and restricting groundwater and unwanted fluid migration along the pipe.\n\nTypical cement grouts bleed and experience shrinkage upon drying, creating a small annulus at the crown of the pipe. Using our polymer modified cellular concrete that is specifically engineered as a light weight, high strength fill that offers superior flowability with low pump pressures also provides the benefits of a relatively low shrinkage with minimal bleed. This saves time and reduces the requirement to provide numerous access pits to the abandoned pipe by enabling <a href=\"https://share.google/J343SALYF1B8YMAGT\" target=\"_blank\" rel=\"noopener\">quick installation</a> over long distances.",
        )),
        array('id' => 'seed-cpa-why-choose', 'type' => 'cpa-why-choose', 'section_key' => 'commercial-pipe-abandonment-why-choose', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('title' => 'Long-Term Confidence', 'description' => "We don\xe2\x80\x99t just repair today\xe2\x80\x99s problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-cpa-cta', 'type' => 'cpa-cta', 'section_key' => 'commercial-pipe-abandonment-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Restore Ground Support With Engineered Void Filling',
            'body_richtext' => 'Hidden voids beneath slabs, pavements and infrastructure can compromise structural performance and increase long-term maintenance costs. Rectify delivers engineered void filling solutions that stabilise the ground, restore support and minimise operational disruption.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_slab_lifting_seed_blocks()
{
    return array(
        array('id' => 'seed-csl-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-slab-lifting-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Commercial Slab Lifting Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
            'current_label' => 'Slab Lifting',
        )),
        array('id' => 'seed-csl-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-slab-lifting-intro', 'label' => 'Introduction', 'fields' => array(
            'heading' => 'Re-Level Sunken Concrete Slabs Without Demolition or Extended Downtime',
            'body_richtext' => "Uneven concrete slabs can affect the safety, productivity, and operational performance of commercial and industrial facilities. Whether it's a warehouse floor, factory slab, loading dock, hardstand, or pavement, slab settlement often indicates that the supporting ground beneath the concrete has weakened or shifted.\n\nAt Rectify, we provide commercial slab lifting solutions for businesses across Melbourne, Victoria, South Australia, and projects throughout Australia. Using advanced ground engineering technologies, we restore settled concrete slabs by strengthening the underlying soil and carefully re-supporting the slab with minimal disruption to ongoing operations. Modern slab lifting solutions offer a fast, non-invasive alternative to traditional demolition and replacement.\n\nWhether you're managing a warehouse, manufacturing facility, logistics centre, or public infrastructure asset, our engineered solutions help improve safety, extend asset life, and reduce operational downtime.",
            'image' => 'images/commercial-slab-lifting/intro-slab-lifting.png',
            'image_alt' => 'Rectify technicians measuring and preparing a commercial concrete slab for lifting',
        )),
        array('id' => 'seed-csl-causes-v2', 'type' => 'commercial-slab-causes', 'section_key' => 'commercial-slab-lifting-causes', 'label' => 'Why Commercial Slabs Settle', 'fields' => array(
            'heading' => 'Why Commercial Slabs Settle',
            'lead' => '<h3>Settlement Is a Ground Problem—Not Just a Concrete Problem</h3><p>Uneven slabs are typically the result of changing ground conditions beneath the structure. Simply resurfacing or replacing concrete often fails to address the underlying cause.</p><p>Rectify investigates the source of movement before recommending the appropriate stabilisation strategy, ensuring long-term structural performance rather than a temporary repair.</p>',
            'items_heading' => 'Common causes of slab settlement include:',
            'items' => array(
                array('image' => 'images/commercial-slab-lifting/weak-subgrade.jpg', 'image_alt' => 'A visible void beneath a concrete slab', 'title' => 'Weak or Poorly Compacted Subgrade', 'description' => 'If the fill material beneath a slab was not properly compacted during construction, it can continue consolidating under heavy operational loads, causing differential settlement.'),
                array('image' => 'images/commercial-slab-lifting/heavy-loading.png', 'image_alt' => 'Heavy excavator and truck operating on a work site', 'title' => 'Heavy Operational Loading', 'description' => 'Forklifts, racking systems, heavy equipment, production machinery, and constant vehicle traffic place significant pressure on warehouse and industrial floors. Over time, weak soils may compress and allow slabs to settle.'),
                array('image' => 'images/commercial-slab-lifting/water-ingress.jpg', 'image_alt' => 'An exposed underground pipe in wet soil', 'title' => 'Water Ingress', 'description' => 'Leaking services, poor drainage, and groundwater infiltration can soften supporting soils, reducing their load-bearing capacity and creating instability beneath slabs.'),
                array('image' => 'images/commercial-slab-lifting/soil-erosion.png', 'image_alt' => 'Water erosion beneath an unsupported concrete slab', 'title' => 'Soil Erosion', 'description' => 'Moving water may gradually wash away supporting soils, creating underground voids that leave sections of the slab unsupported.'),
                array('image' => 'images/commercial-slab-lifting/reactive-ground.png', 'image_alt' => 'Dry reactive clay beside a cracked brick building', 'title' => 'Reactive Ground Conditions', 'description' => 'Clay-rich soils expand and contract with seasonal moisture changes, contributing to uneven movement beneath industrial and commercial slabs.'),
                array('image' => 'images/commercial-slab-lifting/underground-voids.jpg', 'image_alt' => 'A void visible beneath the edge of a structure', 'title' => 'Underground Voids', 'description' => 'Voids created by erosion, deteriorating fill, or previous underground works can cause slabs to lose support and settle unevenly.'),
            ),
        )),
        array('id' => 'seed-csl-process-v2', 'type' => 'commercial-slab-process', 'section_key' => 'commercial-slab-lifting-process', 'label' => 'Engineered Slab Lifting Process', 'fields' => array(
            'heading' => 'Our Engineered Slab Lifting Process',
            'lead' => '<h3>Engineered Precision. Minimal Disruption. Measurable Results.</h3><p>Rather than replacing structurally sound concrete, Rectify restores slab performance using advanced chemical underpinning technology.</p><p>Our expanding structural resin is injected beneath the slab through small access points. The material fills voids, densifies weak ground and creates controlled lifting pressure, allowing engineers to accurately re-level the slab while continuously monitoring movement.</p>',
            'image' => 'images/commercial-slab-lifting/engineered-process.png',
            'image_alt' => 'Rectify technicians carrying out a controlled slab lifting treatment',
            'items' => array(
                array('title' => 'Restore Structural Performance', 'description' => 'Re-establish support beneath settled slabs by filling voids and improving ground conditions.'),
                array('title' => 'Minimise Operational Downtime', 'description' => 'Most projects can be completed significantly faster than conventional demolition and reconstruction, helping facilities resume operations sooner.'),
                array('title' => 'Non-Invasive Construction', 'description' => 'Small injection points minimise disruption to surrounding structures, equipment and finished surfaces.'),
                array('title' => 'Engineered Accuracy', 'description' => 'Controlled lifting enables precise adjustments while monitoring slab movement throughout the remediation process.'),
                array('title' => 'Long-Term Ground Stabilisation', 'description' => 'By treating the underlying ground conditions, Rectify helps reduce future settlement risks and extends asset service life.'),
                array('title' => 'Suitable Across Multiple Sectors', 'description' => 'Applicable to commercial buildings, warehouses, logistics facilities, industrial plants, transport infrastructure, ports, utilities and government assets.'),
            ),
        )),
        array('id' => 'seed-csl-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-slab-lifting-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-csl-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-slab-lifting-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Restore Slab Performance Before Settlement Gets Worse',
            'copy' => "Concrete slab settlement can affect operational efficiency, safety and the long-term performance of your assets. Rectify's non-invasive slab lifting technology relevels concrete with minimal disruption, helping protect your investment and reduce future maintenance costs.",
            'primary_text' => 'Contact Us',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_engineered_fill_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-cef-hero', 'type' => 'solution-hero', 'section_key' => 'commercial-engineered-fill-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Engineered Fill',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
        )),
        array('id' => 'seed-cef-intro', 'type' => 'solution-band', 'section_key' => 'commercial-engineered-fill-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Fill',
            'body_richtext' => "In circumstances where poor soil conditions exist, the prevailing practice is to excavate to a stiff, well compacted soil. If instead the area needs to be built up to the appropriate grade, introduced fill materials conforming to specified moisture limits and composition need to be placed and compacted to provide adequate performance. Where fill is placed behind retaining walls, compaction is limited and can lead to continued consolidation of the introduced backfill. High walls must be designed for elevated pushing forces, increasing structural elements and foundation depths.\n\nApplication of an engineered lightweight cellular concrete, delivered as a flowable grout, is a practical, time and cost efficient alternative to conventional backfill solutions. This material can be designed for specified strengths or densities and, being self compacting with minimal creep, avoids concerns of long-term consolidation and subsidence. Being batched on-site, with the added benefit of being pumpable over long distances, offers flexibility in staging, reducing traffic management delays.\n\nProviding bridging layers over poorly performing ground, removing the need for successive layering and continual testing of compacted fill with weather limitations, and significantly reducing retaining wall sizes and embedment, polymer modified cellular concrete offers a time efficient and affordable solution with an environmentally conscious footprint.",
            'cta_text' => 'Contact Us To Get A Free Quote',
            'cta_url' => home_url( '/contact-us/' ),
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/commercial-engineered-fill-e04-engineered-fill.png',
        )),
        array('id' => 'seed-cef-before-after', 'type' => 'solution-band', 'section_key' => 'commercial-engineered-fill-before-after', 'label' => 'Before & After Treatment', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Before & After Treatment',
            'body_richtext' => 'Our results speak, see how we rectify.',
        )),
        array('id' => 'seed-cef-advantage', 'type' => 'solution-band', 'section_key' => 'commercial-engineered-fill-advantage', 'label' => 'The Rectify Advantage', 'fields' => array(
            'full_width' => 'yes',
            'kicker' => "HERE'S WHY WE STAND OUT",
            'heading' => 'The Rectify Advantage',
            'body_benefits' => rectify_pb_get_commercial_solution_advantage_items(),
        )),
        array('id' => 'seed-cef-causes', 'type' => 'solution-process-steps', 'section_key' => 'commercial-engineered-fill-causes', 'label' => 'Causes', 'fields' => array(
            'heading' => 'What Causes House Foundations To Sink?',
            'lead' => "A variety of factors contribute to the underlying issues that lead to sinking house floors and slabs, leaning or cracked walls, jammed doors and more.\n\nThese issues often stem from changes in the ground beneath a property, leading to soil movement. The impact of these changes can vary significantly depending on the type of ground your property is built on, with certain conditions exacerbating the effects.\n\nAs the ground shifts, it can cause buildings to experience subsidence, where foundations or footings lose their support and sink into the weakened ground. Here are a few of the common causes of house subsidence.",
            'items' => rectify_pb_get_commercial_solution_foundation_cause_items(),
        )),
        array('id' => 'seed-cef-why', 'type' => 'solution-icon-grid', 'section_key' => 'commercial-engineered-fill-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'dark' => 'yes',
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'adv-technology', 'title' => 'Proven Techniques, Experienced Team', 'description' => 'Established methods in engineered fill and cellular concrete delivered by specialists.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Low-impact Delivery', 'description' => 'Pumpable, self-compacting placement with minimal traffic management delays.'),
                array('icon' => 'adv-quality', 'title' => 'Engineering Assurance', 'description' => 'Designed for specified strengths and densities, backed by a 10 year warranty.'),
            ),
        )),
        array('id' => 'seed-cef-cta', 'type' => 'solution-cta', 'section_key' => 'commercial-engineered-fill-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Get A FREE Quote & Structural Assessment',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Figma-matched builder content for Commercial Engineered Fill.
 * Node 921:13763 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_commercial_engineered_fill_seed_blocks()
{
    return array(
        array('id' => 'seed-cef-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-engineered-fill-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Engineered Fill Solutions for Commercial & Infrastructure Projects',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url('/commercial-solutions/'),
            'current_label' => 'Engineered Fill',
        )),
        array('id' => 'seed-cef-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-engineered-fill-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Lightweight, High-Performance Fill for Ground Improvement, Asset Protection & Civil Construction',
            'body_richtext' => "Construction projects often require more than standard backfill materials. When weak ground, underground voids, abandoned services, or heavy structural loads are present, engineered fill provides a reliable solution that improves ground performance while reducing construction risks.\n\nAt Rectify, we deliver engineered fill solutions for commercial, industrial, civil, mining, and infrastructure projects across Melbourne, Victoria, South Australia, and throughout Australia. Our engineering-led approach provides controlled, project-specific fill materials designed to improve stability, reduce settlement, protect underground assets, and support long-term structural performance. Engineered fill is commonly used to create stable, predictable ground conditions for buildings, pavements, utilities, and infrastructure.",
            'image' => 'images/commercial-engineered-fill/intro-site.png',
            'image_alt' => 'Workers installing engineered fill on a civil construction site',
        )),
        array('id' => 'seed-cef-required-v2', 'type' => 'commercial-engineered-required', 'section_key' => 'commercial-engineered-fill-required', 'label' => 'When Engineered Fill Is Required', 'fields' => array(
            'heading' => 'When Is Engineered Fill Required?',
            'lead' => 'Many commercial, industrial and civil infrastructure projects encounter challenging ground conditions that cannot be addressed using conventional backfill or earthworks alone. Engineered fill provides a controlled solution where ground stability, structural performance and long-term reliability are critical to the success of the project.',
            'items' => array(
                array(
                    'image' => 'images/commercial-engineered-fill/weak-foundation-soils.jpg',
                    'image_alt' => 'Ground improvement works beside a weak building foundation',
                    'title' => 'Weak Foundation Soils',
                    'description' => 'Natural soils may not have sufficient strength to safely support buildings, heavy pavements, or industrial structures.',
                ),
                array(
                    'image' => 'images/commercial-engineered-fill/infrastructure-rehabilitation.png',
                    'image_alt' => 'Excavator and truck on a major infrastructure rehabilitation project',
                    'title' => 'Infrastructure Rehabilitation',
                    'description' => 'Roads, rail corridors, bridges, airports, ports, and public infrastructure often require engineered fill during maintenance, rehabilitation, or asset renewal projects.',
                ),
                array(
                    'image' => 'images/commercial-engineered-fill/utility-pipe-abandonment.jpg',
                    'image_alt' => 'Utility pipe beside a concrete foundation',
                    'title' => 'Utility & Pipe Abandonment',
                    'description' => 'When pipelines, culverts, tunnels, or underground services are decommissioned, engineered fill can provide controlled support while reducing future settlement risks. Lightweight engineered fill is widely used for pipe abandonment, large void filling, and underground asset decommissioning.',
                ),
            ),
        )),
        array('id' => 'seed-cef-comparison-v2', 'type' => 'commercial-engineered-comparison', 'section_key' => 'commercial-engineered-fill-comparison', 'label' => 'Engineered Fill Benefits', 'fields' => array(
            'heading' => 'Why Choose Engineered Fill Instead of Conventional Backfill?',
            'lead' => 'Conventional fill materials are not suitable for every project. In areas with poor ground conditions, buried services, large underground voids or structures that are sensitive to additional loading, engineered fill provides a controlled and predictable alternative. By selecting the appropriate engineered fill material, projects can achieve improved ground performance while reducing settlement risks, construction time and long-term maintenance.',
            'image' => 'images/commercial-engineered-fill/engineered-backfill.png',
            'image_alt' => 'Lightweight engineered backfill being placed behind a retaining wall',
            'items' => array(
                array(
                    'title' => 'Lightweight Construction',
                    'description' => 'Engineered fill significantly reduces dead loads on existing ground, retaining walls, culverts, tunnels and buried infrastructure. This makes it ideal where traditional compacted fill would place excessive pressure on surrounding structures.',
                ),
                array(
                    'title' => 'Controlled Strength',
                    'description' => 'Unlike conventional fill, engineered fill can be designed to achieve specific strength and density requirements while remaining excavatable when future utility access is required.',
                ),
                array(
                    'title' => 'Reduced Settlement',
                    'description' => 'Properly designed engineered fill minimises post-construction settlement, helping protect pavements, foundations, utilities and structures from future movement.',
                ),
                array(
                    'title' => 'Faster Installation',
                    'description' => 'Many engineered fill solutions can be placed more quickly than conventional compacted fill, reducing construction programmes and minimising disruption on active infrastructure sites.',
                ),
            ),
        )),
        array('id' => 'seed-cef-applications-v2', 'type' => 'commercial-engineered-applications', 'section_key' => 'commercial-engineered-fill-applications', 'label' => 'Applications of Engineered Fill', 'fields' => array(
            'heading' => 'Applications of Engineered Fill',
            'lead' => 'Rectify provides engineered fill solutions across a broad range of commercial, industrial and civil infrastructure projects where controlled ground improvement is essential.',
            'items' => array(
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-commercial-industrial.svg',
                    'title' => 'Commercial & Industrial Developments',
                    'description' => 'Create stable working platforms and engineered ground conditions beneath warehouses, manufacturing facilities, logistics centres and commercial buildings.',
                ),
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-roads-pavements.svg',
                    'title' => 'Roads & Pavements',
                    'description' => 'Restore support beneath roads, intersections, pavements and transport corridors while reducing future settlement and extending pavement service life.',
                ),
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-utility-infrastructure.svg',
                    'title' => 'Utility Infrastructure',
                    'description' => 'Support pipe abandonment, service relocations, underground chambers, culverts and utility corridors using lightweight engineered fill designed for long-term stability.',
                ),
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-bridges-structures.svg',
                    'title' => 'Bridges & Structures',
                    'description' => 'Reduce loads behind bridge abutments, retaining structures and elevated assets while providing reliable structural support.',
                ),
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-rail-transport.svg',
                    'title' => 'Rail & Transport Infrastructure',
                    'description' => 'Improve subgrade performance beneath rail assets, platforms and transport infrastructure where settlement control and operational reliability are critical.',
                ),
                array(
                    'icon' => 'images/commercial-engineered-fill/icon-mining-industrial.svg',
                    'title' => 'Mining & Industrial Facilities',
                    'description' => 'Provide engineered void filling and controlled backfilling around process infrastructure, equipment foundations and heavy industrial assets.',
                ),
            ),
        )),
        array('id' => 'seed-cef-process-v2', 'type' => 'commercial-engineered-process', 'section_key' => 'commercial-engineered-fill-process', 'label' => 'Our Engineered Fill Process', 'fields' => array(
            'heading' => 'Our Engineered Fill Process',
            'lead' => 'Every project begins with understanding the site conditions, engineering requirements and long-term performance objectives. Our experienced team works closely with asset owners, consulting engineers and contractors to deliver fit-for-purpose engineered fill solutions.',
            'image' => 'images/commercial-engineered-fill/process-broughton-hall.jpg',
            'image_alt' => 'Site assessment and engineered fill works at Broughton Hall',
            'items' => array(
                array(
                    'number' => '01',
                    'title' => 'Site Assessment',
                    'description' => 'Every project begins with understanding the site conditions, engineering requirements and long-term performance objectives. Our experienced team works closely with asset owners, consulting engineers and contractors to deliver fit-for-purpose engineered fill solutions.',
                ),
                array(
                    'number' => '02',
                    'title' => 'Engineering Design',
                    'description' => 'The appropriate engineered fill material is selected based on loading requirements, density, strength, constructability and future asset considerations.',
                ),
                array(
                    'number' => '03',
                    'title' => 'Controlled Placement',
                    'description' => 'Materials are placed using proven methodologies that ensure consistent performance while minimising disruption to surrounding infrastructure and operations.',
                ),
                array(
                    'number' => '04',
                    'title' => 'Quality Assurance',
                    'description' => 'Throughout the works, installation is monitored to ensure compliance with project specifications and engineering requirements, delivering reliable long-term ground performance.',
                ),
            ),
        )),
        array('id' => 'seed-cef-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-engineered-fill-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array(
                    'image' => 'images/commercial-ground-improvement/icon-worker.svg',
                    'title' => 'Engineering-Led Solutions',
                    'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-expert.svg',
                    'title' => 'Proven Structural Expertise',
                    'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-non-invasive.svg',
                    'title' => 'Non-Invasive Technology',
                    'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-services-longterm.png',
                    'title' => 'Long-Term Confidence',
                    'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.',
                ),
            ),
        )),
        array('id' => 'seed-cef-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-engineered-fill-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Improve Ground Performance?',
            'copy' => 'Rectify provides engineered fill solutions that improve ground stability, reduce construction risk and support long-term structural performance.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_void_filling_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-cvf-hero', 'type' => 'solution-hero', 'section_key' => 'commercial-void-filling-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Void Filling',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
        )),
        array('id' => 'seed-cvf-intro', 'type' => 'solution-band', 'section_key' => 'commercial-void-filling-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Void Filling',
            'body_richtext' => "Void formation can develop through a variety of natural and human activity. These voids can lead to ground subsidence, sinkholes, or other geotechnical issues that affect the stability of structures and the safety of the surrounding area. The main methods of void formation are:\n\nThe presence of localised cavities developing within the soil profile are infrequent but may destabilise the ground depending upon the cohesion and strength of the soil. Reactive soils shrink and swell and extended drying can cause cracks to propagate, forming networks of anastomosing shrinkage planes. This can lead to instability and a loss of bearing capacity caused by the aeration of the soil mass and subsoil settlement, causing voids below ground.\n\nWater migrating through the soil can mobilise fine particles and progressively strip material from a soil horizon, carrying it away and resulting in the formation of voids that can continue to grow. Sinkholes are a phenomenon that develops unseen over a period of time before sufficient material is lost and the overlying ground loses support and collapses. Poorly consolidated soils are susceptible when large volumes of running water are present, such as during floods or through broken water or waste pipes. In certain environments, dissolution of bedrock, typically limestone, causes underground cavities to develop that can lead to the formation of sinkholes with the collapse of the surface.\n\nAbandoned earthworks, particularly associated with mining activities, are well known to suffer collapse over time. Shafts sealed decades earlier may suddenly open as supporting sleeper timbers fail under the weight of the overburden. Or alternatively, capping layers may be compromised, exposing the open shafts below.\n\nWhen constructing tunnels for roads, railways or utilities, deep ground movement can occur due to potential loss of soil support, and loosening of surrounding soil and rocks. If the surrounding soils are soft, soil compaction may also occur. This can lead to formation of voids.",
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/commercial-void-filling-e05-2.png',
        )),
        array('id' => 'seed-cvf-options', 'type' => 'solution-band', 'section_key' => 'commercial-void-filling-options', 'label' => 'Void Filling Options', 'fields' => array(
            'soft' => 'yes',
            'media_position' => 'first',
            'body_richtext' => "The process of void filling is determined by the extent of the cavity formation and volumes involved. For soil treatment, injecting a range of engineered expanding polyurethane resins that target weak planes within the ground is capable of both filling the cavities and compacting the surrounding soil to re-introduce strength and bearing capacity. Where larger voids are involved, such as sink holes and mine openings, calculations can be made and flowable cellular cementitious fill can be pumped in to create a monolithic mass of light weight concrete that has a design strength and density suited to the application.\n\nAt Rectify Group, we have two options to void fill:",
            'body_list' => "Polyurethane injection: Utilising our advanced two-part foam, we utilise foams of differing densities and expansion rates to inject into the void. As the foam expands it rapidly fills the void, and binds to surrounding soils. Once cured it forms a hard, encapsulated soil mass.\nLightweight Cellular Concrete: A specialised polymer solution is hydrated and aerated. This lightweight foam is then mixed with grout or concrete to form lightweight concrete, as light as 300kg/m³. It is poured into voids as engineered bulk fill, and once the LCC is cured and hardened it forms a permanent replacement to soil and a permanent fill to void. It is self-compacting, with high flowability and minimal creep.",
            'cta_text' => 'Contact Us To Get A Free Quote',
            'cta_url' => home_url( '/contact-us/' ),
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/commercial-void-filling-e04-1.jpg',
        )),
        array('id' => 'seed-cvf-advantage', 'type' => 'solution-band', 'section_key' => 'commercial-void-filling-advantage', 'label' => 'The Rectify Advantage', 'fields' => array(
            'full_width' => 'yes',
            'kicker' => "HERE'S WHY WE STAND OUT",
            'heading' => 'The Rectify Advantage',
            'body_benefits' => rectify_pb_get_commercial_solution_advantage_items(),
        )),
        array('id' => 'seed-cvf-why', 'type' => 'solution-icon-grid', 'section_key' => 'commercial-void-filling-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'dark' => 'yes',
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'cracked-void-filling', 'title' => 'Proven Techniques, Experienced Team', 'description' => 'Established methods in polyurethane injection and lightweight cellular concrete delivered by specialists.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Low-impact Delivery', 'description' => 'Small injection points, neat reinstatement, and minimal interruption to site operations.'),
                array('icon' => 'adv-quality', 'title' => 'Engineering Assurance', 'description' => 'Site-specific treatment plans, monitored injection, and documented outcomes backed by a 10 year warranty.'),
            ),
        )),
        array('id' => 'seed-cvf-cta', 'type' => 'solution-cta', 'section_key' => 'commercial-void-filling-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Get A FREE Quote & Structural Assessment',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Figma-matched builder content for Commercial Void Filling.
 * Node 944:14183 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_commercial_void_filling_seed_blocks()
{
    return array(
        array('id' => 'seed-cvf-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-void-filling-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Commercial Void Filling & Sinkhole Remediation Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url('/commercial-solutions/'),
            'current_label' => 'Void Filling',
        )),
        array('id' => 'seed-cvf-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-void-filling-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Void Filling Solutions for Commercial, Industrial & Infrastructure Assets',
            'body_richtext' => "Underground voids and sinkholes can develop without warning, compromising the stability of buildings, roads, rail corridors, warehouses, industrial facilities, and critical infrastructure. Left untreated, these hidden cavities can lead to ground subsidence, foundation movement, pavement failure, and significant safety risks.\n\nAt Rectify, we provide commercial void filling and sinkhole remediation solutions across Melbourne, Victoria, South Australia, and projects throughout Australia. Using advanced ground engineering techniques, we stabilise underground voids, restore bearing capacity, and strengthen the surrounding ground with minimal disruption to operations wherever practical. Rectify delivers engineered polyurethane injection and lightweight cellular concrete solutions for both localised voids and large underground cavities.",
            'image' => 'images/commercial-void-filling/void-filling-hero.jpg',
            'image_alt' => 'Underground void beneath a concrete slab',
        )),
        array('id' => 'seed-cvf-causes-v2', 'type' => 'commercial-void-causes', 'section_key' => 'commercial-void-filling-causes', 'label' => 'Causes of Underground Voids', 'fields' => array(
            'heading' => 'What Causes Underground Voids & Sinkholes?',
            'lead' => 'Underground voids can form gradually over months or years before becoming visible at the surface. Understanding the cause is essential for selecting the right remediation solution.',
            'items' => array(
                array(
                    'image' => 'images/commercial-void-filling/soil-erosion.jpg',
                    'image_alt' => 'Soil erosion beneath a road and concrete edge',
                    'title' => 'Soil Erosion',
                    'description' => 'Flowing groundwater, poor drainage, flooding, or leaking underground services can gradually wash fine soil particles away, creating hidden voids beneath foundations, roads, and slabs.',
                ),
                array(
                    'image' => 'images/commercial-void-filling/water-main-leaks.jpg',
                    'image_alt' => 'Damaged underground water pipe exposed in soil',
                    'title' => 'Water Main & Stormwater Leaks',
                    'description' => 'Damaged water pipes, sewer lines, or stormwater systems can soften surrounding soils and transport material away, leaving unsupported cavities beneath structures.',
                ),
                array(
                    'image' => 'images/commercial-void-filling/reactive-soil-movement.jpg',
                    'image_alt' => 'Cracked reactive soil beside a brick building',
                    'title' => 'Reactive Soil Movement',
                    'description' => 'Shrink-swell clay soils expand during wet periods and contract during dry conditions. Over time, repeated seasonal movement can contribute to localised void formation and reduced bearing capacity.',
                ),
                array(
                    'image' => 'images/commercial-void-filling/abandoned-services.jpg',
                    'image_alt' => 'Abandoned underground pipe and excavation',
                    'title' => 'Abandoned Services & Excavations',
                    'description' => 'Old utility trenches, decommissioned pipelines, underground tanks, abandoned mine workings, and previous excavations may deteriorate over time, creating unstable underground spaces.',
                ),
                array(
                    'image' => 'images/commercial-void-filling/tunnel-construction.jpg',
                    'image_alt' => 'Tunnel construction and ground excavation',
                    'title' => 'Tunnel Construction & Ground Movement',
                    'description' => 'Excavation associated with tunnels, rail infrastructure, utilities, or adjacent developments can disturb surrounding soils and contribute to the formation of underground voids.',
                ),
                array(
                    'image' => 'images/commercial-void-filling/natural-geological-conditions.jpg',
                    'image_alt' => 'Natural geological cavities exposed beneath the ground',
                    'title' => 'Natural Geological Conditions',
                    'description' => 'In some locations, naturally occurring rock formations such as limestone can dissolve over time, creating underground cavities that may eventually collapse into sinkholes.',
                ),
            ),
        )),
        array('id' => 'seed-cvf-process-v2', 'type' => 'commercial-void-process', 'section_key' => 'commercial-void-filling-process', 'label' => 'Our Void Filling Process', 'fields' => array(
            'heading' => 'Our Void Filling Process',
            'lead' => 'For soil treatment, injecting a range of engineered expanding polyurethane resins that target weak planes within the ground is capable of both filling the cavities and compacting the surrounding soil to re-introduce strength and bearing capacity. Where larger voids are involved, such as sink holes and mine openings, calculations can be made and flowable cellular cementitious fill can be pumped in to create a monolithic mass of light weight concrete that has a design strength and density suited to the application.',
            'image' => 'images/commercial-void-filling/void-filling-process.jpg',
            'image_alt' => 'Engineered void filling works beneath a concrete slab',
            'options_heading' => 'Void Filling Options:',
            'items' => array(
                array(
                    'title' => 'Polyurethane injection',
                    'description' => 'Utilising our advanced two-part foam, we utilise foams of differing densities and expansion rates to inject into the void. As the foam expands it rapidly fills the void, and binds to surrounding soils. Once cured it forms a hard, encapsulated soil mass.',
                ),
                array(
                    'title' => 'Lightweight Cellular Concrete',
                    'description' => 'A specialised polymer solution is hydrated and aerated. This lightweight foam is then mixed with grout or concrete to form lightweight concrete, as light as 300kg/m3. It is poured into voids as engineered bulk fill, and once the LCC is cured, and hardened it forms a permanent replacement to soil and a permanent fill to void. It is self-compacting, with high flowability and minimal creep.',
                ),
            ),
        )),
        array('id' => 'seed-cvf-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-void-filling-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array(
                    'image' => 'images/commercial-ground-improvement/icon-worker.svg',
                    'title' => 'Engineering-Led Solutions',
                    'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-expert.svg',
                    'title' => 'Proven Structural Expertise',
                    'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-non-invasive.svg',
                    'title' => 'Non-Invasive Technology',
                    'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.',
                ),
                array(
                    'image' => 'images/commercial-ground-improvement/icon-services-longterm.png',
                    'title' => 'Long-Term Confidence',
                    'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.',
                ),
            ),
        )),
        array('id' => 'seed-cvf-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-void-filling-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Restore Ground Support With Engineered Void Filling',
            'copy' => 'Hidden voids beneath slabs, pavements and infrastructure can compromise structural performance and increase long-term maintenance costs. Rectify delivers engineered void filling solutions that stabilise the ground, restore support and minimise operational disruption.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the standalone "Soil Stabilisation" page (post ID 1028,
 * top-level), replicated verbatim from the live
 * rectify.com.au/soil-stabilisation/ page. The live page is copy-only (no
 * content photography), so every section is a text block.
 *
 * @return array
 */
function rectify_pb_get_soil_stabilisation_seed_blocks()
{
    return array(
        array('id' => 'seed-soil-hero', 'type' => 'brick-hero', 'section_key' => 'soil-stabilisation-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'RESIDENTIAL SOLUTIONS',
            'title' => 'Residential Soil Stabilisation',
            'copy' => 'At Rectify Group, we transform unstable grounds into resilient foundations. Over 50 years of expertise dedicated to bringing enduring stability to your home.',
            'cta_primary_text' => 'Get A Free Quote',
            'cta_primary_url' => home_url( '/contact-us/' ),
        )),
        array('id' => 'seed-soil-why', 'type' => 'solution-band', 'section_key' => 'soil-stabilisation-why', 'label' => 'Why Soil Stabilisation Matters', 'fields' => array(
            'full_width' => 'yes',
            'heading' => 'Why Soil Stabilisation Matters',
            'body_richtext' => "We're all too familiar with the issues caused by soil instability: cracks in the walls, sloping floors, and worst of all, a compromised home structure. That's where soil stabilisation steps in as the silent hero.\n\nWith our cutting-edge techniques, we enhance soil properties, increasing its weight-bearing capabilities and reducing risks associated with soil liquefaction and settlement.",
        )),
        array('id' => 'seed-soil-innovative', 'type' => 'solution-band', 'section_key' => 'soil-stabilisation-innovative', 'label' => 'Our Innovative Solutions', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Our Innovative Solutions',
            'body_richtext' => "In a realm often plagued by outdated methods, we dare to be different. Our state-of-the-art techniques like injection grouting and compaction offer efficient, minimally-intrusive remedies that are both fast and affordable. When you entrust us with your home, you're getting nothing less than the best.",
            'related_label' => 'Related Services:',
            'related_links' => array(
                array('text' => 'Ground Improvement', 'url' => '/residential/ground-improvement/'),
                array('text' => 'Chemical Underpinning', 'url' => '/residential/chemical-underpinning/'),
            ),
        )),
        array('id' => 'seed-soil-environment', 'type' => 'solution-band', 'section_key' => 'soil-stabilisation-environment', 'label' => 'Environmental Responsibility', 'fields' => array(
            'full_width' => 'yes',
            'heading' => 'Environmental Responsibility',
            'body_richtext' => 'We take our commitment to the planet seriously. The products we use in the soil stabilisation process are environmentally friendly and comply with all relevant regulations. Peace of mind for you; a helping hand for Mother Earth.',
        )),
        array('id' => 'seed-soil-advantage', 'type' => 'solution-band', 'section_key' => 'soil-stabilisation-advantage', 'label' => 'The Rectify Advantage', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'kicker' => "HERE'S WHY WE STAND OUT",
            'heading' => 'The Rectify Advantage',
            'body_benefits' => rectify_pb_get_commercial_solution_advantage_items(),
        )),
        array('id' => 'seed-soil-testimonials-intro', 'type' => 'solution-band', 'section_key' => 'soil-stabilisation-testimonials-intro', 'label' => 'Testimonials Intro', 'fields' => array(
            'full_width' => 'yes',
            'kicker' => 'OUR TESTIMONIALS',
            'heading' => 'What Our Clients Are Saying',
            'body_richtext' => 'Get in touch with the Rectify team today to begin work on your next project.',
            'cta_text' => 'View All Reviews',
            'cta_url' => home_url( '/reviews/' ),
        )),
        array('id' => 'seed-soil-testimonials', 'type' => 'solution-icon-grid', 'section_key' => 'soil-stabilisation-testimonials', 'label' => 'Testimonials', 'fields' => array(
            'heading' => '',
            'items' => array(
                array('icon' => '', 'title' => 'Highly Recommended', 'description' => 'Thanks to all the team - Frank, Armand, Adrian, Birt, Junior, Beyz and Tina - for the professional approach and expertise brought to a difficult four townhouse stabilization and lift project. Highly recommended. — Bill Rees, Verified Customer'),
                array('icon' => '', 'title' => 'Very Professional', 'description' => 'Very professional. Explained everything to me and answered all my questions. The guys were always on time and cleaned up everything when they left, and they were friendly and polite. — Andrea Wilde, Verified Customer'),
                array('icon' => '', 'title' => 'Professional & Clear', 'description' => 'Professional and clear advice, all services undertaken in a planned and timely manner. At the moment all seems well - but a bit early to confirm definitively. — Cheryl Sullivan, Verified Customer'),
                array('icon' => '', 'title' => 'Beyond Expectation', 'description' => 'We were very satisfied with all aspects of their service. The outcome was beyond expectation with all wall issue greatly improved. Their knowledge and service was great. Would highly recommend Rectify. — Kris Camm, Verified Customer'),
            ),
        )),
        array('id' => 'seed-soil-faq', 'type' => 'faq-list', 'section_key' => 'soil-stabilisation-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array('question' => 'Do I really need soil stabilisation for my property?', 'answer' => "Soil stability is vital for your home's structural integrity. If you notice cracks or other signs of settling, it's likely that soil stabilisation could be beneficial."),
                array('question' => 'What is the duration of the soil stabilisation process?', 'answer' => 'Generally, soil stabilisation projects range from a few days to several weeks, depending on the complexity of the job.'),
                array('question' => 'How much does soil stabilisation cost?', 'answer' => 'Each project is unique, and we provide detailed quotations after assessing the property. Rest assured, we aim to provide the most cost-effective solutions.'),
                array('question' => 'Is the process disruptive to my daily life?', 'answer' => 'Our modern methods are designed to be minimally invasive, meaning less disruption to your day-to-day activities.'),
                array('question' => 'Is the stabilised soil safe for landscaping and gardening?', 'answer' => 'Absolutely. Our environmentally friendly solutions ensure that your soil remains suitable for all types of landscaping and gardening projects.'),
            ),
        )),
        array('id' => 'seed-soil-cta', 'type' => 'solution-cta', 'section_key' => 'soil-stabilisation-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Get A FREE Quote & Structural Assessment',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Seed content for the commercial "Ground Improvement" page (post ID 3037,
 * child of Commercial Solutions), replicated from the live
 * rectify.com.au/enterprise-solutions/ground-improvement/ page. The live
 * page's "Before & After Treatment" gallery images 404 on the live server
 * (broken lazy-load leftovers), so the theme's existing before/after assets
 * are substituted there instead.
 *
 * @return array
 */
function rectify_pb_get_commercial_ground_improvement_seed_blocks()
{
    return array(
        array('id' => 'seed-cgi-banner', 'type' => 'cgi-banner', 'section_key' => 'commercial-ground-improvement-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Commercial Ground Improvement Solutions Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
            'current_label' => 'Ground Improvement',
        )),
        array('id' => 'seed-cgi-intro', 'type' => 'cgi-intro', 'section_key' => 'commercial-ground-improvement-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Ground Improvement for Commercial, Industrial & Infrastructure Projects',
            'body_richtext' => "Weak or unstable ground can compromise the performance of buildings, pavements, warehouses, industrial facilities, and critical infrastructure. Whether caused by poor soil conditions, settlement, erosion, or inadequate compaction, unstable ground can lead to structural movement, uneven slabs, operational disruption, and costly repairs.\n\nAt Rectify, we deliver advanced ground improvement solutions for commercial, industrial, government, and infrastructure projects across Melbourne, Victoria, and South Australia. Our engineering-led approach strengthens the ground beneath existing and proposed structures, improving bearing capacity, reducing settlement, and extending asset life using modern, minimally invasive technologies.\n\nOur solutions are tailored to the unique geotechnical conditions of every site, helping clients reduce construction risks, minimise downtime, and protect valuable assets.",
        )),
        array('id' => 'seed-cgi-why-matters', 'type' => 'cgi-why-matters', 'section_key' => 'commercial-ground-improvement-why-matters', 'label' => 'Why Ground Improvement Matters', 'fields' => array(
            'heading' => 'Why ground improvement matters',
            'subheading' => 'Improve Ground Performance Before Structural Problems Escalate',
            'body_richtext' => "Ground deterioration often develops below the surface long before visible structural damage appears. Loose soils, underground voids, washouts and inadequate bearing capacity can progressively affect buildings, transport infrastructure, industrial facilities and utility assets.\n\nRather than replacing existing structures or undertaking major excavation, Rectify improves the engineering performance of the ground itself. Our solutions are designed to restore stability beneath existing assets while maintaining operational continuity wherever possible.",
            'applications_heading' => 'Typical applications include',
            'applications' => array(
                array('text' => 'Foundation support beneath commercial and industrial structures'),
                array('text' => 'Transport infrastructure including roads, pavements and bridge approaches'),
                array('text' => 'Utility corridors and underground service crossings'),
                array('text' => 'Warehouse and manufacturing facility slabs'),
                array('text' => 'Port, marine and civil infrastructure'),
                array('text' => 'Sites affected by erosion, settlement or underground voids'),
            ),
        )),
        array('id' => 'seed-cgi-solutions-grid', 'type' => 'cgi-solutions-grid', 'section_key' => 'commercial-ground-improvement-solutions-grid', 'label' => 'Our Ground Improvement Solutions', 'fields' => array(
            'heading' => 'Our Ground Improvement Solutions',
            'subheading' => 'Engineering Better Ground Performance',
            'body_richtext' => 'Every project begins with understanding the underlying ground conditions before selecting the most appropriate stabilisation methodology. Our engineering-led approach focuses on improving subsurface performance while reducing construction risk and operational downtime.',
            'items' => array(
                array('title' => 'Ground Stabilisation', 'description' => 'Strengthening weak or variable soils to improve load-bearing capacity and reduce long-term settlement beneath structures.'),
                array('title' => 'Void Filling', 'description' => 'Filling underground voids and washouts that have developed beneath slabs, pavements, foundations and infrastructure assets to restore continuous ground support.'),
                array('title' => 'Sand Permeation', 'description' => 'Where appropriate, sand permeation techniques are used to increase soil density by filling voids within loose granular soils, improving stability and reducing future settlement risks.'),
                array('title' => 'Precision Resin Injection', 'description' => 'Advanced expanding resin technologies can improve ground conditions, fill voids and restore support with minimal excavation or disruption to surrounding operations.'),
            ),
        )),
        array('id' => 'seed-cgi-why-choose', 'type' => 'cgi-why-choose', 'section_key' => 'commercial-ground-improvement-why-choose', 'label' => 'Why Commercial Clients Choose Rectify', 'fields' => array(
            'heading' => 'Why Commercial Clients Choose Rectify',
            'subheading' => 'Engineered Solutions Designed Around Asset Performance',
            'body_richtext' => "Commercial ground improvement is about more than correcting settlement\xe2\x80\x94it is about protecting asset value, reducing operational risk and extending service life.\n\nRectify partners with asset owners, consulting engineers, contractors and government organisations to deliver practical stabilisation solutions supported by engineering expertise and controlled execution.",
            'items' => array(
                array('title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('title' => 'Long-Term Confidence', 'description' => "We don\xe2\x80\x99t just repair today\xe2\x80\x99s problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-cgi-industries', 'type' => 'cgi-industries', 'section_key' => 'commercial-ground-improvement-industries', 'label' => 'Supporting Critical Infrastructure', 'fields' => array(
            'heading' => "Supporting Australia's Critical Infrastructure",
            'body_richtext' => 'Rectify provides engineered ground improvement solutions across a diverse range of sectors where structural reliability, operational continuity and long-term asset performance are essential.',
            'image' => 'images/commercial-ground-improvement/australia-map.png',
            'list_heading' => 'Industries We Support',
            'items' => array(
                array('text' => 'Commercial Buildings'),
                array('text' => 'Transport Infrastructure'),
                array('text' => 'Utilities'),
                array('text' => 'Industrial Facilities'),
                array('text' => 'Warehousing & Logistics'),
                array('text' => 'Government Assets'),
                array('text' => 'Marine & Port Infrastructure'),
                array('text' => 'Mining & Energy'),
                array('text' => 'Defence Infrastructure'),
            ),
        )),
        array('id' => 'seed-cgi-process', 'type' => 'cgi-process', 'section_key' => 'commercial-ground-improvement-process', 'label' => 'Our Process', 'fields' => array(
            'heading' => 'Our Process',
            'subheading' => 'A Structured Engineering Approach',
            'body_richtext' => "Unlike conventional repair methods, Rectify follows a disciplined engineering process that ensures every solution is tailored to the site's conditions and performance objectives.",
            'items' => array(
                array('number' => '01', 'title' => 'Assess', 'description' => 'Review ground conditions, existing structures and project constraints through detailed site investigation.'),
                array('number' => '02', 'title' => 'Engineer', 'description' => 'Develop an appropriate ground improvement strategy using proven stabilisation technologies and engineering expertise.'),
                array('number' => '03', 'title' => 'Deliver', 'description' => 'Execute the remediation safely and efficiently with minimal disruption to operations.'),
                array('number' => '04', 'title' => 'Verify', 'description' => 'Validate the completed works to confirm structural objectives have been achieved and the required performance outcomes delivered.'),
            ),
        )),
        array('id' => 'seed-cgi-cta', 'type' => 'cgi-cta', 'section_key' => 'commercial-ground-improvement-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Build With Confidence on Stronger Ground',
            'body_richtext' => 'Ground conditions play a critical role in the long-term performance of any structure. Rectify provides engineering-led ground improvement solutions that strengthen weak soils, improve foundation performance and minimise construction and operational risk.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_leak_sealing_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-cls-hero', 'type' => 'solution-hero', 'section_key' => 'commercial-leak-sealing-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Leak Sealing And Water Stopping',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
            'intro' => "Rectify can provide a suite of asset preservation technologies, many suited to address water ingress or containment. The ability to repair, rehabilitate or structurally improve critical assets such as tanks, pipes and pits, reservoirs and sewerage treatment plants means valuable infrastructure can perform beyond the initial design life.\n\nUnderstanding the complexities of the application is key to a successful treatment plan. Selection of an effective product and suitable surface preparation will ensure a long lasting application that can extend the life of the asset, is economically viable and can reduce downtime.",
        )),
        array('id' => 'seed-cls-intro', 'type' => 'solution-band', 'section_key' => 'commercial-leak-sealing-intro', 'label' => 'What Types Of Leaks Occur', 'fields' => array(
            'heading' => 'What Types Of Leaks Occur?',
            'body_richtext' => "Concrete slabs and walls can form small cracks over time. This can be due to shrinking, poor workmanship or constant wetting and drying. Even though these cracks do not initially affect the structural integrity of the concrete element, it can cause water leaks. This will lead to concrete cancer and spalling, which will compromise the structural capacity of the concrete elements.\n\nTogether with our engineering partners we are able to identify the underlying causes of the leaks and provide the appropriate rectification methods to push moisture out of existing concrete elements and provide a seal preventing the leaks from causing further damage to the structure.\n\nSome structures requiring leak sealing:",
            'body_list' => "Concrete roof tops or suspended slabs exposed to water/rainfall\nUtilities and below ground assets including concrete sewer/drain pipes and pits\nLiquid storage tanks\nBasement retaining walls\nTunnels",
            'image_grid' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-image2-min.png', 'caption' => 'Liquid Tank Remediation'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-e06-tunne.jpeg', 'caption' => 'Utilities Remediation'),
            ),
        )),
        array('id' => 'seed-cls-scenario1', 'type' => 'solution-band', 'section_key' => 'commercial-leak-sealing-scenario-one', 'label' => 'Scenario One', 'fields' => array(
            'soft' => 'yes',
            'media_position' => 'first',
            'heading' => 'Scenario One',
            'body_richtext' => "A suspended slab with a roof top terrace and garden bed: If minor cracks occur, and the water in the rain garden leaks into the apartment below there are two options.\n\nConventional Repair: Remove all trees, vegetation and soil, and strip all waterproofing. Once all stripped, the area is to be cleaned, dried and waterproofing reapplied. Only once this is done, can the garden bed be reinstated, and terrace re-opened for public access. This requires permanent closure of affected area, it is also time consuming and expensive.\n\nOur solution: Inject polyurethane resin into the crack through the slab from below, until the crack is fully sealed and the water leak has stopped, providing a permanent waterproof seal. This is not only non-invasive, it will only take a fraction of the time of option 1.",
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-e06-basement2.jpeg',
        )),
        array('id' => 'seed-cls-scenario2', 'type' => 'solution-band', 'section_key' => 'commercial-leak-sealing-scenario-two', 'label' => 'Scenario Two', 'fields' => array(
            'heading' => 'Scenario Two',
            'body_richtext' => "A basement wall on a site boundary has a leak through it. There are 3 options:\n\nConventional Earthworks: Expose the wall from the leaking side, this will require access to the neighbouring property and the use of heavy machinery to expose the wall and re-apply waterproofing. This will require permits and permission from your neighbour, will be very costly and may take weeks.\n\nHide the Leak: Create a false wall, or provide a seal on the basement wall so no leaks are visible. However, since water is still entering the crack, this will lead to concrete cancer and further degradation and no ability to monitor the failure.\n\nOur solution: High pressure inject polyurethane resin into the crack, not only sealing the crack but also providing a negative side waterproof seal.",
            'image_grid' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-image7-min.png', 'caption' => 'Before Treatment'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-image6-min.png', 'caption' => 'After Treatment'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/leak-sealing-e06-basement.jpeg', 'caption' => ''),
            ),
        )),
        array('id' => 'seed-cls-process', 'type' => 'solution-process-steps', 'section_key' => 'commercial-leak-sealing-process', 'label' => 'Our Process', 'fields' => array(
            'heading' => 'Our Process:',
            'items' => array(
                array('number' => '01', 'description' => 'Our engineers/supervisors will do a site investigation to discover the extent of the leak and if any damage has occurred to the existing concrete reinforcement.'),
                array('number' => '02', 'description' => 'Ports are drilled on a 45 degree angle towards the crack on either side. Then, either a two component or a single component polyurethane resin is adopted. If water is seasonal, then a two part is adopted, since the single part may shrink in the absence of water.'),
                array('number' => '03', 'description' => 'Using high pressure, the resin is injected through ports. The injection of resin is sequenced from the ports along the smallest crack width towards ports beside the larger crack width.'),
                array('number' => '04', 'description' => 'Any excess resin is carefully cleared away. The ports are removed and the holes are re-grouted with a high strength, waterproof adhesive grout.'),
            ),
        )),
        array('id' => 'seed-cls-advantage', 'type' => 'solution-band', 'section_key' => 'commercial-leak-sealing-advantage', 'label' => 'The Rectify Advantage', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'kicker' => "HERE'S WHY WE STAND OUT",
            'heading' => 'The Rectify Advantage',
            'body_benefits' => rectify_pb_get_commercial_solution_advantage_items(),
        )),
        array('id' => 'seed-cls-why', 'type' => 'solution-icon-grid', 'section_key' => 'commercial-leak-sealing-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'dark' => 'yes',
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'cracked-water-leaking', 'title' => 'Proven Techniques, Experienced Team', 'description' => 'Established methods in polyurethane injection leak sealing and water stopping delivered by specialists.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Low-impact Delivery', 'description' => 'Small injection points, neat reinstatement, and minimal interruption to site operations.'),
                array('icon' => 'adv-quality', 'title' => 'Engineering Assurance', 'description' => 'Site-specific treatment plans, monitored injection, and documented outcomes backed by a 10 year warranty.'),
            ),
        )),
        array('id' => 'seed-cls-cta', 'type' => 'solution-cta', 'section_key' => 'commercial-leak-sealing-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Get A FREE Quote & Structural Assessment',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Figma-matched builder content for Commercial Leak Sealing & Water Stopping.
 * Node 945:14703 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_commercial_leak_sealing_seed_blocks()
{
    return array(
        array('id' => 'seed-cls-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-leak-sealing-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Commercial Leak Sealing & Water Stopping Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url('/commercial-solutions/'),
            'current_label' => 'Leak Sealing And Water Stopping',
        )),
        array('id' => 'seed-cls-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-leak-sealing-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Water Ingress Solutions for Commercial, Industrial & Infrastructure Assets',
            'body_richtext' => "Water ingress is one of the leading causes of concrete deterioration, reinforcement corrosion, asset degradation, and costly maintenance across commercial and infrastructure assets. Even small leaks can allow moisture to penetrate concrete, leading to structural deterioration, operational disruption, and reduced service life if left untreated.\n\nAt Rectify, we provide commercial leak sealing and water stopping solutions for buildings, tunnels, basements, reservoirs, water treatment facilities, utilities, and civil infrastructure across Melbourne, Victoria, South Australia, and projects throughout Australia. Our engineering-led approach identifies the source of water ingress before applying site-specific remediation methods that seal leaks, protect structural assets, and minimise disruption to ongoing operations.\n\nUnlike temporary surface repairs, our solutions are designed to stop water at its source while helping preserve the structural integrity and operational performance of valuable assets.",
            'image' => 'images/commercial-leak-sealing/water-ingress-tunnel.jpg',
            'image_alt' => 'Water ingress inside an underground tunnel',
        )),
        array('id' => 'seed-cls-causes-v2', 'type' => 'commercial-leak-causes', 'section_key' => 'commercial-leak-sealing-causes', 'label' => 'Causes of Water Ingress', 'fields' => array(
            'heading' => 'What Causes Water Ingress?',
            'lead' => 'Water penetration usually occurs because structural movement, ageing materials, or environmental conditions create pathways that allow moisture to enter the structure.',
            'items' => array(
                array(
                    'image' => 'images/commercial-leak-sealing/concrete-cracks.jpg',
                    'image_alt' => 'Cracked concrete exposing reinforcement',
                    'title' => 'Concrete Cracks',
                    'description' => 'Concrete naturally develops small cracks due to shrinkage, thermal movement, settlement, or loading. These openings allow water to travel through structural elements and eventually reach reinforcing steel.',
                ),
                array(
                    'image' => 'images/commercial-leak-sealing/foundation-movement.jpg',
                    'image_alt' => 'Foundation movement and open concrete joint',
                    'title' => 'Foundation Movement',
                    'description' => 'Settlement and ground movement can place stress on foundations and retaining walls, causing new cracks or widening existing joints that permit water ingress.',
                ),
                array(
                    'image' => 'images/commercial-leak-sealing/failed-waterproofing.jpg',
                    'image_alt' => 'Failed waterproof membrane allowing water ingress',
                    'title' => 'Failed Waterproofing Systems',
                    'description' => 'Over time, waterproof membranes and joint seals can deteriorate, reducing their ability to prevent moisture penetration.',
                ),
                array(
                    'image' => 'images/commercial-leak-sealing/hydrostatic-pressure.jpg',
                    'image_alt' => 'Water pressure affecting an underground concrete structure',
                    'title' => 'Hydrostatic Pressure',
                    'description' => 'Groundwater surrounding basements, retaining walls, tunnels, and underground structures creates continuous pressure against concrete. Even minor defects may eventually allow water to enter.',
                ),
                array(
                    'image' => 'images/commercial-leak-sealing/construction-joints.jpg',
                    'image_alt' => 'Construction joint in a concrete structure',
                    'title' => 'Construction Joints',
                    'description' => 'Movement joints and construction joints are designed to accommodate structural movement, but if they deteriorate or lose their seal, they may become leakage paths.',
                ),
                array(
                    'image' => 'images/commercial-leak-sealing/ageing-infrastructure.jpg',
                    'image_alt' => 'Ageing and deteriorated concrete infrastructure',
                    'title' => 'Ageing Infrastructure',
                    'description' => 'Older commercial assets are often exposed to decades of moisture, chemical attack, environmental weathering, and operational loading, increasing the likelihood of water ingress and concrete deterioration.',
                ),
            ),
        )),
        array('id' => 'seed-cls-types-v2', 'type' => 'commercial-leak-types', 'section_key' => 'commercial-leak-sealing-types', 'label' => 'What Types of Leaks Occur', 'fields' => array(
            'heading' => 'What Types Of Leaks Occur?',
            'body_richtext' => "Concrete slabs and walls can form small cracks over time. This can be due to shrinking, poor workmanship or constant wetting and drying. Even though these cracks do not initially affect the structural integrity of concrete element, it can cause water leaks. This will lead to concrete cancer and spalling, which will compromise the structural capacity of the concrete elements.\n\nTogether with our engineering partners we are able to identify the underlying causes of the leaks and provide the appropriate rectification methods to push moisture out of existing concrete elements and provide a seal preventing the leaks from causing further damage to the structure.",
            'list_heading' => 'Some structures requiring leak sealing:',
            'items' => array(
                array('text' => 'Concrete roof tops or suspended slabs exposed to water/rainfall'),
                array('text' => 'Utilities and below ground assets including concrete sewer/drain pipes and pits'),
                array('text' => 'Liquid storage tanks'),
                array('text' => 'Basement retaining walls'),
                array('text' => 'Tunnels'),
            ),
            'image' => 'images/commercial-leak-sealing/liquid-tank-remediation.jpg',
            'image_alt' => 'Liquid tank remediation with sealed concrete joints',
        )),
        array('id' => 'seed-cls-scenarios-v2', 'type' => 'commercial-leak-scenarios', 'section_key' => 'commercial-leak-sealing-scenarios', 'label' => 'Repair Scenarios', 'fields' => array(
            'items' => array(
                array(
                    'title' => 'Scenario 1',
                    'intro' => 'A suspended slab with a roof top terrace and garden bed: If minor cracks occur, and the water in the rain garden leaks into the apartment below there are two options.',
                    'image' => 'images/commercial-leak-sealing/scenario-one.jpg',
                    'image_alt' => 'Basement wall beneath a roof terrace and garden bed',
                    'conventional_heading' => 'Conventional Repair',
                    'conventional_copy' => 'Remove all trees, vegetation and soil, and strip all waterproofing. Once all stripped, the area is to be cleaned, dried and waterproofing reapplied. Only once this is done, can the garden bed be reinstated, and terrace re-opened for public access. This requires permanent closure of affected area, it is also time consuming and expensive.',
                    'secondary_heading' => '',
                    'secondary_copy' => '',
                    'solution_heading' => 'Our solution',
                    'solution_copy' => 'Inject polyurethane resin into the crack through the slab from below; until the crack is fully sealed and the water leak has stopped, providing a permanent waterproof seal. This is not only non-invasive, it will only take a fraction of option 1.',
                ),
                array(
                    'title' => 'Scenario 2',
                    'intro' => 'A basement wall on a site boundary has a leak through it. There are 3 options:',
                    'image' => 'images/commercial-leak-sealing/scenario-two.jpg',
                    'image_alt' => 'Water ingress through a basement boundary wall',
                    'conventional_heading' => 'Conventional Earthworks',
                    'conventional_copy' => 'Expose the wall from the leaking side, this will require access to the neighboring property and the use of heavy machinery to expose the wall and re-apply waterproofing. This will require permits and permission from your neighbor, will be very costly and may take weeks.',
                    'secondary_heading' => 'Hide the Leak:',
                    'secondary_copy' => 'Create a false wall, or provide a seal on basement wall so no leaks are visible. However, since water is still entering the crack, this will lead to concrete cancer and further degradation and no ability to monitor the failure.',
                    'solution_heading' => 'Our solution',
                    'solution_copy' => 'High pressure inject polyurethane resin into the crack, not only sealing the crack but also providing a negative side waterproof seal.',
                ),
            ),
        )),
        array('id' => 'seed-cls-diagnostics-v2', 'type' => 'commercial-leak-diagnostics', 'section_key' => 'commercial-leak-sealing-diagnostics', 'label' => 'Before and After Diagnostics', 'fields' => array(
            'heading' => 'Water Leaks Detected. Precisely Treated. Problem Solve',
            'lead' => 'Advanced diagnostic identify hidden water ingress, targeted treatment seals the sources, and verified results confirm a dry, protected structure.',
            'before_image' => 'images/commercial-leak-sealing/diagnostic-before.jpg',
            'before_label' => 'BEFORE',
            'after_image' => 'images/commercial-leak-sealing/diagnostic-after.jpg',
            'after_label' => 'AFTER',
        )),
        array('id' => 'seed-cls-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-leak-sealing-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.'),
            ),
        )),
        array('id' => 'seed-cls-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-leak-sealing-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Restore Ground Support With Engineered Void Filling',
            'copy' => 'Hidden voids beneath slabs, pavements and infrastructure can compromise structural performance and increase long-term maintenance costs. Rectify delivers engineered void filling solutions that stabilise the ground, restore support and minimise operational disruption.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_protective_coatings_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-cpc-hero', 'type' => 'solution-hero', 'section_key' => 'commercial-protective-coatings-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Protective Coatings and Concrete Repair',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-img_2833.jpeg',
        )),
        array('id' => 'seed-cpc-intro', 'type' => 'solution-band', 'section_key' => 'commercial-protective-coatings-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Rectify Group Provide Protective Coating and Relining for Three Main Categories',
            'body_richtext' => "Surface Coatings: Surfaces exposed to the elements, wear and tear or potential chemical corrosion require surface coating to protect the concrete slab and steel reinforcement. A few different types of coatings include:\n\nEpoxy Coatings have excellent adhesion, chemical resistance and durability. Suited to floors exposed to wear and tear or corrosive chemicals, such as industrial and manufacturing warehouses (milk, yogurt etc), workshops, and kitchens. Elastomeric Polyurethane Coatings are highly flexible, impact resistant and used for structures that experience dynamic loads and movement, including bridge decks, car parks and roofs. Also effective in waterproofing applications.\n\nChemical Resistant Coatings for Storage Tanks are crucial as part of the ongoing maintenance and design life requirements of chemical storage tanks. Tanks storing chemicals, be it for water/sewer treatment, chemical bunds or fuel storage, require surface treatment to ensure the storage tank structure, be it concrete or steel, isn't corroded or degraded by the chemicals.\n\nStructural Repair and Relining of Culverts/Tunnels is required due to the abrasion of the surface caused by continuous flow. There can also be general degradation and/or corrosion of the original liner or structure. Coatings are applied to surfaces like concrete or steel to repair and strengthen existing structures, prevent further degradation, and extend the lifespan of the assets. Cement-Based Protective Coatings are applied to restore, strengthen and protect structures from water intrusion, chemical attack, or environmental degradation. Suitable for rehabilitating deteriorated structures including sewer/water mains and pipelines, stormwater applications, pumping stations, pits and transfer facilities to name a few.",
            'cta_text' => 'Contact Us To Get A Free Quote',
            'cta_url' => home_url( '/contact-us/' ),
            'image_grid' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-untitled-design-1.png', 'caption' => ''),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-img_5818.jpeg', 'caption' => ''),
            ),
        )),
        array('id' => 'seed-cpc-repair', 'type' => 'solution-band', 'section_key' => 'commercial-protective-coatings-repair', 'label' => 'Concrete Repair', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Concrete Repair',
            'body_richtext' => 'Concrete Repair involves restoring the structural integrity, function, and appearance of damaged or deteriorated concrete structures. Concrete can suffer from various types of damage including cracking, moisture ingress causing steel corrosion and subsequent spalling, and chemical and physical weathering. These can be caused by factors such as environmental exposure, wear and tear, poor construction practices, or structural overload. The goal of concrete repair is to extend the service life of the structure, prevent further degradation, and restore its original functionality.',
        )),
        array('id' => 'seed-cpc-photos', 'type' => 'solution-photo-grid', 'section_key' => 'commercial-protective-coatings-photos', 'label' => 'Repair Photos', 'fields' => array(
            'items' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-e07-4.png', 'caption' => ''),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-e07-2.png', 'caption' => ''),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/protective-coatings-e07-3.png', 'caption' => ''),
            ),
        )),
        array('id' => 'seed-cpc-types', 'type' => 'solution-process-steps', 'section_key' => 'commercial-protective-coatings-types', 'label' => 'Common Types of Concrete Repairs', 'fields' => array(
            'heading' => 'Common Types of Concrete Repairs:',
            'items' => array(
                array('title' => 'Crack Repair', 'description' => 'Crack Injection: Low-viscosity epoxy or polyurethane resins are injected into cracks to restore the structural integrity and prevent water ingress.'),
                array('title' => 'Spall Repair', 'description' => 'Surface Repair Mortars: Used to patch areas where concrete has broken away or spalled due to corrosion of reinforcement.'),
                array('title' => 'Reinforcement Repair', 'description' => 'Corrosion Mitigation: Involves cleaning and treating corroded steel reinforcement and applying protective coatings or inhibitors to prevent further corrosion. Rebar Replacement or Addition: Damaged or corroded reinforcing bars are replaced or supplemented to restore structural integrity.'),
                array('title' => 'Overlays and Surface Repairs', 'description' => 'Thin-Bonded Overlays: Thin layers of polymer-modified or fibre-reinforced materials are applied over the existing surface to repair and protect against further damage. Full-Depth Replacement: When damage is extensive, a full-depth repair involves removing and replacing entire sections of concrete, and re-tying into the larger concrete section.'),
            ),
            'note' => 'Repair, remediate or replace.',
        )),
        array('id' => 'seed-cpc-before-after', 'type' => 'solution-band', 'section_key' => 'commercial-protective-coatings-before-after', 'label' => 'Before & After Treatment', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Before & After Treatment',
            'body_richtext' => 'Our results speak, see how we rectify.',
        )),
        array('id' => 'seed-cpc-advantage', 'type' => 'solution-band', 'section_key' => 'commercial-protective-coatings-advantage', 'label' => 'The Rectify Advantage', 'fields' => array(
            'full_width' => 'yes',
            'kicker' => "HERE'S WHY WE STAND OUT",
            'heading' => 'The Rectify Advantage',
            'body_benefits' => rectify_pb_get_commercial_solution_advantage_items(),
        )),
        array('id' => 'seed-cpc-why', 'type' => 'solution-icon-grid', 'section_key' => 'commercial-protective-coatings-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'dark' => 'yes',
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('icon' => 'commercial-concrete-repair-red', 'title' => 'Proven Techniques, Experienced Team', 'description' => 'Established methods in protective coatings, concrete repair, and structural relining delivered by specialists.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Low-impact Delivery', 'description' => 'Efficient application methods with minimal interruption to site operations.'),
                array('icon' => 'adv-quality', 'title' => 'Engineering Assurance', 'description' => 'Site-specific treatment plans and documented outcomes backed by a 10 year warranty.'),
            ),
        )),
        array('id' => 'seed-cpc-cta', 'type' => 'solution-cta', 'section_key' => 'commercial-protective-coatings-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Get A FREE Quote & Structural Assessment',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Figma-matched builder content for Protective Coatings & Concrete Repair.
 * Node 954:15156 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_commercial_protective_coatings_seed_blocks()
{
    return array(
        array('id' => 'seed-cpc-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-protective-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Protective Coatings & Concrete Repair Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url('/commercial-solutions/'),
            'current_label' => 'Protective Coatings and Concrete Repair',
        )),
        array('id' => 'seed-cpc-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-protective-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Engineered Concrete Protection & Repair Solutions for Commercial, Industrial & Infrastructure Assets',
            'body_richtext' => "Concrete is one of the most durable construction materials available, but continuous exposure to moisture, chemicals, abrasion, heavy traffic, and environmental conditions can cause it to deteriorate over time. Cracking, spalling, reinforcement corrosion, and surface wear not only reduce the appearance of an asset but can also compromise its structural performance and service life.\n\nAt Rectify, we provide protective coatings and concrete repair solutions for commercial buildings, industrial facilities, utilities, transport infrastructure, mining operations, marine assets, and government projects across Melbourne, Victoria, South Australia, and throughout Australia.\n\nOur engineering-led approach uses targeted protective coatings. We identify the underlying cause of deterioration before applying proven repair systems and protective coatings that restore structural integrity, improve durability, and extend asset life.",
            'image' => 'images/commercial-protective-coatings/intro-deteriorated-footing.jpg',
            'image_alt' => 'Deteriorated concrete footing requiring repair',
        )),
        array('id' => 'seed-cpc-causes-v2', 'type' => 'commercial-protective-causes', 'section_key' => 'commercial-protective-causes', 'label' => 'Causes of Concrete Deterioration', 'fields' => array(
            'heading' => 'What Causes Concrete Deterioration?',
            'lead' => 'Concrete deterioration rarely results from a single issue. It usually develops gradually as environmental, structural, and operational factors affect the material over time.',
            'items' => array(
                array(
                    'image' => 'images/commercial-protective-coatings/reinforcement-corrosion.jpg',
                    'image_alt' => 'Exposed and corroded reinforcement within concrete',
                    'title' => 'Reinforcement Corrosion',
                    'description' => 'When moisture and oxygen reach reinforcing steel, corrosion develops. As steel expands during corrosion, it creates internal pressure that causes cracking and concrete spalling.',
                ),
                array(
                    'image' => 'images/commercial-protective-coatings/structural-movement.jpg',
                    'image_alt' => 'Cracked concrete caused by structural movement',
                    'title' => 'Structural Movement',
                    'description' => 'Foundation settlement, thermal expansion, vibration, and operational loading may create cracks that allow moisture and contaminants to penetrate the concrete.',
                ),
                array(
                    'image' => 'images/commercial-protective-coatings/water-ingress.jpg',
                    'image_alt' => 'Water entering a concrete structure',
                    'title' => 'Water Ingress',
                    'description' => 'Water entering concrete through cracks or joints can accelerate reinforcement corrosion, weaken concrete, and reduce long-term durability.',
                ),
                array(
                    'image' => 'images/commercial-protective-coatings/chemical-attack.jpg',
                    'image_alt' => 'Chemical deterioration of a concrete structure',
                    'title' => 'Chemical Attack',
                    'description' => 'Industrial facilities, wastewater plants, marine environments, and chemical storage areas expose concrete to aggressive chemicals that gradually degrade the concrete surface.',
                ),
                array(
                    'image' => 'images/commercial-protective-coatings/heavy-traffic-abrasion.jpg',
                    'image_alt' => 'Industrial concrete exposed to heavy traffic and abrasion',
                    'title' => 'Heavy Traffic & Abrasion',
                    'description' => 'Constant forklift traffic, heavy machinery, vehicles, and pedestrian movement gradually wear protective concrete surfaces, particularly in warehouses, factories, and logistics facilities.',
                ),
                array(
                    'image' => 'images/commercial-protective-coatings/environmental-exposure.jpg',
                    'image_alt' => 'Concrete damaged by environmental exposure',
                    'title' => 'Environmental Exposure',
                    'description' => 'Rain, UV radiation, salt exposure, freeze-thaw cycles, and temperature fluctuations all contribute to long-term concrete deterioration.',
                ),
            ),
        )),
        array('id' => 'seed-cpc-solutions-v2', 'type' => 'commercial-protective-solutions', 'section_key' => 'commercial-protective-solutions', 'label' => 'Protective Coating & Relining Solutions', 'fields' => array(
            'heading' => 'Protective Coating & Relining Solutions',
            'lead' => 'Engineered coating and relining systems designed to protect concrete structures, prevent deterioration and extend the operational life of critical assets.',
            'items' => array(
                array(
                    'title' => 'Surface Coatings',
                    'description' => 'Surfaces exposed to the elements, wear and tear or potential chemical corrosion requires surface coating to protect the concrete slab and steel reinforcement.',
                    'options_heading' => 'Few different types of coatings include:',
                    'option_1_title' => 'Epoxy Coatings',
                    'option_1_copy' => 'have excellent adhesion, chemical resist and durability. Floors exposed to wear and tear or exposed to corrosive chemicals. Examples of these are industrial warehouses, manufacturing warehouses for milk, yogurt etc, workshops, and kitchens.',
                    'option_2_title' => 'Elastomeric Polyurethane Coatings',
                    'option_2_copy' => 'highly flexible, impact resistant and used for structures that experience dynamic loads and movement. These include bridge decks, car parks and roofs. Also effective in waterproofing applications.',
                    'image' => 'images/commercial-protective-coatings/surface-coatings.jpg',
                    'image_alt' => 'Protective surface coating and concrete repair examples',
                    'image_position' => 'last',
                ),
                array(
                    'title' => 'Chemical Resistant Coatings',
                    'description' => "for Storage Tanks are crucial as part of the ongoing maintenance and design life requirements of the chemical storage tanks. The tanks storing chemicals, be it for water/sewer treatment, chemical bunds or fuel storage tanks require surface treatment to ensure the storage tank structure be it concrete or steel isn't corroded or degraded by the chemicals.",
                    'image' => 'images/commercial-protective-coatings/chemical-resistant-coatings.jpg',
                    'image_alt' => 'Chemical resistant coating within a concrete car park',
                    'image_position' => 'first',
                ),
                array(
                    'title' => 'Structural Repair and Relining',
                    'description' => 'required due to the abrasion of the surface caused by continuous flow. There can also be general degradation and/or corrosion of the original liner or structure. Coatings are applied to surfaces like concrete or steel to repair and strengthen existing structures, prevent further degradation, and extend the lifespan of the assets.',
                    'option_1_title' => 'Cement-Based Protective Coatings',
                    'option_1_copy' => 'applied to restore, strengthen and protect structures from water intrusion, chemical attack, or environmental degradation. Suitable for rehabilitating deteriorated structures including sewer/water mains and pipelines, stormwater applications, pumping stations, pits and transfer facilities to name a few.',
                    'image' => 'images/commercial-protective-coatings/structural-repair-relining.jpg',
                    'image_alt' => 'Cement-based protective coating on a concrete wall',
                    'image_position' => 'last',
                ),
            ),
        )),
        array('id' => 'seed-cpc-feature-v2', 'type' => 'commercial-protective-feature', 'section_key' => 'commercial-protective-concrete-repair', 'label' => 'Concrete Repair', 'fields' => array(
            'heading' => 'Concrete Repair',
            'body_richtext' => 'Concrete Repair involves restoring the structural integrity, function, and appearance of damaged or deteriorated concrete structures. Concrete can suffer from various types of damage include cracking, moisture ingress causing steel corrosion and subsequent spalling, chemical and physical weathering. These can be caused by factors such as environmental exposure, wear and tear, poor construction practices, or structural overload. The goal of concrete repair is to extend the service life of the structure, prevent further degradation, and restore its original functionality.',
            'image' => 'images/commercial-protective-coatings/concrete-repair.jpg',
            'image_alt' => 'Deteriorated concrete footing undergoing repair',
        )),
        array('id' => 'seed-cpc-repairs-v2', 'type' => 'commercial-protective-repairs', 'section_key' => 'commercial-protective-specialist-repairs', 'label' => 'Specialist Concrete Repair Solutions', 'fields' => array(
            'heading' => 'Specialist Concrete Repair Solutions',
            'lead' => 'Every repair method is selected to address the specific cause of deterioration, restoring structural integrity while protecting the long-term performance of your concrete asset.',
            'items' => array(
                array(
                    'title' => 'Crack Repair',
                    'item_1_title' => 'Crack Injection',
                    'item_1_copy' => 'Low-viscosity epoxy or polyurethane resins are injected into cracks to restore the structural integrity and prevent water ingress.',
                ),
                array(
                    'title' => 'Spall Repair',
                    'item_1_title' => 'Surface Repair Mortars',
                    'item_1_copy' => 'Used to patch areas where concrete has broken away or spalled due to corrosion of reinforcement.',
                ),
                array(
                    'title' => 'Reinforcement Repair',
                    'item_1_title' => 'Crack Injection',
                    'item_1_copy' => 'Low-viscosity epoxy or polyurethane resins are injected into cracks to restore the structural integrity and prevent water ingress.',
                ),
                array(
                    'title' => 'Common Types of Concrete Repairs',
                    'item_1_title' => 'Corrosion Mitigation',
                    'item_1_copy' => 'Involves cleaning and treating corroded steel reinforcement and applying protective coatings or inhibitors to prevent further corrosion.',
                    'item_2_title' => 'Rebar Replacement or Addition',
                    'item_2_copy' => 'Damaged or corroded reinforcing bars are replaced or supplemented to restore structural integrity.',
                ),
                array(
                    'title' => 'Overlays and Surface Repairs',
                    'item_1_title' => 'Thin-Bonded Overlays',
                    'item_1_copy' => 'Thin layers of polymer-modified or fiber-reinforced materials are applied over the existing surface to repair and protect against further damage.',
                    'item_2_title' => 'Full-Depth Replacement',
                    'item_2_copy' => 'When damage is extensive, a full-depth repair involves removing and replacing entire sections of concrete, and re-tying into larger concrete section.',
                ),
            ),
        )),
        array('id' => 'seed-cpc-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-protective-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-cpc-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-protective-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Restore Ground Support With Engineered Void Filling',
            'copy' => 'Hidden voids beneath slabs, pavements and infrastructure can compromise structural performance and increase long-term maintenance costs. Rectify delivers engineered void filling solutions that stabilise the ground, restore support and minimise operational disruption.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_commercial_realignment_levelling_seed_blocks_legacy()
{
    return array(
        array('id' => 'seed-crl-hero', 'type' => 'solution-hero', 'section_key' => 'commercial-realignment-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Realignment / Levelling',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url( '/commercial-solutions/' ),
        )),
        array('id' => 'seed-crl-intro', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Stabilise, Lift and Restore Critical Assets — Fast, Safely, and with Minimal Disruption',
            'body_richtext' => 'Unseen changes in soil conditions can compromise the performance of your facility. Rectify Group delivers engineered realignment and re-levelling solutions that restore structural integrity, improve safety, and minimise operational downtime.',
            'cta_text' => 'Get A Free Quote',
            'cta_url' => home_url( '/contact-us/' ),
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-gemini_generated_image_vdtyxevdtyxevdtyee-1.png',
        )),
        array('id' => 'seed-crl-affecting', 'type' => 'solution-photo-grid', 'section_key' => 'commercial-realignment-affecting', 'label' => 'Is Foundation Movement Affecting Your Operations', 'fields' => array(
            'soft' => 'yes',
            'heading' => 'Is Foundation Movement Affecting Your Operations?',
            'lead' => "Foundation movement doesn't just impact your structure — it disrupts your entire operation.",
            'items' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-163.png', 'caption' => 'Uneven floors creating trip hazards'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-164.png', 'caption' => 'Jammed doors, shutters, and loading docks'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-165.png', 'caption' => 'Misaligned racking and machinery'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-166.png', 'caption' => 'Drainage issues and water pooling'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-167.png', 'caption' => 'Cracking slabs and joint deterioration'),
            ),
        )),
        array('id' => 'seed-crl-deeper', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-deeper', 'label' => 'Deeper Ground Instability', 'fields' => array(
            'media_position' => 'first',
            'heading' => 'These Are Not Surface Level Issues — They Are Signs of Deeper Ground Instability',
            'body_richtext' => 'Early intervention prevents costly repairs and operational downtime.',
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-image-29.png',
        )),
        array('id' => 'seed-crl-causes', 'type' => 'solution-process-steps', 'section_key' => 'commercial-realignment-causes', 'label' => 'What Causes Foundation Movement', 'fields' => array(
            'heading' => 'What Causes Foundation Movement?',
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-group-168.png',
            'items' => array(
                array('title' => 'Reactive Clays', 'description' => 'Shrink and swell due to moisture changes, reducing ground strength over time.'),
                array('title' => 'Sand & Granular Soils', 'description' => 'Lose cohesion under water movement or vibration, leading to voids and instability.'),
                array('title' => 'Poorly Compacted Fill', 'description' => 'Uncontrolled or inadequately compacted fill can settle over time, causing uneven support.'),
            ),
            'note' => 'Instead of redesigning the structure, Rectify targets the root cause — the ground itself.',
        )),
        array('id' => 'seed-crl-ripple', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-ripple', 'label' => 'The Ripple Effect', 'fields' => array(
            'soft' => 'yes',
            'heading' => 'The Ripple Effect of Foundation Movement',
            'body_richtext' => 'What starts as a minor issue can quickly escalate across your facility:',
            'body_list' => "Machinery and racking fall out of tolerance\nForklift operations become unsafe\nDoors, shutters, and dock levellers misalign\nFloor joints deteriorate and spall\nDrainage gradients fail, causing ponding\nIncreased wear and maintenance costs",
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-image-26.png',
        )),
        array('id' => 'seed-crl-process-intro', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-process-intro', 'label' => 'How Our Re-Levelling Process Works Intro', 'fields' => array(
            'media_position' => 'first',
            'heading' => 'How Our Re-Levelling Process Works',
            'body_richtext' => 'Our engineered process delivers precise, measurable results with minimal disruption.',
            'image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-img_0867-2.png',
        )),
        array('id' => 'seed-crl-process-steps', 'type' => 'solution-process-steps', 'section_key' => 'commercial-realignment-process-steps', 'label' => 'Re-Levelling Process Steps', 'fields' => array(
            'items' => array(
                array('number' => '01', 'title' => 'Investigation & Precision Drilling', 'description' => 'We assess levels, identify movement patterns, and drill small, targeted injection points.'),
                array('number' => '02', 'title' => 'Advanced Resin Injection', 'description' => 'Specialised polyurethane resin is injected at controlled depths to stabilise weak soils.'),
                array('number' => '03', 'title' => 'Ground Improvement', 'description' => 'The resin expands, filling voids and binding loose material to increase bearing capacity.'),
                array('number' => '04', 'title' => 'Controlled Re-levelling', 'description' => 'We carefully lift and realign slabs and structures with millimetre precision, verified through surveys.'),
            ),
        )),
        array('id' => 'seed-crl-solutions', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-solutions-band', 'label' => 'Our Re-Levelling Solutions', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Our Re-Levelling Solutions',
            'body_richtext' => 'We apply tailored solutions based on site conditions.',
            'body_benefits' => array(
                array('title' => 'Deep Ground Stabilisation', 'description' => "Strengthens weak or uncontrolled soil layers\nPrevents ongoing settlement and void formation\nSuitable for long-term structural stabilisation"),
                array('title' => 'Shallow Slab Support', 'description' => "Restores support beneath slabs (200–300mm depth)\nProvides fast correction and minimal downtime\nIdeal when deeper ground layers remain stable"),
            ),
        )),
        array('id' => 'seed-crl-industries', 'type' => 'solution-photo-grid', 'section_key' => 'commercial-realignment-industries', 'label' => 'Industries We Support', 'fields' => array(
            'heading' => 'Industries We Support',
            'lead' => 'Rectify delivers scalable solutions across a wide range of sectors:',
            'items' => array(
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-171.png', 'caption' => 'Transport Assets'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-172.png', 'caption' => 'Industrial Facilities'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-173.png', 'caption' => 'Commercial Buildings'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-174.png', 'caption' => 'Civil Infrastructure'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-175.png', 'caption' => 'Utilities and Energy'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-176.png', 'caption' => 'Mining and Resources'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-177.png', 'caption' => 'Marine and Coastal Infrastructure'),
                array('image' => 'http://localhost/rectify_fresh/wp-content/uploads/2026/07/realignment-industry-group-178.png', 'caption' => 'Residential and Strata Assets'),
            ),
        )),
        array('id' => 'seed-crl-faq', 'type' => 'solution-band', 'section_key' => 'commercial-realignment-faq', 'label' => 'FAQ', 'fields' => array(
            'full_width' => 'yes',
            'soft' => 'yes',
            'heading' => 'Frequently Asked Questions',
            'body_benefits' => array(
                array('title' => 'Can you work around live operations?', 'description' => 'Yes. We stage works to minimise disruption, and most areas can return to service the same day.'),
                array('title' => 'Will lifting damage the building or equipment?', 'description' => 'No. Our controlled process uses real-time monitoring to ensure safe and precise lifting.'),
                array('title' => 'How deep do you inject?', 'description' => 'Injection depth depends on site conditions, ranging from shallow slab support to deeper ground improvement.'),
                array('title' => 'How long does the solution last?', 'description' => 'Our resin solutions are inert and designed to provide long-term ground stabilisation by addressing the root cause.'),
            ),
        )),
        array('id' => 'seed-crl-why', 'type' => 'solution-icon-grid', 'section_key' => 'commercial-realignment-why', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'dark' => 'yes',
            'heading' => 'Why Homeowners Choose Rectify',
            'items' => array(
                array('icon' => 'cracked-realignment', 'title' => 'Technical Expertise', 'description' => 'Qualified structural engineers, geologists, project managers, supervisors and technicians with the highest expertise levels.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Latest Technology', 'description' => 'Investment in the latest technology, equipment and materials, with continuous review of global developments.'),
                array('icon' => 'adv-quality', 'title' => 'Quality Assurance', 'description' => 'Professional workmanship backed by a 10 year warranty across services.'),
                array('icon' => 'cracked-realignment', 'title' => 'Seamless Delivery', 'description' => 'Non-invasive technique allowing site continuity without disruption to operations.'),
                array('icon' => 'adv-trustworthy', 'title' => 'Affordable Solutions', 'description' => 'Competitive pricing when compared to similar companies.'),
            ),
        )),
        array('id' => 'seed-crl-cta', 'type' => 'solution-cta', 'section_key' => 'commercial-realignment-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Restore Levels and Performance?',
            'copy' => 'Rectify Group delivers engineered re-levelling solutions for complex commercial and industrial environments — safely, quickly, and with measurable results.',
            'primary_text' => 'Get A Free Quote',
            'primary_url' => home_url( '/contact-us/' ),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'hello@rectify.com.au',
            'email_url' => 'mailto:hello@rectify.com.au',
        )),
    );
}

/**
 * Figma-matched builder content for Commercial Realignment & Levelling.
 * Node 902:15639 in "Rectify - New Home".
 *
 * @return array
 */
function rectify_pb_get_commercial_realignment_levelling_seed_blocks()
{
    return array(
        array('id' => 'seed-crl-banner-v2', 'type' => 'commercial-inner-banner', 'section_key' => 'commercial-realignment-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'COMMERCIAL SOLUTIONS',
            'title' => 'Commercial Structural Realignment & Levelling Melbourne & South Australia',
            'breadcrumb_label' => 'Commercial Solutions',
            'breadcrumb_url' => home_url('/commercial-solutions/'),
            'current_label' => 'Re-alignment and Levelling',
        )),
        array('id' => 'seed-crl-intro-v2', 'type' => 'commercial-inner-intro', 'section_key' => 'commercial-realignment-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Restore Structural Alignment with Engineered Ground Solutions',
            'body_richtext' => "Uneven buildings, misaligned structures, and settled foundations can impact safety, operational efficiency, and the long-term performance of commercial and industrial assets. While the visible movement may appear in floors, columns, walls, or equipment, the underlying cause is often ground movement, soil settlement, or loss of foundation support.\n\nAt Rectify, we provide commercial structural realignment and levelling solutions for buildings, warehouses, industrial facilities, civil infrastructure, and government assets throughout Melbourne, Victoria, South Australia, and projects across Australia. Our engineering-led approach addresses the underlying ground conditions, allowing structures to be carefully re-levelled while minimising disruption to business operations. Modern re-levelling solutions focus on correcting differential settlement while avoiding unnecessary demolition wherever practical.",
            'image' => 'images/commercial-realignment/intro-site.jpg',
            'image_alt' => 'Rectify technicians measuring and re-levelling a commercial slab',
        )),
        array('id' => 'seed-crl-causes-v2', 'type' => 'commercial-realignment-causes', 'section_key' => 'commercial-realignment-causes', 'label' => 'Causes of Commercial Structural Movement', 'fields' => array(
            'heading' => 'What Causes Commercial Structures to Move?',
            'lead' => 'Structural movement rarely occurs because of the building alone. Most problems originate below the foundation where the supporting ground has changed over time.',
            'items' => array(
                array(
                    'image' => 'images/commercial-realignment/foundation-settlement.jpg',
                    'image_alt' => 'Foundation settlement beneath a commercial building',
                    'title' => 'Foundation Settlement',
                    'description' => "Foundation settlement occurs when the soil beneath your home compresses or loses its ability to adequately support the building. As different areas of the foundation settle at different rates, stress is transferred into the walls, often resulting in cracks around doors, windows, corners, or brickwork.\n\nSettlement can develop gradually over many years or occur more quickly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before cosmetic repairs are undertaken.",
                ),
                array(
                    'image' => 'images/commercial-realignment/drainage-problems.jpg',
                    'image_alt' => 'Drainage services beneath a commercial slab',
                    'title' => 'Drainage Problems',
                    'description' => "Poor drainage around a property can significantly affect soil stability. When rain pools around foundations or flows beneath the building, it can cause moisture levels, weaken supporting soils, and contribute to erosion.\n\nOver time, these changing ground conditions may lead to differential settlement, where some areas of the floor sink more than others. Maintaining effective site drainage helps reduce the risk of ongoing foundation movement.",
                ),
                array(
                    'image' => 'images/commercial-realignment/poorly-compacted-fill.jpg',
                    'image_alt' => 'Poorly compacted fill beneath a concrete slab',
                    'title' => 'Poorly Compacted Fill',
                    'description' => "If the soil or fill material beneath a building was not properly compacted during construction, it can continue to compress after the home is built. As the fill settles, gaps may develop beneath slabs and foundations, reducing their support.\n\nThis gradual movement can cause floors to sink, become uneven, or feel unstable underfoot. Proper ground stabilisation can restore support beneath affected areas.",
                ),
                array(
                    'image' => 'images/commercial-realignment/weak-variable-ground.jpg',
                    'image_alt' => 'Weak and variable ground beside a commercial building',
                    'title' => 'Weak or Variable Ground Conditions',
                    'description' => 'Soft clay, uncontrolled fill, loose sands, and mixed ground profiles can all reduce foundation performance and contribute to differential movement.',
                ),
                array(
                    'image' => 'images/commercial-realignment/heavy-operational-loads.jpg',
                    'image_alt' => 'Heavy excavator and industrial loading',
                    'title' => 'Heavy Operational Loads',
                    'description' => 'Industrial machinery, storage systems, cranes, and repetitive loading can place significant stress on the underlying ground, accelerating settlement where soil conditions are already marginal.',
                ),
                array(
                    'image' => 'images/commercial-realignment/adjacent-construction.jpg',
                    'image_alt' => 'Excavation beside an existing commercial structure',
                    'title' => 'Excavation & Adjacent Construction',
                    'description' => 'Nearby excavation or redevelopment may alter surrounding soil conditions, affecting the stability of neighbouring structures.',
                ),
            ),
        )),
        array('id' => 'seed-crl-feature-v2', 'type' => 'commercial-realignment-feature', 'section_key' => 'commercial-realignment-feature', 'label' => 'Stabilise and Restore Feature', 'fields' => array(
            'heading' => 'Stabilise, lift and restore critical assets—fast, safely, and with minimal disruption.',
            'body_richtext' => 'Unseen changes in soil conditions can compromise the performance of your facility. Rectify Group delivers engineered realignment and re-levelling solutions that restore structural integrity, improve safety, and minimise operational downtime.',
            'image' => 'images/commercial-realignment/site-survey.jpg',
            'image_alt' => 'Rectify technicians surveying a commercial slab',
        )),
        array('id' => 'seed-crl-impact-v2', 'type' => 'commercial-realignment-impact', 'section_key' => 'commercial-realignment-impact', 'label' => 'Operational Warning Signs', 'fields' => array(
            'heading' => 'Is foundation movement affecting your operations?',
            'lead' => "Foundation movement doesn't just impact your structure—it disrupts your entire operation.",
            'note_heading' => 'These are not surface-level issues—they are signs of deeper ground instability.',
            'note_body' => 'Early intervention prevents costly repairs and operational downtime.',
            'items' => array(
                array('image' => 'images/commercial-realignment/uneven-floors.jpg', 'image_alt' => 'Uneven commercial floor', 'caption' => 'Uneven floors creating trip hazards'),
                array('image' => 'images/commercial-realignment/jammed-doors.jpg', 'image_alt' => 'Jammed industrial door and loading dock', 'caption' => 'Jammed doors, shutters, and loading docks'),
                array('image' => 'images/commercial-realignment/misaligned-machinery.jpg', 'image_alt' => 'Misaligned industrial racking and machinery', 'caption' => 'Misaligned racking and machinery'),
                array('image' => 'images/commercial-realignment/drainage-pooling.jpg', 'image_alt' => 'Drainage issue and water pooling', 'caption' => 'Drainage issues and water pooling'),
                array('image' => 'images/commercial-realignment/cracked-floor.jpg', 'image_alt' => 'Cracked concrete floor and joint', 'caption' => 'Cracking slabs and joint deterioration'),
            ),
        )),
        array('id' => 'seed-crl-process-v2', 'type' => 'commercial-realignment-process', 'section_key' => 'commercial-realignment-process', 'label' => 'Re-levelling Process', 'fields' => array(
            'heading' => 'How Our Re-Levelling Process Works',
            'approach_heading' => 'A Structured Engineering Approach',
            'lead' => 'Our engineered process delivers precise, measurable results with minimal disruption.',
            'image' => 'images/commercial-realignment/process-site.jpg',
            'image_alt' => 'Rectify drilling equipment at a commercial site',
            'items' => array(
                array('number' => '01', 'title' => 'Investigation & Precision Drilling', 'description' => 'We assess levels, identify movement patterns, and drill small, targeted injection points.'),
                array('number' => '02', 'title' => 'Advanced Resin Injection', 'description' => 'Specialised polyurethane resin is injected at controlled depths to stabilise weak soils.'),
                array('number' => '03', 'title' => 'Ground Improvement', 'description' => 'The resin expands, filling voids and binding loose material to increase bearing capacity.'),
                array('number' => '04', 'title' => 'Controlled Re-levelling', 'description' => 'We carefully lift and realign slabs and structures with millimetre precision, verified through surveys.'),
            ),
        )),
        array('id' => 'seed-crl-industries-v2', 'type' => 'commercial-realignment-industries', 'section_key' => 'commercial-realignment-industries', 'label' => 'Industries We Support', 'fields' => array(
            'heading' => "Supporting Australia's Critical Infrastructure",
            'lead' => 'Rectify provides engineered ground improvement solutions across a diverse range of sectors where structural reliability, operational continuity and long-term asset performance are essential.',
            'map_image' => 'images/commercial-ground-improvement/australia-map.png',
            'map_image_alt' => 'Map of Australia representing Rectify projects nationwide',
            'list_heading' => 'Industries We Support',
            'items' => array(
                array('title' => 'Transport Assets'),
                array('title' => 'Commercial Buildings'),
                array('title' => 'Civil Infrastructure'),
                array('title' => 'Industrial Facilities'),
                array('title' => 'Utilities and Energy'),
                array('title' => 'Mining and Resources'),
                array('title' => 'Marine & Port Infrastructure'),
                array('title' => 'Residential and Strata Assets'),
            ),
        )),
        array('id' => 'seed-crl-why-v2', 'type' => 'commercial-inner-why-cards', 'section_key' => 'commercial-realignment-why', 'label' => 'Why Choose Rectify', 'fields' => array(
            'heading' => 'Why Choose Rectify',
            'items' => array(
                array('image' => 'images/commercial-ground-improvement/icon-worker.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/commercial-ground-improvement/icon-expert.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/commercial-ground-improvement/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/commercial-ground-improvement/icon-services-longterm.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),
        array('id' => 'seed-crl-cta-v2', 'type' => 'commercial-inner-cta', 'section_key' => 'commercial-realignment-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Ready to Restore Alignment and Structural Performance?',
            'copy' => 'Rectify delivers engineered re-alignment and levelling solutions that correct structural movement, restore alignment and improve long-term stability for commercial buildings, industrial facilities and critical infrastructure—all with minimal disruption to operations.',
            'primary_text' => 'Contact Us',
            'primary_url' => home_url('/contact-us/'),
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'email_text' => 'admin@rectify.com.au',
            'email_url' => 'mailto:admin@rectify.com.au',
        )),
    );
}

function rectify_pb_get_contact_seed_blocks()
{
    return array(
        array('id' => 'seed-contact-hero', 'type' => 'contact-hero', 'section_key' => 'contact-hero', 'label' => 'Hero', 'fields' => array(
            'eyebrow' => 'CONTACT US',
            'title' => 'How can we help you?',
            'copy' => "We understand that structural issues can be concerning. That's why we take the time to listen, understand your situation, and provide clear, professional guidance on the most appropriate next steps.",
        )),
        array('id' => 'seed-contact-offices', 'type' => 'contact-offices', 'section_key' => 'contact-offices', 'label' => 'Office Locations', 'fields' => array(
            'heading' => 'Get in touch with one of our offices',
            'items' => array(
                array(
                    'icon' => 'contact-office-vic',
                    'title' => 'Head Office',
                    'copy' => '28 Trade Park Drive, Tullamarine VIC 3043',
                    'link_text' => 'View on Map',
                    'link_url' => 'https://www.google.com/maps/search/?api=1&query=28+Trade+Park+Drive+Tullamarine+VIC+3043',
                ),
                array(
                    'icon' => 'contact-office-tas',
                    'title' => 'Tasmania Office',
                    'copy' => 'Level 3, 85 Macquarie Street, Hobart TAS 7000',
                    'link_text' => 'View on Map',
                    'link_url' => 'https://www.google.com/maps/search/?api=1&query=Level+3+85+Macquarie+Street+Hobart+TAS+7000',
                ),
                array(
                    'icon' => 'contact-office-sa',
                    'title' => 'South Australia Office',
                    'copy' => 'Level 3, 97 Pirie Street, Adelaide SA 5000',
                    'link_text' => 'View on Map',
                    'link_url' => 'https://www.google.com/maps/search/?api=1&query=Level+3+97+Pirie+Street+Adelaide+SA+5000',
                ),
            ),
        )),
        array('id' => 'seed-contact-form', 'type' => 'contact-form', 'section_key' => 'contact-form', 'label' => 'Form + Details', 'fields' => array(
            'form_shortcode' => '[rectify_hubspot_form portal_id="48201196" form_id="f02ab874-fad0-436f-a5ca-56897af5b5cb" region="ap1"]',
            'heading' => 'Take the First Step',
            'copy' => "If you're concerned about structural movement, don't wait for the problem to worsen. Contact Rectify today and speak with a specialist who can help you understand the cause, assess the risks, and recommend the most appropriate solution for your property.",
            'phone_text' => '1800 18 20 20',
            'email_text' => 'hello@rectify.com.au',
        )),
        array('id' => 'seed-contact-cta', 'type' => 'contact-cta', 'section_key' => 'contact-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'copy' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'items' => array(
                array(
                    'icon' => 'adv-trustworthy',
                    'title' => 'Call Us',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'phone' => '1800 18 20 20',
                    'link_text' => '',
                    'link_url' => '',
                ),
                array(
                    'icon' => 'adv-affordable',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'phone' => '',
                    'link_text' => 'Get My Cost Estimate',
                    'link_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'contact-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'phone' => '',
                    'link_text' => 'Explore Resources',
                    'link_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

function rectify_pb_get_assessment_seed_blocks()
{
    return array(
        array('id' => 'seed-assessment-title', 'type' => 'assessment-title', 'section_key' => 'assessment-title', 'label' => 'Title Band', 'fields' => array(
            'kicker' => 'PRICING',
            'title' => 'Get an indicative estimate for your foundation stabilisation project',
            'breadcrumb_label' => 'Project Cost Estimate',
        )),
        array('id' => 'seed-assessment-hero', 'type' => 'assessment-hero', 'section_key' => 'assessment-hero', 'label' => 'Hero Copy', 'fields' => array(
            'heading' => 'Estimate the cost of stabilising your foundation',
            'intro' => 'Use our estimator to calculate an indicative cost range based on your property\'s foundation type, movement severity and project scope. Every Rectify project is engineered to suit the structure and ground conditions, so your final quotation is confirmed after a professional assessment.',
            'checklist' => array(
                array('text' => 'Built using typical Rectify project data'),
                array('text' => 'Helps you understand likely investment before requesting a quotation'),
                array('text' => 'Engineered solutions tailored to your property\'s conditions'),
                array('text' => 'Final pricing confirmed after professional site assessment'),
            ),
        )),
        array('id' => 'seed-assessment-investment', 'type' => 'assessment-card-grid', 'section_key' => 'assessment-investment', 'label' => 'Typical Investment by Solution', 'fields' => array(
            'kicker' => '',
            'heading' => 'Typical Investment by Solution',
            'lead' => 'Explore the typical investment ranges for Rectify\'s most common residential structural stabilisation solutions. These figures are indicative only and will vary depending on the size of the project, site conditions and engineering requirements.',
            'items' => array(
                array(
                    'title' => 'Foundation Stabilisation',
                    'price_prefix' => 'From',
                    'price' => '$600–$1,200',
                    'price_suffix' => 'per linear metre',
                    'list_label' => 'Typical applications',
                    'list_html' => "<ul><li>Strip footings</li><li>Waffle and raft slabs</li><li>Foundation movement</li><li>Structural re-levelling</li></ul>",
                    'footer_note' => '<strong>Best for:</strong> Homes experiencing cracks, sinking foundations or uneven floors.',
                ),
                array(
                    'title' => 'Slab Re-levelling & Void Filling',
                    'price_prefix' => 'From',
                    'price' => '$150–$320',
                    'price_suffix' => 'per m²',
                    'list_label' => 'Typical applications',
                    'list_html' => "<ul><li>Void filling beneath slabs</li><li>Sunken concrete slabs</li><li>Pavements and hardstands</li><li>Localised settlement correction</li></ul>",
                    'footer_note' => '<strong>Best for:</strong> Restoring support beneath settled concrete without replacement.',
                ),
                array(
                    'title' => 'Engineering & Assessment',
                    'price_prefix' => 'From',
                    'price' => '$750–$1,400',
                    'price_suffix' => 'per assessment',
                    'list_label' => 'May include',
                    'list_html' => "<ul><li>Site assessment</li><li>Engineering review</li><li>Structural recommendations</li><li>Scope of works</li></ul>",
                    'footer_note' => '<strong>Best for:</strong> Confirming the most appropriate remediation solution before works commence.',
                ),
            ),
        )),
        array('id' => 'seed-assessment-why', 'type' => 'assessment-image-checklists', 'section_key' => 'assessment-why', 'label' => 'Why Are These Shown As Ranges?', 'fields' => array(
            'heading' => 'Why are these shown as ranges?',
            'intro' => 'Every home is different. Foundation type, soil conditions, structural movement, site access and engineering requirements all influence the final project cost. Our estimator and assessment provide a more accurate indication based on your property\'s specific conditions.',
            'image' => 'images/assessment/why-ranges-worker.jpg',
            'list1_heading' => 'Cost Influence:',
            'list1_items' => "<ul><li>Foundation size and depth</li><li>Severity of settlement</li><li>Ground conditions</li><li>Access around the property</li><li>Required lift and stabilisation</li><li>Engineering and council requirements where applicable</li></ul>",
            'list2_heading' => 'What\'s included:',
            'list2_items' => "<ul><li>Engineered treatment design</li><li>Precision resin injection</li><li>Specialist equipment</li><li>Qualified technicians</li><li>Quality assurance throughout the works</li></ul>",
            'footnote' => 'Additional engineering, permits or structural repairs may be quoted separately where required.',
        )),
        array('id' => 'seed-assessment-examples', 'type' => 'assessment-card-grid', 'section_key' => 'assessment-examples', 'label' => 'Typical Project Examples', 'fields' => array(
            'kicker' => '',
            'heading' => 'Typical project examples',
            'lead' => 'Every home is different, but these examples provide a realistic indication of common Rectify projects.',
            'items' => array(
                array(
                    'title' => 'Minor Foundation Movement',
                    'price_prefix' => 'Indicative investment',
                    'price' => '$7,500–$12,500*',
                    'list_html' => "<ul><li>8 lm Strip Footing</li><li>Suitable for homes with minor cracking and localised settlement.</li></ul>",
                ),
                array(
                    'title' => 'Slab Settlement',
                    'price_prefix' => 'Indicative investment',
                    'price' => '$7,500–$16,000*',
                    'list_html' => "<ul><li>50 m² Concrete Slab</li><li>Ideal where voids beneath the slab have caused uneven settlement.</li></ul>",
                ),
                array(
                    'title' => 'Moderate Foundation Movement',
                    'price_prefix' => 'Indicative investment',
                    'price' => '$13,000–$27,000*',
                    'list_html' => "<ul><li>18 lm Waffle Slab Edge Beams</li><li>For homes requiring foundation stabilisation with moderate structural movement.</li></ul>",
                ),
            ),
            'footnote' => '*These examples are indicative only. Actual project costs vary depending on site conditions, access, engineering requirements and the extent of structural movement. Final pricing is confirmed following a professional assessment.',
        )),
        array('id' => 'seed-assessment-faqs', 'type' => 'accordion', 'section_key' => 'assessment-faqs', 'label' => 'FAQs', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'lead' => '',
            'image' => 0,
            'items' => array(
                array('question' => 'Is this a fixed quotation?', 'answer' => 'The estimator provides an indicative project range. Your final quotation is prepared following a professional assessment.'),
                array('question' => 'Why can similar homes cost different amounts?', 'answer' => 'Every property has different soil conditions, foundation designs, access constraints and movement characteristics.'),
                array('question' => 'What happens after I submit my details?', 'answer' => 'One of our specialists reviews your information and contacts you to arrange the next steps.'),
                array('question' => 'Can most homes be stabilised without rebuilding?', 'answer' => 'In many cases, yes. Rectify\'s engineered chemical underpinning solutions stabilise foundations with minimal disruption compared with traditional underpinning methods.'),
                array('question' => 'How accurate is the estimator?', 'answer' => 'The estimator uses typical Rectify project data to provide an informed guide. Final pricing is confirmed following assessment.'),
                array('question' => 'How long do most projects take?', 'answer' => 'Most residential stabilisation projects are completed within a few days, depending on the size and complexity of the works.'),
            ),
        )),
        array('id' => 'seed-assessment-quote', 'type' => 'contact-form', 'section_key' => 'assessment-quote', 'label' => 'Get a Free Quote', 'fields' => array(
            'form_shortcode' => '[rectify_hubspot_form portal_id="48201196" form_id="a1c00f4d-e08e-4d15-8916-d0cc2528f9c0" region="ap1"]',
            'heading' => 'Ready to understand your property\'s condition?',
            'copy' => "Structural movement can be complex. Our team is here to help you understand the cause, the risks, and the most appropriate solution for your property or asset.\n\nWe'll review:\n- Photos of visible cracking\n- Foundation or slab concerns\n- Previous engineering reports (if available)\n- Property access and project requirements",
            'phone_text' => '1800 18 20 20',
            'email_text' => '',
        )),
        array('id' => 'seed-assessment-cta', 'type' => 'assessment-cta', 'section_key' => 'assessment-cta', 'label' => 'Final CTA Banner', 'fields' => array(
            'heading' => 'Concerned About Structural Movement?',
            'copy' => "Whether you're experiencing cracking in your home, managing ageing infrastructure or planning remediation works for a commercial asset, our specialists are ready to help.\n\nLet's identify the cause, develop the right solution and restore confidence in your structure.",
            'button_text' => 'REQUEST A FREE ASSESSMENT',
            'button_url' => home_url( '/assessment/' ),
        )),
    );
}

function rectify_pb_get_quotation_seed_blocks()
{
    $contact_blocks = rectify_pb_get_contact_seed_blocks();
    $contact_cta = end($contact_blocks);
    $contact_cta['id'] = 'seed-quotation-cta';
    $contact_cta['section_key'] = 'quotation-cta';

    return array(
        array('id' => 'seed-quotation-form', 'type' => 'quotation-form', 'section_key' => 'quotation-form', 'label' => 'Request a Quote + Form', 'fields' => array(
            'eyebrow' => 'REQUEST A QUOTE',
            'title' => 'Book Your Free Structural Assessment Quote',
            'form_heading' => 'Get a Free Quote',
            'form_shortcode' => '[gravityforms id="1" title="false" description="false" ajax="true"]',
        )),
        array('id' => 'seed-quotation-next', 'type' => 'quotation-next', 'section_key' => 'quotation-next', 'label' => 'What Happens Next', 'fields' => array(
            'heading' => 'What Happens Next?',
            'intro' => 'Once we receive your enquiry, our team will:',
            'items' => array(
                array('text' => 'Review the information you\'ve provided.'),
                array('text' => 'Contact you to discuss your property\'s condition and requirements.'),
                array('text' => 'Arrange a suitable time for an inspection, if required.'),
                array('text' => 'Prepare a detailed quotation and recommended solution tailored to your property.'),
            ),
            'closing' => 'Our goal is to provide clear advice and engineered solutions that address the underlying cause of structural movement - not just the visible symptoms.',
            'image' => 'images/quotation/what-happens-next.jpg',
        )),
        $contact_cta,
    );
}

function rectify_pb_get_warranty_seed_blocks()
{
    $contact_blocks = rectify_pb_get_contact_seed_blocks();
    $contact_cta = end($contact_blocks);
    $contact_cta['id'] = 'seed-warranty-cta';
    $contact_cta['section_key'] = 'warranty-cta';

    return array(
        array('id' => 'seed-warranty-hero', 'type' => 'warranty-hero', 'section_key' => 'warranty-hero', 'label' => 'Page Header + Hero', 'fields' => array(
            'title' => 'Rectify Group Warranty',
            'statement' => 'Rectify Group stands behind the quality of its workmanship, materials and ground remediation solutions.',
            'image' => 'images/warranty/warranty-hero.jpg',
        )),
        array('id' => 'seed-warranty-periods', 'type' => 'warranty-periods', 'section_key' => 'warranty-periods', 'label' => 'Warranty Periods', 'fields' => array(
            'heading' => 'Our warranty period is determined by the type of property being treated:',
            'items' => array(
                array(
                    'icon' => 'adv-quality',
                    'title' => 'Residential Properties',
                    'period' => '10 Years',
                    'warranty_type' => 'Performance Warranty',
                    'covers' => 'Workmanship, materials and treated-area performance, subject to warranty terms and conditions.',
                ),
                array(
                    'icon' => 'adv-quality',
                    'title' => 'Commercial & Industrial Properties',
                    'period' => '2 Years',
                    'warranty_type' => 'Defects Liability & Workmanship Warranty',
                    'covers' => 'Workmanship and defects liability for the treated works, subject to warranty terms and conditions.',
                ),
            ),
        )),
        array('id' => 'seed-warranty-terms', 'type' => 'warranty-terms', 'section_key' => 'warranty-terms', 'label' => 'Warranty Terms', 'fields' => array(
            'copy' => "Our warranties apply to the Rectify Group treatment area and are subject to the terms and conditions of the relevant warranty document, including the ongoing maintenance of the property in accordance with CSIRO Foundation Maintenance and Footing Performance guidelines.\n\nThe warranty does not extend to movement or damage caused by factors outside Rectify Group's control, including (but not limited to) plumbing or drainage leaks, uncontrolled water ingress, vegetation, neighbouring property influences, excavation, structural alterations, untreated areas, or other external factors.\n\nCopies of the applicable warranty are available upon request and form part of the Contract documentation.",
            'image' => 'images/warranty/warranty-site.jpg',
        )),
        $contact_cta,
    );
}

/* -----------------------------------------------------------------------
 * "About Us" child pages: Our Locations, Meet The Team, Certifications &
 * Compliance, Careers. Each has its own bespoke design, so the seed
 * functions below are not interchangeable with each other, but they share
 * the same "Need Help Choosing" final CTA copy/phone number.
 * ---------------------------------------------------------------------*/

function rectify_pb_get_about_us_cta_fields()
{
    return array(
        'heading' => 'Need Help Choosing the Right Solution?',
        'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
        'phone_text' => '1800 18 20 20',
        'phone_url' => 'tel:1800182020',
    );
}

function rectify_pb_get_about_our_locations_seed_blocks()
{
    return array(
        array('id' => 'seed-loc-hero', 'type' => 'loc-hero', 'section_key' => 'loc-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Our Locations',
            'title' => 'Find Your Nearest Rectify Office',
            'intro' => "Rectify supports homeowners across a growing footprint, with capability currently operating across key locations and continuing to expand.\n\nOur goal is to make specialist structural stabilisation and rectification services more accessible to homeowners who need practical, professional support when movement issues affect their property.",
            'banner_image' => 'images/our-locations/truck-and-van.jpg',
        )),
        array('id' => 'seed-loc-offices', 'type' => 'loc-offices', 'section_key' => 'loc-offices', 'label' => 'Office Grid + Map', 'fields' => array(
            'heading' => 'Where We Operate',
            'lead' => 'As the business continues to grow, our footprint is also expanding into new regions and markets.',
            'items' => array(
                array('icon' => 'loc-office-vic', 'title' => 'Head Office', 'description' => "Victoria remains a core operating base for Rectify and continues to be an important part of our residential service footprint.\n\nWe work with homeowners across metropolitan and regional areas where movement-related issues, reactive soils, weak ground, and other structural concerns require specialist assessment and stabilisation support.", 'address' => '28 Trade Park Drive, Tullamarine VIC 3043', 'phone' => '1800 18 20 20', 'email' => 'admin@rectify.com.au', 'map_url' => 'https://www.google.com/maps/search/?api=1&query=28%20Trade%20Park%20Drive%2C%20Tullamarine%20VIC%203043', 'lat' => '-37.6879', 'lng' => '144.8410'),
                array('icon' => 'loc-office-tas', 'title' => 'Tasmania Office', 'description' => "Rectify supports clients in Tasmania with specialist structural stabilisation and movement-related solutions suited to residential conditions and local ground challenges.\n\nOur aim is to bring the same level of care, technical thinking, and professional delivery to Tasmanian homeowners as we do across our wider footprint.", 'address' => 'Level 3, 85 Macquarie Street, Hobart TAS 7000', 'phone' => '1800 18 20 20', 'email' => 'admin@rectify.com.au', 'map_url' => 'https://www.google.com/maps/search/?api=1&query=Level%203%2C%2085%20Macquarie%20Street%2C%20Hobart%20TAS%207000', 'lat' => '-42.8821', 'lng' => '147.3272'),
                array('icon' => 'loc-office-sa', 'title' => 'South Australia Office', 'description' => "Rectify&rsquo;s presence in South Australia reflects our continued growth and commitment to making specialist stabilisation solutions available more broadly.\n\nWe support homeowners facing movement-related concerns with solutions designed around assessment, clarity, and long-term performance.", 'address' => 'Level 3, 97 Pirie Street, Adelaide SA 5000', 'phone' => '1800 18 20 20', 'email' => 'admin@rectify.com.au', 'map_url' => 'https://www.google.com/maps/search/?api=1&query=Level%203%2C%2097%20Pirie%20Street%2C%20Adelaide%20SA%205000', 'lat' => '-34.9249', 'lng' => '138.6058'),
            ),
        )),
        array('id' => 'seed-loc-footprint', 'type' => 'loc-footprint', 'section_key' => 'loc-footprint', 'label' => 'Growing Footprint', 'fields' => array(
            'heading' => 'A growing footprint',
            'copy' => "As Rectify continues to expand, our focus remains the same: deliver specialist solutions with professionalism, strong communication, and a process homeowners can trust.\n\nGrowth matters because it allows more people to access the right type of support when their property begins to show signs of movement or instability.",
            'image' => 'images/our-locations/growing-footprint.jpg',
        )),
        array('id' => 'seed-loc-cta', 'type' => 'loc-cta', 'section_key' => 'loc-cta', 'label' => 'Final CTA', 'fields' => array_merge(rectify_pb_get_about_us_cta_fields(), array(
            'heading' => 'Unsure Whether Rectify Services Your Location?',
            'subtext' => 'Contact our team. We can talk through your issue, confirm coverage, and help guide you toward the most suitable next step.',
            'items' => array(
                array('icon' => 'loc-cta-call', 'title' => 'Call Us', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone' => '1800 18 20 20', 'link_text' => '', 'link_url' => 'tel:1800182020'),
                array('icon' => 'loc-cta-estimate', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'phone' => '', 'link_text' => 'Get My Cost Estimate', 'link_url' => '/assessment/'),
                array('icon' => 'loc-cta-resources', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'phone' => '', 'link_text' => 'Explore Resources', 'link_url' => '/resources/'),
            ),
        ))),
    );
}

function rectify_pb_get_about_meet_the_team_seed_blocks()
{
    $linkedin_url = 'https://www.linkedin.com/company/rectify-group-au';
    $email_url = 'admin@rectify.com.au';

    return array(
        array('id' => 'seed-mtt-hero', 'type' => 'mtt-hero', 'section_key' => 'mtt-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Our Team',
            'title' => 'Our leadership team',
            'heading' => '',
            'body' => "Behind every Rectify project is a team focused on clear communication, professional delivery, and long-term structural outcomes.\n\nWe believe homeowners should know who they are dealing with and feel confident that the people behind the process are experienced, accountable, and committed to doing the job properly.",
        )),
        array('id' => 'seed-mtt-philosophy', 'type' => 'mtt-philosophy', 'section_key' => 'mtt-philosophy', 'label' => 'Team Philosophy', 'fields' => array(
            'heading' => 'Our Team Philosophy',
            'lead' => 'Rectify is built around more than technical capability. It is built around people.',
            'body' => 'From leadership and coordination through to site delivery, every part of the business plays a role in helping homeowners feel informed, supported, and confident throughout the journey. Our team combines engineering knowledge, ground stabilisation experience, sales support, scheduling, field delivery, and operational discipline to make sure the process is as seamless as possible.',
        )),
        array('id' => 'seed-mtt-team', 'type' => 'mtt-team', 'section_key' => 'mtt-team', 'label' => 'Team Grid', 'fields' => array(
            'items' => array(
                array(
                    'image' => 'images/team/furkan-resuloglu.png',
                    'name' => 'Furkan Resuloglu',
                    'role' => 'Director',
                    'description' => "Frank founded Rectify with a clear goal: to build an engineering-led company that solves difficult structural and ground problems with integrity, innovation, and long-term thinking.\n\nWith a background in structural and civil engineering, hands-on industry experience, and a builder’s licence, Frank brings a rare combination of technical depth, commercial understanding, and entrepreneurial vision. He leads Rectify with a strong focus on growth, culture, innovation, and strategic direction.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
                array(
                    'image' => 'images/team/robert-philip-irwin.png',
                    'name' => 'Robert Philip Irwin',
                    'role' => 'Business Development Manager',
                    'description' => "Phil brings extensive industry experience and a deep passion for ground engineering and asset remediation. His knowledge of market development, operational growth, and specialist service delivery has helped strengthen Rectify’s capability and national ambition.\n\nPhil’s role supports both business development and technical growth, helping ensure Rectify continues to evolve in the right direction.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
                array(
                    'image' => 'images/team/bassam-hassan.png',
                    'name' => 'Bassam Hassan',
                    'role' => 'Regional Manager (SA/VIC/TAS)',
                    'description' => "Sam leads Rectify’s sales function with energy, clarity, and a strong solutions-first mindset. He plays an important role in helping align the customer journey from initial contact through to inspection, quoting, and conversion.\n\nSam is focused on making sure clients feel heard, supported, and guided throughout the early stages of the process.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
                array(
                    'image' => 'images/team/toni-pieterse.png',
                    'name' => 'Toni Pieterse',
                    'role' => 'Office Manager',
                    'description' => "Toni plays a central role in the coordination and delivery engine of Rectify. She oversees scheduling and operational flow, helping ensure the business runs smoothly from first enquiry through to project execution.\n\nHer experience and discipline are a key part of the seamless service Rectify aims to provide.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
                array(
                    'image' => 'images/team/arman-pieterse.png',
                    'name' => 'Arman Pieterse',
                    'role' => 'Operations Manager',
                    'description' => "Arman leads field operations and plays a critical role in maintaining the quality, safety, and consistency of delivery across crews and states.\n\nWith extensive hands-on experience across residential and complex projects, he helps ensure that Rectify’s standards are upheld on every site.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
                array(
                    'image' => 'images/team/george.png',
                    'name' => 'George',
                    'role' => 'Infrastructure Manager',
                    'description' => "George leads delivery across infrastructure and specialist remediation works, including concrete repair, leak sealing, cellular concrete, and related systems.\n\nHis practical experience, problem-solving ability, and site capability strengthen Rectify’s broader delivery capacity.",
                    'email_url' => $email_url,
                    'linkedin_url' => $linkedin_url,
                ),
            ),
        )),
        array('id' => 'seed-mtt-why', 'type' => 'mtt-why', 'section_key' => 'mtt-why', 'label' => 'Why Our Team Matters', 'fields' => array(
            'heading' => 'Why our team matters',
            'body' => "For homeowners, trust is not built only by what a company says. It is built by the people behind the process.\n\nThat includes the person who answers the first call, the people who assess the property, the team that explains the recommendations, the coordinators who manage the job, and the crew that completes the works on site.",
            'outro' => 'At Rectify, we want every interaction to reflect the same standards: professionalism, clear communication, respect for the property, practical guidance, and commitment to doing the job properly.',
            'image' => 'images/team/why-team-matters.jpg',
        )),
        array('id' => 'seed-mtt-cta', 'type' => 'mtt-cta', 'section_key' => 'mtt-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Want To Speak With The Team Behind Rectify?',
            'subtext' => 'Get in touch and we will guide you through the next step.',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'items' => array(
                array(
                    'icon' => 'call-expert.svg',
                    'title' => 'Call Us',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'phone' => '1800 18 20 20',
                    'link_text' => '',
                    'link_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'estimate-project.svg',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'phone' => '',
                    'link_text' => 'Get My Cost Estimate',
                    'link_url' => '/cost-calculator/',
                ),
                array(
                    'icon' => 'explore-resources.svg',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'phone' => '',
                    'link_text' => 'Explore Resources',
                    'link_url' => '/resources/',
                ),
            ),
        )),
    );
}

function rectify_pb_get_about_certifications_compliance_seed_blocks()
{
    return array(
        array('id' => 'seed-cert-hero', 'type' => 'cert-hero', 'section_key' => 'cert-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'About Us',
            'title' => 'Certifications & Compliance',
            'heading' => 'When homeowners choose a structural stabilisation specialist, trust matters.',
            'body' => 'Part of that trust comes from knowing the business you are dealing with is professional, properly structured, and serious about standards. At Rectify, we place strong importance on registration, compliance, safety, documentation, and the systems that support reliable delivery.',
        )),
        array('id' => 'seed-cert-banner', 'type' => 'cert-banner', 'section_key' => 'cert-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/certifications-compliance/quality-assurance.png',
        )),
        array('id' => 'seed-cert-why-matters', 'type' => 'cert-why-matters', 'section_key' => 'cert-why-matters', 'label' => 'Why This Matters', 'fields' => array(
            'heading' => 'Why this matters',
            'lead' => 'Structural and ground-related issues are too important to be approached casually.',
            'body' => "Homeowners should feel confident that the company assessing and carrying out works on their property operates with professionalism, accountability, and respect for the responsibilities that come with that work.\n\nThat means having the right foundations in place as a business — not just practical site experience, but proper registration, disciplined systems, and a clear commitment to doing things properly.",
            'image' => 'images/certifications-compliance/why-matters.png',
        )),
        array('id' => 'seed-cert-builder-registration', 'type' => 'cert-builder-registration', 'section_key' => 'cert-builder-registration', 'label' => 'Builder Registration', 'fields' => array(
            'heading' => 'Builder Registration',
            'intro' => 'Rectify Group Pty Ltd holds Victorian Building Authority registration as:',
            'registrations' => array(
                array('text' => 'Domestic Builder (Unlimited)'),
                array('text' => 'Commercial Builder (Unlimited)'),
            ),
            'logos' => array(
                array('image' => 'images/certifications-compliance/logos/vba.png', 'label' => 'Victorian Building Authority'),
                array('image' => 'images/certifications-compliance/logos/nsw-government.png', 'label' => 'NSW Government'),
                array('image' => 'images/certifications-compliance/logos/sa-government.png', 'label' => 'Government of South Australia'),
                array('image' => 'images/certifications-compliance/logos/tas-government.png', 'label' => 'Tasmanian Government'),
            ),
            'body' => "These registrations reflect the formal builder authority behind the business and reinforce that Rectify operates as a structured, professional company rather than a trade-only operator. The Victorian certificate also shows a current expiry date of <strong class=\"rx-cert-accent\">10 January 2027.</strong>\n\nIn addition to Victoria, Rectify also holds builder registrations in <strong class=\"rx-cert-accent\">New South Wales, South Australia, and Tasmania,</strong> supporting our ability to operate across multiple jurisdictions and deliver within the appropriate regulatory framework.",
        )),
        array('id' => 'seed-cert-engineering', 'type' => 'cert-engineering', 'section_key' => 'cert-engineering', 'label' => 'Engineering Oversight', 'fields' => array(
            'heading' => 'Engineering Oversight',
            'body' => "Rectify is founded and led by Frank Resuloglu, a structural and civil engineer, and that engineering foundation is an important part of how we approach our work.\n\nFrank is a registered engineer and holds professional indemnity insurance, reinforcing the technical oversight and engineering-led thinking behind Rectify's assessment and broader problem-solving approach.",
            'link_text' => 'Insurance Material',
            'link_url' => '#',
            'insurance_note' => 'The attached insurance material for Blueprint Consulting Engineers / Furkan Ethem Resuloglu shows civil liability professional indemnity cover for <strong>Civil Engineering, Engineering Drafting, and Structural Engineering</strong>, with a $5,000,000 any one claim limit and <strong>$10,000,000 aggregate</strong>.',
            'image' => 'images/certifications-compliance/hero-banner.png',
        )),
        array('id' => 'seed-cert-registration-safety', 'type' => 'cert-registration-safety', 'section_key' => 'cert-registration-safety', 'label' => 'ISO Accreditation & Safety', 'fields' => array(
            'left_heading' => 'ISO Accreditation',
            'left_lead' => 'Rectify is also progressing toward ISO accreditation as part of our continued investment in stronger systems, consistency, and accountability.',
            'left_body' => "For homeowners, ISO does not need to be complicated. What it signals is that the business is committed to improving the way it manages quality, process, documentation, and operational discipline behind the scenes.\n\nIt reflects a serious approach to professionalism and continuous improvement, not just a focus on getting the job done.",
            'right_heading' => 'Safety and Quality',
            'right_lead' => 'We are committed to safe work and disciplined delivery.',
            'right_intro' => 'For homeowners, that means dealing with a team that values:',
            'right_items' => array(
                array('text' => 'safe site conduct'),
                array('text' => 'respect for the home and surrounding environment'),
                array('text' => 'clear communication'),
                array('text' => 'controlled execution'),
                array('text' => 'quality-focused workmanship'),
            ),
            'right_body' => 'Our goal is to ensure that professionalism is visible not just in what we say, but in how we operate every day.',
        )),
        array('id' => 'seed-cert-confidence', 'type' => 'cert-confidence', 'section_key' => 'cert-confidence', 'label' => 'Confidence Through Professionalism', 'fields' => array(
            'heading' => 'Confidence Through Professionalism',
            'lead' => 'For homeowners, compliance is not about jargon. <strong class="rx-cert-accent">It is about confidence.</strong>',
            'body' => 'It is about knowing that the company you are dealing with:',
            'items' => array(
                array('text' => 'is properly registered'),
                array('text' => 'takes its responsibilities seriously'),
                array('text' => 'values engineering-led thinking'),
                array('text' => 'has structured ways of working'),
                array('text' => 'is committed to safety, quality, and accountability'),
                array('text' => 'is built to deliver professionally, not casually'),
            ),
            'closing' => 'That confidence matters when the issue affects your home, your budget, and your long-term peace of mind.',
            'image' => 'images/certifications-compliance/rig-in-driveway.jpg',
        )),
        array('id' => 'seed-cert-systems', 'type' => 'cert-systems', 'section_key' => 'cert-systems', 'label' => 'Systems and Accountability', 'fields' => array(
            'heading' => 'Systems and Accountability',
            'lead' => 'Rectify continues to invest in the systems and processes that support consistency and accountability as the business grows.',
            'body' => 'That includes stronger documentation, clearer operational controls, better communication systems, and more structured ways of delivering work across multiple states and project types. While some of these systems are especially important in larger commercial and infrastructure environments, they also strengthen the way the residential business operates and improve the client experience for homeowners.',
            'image' => 'images/certifications-compliance/systems-warehouse.jpg',
        )),
        array('id' => 'seed-cert-cta', 'type' => 'cert-cta', 'section_key' => 'cert-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_about_us_cta_fields()),
    );
}

function rectify_pb_get_about_careers_seed_blocks()
{
    return array(
        array('id' => 'seed-careers-hero', 'type' => 'careers-hero', 'section_key' => 'careers-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'Careers',
            'title' => 'Why Work at Rectify',
            'body' => "At Rectify, we are building more than a company. We are building a team of people who care about standards, growth, professionalism, and solving real-world structural problems properly.\n\nIf you want meaningful work, a strong team environment, and the chance to contribute to a business with genuine direction and ambition, we would love to hear from you.",
        )),
        array('id' => 'seed-careers-banner', 'type' => 'careers-banner', 'section_key' => 'careers-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/careers/hero-banner.jpg',
        )),
        array('id' => 'seed-careers-why-work', 'type' => 'careers-why-work', 'section_key' => 'careers-why-work', 'label' => 'Why Work At Rectify', 'fields' => array(
            'heading' => 'Why work at Rectify',
            'subheading' => 'Rectify is a specialist business operating in a field where the work matters.',
            'body' => "We help protect homes, solve difficult structural problems, and restore confidence for clients dealing with movement and instability. That means our work is practical, visible, and important. It also means the standard we hold ourselves to matters every day.",
            'items' => array(
                array('text' => 'Professionalism'),
                array('text' => 'Teamwork'),
                array('text' => 'Technical thinking'),
                array('text' => 'Accountability'),
                array('text' => 'Growth'),
                array('text' => 'Respect for clients and property'),
            ),
        )),
        array('id' => 'seed-careers-culture', 'type' => 'careers-culture', 'section_key' => 'careers-culture', 'label' => 'Our Culture', 'fields' => array(
            'heading' => 'Our culture',
            'subheading' => 'At Rectify, culture is not an afterthought. It is one of the foundations of the business.',
            'body' => "For us, that means building a workplace where people are respected, challenged, supported, held to high standards, and part of something meaningful.\n\nWe believe teamwork should come before personal agendas, contribution should matter more than politics, and growth should be shared across the business.",
        )),
        array('id' => 'seed-careers-standards', 'type' => 'careers-standards', 'section_key' => 'careers-standards', 'label' => 'Registration/Safety', 'fields' => array(
            'left_heading' => 'Registration and professional credentials',
            'left_subheading' => "Rectify's public-facing work is supported by a business built around professional capability and structured delivery.",
            'left_body' => 'As a business operating across residential and broader structural environments, we place importance on maintaining the professional and operational standards required to support trust in our work.',
            'right_heading' => 'Safety and quality',
            'right_subheading' => 'We are committed to safe work and disciplined delivery.',
            'right_body' => "For homeowners, that means dealing with a team that values safe site conduct, respect for the home and surrounding environment, clear communication, controlled execution, and quality-focused workmanship.\n\nOur goal is to ensure that professionalism is visible not just in what we say, but in how we operate.",
        )),
        array('id' => 'seed-careers-standards-matter', 'type' => 'careers-standards-matter', 'section_key' => 'careers-standards-matter', 'label' => 'Standards Matter Here', 'fields' => array(
            'heading' => 'Standards matter here',
            'subheading' => 'Rectify is not a casual operator, and we are not trying to build a casual culture.',
            'body' => "We want a workplace identity that reflects engineering-led thinking, professional standards, safe work practices, structured delivery, and pride in impact.\n\nThat does not mean losing warmth. It means creating an environment where people care about each other, care about the work, and care about the standard of what goes out under the Rectify name.",
        )),
        array('id' => 'seed-careers-fit', 'type' => 'careers-fit', 'section_key' => 'careers-fit', 'label' => 'Who We Are Looking For / Growth', 'fields' => array(
            'left_heading' => 'Who we are looking for',
            'left_body' => 'Whether you work in operations, delivery, coordination, support, or leadership, the same principle applies: we want people who take pride in doing things properly.',
            'left_items' => array(
                array('text' => 'Communicate clearly'),
                array('text' => 'Act professionally'),
                array('text' => 'Respect client property'),
                array('text' => 'Take ownership of outcomes'),
                array('text' => 'Care about quality'),
                array('text' => 'Want to keep learning and improving'),
                array('text' => 'Work well as part of a team'),
            ),
            'right_heading' => 'Growth and opportunity',
            'right_subheading' => 'One of the things Rectify is most proud of is helping people grow.',
            'right_body' => 'As the business expands, so do the opportunities within it. We want team members to build confidence, capability, and responsibility over time. We also want them to feel they are part of a business with real momentum and long-term direction.',
            'right_items' => array(
                array('text' => 'Meaningful work'),
                array('text' => 'Strong team support'),
                array('text' => 'Exposure to specialist problem-solving'),
                array('text' => 'Opportunities to grow with the business'),
                array('text' => 'Pride in delivering outcomes that matter'),
            ),
        )),
        array('id' => 'seed-careers-why-join', 'type' => 'careers-why-join', 'section_key' => 'careers-why-join', 'label' => 'Why Join Now', 'fields' => array(
            'heading' => 'Why Join Now',
            'subheading' => 'Rectify is a growing business with national ambition, but we are still close enough to our roots that every strong person who joins can make a real impact.',
            'body' => 'This is a chance to join a business that is growing, improving, investing in people, serious about standards, and building something meaningful.',
        )),
        array('id' => 'seed-careers-jobs', 'type' => 'careers-jobs', 'section_key' => 'careers-jobs', 'label' => 'Job Opportunities', 'fields' => array(
            'heading' => 'Opportunities Across Australia',
            'subtitle' => 'We regularly recruit across a range of disciplines, including:',
            'note' => 'This placeholder list is only shown on the front end while no Job Opportunities have been published via the Job Opportunities post type.',
            'items' => array(
                array('category' => 'business-development', 'title' => 'Area Managers', 'description' => 'Build trusted client relationships and help property owners find the right structural solutions for their unique challenges.', 'url' => '#'),
                array('category' => 'business-development', 'title' => 'Business Managers', 'description' => 'Drive growth by creating new opportunities, expanding market presence and strengthening strategic partnerships.', 'url' => '#'),
                array('category' => 'business-development', 'title' => 'Account Managers', 'description' => 'Deliver exceptional client experiences while managing long-term relationships and ongoing project opportunities.', 'url' => '#'),
                array('category' => 'operations', 'title' => 'Project Coordinators', 'description' => 'Keep projects running smoothly through effective planning, communication and stakeholder coordination.', 'url' => '#'),
                array('category' => 'operations', 'title' => 'Project Managers', 'description' => 'Oversee complex remediation projects from planning to completion, delivering successful outcomes for clients and the business.', 'url' => '#'),
                array('category' => 'technical-engineering', 'title' => 'Civil Engineers', 'description' => 'Apply engineering expertise to solve ground movement, foundation and structural performance challenges.', 'url' => '#'),
                array('category' => 'technical-engineering', 'title' => 'Geotechnical Specialists', 'description' => 'Investigate subsurface conditions and develop ground engineering solutions that improve stability and reduce risk.', 'url' => '#'),
                array('category' => 'field-operations', 'title' => 'Technicians', 'description' => 'Support project delivery through technical expertise, equipment operation and field-based problem solving.', 'url' => '#'),
                array('category' => 'field-operations', 'title' => 'Remediation Operators', 'description' => 'Perform specialised structural remediation activities that help restore and protect valuable assets.', 'url' => '#'),
            ),
        )),
        array('id' => 'seed-careers-cta', 'type' => 'careers-cta', 'section_key' => 'careers-cta', 'label' => 'Final CTA', 'fields' => rectify_pb_get_about_us_cta_fields()),
    );
}

/**
 * Seed blocks for the "Our Story" page (About Us child), matching the
 * Figma "Our Story" design (node 864:13297).
 *
 * @return array
 */
function rectify_pb_get_about_our_story_legacy_seed_blocks()
{
    return array(
        array('id' => 'seed-story-hero', 'type' => 'story-hero', 'section_key' => 'story-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'ABOUT US',
            'title' => 'Our Story',
            'heading' => 'Building Structural Confidence Through Engineering',
            'body' => "Every structure has a story—and so do we. Rectify was founded with a simple belief: structural problems deserve engineered solutions, not one-size-fits-all repairs. Today, we help homeowners, businesses and infrastructure owners across Australia protect what matters most through innovative ground engineering, structural stabilisation and asset preservation.",
        )),

        array('id' => 'seed-story-began', 'type' => 'story-began', 'section_key' => 'story-began', 'label' => 'Where It All Began', 'fields' => array(
            'heading' => 'Where it all began',
            'subheading' => 'It Started With a Different Way of Thinking',
            'body' => "Rectify was established after recognising a recurring problem throughout the remediation industry. Property owners were too often being offered costly, disruptive solutions without first understanding the true cause of structural movement.\n\nRather than accepting traditional excavation and underpinning as the default approach, our founders brought together expertise in structural remediation, geotechnical engineering and ground improvement to develop a more precise, less invasive alternative.\n\nBy combining advanced chemical underpinning and resin injection technologies with engineering-led assessments, Rectify created a smarter way to stabilise structures—treating the source of the problem beneath the ground instead of simply repairing the visible symptoms above it.",
            'image' => 'images/our-story/began-bg.jpg',
        )),

        array('id' => 'seed-story-philosophy', 'type' => 'story-philosophy', 'section_key' => 'story-philosophy', 'label' => 'Philosophy', 'fields' => array(
            'intro' => 'From the very beginning, our philosophy has remained unchanged:',
            'statement' => 'Diagnose accurately. Engineer the right solution. Deliver lasting results.',
        )),

        array('id' => 'seed-story-growing', 'type' => 'story-growing', 'section_key' => 'story-growing', 'label' => 'Growing Beyond', 'fields' => array(
            'heading' => 'Growing Beyond Residential Foundations',
            'subheading' => 'What began by helping Australian homeowners soon expanded into something much bigger.',
            'copy' => 'The same engineering principles used to stabilise residential foundations proved equally effective across commercial buildings, industrial facilities and critical infrastructure.',
            'list_heading' => 'Today, Rectify delivers structural stabilisation and ground engineering solutions across a diverse range of sectors, including:',
            'items' => array(
                array('text' => 'Residential homes and strata properties'),
                array('text' => 'Commercial and industrial facilities'),
                array('text' => 'Roads, bridges and transport infrastructure'),
                array('text' => 'Utilities and energy assets'),
                array('text' => 'Marine and coastal infrastructure'),
                array('text' => 'Mining and resource operations'),
                array('text' => 'Government and public assets'),
            ),
            'outro' => 'Whether restoring a family home or improving the performance of major infrastructure, every project begins the same way—with understanding the ground beneath the structure and engineering the most effective solution.',
            'image' => 'images/our-story/sectors.png',
        )),

        array('id' => 'seed-story-purpose', 'type' => 'story-purpose', 'section_key' => 'story-purpose', 'label' => 'Our Purpose', 'fields' => array(
            'heading' => 'Our Purpose',
            'subheading' => "We Don't Just Repair Structures.\nWe Protect Their Future.",
            'body' => "At Rectify, our purpose extends beyond fixing today's structural issues.\n\nWe exist to help property owners and asset managers extend the life of their assets, reduce long-term risk and avoid unnecessary demolition or reconstruction wherever possible.\n\nEvery recommendation we make is guided by engineering principles—not sales targets. If remediation isn't required, we'll say so. If a simpler solution is appropriate, we'll recommend it.\n\nBecause long-term trust is built by doing what's right, not what's most profitable.",
            'image' => 'images/our-story/purpose.jpg',
        )),

        array('id' => 'seed-story-drives', 'type' => 'story-drives', 'section_key' => 'story-drives', 'label' => 'What Drives Every Project', 'fields' => array(
            'heading' => 'What Drives Every Project',
            'items' => array(
                array('image' => 'images/our-story/icon-engineering-led.svg', 'title' => 'Engineering-Led Solutions', 'description' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.'),
                array('image' => 'images/our-story/icon-non-invasive.svg', 'title' => 'Non-Invasive Technology', 'description' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.'),
                array('image' => 'images/our-story/icon-expertise.svg', 'title' => 'Proven Structural Expertise', 'description' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.'),
                array('image' => 'images/our-story/icon-drives-longterm.png', 'title' => 'Long-Term Confidence', 'description' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value."),
            ),
        )),

        array('id' => 'seed-story-ahead', 'type' => 'story-ahead', 'section_key' => 'story-ahead', 'label' => 'Looking Ahead', 'fields' => array(
            'kicker' => 'LOOKING AHEAD',
            'heading' => 'Engineering the Future of Structural Performance',
            'copy' => 'Today, Rectify operates across multiple Australian states with a growing team of engineers, geologists, project managers and remediation specialists united by a common purpose—to deliver engineered structural certainty.',
            'image' => 'images/our-story/ahead-bg.jpg',
        )),

        array('id' => 'seed-story-vision', 'type' => 'story-vision', 'section_key' => 'story-vision', 'label' => 'Vision', 'fields' => array(
            'intro' => 'As we continue to grow, our vision remains clear:',
            'statement' => "To become Australia's most trusted Structural Stabilisation and Asset Performance specialist while expanding our expertise across commercial, industrial and critical infrastructure projects.",
            'copy' => "By continually investing in people, technology and engineering innovation, we're building more than stronger foundations—we're helping create more resilient communities, longer-lasting infrastructure and greater confidence in the built environment.",
            'image' => 'images/our-story/vision.jpg',
        )),

        array('id' => 'seed-story-principles', 'type' => 'story-principles', 'section_key' => 'story-principles', 'label' => 'Principles', 'fields' => array(
            'kicker' => 'THE RECTIFY DIFFERENCE',
            'heading' => 'The Principles That Define Everything We Do',
            'items' => array(
                array('image' => 'images/our-story/icon-principle-engineering.svg', 'title' => 'Engineering First', 'description' => 'Every solution begins with understanding the cause—not just treating the symptoms.'),
                array('image' => 'images/our-story/icon-principle-innovation.svg', 'title' => 'Non-Invasive Innovation', 'description' => 'Advanced resin technologies deliver effective structural stabilisation with minimal disruption.'),
                array('image' => 'images/our-story/icon-principle-honest.svg', 'title' => 'Honest Recommendations', 'description' => "We recommend only the work that's genuinely needed, nothing more."),
                array('image' => 'images/our-story/icon-principle-longterm.svg', 'title' => 'Built for Long-Term Performance', 'description' => 'Our solutions are designed to extend asset life and reduce future structural risk.'),
                array('image' => 'images/our-story/icon-principle-expertise.svg', 'title' => 'Proven Expertise', 'description' => 'Our multidisciplinary team combines practical experience with engineering precision.'),
                array('image' => 'images/our-story/icon-principle-guarantee.svg', 'title' => 'Confidence Guaranteed', 'description' => 'Every completed project is backed by our commitment to quality, including a 10-Year Workmanship Warranty.'),
            ),
        )),

        array('id' => 'seed-story-cta', 'type' => 'mtt-cta', 'section_key' => 'story-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * Seed blocks for the current "Our Story" Figma design (node 1072:20261).
 *
 * @return array
 */
function rectify_pb_get_about_our_story_seed_blocks()
{
    return array(
        array('id' => 'seed-story-hero', 'type' => 'story-hero', 'section_key' => 'story-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'ABOUT US',
            'title' => 'Our Story',
            'heading' => 'Rectify was founded on a simple belief:',
            'subheading' => 'Homeowners deserve better when something goes wrong with their property.',
            'body' => 'They deserve better education. Better communication. Better standards. Better problem-solving. And they deserve a team that looks beyond the visible symptom to understand what is really happening beneath the surface.',
        )),

        array('id' => 'seed-story-began', 'type' => 'story-began', 'section_key' => 'story-began', 'label' => 'Where Rectify Began', 'fields' => array(
            'heading' => 'Where Rectify began',
            'subheading' => 'Rectify was founded by Frank Resuloglu',
            'body' => "a structural and civil engineer who saw a growing disconnect between what the construction industry was delivering and what property owners actually needed.\n\nWhile working across residential, commercial, and industrial projects, Frank could see a pattern emerging. Too many decisions were being driven by convenience, short-term thinking, and construction shortcuts. Ground conditions were not always being respected properly. Clients facing movement issues were often being sold a treatment without being given enough understanding of the cause.\n\nThat gap became the starting point for Rectify.",
            'image' => 'images/our-story/founder-frank.jpg',
        )),

        array('id' => 'seed-story-problem', 'type' => 'story-problem', 'section_key' => 'story-problem', 'label' => 'The Problem We Saw', 'fields' => array(
            'heading' => 'The problem we saw',
            'subheading' => 'For many homeowners, structural movement begins with uncertainty.',
            'intro' => 'A crack appears in a wall. A floor starts to slope. Doors and windows stop operating the way they should. The natural reaction is concern, and often confusion.',
            'items' => array(
                array('text' => 'What caused it?'),
                array('text' => 'Is it serious?'),
                array('text' => 'Is it still moving?'),
                array('text' => 'Can it be fixed properly?'),
            ),
            'emphasis' => 'Frank saw that too many people were not being guided through these questions in a way that built real confidence.',
            'body' => 'Instead of being educated on the likely causes – such as reactive soil, leaking services, poor drainage, vegetation, uncontrolled fill, or seasonal moisture change – clients were too often being offered a solution without enough context.',
            'closing' => 'Rectify was built to change that.',
            'image' => 'images/our-story/problem-we-saw.jpg',
        )),

        array('id' => 'seed-story-work', 'type' => 'story-work', 'section_key' => 'story-work', 'label' => 'Why This Type of Work', 'fields' => array(
            'heading' => 'Why this type of work',
            'subheading' => 'Rectify was never intended to be just another contractor.',
            'intro' => 'From the beginning, the vision was to build an engineering-led business that combines',
            'items' => array(
                array('text' => 'technical knowledge'),
                array('text' => 'practical delivery'),
                array('text' => 'technical innovation'),
                array('text' => 'genuine customer care'),
            ),
            'body' => "A business that could solve difficult structural and ground-related problems while also helping people understand what was happening to their property and why.\n\nThis type of work matters because the foundation and ground beneath a structure are critical to how it performs over time. When that support system changes, the effects can show up in many ways. Solving those issues properly requires more than surface-level repair.",
            'closing' => 'It requires a deeper understanding of movement, cause, risk, and intervention.',
            'image' => 'images/our-story/why-this-work.jpg',
        )),

        array('id' => 'seed-story-values', 'type' => 'story-values', 'section_key' => 'story-values', 'label' => 'Philosophy and Values', 'fields' => array(
            'left_heading' => 'A Different Philosophy',
            'left_copy' => 'We believe the right solution is the one that creates the best long-term outcome, not necessarily the fastest or simplest short-term answer.',
            'left_items' => array(
                array('text' => 'Take time to understand the cause'),
                array('text' => 'Recommend the right sequence of action'),
                array('text' => 'Help clients make informed decisions'),
                array('text' => 'Focus on structural performance, not just appearance'),
                array('text' => 'Treat each property with care and respect'),
            ),
            'right_heading' => 'What Rectify stands for today',
            'right_copy' => 'We deliver engineering-led solutions with integrity, transparency and a long-term perspective—helping our clients protect, restore and extend the life of the assets that matter most.',
            'right_items' => array(
                array('text' => 'Professionalism'),
                array('text' => 'Transparency'),
                array('text' => 'Long-term thinking'),
                array('text' => 'Engineering-led solutions'),
                array('text' => 'Customer care'),
                array('text' => 'Innovation and continuous improvement'),
            ),
        )),

        array('id' => 'seed-story-growth', 'type' => 'story-growth', 'section_key' => 'story-growth', 'label' => 'How We Have Grown', 'fields' => array(
            'heading' => 'How we have grown',
            'subheading' => 'Rectify began with a clear purpose and has grown into a specialist business with expanding capability and reach.',
            'body' => 'What started as a founder-led, highly focused operation has grown into a broader group with dedicated leadership, multiple divisions, and a stronger footprint across key regions. Alongside that growth has been a commitment to building a high-performing team, maintaining standards, and staying close to the values that shaped the business from the beginning.',
            'image' => 'images/our-story/how-we-have-grown.jpg',
        )),

        array('id' => 'seed-story-belief', 'type' => 'story-belief', 'section_key' => 'story-belief', 'label' => 'Founder Belief', 'fields' => array(
            'intro' => 'Rectify was built on a simple belief:',
            'heading' => 'OUR INDUSTRY CAN DO BETTER.',
            'body' => "We can educate better. We can solve problems better. We can look after clients better. We can be more transparent, more innovative, and more committed to long-term outcomes.\n\nFor me, this business has never been just about repairing structures. It is about rectifying failure, restoring performance, extending asset life, and helping people protect what matters most to them.\n\nWhether that is a family home or a more complex asset, the principle is the same.",
            'principles' => array(
                array('text' => 'Respect the asset.'),
                array('text' => 'Understand the Problem'),
                array('text' => 'Deliver the right solution'),
                array('text' => 'Leave it better than you found it.'),
            ),
            'closing' => 'That is what Rectify stands for, and that is what we will continue building.',
            'image' => 'images/our-story/frank-award.png',
        )),

        array('id' => 'seed-story-name', 'type' => 'story-name', 'section_key' => 'story-name', 'label' => 'Why the Name Rectify', 'fields' => array(
            'heading' => 'Why the name Rectify',
            'subheading' => 'The name Rectify captures exactly what we do.',
            'body' => "We help rectify problems where a structure, a foundation, or the supporting ground is no longer performing as it should. Sometimes that means stabilising movement. Sometimes it means restoring confidence. Sometimes it means extending the useful life and performance of a property that is no longer behaving the way it should.\n\nAt its core, Rectify is about making things right again – intelligently, responsibly, and with purpose",
            'image' => 'images/our-story/why-name-rectify.jpg',
        )),

        array('id' => 'seed-story-cta', 'type' => 'mtt-cta', 'section_key' => 'story-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * Seed blocks for the "About Rectify" page (About Us child), matching the
 * Figma "About Rectify" design (node 207:2967).
 *
 * @return array
 */
function rectify_pb_get_about_rectify_seed_blocks()
{
    return array(
        array('id' => 'seed-ar-hero', 'type' => 'ar-hero', 'section_key' => 'ar-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'ABOUT US',
            'title' => 'About Rectify',
            'heading' => '',
            'body' => "Rectify helps homeowners solve foundation movement, ground instability, sinking slabs, cracking, and related structural issues with engineering-led solutions designed to restore confidence and reduce future risk.\n\nWhen something starts to move in a home, the uncertainty can be just as stressful as the damage itself. People want to know what is happening, why it is happening, and what can be done about it. That is where Rectify comes in.\n\nWe combine practical experience, specialised stabilisation methods, and technical thinking to help homeowners make informed decisions about their property.",
        )),

        array('id' => 'seed-ar-banner', 'type' => 'ar-banner', 'section_key' => 'ar-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/about-rectify/about-banner.jpg',
        )),

        array('id' => 'seed-ar-intro', 'type' => 'ar-intro', 'section_key' => 'ar-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Who We Are',
            'lead' => 'Rectify is an Australian specialist in structural stabilisation, chemical underpinning, ground improvement, and rectification solutions.',
            'body' => "We work with homeowners who are dealing with issues such as cracking, uneven floors, sticking doors and windows, leaning walls, slab movement, weak soils, and other signs of foundation-related distress. Our role is not simply to carry out works. It is to identify the likely cause, explain the issue clearly, and deliver the right solution for the property.\n\nWe believe homes deserve more than patch repairs and guesswork. They deserve proper assessment, practical advice, and solutions designed around long-term structural performance.",
            'image' => 'images/about-rectify/who-we-are.png',
        )),

        array('id' => 'seed-ar-vision', 'type' => 'ar-vision', 'section_key' => 'ar-vision', 'label' => 'Our Vision', 'fields' => array(
            'kicker' => 'OUR VISION',
            'heading' => 'To become Australia’s most trusted structural stabilisation and asset performance specialist.',
            'copy' => 'As we continue to grow, our ambition is to be recognised nationally and internationally for technical excellence, engineering discipline, and innovative structural solutions that protect the built environment for future generations.',
            'image' => 'images/about-rectify/vision-tunnel.jpg',
        )),

        array('id' => 'seed-ar-what', 'type' => 'ar-what', 'section_key' => 'ar-what', 'label' => 'What We Do', 'fields' => array(
            'heading' => 'What We Do',
            'lead' => 'Our work is designed to address the cause of movement where possible, not just the visible symptom.',
            'items' => array(
                array('icon' => 'ar-chemical-underpinning', 'title' => 'Chemical Underpinning', 'description' => 'Engineered resin injection for permanent foundation stabilisation and structural re-levelling.'),
                array('icon' => 'ar-slab-lifting', 'title' => 'Slab Lifting', 'description' => 'Re-levelling sunken concrete slabs with minimal disruption to operations and surrounding assets.'),
                array('icon' => 'ar-house-relevelling', 'title' => 'House Relevelling', 'description' => 'Improve ground conditions beneath homes to reduce future movement and instability.'),
                array('icon' => 'ar-ground-improvement', 'title' => 'Ground Improvement', 'description' => 'Strengthening and stabilising weak or variable ground conditions to support long-term asset performance.'),
                array('icon' => 'ar-weak-soil', 'title' => 'Weak Soil Treatment', 'description' => 'Improve ground conditions beneath homes to reduce future movement and instability.'),
                array('icon' => 'ar-structural-movement', 'title' => 'Structural Movement Rectification', 'description' => 'Correcting structural movement and restoring alignment with precision-engineered lifting solutions.'),
                array('icon' => 'ar-erosion-control', 'title' => 'Erosion Control And Sinkhole Remediation', 'description' => 'Stabilise compromised ground and address subsurface voids before they cause further damage.'),
                array('icon' => 'ar-foundation-performance', 'title' => 'Foundation-Related Performance Improvement', 'description' => 'Improve ground conditions beneath homes to reduce future movement and instability.'),
                array('icon' => 'ar-leak-sealing', 'title' => 'Leak Sealing & Water Stopping', 'description' => 'Controlling water ingress through engineered sealing systems that protect structures and critical assets.'),
            ),
        )),

        array('id' => 'seed-ar-advantage', 'type' => 'ar-advantage', 'section_key' => 'ar-advantage', 'label' => 'Our Advantage', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array('icon' => 'adv-home-experience', 'title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.'),
                array('icon' => 'adv-home-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.'),
                array('icon' => 'adv-home-delivery', 'title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
                array('icon' => 'adv-home-affordable', 'title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
                array('icon' => 'adv-home-quality', 'title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
                array('icon' => 'adv-home-trustworthy', 'title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
            ),
        )),

        array('id' => 'seed-ar-difference', 'type' => 'ar-difference', 'section_key' => 'ar-difference', 'label' => 'What Makes Us Different', 'fields' => array(
            'heading' => 'What makes us different',
            'lead' => 'What sets Rectify apart is the way we think, the way we explain, and the way we deliver.',
            'body' => "We believe structural movement should be approached with care and context. A crack in a wall, a sloping floor, or a sticking door is often the visible result of a much bigger issue beneath the surface. It may be linked to reactive soil, water leaks, poor ground conditions, vegetation, drainage, fill, or seasonal change.\n\nThat is why we do not believe in rushing straight to a treatment without understanding the bigger picture.\n\nWe take the time to assess what may be causing the issue, explain what that means for the property, and recommend the path that makes the most sense. In some cases that means immediate works. In others, it may mean first addressing drainage, plumbing, trees, or moisture conditions before structural intervention.",
            'focus' => 'Our focus is not on short-term patching. It is on achieving the best possible long-term outcome for the home and the homeowner.',
            'image' => 'images/about-rectify/what-makes-us-different.jpg',
        )),

        array('id' => 'seed-ar-approach', 'type' => 'ar-approach', 'section_key' => 'ar-approach', 'label' => 'Our Approach', 'fields' => array(
            'heading' => 'Our approach',
            'subheading' => 'Engineering the Right Solution Before Any Work Begins',
            'body' => "Every structural problem has an underlying cause. At Rectify, we don't believe in one-size-fits-all solutions or unnecessary repairs. Our process begins with a thorough assessment to identify why movement has occurred, followed by an engineered remediation strategy tailored to the property's specific conditions.\n\nRather than simply treating visible symptoms, we focus on addressing the source of the problem using proven structural stabilisation and ground engineering techniques. This ensures every recommendation is practical, technically sound, and designed to deliver long-term performance.",
            'principles_heading' => 'Our approach is built around five principles that guide every project:',
            'items' => array(
                array('title' => 'Assess properly', 'description' => 'we investigate the likely cause of movement and the conditions contributing to it.'),
                array('title' => 'Explain clearly', 'description' => 'we help homeowners understand what is happening in plain English.'),
                array('title' => 'Recommend responsibly', 'description' => 'we propose practical solutions based on what is best for the property, not just what is easiest to sell.'),
                array('title' => 'Deliver professionally', 'description' => 'we complete works with care, communication, and respect for the home.'),
                array('title' => 'Focus on long-term performance', 'description' => 'we aim to restore confidence, reduce risk, and improve structural stability over time.'),
            ),
        )),

        array('id' => 'seed-ar-cta', 'type' => 'ar-cta', 'section_key' => 'ar-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'If Your Home Is Showing Signs Of Movement, Talk To Rectify.',
            'subtext' => 'We can help you understand what may be happening and what the right next step looks like.',
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
            'items' => array(
                array('icon' => 'ar-cta-call', 'title' => 'Call Us', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'action_text' => '1800 18 20 20', 'action_url' => 'tel:1800182020', 'action_type' => 'phone'),
                array('icon' => 'ar-cta-estimate', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'action_text' => 'GET MY COST ESTIMATE', 'action_url' => '/assessment/', 'action_type' => 'button'),
                array('icon' => 'ar-cta-resources', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'action_text' => 'EXPLORE RESOURCES', 'action_url' => '/resources/', 'action_type' => 'button'),
            ),
        )),
    );
}

function rectify_pb_get_about_our_technology_seed_blocks()
{
    return array(
        array('id' => 'seed-tech-hero', 'type' => 'tech-hero', 'section_key' => 'tech-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'ABOUT US',
            'title' => 'Our Technology',
            'heading' => 'Advanced technologies, practical expertise, and solutions designed around measurable outcomes.',
            'body' => "At Rectify, technology matters because the right method can make a real difference to how structural issues are addressed, how much disruption is caused, and how effectively a home is stabilised over the long term.\n\nWe use proven stabilisation methods and continuously invest in better systems, better techniques, and better ways of solving structural and ground-related problems.",
        )),

        array('id' => 'seed-tech-why-matters', 'type' => 'tech-why-matters', 'section_key' => 'tech-why-matters', 'label' => 'Why Technology Matters', 'fields' => array(
            'heading' => 'Why technology matters',
            'subheading' => 'Not all structural issues should be approached the same way.',
            'body' => "Homes can experience movement for different reasons, including reactive soil, water leaks, settlement, weak ground, vegetation, erosion, or subsurface voids. That means the solution needs to match the condition, the structure, and the likely cause.\n\nTechnology helps us approach those problems more precisely, more cleanly, and in many cases with less disruption than traditional heavy excavation methods.",
            'image' => 'images/about-our-technology/why-matters.jpg',
        )),

        array('id' => 'seed-tech-approach', 'type' => 'tech-approach', 'section_key' => 'tech-approach', 'label' => 'Our Approach To Technology', 'fields' => array(
            'heading' => 'Our approach to technology',
            'subheading' => 'At Rectify, we do not treat technology as a sales gimmick. We treat it as part of a broader engineering-led process.',
            'body' => "The method is only one part of the outcome. What matters just as much is diagnosing the likely cause properly, selecting the right intervention, applying it carefully, checking performance, and helping clients understand what was done and why.\n\nOur technology is used in service of the outcome, not as a substitute for thinking.",
            'image' => 'images/about-our-technology/approach-banner.jpg',
        )),

        array('id' => 'seed-tech-expertise', 'type' => 'tech-expertise', 'section_key' => 'tech-expertise', 'label' => 'Expertise Cards', 'fields' => array(
            'items' => array(
                array(
                    'icon' => 'images/about-our-technology/icon-chemical-underpinning.svg',
                    'title' => 'Chemical underpinning',
                    'subheading' => 'Chemical underpinning is one of the specialist techniques Rectify uses to help stabilise foundations and improve support beneath affected areas of a home.',
                    'body' => "It can be an effective way to improve ground support, reduce further movement risk, lift or re-level where appropriate, and target affected areas with minimal disruption compared to more invasive approaches.\n\nUsed correctly, it can provide a practical solution for homes affected by movement while limiting excavation, mess, and unnecessary disturbance.",
                ),
                array(
                    'icon' => 'images/about-our-technology/icon-ground-improvement.svg',
                    'title' => 'Ground improvement',
                    'subheading' => 'Where the underlying issue relates to weak, variable, or underperforming soils, ground improvement can play an important role in the overall solution.',
                    'body' => "Rectify's ground improvement capability is focused on helping improve the support conditions beneath or around a structure so that the home can perform more consistently over time.\n\nThis may be relevant in situations involving weak soils, settlement, localised ground loss, erosion-related issues, sinkhole or void conditions, or unstable support zones beneath slabs or footings.",
                ),
            ),
        )),

        array('id' => 'seed-tech-engineered', 'type' => 'tech-engineered', 'section_key' => 'tech-engineered', 'label' => 'Engineered Solutions, Not Just Methods', 'fields' => array(
            'heading' => 'Engineered solutions, not just methods',
            'subheading' => 'One of the most important things homeowners should understand is that there is no single "magic fix" for every movement issue.',
            'body' => "The best outcomes come from combining experience, assessment, technical understanding, the right method, and careful execution.\n\nThat is why Rectify approaches every property with a focus on suitability rather than one-size-fits-all treatment.",
            'image' => 'images/about-our-technology/engineered-solutions.jpg',
        )),

        array('id' => 'seed-tech-measuring', 'type' => 'tech-measuring', 'section_key' => 'tech-measuring', 'label' => 'Measuring Outcomes', 'fields' => array(
            'heading' => 'Measuring outcomes',
            'subheading' => 'We believe homeowners should feel confident not only in what is proposed, but in how outcomes are checked.',
            'body' => 'That is why Rectify places importance on assessment before intervention, controlled execution, performance checking, site records and reporting where relevant, and clarity around what has been done.',
            'closing' => 'Technology should support measurable outcomes, not vague promises.',
            'image' => 'images/about-our-technology/measuring-outcomes.jpg',
        )),

        array('id' => 'seed-tech-innovation', 'type' => 'tech-innovation', 'section_key' => 'tech-innovation', 'label' => 'Innovation And Continuous Improvement', 'fields' => array(
            'image' => 'images/about-our-technology/innovation.jpg',
            'callout_heading' => 'Our view is simple',
            'callout_body' => 'If there is a better way to protect and stabilise homes, we want to understand it and apply it responsibly.',
            'heading' => 'Innovation and continuous improvement',
            'subheading' => 'Rectify is committed to staying at the forefront of better practice in structural stabilisation and ground improvement.',
            'body' => "The method is only one part of the outcome. What matters just as much is diagnosing the likely cause properly, selecting the right intervention, applying it carefully, checking performance, and helping clients understand what was done and why.\n\nOur technology is used in service of the outcome, not as a substitute for thinking.",
            'checklist_heading' => 'We continue to explore:',
            'items' => array(
                array('label' => 'Improved technologies'),
                array('label' => 'Equipment'),
                array('label' => 'Processes'),
                array('label' => 'Materials'),
            ),
            'closing' => 'that can help deliver better structural performance, less disruption, stronger long-term value, and more confidence for clients.',
        )),

        array('id' => 'seed-tech-cta', 'type' => 'mtt-cta', 'section_key' => 'tech-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_about_our_process_seed_blocks()
{
    return array(
        array('id' => 'seed-process-hero', 'type' => 'process-hero', 'section_key' => 'process-hero', 'label' => 'Hero', 'fields' => array(
            'kicker' => 'ABOUT US',
            'title' => 'Our Process',
            'heading' => 'Assessed. Engineered. Verified.',
            'body' => "At Rectify, our process is designed to give homeowners clarity, confidence, and a structured path forward.\n\nStructural movement can feel overwhelming when you do not know what is causing it or what the next step should be. Our role is to make that process clearer by guiding you through a practical, professional, and well-communicated journey from first contact through to recommended works and delivery.",
        )),

        array('id' => 'seed-process-banner', 'type' => 'process-banner', 'section_key' => 'process-banner', 'label' => 'Banner Image', 'fields' => array(
            'image' => 'images/about-our-process/banner.jpg',
        )),

        array('id' => 'seed-process-principles', 'type' => 'process-principles', 'section_key' => 'process-principles', 'label' => 'Why Our Process Matters + Principles', 'fields' => array(
            'heading' => 'Why our process matters',
            'subheading' => 'A good process reduces uncertainty.',
            'body' => "It helps homeowners feel informed instead of overwhelmed. It creates clarity around what is happening, what the likely cause is, what the options are, and why a particular recommendation is being made.\n\nAt Rectify, process is not just administration. It is part of the service.",
            'image_1' => 'images/about-our-process/photo-1.jpg',
            'image_2' => 'images/about-our-process/photo-2.jpg',
            'steps_heading' => 'Our approach is built around five principles that guide every project:',
            'items' => array(
                array(
                    'title' => 'Initial enquiry',
                    'description' => "Every job starts with a conversation.\n\nWhen you contact Rectify, our team takes the time to understand what you are seeing and what concerns you most. This may include cracks, uneven floors, movement around doors and windows, gaps opening up, slab issues, or general concern about the stability of the home.\n\nAt this stage, our goal is to gather the right initial information and help determine the most appropriate next step.",
                ),
                array(
                    'title' => 'Assessment and inspection',
                    'description' => "If the issue looks like something that requires further review, we arrange an inspection and assessment process.\n\nThis is where we begin looking more closely at the symptoms you are seeing, the areas affected, possible movement patterns, site conditions, and likely contributing factors.\n\nDepending on the property and the issue, this may involve discussing history, changes over time, drainage conditions, vegetation, leaks, previous works, and surrounding ground behaviour.",
                ),
                array(
                    'title' => 'Understanding the cause',
                    'description' => "One of the most important parts of the process is identifying the likely cause of movement.\n\nWe do not believe in treating only the visible symptom. A crack or uneven floor can be the result of broader conditions such as reactive soil, leaking services, weak ground, vegetation, moisture changes, settlement, or erosion.\n\nBy focusing on cause, we are better able to recommend a solution that makes sense for the home and avoids unnecessary or poorly timed work.",
                ),
                array(
                    'title' => 'Recommendations and scope',
                    'description' => "Once the issue has been assessed, we provide guidance on the most suitable path forward.\nThat may involve immediate structural stabilisation works, a staged plan, monitoring, addressing surrounding issues first, practical maintenance guidance, or a formal scope and quotation for works.\nOur aim is always to be clear, honest, and realistic about what is recommended and why.",
                ),
                array(
                    'title' => 'Delivery',
                    'description' => "If works proceed, our team coordinates delivery with a focus on professionalism, communication, and care for the property.\n\nWe understand that residential works need to be managed carefully. Homeowners want to know what is happening, when it is happening, and what to expect. We work to make delivery as smooth and respectful as possible while maintaining quality and technical discipline.",
                ),
                array(
                    'title' => 'Verification and outcome',
                    'description' => "Where relevant, Rectify places importance on checking and verifying performance.\n\nThat means we are focused not just on carrying out the works, but on making sure the process has been completed properly and that the outcome is understood. Depending on the job, this may include site records, levels, reporting, or practical guidance on what to monitor moving forward.",
                ),
                array(
                    'title' => 'Ongoing confidence',
                    'description' => "In some cases, the best long-term result involves more than one moment in time.\n\nA property may need time, maintenance, or monitoring before or after certain interventions. Where appropriate, we help homeowners understand what to watch, what steps matter next, and how to protect the home moving forward.",
                ),
            ),
        )),

        array('id' => 'seed-process-cta', 'type' => 'mtt-cta', 'section_key' => 'process-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

function rectify_pb_get_privacy_policy_seed_blocks()
{
    return array(
        array('id' => 'seed-policy-hero', 'type' => 'legal-hero', 'section_key' => 'policy-hero', 'label' => 'Hero', 'fields' => array(
            'title' => 'Privacy Policy',
            'breadcrumb_label' => 'Privacy Policy',
        )),
        array('id' => 'seed-policy-sections', 'type' => 'legal-sections', 'section_key' => 'policy-content', 'label' => 'Numbered Sections', 'fields' => array(
            'items' => array(
                array('heading' => 'Introduction', 'body' => "Rectify Group (\u{201c}Rectify\u{201d}, \u{201c}we\u{201d}, \u{201c}our\u{201d}, or \u{201c}us\u{201d}) respects your privacy and is committed to protecting your personal information and commercially sensitive information.\n\nThis Privacy Policy explains how we collect, use, store, disclose, and protect personal information in accordance with the Privacy Act 1988 (Cth) and the Australian Privacy Principles (APPs).\n\nThis policy applies to website visitors, residential clients, commercial and infrastructure clients, suppliers, subcontractors, employees, job applicants, government stakeholders, and any individual interacting with Rectify Group."),
                array('heading' => 'Who We Are', 'body' => "Rectify Group is an Australian registered domestic and commercial builder operating in structural stabilisation, chemical underpinning, ground engineering, asset remediation, and marine and industrial structural durability.\n\nWe operate nationally and may expand internationally in future markets."),
                array('heading' => 'Information We Collect', 'body' => "We may collect personal identification information (name, phone, email, address, company, position), project and site information (property address, reports, photographs, geotechnical data), business information (ABN, insurance details), commercial information (quotes, pricing structures, methodologies, scope documentation), employment information (CVs, qualifications), and website technical data (IP address, cookies, analytics data).\n\nWe only collect information reasonably necessary for our business functions."),
                array('heading' => 'How We Collect Information', 'body' => 'Information may be collected via website enquiry forms, email, phone calls, consultations, tender submissions, employment applications, contracts, site inspections, and cookies/analytics tools.'),
                array('heading' => 'Why We Collect Your Information', 'body' => "We collect and use information to assess enquiries, prepare quotes and proposals, provide structural stabilisation and remediation services, manage contracts and compliance obligations, conduct safety assessments, manage recruitment, improve services, and comply with legal requirements.\n\nRectify Group does not sell personal information."),
                array('heading' => 'Disclosure of Personal Information & Third-Party Contractors', 'body' => "Information may be disclosed to engineers, subcontractors, insurers, legal advisors, government authorities, defence stakeholders, and IT service providers where necessary to deliver services or comply with legal obligations.\n\nAll third parties are required to maintain appropriate confidentiality and security standards.\n\nCommercial Confidentiality\n\nRectify\u{2019}s quotes, pricing structures, methodologies, and client communications may contain commercially sensitive information. We take reasonable steps to prevent unnecessary disclosure of such information to third parties.\n\nThird-Party Contractor Protocol\n\nWhere specialist contractors are required:\n\n<ul>\n<li>We do not automatically introduce third-party contractors into client communication threads.</li>\n<li>We do not share full pricing structures or internal methodologies unless contractually required.</li>\n<li>We do not disclose client contact details beyond what is reasonably necessary for project delivery.</li>\n</ul>\n\nWhere appropriate, Rectify may provide contractor details directly to the client, allowing the client to initiate contact at their discretion.\n\nThese measures are designed to protect commercially sensitive information, maintain control of client relationships, avoid confidentiality concerns, prevent unsolicited third-party contact, and support appropriate referral opportunities while preserving trust."),
                array('heading' => 'International Disclosure', 'body' => 'Where data is stored or processed overseas (e.g., cloud services), Rectify Group takes reasonable steps to ensure compliance with Australian privacy laws and appropriate safeguards.'),
                array('heading' => 'Data Security', 'body' => "We implement reasonable technical and organisational safeguards including secure servers, restricted access controls, encrypted communications, and internal confidentiality protocols.\n\nWhile we take reasonable steps, no system guarantees absolute security."),
                array('heading' => 'Retention of Information', 'body' => 'Information is retained only as long as necessary to fulfil contractual, legal, warranty, or dispute resolution obligations. When no longer required, it is securely destroyed or de-identified.'),
                array('heading' => 'Cookies & Website Analytics', 'body' => 'Our website may use cookies and analytics tools to improve user experience and measure marketing performance. You may disable cookies via browser settings, though this may affect functionality.'),
                array('heading' => 'Access & Correction', 'body' => "You may request access to personal information we hold about you and request correction of inaccurate or outdated information.\n\nRequests should be submitted in writing to:\nadmin@rectify.com.au\n\nWe will respond within a reasonable timeframe."),
                array('heading' => 'Marketing Communications', 'body' => "Rectify Group may send service-related or industry communications. You may opt out at any time via unsubscribe links or direct contact.\n\nWe comply with the Spam Act 2003 (Cth)."),
                array('heading' => 'Sensitive Information', 'body' => 'Sensitive information is not generally collected. Where required (e.g., employment or safety compliance), it is handled with heightened security and used only for its intended purpose.'),
                array('heading' => 'Complaints', 'body' => "If you believe Rectify Group has breached your privacy rights, you may submit a written complaint to:\n\nRectify Group\nRectify Group Head Office\n99-101 Munster Terrace 28 Trade Park Drive\nNorth Melbourne VIC 3051 Tullamarine VIC 3043\nadmin@rectify.com.au\n\nWe will investigate and respond within a reasonable timeframe.\n\nIf you are not satisfied with our response, you may contact the Office of the Australian Information Commissioner (OAIC)."),
                array('heading' => 'Changes to This Policy', 'body' => 'Rectify Group may update this Privacy Policy to reflect legal, operational, national, or international changes. The most current version will be available on our website.'),
                array('heading' => 'Contact Us', 'body' => "If you have questions about this Privacy Policy, please contact:\n\nRectify Group\n1800 18 20 20\nRectify Group Head Office\n99-101 Munster Terrace 28 Trade Park Drive\nNorth Melbourne VIC 3051 Tullamarine VIC 3043\nadmin@rectify.com.au\nwww.rectify.com.au"),
            ),
        )),
        array('id' => 'seed-policy-help', 'type' => 'faq-cta', 'section_key' => 'policy-help', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Need Help Choosing the Right Solution?',
            'subtext' => "Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.",
            'phone_text' => '1800 18 20 20',
            'phone_url' => 'tel:1800182020',
        )),
    );
}

/**
 * Industries: Transport Assets ("transport-assets-solutions" profile).
 * Matches the Figma "Structural Stabilisation Solutions for Transport
 * Assets" design. Styling lives entirely in assets/css/industries-inner-pages.css,
 * scoped under .rx-ii-page in template-parts/industries/content-transport-assets.php
 * - the same base classes are intended to be reused by the other Industries
 * child pages once their own content is built out.
 *
 * @return array
 */
function rectify_pb_get_transport_assets_seed_blocks()
{
    return array(
        array('id' => 'seed-ta-banner', 'type' => 'ii-banner', 'section_key' => 'ta-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Structural Stabilisation Solutions for Transport Assets',
            'breadcrumb_label' => 'Industries',
            'breadcrumb_url' => home_url('/industries/'),
            'current_label' => 'Transport Assets',
        )),

        array('id' => 'seed-ta-intro', 'type' => 'ii-intro', 'section_key' => 'ta-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Protecting Critical Transport Infrastructure',
            'body_richtext' => "Transport infrastructure is subjected to constant traffic loading, environmental exposure and ground movement throughout its service life. Over time, these factors can contribute to pavement settlement, void formation, slab movement, erosion, water ingress and structural deterioration.\n\nTraditional reconstruction often involves significant excavation, extended closures and major operational disruption. Rectify provides engineered alternatives that restore structural performance while keeping assets operational wherever possible.\n\nWorking with government agencies, Tier 1 contractors, transport authorities and infrastructure owners, we deliver tailored remediation solutions that improve safety, reduce lifecycle costs and extend the life of valuable transport assets.",
            'image' => 'images/industries/transport-assets/transport-intro.png',
            'image_alt' => 'Engineers inspecting transport infrastructure',
        )),

        array('id' => 'seed-ta-challenges', 'type' => 'ii-challenges', 'section_key' => 'ta-challenges', 'label' => 'Challenges We Help Resolve', 'fields' => array(
            'heading' => 'Challenges We Help Resolve',
            'lead' => 'Transport assets face a wide range of structural and ground-related issues that can compromise safety, performance and operational efficiency.',
            'items' => array(
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Uneven Pavements and Slab Settlement',
                    'description' => 'Differential settlement beneath roads, bridge approaches, airport pavements and industrial transport routes can create uneven surfaces, reduce ride quality and increase maintenance costs.',
                ),
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Voids Beneath Concrete Pavements',
                    'description' => 'Loss of ground support beneath concrete slabs can lead to cracking, rocking panels and progressive pavement failure if left untreated.',
                ),
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Water Ingress and Erosion',
                    'description' => 'Poor drainage, leaking services and groundwater movement can wash away supporting soils, creating hidden voids and weakening pavement foundations.',
                ),
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Bridge Approach Settlement',
                    'description' => 'Settlement at bridge approaches often creates noticeable bumps and uneven transitions that impact safety, vehicle comfort and long-term structural performance.',
                ),
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Ageing Concrete Infrastructure',
                    'description' => 'Years of traffic loading, environmental exposure and weathering gradually reduce the performance of transport structures, requiring engineered remediation to restore durability.',
                ),
                array(
                    'icon' => 'ii-ta-civil-transport',
                    'title' => 'Operational Constraints',
                    'description' => 'Transport infrastructure often operates continuously, making prolonged closures impractical. Remediation solutions must minimise disruption while delivering reliable long-term outcomes.',
                ),
            ),
        )),

        array('id' => 'seed-ta-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'ta-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/transport-assets/transport-night-banner.png',
            'image_alt' => 'Road works crew stabilising transport infrastructure at night',
        )),

        array('id' => 'seed-ta-solutions', 'type' => 'ii-solutions', 'section_key' => 'ta-solutions', 'label' => 'Engineered Solutions', 'fields' => array(
            'heading' => 'Engineered Solutions for Transport Infrastructure',
            'lead' => 'Rectify combines advanced ground engineering, chemical underpinning and asset remediation technologies to provide comprehensive solutions for transport assets.',
            'items' => array(
                array(
                    'icon' => 'ii-ta-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Improve weak or unstable ground conditions beneath roads, pavements and transport infrastructure using engineered soil stabilisation techniques.',
                ),
                array(
                    'icon' => 'ii-ta-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Fill hidden subsurface voids beneath concrete pavements, bridge approaches and transport infrastructure to restore support and reduce future settlement.',
                ),
                array(
                    'icon' => 'ii-ta-slab-lifting',
                    'title' => 'Slab Lifting & Relevelling',
                    'description' => 'Lift and accurately re-level settled concrete pavements and slabs without demolition or replacement.',
                ),
                array(
                    'icon' => 'ii-ta-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Stabilise foundations and subsurface conditions using precision resin injection to improve bearing capacity and reduce ongoing movement.',
                ),
            ),
        )),

        array('id' => 'seed-ta-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'ta-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-ta-process', 'type' => 'ii-process', 'section_key' => 'ta-process', 'label' => 'Structured Engineering Approach', 'fields' => array(
            'heading' => 'Our Structured Engineering Approach',
            'image' => 'images/industries/transport-assets/transport-process.png',
            'image_alt' => 'Engineers assessing a transport asset on site',
            'items' => array(
                array('number' => '01', 'title' => 'Site Assessment', 'description' => 'We investigate the asset condition, identify the underlying causes of movement and assess ground conditions.'),
                array('number' => '02', 'title' => 'Engineering Review', 'description' => 'Our specialists determine the most appropriate stabilisation or remediation methodology based on structural and operational requirements.'),
                array('number' => '03', 'title' => 'Precision Installation', 'description' => 'Our experienced delivery team performs the remediation using advanced, non-invasive technologies while minimising disruption to operations.'),
                array('number' => '04', 'title' => 'Verification', 'description' => 'Every project is validated through quality assurance processes to confirm the required structural outcomes have been achieved.'),
            ),
        )),

        array('id' => 'seed-ta-faq', 'type' => 'ii-faq', 'section_key' => 'ta-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'Can Rectify repair roads without excavation?',
                    'answer' => 'In many cases, yes. Our resin injection and ground improvement technologies can restore support beneath pavements with significantly less excavation than traditional reconstruction methods.',
                ),
                array(
                    'question' => 'Can transport assets remain operational during remediation?',
                    'answer' => 'Many of our solutions are specifically designed to minimise closures and operational disruption, allowing infrastructure to remain partially or fully operational where project conditions permit.',
                ),
                array(
                    'question' => 'What transport infrastructure can Rectify work on?',
                    'answer' => 'We work across roads, bridges, airport pavements, rail infrastructure, transport facilities, logistics centres and other critical transport assets.',
                ),
                array(
                    'question' => 'How do you determine the appropriate solution?',
                    'answer' => 'Every project begins with a detailed engineering assessment to understand the root cause of movement before recommending the most effective remediation strategy.',
                ),
            ),
        )),

        array('id' => 'seed-ta-cta', 'type' => 'ii-cta', 'section_key' => 'ta-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => "Let's Find The Right Engineering Solution",
            'lead' => 'Every transport asset presents different structural and operational challenges. Our specialists work with asset owners, contractors and government agencies to develop tailored remediation strategies that restore performance while keeping projects moving.',
            'items' => array(
                array(
                    'icon' => 'ii-ta-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-ta-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-ta-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Commercial Buildings page content. Same ii-* block system as
 * rectify_pb_get_transport_assets_seed_blocks(), plus the one new type
 * this page introduces (ii-assets, a photo + checklist band) - see
 * rectify_pb_render_ii_assets() in class-renderer.php.
 *
 * @return array
 */
function rectify_pb_get_commercial_buildings_seed_blocks()
{
    return array(
        array('id' => 'seed-cb-banner', 'type' => 'ii-banner', 'section_key' => 'cb-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Structural Stabilisation Solutions for Commercial Buildings',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Commercial Buildings',
        )),

        array('id' => 'seed-cb-intro', 'type' => 'ii-intro', 'section_key' => 'cb-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Protecting Commercial Assets with Engineered Solutions',
            'body_richtext' => "Commercial buildings experience continuous structural loading, environmental exposure and changing ground conditions. Over time, these factors can contribute to foundation movement, slab settlement, concrete deterioration, water ingress and structural defects that impact safety, functionality and long-term asset value.\n\nConventional repair methods often involve extensive demolition, business disruption and significant downtime. Rectify delivers non-invasive remediation technologies that restore structural performance while allowing many buildings to remain operational throughout the works.\nOur engineering-led approach helps building owners, property managers, developers and contractors resolve structural issues efficiently while protecting the long-term performance of their commercial assets.",
            'image' => 'images/industries/commercial-buildings/commercial-intro.png',
            'image_alt' => 'Rectify technicians assessing a commercial construction site',
        )),

        array('id' => 'seed-cb-challenges', 'type' => 'ii-challenges', 'section_key' => 'cb-challenges', 'label' => 'Structural Issues We Resolve', 'fields' => array(
            'heading' => 'Structural Issues We Resolve',
            'lead' => 'Commercial buildings face a variety of structural challenges that can affect building performance, occupant safety and ongoing maintenance costs.',
            'items' => array(
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Foundation Settlement',
                    'description' => 'Movement beneath foundations can cause structural distortion, uneven floors, cracking and ongoing building movement if not addressed early.',
                ),
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Sunken or Uneven Concrete Slabs',
                    'description' => 'Warehouse floors, loading docks, car parks and internal slabs may settle due to voids or weak ground conditions, creating operational and safety concerns.',
                ),
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Water Ingress and Basement Leaks',
                    'description' => 'Water entering basements, lift pits, retaining walls and below-ground structures can accelerate concrete deterioration and compromise structural integrity.',
                ),
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Cracked Concrete and Structural Deterioration',
                    'description' => 'Ageing concrete, environmental exposure and operational loading can lead to cracking, spalling and reinforcement corrosion that requires specialist remediation.',
                ),
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Ground Instability',
                    'description' => 'Poorly compacted fill, reactive soils and erosion beneath commercial buildings can reduce foundation support and contribute to long-term structural movement.',
                ),
                array(
                    'icon' => 'ii-cb-commercial-building',
                    'title' => 'Operational Downtime',
                    'description' => 'Commercial properties often require remediation while remaining occupied, making minimal disruption an essential project requirement.',
                ),
            ),
        )),

        array('id' => 'seed-cb-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'cb-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/commercial-buildings/commercial-skyline.png',
            'image_alt' => 'City skyline of commercial buildings',
        )),

        array('id' => 'seed-cb-solutions', 'type' => 'ii-solutions', 'section_key' => 'cb-solutions', 'label' => 'Engineered Remediation', 'fields' => array(
            'heading' => 'Engineered Remediation for Commercial Buildings',
            'lead' => 'Rectify delivers integrated structural solutions tailored to the operational requirements of commercial buildings.',
            'items' => array(
                array(
                    'icon' => 'ii-cb-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Strengthen weak foundations and stabilise ground beneath buildings using precision resin injection with minimal excavation.',
                ),
                array(
                    'icon' => 'ii-cb-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Improve bearing capacity beneath commercial structures by strengthening loose or unstable ground conditions.',
                ),
                array(
                    'icon' => 'ii-cb-slab-lifting',
                    'title' => 'Slab Lifting & Relevelling',
                    'description' => 'Restore settled warehouse floors, office slabs, loading docks and commercial pavements to their designed levels without replacement.',
                ),
                array(
                    'icon' => 'ii-cb-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Eliminate hidden voids beneath concrete slabs and foundations to restore structural support and reduce future settlement.',
                ),
            ),
        )),

        array('id' => 'seed-cb-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'cb-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-cb-process', 'type' => 'ii-process', 'section_key' => 'cb-process', 'label' => 'A Proven Engineering Approach', 'fields' => array(
            'heading' => 'A Proven Engineering Approach',
            'image' => 'images/industries/commercial-buildings/commercial-process.png',
            'image_alt' => 'Engineer assessing a heritage building basement stabilisation site',
            'items' => array(
                array('number' => '01', 'title' => 'Assessment', 'description' => 'We inspect the building, evaluate structural movement and investigate the underlying ground conditions.'),
                array('number' => '02', 'title' => 'Engineering Solution', 'description' => 'Our specialists develop a remediation strategy tailored to the building, site conditions and operational requirements.'),
                array('number' => '03', 'title' => 'Specialist Installation', 'description' => 'Using advanced non-invasive technologies, our experienced team completes the remediation efficiently while minimising disruption to occupants and business operations.'),
                array('number' => '04', 'title' => 'Quality Verification', 'description' => 'Completed works are verified to ensure the required structural outcomes and long-term performance objectives have been achieved.'),
            ),
        )),

        array('id' => 'seed-cb-assets', 'type' => 'ii-assets', 'section_key' => 'cb-assets', 'label' => 'Commercial Assets We Support', 'fields' => array(
            'heading' => 'Commercial Assets We Support',
            'image' => 'images/industries/commercial-buildings/commercial-assets.png',
            'image_alt' => 'Resin injection remediation works on a commercial site',
            'items' => array(
                array('text' => 'Office buildings'),
                array('text' => 'Shopping centres'),
                array('text' => 'Retail precincts'),
                array('text' => 'Warehouses and distribution centres'),
                array('text' => 'Hospitals and healthcare facilities'),
                array('text' => 'Schools and universities'),
                array('text' => 'Hotels and accommodation'),
                array('text' => 'Multi-storey commercial buildings'),
                array('text' => 'Basement structures'),
                array('text' => 'Commercial car parks'),
                array('text' => 'Logistics facilities'),
                array('text' => 'Mixed-use developments'),
            ),
        )),

        array('id' => 'seed-cb-faq', 'type' => 'ii-faq', 'section_key' => 'cb-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'Can remediation be completed while the building remains occupied?',
                    'answer' => 'In many cases, yes. Our non-invasive solutions are specifically designed to minimise disruption, allowing many commercial facilities to continue operating during remediation works.',
                ),
                array(
                    'question' => 'What causes commercial buildings to settle?',
                    'answer' => 'Foundation settlement can result from reactive soils, poorly compacted fill, erosion, water ingress, underground voids or changes in ground moisture conditions.',
                ),
                array(
                    'question' => 'Is demolition always necessary?',
                    'answer' => 'No. Many structural issues can be addressed using advanced ground engineering and resin injection technologies that avoid extensive demolition or reconstruction.',
                ),
                array(
                    'question' => 'Do you work with consultants and contractors?',
                    'answer' => 'Yes. We regularly collaborate with consulting engineers, project managers, facility managers, builders, developers and Tier 1 contractors to deliver engineered remediation solutions.',
                ),
            ),
        )),

        array('id' => 'seed-cb-cta', 'type' => 'ii-cta', 'section_key' => 'cb-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => "Let's Find the Right Engineering Solution",
            'lead' => 'Every transport asset presents different structural and operational challenges. Our specialists work with asset owners, contractors and government agencies to develop tailored remediation strategies that restore performance while keeping projects moving.',
            'items' => array(
                array(
                    'icon' => 'ii-cb-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-cb-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-cb-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Utilities & Energy page content.
 *
 * Reuses the ii-* detailed industry blocks and adds utilities-specific seed
 * content for the Figma node 1129:23224.
 *
 * @return array
 */
function rectify_pb_get_utilities_energy_seed_blocks()
{
    return array(
        array('id' => 'seed-ue-banner', 'type' => 'ii-banner', 'section_key' => 'ue-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Structural Solutions for Utilities & Energy Infrastructure',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Utilities & Energy',
        )),

        array('id' => 'seed-ue-intro', 'type' => 'ii-intro', 'section_key' => 'ue-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Protecting Critical Utility and Energy Assets',
            'body_richtext' => "Utility and energy assets operate in demanding environments where structural integrity directly affects operational reliability, public safety and service continuity. Constant environmental exposure, groundwater movement, ageing infrastructure and heavy operational loading can lead to ground instability, foundation settlement, concrete deterioration and water ingress.\n\nTraditional reconstruction often requires significant excavation, prolonged outages and costly operational impacts. Rectify delivers non-invasive remediation technologies that restore structural performance while allowing many facilities to remain operational throughout the works.\n\nOur engineering-led solutions support utility providers, energy companies, government agencies and Tier 1 contractors in maintaining resilient infrastructure that communities and industries depend on every day.",
            'image' => 'images/industries/utilities-energy/hero-utility-facility.jpg',
            'image_alt' => 'Critical utility and energy infrastructure facility',
        )),

        array('id' => 'seed-ue-challenges', 'type' => 'ii-challenges', 'section_key' => 'ue-challenges', 'label' => 'Infrastructure Challenges We Help Resolve', 'fields' => array(
            'heading' => 'Infrastructure Challenges We Help Resolve',
            'lead' => 'Utility and energy infrastructure faces unique structural and geotechnical challenges that require specialist engineering expertise.',
            'items' => array(
                array(
                    'icon' => 'ii-utility-infrastructure',
                    'title' => 'Foundation Settlement',
                    'description' => 'Ground movement beneath substations, pump stations, treatment facilities and operational buildings can affect structural stability and equipment performance.',
                ),
                array(
                    'icon' => 'ii-utility-infrastructure',
                    'title' => 'Underground Voids and Soil Instability',
                    'description' => 'Water migration, erosion and ageing underground services can create hidden voids that reduce structural support beneath critical infrastructure.',
                ),
                array(
                    'icon' => 'ii-utility-infrastructure',
                    'title' => 'Water Ingress',
                    'description' => 'Reservoirs, pump stations, basements, service tunnels and treatment facilities are susceptible to water ingress, which can accelerate deterioration and weaken surrounding structures.',
                ),
                array(
                    'icon' => 'ii-utility-infrastructure',
                    'title' => 'Concrete Deterioration',
                    'description' => 'Continuous exposure to moisture, chemicals, operational loading and harsh environmental conditions can lead to cracking, spalling and reinforcement corrosion.',
                ),
                array(
                    'icon' => 'ii-utility-infrastructure',
                    'title' => 'Pipeline and Utility Corridor Ground Movement',
                    'description' => 'Ground settlement around buried services and utility corridors can impact surrounding infrastructure and reduce long-term asset performance.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Maintaining Essential Services',
                    'description' => 'Utility infrastructure often operates continuously, requiring remediation solutions that minimise service interruptions and maintain operational reliability.',
                ),
            ),
        )),

        array('id' => 'seed-ue-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'ue-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/utilities-energy/substation-banner.jpg',
            'image_alt' => 'Electrical substation utility infrastructure',
        )),

        array('id' => 'seed-ue-solutions', 'type' => 'ii-solutions', 'section_key' => 'ue-solutions', 'label' => 'Engineering Solutions', 'fields' => array(
            'heading' => 'Engineering Solutions for Utility and Energy Infrastructure',
            'lead' => 'Rectify delivers integrated remediation technologies designed to improve structural performance while reducing operational downtime.',
            'items' => array(
                array(
                    'icon' => 'ii-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Strengthen weak or unstable soils beneath utility infrastructure to improve bearing capacity and long-term stability.',
                ),
                array(
                    'icon' => 'ii-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Stabilise foundations supporting substations, operational buildings and critical infrastructure using precision resin injection with minimal excavation.',
                ),
                array(
                    'icon' => 'ii-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Restore structural support by filling underground voids beneath slabs, foundations, pipelines and operational facilities.',
                ),
                array(
                    'icon' => 'ii-concrete-repair',
                    'title' => 'Concrete Repair',
                    'description' => 'Repair deteriorated concrete structures, equipment foundations, tanks, retaining walls and operational assets to restore structural performance.',
                ),
            ),
        )),

        array('id' => 'seed-ue-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'ue-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-ue-process', 'type' => 'ii-process', 'section_key' => 'ue-process', 'label' => 'A Structured Engineering Approach', 'fields' => array(
            'heading' => 'A Structured Engineering Approach',
            'image' => 'images/industries/utilities-energy/water-treatment-process.jpg',
            'image_alt' => 'Water treatment infrastructure undergoing engineering assessment',
            'items' => array(
                array('number' => '01', 'title' => 'Asset Investigation', 'description' => 'We assess structural performance, investigate ground conditions and identify the root cause of movement or deterioration.'),
                array('number' => '02', 'title' => 'Engineering Assessment', 'description' => 'Our specialists develop a tailored remediation strategy that aligns with operational requirements, safety standards and long-term asset performance.'),
                array('number' => '03', 'title' => 'Specialist Installation', 'description' => 'Using advanced, non-invasive technologies, our experienced delivery team completes the remediation efficiently while minimising disruption to essential services.'),
                array('number' => '04', 'title' => 'Performance Verification', 'description' => 'All completed works undergo quality assurance and verification to confirm structural objectives have been achieved and the asset is ready for continued operation.'),
            ),
        )),

        array('id' => 'seed-ue-assets', 'type' => 'ii-assets', 'section_key' => 'ue-assets', 'label' => 'Utilities & Energy Assets We Support', 'fields' => array(
            'heading' => 'Utilities & Energy Assets We Support',
            'image' => 'images/industries/utilities-energy/water-treatment-aerial.jpg',
            'image_alt' => 'Aerial view of a modern water treatment facility',
            'items' => array(
                array('text' => 'Water treatment plants'),
                array('text' => 'Wastewater treatment facilities'),
                array('text' => 'Pump stations'),
                array('text' => 'Water reservoirs'),
                array('text' => 'Electrical substations'),
                array('text' => 'Power generation facilities'),
                array('text' => 'Gas infrastructure'),
                array('text' => 'Pipeline corridors'),
                array('text' => 'Utility service buildings'),
                array('text' => 'Underground utility structures'),
                array('text' => 'Cable pits and service tunnels'),
                array('text' => 'Energy distribution facilities'),
            ),
        )),

        array('id' => 'seed-ue-faq', 'type' => 'ii-faq', 'section_key' => 'ue-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'Can utility infrastructure remain operational during remediation?',
                    'answer' => 'In many cases, yes. Our non-invasive technologies are designed to minimise service interruptions, allowing many facilities to continue operating throughout the remediation process.',
                ),
                array(
                    'question' => 'What causes settlement around utility infrastructure?',
                    'answer' => 'Settlement can result from weak ground conditions, erosion, water ingress, ageing underground assets, poorly compacted fill or long-term operational loading.',
                ),
                array(
                    'question' => 'Do you work within live operational facilities?',
                    'answer' => 'Yes. We regularly deliver projects within active utility and energy facilities, coordinating closely with asset owners and site operators to maintain safety and operational continuity.',
                ),
                array(
                    'question' => 'Which utility sectors does Rectify support?',
                    'answer' => 'We work across water, wastewater, power, gas and broader utility infrastructure, providing engineered structural stabilisation, ground improvement and asset remediation solutions.',
                ),
            ),
        )),

        array('id' => 'seed-ue-cta', 'type' => 'ii-cta', 'section_key' => 'ue-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Protect The Infrastructure That Keeps Communities Running',
            'lead' => 'Work with Rectify to strengthen your utility and energy assets while maintaining safe, reliable service for the communities that depend on them.',
            'items' => array(
                array(
                    'icon' => 'ii-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Mining & Resources page content.
 *
 * Reuses the ii-* detailed industry blocks and adds mining-specific seed
 * content for the Figma node 1130:24277.
 *
 * @return array
 */
function rectify_pb_get_mining_resources_seed_blocks()
{
    return array(
        array('id' => 'seed-mr-banner', 'type' => 'ii-banner', 'section_key' => 'mr-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Engineered Ground and Structural Solutions for Mining Operations',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Mining and Resources',
        )),

        array('id' => 'seed-mr-intro', 'type' => 'ii-intro', 'section_key' => 'mr-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Supporting Safe, Reliable and Productive Mining Infrastructure',
            'body_richtext' => "Mining infrastructure operates under demanding conditions. Heavy equipment, dynamic loading, vibration, variable ground conditions and continuous exposure to water, chemicals and abrasive materials can progressively affect structural performance.\n\nSettlement beneath processing facilities, haul roads, hardstands and equipment foundations can interfere with production, create safety risks and increase maintenance requirements. Subsurface erosion and hidden voids can further compromise slabs, pavements, pipelines and supporting structures.\n\nRectify works with mine operators, resource companies, engineering consultants and principal contractors to identify the underlying cause of asset movement and implement targeted remediation solutions suited to operational sites. Our methods are designed to restore support and structural performance while minimising disruption to production schedules.",
            'image' => 'images/industries/mining-resources/intro-mine-haul-truck.jpg',
            'image_alt' => 'Haul truck and excavator working an active mine site',
        )),

        array('id' => 'seed-mr-challenges', 'type' => 'ii-challenges', 'section_key' => 'mr-challenges', 'label' => 'Structural and Ground Conditions Affecting Mining Assets', 'fields' => array(
            'heading' => 'Structural and Ground Conditions Affecting Mining Assets',
            'lead' => 'Utility and energy infrastructure faces unique structural and geotechnical challenges that require specialist engineering expertise.',
            'items' => array(
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Heavy Equipment and Foundation Settlement',
                    'description' => 'Crushing equipment, conveyors, storage systems and fixed plant impose substantial static and dynamic loads. Weak or variable ground beneath these assets can lead to differential settlement, misalignment and reduced equipment performance.',
                ),
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Sunken Slabs and Industrial Pavements',
                    'description' => 'Concrete slabs, workshops, loading areas and hardstands may settle when underlying fill consolidates or loses support. Uneven surfaces can affect vehicle movement, drainage, material handling and workplace safety.',
                ),
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Subsurface Voids',
                    'description' => 'Water migration, erosion, poorly compacted backfill and abandoned underground infrastructure can create voids beneath slabs, roads and foundations. Without remediation, these voids may continue to expand and contribute to progressive settlement.',
                ),
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Haul Road and Access Deterioration',
                    'description' => 'High traffic volumes and repeated heavy axle loading place significant demands on mine access roads and internal pavements. Loss of subgrade support can result in deformation, cracking and recurring maintenance.',
                ),
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Water Ingress and Erosion',
                    'description' => 'Leaking infrastructure, groundwater movement and concentrated surface runoff can wash out supporting soils and destabilise surrounding structures, embankments and service corridors.',
                ),
                array(
                    'icon' => 'ii-mining-operations',
                    'title' => 'Concrete and Joint Deterioration',
                    'description' => 'Chemical exposure, vibration, impact, abrasion and harsh environmental conditions can damage concrete surfaces, joints and structural elements throughout processing and operational areas.',
                ),
            ),
        )),

        array('id' => 'seed-mr-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'mr-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/mining-resources/open-pit-banner.jpg',
            'image_alt' => 'Open pit mine with processing infrastructure and conveyors',
        )),

        array('id' => 'seed-mr-solutions', 'type' => 'ii-solutions', 'section_key' => 'mr-solutions', 'label' => 'Specialist Remediation', 'fields' => array(
            'heading' => 'Specialist Remediation for Mining and Resource Assets',
            'lead' => 'Rectify delivers targeted solutions for both subsurface instability and structural deterioration.',
            'items' => array(
                array(
                    'icon' => 'ii-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Increase the strength and bearing capacity of weak or variable ground beneath operational infrastructure, buildings and equipment foundations.',
                ),
                array(
                    'icon' => 'ii-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Stabilise foundations and improve supporting ground through controlled resin injection, reducing the need for extensive excavation around active assets.',
                ),
                array(
                    'icon' => 'ii-slab-lifting',
                    'title' => 'Slab Lifting and Re-levelling',
                    'description' => 'Raise and re-level settled concrete slabs, workshop floors, loading areas and hardstands to restore serviceability and operational performance.',
                ),
                array(
                    'icon' => 'ii-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Fill subsurface voids beneath roads, slabs, foundations and service corridors to restore continuous support and reduce the risk of further settlement.',
                ),
            ),
        )),

        array('id' => 'seed-mr-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'mr-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-mr-process', 'type' => 'ii-process', 'section_key' => 'mr-process', 'label' => 'A Controlled Approach to Remediation', 'fields' => array(
            'heading' => 'A Controlled Approach to Remediation in Operational Sites',
            'image' => 'images/industries/mining-resources/open-pit-aerial-process.jpg',
            'image_alt' => 'Aerial view of an open pit mine with excavators and haul trucks',
            'items' => array(
                array('number' => '01', 'title' => 'Site and Asset Assessment', 'description' => 'We review the affected asset, ground conditions, loading environment and operational constraints to determine the likely cause and extent of the problem.'),
                array('number' => '02', 'title' => 'Remediation Planning', 'description' => 'A project-specific solution is developed around the required structural outcome, access limitations, production requirements and site safety controls.'),
                array('number' => '03', 'title' => 'Targeted Installation', 'description' => 'Our specialist team implements the selected ground stabilisation or structural remediation method using controlled installation procedures suited to the operating environment.'),
                array('number' => '04', 'title' => 'Monitoring and Verification', 'description' => 'Levels, material response and other project-specific performance criteria are monitored during the works to confirm the remediation is achieving the intended outcome.'),
                array('number' => '05', 'title' => 'Completion and Reporting', 'description' => 'Quality records and relevant project documentation are provided to support asset management, maintenance planning and future engineering decisions.'),
            ),
        )),

        array('id' => 'seed-mr-assets', 'type' => 'ii-assets', 'section_key' => 'mr-assets', 'label' => 'Mining and Resource Assets We Support', 'fields' => array(
            'heading' => 'Mining and Resource Assets We Support',
            'image' => 'images/industries/mining-resources/heavy-excavator-digging.jpg',
            'image_alt' => 'Heavy excavator digging on a resource project in daylight',
            'items' => array(
                array('text' => 'Processing plants'),
                array('text' => 'Fixed plant and machinery foundations'),
                array('text' => 'Crusher and screening facilities'),
                array('text' => 'Conveyor infrastructure'),
                array('text' => 'Workshops and maintenance facilities'),
                array('text' => 'Warehouses and storage buildings'),
                array('text' => 'Haul roads and access roads'),
                array('text' => 'Heavy-duty pavements'),
                array('text' => 'Loading and unloading areas'),
                array('text' => 'Industrial hardstands'),
                array('text' => 'Tank and silo foundations'),
                array('text' => 'Pipeline and service corridors'),
            ),
        )),

        array('id' => 'seed-mr-faq', 'type' => 'ii-faq', 'section_key' => 'mr-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'Can remediation be completed without shutting down the entire facility?',
                    'answer' => 'Many projects can be staged around operating areas, planned shutdowns or restricted work zones. The appropriate approach depends on the asset, access requirements and site safety controls.',
                ),
                array(
                    'question' => 'Can settled equipment foundations be stabilised?',
                    'answer' => 'Yes. Where ground weakness or voiding is contributing to movement, targeted ground improvement or underpinning may be used to restore support beneath equipment and structural foundations.',
                ),
                array(
                    'question' => 'Do you work on remote mining sites?',
                    'answer' => 'Rectify can mobilise specialist teams and equipment to regional and remote projects, subject to site access, logistics, inductions and project requirements.',
                ),
                array(
                    'question' => 'What causes voids beneath mining infrastructure?',
                    'answer' => 'Common causes include erosion, leaking services, water migration, consolidation of backfill, poorly compacted fill and deterioration of buried infrastructure.',
                ),
                array(
                    'question' => 'Can sunken slabs be repaired without replacement?',
                    'answer' => 'Where the slab remains structurally suitable, injection-based lifting and re-levelling may restore support and levels without full demolition and reconstruction.',
                ),
                array(
                    'question' => 'Do you work with engineering consultants and principal contractors?',
                    'answer' => 'Yes. We regularly collaborate with asset owners, geotechnical and structural engineers, maintenance teams and contractors to deliver remediation as part of broader mining and infrastructure projects.',
                ),
            ),
        )),

        array('id' => 'seed-mr-cta', 'type' => 'ii-cta', 'section_key' => 'mr-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Resolve Ground Movement Before It Disrupts Production',
            'lead' => 'Engage Rectify to develop a site-specific stabilisation strategy for your processing infrastructure, heavy-duty pavements or critical operational assets.',
            'items' => array(
                array(
                    'icon' => 'ii-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Marine & Coastal page content.
 *
 * Dedicated builder content for Figma node 1130:25480.
 *
 * @return array
 */
function rectify_pb_get_marine_coastal_seed_blocks()
{
    return array(
        array('id' => 'seed-mc-banner', 'type' => 'ii-banner', 'section_key' => 'mc-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Protecting Marine & Coastal Infrastructure with Engineered Remediation',
            'breadcrumb_label' => 'Industries',
            'breadcrumb_url' => home_url('/industries/'),
            'current_label' => 'Marine and Coastal',
        )),

        array('id' => 'seed-mc-intro', 'type' => 'ii-intro', 'section_key' => 'mc-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Building Resilience in Challenging Coastal Environments',
            'body_richtext' => "Marine and coastal structures face continual exposure to corrosive environments that place significant demands on both structural integrity and foundation performance. Saltwater intrusion, tidal fluctuations, erosion, scour and aggressive weather conditions can progressively weaken supporting ground and accelerate concrete deterioration.\n\nTraditional reconstruction is often expensive, disruptive and operationally challenging. Rectify delivers engineering-led remediation solutions that restore structural stability, improve ground conditions and protect existing infrastructure with minimal excavation and reduced downtime.\n\nWorking with port authorities, local councils, government agencies, contractors and asset owners, we help maintain the safety, reliability and longevity of Australia's coastal infrastructure.",
            'image' => 'images/industries/marine-coastal/intro-harbour-cranes.jpg',
            'image_alt' => 'Marine cranes and vessels in a coastal harbour at sunset',
        )),

        array('id' => 'seed-mc-challenges', 'type' => 'ii-challenges', 'section_key' => 'mc-challenges', 'label' => 'Marine Infrastructure Challenges We Help Resolve', 'fields' => array(
            'heading' => 'Marine Infrastructure Challenges We Help Resolve',
            'lead' => '',
            'items' => array(
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Coastal Erosion and Scour', 'description' => 'Wave action, tidal currents and storm events can erode supporting soils around marine structures, reducing foundation stability and increasing the risk of settlement.'),
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Foundation Settlement', 'description' => 'Changing ground conditions beneath seawalls, jetties, wharves and coastal structures can result in differential settlement, structural movement and reduced serviceability.'),
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Concrete Deterioration', 'description' => 'Saltwater exposure, chloride attack and reinforcing steel corrosion can lead to cracking, spalling and deterioration of concrete structures over time.'),
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Water Ingress', 'description' => 'Marine structures, retaining walls, service tunnels and below-ground infrastructure are vulnerable to water ingress that accelerates structural degradation and soil instability.'),
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Voids Beneath Marine Structures', 'description' => 'Erosion and washout beneath slabs, pavements and coastal infrastructure can create hidden voids that reduce structural support and increase maintenance requirements.'),
                array('icon' => 'ii-mc-marine-structure', 'title' => 'Maintaining Operational Access', 'description' => 'Ports, marinas and coastal facilities often remain operational throughout remediation projects, requiring construction methods that minimise disruption to commercial and public activities.'),
            ),
        )),

        array('id' => 'seed-mc-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'mc-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/marine-coastal/port-banner.jpg',
            'image_alt' => 'Container terminal and marine port cranes beside the water',
        )),

        array('id' => 'seed-mc-solutions', 'type' => 'ii-solutions', 'section_key' => 'mc-solutions', 'label' => 'Specialist Solutions', 'fields' => array(
            'kicker' => '',
            'heading' => 'Specialist Solutions for Marine & Coastal Assets',
            'lead' => 'Rectify provides integrated engineering solutions designed for challenging coastal environments.',
            'items' => array(
                array('icon' => 'ii-mc-ground-improvement', 'title' => 'Ground Improvement', 'description' => 'Strengthen weak or eroded ground beneath marine infrastructure to improve bearing capacity and long-term stability.'),
                array('icon' => 'ii-mc-chemical-underpinning', 'title' => 'Chemical Underpinning', 'description' => 'Stabilise foundations supporting marine and coastal structures using precision resin injection with minimal excavation.'),
                array('icon' => 'ii-mc-void-filling', 'title' => 'Void Filling', 'description' => 'Restore structural support beneath pavements, slabs, seawalls and coastal infrastructure by filling underground voids caused by erosion or washout.'),
                array('icon' => 'ii-mc-concrete-repair', 'title' => 'Concrete Repair', 'description' => 'Repair deteriorated concrete affected by chloride attack, cracking, spalling and environmental exposure to restore durability and structural performance.'),
            ),
        )),

        array('id' => 'seed-mc-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'mc-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array('icon' => 'adv-home-experience', 'title' => 'Unrivalled Experience', 'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.'),
                array('icon' => 'adv-home-technology', 'title' => 'Cutting-Edge Technology', 'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.'),
                array('icon' => 'adv-home-delivery', 'title' => 'Seamless Delivery', 'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.'),
                array('icon' => 'adv-home-affordable', 'title' => 'Affordable Solutions', 'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.'),
                array('icon' => 'adv-home-quality', 'title' => 'Quality Assurance', 'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.'),
                array('icon' => 'adv-home-trustworthy', 'title' => 'Environmentally Conscious', 'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.'),
            ),
        )),

        array('id' => 'seed-mc-process', 'type' => 'ii-process', 'section_key' => 'mc-process', 'label' => 'A Proven Engineering Approach', 'fields' => array(
            'heading' => 'A Proven Engineering Approach',
            'image' => 'images/industries/marine-coastal/engineering-approach-port.jpg',
            'image_alt' => 'Aerial view of container cranes and marine port infrastructure',
            'items' => array(
                array('number' => '01', 'title' => 'Site Investigation', 'description' => 'Our specialists assess structural conditions, ground behaviour and environmental factors to determine the root cause of movement or deterioration.'),
                array('number' => '02', 'title' => 'Engineering Assessment', 'description' => 'A tailored remediation strategy is developed to suit the asset, coastal environment, operational constraints and long-term performance objectives.'),
                array('number' => '03', 'title' => 'Specialist Installation', 'description' => 'Using advanced non-invasive technologies, our experienced delivery team completes remediation safely and efficiently while minimising disruption to marine operations.'),
                array('number' => '04', 'title' => 'Performance Verification', 'description' => 'Levels, material response and other project-specific performance criteria are monitored during the works to confirm the remediation is achieving the intended outcome.'),
            ),
        )),

        array('id' => 'seed-mc-assets', 'type' => 'ii-assets', 'section_key' => 'mc-assets', 'label' => 'Marine & Coastal Assets We Support', 'fields' => array(
            'heading' => 'Marine & Coastal Assets We Support',
            'image' => 'images/industries/marine-coastal/coastal-assets.jpg',
            'image_alt' => 'Rock breakwater protecting a coastal walkway from the sea',
            'items' => array(
                array('text' => 'Ports and harbours'),
                array('text' => 'Wharves and piers'),
                array('text' => 'Jetties'),
                array('text' => 'Marinas'),
                array('text' => 'Seawalls'),
                array('text' => 'Boat ramps'),
                array('text' => 'Coastal retaining walls'),
                array('text' => 'Breakwaters'),
                array('text' => 'Ferry terminals'),
                array('text' => 'Bulk handling facilities'),
                array('text' => 'Waterfront developments'),
                array('text' => 'Coastal public infrastructure'),
                array('text' => 'Marine service facilities'),
                array('text' => 'Coastal boardwalks'),
                array('text' => 'Drainage and stormwater outfalls'),
            ),
        )),

        array('id' => 'seed-mc-faq', 'type' => 'ii-faq', 'section_key' => 'mc-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array('question' => 'Can marine infrastructure be repaired without complete reconstruction?', 'answer' => 'In many cases, yes. Our remediation technologies restore structural support and improve asset performance without requiring extensive demolition or replacement.'),
                array('question' => 'What causes deterioration in coastal infrastructure?', 'answer' => 'Common causes include saltwater exposure, chloride attack, corrosion, erosion, tidal movement, groundwater migration, heavy loading and ageing construction materials.'),
                array('question' => 'Do you work on operational marine facilities?', 'answer' => 'Yes. We regularly deliver remediation projects within active ports, marinas and coastal facilities while coordinating closely with asset owners and operators to minimise disruption.'),
                array('question' => 'What types of marine structures does Rectify support?', 'answer' => 'We provide engineering solutions for seawalls, jetties, wharves, ports, marinas, retaining walls, waterfront developments, coastal infrastructure and other marine assets.'),
            ),
        )),

        array('id' => 'seed-mc-cta', 'type' => 'ii-cta', 'section_key' => 'mc-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Protect Coastal Infrastructure Before Environmental Exposure Takes Its Toll',
            'lead' => 'Partner with Rectify to preserve your marine infrastructure, reduce lifecycle costs and maintain reliable performance in demanding coastal environments.',
            'items' => array(
                array('icon' => 'ii-call-expert', 'title' => 'Talk to Our Engineering Team', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'button_text' => '1800 18 20 20', 'button_url' => 'tel:1800182020'),
                array('icon' => 'ii-estimate-cost', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'button_text' => 'Get My Cost Estimate', 'button_url' => home_url('/assessment/')),
                array('icon' => 'ii-explore-resources', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'button_text' => 'Explore Resources', 'button_url' => home_url('/resources/')),
            ),
        )),
    );
}

/**
 * Industries: Industrial Facilities page content.
 *
 * Reuses the ii-* detailed industry blocks (same shell as
 * rectify_pb_get_commercial_buildings_seed_blocks()) with the
 * industrial-specific copy and imagery from Figma node 1104:25085.
 *
 * @return array
 */
function rectify_pb_get_industrial_facilities_seed_blocks()
{
    return array(
        array('id' => 'seed-if-banner', 'type' => 'ii-banner', 'section_key' => 'if-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Engineered Structural Solutions for Industrial Facilities',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Industrial Facilities',
        )),

        array('id' => 'seed-if-intro', 'type' => 'ii-intro', 'section_key' => 'if-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Keeping Industrial Operations Stable, Safe and Productive',
            'body_richtext' => "Industrial assets are continually subjected to heavy equipment loading, dynamic machinery, vibration, chemical exposure and constant operational demands. Combined with changing ground conditions and ageing infrastructure, these factors can lead to foundation settlement, slab movement, void formation and structural deterioration.\n\nTraditional repair methods often require excavation, production shutdowns and extended construction periods. Rectify provides engineering-led alternatives that restore structural integrity while reducing operational disruption and preserving critical infrastructure.\n\nWhether supporting manufacturing, logistics, processing or heavy industry, our solutions are designed to improve asset reliability while reducing lifecycle maintenance costs.",
            'image' => 'images/industries/industrial-facilities/hero-industrial-slab-cutting.jpg',
            'image_alt' => 'Concrete saw cutting works inside an industrial warehouse',
        )),

        array('id' => 'seed-if-challenges', 'type' => 'ii-challenges', 'section_key' => 'if-challenges', 'label' => 'Structural Challenges in Industrial Environments', 'fields' => array(
            'heading' => 'Structural Challenges in Industrial Environments',
            'lead' => 'Industrial facilities often encounter complex structural issues that require specialised engineering solutions.',
            'items' => array(
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Heavy Equipment Foundation Settlement',
                    'description' => 'Continuous loading from machinery, production equipment and storage systems can contribute to foundation movement and uneven settlement over time.',
                ),
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Warehouse Floor Movement',
                    'description' => 'Sunken or uneven concrete slabs can create safety hazards, affect forklift operations, reduce productivity and increase maintenance requirements.',
                ),
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Underground Voids and Ground Instability',
                    'description' => 'Erosion, poorly compacted fill and subsurface voids may reduce structural support beneath slabs and foundations, resulting in progressive settlement.',
                ),
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Water Ingress and Chemical Exposure',
                    'description' => 'Industrial environments are often exposed to moisture, chemicals and aggressive substances that accelerate concrete deterioration and compromise structural durability.',
                ),
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Concrete Deterioration',
                    'description' => 'Heavy operational loading, abrasion, impact and environmental exposure can cause cracking, spalling and degradation of structural concrete elements.',
                ),
                array(
                    'icon' => 'ii-warehouse',
                    'title' => 'Minimising Operational Downtime',
                    'description' => 'Industrial facilities require remediation solutions that can often be completed while maintaining ongoing operations and production schedules.',
                ),
            ),
        )),

        array('id' => 'seed-if-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'if-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/industrial-facilities/factory-interior-banner.jpg',
            'image_alt' => 'Metallic ovens inside a large factory with heavy equipment',
        )),

        array('id' => 'seed-if-solutions', 'type' => 'ii-solutions', 'section_key' => 'if-solutions', 'label' => 'Integrated Engineering Solutions for Industrial Assets', 'fields' => array(
            'heading' => 'Integrated Engineering Solutions for Industrial Assets',
            'lead' => 'Rectify provides specialist remediation technologies that address both subsurface conditions and structural performance.',
            'items' => array(
                array(
                    'icon' => 'ii-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Improve bearing capacity beneath commercial structures by strengthening loose or unstable ground conditions.',
                ),
                array(
                    'icon' => 'ii-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Strengthen weak foundations and stabilise ground beneath buildings using precision resin injection with minimal excavation.',
                ),
                array(
                    'icon' => 'ii-slab-lifting',
                    'title' => 'Slab Lifting & Relevelling',
                    'description' => 'Restore settled warehouse floors, office slabs, loading docks and commercial pavements to their designed levels without replacement.',
                ),
                array(
                    'icon' => 'ii-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Eliminate hidden voids beneath concrete slabs and foundations to restore structural support and reduce future settlement.',
                ),
            ),
        )),

        array('id' => 'seed-if-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'if-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-if-process', 'type' => 'ii-process', 'section_key' => 'if-process', 'label' => 'A Structured Engineering Approach', 'fields' => array(
            'heading' => 'A Structured Engineering Approach',
            'image' => 'images/industries/industrial-facilities/warehouse-slab-investigation.jpg',
            'image_alt' => 'Slab investigation works inside an empty industrial warehouse',
            'items' => array(
                array('number' => '01', 'title' => 'Site Investigation', 'description' => 'We assess structural movement, foundation conditions and operational requirements to identify the root cause of the problem.'),
                array('number' => '02', 'title' => 'Engineering Assessment', 'description' => 'Our specialists develop a tailored remediation strategy designed to restore structural performance while minimising operational disruption.'),
                array('number' => '03', 'title' => 'Specialist Installation', 'description' => 'Using advanced non-invasive technologies, our experienced team completes the remediation safely, efficiently and with minimal impact on facility operations.'),
                array('number' => '04', 'title' => 'Performance Verification', 'description' => 'Completed works are verified to ensure structural objectives have been achieved and the asset is ready to continue operating with confidence.'),
            ),
        )),

        array('id' => 'seed-if-assets', 'type' => 'ii-assets', 'section_key' => 'if-assets', 'label' => 'Industrial Facilities We Support', 'fields' => array(
            'heading' => 'Industrial Facilities We Support',
            'image' => 'images/industries/industrial-facilities/industrial-park-warehouse.jpg',
            'image_alt' => 'Industrial park factory building and warehouse hardstand',
            'items' => array(
                array('text' => 'Manufacturing plants'),
                array('text' => 'Processing facilities'),
                array('text' => 'Warehouses'),
                array('text' => 'Distribution centres'),
                array('text' => 'Logistics hubs'),
                array('text' => 'Production facilities'),
                array('text' => 'Heavy industrial sites'),
                array('text' => 'Storage facilities'),
                array('text' => 'Equipment foundations'),
                array('text' => 'Loading docks'),
                array('text' => 'Industrial hardstands'),
                array('text' => 'Bulk material handling facilities'),
            ),
        )),

        array('id' => 'seed-if-faq', 'type' => 'ii-faq', 'section_key' => 'if-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'Can industrial facilities remain operational during remediation?',
                    'answer' => 'In many cases, yes. Our technologies are specifically designed to reduce excavation and minimise production downtime wherever site conditions allow.',
                ),
                array(
                    'question' => 'What causes industrial floor settlement?',
                    'answer' => 'Settlement may result from weak ground conditions, underground voids, poorly compacted fill, water ingress or long-term heavy equipment loading.',
                ),
                array(
                    'question' => 'Can heavy machinery foundations be stabilised?',
                    'answer' => 'Yes. Our engineering solutions can improve ground conditions beneath equipment foundations and industrial slabs to restore structural support and performance.',
                ),
                array(
                    'question' => 'Do you work on live industrial sites?',
                    'answer' => 'Yes. We regularly deliver remediation projects within active industrial environments while coordinating closely with site management to maintain safety and minimise operational disruption.',
                ),
            ),
        )),

        array('id' => 'seed-if-cta', 'type' => 'ii-cta', 'section_key' => 'if-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => "Let's Find the Right Engineering Solution",
            'lead' => 'Every transport asset presents different structural and operational challenges. Our specialists work with asset owners, contractors and government agencies to develop tailored remediation strategies that restore performance while keeping projects moving.',
            'items' => array(
                array(
                    'icon' => 'ii-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Civil Infrastructure page content.
 *
 * Reuses the ii-* detailed industry blocks (same shell as
 * rectify_pb_get_commercial_buildings_seed_blocks()) with the civil-specific
 * copy and imagery from Figma node 1104:26274.
 *
 * @return array
 */
function rectify_pb_get_civil_infrastructure_seed_blocks()
{
    return array(
        array('id' => 'seed-ci-banner', 'type' => 'ii-banner', 'section_key' => 'ci-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Structural Stabilisation Solutions for Civil Infrastructure',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Civil Infrastructure',
        )),

        array('id' => 'seed-ci-intro', 'type' => 'ii-intro', 'section_key' => 'ci-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Preserving Critical Infrastructure for Long-Term Performance',
            'body_richtext' => "Civil infrastructure is continually exposed to heavy loading, environmental conditions, groundwater movement and ageing materials. Over time, these factors can contribute to settlement, erosion, void formation, concrete deterioration and structural movement that affect safety, reliability and operational performance.\n\nReplacing major infrastructure assets is often costly, disruptive and time-consuming. Rectify provides engineered remediation solutions that restore structural integrity while reducing excavation, minimising service interruptions and extending asset life.\n\nFrom retaining structures and culverts to public infrastructure, tunnels and major civil assets, our solutions are designed to improve long-term performance while reducing whole-of-life maintenance costs.",
            'image' => 'images/industries/civil-infrastructure/hero-service-tunnel.jpg',
            'image_alt' => 'Interior of an ageing concrete service tunnel with pipework',
        )),

        array('id' => 'seed-ci-challenges', 'type' => 'ii-challenges', 'section_key' => 'ci-challenges', 'label' => 'Infrastructure Challenges We Help Resolve', 'fields' => array(
            'heading' => 'Infrastructure Challenges We Help Resolve',
            'lead' => 'Civil infrastructure faces complex structural and geotechnical challenges that require specialist engineering solutions.',
            'items' => array(
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Ground Settlement',
                    'description' => 'Weak soils, consolidation and changing subsurface conditions can cause settlement beneath roads, structures and supporting infrastructure, leading to structural movement and serviceability issues.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Underground Voids',
                    'description' => 'Hidden voids created by erosion, water migration or deteriorating underground assets can compromise structural support and increase the risk of future failure.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Concrete Deterioration',
                    'description' => 'Exposure to moisture, environmental weathering, heavy loading and ageing materials can result in cracking, spalling and reduced structural durability.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Water Ingress and Soil Erosion',
                    'description' => 'Leaking joints, groundwater movement and drainage failures can weaken surrounding soils, accelerate deterioration and reduce the stability of infrastructure assets.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Structural Movement',
                    'description' => 'Differential movement between structural elements may affect serviceability, increase maintenance requirements and shorten asset lifespan.',
                ),
                array(
                    'icon' => 'ii-civil-infrastructure',
                    'title' => 'Maintaining Public Access',
                    'description' => 'Civil infrastructure often remains operational during remediation, requiring solutions that minimise disruption to road users, communities and essential services.',
                ),
            ),
        )),

        array('id' => 'seed-ci-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'ci-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/civil-infrastructure/road-tunnel-banner.jpg',
            'image_alt' => 'Road tunnel portal cut through a rock face',
        )),

        array('id' => 'seed-ci-solutions', 'type' => 'ii-solutions', 'section_key' => 'ci-solutions', 'label' => 'Engineering Solutions for Civil Infrastructure', 'fields' => array(
            'heading' => 'Engineering Solutions for Civil Infrastructure',
            'lead' => 'Rectify provides integrated structural remediation technologies that improve both ground conditions and structural performance.',
            'items' => array(
                array(
                    'icon' => 'ii-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Strengthen weak or unstable ground beneath civil infrastructure to improve bearing capacity and reduce future settlement.',
                ),
                array(
                    'icon' => 'ii-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Stabilise foundations and supporting ground using precision resin injection with minimal excavation and rapid installation.',
                ),
                array(
                    'icon' => 'ii-void-filling',
                    'title' => 'Void Filling',
                    'description' => 'Restore structural support by filling underground voids beneath slabs, pavements, retaining structures and civil assets.',
                ),
                array(
                    'icon' => 'ii-concrete-repair',
                    'title' => 'Concrete Repair',
                    'description' => 'Repair deteriorated concrete, structural cracks, joints and damaged infrastructure to restore durability and long-term performance.',
                ),
            ),
        )),

        array('id' => 'seed-ci-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'ci-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-ci-process', 'type' => 'ii-process', 'section_key' => 'ci-process', 'label' => 'A Structured Engineering Approach', 'fields' => array(
            'heading' => 'A Structured Engineering Approach',
            'image' => 'images/industries/civil-infrastructure/stone-tunnel-process.jpg',
            'image_alt' => 'Historic stone-lined road tunnel interior',
            'items' => array(
                array('number' => '01', 'title' => 'Asset Assessment', 'description' => 'We inspect structural conditions, investigate ground behaviour and identify the underlying causes of movement or deterioration.'),
                array('number' => '02', 'title' => 'Engineering Design', 'description' => "Our specialists develop a tailored remediation strategy based on the asset's structural requirements, operational constraints and long-term performance objectives."),
                array('number' => '03', 'title' => 'Specialist Remediation', 'description' => 'Our experienced delivery team implements advanced stabilisation and remediation technologies with minimal disruption to surrounding infrastructure and public access.'),
                array('number' => '04', 'title' => 'Verification and Quality Assurance', 'description' => 'Completed works are verified to confirm structural performance objectives have been achieved, providing confidence in the long-term stability of the asset.'),
            ),
        )),

        array('id' => 'seed-ci-assets', 'type' => 'ii-assets', 'section_key' => 'ci-assets', 'label' => 'Civil Infrastructure We Support', 'fields' => array(
            'heading' => 'Civil Infrastructure We Support',
            'image' => 'images/industries/civil-infrastructure/tunnel-remediation-crew.jpg',
            'image_alt' => 'Rectify technicians carrying out remediation works inside a road tunnel',
            'items' => array(
                array('text' => 'Retaining walls'),
                array('text' => 'Culverts'),
                array('text' => 'Stormwater infrastructure'),
                array('text' => 'Drainage structures'),
                array('text' => 'Tunnels'),
                array('text' => 'Public infrastructure'),
                array('text' => 'Pedestrian bridges'),
                array('text' => 'Shared pathways'),
                array('text' => 'Concrete channels'),
                array('text' => 'Flood mitigation structures'),
                array('text' => 'Utility corridors'),
                array('text' => 'Civil engineering structures'),
            ),
        )),

        array('id' => 'seed-ci-faq', 'type' => 'ii-faq', 'section_key' => 'ci-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'What types of civil infrastructure does Rectify work on?',
                    'answer' => 'We provide structural stabilisation and remediation solutions for retaining walls, tunnels, culverts, drainage structures, public infrastructure, concrete assets and other civil engineering structures.',
                ),
                array(
                    'question' => 'Can infrastructure remain operational during remediation?',
                    'answer' => 'Where practical, our non-invasive technologies allow many infrastructure assets to remain partially or fully operational during remediation, helping minimise disruption to the community.',
                ),
                array(
                    'question' => 'What causes civil infrastructure to deteriorate?',
                    'answer' => 'Common causes include ground movement, erosion, water ingress, ageing concrete, environmental exposure, heavy loading and subsurface void formation.',
                ),
                array(
                    'question' => 'Do you work with government agencies and contractors?',
                    'answer' => 'Yes. We regularly partner with government authorities, consulting engineers, Tier 1 contractors and infrastructure asset owners to deliver engineered remediation solutions across Australia.',
                ),
            ),
        )),

        array('id' => 'seed-ci-cta', 'type' => 'ii-cta', 'section_key' => 'ci-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Strengthen Infrastructure Today. Prevent Major Repairs Tomorrow.',
            'lead' => 'Small structural issues can quickly become significant infrastructure risks if left untreated. Rectify helps infrastructure owners intervene early with engineering-led remediation solutions that restore structural performance, minimise future maintenance and maximise asset life.',
            'items' => array(
                array(
                    'icon' => 'ii-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}

/**
 * Industries: Residential & Strata page content.
 *
 * Reuses the ii-* detailed industry blocks and adds residential-specific seed
 * content for the Figma node 1130:26529.
 *
 * @return array
 */
function rectify_pb_get_residential_strata_seed_blocks()
{
    return array(
        array('id' => 'seed-rs-banner', 'type' => 'ii-banner', 'section_key' => 'rs-banner', 'label' => 'Title Banner', 'fields' => array(
            'kicker' => 'INDUSTRIES',
            'title' => 'Protecting Residential and Strata Properties with Engineered Structural Solutions',
            'breadcrumb_label' => 'Residential Solutions',
            'breadcrumb_url' => home_url('/residential/'),
            'current_label' => 'Residential and Strata',
        )),

        array('id' => 'seed-rs-intro', 'type' => 'ii-intro', 'section_key' => 'rs-intro', 'label' => 'Intro', 'fields' => array(
            'heading' => 'Long-Term Structural Stability for Residential Communities',
            'body_richtext' => "Residential properties are constantly influenced by changing soil conditions, seasonal moisture variation, ageing infrastructure and natural ground movement. Left untreated, these conditions can lead to foundation settlement, cracking, uneven floors, water ingress and ongoing structural deterioration.\n\nFor strata and multi-residential properties, structural issues often affect multiple lots, common areas and shared infrastructure, making early intervention essential to protect both occupants and property value.\n\nRectify delivers non-invasive remediation technologies that restore structural performance while reducing excavation, minimising disruption and extending the life of residential assets.",
            'image' => 'images/industries/residential-strata/intro-residential-rear.jpg',
            'image_alt' => 'Rear of a two-storey residential property during a structural assessment',
        )),

        array('id' => 'seed-rs-challenges', 'type' => 'ii-challenges', 'section_key' => 'rs-challenges', 'label' => 'Structural Problems We Help Resolve', 'fields' => array(
            'heading' => 'Structural Problems We Help Resolve',
            'lead' => '',
            'items' => array(
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Foundation Settlement',
                    'description' => 'Movement beneath foundations can cause cracking, uneven floors, sticking doors and windows, and ongoing structural movement throughout the property.',
                ),
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Reactive and Expansive Soils',
                    'description' => 'Seasonal expansion and contraction of reactive clay soils can place continual stress on foundations, slabs and structural elements.',
                ),
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Sunken Concrete Slabs',
                    'description' => 'Driveways, garages, pathways, patios and internal floors may settle over time due to weak ground, erosion or hidden voids beneath the slab.',
                ),
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Water Ingress and Basement Leaks',
                    'description' => 'Basements, retaining walls and underground structures can experience persistent water ingress that contributes to structural deterioration and moisture-related damage.',
                ),
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Ground Erosion and Void Formation',
                    'description' => 'Leaking services, poor drainage and groundwater movement can wash away supporting soils, creating hidden voids beneath foundations and pavements.',
                ),
                array(
                    'icon' => 'ii-residential-home',
                    'title' => 'Ageing Residential Infrastructure',
                    'description' => 'Older homes and apartment buildings often experience cumulative structural movement and concrete deterioration that requires specialist engineering remediation.',
                ),
            ),
        )),

        array('id' => 'seed-rs-photo-banner', 'type' => 'ii-photo-banner', 'section_key' => 'rs-photo-banner', 'label' => 'Full-Width Photo Banner', 'fields' => array(
            'image' => 'images/industries/residential-strata/port-terminal-banner.jpg',
            'image_alt' => 'Port container terminal with cranes and stacked containers',
        )),

        array('id' => 'seed-rs-solutions', 'type' => 'ii-solutions', 'section_key' => 'rs-solutions', 'label' => 'Engineering Solutions', 'fields' => array(
            'heading' => 'Engineering Solutions for Residential and Strata Properties',
            'lead' => 'Rectify provides tailored remediation solutions that restore stability while protecting the long-term performance of residential assets.',
            'items' => array(
                array(
                    'icon' => 'ii-chemical-underpinning',
                    'title' => 'Chemical Underpinning',
                    'description' => 'Stabilise foundations and strengthen supporting ground using precision resin injection with minimal excavation.',
                ),
                array(
                    'icon' => 'ii-foundation-repair',
                    'title' => 'Foundation Repair',
                    'description' => 'Address the underlying causes of structural movement to restore stability and reduce future settlement.',
                ),
                array(
                    'icon' => 'ii-ground-improvement',
                    'title' => 'Ground Improvement',
                    'description' => 'Improve weak or unstable ground conditions beneath homes, apartment buildings and residential developments.',
                ),
                array(
                    'icon' => 'ii-slab-lifting',
                    'title' => 'Slab Lifting and Re-levelling',
                    'description' => 'Restore settled driveways, pathways, garage floors and internal slabs without demolition or replacement.',
                ),
            ),
        )),

        array('id' => 'seed-rs-why-choose', 'type' => 'ii-why-choose', 'section_key' => 'rs-why-choose', 'label' => 'Why Homeowners Choose Rectify', 'fields' => array(
            'kicker' => 'OUR ADVANTAGE',
            'heading' => 'Why Homeowners Choose Rectify',
            'lead' => "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.",
            'items' => array(
                array(
                    'icon' => 'adv-home-experience',
                    'title' => 'Unrivalled Experience',
                    'description' => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
                ),
                array(
                    'icon' => 'adv-home-technology',
                    'title' => 'Cutting-Edge Technology',
                    'description' => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
                ),
                array(
                    'icon' => 'adv-home-delivery',
                    'title' => 'Seamless Delivery',
                    'description' => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
                ),
                array(
                    'icon' => 'adv-home-affordable',
                    'title' => 'Affordable Solutions',
                    'description' => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
                ),
                array(
                    'icon' => 'adv-home-quality',
                    'title' => 'Quality Assurance',
                    'description' => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
                ),
                array(
                    'icon' => 'adv-home-trustworthy',
                    'title' => 'Environmentally Conscious',
                    'description' => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
                ),
            ),
        )),

        array('id' => 'seed-rs-process', 'type' => 'ii-process', 'section_key' => 'rs-process', 'label' => 'A Structured Approach to Residential Remediation', 'fields' => array(
            'heading' => 'A Structured Approach to Residential Remediation',
            'image' => 'images/industries/residential-strata/resin-injection-process.jpg',
            'image_alt' => 'Resin injection equipment set up against a residential brick wall',
            'items' => array(
                array('number' => '01', 'title' => 'Property Assessment', 'description' => 'Our specialists inspect the property, assess structural movement and investigate the underlying ground conditions affecting the building.'),
                array('number' => '02', 'title' => 'Engineering Solution', 'description' => "A tailored remediation strategy is developed based on the property's structural requirements, site conditions and long-term performance objectives."),
                array('number' => '03', 'title' => 'Specialist Installation', 'description' => 'Using advanced, non-invasive technologies, our experienced team completes the remediation efficiently while minimising disruption to residents and surrounding properties.'),
                array('number' => '04', 'title' => 'Quality Assurance', 'description' => 'Completed works are verified to confirm structural stability has been restored and the required engineering outcomes have been achieved.'),
            ),
        )),

        array('id' => 'seed-rs-assets', 'type' => 'ii-assets', 'section_key' => 'rs-assets', 'label' => 'Assets We Support', 'fields' => array(
            'heading' => 'Marine & Coastal Assets We Support',
            'image' => 'images/industries/residential-strata/residential-street-assets.jpg',
            'image_alt' => 'Residential street with detached homes and driveways',
            'items' => array(
                array('text' => 'Detached homes'),
                array('text' => 'Townhouses'),
                array('text' => 'Duplex developments'),
                array('text' => 'Apartment buildings'),
                array('text' => 'Strata communities'),
                array('text' => 'Body corporate properties'),
                array('text' => 'Residential estates'),
                array('text' => 'Retirement villages'),
                array('text' => 'Aged care facilities'),
                array('text' => 'Basement car parks'),
                array('text' => 'Shared driveways'),
                array('text' => 'Common property infrastructure'),
                array('text' => 'Retaining walls'),
                array('text' => 'Swimming pool surrounds'),
                array('text' => 'Residential pathways and hardstands'),
            ),
        )),

        array('id' => 'seed-rs-faq', 'type' => 'ii-faq', 'section_key' => 'rs-faq', 'label' => 'Frequently Asked Questions', 'fields' => array(
            'heading' => 'Frequently Asked Questions',
            'items' => array(
                array(
                    'question' => 'How do I know if my property has structural movement?',
                    'answer' => 'Common signs include wall cracks, uneven floors, sticking doors or windows, gaps around frames, sunken concrete and recurring movement over time. A professional assessment can determine the underlying cause.',
                ),
                array(
                    'question' => 'Can occupied properties be repaired?',
                    'answer' => 'Yes. Many of our remediation technologies are specifically designed to minimise disruption, allowing homeowners and residents to remain in the property throughout much of the work.',
                ),
                array(
                    'question' => 'Do you work with strata managers and body corporates?',
                    'answer' => "Absolutely. We regularly partner with strata managers, body corporates, facility managers and owners' corporations to deliver structural remediation across shared residential assets.",
                ),
                array(
                    'question' => 'What areas does Rectify service?',
                    'answer' => 'Rectify delivers residential structural remediation solutions across Melbourne, Victoria, South Australia and surrounding regions, supporting homeowners, developers and strata communities with engineering-led solutions.',
                ),
            ),
        )),

        array('id' => 'seed-rs-cta', 'type' => 'ii-cta', 'section_key' => 'rs-cta', 'label' => 'Final CTA', 'fields' => array(
            'heading' => 'Protect Your Property Before Structural Movement Becomes More Costly',
            'lead' => "Speak with Rectify's residential and strata specialists to arrange a professional structural assessment and develop the right solution for your property.",
            'items' => array(
                array(
                    'icon' => 'ii-call-expert',
                    'title' => 'Talk to Our Engineering Team',
                    'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                    'button_text' => '1800 18 20 20',
                    'button_url' => 'tel:1800182020',
                ),
                array(
                    'icon' => 'ii-estimate-cost',
                    'title' => 'Estimate Project Cost',
                    'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                    'button_text' => 'Get My Cost Estimate',
                    'button_url' => home_url('/assessment/'),
                ),
                array(
                    'icon' => 'ii-explore-resources',
                    'title' => 'Explore Resources',
                    'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                    'button_text' => 'Explore Resources',
                    'button_url' => home_url('/resources/'),
                ),
            ),
        )),
    );
}
