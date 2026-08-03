<?php
/**
 * Icon library for the icon-picker field type.
 *
 * Powers the icon-picker grid in the admin builder UI. Exposes the icons
 * already used on the homepage today:
 *   - the 8 inline "service" SVGs used in the residential services tab
 *     (copied verbatim from $services_svg in page-rectify-homepage.php so
 *     the icon-picker renders pixel-identical markup)
 *   - the icon image files used by the Causes and Advantage sections
 *     (assets/icons-red/*.svg, resolved to a URL)
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Resolve a theme asset path to a URL, mirroring the fallback behaviour of
 * the homepage template's own rx_asset_url() (child-theme assets, then
 * child-theme rectify-homepage-draft2-v3/assets, then parent equivalents)
 * without depending on that function being defined (it only exists once the
 * homepage template file itself has been included).
 *
 * @param string $relative_path e.g. 'icons-red/Rectify Icon Set_Warehouse_red.svg'
 * @return string
 */
function rectify_pb_theme_asset_url($relative_path)
{
    $relative_path = ltrim($relative_path, '/');
    $theme_dir = get_stylesheet_directory();
    $theme_uri = get_stylesheet_directory_uri();
    $parent_dir = get_template_directory();
    $parent_uri = get_template_directory_uri();

    $candidates = array(
        array('dir' => trailingslashit($theme_dir) . 'rectify-homepage-draft2-v3/assets', 'uri' => trailingslashit($theme_uri) . 'rectify-homepage-draft2-v3/assets'),
        array('dir' => trailingslashit($theme_dir) . 'assets', 'uri' => trailingslashit($theme_uri) . 'assets'),
        array('dir' => trailingslashit($parent_dir) . 'rectify-homepage-draft2-v3/assets', 'uri' => trailingslashit($parent_uri) . 'rectify-homepage-draft2-v3/assets'),
        array('dir' => trailingslashit($parent_dir) . 'assets', 'uri' => trailingslashit($parent_uri) . 'assets'),
    );

    foreach ($candidates as $candidate) {
        $candidate_path = trailingslashit($candidate['dir']) . $relative_path;

        if (file_exists($candidate_path)) {
            $encoded_path = implode('/', array_map('rawurlencode', explode('/', $relative_path)));
            $asset_url = trailingslashit($candidate['uri']) . $encoded_path;

            // Page Builder renderers output these URLs directly instead of
            // using WordPress' enqueue API, so give images and icons the same
            // automatic cache invalidation as the theme's CSS and scripts.
            if (is_file($candidate_path)) {
                $asset_url = add_query_arg('ver', (string) filemtime($candidate_path), $asset_url);
            }

            return $asset_url;
        }
    }

    $encoded_path = implode('/', array_map('rawurlencode', explode('/', $relative_path)));

    return trailingslashit($theme_uri) . 'assets/' . $encoded_path;
}

/**
 * Returns the fixed icon library: array of
 *   key => array( 'key' => .., 'label' => .., 'type' => 'svg'|'file', 'svg' => .., 'url' => .. )
 *
 * @return array
 */
function rectify_pb_get_icon_library()
{
    static $icons = null;

    if ($icons !== null) {
        return $icons;
    }

    $icons = array();

    foreach (rectify_pb_get_inline_service_icons() as $key => $entry) {
        $icons[$key] = array(
            'key' => $key,
            'label' => $entry['label'],
            'type' => 'svg',
            'svg' => $entry['svg'],
            'url' => '',
        );
    }

    foreach (rectify_pb_get_file_icons() as $key => $entry) {
        $icons[$key] = array(
            'key' => $key,
            'label' => $entry['label'],
            'type' => 'file',
            'svg' => '',
            'url' => rectify_pb_theme_asset_url($entry['path']),
        );
    }

    return $icons;
}

/**
 * The 8 raw inline service icon SVGs, copied verbatim from the
 * $services_svg array in page-rectify-homepage.php, keyed by a readable slug.
 *
 * @return array
 */
