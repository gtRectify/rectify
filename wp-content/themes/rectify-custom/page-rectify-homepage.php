<?php
/**
 * Template Name: Rectify Homepage Draft 2 - Pixel Match
 * Description: Self-contained WordPress page template based on the supplied Rectify homepage design.
 * Install: place this file and the rectify-homepage-draft2-v3 folder in your active theme root, then assign this template to a page.
 */
$rx_uri = trailingslashit(get_stylesheet_directory_uri()) . 'rectify-homepage-draft2-v3/assets';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo esc_url($rx_uri . '/css/rectify-home.css'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class('rx-template-clean'); ?>>
<?php wp_body_open(); ?>
<?php
function rx_icon_svg(){
  return '<span class="rx-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v18M8 7h8M7 12h10M9 17h6"/><path d="M6 21c2-3 2-6 0-9M18 21c-2-3-2-6 0-9"/></svg></span>';
}
$services = ['Underpinning','Slabjacking','Building Stabilisation','Concrete Levelling','Retaining Wall & Asset Stabilisation','Void Filling','Commercial Ground Solutions','Infrastructure & Asset Support'];
$causes = [
  ['Reactive Soil','Clay soils expand and shrink as moisture levels change, causing movement beneath slabs and footings.'],
  ['Water Leaks','Broken stormwater, sewer and plumbing lines can soften the ground and reduce foundation support.'],
  ['Ground Settlement','Poorly compacted or weak ground can compress over time and lead to uneven floors or cracks.'],
  ['Trees & Vegetation','Tree roots and landscaping can remove moisture from reactive soils and contribute to movement.']
];
$adv = [
  ['Unrivalled Experience','Specialist crews, proven systems and experience across residential, commercial and civil assets.'],
  ['Quick & Non-Invasive Technology','Resin injection solutions designed to limit excavation, mess and disruption.'],
  ['Service-Led Delivery','Clear communication from first call through site report, levels and completion.'],
  ['Affordable Solutions','Practical options that help avoid unnecessary demolition or major reconstruction.'],
  ['Quality Assurance','Performance is checked, recorded and verified with site reporting and levels.'],
  ['Trustworthy Company','A professional team focused on safe work, lasting results and client confidence.']
];
$faqs = ['Why can my house crack?','Are cracks getting worse?','Is foundation movement dangerous?','How much does stabilisation cost?','How do I choose a solution?','Will I need excavation?'];
?>
<main class="rx-home" id="top">
  <div class="rx-top-strip">We support Australia’s homes, businesses and infrastructure with engineered ground improvement</div>
  <header class="rx-primary-nav" aria-label="Rectify main header">
    <div class="rx-wrap rx-nav-inner">
      <a class="rx-logo" href="<?php echo esc_url(home_url('/')); ?>"><span class="rx-logo-mark"></span>Rectify</a>
      <div class="rx-nav-contact"><span class="rx-phone">☎ 1300 301 319</span><a class="rx-btn rx-btn-red" href="<?php echo esc_url(home_url('/contact/')); ?>">Get in touch</a></div>
    </div>
  </header>
  <nav class="rx-menu-bar" aria-label="Homepage navigation"><div class="rx-wrap"><ul class="rx-menu"><li class="is-active"><a href="#top">Home</a></li><li><a href="#services">Services</a></li><li><a href="#projects">Projects</a></li><li><a href="#resources">Resources</a></li><li><a href="#about">About</a></li><li><a href="#contact">Contact</a></li></ul></div></nav>

  <section class="rx-hero" style="--rx-hero:url('<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/rectify-banner.png'); ?>')">
    <div class="rx-wrap"><div class="rx-hero-copy rx-reveal"><h1>Australia’s Structural<br>Stabilisation &amp; Asset<br>Performance Specialists</h1><p>We help protect homes, buildings and assets with engineered ground improvement solutions that reduce disruption and deliver verified results.</p><div class="rx-hero-actions"><a class="rx-btn rx-btn-red" href="#contact">Get a quote</a><a class="rx-btn rx-btn-ghost" href="#projects">View our work <span class="arr">→</span></a></div></div></div>
  </section>

  <section class="rx-services" id="services"><div class="rx-wrap rx-grid-2"><div class="rx-reveal"><span class="rx-kicker">Core Services</span><h2 class="rx-title">Engineered Solutions<br>With Minimal Disruption</h2><p class="rx-lead">Our specialised resin injection and stabilisation systems are designed to restore support, fill voids and improve performance without major excavation.</p><a class="rx-btn rx-btn-outline" href="<?php echo esc_url(home_url('/services/')); ?>">Explore our services <span class="arr">→</span></a></div><div class="rx-service-grid rx-stagger"><?php foreach($services as $i=>$s): ?><div class="rx-service <?php echo $i===0 ? 'is-featured' : ''; ?>"><?php echo rx_icon_svg(); ?><span><?php echo esc_html($s); ?></span></div><?php endforeach; ?></div></div></section>

  <section class="rx-signs"><div class="rx-wrap rx-grid-2"><div class="rx-reveal"><h2 class="rx-title">Do these signs look<br>familiar?</h2><p>These are common warning signs that your property may be moving.</p></div><img class="rx-signs-img rx-reveal" src="<?php echo esc_url($rx_uri . '/images/signs-grid.jpg'); ?>" alt="Common signs of structural movement"></div></section>

  <section class="rx-causes"><div class="rx-wrap"><div class="rx-row-head rx-reveal"><h2 class="rx-title">What Causes Structural<br>Movement?</h2><p class="rx-lead">Structural movement is often caused by changing soil conditions, moisture, drainage issues, settlement and nearby vegetation. The right repair starts with understanding the cause.</p></div><div class="rx-cause-grid rx-stagger"><?php foreach($causes as $c): ?><article class="rx-cause-card"><?php echo rx_icon_svg(); ?><h3><?php echo esc_html($c[0]); ?></h3><p><?php echo esc_html($c[1]); ?></p></article><?php endforeach; ?></div></div></section>

  <section class="rx-advantage" id="about"><div class="rx-wrap"><div class="rx-grid-2 rx-reveal"><div><span class="rx-kicker">Our Advantage</span><h2 class="rx-title">Why Homeowners<br>Choose Rectify</h2></div><p>From initial advice to site reporting, our team focuses on engineered outcomes, minimal disruption and clear communication. We help clients understand the problem, choose the right solution and verify the result.</p></div><div class="rx-advantage-grid rx-stagger"><?php foreach($adv as $a): ?><article class="rx-adv-card"><?php echo rx_icon_svg(); ?><h3><?php echo esc_html($a[0]); ?></h3><p><?php echo esc_html($a[1]); ?></p></article><?php endforeach; ?></div></div></section>

  <section class="rx-performance"><div class="rx-wrap rx-reveal"><h2 class="rx-title">Engineered. Rectified. Performance Verified.</h2><p class="rx-lead">See how stabilisation work can improve and verify the performance of a structure.</p><div class="rx-compare"><img src="<?php echo esc_url($rx_uri . '/images/before-after.jpg'); ?>" alt="Before and after comparison"></div><span class="rx-slider-dot" aria-hidden="true"></span></div></section>

  <section class="rx-reputation"><div class="rx-wrap"><div class="rx-row-head rx-reveal"><div><h2 class="rx-title">A Reputation<br>Built On Results</h2><p class="rx-lead">Our team is trusted by clients, builders and property partners.</p></div><div class="rx-google"><div class="rx-google-word"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div><div><div class="rx-rating">4.9<span class="rx-stars">★★★★★</span></div><a class="rx-btn rx-btn-outline" href="#reviews">Read our Google reviews <span class="arr">→</span></a></div></div></div><img class="rx-review-img rx-reveal" src="<?php echo esc_url($rx_uri . '/images/review-strip.jpg'); ?>" alt="Customer review cards"></div></section>

  <section class="rx-customers"><div class="rx-wrap rx-reveal"><h2 class="rx-title">Our Happy Customers</h2><p class="rx-lead">We work with homeowners, engineers, builders, facilities managers and asset owners.</p><div class="rx-logo-row"><span class="rx-logo-pill">HBCM</span><span class="rx-logo-pill small">TELECOM</span><span class="rx-logo-pill small">RINNAI</span><span class="rx-logo-pill">BUILDINGPRO</span></div></div></section>

  <section class="rx-guide"><div class="rx-wrap rx-grid-2"><div class="rx-reveal"><span class="rx-kicker">Resource Centre</span><h2 class="rx-title">The Homeowner’s Guide To<br>Structural Movement</h2><p class="rx-lead">Understand what the warning signs mean and what to do next.</p><img class="rx-guide-img" src="<?php echo esc_url($rx_uri . '/images/guide-worker.jpg'); ?>" alt="Rectify team working beside a brick wall"></div><div class="rx-reveal"><p class="rx-faq-label">Frequently asked questions</p><div class="rx-faq"><?php foreach($faqs as $i=>$q): ?><details <?php echo $i===0 ? 'open' : ''; ?>><summary><?php echo esc_html($q); ?></summary><p>Movement can occur for several reasons. Rectify can inspect, explain the likely cause and recommend the most suitable repair path.</p></details><?php endforeach; ?></div><div class="rx-guide-action"><b>Still looking for answers</b><a class="rx-btn rx-btn-outline" href="<?php echo esc_url(home_url('/resources/')); ?>">Read articles <span class="arr">→</span></a></div></div></div></section>

  <section class="rx-cases" id="projects"><div class="rx-wrap"><div class="rx-row-head rx-reveal"><div><span class="rx-kicker">Featured Case Studies</span><h2 class="rx-title">Real Projects. Real Results.</h2><p class="rx-lead">See how our team delivers practical, verified outcomes across homes, buildings and assets.</p></div><a class="rx-btn rx-btn-outline" href="<?php echo esc_url(home_url('/projects/')); ?>">View all case studies <span class="arr">→</span></a></div><img class="rx-cases-img rx-reveal" src="<?php echo esc_url($rx_uri . '/images/projects-strip.jpg'); ?>" alt="Featured case studies"></div></section>

  <section class="rx-map"><div class="rx-wrap rx-reveal"><h2 class="rx-title">Delivering Results Across Australia</h2><p class="rx-lead">From metro homes to regional assets, we deliver stabilisation solutions across Australia.</p><img class="rx-map-img" src="<?php echo esc_url($rx_uri . '/images/australia-map.jpg'); ?>" alt="Map showing Rectify project locations"></div></section>

  <section class="rx-partners"><div class="rx-wrap rx-reveal"><h2 class="rx-title">Our Satisfied Partners</h2><p class="rx-lead">Trusted by organisations, builders and infrastructure partners across Australia.</p><div class="rx-partner-logos"><span>Downer</span><span>Ventia</span><span>Holland</span><span>VBA</span><span>Asset Partners</span></div></div><img class="rx-truck-wide" src="<?php echo esc_url($rx_uri . '/images/partners-trucks.jpg'); ?>" alt="Rectify trucks and work vehicles"></section>

  <section class="rx-resources" id="resources"><div class="rx-wrap"><div class="rx-row-head rx-reveal"><div><span class="rx-kicker">Featured News &amp; Insights</span><h2 class="rx-title">Structural Insights &amp; Resources</h2><p class="rx-lead">Explore helpful guides, project insights and practical information about structural movement and ground improvement.</p></div><a class="rx-btn rx-btn-outline" href="<?php echo esc_url(home_url('/resources/')); ?>">View resources <span class="arr">→</span></a></div><img class="rx-resources-img rx-reveal" src="<?php echo esc_url($rx_uri . '/images/resources-strip.jpg'); ?>" alt="Resource article cards"></div></section>

  <section class="rx-social"><div class="rx-wrap"><div class="rx-social-head rx-reveal"><div><span class="rx-kicker">Follow Our Socials</span><h2 class="rx-title">Follow Our Latest Projects<br>&amp; Insights</h2><p class="rx-lead">Stay up to date with our latest projects, team moments and helpful tips from the Rectify crew.</p></div><a class="rx-gradient-pill" href="#">Follow on Instagram</a></div><img class="rx-social-img rx-reveal" src="<?php echo esc_url($rx_uri . '/images/social-grid.jpg'); ?>" alt="Rectify social media project collage"></div></section>

  <section class="rx-team" style="--rx-team:url('<?php echo esc_url($rx_uri . '/images/team-bg.jpg'); ?>')"><div class="rx-wrap"><h2>Meet our Highly<br>Experienced Team</h2></div></section>

  <section class="rx-questions"><div class="rx-wrap"><h2 class="rx-title rx-reveal">Still Have Questions?</h2><p class="rx-reveal">Talk with our team about your cracking, uneven floors or structural movement concerns. We will help you understand what is happening and what to do next.</p><div class="rx-question-grid rx-stagger"><article class="rx-question-card"><?php echo rx_icon_svg(); ?><h3>Call Us</h3><p>Speak with our friendly team for advice and next steps.</p><a href="tel:1300301319">1300 301 319</a></article><article class="rx-question-card"><?php echo rx_icon_svg(); ?><h3>Book an Assessment</h3><p>Arrange a property assessment and receive practical recommendations.</p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Book online →</a></article><article class="rx-question-card"><?php echo rx_icon_svg(); ?><h3>Explore Projects</h3><p>Review real examples of structural stabilisation and asset support.</p><a href="<?php echo esc_url(home_url('/projects/')); ?>">View projects →</a></article></div></div></section>

  <section class="rx-final-cta" id="contact"><div class="rx-wrap rx-reveal"><h2 class="rx-title">Noticed Cracks, Uneven Floors or<br>Structural Movement?</h2><p>Don’t ignore the signs. Contact Rectify for specialist advice and engineered solutions for your home, building or asset.</p><div class="rx-hero-actions"><a class="rx-btn rx-btn-white" href="tel:1300301319">Call 1300 301 319</a><a class="rx-btn rx-btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Request a quote <span class="arr">→</span></a></div></div></section>
</main>
<script src="<?php echo esc_url($rx_uri . '/js/rectify-home.js'); ?>"></script>
<?php wp_footer(); ?>
</body>
</html>
