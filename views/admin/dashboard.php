<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>


        <!-- Statistics Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Users</h3>
                <p class="text-3xl font-bold text-violet-600"><?php echo $total_users; ?></p>
                <div class="flex items-center mt-2 text-sm">
                    <span class="text-green-500">↑ 12%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Courses</h3>
                <p class="text-3xl font-bold text-violet-600"><?php echo $total_courses; ?></p>
                <div class="flex items-center mt-2 text-sm">
                    <span class="text-green-500">↑ 8%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Enrollments</h3>
                <p class="text-3xl font-bold text-violet-600"><?php echo $total_enrollments; ?></p>
                <div class="flex items-center mt-2 text-sm">
                    <span class="text-green-500">↑ 15%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Revenue</h3>
                <p class="text-3xl font-bold text-violet-600">$<?php echo $total_revenue; ?></p>
                <div class="flex items-center mt-2 text-sm">
                    <span class="text-green-500">↑ 23%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>
        </div>

        <!-- Pending Teacher Approvals -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Pending Teacher Approvals</h2>
                <div class="space-y-4">
                    <?php if (empty($unvalidated_teachers)): ?>
                        <p class="text-gray-500">No pending approvals</p>
                    <?php else: ?>
                        <?php foreach ($unvalidated_teachers as $teacher): ?>
                            <div class="flex items-center justify-between space-x-4 p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-violet-100">
                                            <span class="text-lg font-medium text-violet-700"><?= substr($teacher['name'], 0, 1) ?></span>
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($teacher['name']) ?></p>
                                        <p class="text-sm text-gray-500"><?= htmlspecialchars($teacher['email']) ?></p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="/admin/approveTeacher?id=<?= $teacher['id'] ?>"
                                        class="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-green-200">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Approve
                                    </a>
                                    <a href="/admin/rejectTeacher?id=<?= $teacher['id'] ?>"
                                        class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Reject
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 flex [&>*]:flex-1 gap-6">
            <a href="/admin/users" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-900">Manage Users</h3>
                <p class="text-gray-500 mt-2">View and manage all users</p>
            </a>

            <a href="/admin/courses" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-900">Manage Courses</h3>
                <p class="text-gray-500 mt-2">Review and moderate courses</p>
            </a>

            <a href="/admin/categories" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-900">Manage Categories</h3>
                <p class="text-gray-500 mt-2">Add or edit course categories</p>
            </a>
            <a href="/admin/tags" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-900">Manage Tags</h3>
                <p class="text-gray-500 mt-2">Add or edit course tags</p>
            </a>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>