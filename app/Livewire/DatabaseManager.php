<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\WithPagination;

class DatabaseManager extends Component
{
    use WithPagination;

    public $tables = [];
    public $selectedTable = '';
    public $columns = [];
    public $sqlQuery = '';
    public $queryResult = null;
    public $queryError = null;
    public $activeTab = 'tables';

    public function mount()
    {
        $this->loadTables();
    }

    public function loadTables()
    {
        // Get all tables from the database
        if (config('database.default') === 'sqlite') {
            // For SQLite
            $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name");
            $this->tables = array_map(function($table) {
                return $table->name;
            }, $tables);
        } else {
            // For MySQL and other databases
            $this->tables = Schema::getAllTables();
            $this->tables = array_map(function($table) {
                return array_values((array)$table)[0];
            }, $this->tables);
        }
    }

    public function selectTable($table)
    {
        $this->selectedTable = $table;
        $this->loadTableStructure();
        $this->activeTab = 'browse';
        $this->resetPage();
    }

    public function loadTableStructure()
    {
        if ($this->selectedTable) {
            $this->columns = Schema::getColumnListing($this->selectedTable);
        }
    }

    public function executeQuery()
    {
        $this->queryResult = null;
        $this->queryError = null;

        if (empty($this->sqlQuery)) {
            $this->queryError = 'Please enter a SQL query';
            return;
        }

        try {
            // Prevent dangerous queries in production
            $dangerousKeywords = ['DROP', 'TRUNCATE', 'DELETE', 'UPDATE', 'INSERT', 'ALTER'];
            $query = strtoupper(trim($this->sqlQuery));

            foreach ($dangerousKeywords as $keyword) {
                if (strpos($query, $keyword) === 0) {
                    $this->queryError = 'Modification queries are disabled for safety. Only SELECT queries are allowed.';
                    return;
                }
            }

            $this->queryResult = DB::select($this->sqlQuery);
        } catch (\Exception $e) {
            $this->queryError = $e->getMessage();
        }
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $tableData = null;

        if ($this->selectedTable && $this->activeTab === 'browse') {
            $tableData = DB::table($this->selectedTable)->paginate(50);

            // Update columns from data if available
            if ($tableData->isNotEmpty()) {
                $this->columns = array_keys((array)$tableData->items()[0]);
            }
        }

        return view('livewire.database-manager', [
            'tableData' => $tableData
        ])->layout('layouts.app');
    }
}
