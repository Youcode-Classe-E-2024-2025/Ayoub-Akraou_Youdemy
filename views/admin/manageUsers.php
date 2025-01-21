<?php require_once('views/components/head.php'); ?>
<?php require_once('views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24 pb-12">
    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Manage Users</h1>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Joined
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                        <?php if ($user['role_id'] != 1): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full <?= $user['role_id'] == 2 ? 'bg-violet-500' : 'bg-blue-500' ?> flex items-center justify-center text-white font-semibold text-lg">
                                            <?= strtoupper(substr($user['name'], 0, 1)) ?>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($user['name']) ?></div>
                                        <div class="text-sm text-gray-500"><?= htmlspecialchars($user['email']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $user['role_id'] == 2 ? 'bg-violet-100 text-violet-800' : 'bg-blue-100 text-blue-800' ?>">
                                    <?= $user['role_id'] == 2 ? 'Teacher' : 'Student' ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $user['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= $user['is_active'] ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($user['created_at'])) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="/admin/activateUser?id=<?= $user['id'] ?>"
                                    class="<?= $user['is_active'] ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-900' ?>"
                                    <?= $user['is_active'] ? 'disabled' : '' ?>>
                                    Activate
                                </a>
                                <a href="/admin/deactivateUser?id=<?= $user['id'] ?>"
                                    class="<?= !$user['is_active'] ? 'text-gray-400 cursor-not-allowed' : 'text-yellow-600 hover:text-yellow-900' ?>"
                                    <?= !$user['is_active'] ? 'disabled' : '' ?>>
                                    Deactivate
                                </a>
                                <a href="/admin/deleteUser?id=<?= $user['id'] ?>"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('views/components/footer.php'); ?>