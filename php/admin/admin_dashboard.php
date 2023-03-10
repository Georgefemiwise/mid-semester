 <script src="https://cdn.tailwindcss.com"></script>

<div id="app" class="md:flex antialiased">
	<aside class="w-full md:h-screen md:w-64 bg-gray-900 md:flex md:flex-col">
		<header class="border-b border-solid border-gray-800 flex-grow">
			<h1 class="py-6 px-4 text-gray-100 text-base font-medium">Buildings</h1>
		</header>
		<nav class="overflow-y-auto h-full flex-grow">
			<header>
				<span class="text-xs text-gray-500 block py-6 px-6">MENU</span>
			</header>
			<ul class="font-medium px-4 text-left">
				<li class="text-gray-100">
					<button href="#performance" v-on:click="select('performance')" class="rounded text-sm text-left block py-3 px-6 hover:bg-blue-600 w-full">Performance</button>
					<button href="#performance" v-on:click="select('new')" class="rounded text-sm block py-3 px-6 hover:bg-blue-600 w-full text-left">New</button>

				</li>
			</ul>
		</nav>
		<section id="user" class="p-4 border-t border-solid border-gray-800">
			<div class="flex">
				<img src="..." class="rounded-full h-10" alt="">
				<div class="flex flex-col p-2">
					<span class="text-white pb-1">Kara Johnson</span>
					<span class="text-xs text-gray-500">HR Specialist</span>
				</div>
			</div>
		</section>

		<footer class="p-4 border-t border-solid border-gray-800">
			<h4 class="pb-2 text-gray-100 text-sm">© Buildings Ltd. 2018</h4>
			<p class="text-gray-600 text-xs leading-normal">
				Created with love for the environment. By designers and develodivers who love to work together in offices!</p>
		</footer>
	</aside>
	
	<main class="bg-gray-100 h-screen w-full overflow-y-auto">
		<section v-if="active === 'performance'" id="performance">
			<header class="border-b border-solid border-gray-300 bg-white">
				<h2 class="p-6 text-center font-bold">Today</h2>
		
			</section>
		</div>
	</main>

</div>
