<?php require_once(BASE_PATH . '/views/components/head.php'); ?>
<?php require_once(BASE_PATH . '/views/components/nav.php'); ?>

<div class="min-h-screen bg-gray-100 pt-24">
   <!-- Hero Section -->
   <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
         <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">About Youdemy</h1>
            <p class="text-xl text-gray-600 mb-8">At Youdemy, we believe that education is the cornerstone of progress. It is the key to unlocking individual potential, fostering personal growth, and driving innovation. We envision a world where everyone has access to quality education, regardless of their geographical location, financial situation, or social background. By leveraging technology, we strive to bridge the gap between passionate instructors and eager students, creating a global learning platform that is inclusive, accessible, and affordable. Our mission is to empower learners worldwide with the skills, knowledge, and confidence they need to succeed in an ever-changing world.</p>
         </div>
      </div>
   </section>

   <!-- Our Mission -->
   <section class="py-16">
      <div class="container mx-auto px-4">
         <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
               <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
               <p class="text-gray-600 mb-4">At Youdemy, we believe that education should be accessible to everyone. Our mission is to create a global learning platform that connects passionate instructors with eager students, fostering a community of continuous learning and growth.</p>
               <p class="text-gray-600">We strive to provide high-quality courses across various disciplines, ensuring that our students receive the best possible education to achieve their goals.</p>
            </div>
            <div class="bg-violet-100 p-8 rounded-lg">
               <div class="grid grid-cols-2 gap-6">
                  <div class="text-center">
                     <div class="text-3xl font-bold text-violet-600 mb-2">1M+</div>
                     <p class="text-gray-600">Students</p>
                  </div>
                  <div class="text-center">
                     <div class="text-3xl font-bold text-violet-600 mb-2">5K+</div>
                     <p class="text-gray-600">Courses</p>
                  </div>
                  <div class="text-center">
                     <div class="text-3xl font-bold text-violet-600 mb-2">100+</div>
                     <p class="text-gray-600">Countries</p>
                  </div>
                  <div class="text-center">
                     <div class="text-3xl font-bold text-violet-600 mb-2">1K+</div>
                     <p class="text-gray-600">Instructors</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Our Team -->
   <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
         <h2 class="text-3xl font-bold text-center mb-12">Our Team</h2>
         <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
               <img src="/assets/images/pic1.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
               <h3 class="text-xl font-semibold mb-2">John Doe</h3>
               <p class="text-gray-600">Founder & CEO</p>
            </div>
            <div class="text-center">
               <img src="/assets/images/pic2.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
               <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
               <p class="text-gray-600">Head of Education</p>
            </div>
            <div class="text-center">
               <img src="/assets/images/pic3.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
               <h3 class="text-xl font-semibold mb-2">Mike Johnson</h3>
               <p class="text-gray-600">Technical Director</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Contact Section -->
   <section class="py-16">
      <div class="container mx-auto px-4">
         <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Get in Touch</h2>
            <div class="grid md:grid-cols-3 gap-8">
               <div>
                  <div class="text-violet-600 text-2xl mb-4">
                     <i class="fas fa-envelope"></i>
                  </div>
                  <h3 class="font-semibold mb-2">Email</h3>
                  <p class="text-gray-600">contact@youdemy.com</p>
               </div>
               <div>
                  <div class="text-violet-600 text-2xl mb-4">
                     <i class="fas fa-phone"></i>
                  </div>
                  <h3 class="font-semibold mb-2">Phone</h3>
                  <p class="text-gray-600">+1 234 567 890</p>
               </div>
               <div>
                  <div class="text-violet-600 text-2xl mb-4">
                     <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <h3 class="font-semibold mb-2">Location</h3>
                  <p class="text-gray-600">San Francisco, CA</p>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<?php require_once(BASE_PATH . '/views/components/footer.php'); ?>
