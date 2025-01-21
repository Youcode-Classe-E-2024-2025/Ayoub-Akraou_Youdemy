   <?php require_once('components/head.php'); ?>
   <?php require_once('components/nav.php'); ?>

   <!-- Hero Section -->
   <section class="pt-24 pb-12 bg-gradient-to-r from-violet-500 to-purple-600 text-white">
      <div class="container mx-auto px-4 py-16">
         <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
               <h2 class="text-4xl md:text-5xl font-bold mb-6">
                  Learn at your pace, build your skills, change your future!
               </h2>
               <p class="text-xl mb-8 text-gray-100">
                  Join millions of learners worldwide and access quality education from industry experts.
               </p>
               <button class="bg-orange-500 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-orange-600 transition">
                  Start Learning Now
               </button>
            </div>
            <div class="hidden md:block">
               <img src="/assets/images/home-1.jpg" alt="Students learning online" class="rounded-lg shadow-xl">
            </div>
         </div>
      </div>
   </section>

   <!-- Key Features -->
   <section class="py-16 bg-gray-100">
      <div class="container mx-auto px-4">
         <h3 class="text-3xl font-bold mb-12 text-center">Why Choose LearnFlow?</h3>
         <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
               <div class="text-violet-600 text-4xl mb-4">
                  <i class="fas fa-infinity"></i>
               </div>
               <h4 class="text-xl font-semibold mb-2">Lifetime Access</h4>
               <p class="text-gray-600">Learn at your own pace with unlimited access to all course materials</p>
            </div>
            <div class="text-center p-6">
               <div class="text-violet-600 text-4xl mb-4">
                  <i class="fas fa-award"></i>
               </div>
               <h4 class="text-xl font-semibold mb-2">Expert Instructors</h4>
               <p class="text-gray-600">Learn from industry professionals with real-world experience</p>
            </div>
            <div class="text-center p-6">
               <div class="text-violet-600 text-4xl mb-4">
                  <i class="fas fa-certificate"></i>
               </div>
               <h4 class="text-xl font-semibold mb-2">Certified Learning</h4>
               <p class="text-gray-600">Earn recognized certificates upon course completion</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Testimonials -->
   <section class="py-16">
      <div class="container mx-auto px-4">
         <h3 class="text-3xl font-bold mb-12 text-center">What Our Students Say</h3>
         <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
               <div class="flex items-center mb-4">
                  <img src="/assets/images/avatar.webp" alt="Student" class="w-12 h-12 rounded-full mr-4">
                  <div>
                     <h4 class="font-semibold">Sarah Johnson</h4>
                     <div class="text-yellow-400">★★★★★</div>
                  </div>
               </div>
               <p class="text-gray-600">"The Web Development Bootcamp completely transformed my career. The instructors were amazing and the content was top-notch!"</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
               <div class="flex items-center mb-4">
                  <img src="/assets/images/avatar.webp" alt="Student" class="w-12 h-12 rounded-full mr-4">
                  <div>
                     <h4 class="font-semibold">Michael Chen</h4>
                     <div class="text-yellow-400">★★★★★</div>
                  </div>
               </div>
               <p class="text-gray-600">"I learned more in this Digital Marketing course than in my entire college program. Highly recommended!"</p>
            </div>
         </div>
      </div>
   </section>
   <?php require_once('components/footer.php'); ?>