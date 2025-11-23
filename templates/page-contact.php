<?php
/* Template Name: Contact Page */
get_header(); ?>

<main class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6 text-center">

        <h1 class="text-4xl font-bold mb-6">Contact Me</h1>
        <p class="text-gray-600 mb-10">Feel free to reach out for any project or collaboration.</p>

        <form method="post" action="#" class="bg-white p-8 rounded-xl shadow space-y-6">

            <input type="text" name="name" placeholder="Your Name"
                class="w-full border px-4 py-3 rounded focus:ring-blue-500">

            <input type="email" name="email" placeholder="Your Email"
                class="w-full border px-4 py-3 rounded focus:ring-blue-500">

            <textarea name="message" rows="5" placeholder="Your Message"
                class="w-full border px-4 py-3 rounded focus:ring-blue-500"></textarea>

            <button class="bg-blue-500 text-white px-8 py-3 rounded hover:bg-blue-600">
                Send Message
            </button>

        </form>

    </div>
</main>

<?php get_footer(); ?>