<?php require_once(BASE_PATH . '/views/components/head.php'); ?>
<?php require_once(BASE_PATH . '/views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <!-- Course Header -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <?php if (!empty($course['category_name'])): ?>
                <span class="text-xs uppercase tracking-wide mb-3 px-2 py-1 bg-[#dde] text-gray-600 inline-block rounded">
                    <?php echo htmlspecialchars($course['category_name']); ?>
                </span>
            <?php endif; ?>
            <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php echo htmlspecialchars($course['title']); ?></h1>
            <div class="flex items-center mb-4">
                <div class="text-yellow-400 flex">★★★★★</div>
                <span class="text-gray-600 ml-2">(4.9) • 2,150 students</span>
            </div>

            <!-- YouTube Video -->
            <div class="relative w-full overflow-hidden pb-[56.25%] mb-6">
                <?php
                // Convert YouTube URL to embed URL
                $url = $course['content_url'];
                parse_str(parse_url($url, PHP_URL_QUERY), $urlParams);
                $videoId = $urlParams['v'] ?? '';
                $embedUrl = "https://www.youtube.com/embed/" . htmlspecialchars($videoId);
                ?>
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-lg"
                    src="<?= $embedUrl ?>"
                    title="Course Preview"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

            <p class="text-lg text-gray-700 mb-6">
                <?php echo htmlspecialchars($course['description']); ?>
            </p>

            <div class="flex flex-wrap gap-2 mb-6">
                <?php if (!empty($course['tags'])): ?>
                    <?php foreach (explode(',', $course['tags']) as $tag): ?>
                        <span class="px-3 py-1.5 bg-violet-100 text-violet-800 text-sm font-medium rounded-full"><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="flex items-center mb-6">
                <img src="/assets/images/avatar.webp" class="rounded-full w-12 h-12 mr-4" alt="Instructor" class="rounded-full mr-3">
                <div>
                    <p class="text-violet-600"><?php echo htmlspecialchars($course['instructor_name']); ?></p>
                    <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($course['instructor_email']); ?></p>
                </div>
            </div>
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-clock text-gray-500 mr-2"></i>
                    <span>20 hours of content</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-video text-gray-500 mr-2"></i>
                    <span>150 lectures</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-certificate text-gray-500 mr-2"></i>
                    <span>Certificate of completion</span>
                </div>
            </div>
        </div>

        <!-- Course Content and Sidebar -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="md:col-span-2">
                <!-- What you'll learn -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-xl font-bold mb-4">What you'll learn</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Build responsive websites using HTML5 and CSS3</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Master JavaScript programming fundamentals</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Work with modern frameworks and tools</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Deploy websites to production</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-28">
                    <div class="text-3xl font-bold text-violet-600 mb-6">$<?php echo htmlspecialchars($course['price'] ?? '0.00'); ?></div>
                    <?php if ($isEnrolled): ?>
                        <button id="get-certificate" class="block text-center w-full bg-green-600 text-white py-3 rounded-lg mb-4 hover:bg-green-700 transition">
                            Get Certificate
                        </button>
                    <?php else: ?>
                        <a href="?id=<?= htmlspecialchars($course['id']); ?>&action=enroll" class="block text-center w-full bg-violet-600 text-white py-3 rounded-lg mb-4 hover:bg-violet-700 transition">
                            Enroll Now
                        </a>
                    <?php endif; ?>
                    <div class="mt-6 space-y-4 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-infinity text-gray-500 mr-2"></i>
                            <span>Full lifetime access</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-mobile-alt text-gray-500 mr-2"></i>
                            <span>Access on mobile and TV</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-award text-gray-500 mr-2"></i>
                            <span>Certificate of completion</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(BASE_PATH . '/views/components/footer.php'); ?>