<?php get_header(); ?>

<main class="site-main">

    <!-- Hero Section -->
    <section class="hero-section py-32 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-5xl md:text-6xl font-bold mb-6"><?php echo get_theme_mod('hero_title', get_bloginfo('name')); ?></h1>
            <p class="text-xl md:text-2xl mb-8"><?php echo get_theme_mod('hero_subtitle', get_bloginfo('description')); ?></p>
            <a href="#projects" class="inline-block bg-white text-indigo-600 font-semibold py-3 px-6 rounded-lg shadow hover:bg-gray-100 transition">View My Work</a>
        </div>
    </section>


    <!-- About Section -->
    <section class="about-section py-24 bg-gray-50">
        <div class="container mx-auto px-6 text-center max-w-3xl">
            <h2 class="text-4xl font-bold mb-6">About Me</h2>
            <p class="text-lg text-gray-700"><?php echo get_theme_mod('about_me_text', 'Write something about yourself here.'); ?></p>
        </div>
    </section>


    <!-- Projects Section -->
    <section id="projects" class="projects-section py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">My Projects</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $projects = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6));
                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post(); ?>
                        <div class="project-card bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition transform hover:-translate-y-2">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?></a>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="text-gray-600"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section>


    <!-- Blog Section -->
    <section class="blog-section py-24 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-12">Latest Blog Posts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3));
                if ($posts->have_posts()) :
                    while ($posts->have_posts()) : $posts->the_post(); ?>
                        <div class="blog-card bg-white rounded-lg shadow hover:shadow-lg transition transform hover:-translate-y-2 overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?></a>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="text-gray-600"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section>


</main>

<?php get_footer(); ?>