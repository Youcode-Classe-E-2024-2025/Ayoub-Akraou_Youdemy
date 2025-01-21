<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Manage Tags</h1>
            <button onclick="document.getElementById('addTagsModal').classList.remove('hidden')"
                    class="bg-violet-600 text-white px-6 py-2 rounded-md hover:bg-violet-700">
                Add Tags
            </button>
        </div>

        <!-- Tags List -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-wrap gap-2">
                <?php foreach ($tags as $tag): ?>
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-violet-100 text-violet-800">
                    <span class="text-sm"><?= htmlspecialchars($tag['name']) ?></span>
                    <a href="/admin/deleteTag?id=<?= $tag['id'] ?>" 
                       onclick="return confirm('Are you sure you want to delete this tag?')"
                       class="ml-2 text-violet-600 hover:text-violet-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Add Tags Modal -->
<div id="addTagsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Add Tags</h3>
            <form action="/admin/addTags" method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags (separated by commas)</label>
                    <textarea name="tags" rows="5" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-violet-500 focus:border-violet-500"
                              placeholder="JavaScript, React, Node.js"></textarea>
                    <p class="mt-1 text-sm text-gray-500">Example: javascript, react, web development</p>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button"
                            onclick="document.getElementById('addTagsModal').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700">
                        Add Tags
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>