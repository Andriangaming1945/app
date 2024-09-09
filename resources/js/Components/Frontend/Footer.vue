<template>
  <footer class="bg-gray-900 text-gray-400 py-12">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Left Section: Jakarta -->
        <div class="text-left">
          <h3 class="text-white text-sm font-semibold mb-2" style="font-size: 18px;">Jakarta</h3>
          <p class="text-gray-400">
            <a href="mailto:andiro.prawibow18@gmail.com" class="hover:text-white">andiro.prawibow18@gmail.com</a><br>
            +62 812-8296-3720<br>
            Jl. F No.339, RT.12/RW.4, Kel. Utan Panjang, Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10650
          </p>
          <a href="https://www.google.com/maps/place/Jl.+F+No.339,+RT.10%2FRW.4,+Utan+Panjang,+Kec.+Kemayoran,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta+10650/@-6.1648899,106.8543856,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69f5a588a5857f:0xa69aaaf04d6d049f!8m2!3d-6.1648952!4d106.8569605!16s%2Fg%2F11fphxf6k_?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D" class="text-red-500 mt-2 inline-block">SEE ON MAP →</a>
        </div>
        
        <!-- Empty Center Section -->
        <div></div>

        <!-- Right Section: For More Information -->
        <div class="text-right">
          <h3 class="text-white text-sm font-semibold mb-2">FOR MORE INFORMATION</h3>
          <h3 class="text-white text-sm font-semibold mb-2">FOLLOW US</h3>
          <div class="flex justify-end space-x-4">
            <a href="https://www.instagram.com/andirowibowo" class="hover:text-white">
              <i class="fab fa-instagram text-pink-600"></i> Instagram
            </a>
            <a href="https://www.facebook.com/andiro.wibowo" class="hover:text-white">
              <i class="fab fa-facebook text-blue-600"></i> Facebook
            </a>
            <a href="https://twitter.com/Andirowibowo" class="hover:text-white">
              <i class="fab fa-twitter text-blue-400"></i> Twitter(X)
            </a>
            <a href="https://www.linkedin.com/in/andiro-wibowo-79904a263" class="hover:text-white">
              <i class="fab fa-linkedin text-blue-700"></i> LinkedIn
            </a>
          </div>
          <a href="#" class="text-red-500 mt-2 inline-block">SEE MY SOCIAL MEDIA</a>
        </div>
        
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  mounted() {
    const script = document.createElement('script');
    script.src = 'https://kit.fontawesome.com/a076d05399.js';
    script.crossOrigin = 'anonymous';
    document.head.appendChild(script);
  }
}
</script>
