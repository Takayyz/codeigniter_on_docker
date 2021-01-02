<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(! $this->input->is_cli_request()) {
            show_404();
            exit;
        }
        $this->load->library('migration');
    }

    function index()
    {
        if ($this->migration->latest()) {
            log_message('info', 'Migration Success.');
            echo "\033[0;32mMigration Success\033[0m\n";
        } else {
            log_message('error', $this->migration->error_string());
        }
    }

    function rollback($version)
    {
        if ($this->migration->version($version)) {
            log_message('info', 'Migration Success.');
            echo "\033[0;32mMigration Success\033[0m\n";
        } else {
            log_message('error', $this->migration->error_string());
        }
    }

    /**
     * application/config/migration.phpの$config['migration_version']に指定されたバージョンをマイグレートする
     *
     * @return void
     */
    function current()
    {
        if ($this->migration->current()) {
            log_message('info', 'Migration Success.');
            echo "\033[0;32mMigration Success\033[0m\n";
        } else {
            log_message('error', $this->migration->error_string());
        }
    }
}
