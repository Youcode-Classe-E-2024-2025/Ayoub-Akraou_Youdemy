<?php require_once(BASE_PATH . '/views/components/head.php'); ?>
<?php require_once(BASE_PATH . '/views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <form class="flex gap-4" method="post">
                <input type="text" name="search" placeholder="Search courses..." required
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-violet-500 focus:border-violet-500">
                <button type="submit"
                    class="px-6 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500">
                    Search
                </button>
            </form>
        </div>

        <!-- Courses Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($courses as $course): ?>
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
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
                        <span class="text-violet-600 font-bold">
                            $<?php echo htmlspecialchars($course['price']); ?>
                        </span>
                        <a class="text-violet-600 hover:text-violet-700 font-medium" href="/course?id=<?php echo htmlspecialchars($course['id']); ?>">Learn More →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if (!isset($hidePagination)) : ?>
            <div class="mt-12 flex justify-center mb-12">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <?php
                    $prevPage = max(1, $page - 1);
                    $nextPage = min($n_pages, $page + 1);
                    $isFirstPage = $page == 1;
                    $isLastPage = $page == $n_pages;
                    ?>

                    <a href="?page=<?php echo $prevPage; ?>"
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium <?php echo $isFirstPage ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:bg-gray-50'; ?>"
                        <?php echo $isFirstPage ? 'aria-disabled="true"' : ''; ?>>
                        Previous
                    </a>

                    <?php for ($i = 1; $i <= $n_pages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium
                            <?php echo $i == $page
                                ? 'z-10 bg-violet-50 border-violet-500 text-violet-600'
                                : 'bg-white text-gray-500 hover:bg-gray-50'; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <a href="?page=<?php echo $nextPage; ?>"
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium <?php echo $isLastPage ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:bg-gray-50'; ?>"
                        <?php echo $isLastPage ? 'aria-disabled="true"' : ''; ?>>
                        Next
                    </a>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once(BASE_PATH . '/views/components/footer.php'); ?>