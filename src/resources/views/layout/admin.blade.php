<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link href="css/app.css" rel="stylesheet">
  </head>
  <body id="admin-page" class="mt-14 px-4 pt-4 font-poppins bg-purple-50 text-gray-500 lg:pr-12 lg:pl-24">
    <!-- ========== HEADER ========= -->
    <header class="fixed top-0 left-0 w-full bg-white shadow-lg px-4 z-50 lg:pr-12 lg:pl-24">
      <div class="flex items-center h-14 justify-between lg:h-16">
        <img
          src="https://avatars.githubusercontent.com/u/55529750?s=400&u=0e15dd129323700c7f38a0e5e1fe9e84f763ee6d&v=4"
          alt=""
          class="w-10 circle lg:w-12 lg:order-1"
        />
        <a href="#" class="text-gray-700 font-medium hidden lg:block lg:text-lg">EDnotSheeran</a>
        <div class="flex py-1 px-3 bg-purple-50 rounded w-full max-w-xs mx-4 lg:py-2 lg:px-4">
          <input type="search" placeholder="Search" class="w-full outline-none bg-purple-50" />
          <i class="bx bx-search text-lg"></i>
        </div>
        <button class="cursor-pointer lg:hidden" onclick="utils.toggleActive('navbar')">
          <i class="bx bx-menu text-lg text-gray-700"></i>
        </button>
      </div>
    </header>
    <!-- ========== NAVBAR ========= -->
    <div id="navbar">
      <nav class="h-full flex flex-col justify-between">
        <div class="grid gap-y-6">
          <a href="#" class="nav__link flex items-center hover:text-purple-700 font-semibold mb-9">
            <i class="bx bxs-disc nav__icon text-lg mr-2 lg:text-2xl"></i>
            <span class="nav__logo-name navbar-fade">EDnotSheeran</span>
          </a>
          <div class="nav__list grid gap-y-12">
            <div class="nav__items grid gap-y-6">
              <h3 class="uppercase leading-4 text-gray-400 text-lg navbar-fade">Profile</h3>
              <a href="#" class="nav__link flex items-center hover:text-purple-700">
                <i class="bx bx-home nav__icon text-lg mr-2 lg:text-2xl"></i>
                <span class="font-medium whitespace-nowrap lg:navbar-fade">Home</span>
              </a>

              <div class="overflow-hidden max-h-5 lg:max-h-6 duration-500 ease-in-out focus-within:max-h-screen group">
                <a href="#" class="nav__link flex items-center hover:text-purple-700">
                  <i class="bx bx-user nav__icon text-lg mr-2 lg:text-2xl"></i>
                  <span class="font-medium whitespace-nowrap lg:navbar-fade">Profile</span>
                  <i
                    class="bx bx-chevron-down nav__icon text-lg mr-2 ml-auto duration-500 group-focus-within:rotate-180"
                  ></i>
                </a>
                <div class="bg-purple-50 rounded mt-4">
                  <div class="grid gap-y-2 py-3 pr-10 pl-8">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Passwords</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Mail</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Accounts</a>
                  </div>
                </div>
              </div>

              <a href="#" class="nav__link flex items-center hover:text-purple-700">
                <i class="bx bx-message-rounded nav__icon text-lg mr-2 lg:text-2xl"></i>
                <span class="font-medium whitespace-nowrap lg:navbar-fade">Messages</span>
              </a>
            </div>
          </div>

          <div class="nav__list grid gap-y-12">
            <div class="nav__items grid gap-y-6">
              <h3 class="uppercase leading-4 text-gray-400 text-lg navbar-fade">Menu</h3>

              <div class="overflow-hidden max-h-5 lg:max-h-6 duration-500 ease-in-out focus-within:max-h-screen group">
                <a href="#" class="nav__link flex items-center hover:text-purple-700">
                  <i class="bx bx-bell nav__icon text-lg mr-2 lg:text-2xl"></i>
                  <span class="font-medium whitespace-nowrap lg:navbar-fade">Notifications</span>
                  <i
                    class="bx bx-chevron-down nav__icon text-lg mr-2 ml-auto duration-500 group-focus-within:rotate-180"
                  ></i>
                </a>
                <div class="bg-purple-50 rounded mt-4">
                  <div class="grid gap-y-2 py-3 pr-10 pl-8">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Blocked</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Silenced</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Publish</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Program</a>
                  </div>
                </div>
              </div>

              <a href="#" class="nav__link flex items-center hover:text-purple-700">
                <i class="bx bx-compass nav__icon text-lg mr-2 lg:text-2xl"></i>
                <span class="font-medium whitespace-nowrap lg:navbar-fade">Explore</span>
              </a>

              <a href="#" class="nav__link flex items-center hover:text-purple-700">
                <i class="bx bx-bookmark nav__icon text-lg mr-2 lg:text-2xl"></i>
                <span class="font-medium whitespace-nowrap lg:navbar-fade">Saved</span>
              </a>
            </div>


          </div>

          <div class="nav__list grid gap-y-12">
            <div class="nav__items grid gap-y-6">
              <h3 class="uppercase leading-4 text-gray-400 text-lg navbar-fade">Cadastro</h3>

              <div class="overflow-hidden max-h-5 lg:max-h-6 duration-500 ease-in-out focus-within:max-h-screen group">
                <a href="#" class="nav__link flex items-center hover:text-purple-700">
                  <i class="bx bx-bell nav__icon text-lg mr-2 lg:text-2xl"></i>
                  <span class="font-medium whitespace-nowrap lg:navbar-fade">Notifications</span>
                  <i
                    class="bx bx-chevron-down nav__icon text-lg mr-2 ml-auto duration-500 group-focus-within:rotate-180"
                  ></i>
                </a>
                <div class="bg-purple-50 rounded mt-4">
                  <div class="grid gap-y-2 py-3 pr-10 pl-8">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Blocked</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Silenced</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Publish</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-purple-700">Program</a>
                  </div>
                </div>
              </div>
        </div>
        <a href="#" class="nav__link flex items-center hover:text-purple-700 mt-20">
          <i class="bx bx-log-out nav__icon text-lg mr-2 lg:text-2xl"></i>
          <span class="font-medium whitespace-nowrap lg:navbar-fade">Log Out</span>
        </a>
      </nav>
    </div>
    <main>
        @yield('content')
    </main>
    <script src="/js/app.js"></script>
  </body>
</html>