function rectify_pb_get_inline_service_icons()
{
    return array(
        'icon-house-red' => array(
            'label' => 'House (red)',
            'svg' => '<span class="rx-ico" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M54.8023 3.58315L54.8166 50.4689C54.8166 51.3866 54.3987 52.4486 53.3006 52.4508L32.2284 52.4891L31.6061 53.515C31.3512 53.935 30.858 54.0039 30.4587 53.8082C30.0869 53.6255 29.8003 53.1432 30.0694 52.7002L33.2423 47.4699L30.7267 43.4569C30.578 43.1397 30.613 42.8149 30.7978 42.5217L33.0805 38.7997L30.7923 33.961L25.912 32.1617L25.8792 38.7997C25.9689 39.3947 25.5675 39.9011 24.9703 39.9252L15.3486 39.9296L15.3453 50.6877L27.2256 50.6844C27.7178 50.7686 28.0033 51.1077 28.0087 51.5397C28.0142 51.9717 27.7452 52.476 27.2016 52.476L2.75953 52.465C2.03109 52.465 1.2075 51.7683 1.2064 51.0333L1.18234 35.4014L1.19547 3.62472C1.19547 2.69065 2.17 2.09237 3.03297 2.09237L28.4637 2.08909C28.8553 2.08909 29.1255 2.22472 29.3103 2.4905C29.4602 2.70487 29.5717 3.03628 29.4044 3.35347L24.8795 11.9361L30.2127 18.0327C30.5003 18.3608 30.2837 18.9864 30.053 19.3003L24.6805 29.7927L31.7986 32.4242C32.1453 32.6069 32.3389 32.9088 32.4636 33.2763L34.7244 38.1107L53.0414 38.115L53.0436 27.3044L29.9261 27.3099C29.5859 27.2858 29.3716 27.1338 29.2327 26.9446C29.12 26.7925 28.9647 26.3627 29.1014 26.1319L33.577 18.5467L28.9712 12.8571C28.6016 12.401 28.3708 11.9416 28.7809 11.4089L33.332 2.7705C33.5694 2.31878 33.833 2.08472 34.4006 2.08472L52.9473 2.09347C53.8792 2.09347 54.6022 2.613 54.8012 3.57987L54.8023 3.58315ZM23.1219 12.6514C22.8255 12.1964 22.948 11.7939 23.1656 11.3794L27.1031 3.8894L2.94984 3.88175V13.7102L24.045 13.7014C23.8241 13.2803 23.4434 12.9916 23.123 12.6503L23.1219 12.6514ZM53.048 13.7036L53.0403 3.88503L34.7648 3.89269L30.5025 11.9197L31.9047 13.7102L53.048 13.7047V13.7036ZM13.6019 25.5172V15.4985L4.12125 15.4963L2.94875 15.5827L2.95312 25.5369L13.603 25.5183L13.6019 25.5172ZM28.4287 18.5632L25.7414 15.4985L15.3453 15.4941V25.5314H24.9244L28.4287 18.5632ZM31.5612 25.5117L40.6569 25.5347L40.6623 15.4766L35.3128 15.5346C34.7244 15.5532 34.1808 15.3388 33.4917 15.6188L35.3358 17.9507C35.6398 18.3346 35.5425 18.8541 35.2286 19.226L31.5591 25.5107L31.5612 25.5117ZM53.0458 25.5139L53.0425 15.4875L43.1583 15.5039C42.875 15.5488 42.6158 15.4996 42.408 15.7249V25.5358L53.0458 25.5128V25.5139ZM23.3866 31.1785C22.7216 30.9652 22.4197 30.3724 22.7019 29.8178L23.9783 27.3066H2.94875L2.95094 38.1139L24.0712 38.1161L24.068 31.5667C24.068 31.3075 23.5769 31.2386 23.3866 31.1785ZM13.6019 50.668V39.9219L2.94875 39.9307V50.691L13.6019 50.6691V50.668ZM33.4556 50.6691L41.1348 50.6789V39.9252L34.4706 39.9296L32.5434 43.0336L34.9048 46.7961C35.2647 47.2107 35.2789 47.7717 34.907 48.1852L33.4556 50.668V50.6691ZM53.0469 50.6658L53.0425 39.923L42.9352 39.9296L42.8914 47.5355L42.898 50.6778L53.0458 50.6658H53.0469Z" fill="#BD1726"/>
</svg></span>',
        ),
        'service-cracked-walls' => array(
            'label' => 'Cracked Walls',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="54" height="52" viewBox="0 0 54 52" fill="none"><path d="M53.62 1.49844L53.6342 48.3842C53.6342 49.3019 53.2164 50.3639 52.1183 50.3661L31.0461 50.4044L30.4237 51.4303C30.1689 51.8503 29.6756 51.9192 29.2764 51.7234C28.9045 51.5408 28.618 51.0584 28.887 50.6155L32.06 45.3852L29.5444 41.3722C29.3956 41.055 29.4306 40.7302 29.6155 40.437L31.8981 36.715L29.61 31.8763L24.7297 30.077L24.6969 36.715C24.7866 37.31 24.3852 37.8164 23.788 37.8405L14.1662 37.8448L14.163 48.603L26.0433 48.5997C26.5355 48.6839 26.8209 49.023 26.8264 49.455C26.8319 49.887 26.5628 50.3913 26.0192 50.3913L1.57719 50.3803C0.84875 50.3803 0.0251562 49.6836 0.0240624 48.9486L0 33.3167L0.013125 1.54C0.013125 0.605937 0.987656 0.00765622 1.85062 0.00765622L27.2814 0.0043751C27.673 0.0043751 27.9431 0.14 28.128 0.405781C28.2778 0.620156 28.3894 0.951563 28.222 1.26875L23.6972 9.85141L29.0303 15.948C29.318 16.2761 29.1014 16.9017 28.8706 17.2156L23.4981 27.708L30.6162 30.3395C30.963 30.5222 31.1566 30.8241 31.2812 31.1916L33.542 36.0259L51.8591 36.0303L51.8612 25.2197L28.7437 25.2252C28.4036 25.2011 28.1892 25.0491 28.0503 24.8598C27.9377 24.7078 27.7823 24.278 27.9191 24.0472L32.3947 16.462L27.7889 10.7723C27.4192 10.3163 27.1884 9.85688 27.5986 9.32422L32.1497 0.685781C32.387 0.234063 32.6506 0 33.2183 0L51.765 0.00874999C52.6969 0.00874999 53.4198 0.528281 53.6189 1.49516L53.62 1.49844ZM21.9395 10.5667C21.6431 10.1117 21.7656 9.70922 21.9833 9.29469L25.9208 1.80469L1.7675 1.79703V11.6255L22.8627 11.6167C22.6417 11.1956 22.2611 10.9069 21.9406 10.5656L21.9395 10.5667ZM51.8656 11.6189L51.858 1.80031L33.5825 1.80797L29.3202 9.835L30.7223 11.6255L51.8656 11.62V11.6189ZM12.4195 23.4325V13.4137L2.93891 13.4116L1.76641 13.498L1.77078 23.4522L12.4206 23.4336L12.4195 23.4325ZM27.2464 16.4784L24.5591 13.4137L14.163 13.4094V23.4467H23.742L27.2464 16.4784ZM30.3789 23.427L39.4745 23.45L39.48 13.3919L34.1305 13.4498C33.542 13.4684 32.9984 13.2541 32.3094 13.5341L34.1534 15.8659C34.4575 16.2498 34.3602 16.7694 34.0462 17.1413L30.3767 23.4259L30.3789 23.427ZM51.8634 23.4292L51.8602 13.4028L41.9759 13.4192C41.6927 13.4641 41.4334 13.4148 41.2256 13.6402V23.4511L51.8634 23.4281V23.4292ZM22.2042 29.0938C21.5392 28.8805 21.2373 28.2877 21.5195 27.7331L22.7959 25.2219H1.76641L1.76859 36.0292L22.8889 36.0314L22.8856 29.482C22.8856 29.2228 22.3945 29.1539 22.2042 29.0938ZM12.4195 48.5833V37.8372L1.76641 37.8459V48.6063L12.4195 48.5844V48.5833ZM32.2733 48.5844L39.9525 48.5942V37.8405L33.2883 37.8448L31.3611 40.9489L33.7225 44.7114C34.0823 45.1259 34.0966 45.687 33.7247 46.1005L32.2733 48.5833V48.5844ZM51.8645 48.5811L51.8602 37.8383L41.7528 37.8448L41.7091 45.4508L41.7156 48.5931L51.8634 48.5811H51.8645Z" fill="#000000"/></svg>',
        ),
        'service-sloping-slab' => array(
            'label' => 'Sloping Slab',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M34.7332 28.922C34.6446 29.3836 34.3022 29.6472 33.8505 29.6472L22.2141 29.6516C21.6486 29.6516 21.2778 29.2961 21.2789 28.7328L21.2953 16.9826C21.2953 16.5123 21.7766 16.2148 22.2097 16.2148L33.7805 16.2126C34.2355 16.2126 34.7255 16.4609 34.7255 16.9706L34.7342 28.922H34.7332ZM27.2694 22.1605L27.265 17.8019L22.7949 17.7997L22.7971 22.1758L27.2694 22.1616V22.1605ZM33.2282 22.1605V17.7986L28.7646 17.8084V22.1758L33.2282 22.1616V22.1605ZM27.2508 23.7431L23.7836 23.6917C23.4511 23.7541 23.1405 23.7639 22.7949 23.7158V28.1116L27.2672 28.1039L27.2508 23.7431ZM33.2271 28.0919L33.2183 23.6972L28.7591 23.7169L28.7667 28.1116L33.2271 28.093V28.0919Z" fill="#222840"/>
</svg>',
        ),
        'service-jamming-doors-windows' => array(
            'label' => 'Jamming Doors & Windows',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M4.12016 52.2746L9.08688 52.2484C9.32422 52.1456 9.58781 51.9039 9.91922 52.0843L10.0909 49.5184C9.87656 49.759 9.72016 49.9679 9.41828 49.9767C9.16235 49.9832 8.84188 49.8049 8.81235 49.4823L8.65703 47.7629C8.61875 47.3418 8.82656 47.0049 9.16563 46.971C10.2134 46.8671 9.73766 48.0353 10.1413 49.0623L12.6273 20.2846L13.0506 14.9942C13.0627 14.8421 12.8516 14.7754 12.7192 14.7842C11.9098 14.8421 11.2995 14.1804 11.3936 13.3962L11.8289 9.7562C11.8989 9.16776 12.553 8.76745 13.1786 8.85276L30.0048 11.1332L50.4634 13.9628C50.9491 14.0295 51.2794 14.7131 51.2389 15.0707L50.8255 18.7118C50.7664 19.2368 50.4175 19.7257 49.8695 19.8012C49.49 19.8537 49.1181 19.7804 48.7397 19.741L48.0397 25.6364L44.753 52.2735L51.9848 52.2845C52.4344 52.2845 52.7352 52.7756 52.7177 53.1507C52.6991 53.5467 52.3753 53.9743 51.8798 53.9754L4.28313 53.9809C3.74828 53.9809 3.34578 53.7315 3.28563 53.2229C3.23422 52.7898 3.57985 52.2768 4.11906 52.2746H4.12016Z" fill="#222840"/>
</svg>',
        ),
        'service-leaning-walls-gaps' => array(
            'label' => 'Leaning Walls & Gaps in Doors & Windows',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M20.8086 6.87095C20.113 6.21907 21.4583 5.31782 20.9902 5.31673L13.9541 5.29595C13.5045 5.29486 13.1534 5.15267 13.0364 4.70314C12.9566 4.39579 13.172 3.79861 13.6303 3.79642L21.1969 3.76579L20.6948 3.07892C20.487 2.79454 20.5975 2.43251 20.837 2.21048C21.0525 2.01142 21.5064 1.90751 21.7481 2.19626L23.3384 4.10814C23.6108 4.43517 23.4916 4.80704 23.2477 5.10454L21.8969 6.75939C21.6147 7.1061 21.1466 7.18704 20.8086 6.86985V6.87095Z" fill="#222840"/>
</svg>',
        ),
        'service-leaning-pillars-chimneys' => array(
            'label' => 'Leaning Pillars & Chimneys',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="53" height="55" viewBox="0 0 53 55" fill="none">
  <path d="M26.9139 42.4652L23.0267 44.3377L7.40901 52.0191L2.55276 54.4395C2.08792 54.6714 1.44698 54.5205 1.22385 54.0086L0.0644788 51.3475C-0.157552 50.8378 0.228541 50.2581 0.693385 50.0175L4.71729 47.935L13.7899 43.4375L13.8195 39.1752C13.8228 38.6928 14.3521 38.3297 14.7579 38.2017L16.2957 38.1733L18.4099 25.967L20.8228 12.2033L21.1662 10.0442L19.3571 9.79048C18.7468 9.70516 18.3804 9.17688 18.469 8.56548L18.9328 5.36298C18.9732 4.71438 19.5179 4.23423 20.1917 4.3261L25.9765 5.11032L26.6579 0.740789C26.7399 0.213601 27.2846 -0.0663987 27.7921 0.0134451L37.7026 1.44626C38.069 1.49876 38.337 1.55782 38.536 1.80829C38.757 2.08719 38.8215 2.39891 38.7635 2.77626L38.1379 6.89751L43.8954 7.71782C44.4445 7.79657 44.7332 8.39594 44.6545 8.89907L44.1087 12.3838C44.0321 12.8716 43.4995 13.2358 43.0423 13.1844L42.0612 13.075L39.6746 26.4877L37.7617 37.3377L38.8139 37.3705C39.2524 37.4995 39.7064 37.8955 39.7085 38.403L39.7249 43.5283L44.3898 45.9717L51.5517 49.8359C52.2495 50.1498 52.396 50.8608 52.0953 51.5072L51.1339 53.5766C50.9151 54.048 50.3409 54.5828 49.7415 54.2689L43.7773 51.1419L26.9139 42.4652Z" fill="#222840"/>
</svg>',
        ),
        'service-weak-soils' => array(
            'label' => 'Weak Soils',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M27.5111 28.2482C27.8906 28.1476 28.2199 28.3379 28.3402 28.6901C28.4463 29.0029 28.2275 29.3759 27.8885 29.5236C27.5855 29.6559 27.1885 29.4175 27.0681 29.1079C26.9314 28.7579 27.136 28.3478 27.5111 28.2482Z" fill="#222840"/>
  <path d="M30.415 31.0899C30.8044 31.0079 31.1106 31.2945 31.1533 31.5701C31.2134 31.9617 31.01 32.2876 30.6392 32.3478C30.3231 32.3981 30.0147 32.2264 29.902 31.8829C29.8036 31.5843 29.9961 31.1785 30.415 31.0899Z" fill="#222840"/>
  <path d="M24.7188 31.0965C25.0721 31.0375 25.3728 31.3689 25.4188 31.615C25.4888 31.9956 25.1803 32.2975 24.9255 32.3401C24.5197 32.4079 24.2397 32.199 24.1697 31.9037C24.0822 31.5307 24.2769 31.1698 24.7188 31.0965Z" fill="#222840"/>
  <path d="M22.5564 27.5593C22.9228 27.4992 23.2116 27.8218 23.2586 28.0723C23.3297 28.4573 23.0541 28.757 22.7664 28.804C22.3792 28.8675 22.1003 28.6782 22.026 28.3589C21.9461 28.0187 22.132 27.6282 22.5564 27.5593Z" fill="#222840"/>
  <path d="M32.5237 27.6435C32.8661 27.509 33.238 27.6348 33.3627 27.9749C33.4644 28.2528 33.378 28.6356 33.0542 28.7745C32.7655 28.8981 32.4056 28.8237 32.2109 28.4857C32.0633 28.2287 32.1475 27.7923 32.5227 27.6446L32.5237 27.6435Z" fill="#222840"/>
</svg>',
        ),
        'service-open-uneven-control-joints' => array(
            'label' => 'Open/Uneven Control Joints',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="48" viewBox="0 0 56 48" fill="none">
  <path d="M44.4667 42.9864C40.3006 43.6601 37.3541 42.3186 34.4249 43.0852C32.4296 43.6078 30.4586 43.4011 28.5829 42.5683C26.497 41.6427 25.1579 41.6113 23.0464 42.4197C20.8002 43.2803 18.54 43.6171 16.1359 43.6589C12.9652 43.7135 10.0058 43.2106 7.02675 42.1618C5.0767 41.4754 3.02445 41.5567 0.991948 41.7228C0.627258 41.753 0.307865 41.7507 0.119713 41.4719C-0.0243048 41.2582 -0.0486949 40.904 0.103453 40.6287C0.23934 40.3825 0.552927 40.3244 0.885096 40.2954C2.60634 40.1421 4.27648 40.0991 5.99772 40.4197L6.08251 39.357C6.09644 39.1897 6.60863 39.2002 6.75265 39.3C7.08018 39.53 6.78401 40.235 6.97913 40.5834C7.04301 40.6973 9.7956 41.6136 10.9373 41.7704L10.9745 40.3268C10.9826 40.0341 11.0523 39.8401 11.2079 39.6775C11.5528 39.3175 12.1034 39.5788 12.7561 39.4324L12.8432 34.9168C12.3821 34.9609 11.8595 34.8088 11.8606 34.3872L11.8676 32.3442L10.4518 32.2525C10.1417 32.2327 9.96053 32.1886 9.78747 32.0086C9.60629 31.8181 9.58422 31.5974 9.60861 31.3001L9.856 28.2955C9.88387 27.9598 9.91639 27.6915 10.144 27.486C10.3717 27.2804 10.6829 27.2502 11.0372 27.2804L13.8711 27.5173L14.0023 12.953C13.2567 12.7149 12.4878 12.7637 11.7027 12.7404C11.0395 12.7207 11.1649 11.0982 12.0674 10.4907L27.4087 0.155146C27.6979 -0.0399741 28.2113 -0.053911 28.4842 0.129595L33.5539 3.53724L43.5584 10.3281C44.6885 11.0958 45.0044 12.2886 44.4574 12.7706C43.9103 13.2526 42.9173 12.6371 41.8732 12.9053C41.7222 13.2538 41.836 13.5569 41.836 13.9321L41.8291 30.2362L44.8767 30.5533C45.1554 30.5823 45.3633 30.6427 45.5178 30.8262C45.6839 31.0237 45.7106 31.2769 45.6804 31.5754L45.3389 34.9307C45.2948 35.3593 44.7512 35.5149 44.3343 35.5033L44.2855 36.9679C44.2727 37.3593 43.8569 37.4499 43.5921 37.5684C43.4016 37.911 43.4887 38.3918 43.5352 38.8134L44.6072 38.8564C45.0288 38.8738 45.2878 39.2257 45.3122 39.6473L45.4109 41.3523L48.9359 40.357L48.9951 39.0318C49.0079 38.746 49.7674 38.674 49.786 38.9412L49.8778 40.2013C51.6571 39.9028 53.369 40.0968 55.1251 40.2815C55.5142 40.3221 55.8464 40.422 55.9579 40.7751C56.0589 41.0979 55.9927 41.5497 55.599 41.6624C54.6582 41.9319 52.3284 40.9365 48.433 41.9528L44.4667 42.9864Z" fill="#222840"/>
</svg>',
        ),
        'service-erosion-control-sinkhole' => array(
            'label' => 'Erosion Control & Sinkhole Remediation',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
  <path d="M39.4789 49.3674L37.9225 49.3893C36.4208 51.0332 34.5658 51.2203 32.4712 50.5673C32.1508 50.4678 31.8391 50.6985 31.5733 50.8374C29.8648 51.731 27.8556 51.6326 26.2008 50.6745C25.9416 50.5246 25.6047 50.7259 25.3739 50.8123C23.4281 51.544 21.3828 51.3646 19.8472 49.9504C19.6164 49.934 19.3933 49.9154 19.1855 49.9679C18.6834 50.0959 18.2361 50.0445 17.7406 49.9723C16.4467 49.7864 15.3431 48.989 14.9942 47.6896C14.3883 47.4381 13.9562 47.0465 13.522 46.5926C13.3098 46.3706 12.88 46.4143 12.6208 46.4132L10.8883 46.4045L6.52421 46.411C6.26171 46.411 6.08233 46.1453 6.07686 45.9495C6.06921 45.6618 6.27593 45.4453 6.58874 45.442L12.5136 45.3774C12.7203 45.3753 12.8953 45.2757 12.9861 45.1871C13.1151 45.0614 13.0375 44.7934 13.0495 44.6249C13.1786 42.8356 14.4812 41.429 16.2334 41.0506C16.2783 40.216 16.5528 39.539 17.0483 38.9451C16.5156 36.2851 18.4209 34.0265 21.0153 33.799C21.2756 33.776 21.4594 33.3243 21.4101 33.099C20.6642 32.4592 20.148 31.6399 19.9041 30.6818C19.7225 29.9654 19.1111 29.4973 18.4559 29.2239C17.0712 28.6474 16.2859 27.4334 16.4051 25.9262L16.5506 24.0942C16.5966 23.5199 16.2345 23.0234 16.1886 22.4798C16.112 21.5709 16.0234 20.709 15.4022 19.997C15.1484 19.706 14.7919 19.4107 14.3576 19.4096L6.20921 19.3878C5.92483 19.3878 5.84608 18.9623 5.89421 18.784C5.96858 18.5106 6.17421 18.3651 6.51874 18.3662L25.2733 18.3859C25.5675 18.3924 25.6889 18.8715 25.6375 19.0531C25.5817 19.2499 25.3739 19.6185 25.0578 19.6196L16.3887 19.6448C16.8142 20.4192 17.2025 21.2242 17.033 22.0554C16.9608 22.4065 17.0056 22.494 17.2134 22.7674C17.5623 23.2246 17.5908 23.9181 17.5306 24.4901L17.372 26.0017C17.2517 27.1501 17.9342 28.0032 18.9689 28.4046C19.9019 28.7667 20.6259 29.5049 20.8764 30.4653C21.0864 31.2692 21.5053 31.9473 22.2381 32.3903C22.9917 31.8368 23.8601 31.5918 24.7811 31.582C25.433 30.8962 26.18 30.4259 27.1676 30.3701L27.1305 28.4385L26.7148 27.0309L26.6875 25.6232L26.5311 25.1956V15.2381L25.2831 15.2053C25.0348 15.1987 24.6958 14.8804 24.6969 14.6048L24.7056 11.609C24.7067 11.1824 25.2066 10.9593 25.6211 10.9801L25.6517 9.16994C25.6583 8.75213 26.0564 8.4776 26.5059 8.46885L26.5453 5.46541C26.6787 3.39166 28.3905 1.56291 30.5419 1.55635L42.6661 1.51807C43.0981 1.51698 43.587 1.86588 43.587 2.26619V4.17588C43.587 4.56744 43.1616 4.8901 42.7591 4.89119L31.1566 4.90541C30.5725 4.90541 30.1591 5.44244 30.1558 5.95432L30.1405 8.12323C30.1361 8.69198 31.0133 8.34963 31.0231 9.24213L31.0439 10.9878C31.442 10.9539 31.955 11.1726 31.9561 11.5959L31.9637 14.6114C31.9637 15.0215 31.4956 15.249 31.1478 15.2206C30.8 15.1921 30.567 15.1899 30.1908 15.2479L30.1842 19.5332L30.182 24.8751C30.182 25.1901 30.1241 25.3334 29.9983 25.6342C29.8473 25.9951 30.0081 26.5004 29.9819 26.8974C29.9458 27.4389 29.5969 27.907 29.5903 28.4232L29.5641 30.3712C30.5823 30.3799 31.3523 30.8699 32.0217 31.5732L33.3714 31.7187C34.0462 31.5885 34.4466 30.8546 34.65 30.2443C34.9825 29.2457 35.4769 28.3784 36.4317 27.8665C37.4937 27.2967 38.1894 26.3374 38.3578 25.1015C38.5405 23.7573 38.0909 22.7959 38.7603 22.4185C38.3261 21.6299 38.815 20.487 39.375 19.6459L31.5875 19.6098C31.3162 19.6087 31.1412 19.2292 31.103 19.0454C31.0614 18.8485 31.1806 18.3749 31.5076 18.3749L49.7142 18.3585C50.0205 18.3585 50.1287 18.702 50.1156 18.9076C50.1025 19.1132 49.9089 19.3724 49.6212 19.3735L41.3241 19.4085C40.8789 19.4107 40.4447 19.8603 40.2161 20.161C39.6233 20.9431 39.2558 22.5224 39.3608 23.4521C39.5926 25.5018 38.9889 27.5712 37.1394 28.5621C35.3959 29.4951 35.9395 30.8524 34.7069 32.0895C34.5669 32.2295 34.5384 32.5642 34.7112 32.6954C35.0733 32.9689 35.1892 33.4906 35.4834 33.7782L36.9348 34.3349C38.4978 35.2242 39.4111 36.8571 39.1628 38.6542C39.1366 38.8445 39.212 39.1803 39.4089 39.2492C41.3383 39.924 42.5939 41.7134 42.1498 43.7434C42.1061 43.9457 42.1947 44.136 42.3139 44.2739C42.7459 44.7781 42.5611 45.3217 43.1714 45.3239L49.3784 45.3403C49.6519 45.3403 49.7448 45.6782 49.7339 45.8631C49.7208 46.0742 49.5884 46.3257 49.3051 46.3268L43.1758 46.3443C42.8301 46.3443 42.7284 46.6079 42.6475 46.8748C42.222 48.2704 40.9544 49.1881 39.4789 49.3674Z" fill="#222840"/>
</svg>',
        ),
    );
}

