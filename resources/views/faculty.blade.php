<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Faculty - School Registrar Portal</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		body { font-family: 'Nunito', sans-serif; }
	</style>
</head>
<body class="bg-gray-100 min-h-screen">
	<!-- Navigation Bar -->
	<nav class="bg-white shadow-md">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between h-20 items-center">
				<div class="flex items-center space-x-4">
					<span class="text-2xl font-extrabold text-blue-700 tracking-wide">Registrar</span>
				</div>
				<div class="hidden sm:flex sm:space-x-8">
					<a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
					<a href="{{ route('faculty') }}" class="text-blue-700 font-bold underline">Faculty</a>
					<a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Student</a>
					<a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Report</a>
					<a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Setting</a>
					<a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Profile</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="max-w-5xl mx-auto mt-12 p-6 bg-white rounded-lg shadow">
		<h1 class="text-3xl font-bold text-blue-700 mb-6">Faculty Management</h1>
		<p class="mb-8 text-gray-600">View and manage faculty members. Add new faculty, update their information, or remove them as needed.</p>

		<!-- Faculty Table -->
		<div class="overflow-x-auto">
			<table class="min-w-full bg-white border border-gray-200 rounded-lg">
				<thead>
					<tr>
						<th class="py-3 px-4 border-b text-left text-gray-700">Name</th>
						<th class="py-3 px-4 border-b text-left text-gray-700">Department</th>
						<th class="py-3 px-4 border-b text-left text-gray-700">Email</th>
						<th class="py-3 px-4 border-b text-left text-gray-700">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="py-2 px-4 border-b">Dr. Jane Smith</td>
						<td class="py-2 px-4 border-b">Mathematics</td>
						<td class="py-2 px-4 border-b">jane.smith@university.edu</td>
						<td class="py-2 px-4 border-b">
							<button class="text-blue-600 hover:underline mr-2">Edit</button>
							<button class="text-red-600 hover:underline">Remove</button>
						</td>
					</tr>
					<tr>
						<td class="py-2 px-4 border-b">Prof. John Doe</td>
						<td class="py-2 px-4 border-b">Physics</td>
						<td class="py-2 px-4 border-b">john.doe@university.edu</td>
						<td class="py-2 px-4 border-b">
							<button class="text-blue-600 hover:underline mr-2">Edit</button>
							<button class="text-red-600 hover:underline">Remove</button>
						</td>
					</tr>
					<!-- More sample rows as needed -->
				</tbody>
			</table>
		</div>

		<div class="mt-8">
			<button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Add New Faculty</button>
		</div>
	</div>
</body>
</html>
