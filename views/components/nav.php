<header class="bg-white shadow-sm fixed w-full top-0 z-50">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="text-2xl font-bold text-violet-600">Youdemy</a>
        </div>
        <?php
        $isLoggedIn = isset($_SESSION['user_id']);
        $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : null;
        ?>
        <!-- Navigation principale -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="text-gray-600 hover:text-violet-600">Home</a>
            <a href="/courses" class="text-gray-600 hover:text-violet-600">Courses</a>
            <a href="/about-us" class="text-gray-600 hover:text-violet-600">About Us</a>
            <?php if ($userRole === 'student'): ?>
                <a href="/student/myLearning" class="text-gray-600 hover:text-violet-600">My Learning</a>
            <?php endif; ?>
        </div>

        <div class="flex items-center space-x-4">
            <?php if (!$isLoggedIn): ?>
                <!-- Menu pour utilisateurs non connectés -->
                <a href="/login" class="bg-violet-600 text-white px-6 py-2 rounded-full hover:bg-violet-700 transition">
                    Sign In
                </a>
                <a href="/signup" class="text-violet-600 border border-violet-600 px-6 py-2 rounded-full hover:bg-violet-50 transition">
                    Sign Up
                </a>
            <?php else: ?>
                <?php if ($userRole === 'teacher'): ?>
                    <a href="/courses/dashboard" class="bg-violet-600 text-white px-6 py-2 rounded-full hover:bg-violet-700 transition">Dashboard</a>
                <?php endif; ?>

                <?php if ($userRole === 'admin'): ?>
                    <!-- Menu administrateur -->
                    <a href="/admin/dashboard" class="bg-violet-600 text-white px-6 py-2 rounded-full hover:bg-violet-700 transition">Dashboard</a>
                <?php endif; ?>

                <!-- Menu profil -->
                <div class="h-8 w-8 rounded-full bg-violet-200 flex items-center justify-center">
                    <span class="text-violet-600 font-medium">
                        <?= isset($_SESSION['user']['name']) ? strtoupper(substr($_SESSION['user']['name'], 0, 1)) : 'U' ?>
                    </span>
                </div>
                <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-red-50 flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            <?php endif; ?>

            <!-- Bouton menu mobile -->
            <button id="mobileMenuButton" class="md:hidden">
                <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Home</a>
            <a href="/courses" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Courses</a>
            <a href="/about-us" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">About Us</a>

            <?php if ($isLoggedIn): ?>
                <?php if ($userRole === 'student'): ?>
                    <a href="/student/myLearning" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">My Learning</a>
                <?php endif; ?>

                <?php if ($userRole === 'teacher' || $userRole === 'admin'): ?>
                    <a href="/courses/dashboard" class="block px-3 py-2 text-base font-medium text-violet-600 hover:text-violet-700 hover:bg-violet-50">Dashboard</a>
                <?php endif; ?>

                <?php if ($userRole === 'admin'): ?>
                    <div class="border-t border-gray-200 pt-2">
                        <div class="px-3 py-2 text-base font-medium text-gray-900">Admin Panel</div>
                        <a href="/admin/stats" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Statistics</a>
                        <a href="/admin/users" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Users</a>
                        <a href="/admin/categories" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Categories</a>
                        <a href="/admin/tags" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Tags</a>
                    </div>
                <?php endif; ?>


            <?php else: ?>
                <div class="border-t border-gray-200 pt-2">
                    <a href="/login" class="block px-3 py-2 text-base font-medium text-violet-600 hover:text-violet-700 hover:bg-violet-50">Sign In</a>
                    <a href="/signup" class="block px-3 py-2 text-base font-medium text-violet-600 hover:text-violet-700 hover:bg-violet-50">Sign Up</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion du menu mobile
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Gestion du menu profil
        const profileButton = document.getElementById('profileButton');
        const profileMenu = document.getElementById('profileMenu');

        if (profileButton && profileMenu) {
            profileButton.addEventListener('click', function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });

            // Fermer le menu lors d'un clic à l'extérieur
            document.addEventListener('click', function(e) {
                if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                }
            });
        }

        // Fermer le menu mobile lors d'un clic à l'extérieur
        document.addEventListener('click', function(e) {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>