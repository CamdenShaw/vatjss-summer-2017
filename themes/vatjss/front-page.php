<?php
/**
 * Template Name: Front Page
 * @package VATJSS_Theme
 */
get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <section class="vatjss-home-hero">
    <?php echo CFS()->get(  ); ?>
    </section>
    <section class="vatjss-home-banner vatjss-vertical-align-center">
      <h2 class="vatjss-text-uppercase vatjss-text-center">strengthening resiliency within the aboriginal community</h2>
    </section>
    <section class="vatjss-container-fluid">
      <?php
        $service_types = get_terms( 'services-type' );
        $housing = $service_types[1];
      ?>
      <div class="housing-services-fp">
        <h3 class="housing-title-fp">Housing Services</h3>
        <p class="housing-description-fp"><?php echo $housing->description ?></p>
        <div class="housing-learn-more-fp"><a href="services/housing-services">Learn More <span>></span></a></div>
      </div>
      <?php $justice = $service_types[2]; ?>
      <div class="justice-services-fp">
        <h3 class="justice-title-fp">Transformative Justice Services</h3>
        <p class="justice-description-fp"><?php echo $justice->description ?></p>
        <div class="justice-learn-more-fp"><a href="services/justice-services">Learn More <span>></span></a></div>
      </div>
      <?php
        $resources_category = get_categories( 'resources=types' );
        $resources = $resources_category[0];
      ?>
      <div class="resources-fp">
        <h3 class="resources-title-fp">Resources</h3>
        <p class="resources-description-fp"><?php echo $resources->description ?></p>
        <div class="resources-learn-more-fp"><a href="resource">Learn More <span>></span></a></div>
      </div>
      <div class="volunteer-fp">
        <h3 class="volunteer-title-fp">Volunteer Opportunities</h3>
        <p class="volunteer-description-fp"><?php echo CFS()->get( 'volunteer_opportunities' ); ?></p>
        <div class="volunteer-learn-more-fp"><a href="contact-us">Learn More <span>></span></div>
      </div>
    </section>
    <section class="vatjss-home-mobile-subscribe-banner vatjss-vertical-align-center">
      <button>Subscribe</button>
    </section>
  </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>