<?php
/**
 * Search helpers and the canonical index of FAQs rendered by theme templates.
 *
 * WordPress cannot discover copy held in PHP arrays, so keeping that content in
 * one registry makes the on-page FAQs searchable without creating duplicate
 * posts in the dashboard.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_custom_faq_groups' ) ) {
    /**
     * Return every FAQ group owned by the theme.
     *
     * @return array<string, array<string, mixed>>
     */
    function rectify_custom_faq_groups() {
        return array(
            'homepage' => array(
                'title'         => __( 'General FAQs', 'rectify-custom' ),
                'path'          => '/',
                'anchor_prefix' => 'rx-home-faq-',
                'items'         => array(
                    array( 'question' => 'What causes wall cracks?', 'answer' => 'Wall cracks are often caused by foundation movement rather than problems with the walls themselves. In Australia, reactive clay soils can expand during wet periods and shrink during dry conditions, causing foundations to move. Other common causes include soil settlement, poor drainage, leaking pipes, tree roots, and natural building movement over time.' ),
                    array( 'question' => 'Can cracked walls be repaired?', 'answer' => 'Yes. The right repair depends on what caused the cracking. Where foundation movement is involved, the underlying ground or foundation should be stabilised before the wall is repaired cosmetically so the result is more reliable and long lasting.' ),
                    array( 'question' => 'What is foundation settlement?', 'answer' => 'Foundation settlement is the downward movement of a building foundation as the supporting soil compresses, shrinks, erodes, or loses strength. Uneven, or differential, settlement can lead to wall cracks, sticking doors and windows, and sloping floors.' ),
                    array( 'question' => 'How does polyurethane resin injection work?', 'answer' => 'Small access holes are drilled and expanding polyurethane resin is injected beneath the foundation or slab. The resin fills voids and strengthens weak ground; in suitable conditions, controlled injection can also gently lift and re-level settled concrete.' ),
                    array( 'question' => 'Is chemical underpinning permanent?', 'answer' => 'Chemical underpinning is designed as a long-term stabilisation solution when the cause of movement is correctly diagnosed and the treatment is suited to the site. Ongoing drainage, plumbing, and moisture issues should also be addressed to protect the result.' ),
                    array( 'question' => 'How much does foundation repair cost?', 'answer' => 'Foundation repair costs vary with the cause and extent of movement, the area requiring treatment, site access, and the repair method. A site assessment is needed before an accurate scope and quotation can be provided.' ),
                    array( 'question' => 'Can sinking concrete be lifted?', 'answer' => 'Often, yes. Slab lifting can inject expanding material beneath sunken concrete to fill voids, restore support, and carefully raise the slab. Suitability depends on the condition of the concrete and the ground beneath it.' ),
                    array( 'question' => 'What causes uneven floors?', 'answer' => 'Uneven floors can result from foundation settlement, changing soil moisture, poor drainage, leaking pipes, erosion, or movement in subfloor supports. An inspection helps distinguish structural movement from a local flooring or framing issue.' ),
                    array( 'question' => 'When should I repair foundation movement?', 'answer' => 'Arrange an assessment when cracks are widening, doors or windows begin sticking, floors become uneven, or gaps appear around walls and frames. Early investigation can limit further movement and help avoid more extensive repairs.' ),
                    array( 'question' => 'Is structural movement dangerous?', 'answer' => 'Structural movement is not always immediately dangerous, but progressive or significant movement can affect safety and building performance. Rapid changes, large cracks, leaning walls, or sudden floor movement should be assessed promptly by a qualified professional.' ),
                    array( 'question' => 'How long does underpinning take?', 'answer' => 'Many residential chemical underpinning projects can be completed within several days, while larger or more complex sites may take longer. The method, treatment area, access, and site conditions all affect the programme.' ),
                    array( 'question' => 'What is slab lifting?', 'answer' => 'Slab lifting is the controlled re-levelling of sunken concrete by injecting material beneath it. The process fills underlying voids, restores support, and raises the slab with less disruption than removing and replacing the concrete.' ),
                    array( 'question' => 'How do I know if my foundations are failing?', 'answer' => 'Common warning signs include new or widening wall cracks, sticking doors and windows, sloping or uneven floors, gaps around frames, and separation between walls, ceilings, or external features. A professional assessment is needed to confirm the cause.' ),
                ),
            ),
            'residential' => array(
                'title'         => __( 'Residential FAQs', 'rectify-custom' ),
                'path'          => '/resources/faq/residential/',
                'anchor_prefix' => 'rx-faq-answer-',
                'items'         => array(
                    array( 'question' => 'What are the signs my home may have a structural problem?', 'answer' => 'Common warning signs include cracks in walls or ceilings, doors and windows that jam or no longer close properly, sloping or bouncy floors, and gaps appearing around skirting boards or architraves. If you notice any of these, it\'s worth having a specialist assess the cause before it worsens.' ),
                    array( 'question' => 'Are cracks in my walls always serious?', 'answer' => 'Not every crack points to a structural issue, hairline cracks in plaster can be cosmetic and caused by normal settling. However, cracks that are wide, diagonal, growing over time, or paired with sticking doors and sloping floors usually indicate underlying foundation movement that should be assessed.' ),
                    array( 'question' => 'Can a sinking slab be repaired without rebuilding my home?', 'answer' => 'Yes. In most cases a sinking slab can be stabilised and re-levelled using techniques such as chemical underpinning, resin injection or void filling, without the need to demolish or rebuild. A site assessment determines the most suitable method for your property.' ),
                    array( 'question' => 'Will the problem continue to get worse if I do nothing?', 'answer' => 'Foundation movement rarely resolves on its own. Left untreated, ground instability typically continues, leading to wider cracking, worsening slopes and more costly repairs down the track. Early intervention is generally the most cost-effective approach.' ),
                    array( 'question' => 'How long does a residential stabilisation project take?', 'answer' => 'Most residential stabilisation works are completed within a few days to a couple of weeks, depending on the extent of the movement, the remediation method used and site access. Your specialist will provide a project timeframe as part of your assessment.' ),
                    array( 'question' => 'Will I need to move out during the works?', 'answer' => 'In the majority of cases, homeowners are able to remain in the property while works are carried out, as most stabilisation methods are low-disruption. Your project team will let you know in advance if any part of the process requires you to vacate the area.' ),
                    array( 'question' => 'Can structural movement affect my property\'s value?', 'answer' => 'Yes, unresolved cracking or foundation movement can affect a property\'s value and make it harder to sell or insure. Addressing the issue with a documented, professional remediation gives buyers and valuers confidence the underlying cause has been resolved.' ),
                    array( 'question' => 'What causes foundation movement?', 'answer' => 'Foundation movement is most commonly caused by reactive clay soils expanding and contracting with moisture changes, poor drainage, tree roots drawing moisture from the ground, leaking pipes, or inadequate original footings. A site assessment identifies the specific cause for your property.' ),
                ),
            ),
            'commercial' => array(
                'title'         => __( 'Commercial FAQs', 'rectify-custom' ),
                'path'          => '/resources/faq/commercial/',
                'anchor_prefix' => 'rx-faq-answer-',
                'items'         => array(
                    array( 'question' => 'What types of commercial properties does Rectify work on?', 'answer' => 'We work across office buildings, retail centres, warehouses, strata properties, industrial facilities, healthcare facilities, educational institutions, and government assets.' ),
                    array( 'question' => 'Can works be completed while our facility remains operational?', 'answer' => 'Yes. Our remediation methods are designed to be low-disruption, and works are typically scheduled and staged around your business hours, tenants and site traffic so operations can continue with minimal interruption.' ),
                    array( 'question' => 'How do structural issues affect commercial assets?', 'answer' => 'Unresolved structural movement can lead to cracking, uneven floors, jamming doors and, over time, more significant damage to the building envelope. Beyond the physical impact, it can disrupt operations, affect tenant safety and reduce asset value if left unaddressed.' ),
                    array( 'question' => 'Do you work with facility managers and strata managers?', 'answer' => 'Yes, we regularly partner with facility managers, strata managers and building owners to assess structural movement, plan remediation works and provide the documentation needed for reporting and compliance.' ),
                    array( 'question' => 'Can Rectify support insurance-related structural issues?', 'answer' => 'Yes. We can assess and document structural damage to support insurance claims, and work alongside insurers, loss assessors and building owners to deliver a remediation solution that meets claim requirements.' ),
                    array( 'question' => 'Why should commercial owners act early?', 'answer' => 'Acting early on structural movement typically limits the extent of damage, reduces the overall cost of remediation and minimises disruption to operations. Left unaddressed, ground instability tends to worsen, leading to more extensive and costly works down the track.' ),
                ),
            ),
            'our-process' => array(
                'title'         => __( 'Our Process FAQs', 'rectify-custom' ),
                'path'          => '/resources/faq/our-process/',
                'anchor_prefix' => 'rx-faq-answer-',
                'items'         => array(
                    array( 'question' => 'What happens when I contact Rectify?', 'answer' => 'Our team will discuss your concerns, review the symptoms, and determine the most appropriate next steps, which may include a site inspection or technical assessment.' ),
                    array( 'question' => 'What does a structural assessment involve?', 'answer' => 'A specialist visits your property to inspect the affected areas, review signs of movement such as cracking or sloping floors, and where needed take measurements or samples to identify the underlying cause.' ),
                    array( 'question' => 'Will I receive a detailed recommendation?', 'answer' => 'Yes. Following your assessment, we provide a written recommendation outlining the cause of the issue, the proposed remediation method, and an estimated cost and timeframe for the works.' ),
                    array( 'question' => 'How do you ensure quality outcomes?', 'answer' => 'Our teams follow established engineering methods, use quality-controlled materials, and carry out testing throughout the works to confirm the ground and structure are performing as expected.' ),
                    array( 'question' => 'Do you provide documentation and reporting?', 'answer' => 'Yes. We provide documentation covering the assessment findings, the works completed, and testing results, giving you a clear record for your own files, insurers or future reference.' ),
                    array( 'question' => 'What happens after the work is completed?', 'answer' => 'Once works are finished, our team reinstates the site, completes final checks and testing, and walks you through the outcome so you understand what was done and what to expect going forward.' ),
                    array( 'question' => 'What is Rectify\'s approach to structural issues?', 'answer' => 'We focus on identifying the root cause of the movement first, then apply the least disruptive, most cost-effective remediation method suited to your property, backed by over 50 years of combined industry experience.' ),
                ),
            ),
            'our-technology' => array(
                'title'         => __( 'Our Technology FAQs', 'rectify-custom' ),
                'path'          => '/resources/faq/our-technology/',
                'anchor_prefix' => 'rx-faq-answer-',
                'items'         => array(
                    array( 'question' => 'What is chemical underpinning?', 'answer' => 'Chemical underpinning involves injecting engineered materials beneath foundations to stabilise soils, fill voids, and improve ground performance, helping restore structural stability.' ),
                    array( 'question' => 'What is ground stabilisation?', 'answer' => 'Ground stabilisation is the process of strengthening weak, loose or reactive soils beneath a structure so they can reliably support the foundation, reducing the risk of further movement.' ),
                    array( 'question' => 'What is sand permeation?', 'answer' => 'Sand permeation is a grouting technique that fills the voids between loose, non-cohesive soils such as sand, increasing soil stiffness and controlling groundwater to prevent excavation failure and ground loss.' ),
                    array( 'question' => 'What is asset remediation?', 'answer' => 'Asset remediation covers the range of repair and stabilisation works carried out to restore a structure or piece of infrastructure to a safe, functional condition after damage from ground movement, water ingress or general deterioration.' ),
                    array( 'question' => 'Are your solutions invasive?', 'answer' => 'No. Our techniques are designed to be low-disruption and require minimal excavation compared to traditional methods, allowing works to be carried out with limited impact on your property or operations.' ),
                    array( 'question' => 'How do you determine the right solution?', 'answer' => 'Every project begins with a site assessment to understand the cause and extent of the movement, soil conditions and site access. From there, our specialists recommend the technique best suited to your property and budget.' ),
                ),
            ),
            'industries-we-serve' => array(
                'title'         => __( 'Industries We Serve FAQs', 'rectify-custom' ),
                'path'          => '/resources/faq/industries-we-serve/',
                'anchor_prefix' => 'rx-faq-answer-',
                'items'         => array(
                    array( 'question' => 'Does Rectify work on infrastructure projects?', 'answer' => 'Yes. Rectify provides ground engineering, stabilisation, and remediation solutions for infrastructure assets including roads, bridges, transport facilities, and public infrastructure.' ),
                    array( 'question' => 'Can Rectify support mining and industrial facilities?', 'answer' => 'Yes, we deliver ground stabilisation and asset remediation for mining and industrial sites, including plant foundations, processing facilities and heavy-load hardstand areas, with methods suited to demanding operational environments.' ),
                    array( 'question' => 'Do you work in marine environments?', 'answer' => 'Yes, our team has experience stabilising ground and structures around ports, wharves and other marine-adjacent assets, where soil conditions and exposure to water present additional challenges.' ),
                    array( 'question' => 'Can Rectify work on defence projects?', 'answer' => 'Yes, we support defence and other government-managed sites, working within the security, access and compliance requirements those projects require.' ),
                    array( 'question' => 'Do you partner with Tier 1 contractors?', 'answer' => 'Yes, we regularly work alongside Tier 1 contractors and head contractors as a specialist subcontractor, integrating our ground engineering and remediation works into larger construction and infrastructure programs.' ),
                    array( 'question' => 'Can you assist government asset owners?', 'answer' => 'Yes, we work with councils, state agencies and other government asset owners to assess and remediate structural movement across public buildings, infrastructure and community facilities.' ),
                ),
            ),
            'soil-stabilisation' => array(
                'title'         => __( 'Soil Stabilisation FAQs', 'rectify-custom' ),
                'path'          => '/soil-stabilisation/',
                'anchor_prefix' => 'rx-faq-answer-soil-',
                'items'         => array(
                    array( 'question' => 'Do I really need soil stabilisation for my property?', 'answer' => 'Soil stability is vital for your home\'s structural integrity. If you notice cracks or other signs of settling, it\'s likely that soil stabilisation could be beneficial.' ),
                    array( 'question' => 'What is the duration of the soil stabilisation process?', 'answer' => 'Generally, soil stabilisation projects range from a few days to several weeks, depending on the complexity of the job.' ),
                    array( 'question' => 'How much does soil stabilisation cost?', 'answer' => 'Each project is unique, and we provide detailed quotations after assessing the property. Rest assured, we aim to provide the most cost-effective solutions.' ),
                    array( 'question' => 'Is the process disruptive to my daily life?', 'answer' => 'Our modern methods are designed to be minimally invasive, meaning less disruption to your day-to-day activities.' ),
                    array( 'question' => 'Is the stabilised soil safe for landscaping and gardening?', 'answer' => 'Absolutely. Our environmentally friendly solutions ensure that your soil remains suitable for all types of landscaping and gardening projects.' ),
                ),
            ),
            'assessment' => array(
                'title'         => __( 'Assessment FAQs', 'rectify-custom' ),
                'path'          => '/assessment/',
                'anchor_prefix' => 'assessment-faq-',
                'items'         => array(
                    array( 'question' => 'Is this a fixed quotation?', 'answer' => 'The estimator provides an indicative project range. Your final quotation is prepared following a professional assessment.' ),
                    array( 'question' => 'Why can similar homes cost different amounts?', 'answer' => 'Every property has different soil conditions, foundation designs, access constraints and movement characteristics.' ),
                    array( 'question' => 'What happens after I submit my details?', 'answer' => 'One of our specialists reviews your information and contacts you to arrange the next steps.' ),
                    array( 'question' => 'Can most homes be stabilised without rebuilding?', 'answer' => 'In many cases, yes. Rectify\'s engineered chemical underpinning solutions stabilise foundations with minimal disruption compared with traditional underpinning methods.' ),
                    array( 'question' => 'How accurate is the estimator?', 'answer' => 'The estimator uses typical Rectify project data to provide an informed guide. Final pricing is confirmed following assessment.' ),
                    array( 'question' => 'How long do most projects take?', 'answer' => 'Most residential stabilisation projects are completed within a few days, depending on the size and complexity of the works.' ),
                ),
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_get_faq_group' ) ) {
    /**
     * Return one group's FAQ rows for rendering in a page template.
     *
     * @param string $key Registry key.
     * @return array<int, array<string, string>>
     */
    function rectify_custom_get_faq_group( $key ) {
        $groups = rectify_custom_faq_groups();
        return isset( $groups[ $key ]['items'] ) ? $groups[ $key ]['items'] : array();
    }
}

if ( ! function_exists( 'rectify_custom_search_normalize' ) ) {
    function rectify_custom_search_normalize( $value ) {
        $value = remove_accents( wp_strip_all_tags( (string) $value ) );
        return strtolower( trim( preg_replace( '/\s+/', ' ', $value ) ) );
    }
}

if ( ! function_exists( 'rectify_custom_search_score' ) ) {
    /**
     * Score a FAQ against the search phrase. Zero means no match.
     */
    function rectify_custom_search_score( $question, $answer, $group_title, $search_term ) {
        $needle = rectify_custom_search_normalize( $search_term );
        if ( '' === $needle ) {
            return 0;
        }

        $question = rectify_custom_search_normalize( $question );
        $answer   = rectify_custom_search_normalize( $answer );
        $group    = rectify_custom_search_normalize( $group_title );
        $score    = 0;

        if ( false !== strpos( $question, $needle ) ) {
            $score += 100;
        }
        if ( false !== strpos( $answer, $needle ) ) {
            $score += 35;
        }
        if ( false !== strpos( $group, $needle ) ) {
            $score += 15;
        }

        $words = array_values( array_filter( preg_split( '/[^a-z0-9]+/', $needle ) ) );
        foreach ( array_unique( $words ) as $word ) {
            if ( strlen( $word ) < 2 ) {
                continue;
            }
            if ( false !== strpos( $question, $word ) ) {
                $score += 12;
            } elseif ( false !== strpos( $answer, $word ) ) {
                $score += 4;
            } elseif ( false !== strpos( $group, $word ) ) {
                $score += 2;
            }
        }

        return $score;
    }
}

if ( ! function_exists( 'rectify_custom_get_dynamic_faqs' ) ) {
    /**
     * Add FAQs authored in ACF repeaters or native Details blocks.
     *
     * @return array<int, array<string, string>>
     */
    function rectify_custom_get_dynamic_faqs() {
        $results = array();
        $pages   = get_posts( array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'ID',
            'order'          => 'ASC',
        ) );

        foreach ( $pages as $page ) {
            if ( function_exists( 'get_field' ) ) {
                $rows = get_field( 'residential_faqs', $page->ID );
                if ( is_array( $rows ) ) {
                    foreach ( $rows as $index => $row ) {
                        $question = isset( $row['question'] ) ? $row['question'] : '';
                        $answer   = isset( $row['answer'] ) ? $row['answer'] : '';
                        if ( $question && $answer ) {
                            $results[] = array(
                                'question' => $question,
                                'answer'   => $answer,
                                'group'    => sprintf( __( '%s FAQs', 'rectify-custom' ), get_the_title( $page ) ),
                                'url'      => get_permalink( $page ) . '#faqs',
                            );
                        }
                    }
                }
            }

            if ( false !== stripos( $page->post_content, '<summary' ) && preg_match_all( '/<details\b[^>]*>\s*<summary\b[^>]*>(.*?)<\/summary>(.*?)<\/details>/is', $page->post_content, $matches, PREG_SET_ORDER ) ) {
                foreach ( $matches as $index => $match ) {
                    $question = trim( wp_strip_all_tags( $match[1] ) );
                    $answer   = trim( wp_strip_all_tags( $match[2] ) );
                    if ( $question && $answer ) {
                        $results[] = array(
                            'question' => $question,
                            'answer'   => $answer,
                            'group'    => sprintf( __( '%s FAQs', 'rectify-custom' ), get_the_title( $page ) ),
                            'url'      => get_permalink( $page ) . '#faqs',
                        );
                    }
                }
            }
        }

        return $results;
    }
}

if ( ! function_exists( 'rectify_custom_search_faqs' ) ) {
    /**
     * Search every FAQ source and return relevance-ordered rows.
     *
     * @param string $search_term Search phrase.
     * @return array<int, array<string, mixed>>
     */
    function rectify_custom_search_faqs( $search_term ) {
        $results = array();
        $seen    = array();

        foreach ( rectify_custom_faq_groups() as $group ) {
            foreach ( $group['items'] as $index => $item ) {
                $url   = home_url( $group['path'] ) . '#' . $group['anchor_prefix'] . $index;
                $score = rectify_custom_search_score( $item['question'], $item['answer'], $group['title'], $search_term );
                if ( $score > 0 ) {
                    $key          = md5( rectify_custom_search_normalize( $item['question'] ) . '|' . $url );
                    $seen[ $key ] = true;
                    $results[]    = array(
                        'question' => $item['question'],
                        'answer'   => $item['answer'],
                        'group'    => $group['title'],
                        'url'      => $url,
                        'score'    => $score,
                    );
                }
            }
        }

        foreach ( rectify_custom_get_dynamic_faqs() as $item ) {
            $key = md5( rectify_custom_search_normalize( $item['question'] ) . '|' . $item['url'] );
            if ( isset( $seen[ $key ] ) ) {
                continue;
            }
            $score = rectify_custom_search_score( $item['question'], $item['answer'], $item['group'], $search_term );
            if ( $score > 0 ) {
                $item['score'] = $score;
                $results[]     = $item;
            }
        }

        usort( $results, function ( $a, $b ) {
            return $b['score'] <=> $a['score'];
        } );

        return $results;
    }
}

if ( ! function_exists( 'rectify_custom_search_content_groups' ) ) {
    /**
     * Search only the secondary content types requested for the results page.
     *
     * @param string $search_term Search phrase.
     * @return array<string, array<int, WP_Post>>
     */
    function rectify_custom_search_content_groups( $search_term ) {
        $groups = array(
            'case-studies' => array(),
            'news'         => array(),
            'projects'     => array(),
            'posts'        => array(),
        );

        if ( '' === trim( $search_term ) ) {
            return $groups;
        }

        $query = new WP_Query( array(
            'post_type'           => array( 'rectify_article', 'our_project', 'post' ),
            'post_status'         => 'publish',
            'posts_per_page'      => 60,
            's'                   => $search_term,
            'ignore_sticky_posts' => true,
        ) );

        foreach ( $query->posts as $post ) {
            if ( 'our_project' === $post->post_type ) {
                $groups['projects'][] = $post;
                continue;
            }
            if ( 'post' === $post->post_type ) {
                $groups['posts'][] = $post;
                continue;
            }

            $top_slug = '';
            $terms    = get_the_terms( $post, 'article_category' );
            if ( is_array( $terms ) ) {
                foreach ( $terms as $term ) {
                    $top = $term->parent ? get_term( $term->parent, 'article_category' ) : $term;
                    if ( $top instanceof WP_Term ) {
                        $top_slug = $top->slug;
                        break;
                    }
                }
            }

            if ( 'case-studies' === $top_slug ) {
                $groups['case-studies'][] = $post;
            } else {
                $groups['news'][] = $post;
            }
        }

        return $groups;
    }
}

if ( ! function_exists( 'rectify_custom_empty_search_template' ) ) {
    /** Keep /?s= on the designed search screen instead of the posts index. */
    function rectify_custom_empty_search_template( $template ) {
        if ( isset( $_GET['s'] ) && '' === trim( wp_unslash( $_GET['s'] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
            $search_template = get_query_template( 'search' );
            if ( $search_template ) {
                return $search_template;
            }
        }
        return $template;
    }
}
add_filter( 'template_include', 'rectify_custom_empty_search_template', 99 );
