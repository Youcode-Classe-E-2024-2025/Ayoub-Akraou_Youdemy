<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Manage Courses</h1>
        </div>

        <!-- Courses Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Course
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Teacher
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-lg bg-violet-500 flex items-center justify-center text-white font-semibold text-lg">
                                            <?= strtoupper(substr($course['title'], 0, 1)) ?>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($course['title']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?= htmlspecialchars($course['teacher_name']) ?></div>
                                <div class="text-sm text-gray-500"><?= htmlspecialchars($course['teacher_email']) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $course['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= $course['is_active'] ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($course['created_at'])) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="/course?id=<?= $course['id'] ?>"
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-violet-500 text-white hover:bg-violet-600 transition-colors duration-150">
                                    Preview
                                </a>
                                <a href="/admin/activateCourse?id=<?= $course['id'] ?>"
                                    class="<?= $course['is_active'] ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-green-500 text-white hover:bg-green-600' ?> 
                                           inline-flex items-center px-2 py-1 text-xs font-medium rounded transition-colors duration-150"
                                    <?= $course['is_active'] ? 'disabled' : '' ?>>
                                    Activate
                                </a>
                                <a href="/admin/deactivateCourse?id=<?= $course['id'] ?>"
                                    class="<?= !$course['is_active'] ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-yellow-500 text-white hover:bg-yellow-600' ?>
                                           inline-flex items-center px-2 py-1 text-xs font-medium rounded transition-colors duration-150"
                                    <?= !$course['is_active'] ? 'disabled' : '' ?>>
                                    Deactivate
                                </a>
                                <a href="/admin/deleteCourse?id=<?= $course['id'] ?>"
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-red-500 text-white hover:bg-red-600 transition-colors duration-150"
                                    onclick="return confirm('Are you sure you want to delete this course?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>
