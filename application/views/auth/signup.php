  <section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
      <div class="px-5">
        <h2 class="text-2xl font-bold text-[#002D74]">Create new User</h2>
        <form class="mt-6" action="<?php echo base_url().'Auth/Signup' ?>" method="POST">
          <div>
            <label class="block text-gray-700">Name</label>
            <input type="string" name="name" id="" placeholder="Enter Your name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>
          
          <div class="mt-4">
            <label class="block text-gray-700">Phone</label>
            <input type="string" name="phone" id="" placeholder="Enter Your phone" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>
          
          <div class="mt-4">
            <label class="block text-gray-700">Username</label>
            <input type="string" name="username" id="" placeholder="Enter Your username" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>
          
          <div class="mt-4">
            <label class="block text-gray-700">Email Address</label>
            <input type="email" name="email" id="" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" onchange="check_pass()" placeholder="Enter Password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
          </div>
          
          <div class="mt-4">
            <label class="block text-gray-700">Repeat Password</label>
            <input type="password" name="Rpassword" id="rpassword" onchange="check_pass()" placeholder="Enter Password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
          </div>

          <button type="submit" id="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Sign Up</button>
        </form>

        <div class="mt-7 grid grid-cols-3 items-center text-gray-500">
          <hr class="border-gray-500" />
          <p class="text-center text-sm">OR</p>
          <hr class="border-gray-500" />
        </div>

        <a href="<?php echo base_url().'Auth/indexLogin' ?>" class="bg-neutral-300 hover:bg-neutral-200 border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 ">
          <span class ="ml-4">Login</span>
        </a>
      </div>
    </div>
  </section>