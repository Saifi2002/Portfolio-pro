<?php
/* Template Name: Project Page */
get_header(); ?>

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

<?php get_footer(); ?>