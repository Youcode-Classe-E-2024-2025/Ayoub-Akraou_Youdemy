<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Edit Course</h1>
                <button class="text-red-600 hover:text-red-700">Delete Course</button>
            </div>

            <form class="bg-white rounded-lg shadow-md p-6 space-y-6">
                <!-- Course Status -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h3 class="font-medium text-gray-900">Course Status</h3>
                        <p class="text-sm text-gray-500">This course is currently published and visible to students</p>
                    </div>
                    <div class="flex items-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-violet-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-violet-600"></div>
                        </label>
                    </div>
                </div>

                <!-- Basic Information -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Basic Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                            <input type="text" id="title" name="title" value="Web Development Fundamentals"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Course Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">Learn web development from scratch with this comprehensive course.</textarea>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" name="category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                                <option value="1" selected>Web Development</option>
                                <option value="2">Mobile Development</option>
                                <option value="3">Data Science</option>
                            </select>
                        </div>

                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                            <input type="text" id="tags" name="tags" value="html, css, javascript, web"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                            <p class="mt-1 text-sm text-gray-500">Separate tags with commas</p>
                        </div>
                    </div>
                </div>

                <!-- Course Content -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Course Content</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="video_url" class="block text-sm font-medium text-gray-700">Course Preview Video URL</label>
                            <input type="url" id="video_url" name="video_url" value="https://www.youtube.com/watch?v=example"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                        </div>

                        <!-- Course Sections -->
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <input type="text" value="Section 1: Introduction" 
                                        class="font-medium text-gray-900 border-none focus:ring-0 p-0">
                                    <button type="button" class="text-red-600 hover:text-red-700">Remove</button>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gray-500">1.</span>
                                        <input type="text" value="Welcome to the Course" 
                                            class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                                        <button type="button" class="text-red-600 hover:text-red-700">×</button>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gray-500">2.</span>
                                        <input type="text" value="Course Overview" 
                                            class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500">
                                        <button type="button" class="text-red-600 hover:text-red-700">×</button>
                                    </div>
                                    <button type="button" class="mt-2 text-sm text-violet-600 hover:text-violet-700">
                                        + Add Lecture
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="text-sm text-violet-600 hover:text-violet-700">
                                + Add New Section
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Pricing</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Course Price ($)</label>
                            <input type="number" id="price" name="price" value="89.99" min="0" step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>
