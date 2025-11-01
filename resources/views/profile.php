<?php layout('layouts.app'); ?>

<?php section('content'); ?>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        <h3 class="text-2xl font-bold text-center">User Profile</h3>
        <div class="mt-4">
            <p class="text-lg">Welcome, <?php echo $user->name; ?>!</p>
            <p class="text-gray-700">Email: <?php echo $user->email; ?></p>
            <div class="flex justify-center mt-4 space-x-4">
                <a href="/users" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Manage Users</a>
                <a href="/logout" class="px-6 py-2 text-white bg-red-600 rounded-lg hover:bg-red-900" onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();">Logout</a>
                <form id="profile-logout-form" action="/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endSection(); ?>