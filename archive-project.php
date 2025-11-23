<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Title -->
        <h1 class="text-4xl font-bold mb-12 text-center">My Projects Archive</h1>

        <!-- Grid -->
        <div class="grid md:grid-cols-3 gap-10">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="bg-gray-50 rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                    
                    <!-- Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full']); ?>
                        </a>
                    <?php endif; ?>

                    <!-- Text -->
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <p class="text-gray-600 text-sm">
                            <?php echo wp_trim_words(get_the_content(), 15); ?>
                        </p>
                    </div>
                </div>

            <?php endwhile; else : ?>
                <p class="text-gray-500">No projects found.</p>
            <?php endif; ?>

        </div>

    </div>
</main>

<?php get_footer(); ?>
