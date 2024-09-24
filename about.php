<?php
/**
 * Template Name: About Page
 */

get_header();
?>

<div class="bg-[#C0C78C] min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- About Page Header -->
        <section class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 opacity-0 animate-fade-in-down">About Me</h1>
            <p class="text-xl text-gray-800 mb-8 opacity-0 animate-fade-in-down delay-200">Welcome to my blog! I'm passionate about web development, programming, and technology. Through this blog, I share my knowledge, projects, and tips on all things tech.</p>
        </section>

        <!-- Introduction Section -->
        <section class="bg-[#FEFAE0] p-8 rounded-lg shadow-lg mb-12 opacity-0 animate-fade-in-up delay-400">
            <h2 class="text-3xl font-semibold mb-4">Who Am I?</h2>
            <p class="text-gray-700 mb-6">I'm a web developer and programmer with a passion for creating efficient, scalable solutions. I have experience in web technologies such as JavaScript, React, and PHP, and I love exploring new trends in tech, such as artificial intelligence and machine learning.</p>
            <p class="text-gray-700">When I'm not coding, you can find me reading tech blogs, exploring new technologies, or contributing to open-source projects. My goal is to continue learning and growing in the tech space while helping others through this blog.</p>
        </section>

        <!-- Skills Section -->
        <section class="mb-12 opacity-0 animate-fade-in-up delay-600">
            <h2 class="text-3xl font-semibold mb-6">Skills and Expertise</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Web Development (HTML, CSS, JavaScript, React, PHP)</li>
                <li>Backend Development (Node.js, Express.js, Flask)</li>
                <li>Database Management (MySQL, MongoDB, Firebase)</li>
                <li>Machine Learning and AI</li>
                <li>Version Control (Git, GitHub)</li>
            </ul>
        </section>

        <!-- Contact Section -->
        <section class="text-center opacity-0 animate-fade-in-up delay-800">
            <h2 class="text-3xl font-semibold mb-4">Get in Touch</h2>
            <p class="text-xl text-gray-700 mb-6">If you’d like to collaborate, work together, or just chat about tech, feel free to <a href="<?php echo get_permalink( get_page_by_title( 'Contact' ) ); ?>" class="text-blue-500 hover:underline">reach out</a> via my contact page.</p>
            <a href="<?php echo get_permalink( get_page_by_title( 'Contact' ) ); ?>" class="bg-[#B99470] hover:bg-opacity-80 text-white font-bold py-3 px-8 rounded inline-block">Contact Me</a>
        </section>
    </div>
</div>

<?php
get_footer();
?>
