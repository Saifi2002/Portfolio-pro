<?php
/* Template Name: About Page */
get_header(); ?>

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

<?php get_footer(); ?>