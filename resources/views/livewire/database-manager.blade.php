<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Database Manager
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Database Manager</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Browse and manage your database tables</p>
                </div>

                <div class="grid grid-cols-12 gap-6">
                    <!-- Sidebar - Tables List -->
                    <div class="col-span-12 lg:col-span-3">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-200">Tables</h3>
                            <div class="space-y-2">
                                @foreach($tables as $table)
                                    <button
                                        wire:click="selectTable('{{ $table }}')"
                                        class="w-full text-left px-4 py-2 rounded-md transition {{ $selectedTable === $table ? 'bg-indigo-600 text-white' : 'bg-white dark:bg-gray-600 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-500' }}">
                                        {{ $table }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-span-12 lg:col-span-9">
                        @if($selectedTable)
                            <!-- Tabs -->
                            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                <nav class="flex space-x-4">
                                    <button
                                        wire:click="setActiveTab('browse')"
                                        class="px-4 py-2 font-medium {{ $activeTab === 'browse' ? 'border-b-2 border-indigo-600 text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                                        Browse
                                    </button>
                                    <button
                                        wire:click="setActiveTab('structure')"
                                        class="px-4 py-2 font-medium {{ $activeTab === 'structure' ? 'border-b-2 border-indigo-600 text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                                        Structure
                                    </button>
                                    <button
                                        wire:click="setActiveTab('query')"
                                        class="px-4 py-2 font-medium {{ $activeTab === 'query' ? 'border-b-2 border-indigo-600 text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                                        SQL Query
                                    </button>
                                </nav>
                            </div>

                            <!-- Browse Tab -->
                            @if($activeTab === 'browse')
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-200">
                                        Table: {{ $selectedTable }}
                                    </h3>

                                    @if($tableData && $tableData->count() > 0)
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                                <thead class="bg-gray-100 dark:bg-gray-800">
                                                    <tr>
                                                        @foreach($columns as $column)
                                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                                {{ $column }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                                    @foreach($tableData as $row)
                                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            @foreach($columns as $column)
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                                    {{ is_object($row) ? $row->$column : $row[$column] ?? 'NULL' }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">
                                            {{ $tableData->links() }}
                                        </div>
                                    @else
                                        <p class="text-gray-600 dark:text-gray-400">No data found in this table.</p>
                                    @endif
                                </div>
                            @endif

                            <!-- Structure Tab -->
                            @if($activeTab === 'structure')
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-200">
                                        Structure: {{ $selectedTable }}
                                    </h3>

                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                            <thead class="bg-gray-100 dark:bg-gray-800">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Column
                                                    </th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Type
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                                @foreach($columns as $column)
                                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                                            {{ $column }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                                            {{ Schema::getColumnType($selectedTable, $column) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            <!-- SQL Query Tab -->
                            @if($activeTab === 'query')
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-200">
                                        Execute SQL Query
                                    </h3>

                                    <div class="mb-4">
                                        <textarea
                                            wire:model="sqlQuery"
                                            rows="6"
                                            placeholder="SELECT * FROM {{ $selectedTable }} LIMIT 10;"
                                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-600 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 font-mono text-sm"></textarea>
                                    </div>

                                    <button
                                        wire:click="executeQuery"
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                                        Execute Query
                                    </button>

                                    @if($queryError)
                                        <div class="mt-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 rounded">
                                            <strong>Error:</strong> {{ $queryError }}
                                        </div>
                                    @endif

                                    @if($queryResult !== null)
                                        <div class="mt-4">
                                            <h4 class="font-semibold mb-2 text-gray-800 dark:text-gray-200">
                                                Query Result ({{ count($queryResult) }} rows)
                                            </h4>

                                            @if(count($queryResult) > 0)
                                                <div class="overflow-x-auto">
                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                                        <thead class="bg-gray-100 dark:bg-gray-800">
                                                            <tr>
                                                                @foreach((array)$queryResult[0] as $key => $value)
                                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                                        {{ $key }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                                            @foreach($queryResult as $row)
                                                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                    @foreach((array)$row as $value)
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                                            {{ $value ?? 'NULL' }}
                                                                        </td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <p class="text-gray-600 dark:text-gray-400">Query returned no results.</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @else
                            <!-- No Table Selected -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">No table selected</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Select a table from the sidebar to view its contents.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
