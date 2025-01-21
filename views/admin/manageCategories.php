<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Manage Categories</h1>
            <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" 
                    class="bg-violet-600 text-white px-6 py-2 rounded-md hover:bg-violet-700">
                Add Category
            </button>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($categories as $category): ?>
            <!-- Category Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($category['name']) ?></h3>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="editCategory(<?= htmlspecialchars(json_encode($category)) ?>)" 
                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-violet-500 text-white hover:bg-violet-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </button>
                        <a href="/admin/deleteCategory?id=<?= $category['id'] ?>" 
                           onclick="return confirm('Are you sure you want to delete this category?')"
                           class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-red-500 text-white hover:bg-red-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4"><?= htmlspecialchars($category['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Category</h3>
            <form action="/admin/addCategory" method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-violet-500 focus:border-violet-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-violet-500 focus:border-violet-500"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button"
                            onclick="document.getElementById('addCategoryModal').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Category</h3>
            <form action="/admin/updateCategory" method="POST">
                <input type="hidden" name="id" id="editCategoryId">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" id="editCategoryName" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-violet-500 focus:border-violet-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="editCategoryDescription" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-violet-500 focus:border-violet-500"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button"
                            onclick="document.getElementById('editCategoryModal').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCategory(category) {
    document.getElementById('editCategoryId').value = category.id;
    document.getElementById('editCategoryName').value = category.name;
    document.getElementById('editCategoryDescription').value = category.description;
    document.getElementById('editCategoryModal').classList.remove('hidden');
}
</script>

<?php require_once('views/components/footer.php'); ?>
