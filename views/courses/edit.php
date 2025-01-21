<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<?php
// Get categories and tags from database
$db = new Database();
$categories = $db->select("SELECT id, name FROM categories ORDER BY name");
$tags = $db->select("SELECT id, name FROM tags ORDER BY name");


?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Course</h1>

            <form action="/courses/edit?id=<?= $course['id'] ?>" method="POST" class="space-y-8">
                <!-- Course Basic Information -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2">Course Information</h2>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" name="title" id="title" required
                            value="<?= htmlspecialchars($course['title']) ?>"
                            placeholder="e.g. Complete Web Development Bootcamp"
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-full rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" required
                            placeholder="Describe what students will learn in this course..."
                            class="mt-1 block w-full rounded-md px-3 py-1.5 border border-gray-400 shadow-sm focus:border-violet-500 focus:ring-violet-500"><?= htmlspecialchars($course['description']) ?></textarea>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                        <input type="number" name="price" id="price" step="0.01" min="0" required
                            value="<?= htmlspecialchars($course['price']) ?>"
                            placeholder="49.99"
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-48 rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                    </div>
                </div>

                <!-- Category and Tags -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2">Category & Tags</h2>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id" required
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-full rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                            <option value="">Choose a course category...</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['id']) ?>"
                                    <?= $category['id'] == $course['category_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Tags</label>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($tags as $tag): ?>
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="tags[]" value="<?= htmlspecialchars($tag['id']) ?>"
                                        class="hidden tag-checkbox"
                                        <?= in_array($tag['id'], $tag_ids) ? 'checked' : '' ?>
                                        onchange="this.nextElementSibling.classList.toggle('bg-violet-100');
                                                    this.nextElementSibling.classList.toggle('text-violet-600');
                                                    this.nextElementSibling.classList.toggle('border-violet-600');
                                                    this.nextElementSibling.classList.toggle('bg-gray-100');
                                                    this.nextElementSibling.classList.toggle('text-gray-700');">
                                    <span class="border-2 px-3 py-1.5 <?= in_array($tag['id'], $tag_ids) ? 'bg-violet-100 text-violet-600 border-violet-600' : 'bg-gray-100 text-gray-700' ?> text-sm font-medium rounded-full hover:bg-gray-200 inline-block transition-all duration-200">
                                        <?= htmlspecialchars($tag['name']) ?>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Click tags to select/deselect them</p>
                    </div>
                </div>

                <!-- Course Content -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2">Course Content</h2>

                    <div>
                        <label for="content_type" class="block text-sm font-medium text-gray-700">Content Type</label>
                        <select name="content_type" id="content_type" required
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-full rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                            <option value="">Select the type of content...</option>
                            <option value="video" <?= $course['content_type'] == 'video' ? 'selected' : '' ?>>Video</option>
                            <option value="document" <?= $course['content_type'] == 'document' ? 'selected' : '' ?>>Document</option>
                        </select>
                    </div>

                    <div>
                        <label for="content_url" class="block text-sm font-medium text-gray-700">Content URL</label>
                        <input type="url" name="content_url" id="content_url" required
                            value="<?= htmlspecialchars($course['content_url']) ?>"
                            placeholder="e.g. https://youtube.com/watch?v=..."
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-full rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                    </div>

                    <div>
                        <label for="duration_minutes" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                        <input type="number" name="duration_minutes" id="duration_minutes" min="0" required
                            value="<?= htmlspecialchars($course['duration_minutes']) ?>"
                            placeholder="e.g. 45"
                            class="px-3 py-1.5 border border-gray-400 mt-1 block w-48 rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-violet-600 hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500">
                        Update Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>