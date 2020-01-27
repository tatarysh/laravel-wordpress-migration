<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use DatabaseMigrations;

    public function testWordPressMigrations(): void
    {
        $tables = DB::connection(config('wordpress_migration.connection'))
            ->table('sqlite_master')
            ->where('type', '=', 'table')
            ->where('name', 'NOT LIKE', 'sqlite_%')
            ->where('name', '!=', 'migrations')
            ->get();

        $this->assertCount(11, $tables);
        $this->assertEquals([
            'commentmeta',
            'comments',
            'links',
            'options',
            'postmeta',
            'posts',
            'term_relationships',
            'term_taxonomy',
            'terms',
            'usermeta',
            'users',
        ], $tables->pluck('name')->toArray());
    }
}
