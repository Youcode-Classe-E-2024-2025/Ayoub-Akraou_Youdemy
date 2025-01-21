<div class="certificate-overlay z-50 hidden w-screen h-screen bg-black/25 flex items-center justify-center fixed top-0 left-0">
    <div class="box relative">
        <button id="close-certificate" class="absolute top-4 left-4 shadow-lg z-10 shadow-black hover:bg-red-200 transition-colors p-2 bg-white rounded-full">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
        <button id="download-certificate" class="absolute top-4 right-4 shadow-lg z-10 shadow-black hover:bg-violet-200 transition-colors p-2 bg-white rounded-full" download>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 16.5l4-4H13V4h-2v8.5H8l4 4zM4 18h16v2H4v-2z" clip-rule="evenodd" />
            </svg>
        </button>

        <div id="certificate" class="relative" style="width: 800px; height: 600px;">
            <p class="course_name absolute" style="top: 220px; left: 400px; transform: translateX(-50%); font-size: 24px;"><?= $course_name ?></p>
            <p class="student_name absolute" style="top: 340px; left: 400px; transform: translateX(-50%); font-size: 32px; font-weight: bold; font-style: italic;"><?= $student_name ?></p>
            <p class="teacher_name absolute" style="top: 460px; left: 200px; transform: translateX(-50%); font-size: 16px; font-weight: 500; text-transform: uppercase;"><?= $teacher_name ?></p>
            <img class="w-full h-full object-contain" src="/assets/images/certificate.png">
        </div>
    </div>
</div>