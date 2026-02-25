<x-layout :header="true" :footer="false">
	<x-header type="sidebar" />

	<div class="mb-6">
		<h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
	</div>
	<hr class="border-gray-300 mb-6">
</x-layout>