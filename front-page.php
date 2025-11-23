<?php get_header(); ?>

<main class="font-sans">

    <!-- HERO SECTION -->
    <section class="bg-gray-900 text-white py-32">
        
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-extrabold mb-6">
                <?php echo get_theme_mod('hero_title'); ?>
                <span class="text-blue-400"><?php echo get_theme_mod('hero_subtitle'); ?></span>
            </h1>

            <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                I build clean, modern, and fast websites using PHP, JS, React, Tailwind, and WordPress.
            </p>

            <a href="#projects"
                class="inline-block mt-8 bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold transition">
                View My Work
            </a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

            <div>
                <h2 class="text-4xl font-bold mb-6">About Me</h2>
                <p class="text-gray-600 leading-relaxed">
                    I'm a detail-oriented full-stack developer specializing in WordPress, PHP, React,
                    Tailwind and API development. I love building smooth UI/UX experiences and highly optimized systems.
                </p>
            </div>

            <div>
                <img src="https://via.placeholder.com/500x350"
                    class="rounded-xl shadow-lg" alt="Profile image">
            </div>

        </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects" class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-12 text-center">My Projects</h2>

            <div class="grid md:grid-cols-3 gap-10">

                <?php
                $projects = new WP_Query(array(
                    'post_type' => 'project',
                    'posts_per_page' => 6
                ));

                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post(); ?>

                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-4">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <p class="text-gray-600 text-sm">
                                    <?php echo wp_trim_words(get_the_content(), 15); ?>
                                </p>
                            </div>
                        </div>

                <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo "<p class='text-center text-gray-500'>No projects added yet.</p>";
                endif;
                ?>

            </div>

        </div>
        <a href="<?php echo get_post_type_archive_link('project'); ?>"
            class="text-blue-500 font-semibold hover:underline block mt-8 text-center">
            View All Projects →
        </a>
    </section>

    <!-- BLOG SECTION -->
    <section id="blog" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-12 text-center">Latest Blog Posts</h2>

            <div class="grid md:grid-cols-3 gap-10">

                <?php
                $blogPosts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                if ($blogPosts->have_posts()) :
                    while ($blogPosts->have_posts()) : $blogPosts->the_post(); ?>

                        <div class="bg-white border rounded-lg shadow-sm p-6 hover:shadow-lg transition">
                            <h3 class="text-2xl font-semibold mb-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <p class="text-gray-600 text-sm mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>"
                                class="text-blue-500 font-medium hover:underline">Read more →</a>
                        </div>

                <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo "<p class='text-center text-gray-500'>No blog posts available.</p>";
                endif;
                ?>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>