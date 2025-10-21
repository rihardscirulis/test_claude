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
    public $tableData = [];
    public $columns = [];
    public $sqlQuery = '';
    public $queryResult = null;
    public $queryError = null;
    public $activeTab = 'tables'; // tables, query, structure

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
        $this->loadTableData();
        $this->loadTableStructure();
        $this->activeTab = 'browse';
    }

    public function loadTableData()
    {
        if ($this->selectedTable) {
            $this->tableData = DB::table($this->selectedTable)->paginate(50);
            $this->columns = $this->tableData->isNotEmpty()
                ? array_keys((array)$this->tableData->items()[0])
                : [];
        }
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

        if ($tab === 'browse' && $this->selectedTable) {
            $this->loadTableData();
        }
    }

    public function render()
    {
        return view('livewire.database-manager')->layout('layouts.app');
    }
}
