<?php
/**
 * Block type schema registry.
 *
 * Defines the 9 generic block types that map onto the ~17-18 hardcoded
 * homepage sections. This is intentionally a small, generic set rather than
 * one bespoke block per section - see rectify_pb_get_seed_blocks() for how
 * each section_key maps to one of these types.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Returns the full block-type schema.
 *
 * Each field entry has:
 *   - type:  one of text | richtext | url | image | icon-picker | repeater
 *   - label: human readable label for the admin UI
 *   - fields (repeater only): sub-field schema, same shape as this array
 *
 * @return array
 */
function rectify_pb_get_block_types()
{
    static $types = null;

    if ($types !== null) {
        return $types;
    }

    $types = array(
        'hero' => array(
            'label' => __('Hero', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
                'background_video_url' => array('type' => 'url', 'label' => __('Background Video URL', 'rectify-page-builder')),
                'background_poster_image' => array('type' => 'image', 'label' => __('Background Poster Image', 'rectify-page-builder')),
                'cta_primary_text' => array('type' => 'text', 'label' => __('Primary CTA Text', 'rectify-page-builder')),
                'cta_primary_url' => array('type' => 'url', 'label' => __('Primary CTA URL', 'rectify-page-builder')),
                'cta_secondary_text' => array('type' => 'text', 'label' => __('Secondary CTA Text', 'rectify-page-builder')),
                'cta_secondary_url' => array('type' => 'url', 'label' => __('Secondary CTA URL', 'rectify-page-builder')),
                'testimonial_quote' => array('type' => 'richtext', 'label' => __('Testimonial Quote', 'rectify-page-builder')),
                'testimonial_name' => array('type' => 'text', 'label' => __('Testimonial Name', 'rectify-page-builder')),
                'testimonial_meta' => array('type' => 'text', 'label' => __('Testimonial Meta (e.g. date)', 'rectify-page-builder')),
                'rating_text' => array('type' => 'text', 'label' => __('Rating Text', 'rectify-page-builder')),
                'review_count_text' => array('type' => 'text', 'label' => __('Review Count Text', 'rectify-page-builder')),
            ),
        ),

        'services-tabs' => array(
            'label' => __('Services (tabbed)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'tab1_label' => array('type' => 'text', 'label' => __('Tab 1 Label (e.g. residential)', 'rectify-page-builder')),
                'tab2_label' => array('type' => 'text', 'label' => __('Tab 2 Label (e.g. commercial)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Tab 1 Items', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Page Link (optional, makes the card clickable)', 'rectify-page-builder')),
                    ),
                ),
                'items_secondary' => array(
                    'type' => 'repeater',
                    'label' => __('Tab 2 Items', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Page Link (optional, makes the card clickable)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'feature-grid' => array(
            'label' => __('Feature Grid', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('Header CTA Text (optional)', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('Header CTA URL (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Items', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Image (used instead of icon for photo-based cards)', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text (optional)', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL (optional)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'feature-list' => array(
            'label' => __('Feature List', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('Header CTA Text (optional)', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('Header CTA URL (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Items', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'label' => array('type' => 'text', 'label' => __('Label', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'video-loop' => array(
            'label' => __('Video (looping)', 'rectify-page-builder'),
            'fields' => array(
                'video_url' => array('type' => 'url', 'label' => __('Video URL (mp4)', 'rectify-page-builder')),
                'poster_image' => array('type' => 'image', 'label' => __('Poster Image (optional, shown before the video loads)', 'rectify-page-builder')),
            ),
        ),

        'image-slider' => array(
            'label' => __('Image Slider', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'slides' => array(
                    'type' => 'repeater',
                    'label' => __('Slides', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'caption' => array('type' => 'text', 'label' => __('Caption', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'logo-slider' => array(
            'label' => __('Logo Slider', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'logos' => array(
                    'type' => 'repeater',
                    'label' => __('Logos', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Logo Image', 'rectify-page-builder')),
                        'alt' => array('type' => 'text', 'label' => __('Alt Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'accordion' => array(
            'label' => __('Accordion', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Left Column Image', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Items', 'rectify-page-builder'),
                    'fields' => array(
                        'question' => array('type' => 'text', 'label' => __('Question', 'rectify-page-builder')),
                        'answer' => array('type' => 'richtext', 'label' => __('Answer', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'homepage-faq' => array(
            'label' => __('Homepage FAQ', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Questions and Answers', 'rectify-page-builder'),
                    'fields' => array(
                        'question' => array('type' => 'text', 'label' => __('Question', 'rectify-page-builder')),
                        'answer' => array('type' => 'richtext', 'label' => __('Answer', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'image-text' => array(
            'label' => __('Image + Text', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('CTA Text', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('CTA URL', 'rectify-page-builder')),
            ),
        ),

        'cta' => array(
            'label' => __('Call To Action', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'button_text' => array('type' => 'text', 'label' => __('Button Text', 'rectify-page-builder')),
                'button_url' => array('type' => 'url', 'label' => __('Button URL', 'rectify-page-builder')),
                'phone_number' => array('type' => 'text', 'label' => __('Phone Number', 'rectify-page-builder')),
            ),
        ),

        'residential-hero' => array(
            'label' => __('Residential Hero', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Supporting Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Strip Image', 'rectify-page-builder')),
            ),
        ),

        'residential-intro' => array(
            'label' => __('Residential Intro', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'residential-solutions-grid' => array(
            'label' => __('Residential Solutions Grid', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Solution Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'point_title' => array('type' => 'text', 'label' => __('Points List Title (optional)', 'rectify-page-builder')),
                        'points_text' => array('type' => 'richtext', 'label' => __('Points (one per line)', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'residential-why' => array(
            'label' => __('Residential Why Choose', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-help' => array(
            'label' => __('Commercial Solutions: Need Help Choosing', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Intro Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Help Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                        'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                        'phone_url' => array('type' => 'url', 'label' => __('Phone URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'residential-cta' => array(
            'label' => __('Residential CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Pill Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone Pill URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Pill Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email Pill URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'ground-hero' => array(
            'label' => __('Ground Improvement: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_current' => array('type' => 'text', 'label' => __('Current Breadcrumb Label', 'rectify-page-builder')),
            ),
        ),

        'ground-intro' => array(
            'label' => __('Ground Improvement: Introduction', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
            ),
        ),

        'ground-required' => array(
            'label' => __('Ground Improvement: When Required', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Reasons', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ground-projects' => array(
            'label' => __('Ground Improvement: Projects & Applications', 'rectify-page-builder'),
            'fields' => array(
                'image_1' => array('type' => 'image', 'label' => __('Image 1', 'rectify-page-builder')),
                'image_2' => array('type' => 'image', 'label' => __('Image 2', 'rectify-page-builder')),
                'image_3' => array('type' => 'image', 'label' => __('Image 3', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'applications_heading' => array('type' => 'text', 'label' => __('Applications Heading', 'rectify-page-builder')),
                'applications' => array('type' => 'richtext', 'label' => __('Applications (one per line)', 'rectify-page-builder')),
            ),
        ),

        'ground-why' => array(
            'label' => __('Ground Improvement: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ground-cta' => array(
            'label' => __('Ground Improvement: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL', 'rectify-page-builder')),
            ),
        ),

        'solutions-child-hero' => array(
            'label' => __('Solutions Child Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
            ),
        ),

        'solutions-intro-band' => array(
            'label' => __('Solutions Intro Band', 'rectify-page-builder'),
            'fields' => array(
                'lede' => array('type' => 'text', 'label' => __('Lede (bold intro line, optional)', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'related_label' => array('type' => 'text', 'label' => __('Related Link Label (optional)', 'rectify-page-builder')),
                'related_text' => array('type' => 'text', 'label' => __('Related Link Text', 'rectify-page-builder')),
                'related_url' => array('type' => 'url', 'label' => __('Related Link URL', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'civil-where-help' => array(
            'label' => __('Civil: Where We Help', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'items_text' => array('type' => 'richtext', 'label' => __('List Items (one per line)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'undermining-causes' => array(
            'label' => __('Undermining: Causes Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Items', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'hospital-feature-grid' => array(
            'label' => __('Hospital: Feature Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'icon' => array('type' => 'icon-picker', 'label' => __('Icon (used for every card)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'hospital-where-help' => array(
            'label' => __('Hospital: Where We Help', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'related_text' => array('type' => 'richtext', 'label' => __('Related Services (one "Label|||URL" per line)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solutions-media-list' => array(
            'label' => __('Solutions Media + List', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'list_text' => array('type' => 'richtext', 'label' => __('List (one per line)', 'rectify-page-builder')),
                'list_text_col2' => array('type' => 'richtext', 'label' => __('Second Column List (optional, one per line)', 'rectify-page-builder')),
                'related_label' => array('type' => 'text', 'label' => __('Related Label (optional)', 'rectify-page-builder')),
                'related_text' => array('type' => 'richtext', 'label' => __('Related Links (one "Label|||URL" per line, optional)', 'rectify-page-builder')),
            ),
        ),

        'solutions-process' => array(
            'label' => __('Solutions Process Steps', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'points_text' => array('type' => 'richtext', 'label' => __('Points (one per line; use "Title|||Description" for a titled sub-point)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'civil-capabilities' => array(
            'label' => __('Civil: Core Capabilities', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Capability Rows', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'symptoms_label' => array('type' => 'text', 'label' => __('Symptoms Label (optional)', 'rectify-page-builder')),
                        'symptoms' => array('type' => 'richtext', 'label' => __('Symptoms Text (optional)', 'rectify-page-builder')),
                        'steps_text' => array('type' => 'richtext', 'label' => __('"What We Do" Steps (one per line)', 'rectify-page-builder')),
                        'tags_label' => array('type' => 'text', 'label' => __('Tags Label (optional)', 'rectify-page-builder')),
                        'tags_text' => array('type' => 'richtext', 'label' => __('Tags (one per line, optional)', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solutions-benefits' => array(
            'label' => __('Solutions Benefits', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Items', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solutions-notes' => array(
            'label' => __('Solutions Two-Column Notes', 'rectify-page-builder'),
            'fields' => array(
                'col1_heading' => array('type' => 'text', 'label' => __('Column 1 Heading', 'rectify-page-builder')),
                'col1_copy' => array('type' => 'richtext', 'label' => __('Column 1 Copy', 'rectify-page-builder')),
                'col2_heading' => array('type' => 'text', 'label' => __('Column 2 Heading', 'rectify-page-builder')),
                'col2_copy' => array('type' => 'richtext', 'label' => __('Column 2 Copy', 'rectify-page-builder')),
                'finish_heading' => array('type' => 'text', 'label' => __('Finish Matters Heading (optional)', 'rectify-page-builder')),
                'finish_copy' => array('type' => 'richtext', 'label' => __('Finish Matters First Column (optional)', 'rectify-page-builder')),
                'finish_copy_col2' => array('type' => 'richtext', 'label' => __('Finish Matters Second Column (optional)', 'rectify-page-builder')),
            ),
        ),

        'raw-map' => array(
            'label' => __('Map (unmanaged placeholder)', 'rectify-page-builder'),
            'fields' => array(),
        ),

        'solution-hero' => array(
            'label' => __('Solution Page: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Paragraphs (optional, shown directly in the hero)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (optional, switches to a two-column hero)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label (defaults to "Residential Solutions")', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL (defaults to /residential/)', 'rectify-page-builder')),
            ),
        ),

        'solution-band' => array(
            'label' => __('Solution Page: Two-Column Band', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker (optional)', 'rectify-page-builder')),
                'full_width' => array('type' => 'text', 'label' => __('Full Width, No Image Column ("yes" to enable)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (optional, paragraphs)', 'rectify-page-builder')),
                'body_list' => array('type' => 'richtext', 'label' => __('Body Bullet List (optional, one per line; shown after body copy)', 'rectify-page-builder')),
                'benefits_label' => array('type' => 'text', 'label' => __('Checklist Label (optional, shown above the checklist items, e.g. "Typical Symptoms")', 'rectify-page-builder')),
                'body_benefits' => array(
                    'type' => 'repeater',
                    'label' => __('Body Checklist Items (optional, replaces body copy/list if set)', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
                'image' => array('type' => 'image', 'label' => __('Image (single, ignored if Image Grid below is set)', 'rectify-page-builder')),
                'image_grid' => array(
                    'type' => 'repeater',
                    'label' => __('Image Grid (optional, replaces the single Image with a captioned photo grid)', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'caption' => array('type' => 'text', 'label' => __('Caption (optional)', 'rectify-page-builder')),
                    ),
                ),
                'media_position' => array('type' => 'text', 'label' => __('Media Position ("first" or "last")', 'rectify-page-builder')),
                'soft' => array('type' => 'text', 'label' => __('Alternate Background ("yes" to enable)', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('Primary CTA Button Text (optional)', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('Primary CTA Button URL (optional)', 'rectify-page-builder')),
                'related_label' => array('type' => 'text', 'label' => __('Related Links Label (optional)', 'rectify-page-builder')),
                'related_links' => array(
                    'type' => 'repeater',
                    'label' => __('Related Links (optional)', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solution-photo-grid' => array(
            'label' => __('Solution Page: Captioned Photo Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading (optional)', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph (optional)', 'rectify-page-builder')),
                'soft' => array('type' => 'text', 'label' => __('Alternate Background ("yes" to enable)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Photos', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'caption' => array('type' => 'text', 'label' => __('Caption (optional)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solution-icon-grid' => array(
            'label' => __('Solution Page: Icon Card Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'dark' => array('type' => 'text', 'label' => __('Dark Contour Background ("yes" to enable)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solution-process-steps' => array(
            'label' => __('Solution Page: Process Steps', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraphs (optional, shown before the grid)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (optional, shown above the grid)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'related_label' => array('type' => 'text', 'label' => __('Related Link Label (optional)', 'rectify-page-builder')),
                        'related_text' => array('type' => 'text', 'label' => __('Related Link Text (optional)', 'rectify-page-builder')),
                        'related_url' => array('type' => 'url', 'label' => __('Related Link URL (optional)', 'rectify-page-builder')),
                    ),
                ),
                'note' => array('type' => 'richtext', 'label' => __('Note Paragraph (optional, shown after the grid)', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('Primary CTA Button Text (optional)', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('Primary CTA Button URL (optional)', 'rectify-page-builder')),
            ),
        ),

        'solution-notes' => array(
            'label' => __('Solution Page: Two-Column Notes', 'rectify-page-builder'),
            'fields' => array(
                'col1_heading' => array('type' => 'text', 'label' => __('Column 1 Heading', 'rectify-page-builder')),
                'col1_copy' => array('type' => 'richtext', 'label' => __('Column 1 Copy (one paragraph per line)', 'rectify-page-builder')),
                'col2_heading' => array('type' => 'text', 'label' => __('Column 2 Heading', 'rectify-page-builder')),
                'col2_copy' => array('type' => 'richtext', 'label' => __('Column 2 Copy (one paragraph per line)', 'rectify-page-builder')),
                'small_notes' => array(
                    'type' => 'repeater',
                    'label' => __('Small Sub-Notes (optional, shown under column 2)', 'rectify-page-builder'),
                    'fields' => array(
                        'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                        'copy' => array('type' => 'richtext', 'label' => __('Copy (one paragraph per line)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'solution-cta' => array(
            'label' => __('Solution Page: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'commercial-inner-banner' => array(
            'label' => __('Commercial Inner Page: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Parent Breadcrumb Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Parent Breadcrumb URL', 'rectify-page-builder')),
                'current_label' => array('type' => 'text', 'label' => __('Current Breadcrumb Label', 'rectify-page-builder')),
            ),
        ),

        'commercial-inner-intro' => array(
            'label' => __('Commercial Inner Page: Intro', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'commercial-void-causes' => array(
            'label' => __('Commercial Void Filling: Causes Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-void-process' => array(
            'label' => __('Commercial Void Filling: Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Process Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'options_heading' => array('type' => 'text', 'label' => __('Options Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Void Filling Options', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-slab-causes' => array(
            'label' => __('Commercial Slab Lifting: Settlement Causes', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items_heading' => array('type' => 'text', 'label' => __('Cards Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Settlement Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-slab-process' => array(
            'label' => __('Commercial Slab Lifting: Engineered Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Process Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'options_heading' => array('type' => 'text', 'label' => __('Benefits Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Process Benefits', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-engineered-required' => array(
            'label' => __('Commercial Engineered Fill: Required Conditions', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Required Condition Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-engineered-comparison' => array(
            'label' => __('Commercial Engineered Fill: Backfill Comparison', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Engineered Fill Benefits', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-engineered-applications' => array(
            'label' => __('Commercial Engineered Fill: Applications', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Application Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-engineered-process' => array(
            'label' => __('Commercial Engineered Fill: Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Process Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-leak-causes' => array(
            'label' => __('Commercial Leak Sealing: Causes Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-leak-types' => array(
            'label' => __('Commercial Leak Sealing: Types of Leaks', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'list_heading' => array('type' => 'text', 'label' => __('List Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Structures Requiring Leak Sealing', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('List Item', 'rectify-page-builder')),
                    ),
                ),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'commercial-leak-scenarios' => array(
            'label' => __('Commercial Leak Sealing: Repair Scenarios', 'rectify-page-builder'),
            'fields' => array(
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Scenarios', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Scenario Title', 'rectify-page-builder')),
                        'intro' => array('type' => 'richtext', 'label' => __('Scenario Introduction', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Scenario Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'conventional_heading' => array('type' => 'text', 'label' => __('Conventional Method Heading', 'rectify-page-builder')),
                        'conventional_copy' => array('type' => 'richtext', 'label' => __('Conventional Method Copy', 'rectify-page-builder')),
                        'secondary_heading' => array('type' => 'text', 'label' => __('Secondary Method Heading (optional)', 'rectify-page-builder')),
                        'secondary_copy' => array('type' => 'richtext', 'label' => __('Secondary Method Copy (optional)', 'rectify-page-builder')),
                        'solution_heading' => array('type' => 'text', 'label' => __('Rectify Solution Heading', 'rectify-page-builder')),
                        'solution_copy' => array('type' => 'richtext', 'label' => __('Rectify Solution Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-leak-diagnostics' => array(
            'label' => __('Commercial Leak Sealing: Before and After Diagnostics', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'before_image' => array('type' => 'image', 'label' => __('Before Diagnostic Image', 'rectify-page-builder')),
                'before_label' => array('type' => 'text', 'label' => __('Before Label', 'rectify-page-builder')),
                'after_image' => array('type' => 'image', 'label' => __('After Diagnostic Image', 'rectify-page-builder')),
                'after_label' => array('type' => 'text', 'label' => __('After Label', 'rectify-page-builder')),
            ),
        ),

        'commercial-realignment-causes' => array(
            'label' => __('Commercial Realignment: Causes Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-realignment-feature' => array(
            'label' => __('Commercial Realignment: Split Feature Band', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'commercial-realignment-impact' => array(
            'label' => __('Commercial Realignment: Operational Warning Signs', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'note_heading' => array('type' => 'text', 'label' => __('Ground Instability Heading', 'rectify-page-builder')),
                'note_body' => array('type' => 'richtext', 'label' => __('Ground Instability Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Warning Sign Photos', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'caption' => array('type' => 'text', 'label' => __('Caption', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-realignment-process' => array(
            'label' => __('Commercial Realignment: Re-levelling Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'approach_heading' => array('type' => 'text', 'label' => __('Approach Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Approach Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Process Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-realignment-industries' => array(
            'label' => __('Commercial Realignment: Industries', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'map_image' => array('type' => 'image', 'label' => __('Australia Map Image', 'rectify-page-builder')),
                'map_image_alt' => array('type' => 'text', 'label' => __('Australia Map Alt Text', 'rectify-page-builder')),
                'list_heading' => array('type' => 'text', 'label' => __('List Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Industries', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Industry Name', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-protective-causes' => array(
            'label' => __('Commercial Protective Coatings: Deterioration Causes', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-protective-solutions' => array(
            'label' => __('Commercial Protective Coatings: Coating & Relining Solutions', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Section Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Section Lead', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Solution Rows', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'options_heading' => array('type' => 'text', 'label' => __('Options Heading (optional)', 'rectify-page-builder')),
                        'option_1_title' => array('type' => 'text', 'label' => __('Option 1 Title (optional)', 'rectify-page-builder')),
                        'option_1_copy' => array('type' => 'richtext', 'label' => __('Option 1 Copy (optional)', 'rectify-page-builder')),
                        'option_2_title' => array('type' => 'text', 'label' => __('Option 2 Title (optional)', 'rectify-page-builder')),
                        'option_2_copy' => array('type' => 'richtext', 'label' => __('Option 2 Copy (optional)', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                        'image_position' => array('type' => 'text', 'label' => __('Image Position ("first" or "last")', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-protective-feature' => array(
            'label' => __('Commercial Protective Coatings: Concrete Repair Feature', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'commercial-protective-repairs' => array(
            'label' => __('Commercial Protective Coatings: Specialist Repairs', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Repair Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Card Title', 'rectify-page-builder')),
                        'item_1_title' => array('type' => 'text', 'label' => __('First Repair Title', 'rectify-page-builder')),
                        'item_1_copy' => array('type' => 'richtext', 'label' => __('First Repair Copy', 'rectify-page-builder')),
                        'item_2_title' => array('type' => 'text', 'label' => __('Second Repair Title (optional)', 'rectify-page-builder')),
                        'item_2_copy' => array('type' => 'richtext', 'label' => __('Second Repair Copy (optional)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-inner-why-cards' => array(
            'label' => __('Commercial Inner Page: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Icon Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'commercial-inner-cta' => array(
            'label' => __('Commercial Inner Page: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'chemical-hero' => array(
            'label' => __('Chemical: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
            ),
        ),

        'chemical-what' => array(
            'label' => __('Chemical: Overview', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Left Heading', 'rectify-page-builder')),
                'image_1' => array('type' => 'image', 'label' => __('Left Image 1', 'rectify-page-builder')),
                'image_2' => array('type' => 'image', 'label' => __('Left Image 2', 'rectify-page-builder')),
                'engineering_heading' => array('type' => 'text', 'label' => __('Right Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Right Copy (paragraphs)', 'rectify-page-builder')),
                'points_title' => array('type' => 'text', 'label' => __('Points List Title', 'rectify-page-builder')),
                'points_text' => array('type' => 'richtext', 'label' => __('Points (one per line)', 'rectify-page-builder')),
                'note' => array('type' => 'richtext', 'label' => __('Closing Note', 'rectify-page-builder')),
            ),
        ),

        'chemical-engineering' => array(
            'label' => __('Chemical: Engineering The Ground', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'points_title' => array('type' => 'text', 'label' => __('Points List Title', 'rectify-page-builder')),
                'points_text' => array('type' => 'richtext', 'label' => __('Points (one per line)', 'rectify-page-builder')),
                'note' => array('type' => 'richtext', 'label' => __('Closing Note', 'rectify-page-builder')),
            ),
        ),

        'chemical-signs' => array(
            'label' => __('Chemical: Common Signs Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Sign Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                    ),
                ),
                'note' => array('type' => 'richtext', 'label' => __('Closing Note', 'rectify-page-builder')),
            ),
        ),

        'chemical-uses' => array(
            'label' => __('Chemical: Uses List', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Rows', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'chemical-why' => array(
            'label' => __('Chemical: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'chemical-process' => array(
            'label' => __('Chemical: Process Steps', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'chemical-causes' => array(
            'label' => __('Chemical: Causes Of Damage', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Causes', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Related Image (optional)', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'chemical-cta' => array(
            'label' => __('Chemical: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image (optional)', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'sand-hero' => array(
            'label' => __('Sand Permeation: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
            ),
        ),

        'sand-intro' => array(
            'label' => __('Sand Permeation: Intro', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'related_label' => array('type' => 'text', 'label' => __('Related Service Label', 'rectify-page-builder')),
                'related_text' => array('type' => 'text', 'label' => __('Related Service Link Text', 'rectify-page-builder')),
                'related_url' => array('type' => 'url', 'label' => __('Related Service Link URL', 'rectify-page-builder')),
            ),
        ),

        'sand-risk' => array(
            'label' => __('Sand Permeation: Why Non-Cohesive Soils Create Risk', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'sand-scenarios' => array(
            'label' => __('Sand Permeation: Typical Scenarios & Examples', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'sand-process' => array(
            'label' => __('Sand Permeation: How Sand-Permeation Works', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'sand-benefits' => array(
            'label' => __('Sand Permeation: Benefits', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Benefits', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'sand-notes' => array(
            'label' => __('Sand Permeation: Limitations & Cost', 'rectify-page-builder'),
            'fields' => array(
                'col1_heading' => array('type' => 'text', 'label' => __('Column 1 Heading', 'rectify-page-builder')),
                'col1_copy' => array('type' => 'richtext', 'label' => __('Column 1 Copy', 'rectify-page-builder')),
                'col2_heading' => array('type' => 'text', 'label' => __('Column 2 Heading', 'rectify-page-builder')),
                'col2_copy' => array('type' => 'richtext', 'label' => __('Column 2 Copy', 'rectify-page-builder')),
            ),
        ),

        'sand-why' => array(
            'label' => __('Sand Permeation: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'sand-cta' => array(
            'label' => __('Sand Permeation: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'brick-hero' => array(
            'label' => __('Brick: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_parent_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label', 'rectify-page-builder')),
                'breadcrumb_parent_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL', 'rectify-page-builder')),
                'breadcrumb_current' => array('type' => 'text', 'label' => __('Breadcrumb Current Label', 'rectify-page-builder')),
            ),
        ),

        'brick-band' => array(
            'label' => __('Brick: Two-Column Band', 'rectify-page-builder'),
            'fields' => array(
                'variant' => array('type' => 'text', 'label' => __('Variant ("intro", "causes", "benefits", "issues" or "considerations")', 'rectify-page-builder')),
                'label' => array('type' => 'text', 'label' => __('Small Label (optional, e.g. "IMPORTANT CONSIDERATIONS:")', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy (optional, paragraphs — used by "intro" and "considerations")', 'rectify-page-builder')),
                'list_text' => array('type' => 'richtext', 'label' => __('Arrow Bullet List (optional, one per line — used by "issues")', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items (optional — used by "causes" and "benefits")', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'media_position' => array('type' => 'text', 'label' => __('Media Position ("first" or "last")', 'rectify-page-builder')),
                'related_label' => array('type' => 'text', 'label' => __('Related Link Label (optional)', 'rectify-page-builder')),
                'related_text' => array('type' => 'text', 'label' => __('Related Link Text (optional)', 'rectify-page-builder')),
                'related_url' => array('type' => 'url', 'label' => __('Related Link URL (optional)', 'rectify-page-builder')),
            ),
        ),

        'brick-grid' => array(
            'label' => __('Brick: Why Choose Rectify Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'variant' => array('type' => 'text', 'label' => __('Variant ("why", legacy: "causes" or "benefits")', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon (optional)', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'brick-media-grid' => array(
            'label' => __('Brick: Image Card Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'brick-process' => array(
            'label' => __('Brick: Process Steps', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'related_label' => array('type' => 'text', 'label' => __('Related Link Label (optional)', 'rectify-page-builder')),
                        'related_text' => array('type' => 'text', 'label' => __('Related Link Text (optional)', 'rectify-page-builder')),
                        'related_url' => array('type' => 'url', 'label' => __('Related Link URL (optional)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'brick-cta' => array(
            'label' => __('Brick: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'cracked-hero' => array(
            'label' => __('Cracked-style: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Label', 'rectify-page-builder')),
            ),
        ),

        'cracked-band' => array(
            'label' => __('Cracked-style: Two-Column Band', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy (one paragraph per line)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'media_position' => array('type' => 'text', 'label' => __('Media Position ("first" or "last")', 'rectify-page-builder')),
                'pin' => array('type' => 'text', 'label' => __('Show Red Pin On Image ("yes" to enable)', 'rectify-page-builder')),
                'soft' => array('type' => 'text', 'label' => __('Alternate Background ("yes" to enable)', 'rectify-page-builder')),
                'flip' => array('type' => 'text', 'label' => __('Swap Columns Visually ("yes" to enable; keeps the copy style of the chosen Media Position)', 'rectify-page-builder')),
            ),
        ),

        'cracked-whatis' => array(
            'label' => __('Cracked-style: What Is It (navy band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
            ),
        ),

        'cracked-causes' => array(
            'label' => __('Cracked-style: Causes Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Photo (used instead of the icon for photo-based cards)', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cracked-process' => array(
            'label' => __('Cracked-style: Numbered Process Steps', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Number (e.g. 01)', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cracked-advantage' => array(
            'label' => __('Cracked-style: Why Homeowners Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cracked-performance' => array(
            'label' => __('Cracked-style: Performance Verified (before/after)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'before_image' => array('type' => 'image', 'label' => __('Before Image', 'rectify-page-builder')),
                'after_image' => array('type' => 'image', 'label' => __('After Image', 'rectify-page-builder')),
            ),
        ),

        'cracked-help' => array(
            'label' => __('Cracked-style: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
            ),
        ),

        'foundation-banner' => array(
            'label' => __('Foundation Stabilisation: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Label', 'rectify-page-builder')),
            ),
        ),

        'foundation-intro' => array(
            'label' => __('Foundation Stabilisation: Introduction', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'foundation-overview' => array(
            'label' => __('Foundation Stabilisation: Overview & Warning Signs', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'signs_heading' => array('type' => 'text', 'label' => __('Warning Signs Heading', 'rectify-page-builder')),
                'signs' => array(
                    'type' => 'repeater',
                    'label' => __('Warning Signs', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'foundation-solutions' => array(
            'label' => __('Foundation Stabilisation: Solutions', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Feature Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Feature Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Solutions', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'foundation-causes-table' => array(
            'label' => __('Foundation Stabilisation: Movement Causes Table', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Rows', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Cause', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('How It Affects The Home', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'foundation-why' => array(
            'label' => __('Foundation Stabilisation: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'foundation-cta' => array(
            'label' => __('Foundation Stabilisation: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL', 'rectify-page-builder')),
            ),
        ),

        'faq-hero' => array(
            'label' => __('FAQ: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Paragraph', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Category Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Category Link URL', 'rectify-page-builder')),
            ),
        ),

        'faq-banner' => array(
            'label' => __('FAQ: Full-Width Banner Image', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'faq-list' => array(
            'label' => __('FAQ: Question List', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Questions', 'rectify-page-builder'),
                    'fields' => array(
                        'question' => array('type' => 'text', 'label' => __('Question', 'rectify-page-builder')),
                        'answer' => array('type' => 'richtext', 'label' => __('Answer', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'faq-cta' => array(
            'label' => __('FAQ: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
            ),
        ),

        'contact-hero' => array(
            'label' => __('Contact: Hero', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
            ),
        ),

        'contact-offices' => array(
            'label' => __('Contact: Office Locations', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Offices', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Office Name', 'rectify-page-builder')),
                        'copy' => array('type' => 'text', 'label' => __('Address', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Map Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'contact-form' => array(
            'label' => __('Contact: Form + Details', 'rectify-page-builder'),
            'fields' => array(
                'form_shortcode' => array('type' => 'embed', 'label' => __('Form Shortcode or Embed Code (accepts a [shortcode] or a pasted provider snippet, e.g. HubSpot)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Number', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Address', 'rectify-page-builder')),
            ),
        ),

        'assessment-title' => array(
            'label' => __('Assessment: Title Band (kicker / H1 / breadcrumb)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Label', 'rectify-page-builder')),
            ),
        ),

        'assessment-hero' => array(
            'label' => __('Assessment: Hero Copy', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading (H2, below the page title)', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Paragraph', 'rectify-page-builder')),
                'checklist' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Item Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'assessment-card-grid' => array(
            'label' => __('Assessment: Card Grid (investment / examples)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Card Title', 'rectify-page-builder')),
                        'price_prefix' => array('type' => 'text', 'label' => __('Price Prefix (e.g. "From" / "Indicative investment")', 'rectify-page-builder')),
                        'price' => array('type' => 'text', 'label' => __('Price (large red figure, e.g. "$600–$1,200")', 'rectify-page-builder')),
                        'price_suffix' => array('type' => 'text', 'label' => __('Price Suffix (e.g. "per linear metre")', 'rectify-page-builder')),
                        'list_label' => array('type' => 'text', 'label' => __('List Label (e.g. "Typical applications")', 'rectify-page-builder')),
                        'price_line' => array('type' => 'text', 'label' => __('Legacy Price Line (used only when the Price field above is empty)', 'rectify-page-builder')),
                        'list_html' => array('type' => 'richtext', 'label' => __('Bullet List (HTML, e.g. <ul><li>...)', 'rectify-page-builder')),
                        'footer_note' => array('type' => 'richtext', 'label' => __('Footer Note (e.g. "Best for: ...")', 'rectify-page-builder')),
                    ),
                ),
                'footnote' => array('type' => 'richtext', 'label' => __('Section Footnote (shown under the grid, optional)', 'rectify-page-builder')),
            ),
        ),

        'assessment-image-checklists' => array(
            'label' => __('Assessment: Image + Two Checklists', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Paragraph', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'list1_heading' => array('type' => 'text', 'label' => __('List 1 Heading', 'rectify-page-builder')),
                'list1_items' => array('type' => 'richtext', 'label' => __('List 1 Items (HTML, e.g. <ul><li>...)', 'rectify-page-builder')),
                'list2_heading' => array('type' => 'text', 'label' => __('List 2 Heading', 'rectify-page-builder')),
                'list2_items' => array('type' => 'richtext', 'label' => __('List 2 Items (HTML, e.g. <ul><li>...)', 'rectify-page-builder')),
                'footnote' => array('type' => 'text', 'label' => __('Footnote', 'rectify-page-builder')),
            ),
        ),

        'assessment-cta' => array(
            'label' => __('Assessment: Final CTA Banner', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'button_text' => array('type' => 'text', 'label' => __('Button Text', 'rectify-page-builder')),
                'button_url' => array('type' => 'url', 'label' => __('Button URL', 'rectify-page-builder')),
            ),
        ),

        'warranty-hero' => array(
            'label' => __('Warranty: Page Header + Hero', 'rectify-page-builder'),
            'fields' => array(
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'statement' => array('type' => 'richtext', 'label' => __('Hero Statement', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Hero Image', 'rectify-page-builder')),
            ),
        ),

        'warranty-periods' => array(
            'label' => __('Warranty: Warranty Periods', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Warranty Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Property Type', 'rectify-page-builder')),
                        'period' => array('type' => 'text', 'label' => __('Warranty Period', 'rectify-page-builder')),
                        'warranty_type' => array('type' => 'text', 'label' => __('Warranty Type', 'rectify-page-builder')),
                        'covers' => array('type' => 'richtext', 'label' => __('Coverage Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'warranty-terms' => array(
            'label' => __('Warranty: Terms + Image', 'rectify-page-builder'),
            'fields' => array(
                'copy' => array('type' => 'richtext', 'label' => __('Warranty Terms', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'quotation-form' => array(
            'label' => __('Quotation: Intro + Form', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'form_heading' => array('type' => 'text', 'label' => __('Form Heading', 'rectify-page-builder')),
                'form_shortcode' => array('type' => 'embed', 'label' => __('Form Shortcode or Embed Code (accepts a [shortcode] or a pasted provider snippet, e.g. HubSpot)', 'rectify-page-builder')),
            ),
        ),

        // A structured alternative to pasting HubSpot's raw <script> snippet
        // into an 'embed' field: stores only the three values that vary and
        // rebuilds the snippet at render time, so nothing executable is kept
        // in postmeta and no `unfiltered_html` capability is needed. See
        // includes/class-hubspot.php.
        'hubspot-form' => array(
            'label' => __('HubSpot Form', 'rectify-page-builder'),
            'fields' => array(
                'eyebrow' => array('type' => 'text', 'label' => __('Eyebrow', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Copy', 'rectify-page-builder')),
                'form_heading' => array('type' => 'text', 'label' => __('Form Heading (inside the card)', 'rectify-page-builder')),
                'portal_id' => array('type' => 'text', 'label' => __('HubSpot Portal ID (leave blank for the Rectify default)', 'rectify-page-builder')),
                'form_id' => array('type' => 'text', 'label' => __('HubSpot Form ID (leave blank for the Rectify default)', 'rectify-page-builder')),
                'region' => array('type' => 'text', 'label' => __('HubSpot Region (e.g. ap1 - leave blank for the Rectify default)', 'rectify-page-builder')),
            ),
        ),

        'quotation-next' => array(
            'label' => __('Quotation: What Happens Next', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Step', 'rectify-page-builder')),
                    ),
                ),
                'closing' => array('type' => 'richtext', 'label' => __('Closing Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'contact-cta' => array(
            'label' => __('Contact: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'phone' => array('type' => 'text', 'label' => __('Phone Number (renders as a call link instead of the link below when set)', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        /* -----------------------------------------------------------------
         * "Our Locations" page (rx-loc-* markup). Each About Us child page
         * below has its own bespoke design, so block types are NOT shared
         * across them the way the residential/commercial "solution-*" and
         * "cracked-*" families are.
         * ---------------------------------------------------------------*/

        'loc-hero' => array(
            'label' => __('Locations: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Paragraph', 'rectify-page-builder')),
                'banner_image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'loc-offices' => array(
            'label' => __('Locations: Office Grid + Map', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Offices', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'address' => array('type' => 'text', 'label' => __('Address', 'rectify-page-builder')),
                        'phone' => array('type' => 'text', 'label' => __('Phone', 'rectify-page-builder')),
                        'email' => array('type' => 'text', 'label' => __('Email', 'rectify-page-builder')),
                        'map_url' => array('type' => 'url', 'label' => __('Map Link URL', 'rectify-page-builder')),
                        'lat' => array('type' => 'text', 'label' => __('Map Latitude', 'rectify-page-builder')),
                        'lng' => array('type' => 'text', 'label' => __('Map Longitude', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'loc-footprint' => array(
            'label' => __('Locations: Growing Footprint', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'loc-cta' => array(
            'label' => __('Locations: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Help Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'phone' => array('type' => 'text', 'label' => __('Phone (optional)', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        /* -----------------------------------------------------------------
         * "Meet The Team" page (rx-mtt-* markup).
         * ---------------------------------------------------------------*/

        'mtt-hero' => array(
            'label' => __('Meet The Team: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Supporting Heading (H2)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
            ),
        ),

        'mtt-philosophy' => array(
            'label' => __('Meet The Team: Team Philosophy', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'text', 'label' => __('Red Lead Line', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
            ),
        ),

        'mtt-team' => array(
            'label' => __('Meet The Team: Team Grid', 'rectify-page-builder'),
            'fields' => array(
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Team Members', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Photo', 'rectify-page-builder')),
                        'name' => array('type' => 'text', 'label' => __('Name', 'rectify-page-builder')),
                        'role' => array('type' => 'text', 'label' => __('Role', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Biography', 'rectify-page-builder')),
                        'email_url' => array('type' => 'email', 'label' => __('Email Address (receives the frontend popup form)', 'rectify-page-builder')),
                        'linkedin_url' => array('type' => 'url', 'label' => __('LinkedIn URL (optional)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'mtt-why' => array(
            'label' => __('Meet The Team: Why Our Team Matters', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraphs', 'rectify-page-builder')),
                'outro' => array('type' => 'richtext', 'label' => __('Closing Paragraph', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Team Image', 'rectify-page-builder')),
            ),
        ),

        'mtt-cta' => array(
            'label' => __('Meet The Team: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Contact Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'text', 'label' => __('Theme Icon Filename', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'phone' => array('type' => 'text', 'label' => __('Phone (optional)', 'rectify-page-builder')),
                        'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                        'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        /* -----------------------------------------------------------------
         * "Certifications & Compliance" page (rx-cert-* markup).
         * ---------------------------------------------------------------*/

        'cert-hero' => array(
            'label' => __('Certifications: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Supporting Heading (H2)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
            ),
        ),

        'cert-banner' => array(
            'label' => __('Certifications: Full-Width Banner Image', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'cert-why-matters' => array(
            'label' => __('Certifications: Why This Matters', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'text', 'label' => __('Lead Line', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraphs', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cert-standards' => array(
            'label' => __('Certifications: Our Standards (icon grid)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Standards Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cert-builder-registration' => array(
            'label' => __('Certifications: Builder Registration', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'text', 'label' => __('Intro Line', 'rectify-page-builder')),
                'registrations' => array(
                    'type' => 'repeater',
                    'label' => __('Registration Lines', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'logos' => array(
                    'type' => 'repeater',
                    'label' => __('Registration Logos', 'rectify-page-builder'),
                    'fields' => array(
                        'label' => array('type' => 'text', 'label' => __('Label (used until a logo image is uploaded)', 'rectify-page-builder')),
                        'image' => array('type' => 'image', 'label' => __('Logo Image', 'rectify-page-builder')),
                    ),
                ),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraphs', 'rectify-page-builder')),
            ),
        ),

        'cert-engineering' => array(
            'label' => __('Certifications: Engineering Oversight', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
                'link_text' => array('type' => 'text', 'label' => __('Link Text', 'rectify-page-builder')),
                'link_url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                'insurance_note' => array('type' => 'richtext', 'label' => __('Insurance Note', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cert-registration-safety' => array(
            'label' => __('Certifications: Registration & Safety (split banner)', 'rectify-page-builder'),
            'fields' => array(
                'left_heading' => array('type' => 'text', 'label' => __('Left Heading', 'rectify-page-builder')),
                'left_lead' => array('type' => 'text', 'label' => __('Left Lead Line', 'rectify-page-builder')),
                'left_body' => array('type' => 'richtext', 'label' => __('Left Body', 'rectify-page-builder')),
                'right_heading' => array('type' => 'text', 'label' => __('Right Heading', 'rectify-page-builder')),
                'right_lead' => array('type' => 'text', 'label' => __('Right Lead Line', 'rectify-page-builder')),
                'right_intro' => array('type' => 'text', 'label' => __('Right Intro Line (before checklist)', 'rectify-page-builder')),
                'right_items' => array(
                    'type' => 'repeater',
                    'label' => __('Right Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'right_body' => array('type' => 'richtext', 'label' => __('Right Body (closing paragraph)', 'rectify-page-builder')),
            ),
        ),

        'cert-confidence' => array(
            'label' => __('Certifications: Confidence Through Professionalism', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Line (may include an accent span/strong)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'closing' => array('type' => 'text', 'label' => __('Closing Line (after checklist)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cert-systems' => array(
            'label' => __('Certifications: Systems & Accountability', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'text', 'label' => __('Lead Line', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cert-cta' => array(
            'label' => __('Certifications: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
            ),
        ),

        /* -----------------------------------------------------------------
         * "Careers" page (rx-careers-* markup).
         * ---------------------------------------------------------------*/

        'careers-hero' => array(
            'label' => __('Careers: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Supporting Heading (H2, optional)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
            ),
        ),

        'careers-banner' => array(
            'label' => __('Careers: Full-Width Banner Image', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'careers-why-work' => array(
            'label' => __('Careers: Why Work At Rectify (checklist + image)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'careers-culture' => array(
            'label' => __('Careers: Our Culture (dark image band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraphs', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'careers-standards' => array(
            'label' => __('Careers: Registration/Safety (two columns)', 'rectify-page-builder'),
            'fields' => array(
                'left_heading' => array('type' => 'text', 'label' => __('Left Heading', 'rectify-page-builder')),
                'left_subheading' => array('type' => 'text', 'label' => __('Left Subheading', 'rectify-page-builder')),
                'left_body' => array('type' => 'richtext', 'label' => __('Left Body', 'rectify-page-builder')),
                'right_heading' => array('type' => 'text', 'label' => __('Right Heading', 'rectify-page-builder')),
                'right_subheading' => array('type' => 'text', 'label' => __('Right Subheading', 'rectify-page-builder')),
                'right_body' => array('type' => 'richtext', 'label' => __('Right Body Paragraphs', 'rectify-page-builder')),
            ),
        ),

        'careers-standards-matter' => array(
            'label' => __('Careers: Standards Matter Here (copy + image)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading (red)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Paragraphs', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'careers-fit' => array(
            'label' => __('Careers: Who We Are Looking For / Growth (two cards)', 'rectify-page-builder'),
            'fields' => array(
                'left_heading' => array('type' => 'text', 'label' => __('Left Card Heading', 'rectify-page-builder')),
                'left_body' => array('type' => 'richtext', 'label' => __('Left Card Body', 'rectify-page-builder')),
                'left_items' => array(
                    'type' => 'repeater',
                    'label' => __('Left Card Checklist', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'right_heading' => array('type' => 'text', 'label' => __('Right Card Heading', 'rectify-page-builder')),
                'right_subheading' => array('type' => 'text', 'label' => __('Right Card Subheading', 'rectify-page-builder')),
                'right_body' => array('type' => 'richtext', 'label' => __('Right Card Body', 'rectify-page-builder')),
                'right_items' => array(
                    'type' => 'repeater',
                    'label' => __('Right Card Checklist', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'careers-jobs' => array(
            'label' => __('Careers: Job Opportunities (placeholder list)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtitle' => array('type' => 'text', 'label' => __('Subtitle', 'rectify-page-builder')),
                'note' => array('type' => 'text', 'label' => __('Admin Note (not shown on the front end)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Placeholder Jobs (only shown while no real Job Opportunities are published)', 'rectify-page-builder'),
                    'fields' => array(
                        'category' => array('type' => 'text', 'label' => __('Filter Category Key', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'url' => array('type' => 'url', 'label' => __('Link URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'careers-cta' => array(
            'label' => __('Careers: Need Help Choosing (final CTA)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
            ),
        ),

        'story-hero' => array(
            'label' => __('Our Story: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Right Column Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Right Column Red Statement', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
            ),
        ),

        'story-began' => array(
            'label' => __('Our Story: Where It All Began (navy band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Founder Line', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy (one paragraph per line)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Founder Image (right side)', 'rectify-page-builder')),
            ),
        ),

        'story-problem' => array(
            'label' => __('Our Story: The Problem We Saw', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Sub-Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Questions', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Question', 'rectify-page-builder')),
                    ),
                ),
                'emphasis' => array('type' => 'richtext', 'label' => __('Bold Statement', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'closing' => array('type' => 'text', 'label' => __('Closing Statement', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'story-work' => array(
            'label' => __('Our Story: Why This Type of Work', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Sub-Heading', 'rectify-page-builder')),
                'intro' => array('type' => 'richtext', 'label' => __('Intro Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Business Pillars', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Pillar', 'rectify-page-builder')),
                    ),
                ),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'closing' => array('type' => 'richtext', 'label' => __('Bold Closing Statement', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'story-values' => array(
            'label' => __('Our Story: Philosophy and Values', 'rectify-page-builder'),
            'fields' => array(
                'left_heading' => array('type' => 'text', 'label' => __('Left Heading', 'rectify-page-builder')),
                'left_copy' => array('type' => 'richtext', 'label' => __('Left Copy', 'rectify-page-builder')),
                'left_items' => array(
                    'type' => 'repeater',
                    'label' => __('Left Checklist', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Item', 'rectify-page-builder')),
                    ),
                ),
                'right_heading' => array('type' => 'text', 'label' => __('Right Heading', 'rectify-page-builder')),
                'right_copy' => array('type' => 'richtext', 'label' => __('Right Copy', 'rectify-page-builder')),
                'right_items' => array(
                    'type' => 'repeater',
                    'label' => __('Right Checklist', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Item', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'story-growth' => array(
            'label' => __('Our Story: How We Have Grown', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'richtext', 'label' => __('Red Sub-Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'story-belief' => array(
            'label' => __('Our Story: Founder Belief', 'rectify-page-builder'),
            'fields' => array(
                'intro' => array('type' => 'text', 'label' => __('Intro Line', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Red Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Founder Copy', 'rectify-page-builder')),
                'principles' => array(
                    'type' => 'repeater',
                    'label' => __('Principles', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Principle', 'rectify-page-builder')),
                    ),
                ),
                'closing' => array('type' => 'richtext', 'label' => __('Closing Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Founder Image', 'rectify-page-builder')),
            ),
        ),

        'story-name' => array(
            'label' => __('Our Story: Why the Name Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Red Sub-Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'story-philosophy' => array(
            'label' => __('Our Story: Philosophy Statement', 'rectify-page-builder'),
            'fields' => array(
                'intro' => array('type' => 'text', 'label' => __('Intro Line', 'rectify-page-builder')),
                'statement' => array('type' => 'text', 'label' => __('Statement (large red text)', 'rectify-page-builder')),
            ),
        ),

        'story-growing' => array(
            'label' => __('Our Story: Growing Beyond (checklist band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Sub-Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'list_heading' => array('type' => 'text', 'label' => __('Checklist Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Item Text', 'rectify-page-builder')),
                    ),
                ),
                'outro' => array('type' => 'richtext', 'label' => __('Closing Paragraph', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'story-purpose' => array(
            'label' => __('Our Story: Purpose (image + copy)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'richtext', 'label' => __('Sub-Heading (bold, one line per row)', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy (one paragraph per line)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (left column)', 'rectify-page-builder')),
            ),
        ),

        'story-drives' => array(
            'label' => __('Our Story: What Drives Every Project (cards)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Icon Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'story-ahead' => array(
            'label' => __('Our Story: Looking Ahead (image band)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'story-vision' => array(
            'label' => __('Our Story: Vision (copy + image)', 'rectify-page-builder'),
            'fields' => array(
                'intro' => array('type' => 'text', 'label' => __('Intro Line', 'rectify-page-builder')),
                'statement' => array('type' => 'richtext', 'label' => __('Statement (bold red copy)', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Closing Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'story-principles' => array(
            'label' => __('Our Story: Principles Grid', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Principle Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Icon Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-hero' => array(
            'label' => __('About Rectify: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Right Column Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
            ),
        ),

        'ar-banner' => array(
            'label' => __('About Rectify: Full-Width Banner Image', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'ar-intro' => array(
            'label' => __('About Rectify: Intro (copy + image)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Highlighted Lead', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy (one paragraph per line)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'ar-vision' => array(
            'label' => __('About Rectify: Vision (image band)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Statement', 'rectify-page-builder')),
                'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'ar-what' => array(
            'label' => __('About Rectify: What We Do', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Service Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-serve' => array(
            'label' => __('About Rectify: Who We Serve (photo grid)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Sector Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Photo', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-stats' => array(
            'label' => __('About Rectify: Stats Band', 'rectify-page-builder'),
            'fields' => array(
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Stats', 'rectify-page-builder'),
                    'fields' => array(
                        'value' => array('type' => 'text', 'label' => __('Value (e.g. 230+)', 'rectify-page-builder')),
                        'label' => array('type' => 'text', 'label' => __('Label', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon (optional, replaces the value)', 'rectify-page-builder')),
                        'google' => array('type' => 'text', 'label' => __('Show Google Logo ("yes" to enable)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-advantage' => array(
            'label' => __('About Rectify: Our Advantage (navy band)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-difference' => array(
            'label' => __('About Rectify: What Makes Us Different', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Highlighted Lead', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
                'focus' => array('type' => 'richtext', 'label' => __('Focus Statement Below Image', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'ar-approach' => array(
            'label' => __('About Rectify: Our Approach', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Left Column Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Left Column Copy', 'rectify-page-builder')),
                'principles_heading' => array('type' => 'text', 'label' => __('Principles Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Principles', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-values' => array(
            'label' => __('About Rectify: Our Values', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Value Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ar-future' => array(
            'label' => __('About Rectify: Resilient Future (image band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
                'intro_line' => array('type' => 'text', 'label' => __('Commitment Intro Line', 'rectify-page-builder')),
                'tagline' => array('type' => 'text', 'label' => __('Tagline (bold)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'ar-cta' => array(
            'label' => __('About Rectify: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subtext' => array('type' => 'richtext', 'label' => __('Subtext', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('CTA Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'action_text' => array('type' => 'text', 'label' => __('Action Text', 'rectify-page-builder')),
                        'action_url' => array('type' => 'url', 'label' => __('Action URL', 'rectify-page-builder')),
                        'action_type' => array('type' => 'text', 'label' => __('Action Type ("phone" or "button")', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'tech-hero' => array(
            'label' => __('Our Technology: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Right Column Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
            ),
        ),

        'tech-why-matters' => array(
            'label' => __('Our Technology: Why Technology Matters', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'tech-approach' => array(
            'label' => __('Our Technology: Our Approach (image band)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Background Image', 'rectify-page-builder')),
            ),
        ),

        'tech-expertise' => array(
            'label' => __('Our Technology: Expertise Cards', 'rectify-page-builder'),
            'fields' => array(
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                        'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'tech-engineered' => array(
            'label' => __('Our Technology: Engineered Solutions (image left)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (left column)', 'rectify-page-builder')),
            ),
        ),

        'tech-measuring' => array(
            'label' => __('Our Technology: Measuring Outcomes', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'closing' => array('type' => 'text', 'label' => __('Closing Statement (bold)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image (right column)', 'rectify-page-builder')),
            ),
        ),

        'tech-innovation' => array(
            'label' => __('Our Technology: Innovation & Continuous Improvement', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image (left column)', 'rectify-page-builder')),
                'callout_heading' => array('type' => 'text', 'label' => __('Callout Heading', 'rectify-page-builder')),
                'callout_body' => array('type' => 'richtext', 'label' => __('Callout Copy', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'checklist_heading' => array('type' => 'text', 'label' => __('Checklist Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'label' => array('type' => 'text', 'label' => __('Label', 'rectify-page-builder')),
                    ),
                ),
                'closing' => array('type' => 'richtext', 'label' => __('Closing Copy', 'rectify-page-builder')),
            ),
        ),

        'process-hero' => array(
            'label' => __('Our Process: Hero', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Right Column Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Right Column Copy', 'rectify-page-builder')),
            ),
        ),

        'process-banner' => array(
            'label' => __('Our Process: Full-Width Banner Image', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Banner Image', 'rectify-page-builder')),
            ),
        ),

        'process-principles' => array(
            'label' => __('Our Process: Why It Matters + Principles', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Left Column Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Left Column Subheading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Left Column Copy', 'rectify-page-builder')),
                'image_1' => array('type' => 'image', 'label' => __('Left Column Photo 1', 'rectify-page-builder')),
                'image_2' => array('type' => 'image', 'label' => __('Left Column Photo 2', 'rectify-page-builder')),
                'steps_heading' => array('type' => 'text', 'label' => __('Right Column Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Process Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'legal-hero' => array(
            'label' => __('Legal Page: Hero', 'rectify-page-builder'),
            'fields' => array(
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Label (defaults to the Title)', 'rectify-page-builder')),
            ),
        ),

        'legal-sections' => array(
            'label' => __('Legal Page: Numbered Sections', 'rectify-page-builder'),
            'fields' => array(
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Sections (numbered automatically)', 'rectify-page-builder'),
                    'fields' => array(
                        'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                        'body' => array('type' => 'richtext', 'label' => __('Body Copy (blank line = new paragraph; simple lists allowed)', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cgi-banner' => array(
            'label' => __('Commercial Ground Improvement: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL', 'rectify-page-builder')),
                'current_label' => array('type' => 'text', 'label' => __('Breadcrumb Current Page Label', 'rectify-page-builder')),
            ),
        ),

        'cgi-intro' => array(
            'label' => __('Commercial Ground Improvement: Intro', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cgi-why-matters' => array(
            'label' => __('Commercial Ground Improvement: Why It Matters', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'applications_heading' => array('type' => 'text', 'label' => __('Checklist Heading', 'rectify-page-builder')),
                'applications' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
                'image_1' => array('type' => 'image', 'label' => __('Photo 1', 'rectify-page-builder')),
                'image_2' => array('type' => 'image', 'label' => __('Photo 2', 'rectify-page-builder')),
            ),
        ),

        'cgi-solutions-grid' => array(
            'label' => __('Commercial Ground Improvement: Solutions Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Solution Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cgi-why-choose' => array(
            'label' => __('Commercial Ground Improvement: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cgi-industries' => array(
            'label' => __('Commercial Ground Improvement: Industries Supported', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Map Image', 'rectify-page-builder')),
                'list_heading' => array('type' => 'text', 'label' => __('Checklist Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cgi-process' => array(
            'label' => __('Commercial Ground Improvement: Our Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cgi-cta' => array(
            'label' => __('Commercial Ground Improvement: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'cpa-banner' => array(
            'label' => __('Commercial Pipe Abandonment: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL', 'rectify-page-builder')),
                'current_label' => array('type' => 'text', 'label' => __('Breadcrumb Current Page Label', 'rectify-page-builder')),
            ),
        ),

        'cpa-intro' => array(
            'label' => __('Commercial Pipe Abandonment: Intro', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs; inline links allowed)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'cpa-why-choose' => array(
            'label' => __('Commercial Pipe Abandonment: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'cpa-cta' => array(
            'label' => __('Commercial Pipe Abandonment: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),

        'ii-banner' => array(
            'label' => __('Industries Inner Page: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL', 'rectify-page-builder')),
                'current_label' => array('type' => 'text', 'label' => __('Breadcrumb Current Page Label', 'rectify-page-builder')),
            ),
        ),

        'ii-intro' => array(
            'label' => __('Industries Inner Page: Intro', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'ii-challenges' => array(
            'label' => __('Industries Inner Page: Challenges Grid', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Challenge Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-photo-banner' => array(
            'label' => __('Industries Inner Page: Full-Width Photo Banner', 'rectify-page-builder'),
            'fields' => array(
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
            ),
        ),

        'ii-solutions' => array(
            'label' => __('Industries Inner Page: Engineered Solutions Carousel', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker (optional)', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Solution Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-why-choose' => array(
            'label' => __('Industries Inner Page: Why Choose Rectify (dark)', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph (optional)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-process' => array(
            'label' => __('Industries Inner Page: Structured Engineering Approach', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-faq' => array(
            'label' => __('Industries Inner Page: FAQ', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Questions and Answers', 'rectify-page-builder'),
                    'fields' => array(
                        'question' => array('type' => 'text', 'label' => __('Question', 'rectify-page-builder')),
                        'answer' => array('type' => 'richtext', 'label' => __('Answer', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-cta' => array(
            'label' => __('Industries Inner Page: Final CTA (3 cards)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'icon-picker', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'description' => array('type' => 'richtext', 'label' => __('Description', 'rectify-page-builder')),
                        'button_text' => array('type' => 'text', 'label' => __('Button Text', 'rectify-page-builder')),
                        'button_url' => array('type' => 'url', 'label' => __('Button URL', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'ii-assets' => array(
            'label' => __('Industries Inner Page: Assets We Support (photo + checklist)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                'image_alt' => array('type' => 'text', 'label' => __('Image Alt Text', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Checklist Items', 'rectify-page-builder'),
                    'fields' => array(
                        'text' => array('type' => 'text', 'label' => __('Item Text', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'slab-relevel-hero' => array(
            'label' => __('Slab Relevelling: Title Banner', 'rectify-page-builder'),
            'fields' => array(
                'kicker' => array('type' => 'text', 'label' => __('Kicker', 'rectify-page-builder')),
                'title' => array('type' => 'text', 'label' => __('Title (H1)', 'rectify-page-builder')),
                'breadcrumb_label' => array('type' => 'text', 'label' => __('Breadcrumb Parent Label', 'rectify-page-builder')),
                'breadcrumb_url' => array('type' => 'url', 'label' => __('Breadcrumb Parent URL', 'rectify-page-builder')),
                'current_label' => array('type' => 'text', 'label' => __('Breadcrumb Current Page Label', 'rectify-page-builder')),
            ),
        ),

        'slab-relevel-intro' => array(
            'label' => __('Slab Relevelling: Intro', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
            ),
        ),

        'slab-relevel-signs' => array(
            'label' => __('Slab Relevelling: Warning Signs', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Sign Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                    ),
                ),
                'note' => array('type' => 'richtext', 'label' => __('Closing Note', 'rectify-page-builder')),
                'cta_text' => array('type' => 'text', 'label' => __('Button Text', 'rectify-page-builder')),
                'cta_url' => array('type' => 'url', 'label' => __('Button URL', 'rectify-page-builder')),
            ),
        ),

        'slab-relevel-causes' => array(
            'label' => __('Slab Relevelling: Causes', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'subhead' => array('type' => 'text', 'label' => __('Sub-heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cause Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'image' => array('type' => 'image', 'label' => __('Image', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'slab-relevel-process' => array(
            'label' => __('Slab Relevelling: Our Process', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'body_richtext' => array('type' => 'richtext', 'label' => __('Body Copy (paragraphs)', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Steps', 'rectify-page-builder'),
                    'fields' => array(
                        'number' => array('type' => 'text', 'label' => __('Step Number', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'slab-relevel-comparison' => array(
            'label' => __('Slab Relevelling: Comparison Table', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'subheading' => array('type' => 'text', 'label' => __('Subheading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'rows' => array(
                    'type' => 'repeater',
                    'label' => __('Comparison Rows', 'rectify-page-builder'),
                    'fields' => array(
                        'traditional' => array('type' => 'text', 'label' => __('Traditional Slab Replacement', 'rectify-page-builder')),
                        'rectify' => array('type' => 'text', 'label' => __('Rectify Chemical Underpinning', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'slab-relevel-proof' => array(
            'label' => __('Slab Relevelling: Performance Verified (before/after)', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'lead' => array('type' => 'richtext', 'label' => __('Lead Paragraph', 'rectify-page-builder')),
                'before_image' => array('type' => 'image', 'label' => __('Before Image', 'rectify-page-builder')),
                'after_image' => array('type' => 'image', 'label' => __('After Image', 'rectify-page-builder')),
            ),
        ),

        'slab-relevel-why' => array(
            'label' => __('Slab Relevelling: Why Choose Rectify', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'items' => array(
                    'type' => 'repeater',
                    'label' => __('Cards', 'rectify-page-builder'),
                    'fields' => array(
                        'icon' => array('type' => 'image', 'label' => __('Icon', 'rectify-page-builder')),
                        'title' => array('type' => 'text', 'label' => __('Title', 'rectify-page-builder')),
                        'copy' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                    ),
                ),
            ),
        ),

        'slab-relevel-cta' => array(
            'label' => __('Slab Relevelling: Final CTA', 'rectify-page-builder'),
            'fields' => array(
                'heading' => array('type' => 'text', 'label' => __('Heading', 'rectify-page-builder')),
                'body' => array('type' => 'richtext', 'label' => __('Copy', 'rectify-page-builder')),
                'primary_text' => array('type' => 'text', 'label' => __('Primary Button Text', 'rectify-page-builder')),
                'primary_url' => array('type' => 'url', 'label' => __('Primary Button URL', 'rectify-page-builder')),
                'phone_text' => array('type' => 'text', 'label' => __('Phone Text', 'rectify-page-builder')),
                'phone_url' => array('type' => 'url', 'label' => __('Phone URL (tel:...)', 'rectify-page-builder')),
                'email_text' => array('type' => 'text', 'label' => __('Email Text', 'rectify-page-builder')),
                'email_url' => array('type' => 'url', 'label' => __('Email URL (mailto:...)', 'rectify-page-builder')),
            ),
        ),
    );

    return $types;
}

/**
 * List of field types understood by both the PHP sanitizer and the JS form
 * renderer, for reference/validation.
 *
 * @return array
 */
function rectify_pb_get_field_types()
{
    return array('text', 'richtext', 'url', 'image', 'icon-picker', 'repeater');
}

/**
 * Sanitize a single field value according to its schema definition.
 * Used by the meta box save handler; also usable elsewhere.
 *
 * @param mixed $value
 * @param array $field_schema
 * @return mixed
 */
function rectify_pb_sanitize_field($value, $field_schema)
{
    $type = isset($field_schema['type']) ? $field_schema['type'] : 'text';

    switch ($type) {
        case 'text':
            return sanitize_text_field((string) $value);

        case 'richtext':
            return wp_kses_post((string) $value);

        // Third-party form embeds (HubSpot, Gravity Forms, ...). These are
        // pasted verbatim from the provider and are usually a <script> tag
        // plus an inline init call, so - unlike every other field type here -
        // the markup must survive saving intact. Storing executable markup is
        // exactly the trust boundary WordPress models with `unfiltered_html`
        // (the same capability that lets an admin paste a <script> into post
        // content), so it is gated on that capability rather than being open
        // to anyone who can edit the page. Users without it fall back to
        // wp_kses_post(), which keeps shortcodes but strips <script>.
        //
        // NOTE: because of that fallback, a user who lacks `unfiltered_html`
        // re-saving a page whose embed was added by an admin will strip the
        // script. On single-site installs administrators and editors both
        // have the capability, so this only bites lower roles.
        case 'embed':
            $raw_embed = trim((string) $value);

            if (current_user_can('unfiltered_html')) {
                return $raw_embed;
            }

            return wp_kses_post($raw_embed);

        case 'url':
            return esc_url_raw((string) $value);

        case 'email':
            return sanitize_email((string) $value);

        case 'image':
            return absint($value);

        case 'icon-picker':
            $raw_value = (string) $value;

            // Pasted-SVG-code values are base64-encoded raw markup, not plain
            // text, so they must be sanitized as SVG (not sanitize_text_field,
            // which would strip all the markup out) before being stored.
            if (strpos($raw_value, 'paste:') === 0 && function_exists('rectify_pb_sanitize_svg_markup')) {
                $decoded = base64_decode(substr($raw_value, 6), true);

                if ($decoded === false || stripos($decoded, '<svg') === false || strlen($decoded) > 200000) {
                    return '';
                }

                return 'paste:' . base64_encode(rectify_pb_sanitize_svg_markup($decoded));
            }

            $value = sanitize_text_field($raw_value);

            if (strpos($value, 'upload:') === 0) {
                $attachment_id = absint(substr($value, 7));

                return ($attachment_id && get_post_type($attachment_id) === 'attachment') ? ('upload:' . $attachment_id) : '';
            }

            return $value;

        case 'repeater':
            if (!is_array($value)) {
                return array();
            }

            $sub_fields = isset($field_schema['fields']) && is_array($field_schema['fields']) ? $field_schema['fields'] : array();
            $sanitized_rows = array();

            foreach ($value as $row) {
                if (!is_array($row)) {
                    continue;
                }

                $sanitized_row = array();

                foreach ($sub_fields as $sub_key => $sub_schema) {
                    $sanitized_row[$sub_key] = rectify_pb_sanitize_field(
                        isset($row[$sub_key]) ? $row[$sub_key] : '',
                        $sub_schema
                    );
                }

                $sanitized_rows[] = $sanitized_row;
            }

            return $sanitized_rows;

        default:
            return sanitize_text_field((string) $value);
    }
}

/**
 * Sanitize an entire block (its "fields" map) against a block type schema.
 *
 * @param string $block_type
 * @param array  $fields
 * @return array
 */
function rectify_pb_sanitize_block_fields($block_type, $fields)
{
    $types = rectify_pb_get_block_types();

    if (!isset($types[$block_type]) || !is_array($fields)) {
        return array();
    }

    $schema_fields = $types[$block_type]['fields'];
    $sanitized = array();

    foreach ($schema_fields as $key => $field_schema) {
        $sanitized[$key] = rectify_pb_sanitize_field(
            isset($fields[$key]) ? $fields[$key] : '',
            $field_schema
        );
    }

    return $sanitized;
}
