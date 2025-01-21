<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Enrolled Courses</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome back, <?= $_SESSION['user']['name'] ?>!</span>
            </div>
        </div>

        <!-- Enrolled Courses -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6"></h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Course Card -->
                    <?php foreach ($courses as $course): ?>
                        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col border border-purple-600">
                            <?php if (!empty($course['category_name'])): ?>
                                <span class="text-xs uppercase tracking-wide mb-2 px-2 py-1 bg-[#dde] text-gray-600 self-start rounded">
                                    <?php echo htmlspecialchars($course['category_name']); ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="text-xl font-semibold mb-3"><?php echo htmlspecialchars($course['title']); ?></h3>
                            <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($course['description']); ?></p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php if (!empty($course['tags'])): ?>
                                    <?php foreach (explode(',', $course['tags']) as $tag): ?>
                                        <span class="px-2 py-1 bg-violet-100 text-violet-800 text-sm rounded-full"><?php echo htmlspecialchars($tag); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="mt-auto flex items-center justify-between">
                                <span class="text-indigo-600 font-bold">
                                    $<?php echo htmlspecialchars($course['price']); ?>
                                </span>
                                <a class="text-sm text-nowrap inline-block bg-indigo-600 rounded-full px-2 py-1 text-white font-medium hover:bg-indigo-700 transition duration-300" href="/course?id=<?php echo htmlspecialchars($course['id']); ?>">Continue Learning →</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>