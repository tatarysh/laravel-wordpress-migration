<?php

namespace TataRysh\Database\Migrations;

abstract class Migration extends \Illuminate\Database\Migrations\Migration
{
    /**
     * @return string
     */
    protected function connection(): string
    {
        return config('wordpress_migration.connection');
    }
}