/**
 * File-based icons used by the Causes and Advantage sections
 * (assets/icons-red/*.svg in the theme). Keyed by slug.
 *
 * @return array
 */
function rectify_pb_get_file_icons()
{
    return array(
        'cause-reactive-soil' => array('label' => 'Reactive Soil', 'path' => 'icons-red/Rectify Icon Set_Pipe Abandonment_red.svg'),
        'cause-water-leaks' => array('label' => 'Water Leaks', 'path' => 'icons-red/Rectify Icon Set_Warehouse_red.svg'),
        'cause-ground-settlement' => array('label' => 'Ground Settlement', 'path' => 'icons-red/Rectify Icon Set_Victoria_red.svg'),
        'cause-trees-vegetation' => array('label' => 'Trees & Vegetation', 'path' => 'icons-red/Rectify Icon Set_Pipe Abandonment_red.svg'),
        'adv-experience' => array('label' => 'Unrivalled Experience', 'path' => 'icons-red/Rectify Icon prof.svg'),
        'adv-technology' => array('label' => 'Cutting-Edge Technology', 'path' => 'icons-red/Rectify Icon Set_Engineered Fill.svg'),
        'adv-delivery' => array('label' => 'Seamless Delivery', 'path' => 'icons-red/Rectify Icon Set_Corrective Method.svg'),
        'adv-affordable' => array('label' => 'Affordable Solutions', 'path' => 'icons-red/Rectify Icon Set_Request Assessment_red.svg'),
        'adv-quality' => array('label' => 'Quality Assurance', 'path' => 'icons-red/Rectify Icon Set_Certifications and Compliance.svg'),
        'adv-trustworthy' => array('label' => 'Trustworthy Company', 'path' => 'icons-red/Rectify Icon Set_Call Expert.svg'),
        'adv-home-experience' => array('label' => 'Unrivalled Experience (Homepage Style)', 'path' => 'icons-red/home-advantage/unrivalled-experience.svg'),
        'adv-home-technology' => array('label' => 'Cutting-Edge Technology (Homepage Style)', 'path' => 'icons-red/home-advantage/cutting-edge-technology.svg'),
        'adv-home-delivery' => array('label' => 'Seamless Delivery (Homepage Style)', 'path' => 'icons-red/home-advantage/seamless-delivery.svg'),
        'adv-home-affordable' => array('label' => 'Affordable Solutions (Homepage Style)', 'path' => 'icons-red/home-advantage/affordable-solutions.svg'),
        'adv-home-quality' => array('label' => 'Quality Assurance (Homepage Style)', 'path' => 'icons-red/home-advantage/quality-assurance.svg'),
        'adv-home-trustworthy' => array('label' => 'Environmentally Conscious (Homepage Style)', 'path' => 'icons-red/home-advantage/save-environment.svg'),
        'ar-chemical-underpinning' => array('label' => 'About Rectify: Chemical Underpinning', 'path' => 'images/about-rectify/icon-chemical-underpinning.svg'),
        'ar-slab-lifting' => array('label' => 'About Rectify: Slab Lifting', 'path' => 'images/about-rectify/icon-slab-lifting.svg'),
        'ar-house-relevelling' => array('label' => 'About Rectify: House Relevelling', 'path' => 'images/about-rectify/icon-house-relevelling.svg'),
        'ar-ground-improvement' => array('label' => 'About Rectify: Ground Improvement', 'path' => 'images/about-rectify/icon-ground-improvement.svg'),
        'ar-weak-soil' => array('label' => 'About Rectify: Weak Soil Treatment', 'path' => 'images/about-rectify/icon-weak-soil.svg'),
        'ar-structural-movement' => array('label' => 'About Rectify: Structural Movement Rectification', 'path' => 'images/about-rectify/icon-structural-movement.svg'),
        'ar-erosion-control' => array('label' => 'About Rectify: Erosion Control', 'path' => 'images/about-rectify/icon-erosion-control.svg'),
        'ar-foundation-performance' => array('label' => 'About Rectify: Foundation Performance', 'path' => 'images/about-rectify/icon-foundation-performance.svg'),
        'ar-leak-sealing' => array('label' => 'About Rectify: Leak Sealing', 'path' => 'images/about-rectify/icon-leak-sealing.svg'),
        'ar-cta-call' => array('label' => 'About Rectify CTA: Call Us', 'path' => 'images/about-rectify/icon-cta-call.svg'),
        'ar-cta-estimate' => array('label' => 'About Rectify CTA: Estimate Project Cost', 'path' => 'images/about-rectify/icon-cta-estimate.svg'),
        'ar-cta-resources' => array('label' => 'About Rectify CTA: Explore Resources', 'path' => 'images/about-rectify/icon-cta-resources.svg'),
        'commercial-ground-improvement' => array('label' => 'Ground Improvement', 'path' => 'images/commercial-archive/ground-improvement.svg'),
        'commercial-void-filling' => array('label' => 'Void Filling', 'path' => 'images/commercial-archive/void-filling.svg'),
        'commercial-realignment-levelling' => array('label' => 'Re-Alignment & Levelling', 'path' => 'images/commercial-archive/realignment.svg'),
        'commercial-leak-sealing' => array('label' => 'Leak Sealing & Water Stopping', 'path' => 'images/commercial-archive/leak-sealing.svg'),
        'commercial-slab-lifting' => array('label' => 'Slab Lifting', 'path' => 'images/commercial-archive/slab-lifting.svg'),
        'commercial-protective-coatings' => array('label' => 'Protective Coatings & Concrete Repair', 'path' => 'images/commercial-archive/concrete-repair.svg'),
        'commercial-engineered-fill' => array('label' => 'Engineered Fill', 'path' => 'images/commercial-archive/engineered-fill.svg'),
        'commercial-pipe-abandonment' => array('label' => 'Pipe Abandonment', 'path' => 'images/commercial-archive/pipe-abandonment.svg'),
        'commercial-preventative-ground-improvement' => array('label' => 'Preventative Ground Improvement', 'path' => 'images/commercial-archive/preventative-ground-improvement.svg'),
        'commercial-civil-energy-utilities' => array('label' => 'Civil, Energy and Utilities', 'path' => 'images/commercial-archive/civil-energy-utilities.svg'),
        'commercial-hospital-remediation' => array('label' => 'Hospital Asset Remediation', 'path' => 'images/commercial-archive/hospital-remediation.svg'),
        'commercial-undermining-treatment' => array('label' => 'Undermining Treatment', 'path' => 'images/commercial-archive/undermining-treatment.svg'),
        'commercial-call-expert' => array('label' => 'Call Expert', 'path' => 'images/commercial-archive/call-expert.svg'),
        'commercial-estimate-project-cost' => array('label' => 'Estimate Project Cost', 'path' => 'images/commercial-archive/estimate-project-cost.svg'),
        'commercial-explore-resources' => array('label' => 'Explore Resources', 'path' => 'images/commercial-archive/explore-resources.svg'),
        'commercial-house-relevelling' => array('label' => 'House Relevelling', 'path' => 'icons/Rectify Icon Set_House Relevelling.svg'),
        'commercial-slab-lifting-2' => array('label' => 'Slab Lifting', 'path' => 'icons/Rectify Icon Set_Slab Lifting.svg'),
        'res-chemical-underpinning' => array('label' => 'Chemical Underpinning', 'path' => 'icons-red/Rectify Icon Set_Chemical Underpinning.svg'),
        'res-foundation-repair' => array('label' => 'Foundation Repair', 'path' => 'icons-red/Rectify Icon Set_Foundation Repair.svg'),
        'res-slab-lifting' => array('label' => 'Slab Lifting', 'path' => 'icons-red/Rectify Icon Set_Slab Lifting 3.png'),
        'res-house-relevelling' => array('label' => 'House Relevelling', 'path' => 'icons-red/Rectify Icon Set_House Relevelling.svg'),
        'res-driveway-relevelling' => array('label' => 'Driveway Relevelling', 'path' => 'icons-red/Rectify Icon Set_Driveway Relevelling.svg'),
        'res-brick-fence-relevelling' => array('label' => 'Mailbox & Brick Fence Relevelling', 'path' => 'icons-red/Rectify Icon Set_Brick Fence Revelling.svg'),
        'res-heritage-building' => array('label' => 'Basement Construction Support', 'path' => 'icons-red/Rectify Icon Set_Heritage Building.svg'),
        'res-sand-permeation' => array('label' => 'Sand Permeation', 'path' => 'icons-red/Rectify Icon Set_Sand Permeation_red.svg'),
        'res-ground-improvement' => array('label' => 'Ground Improvement', 'path' => 'icons-red/Rectify Icon Set_Ground Improvement.svg'),
        'ground-corrective-method' => array('label' => 'Ground Improvement Required', 'path' => 'icons-red/Rectify Icon Set_Corrective Method.svg'),
        'res-proven-techniques' => array('label' => 'Proven Techniques, Experienced Team', 'path' => 'icons-red/Rectify Icon prof.svg'),
        'res-low-impact' => array('label' => 'Low-impact Delivery', 'path' => 'icons-red/Rectify Icon Set_Call Expert.svg'),
        'res-engineering-assurance' => array('label' => 'Engineering Assurance', 'path' => 'icons-red/Rectify Icon Set_Certifications and Compliance.svg'),
        'basement-corrective-method' => array('label' => 'Corrective Method (Basement, Figma)', 'path' => 'icons-red/basement/corrective-method.svg'),
        'com-worker' => array('label' => 'Slab Lifting & Relevelling (worker)', 'path' => 'icons-red/worker 1.svg'),
        'civil-transport' => array('label' => 'Civil and Transport', 'path' => 'icons-red/Rectify Icon Set_Civil and Transport.svg'),
        'civil-energy' => array('label' => 'Energy', 'path' => 'icons-red/Rectify Icon Set_Energy.svg'),
        'civil-utilities-water' => array('label' => 'Utilities and Water', 'path' => 'icons-red/Rectify Icon Set_Utilities and Water_red.svg'),
        'civil-figma-transport' => array('label' => 'Civil and Transport (Figma)', 'path' => 'images/civil-energy-utilities/civil-transport.svg'),
        'civil-figma-energy' => array('label' => 'Energy (Figma)', 'path' => 'images/civil-energy-utilities/energy.svg'),
        'civil-figma-utilities-water' => array('label' => 'Utilities and Water (Figma)', 'path' => 'images/civil-energy-utilities/utilities-water.svg'),
        'civil-figma-proven' => array('label' => 'Proven Techniques (Figma)', 'path' => 'images/civil-energy-utilities/why-proven.svg'),
        'civil-figma-low-impact' => array('label' => 'Low-impact Delivery (Figma)', 'path' => 'images/civil-energy-utilities/why-low-impact.svg'),
        'civil-figma-engineering' => array('label' => 'Engineering Assurance (Figma)', 'path' => 'images/civil-energy-utilities/why-engineering.png'),
        'icon-hospital' => array('label' => 'Hospital', 'path' => 'icons-red/Rectify Icon Set_Hospital.svg'),
        'chemical-residential-homes' => array('label' => 'Residential Homes', 'path' => 'images/residential/chemical-underpinning/use-residential-home.svg'),
        'chemical-house-extensions' => array('label' => 'House Extensions', 'path' => 'images/residential/chemical-underpinning/use-house-extensions.svg'),
        'chemical-settlement-cracking' => array('label' => 'Settlement Caused by Reactive Soil', 'path' => 'images/residential/chemical-underpinning/use-reactive-soil.svg'),
        'chemical-void-fill-slabs' => array('label' => 'Raft Slab Foundations', 'path' => 'images/residential/chemical-underpinning/use-raft-slab.svg'),
        'chemical-drainage' => array('label' => 'Waffle Slab Foundations', 'path' => 'images/residential/chemical-underpinning/use-waffle-slab.svg'),
        'chemical-damage-prevention' => array('label' => 'Garage', 'path' => 'images/residential/chemical-underpinning/use-garage.svg'),
        'chemical-void-foundation' => array('label' => 'Void Remediation beneath Foundations', 'path' => 'images/residential/chemical-underpinning/use-void-foundation.svg'),
        'chemical-floor-slab' => array('label' => 'Internal Floor Slab', 'path' => 'images/residential/chemical-underpinning/use-floor-slab.svg'),
        'chemical-minimal-excavation' => array('label' => 'Minimal Excavation', 'path' => 'icons-red/Rectify Icon Set_Ground Improvement.svg'),
        'chemical-faster-installation' => array('label' => 'Faster Installation', 'path' => 'icons-red/Rectify Icon Set_Corrective Method.svg'),
        'chemical-monolithic-void-fill' => array('label' => 'Monolithic Void Fill', 'path' => 'icons-red/Rectify Icon Set_Concrete Repair.svg'),
        'chemical-lower-cost' => array('label' => 'Lower Cost', 'path' => 'icons-red/Rectify Icon Set_Engineered Fill.svg'),
        'chemical-why-engineering-led' => array('label' => 'Engineering-Led Solutions', 'path' => 'images/residential/chemical-underpinning/why-engineering.svg'),
        'chemical-why-structural-expertise' => array('label' => 'Proven Structural Expertise', 'path' => 'images/residential/chemical-underpinning/why-expertise.svg'),
        'chemical-why-non-invasive' => array('label' => 'Non-Invasive Technology', 'path' => 'images/residential/chemical-underpinning/why-non-invasive.svg'),
        'chemical-why-long-term' => array('label' => 'Long-Term Confidence', 'path' => 'images/commercial-ground-improvement/icon-services-longterm.png'),
        'sand-permeation-risk' => array('label' => 'Sand Permeation Risk', 'path' => 'icons-red/Rectify Icon Set_Sand Permeation_red.svg'),
        'sand-check' => array('label' => 'Check', 'path' => 'icons-red/Rectify Icon Set_Check_red.svg'),
        'chemical-damage' => array('label' => 'Damage (reactive soil)', 'path' => 'icons-red/Rectify Icon Set_Reactive Soil_red.svg'),
        'chemical-damage-water' => array('label' => 'Damage (water)', 'path' => 'icons-red/Rectify Icon Set_Water leaking_red.svg'),
        'chemical-damage-void' => array('label' => 'Damage (undermining)', 'path' => 'icons-red/Rectify Icon Set_Void Beneath Foundation_red.svg'),
        'chemical-damage-load' => array('label' => 'Damage (load/strength)', 'path' => 'icons-red/Rectify Icon Set_Slab Lifting_red.svg'),
        'chemical-damage-workmanship' => array('label' => 'Damage (workmanship)', 'path' => 'icons-red/Rectify Icon Set_Corrective Method.svg'),
        'cracked-reactive-soil' => array('label' => 'Reactive Soil', 'path' => 'icons-red/Rectify Icon Set_Reactive Soil_red.svg'),
        'cracked-void-filling' => array('label' => 'Void Filling / Poor Compaction', 'path' => 'icons-red/Rectify Icon Set_Void Filling_red.svg'),
        'cracked-water-leaking' => array('label' => 'Water Leaking', 'path' => 'icons-red/Rectify Icon Set_Water leaking_red.svg'),
        'cracked-trees-vegetation' => array('label' => 'Trees & Vegetation', 'path' => 'icons-red/Rectify Icon Set_Trees and Vegetation_red.svg'),
        'cracked-sinkhole' => array('label' => 'Erosion / Sinkhole Remediation', 'path' => 'icons-red/Rectify Icon Set_Sinkhole Remediation_red.svg'),
        'cracked-underpinning' => array('label' => 'Underpinning / Ageing Foundations', 'path' => 'icons-red/Rectify Icon Set_Underpinning_red.svg'),
        'cracked-void-beneath-foundation' => array('label' => 'Void Beneath Foundation', 'path' => 'icons-red/Rectify Icon Set_Void Beneath Foundation_red.svg'),
        'cracked-realignment' => array('label' => 'Realignment / Subsidence', 'path' => 'icons-red/Rectify Icon Set_Realignment_red.svg'),
        'contact-office-vic' => array('label' => 'Head Office (Victoria)', 'path' => 'icons-red/Rectify Icon Set_Victoria_red.svg'),
        'contact-office-tas' => array('label' => 'Tasmania Office', 'path' => 'icons-red/Rectify Icon Set_Tasmania_red.svg'),
        'contact-office-sa' => array('label' => 'South Australia Office', 'path' => 'icons-red/Rectify Icon Set_Adelaide.svg'),
        'contact-explore-resources' => array('label' => 'Explore Resources', 'path' => 'icons-red/Rectify Icon Set_Explore Resources.svg'),
        'loc-office-vic' => array('label' => 'Locations — Head Office', 'path' => 'images/our-locations/office-victoria.svg'),
        'loc-office-tas' => array('label' => 'Locations — Tasmania Office', 'path' => 'images/our-locations/office-tasmania.svg'),
        'loc-office-sa' => array('label' => 'Locations — South Australia Office', 'path' => 'images/our-locations/office-adelaide.svg'),
        'loc-cta-call' => array('label' => 'Locations — Call Us', 'path' => 'images/our-locations/cta-call-expert.svg'),
        'loc-cta-estimate' => array('label' => 'Locations — Estimate Project Cost', 'path' => 'images/our-locations/cta-estimate-cost.svg'),
        'loc-cta-resources' => array('label' => 'Locations — Explore Resources', 'path' => 'images/our-locations/cta-explore-resources.svg'),
        'commercial-pipe-abandonment-red' => array('label' => 'Pipe Abandonment', 'path' => 'icons-red/Rectify Icon Set_Pipe Abandonment_red.svg'),
        'commercial-slab-lifting-red' => array('label' => 'Slab Lifting', 'path' => 'icons-red/Rectify Icon Set_Slab Lifting_red.svg'),
        'commercial-concrete-repair-red' => array('label' => 'Concrete Repair', 'path' => 'icons-red/Rectify Icon Set_Concrete Repair.svg'),
        'cert-professionalism' => array('label' => 'Certifications: Professionalism', 'path' => 'icons-red/cert-standards/professionalism.svg'),
        'cert-safe-work' => array('label' => 'Certifications: Safe Work Practices', 'path' => 'icons-red/cert-standards/safe-work-practices.svg'),
        'cert-structured-delivery' => array('label' => 'Certifications: Structured Delivery', 'path' => 'icons-red/cert-standards/structured-delivery.svg'),
        'cert-documentation' => array('label' => 'Certifications: Documentation & Communication', 'path' => 'icons-red/cert-standards/documentation-communication.svg'),
        'cert-operational-systems' => array('label' => 'Certifications: Responsible Operational Systems', 'path' => 'icons-red/cert-standards/operational-systems.svg'),
        'cert-compliance-maturity' => array('label' => 'Certifications: Compliance Maturity', 'path' => 'icons-red/cert-standards/compliance-maturity.svg'),
        'ii-transport-infrastructure' => array('label' => 'Industries: Transport Infrastructure', 'path' => 'icons-red/Rectify Icon Set_Transport Infrastructure_red.svg'),
        'ii-ta-civil-transport' => array('label' => 'Transport Assets: Civil and Transport', 'path' => 'images/industries/transport-assets/civil-transport.svg'),
        'ii-challenge-roads' => array('label' => 'Industries Challenge: Roads & Pavements', 'path' => 'images/commercial-engineered-fill/icon-roads-pavements.svg'),
        'ii-challenge-bridges' => array('label' => 'Industries Challenge: Bridges & Structures', 'path' => 'images/commercial-engineered-fill/icon-bridges-structures.svg'),
        'ii-challenge-water' => array('label' => 'Industries Challenge: Water Ingress', 'path' => 'icons-red/Rectify Icon Set_Water leaking_red.svg'),
        'ii-challenge-utility' => array('label' => 'Industries Challenge: Utility Infrastructure', 'path' => 'images/commercial-engineered-fill/icon-utility-infrastructure.svg'),
        'ii-challenge-industrial' => array('label' => 'Industries Challenge: Commercial/Industrial', 'path' => 'images/commercial-engineered-fill/icon-commercial-industrial.svg'),
        'ii-challenge-rail' => array('label' => 'Industries Challenge: Rail & Transport', 'path' => 'images/commercial-engineered-fill/icon-rail-transport.svg'),
        'ii-ground-improvement' => array('label' => 'Industries: Ground Improvement', 'path' => 'images/commercial-archive/ground-improvement.svg'),
        'ii-void-filling' => array('label' => 'Industries: Void Filling', 'path' => 'images/commercial-archive/void-filling.svg'),
        'ii-slab-lifting' => array('label' => 'Industries: Slab Lifting & Relevelling', 'path' => 'images/commercial-archive/slab-lifting.svg'),
        'ii-chemical-underpinning' => array('label' => 'Industries: Chemical Underpinning', 'path' => 'icons-red/Rectify Icon Set_Chemical Underpinning.svg'),
        'ii-ta-ground-improvement' => array('label' => 'Transport Assets: Ground Improvement', 'path' => 'images/industries/transport-assets/ground-improvement.svg'),
        'ii-ta-void-filling' => array('label' => 'Transport Assets: Void Filling', 'path' => 'images/industries/transport-assets/void-filling.svg'),
        'ii-ta-slab-lifting' => array('label' => 'Transport Assets: Slab Lifting and Relevelling', 'path' => 'images/industries/transport-assets/slab-lifting.svg'),
        'ii-ta-chemical-underpinning' => array('label' => 'Transport Assets: Chemical Underpinning', 'path' => 'images/industries/transport-assets/chemical-underpinning.svg'),
        'ii-call-expert' => array('label' => 'Industries CTA: Talk to Our Engineering Team', 'path' => 'images/commercial-archive/call-expert.svg'),
        'ii-estimate-cost' => array('label' => 'Industries CTA: Estimate Project Cost', 'path' => 'images/commercial-archive/estimate-project-cost.svg'),
        'ii-explore-resources' => array('label' => 'Industries CTA: Explore Resources', 'path' => 'images/commercial-archive/explore-resources.svg'),
        'ii-ta-call-expert' => array('label' => 'Transport Assets CTA: Talk to Our Engineering Team', 'path' => 'images/industries/transport-assets/call-expert.svg'),
        'ii-ta-estimate-cost' => array('label' => 'Transport Assets CTA: Estimate Project Cost', 'path' => 'images/industries/transport-assets/estimate-project-cost.svg'),
        'ii-ta-explore-resources' => array('label' => 'Transport Assets CTA: Explore Resources', 'path' => 'images/industries/transport-assets/explore-resources.svg'),
        'ii-commercial-building' => array('label' => 'Industries: Commercial Building', 'path' => 'images/industries/commercial-buildings/icon-commercial-building.svg'),
        'ii-cb-commercial-building' => array('label' => 'Commercial Buildings: Commercial Building', 'path' => 'images/industries/commercial-buildings/commercial-building.svg'),
        'ii-cb-chemical-underpinning' => array('label' => 'Commercial Buildings: Chemical Underpinning', 'path' => 'images/industries/commercial-buildings/chemical-underpinning.svg'),
        'ii-cb-ground-improvement' => array('label' => 'Commercial Buildings: Ground Improvement', 'path' => 'images/industries/commercial-buildings/ground-improvement.svg'),
        'ii-cb-slab-lifting' => array('label' => 'Commercial Buildings: Slab Lifting and Relevelling', 'path' => 'images/industries/commercial-buildings/slab-lifting.svg'),
        'ii-cb-void-filling' => array('label' => 'Commercial Buildings: Void Filling', 'path' => 'images/industries/commercial-buildings/void-filling.svg'),
        'ii-cb-call-expert' => array('label' => 'Commercial Buildings CTA: Talk to Our Engineering Team', 'path' => 'images/industries/commercial-buildings/call-expert.svg'),
        'ii-cb-estimate-cost' => array('label' => 'Commercial Buildings CTA: Estimate Project Cost', 'path' => 'images/industries/commercial-buildings/estimate-project-cost.svg'),
        'ii-cb-explore-resources' => array('label' => 'Commercial Buildings CTA: Explore Resources', 'path' => 'images/industries/commercial-buildings/explore-resources.svg'),
        'ii-utility-infrastructure' => array('label' => 'Industries: Utility Infrastructure', 'path' => 'images/industries/utilities-energy/icon-utility-infrastructure.svg'),
        'ii-civil-infrastructure' => array('label' => 'Industries: Civil Infrastructure', 'path' => 'images/industries/utilities-energy/icon-civil-infrastructure.svg'),
        'ii-concrete-repair' => array('label' => 'Industries: Concrete Repair', 'path' => 'images/commercial-archive/concrete-repair.svg'),
        'ii-mining-operations' => array('label' => 'Industries: Mining Operations', 'path' => 'images/industries/mining-resources/icon-mining-operations.svg'),
        'ii-warehouse' => array('label' => 'Industries: Warehouse / Industrial Facility', 'path' => 'images/industries/industrial-facilities/icon-warehouse.svg'),
        'ii-residential-home' => array('label' => 'Industries: Residential Home', 'path' => 'images/industries/residential-strata/icon-residential-home.svg'),
        'ii-foundation-repair' => array('label' => 'Industries: Foundation Repair', 'path' => 'images/industries/residential-strata/icon-foundation-repair.svg'),
        'ii-mc-marine-structure' => array('label' => 'Marine & Coastal: Marine Structure', 'path' => 'images/industries/marine-coastal/marine-structure.svg'),
        'ii-mc-ground-improvement' => array('label' => 'Marine & Coastal: Ground Improvement', 'path' => 'images/industries/marine-coastal/ground-improvement.svg'),
        'ii-mc-chemical-underpinning' => array('label' => 'Marine & Coastal: Chemical Underpinning', 'path' => 'images/industries/marine-coastal/chemical-underpinning.svg'),
        'ii-mc-void-filling' => array('label' => 'Marine & Coastal: Void Filling', 'path' => 'images/industries/marine-coastal/void-filling.svg'),
        'ii-mc-concrete-repair' => array('label' => 'Marine & Coastal: Concrete Repair', 'path' => 'images/industries/marine-coastal/concrete-repair.svg'),
    );
}
